
		<?php
			include('./db/dbconnect.php');//including dbconnect.php in which credentials and database used is mentioned
			$che=$_POST['che'];//id of the record's feedback passed form main2.php line 55
			/*since every url record is having value aligned with their url itself in main2.php line 109 & 170 line*/
			$url=$_POST['url'];//url of the record's feedback passed form main2.php line 55
			$query="SELECT * FROM webdata where URL_NAME='$url'";//fetching record of the url retrieved
			$query_result=mysqli_query($con,$query);//executing the query with variable con
			$row=mysqli_fetch_row($query_result);// fetching record one by one in terms of row
			if($che[0]=="n"){// if id starting character is 'n' then the checked value is NO
			$query=("");
			$query.=("UPDATE `webdata` SET `FEED_NEG`=`FEED_NEG`+1, `FEED_COUNT`=`FEED_COUNT`+1 where URL_NAME='$url'");// Decreasing the feedback count by one
			}
			else{
			$query=("");
			$query.=("UPDATE `webdata` SET `FEED_POS`=`FEED_POS`+1, `FEED_COUNT`=`FEED_COUNT`+1 where URL_NAME='$url'");// Increasing the feedback count by one
			}
			$sql=mysqli_query($con,$query);//Executing query with con variable
		?>