import pymysql
import pymysql.cursors
import sys# for commandline

hostname = 'localhost'
username = 'root'
password = ''
database = 'users'

import pandas as pd

conn= pymysql.connect(host=hostname, user=username, passwd=password, db=database,charset='utf8mb4',cursorclass=pymysql.cursors.DictCursor)#connection estabilishment and working over database users
cur = conn.cursor()#creating new cursor for to execute queries
php=sys.argv[1:]# search string passed will be in the form of words, sliced so [1:] will start from argument atpostion "1" and till end
srchstr=""#new string for concatinating arguments
for i in range(len(php)):
    srchstr+=php[i]# concatination words as passed i.e. 'hello','world'
    if(i!=len(php)-1):
        srchstr+=" "
cur.execute("SELECT * FROM webdata where TITLE like '%s'"%srchstr)#executing the query
#print(cur.description)
#print()
temp={'ID':[], 'URL_NAME':[], 'TITLE':[], 'RES_TIME':[], 'LOA_TIME':[], 'FEED_POS':[],'FEED_NEG':[],'SUMMARY':[],'SE':[],'FEED_COUNT':[]}# creating default dictionary for storing values from database
for row in cur:#row wise fetching
    for key,value in row.items():
        temp[key].append(value)#for particular key Ex. URL all the records value are inserted in that
cur.close()#cursor freed
conn.close()#connection freed
if(len(temp['URL_NAME'])):# any of the dictionary key have any record then proceed otherwise NO SUCH DATA FOUND
    df=pd.DataFrame(temp,columns=['ID', 'URL_NAME','TITLE', 'RES_TIME', 'LOA_TIME', 'FEED_POS','FEED_NEG','SUMMARY','SE','FEED_COUNT'])#creating dataframe
    import numpy as np
    import math
    def similarityRelation(c,n):#finding similarity or co occurance
        c = np.array(c,dtype=np.int8)+1#for below given formula x/0 will be a exception so increamenting by one
        union = sum(c)
        mul =1;
        for i in c:
            mul *= i
        result = math.log((n*union)/(mul))/math.log(n)
        return result




    import nltk.tokenize,nltk.corpus,nltk.stem# tokenize: slicing of words, corpus: stopwords i.e. words except noun, stem: stemming similar words
    from nltk.tokenize import word_tokenize#it has word tokenize: word by word slicing, sentance tokenize: sentence by senctence slicing

    from nltk.corpus import stopwords
    from nltk.stem import PorterStemmer
    import re#regular expresion for findall method

    stop_words = set(stopwords.words('english'))#keeping english lang. stopwords

    ps = PorterStemmer()#using porter stemmer function as object
    st=[]
    ss=[]
    su=[]
    for temp4 in range(len(df['ID'])):#no of rows/records in df
        word_tokens = word_tokenize(df.iloc[temp4][7])#summary into tokens

        filtered_sentence = list()#new token list for summary for keeping only noun

        for w in word_tokens:
            if w not in stop_words:# tokens from line 61 which are not in stop_words
                filtered_sentence.append(w)# words except stop words and also in summary


        temp8=(df.iloc[temp4][2]).split(" ")#list of words in search string
        count={'termcount':[],'summarycount':[],'linkcount':[]}#Default dictionary for keeping TC,SC,LC for each word in search string EX. 'termcount':[1,2] and search string="helo world" count['termcount'][0] will be for helo
        for word in temp8:#splitted word in searchstring line 70

            #print(filtered_sentence)
            temps=0 #temp var for increasing count of summary
            for i in filtered_sentence:# words with no stop words and of summary
                if(ps.stem(word)==ps.stem(i)):#stemming filtered sentence & word EX. word = helo with complete filtered_sentence list ['helo','world','prak']
                    temps+=1 #summary
            count['summarycount'].append(temps)# updating temps to summary count
            count['termcount'].append(1) #title
            count['linkcount'].append(len(re.findall(word ,df.iloc[temp4][1]))+len(re.findall(word.upper() ,df.iloc[temp4][1]))+len(re.findall(word.title() ,df.iloc[temp4][1])))#linkcount key will increase if the word is in small case, upper case or title case

        st.append(similarityRelation(count['termcount'],len(df['ID'])))# similarityRelation(list,total no. of records), for particular record no. of words in search string till what extent are co occured or similar in term count
        ss.append(similarityRelation(count['summarycount'],len(df['ID'])))# similarityRelation(list,total no. of records), for particular record no. of words in search string till what extent are co occured or similar in summary count
        su.append(similarityRelation(count['linkcount'],len(df['ID'])))# similarityRelation(list,total no. of records), for particular record no. of words in search string till what extent are co occured or similar in link count

    st = np.array(st)
    ss = np.array(ss)
    su = np.array(su)
    s=[]
    for i in range(len(st)):
        if((df.iloc[i][9])!=0):
            feed=((df.iloc[i][6]/df.iloc[i][9])/((df.iloc[i][5]/df.iloc[i][9])+(df.iloc[i][6]/df.iloc[i][9])))*math.log(df.iloc[i][9],100000000)
        else:
            feed=0
        s.append((st[:][i]+su[:][i]+ss[:][i]+feed,df.iloc[i][1]))
    s=sorted(s,key=lambda x:x[0])
    print("<table id='optimized'>")
    for i in range(len(s)):
        print("<tr><td><a href="+"'"+s[i][1]+"'"+">"+(s[i][1])[:45]+"</a></td></tr>")#[:45] substring of the urls for perfect visibility
    print("</table>")
else:
    print("<table id='optimized'><tr><td>DATA NOT FOUND</td></tr></table>")