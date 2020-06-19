<?php
	session_start();
	if(!isset($_SESSION['Username']))
	{
		header('location:index.php');
	}//Whether user has login into the session if no then redirect to index.php(homepage)
?>
<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"><!-- scalling with initial scale=1 so as to create refrence for responsiveness i.e. @media tag-->
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"> </script><!-- ajax js script-->
	<link rel="stylesheet" href="css/ind.css"><!-- css file-->
	</head>
	<body>
	<div id="webpage">
		<div id="header"><!-- heading-->
			INTELLIGENT META SEARCH SYSTEM
		</div>
		<div class="cont1"><!-- first line-->
			Hello <?php $name=$_SESSION['uname']; echo "$name";?>,<!--Showing user's name throught the session variable 'uname' from session.php-->
		</div>
		<div class="cont1"><!-- first line-->
			<?php $user=$_SESSION['Username']; echo "$user";?><!--Showing user's email id throught the session variable 'uname' from session.php-->
		</div>
		<div class="cont1"><!-- first line-->
			<form method="post" action="session.php"> <button name="LOGOUT">Logout</button></form><!--terminate the session and divert the user to index.php(homepage)-->
		</div>
		<div class="cont2"><!-- second line-->
			<input type="checkbox" name="GoogleCheckBox" id="GoogleCheckBox" title="Select to search enable for google"> <br/>Google<!-- checkbox for google-->
		</div>
		<div class="cont2"><!-- second line-->
			<input type="checkbox" name="QwantCheckBox" id="QwantCheckBox" title="Select to search enable for Qwant" value="qwant"> <br/>Qwant<!-- checkbox for qwant-->
		</div>
		<div class="cont2"><!-- second line-->
			<input type="checkbox" name="BingCheckBox" id="BingCheckBox" title="Select to search enable for Bing"> <br/>Bing<!-- checkbox for bing-->
		</div>
		<div id="searcher"><!-- third line-->
			<input type="textbox" name="SearchBox" id="SearchBox" placeholder="Enter Keyword to Search"><br><!-- search text box-->
			<input type="submit" name="" id="submit"><!-- submit button-->
			<button class="button" id="reset">Reset</button><!-- reset button-->
			<button class="button" id="ff">Fast Forward</button><!-- ff button no use-->
		</div>
		<div id="end"><!-- rank box-->
			RANK BOX
		</div>
		<br/>
		<div id="resultf"></div><!-- url of serched strings-->
		<div id="optclick">Print Optimized Result</div><!-- div button where user will click for showing optimized result-->
		<div id="load"></div>
		<div id="resulto"></div><!-- here user can watch the optimized result-->
	</div>
		<script >//internal css
		function feed(x){//if YES/NO feedback is checked
			alert("You have given feedback for:"+document.getElementById(x).value);//alerting URL
			$.post('getdata.php',{che:x,url:document.getElementById(x).value});//passing id and url into getdata for increasing and decreasing the feedback
		}
		$(document).ready(function () {
			$("#optclick").click(function(){
				  
				var q = $('#SearchBox').val();
				var searchstring = q;
				if(q == "")	{// no value inside search string it will alert
					document.getElementById("SearchBox").style.borderColor="red";
					document.getElementById("SearchBox").value = "enter some value to optimize";
				}
				else{
					document.getElementById('load').style.visibility="visible";
				  document.getElementById('load').style.position="static";
						document.getElementById('resulto').style.position="absolute";
						 document.getElementById('resulto').style.visibility="hidden"; 
						 
				$.post('optimizer.php',{srstring:$('#SearchBox').val()},function(data){$("#resulto").html(data);
					document.getElementById('load').style.visibility="hidden";
						document.getElementById('load').style.position="absolute";
						 document.getElementById('resulto').style.visibility="visible";
						 document.getElementById('resulto').style.position="static";
				});//searchbox value passing into optimizer.php line 3 for python script
				}
			});
			
			 $("input[type='textbox']").keypress(function(){//on entering value the border will reset to default
				document.getElementById("SearchBox").style.borderColor="grey";
			 });
			$('#reset').click(function(){//reset button click
					document.getElementById("SearchBox").value = "";//setting empty string to searchbox line 39
					
			});
			
			$("#submit").click(function(){// on clicking submit button line 40 main2.php
				var q = $('#SearchBox').val();
				var searchstring = q;
				if(q == "")	{// no value inside search string it will alert
					document.getElementById("SearchBox").style.borderColor="red";
					document.getElementById("SearchBox").value = "enter some value";
				}
				else{
					var i,j;
					var google = $("#GoogleCheckBox").is( ":checked");
					var qwanti = $("#QwantCheckBox").is( ":checked");
					var bing = $("#BingCheckBox").is( ":checked");
					if(!google && !qwanti && !bing){
						alert("Select atleast one search engine!!!");
					}
					else{
						alert(q);
						list='<table><tr><th>URL NAMES</th><th>RESPONSE TIME</th><th>LOAD TIME</th><th>FEEDBACK</th></tr>';
						if(google==true){//google SE
							var start = new Date().getTime();//initial time
							$.get("https://www.googleapis.com/customsearch/v1/",
							{
								key:"AIzaSyDS7RKBT7ow72laeongbPyW_-gbk4Pl5so",//API key
								cx:"012773643409177149611:giuhxzmolrc",//custom search engine id
								q:q//query
        					},function(response){
        						var response_time = new Date().getTime() - start;//current time-initial time for initial response
        						response_time *= 0.001;//divided by 1000
        						for (i = 0; i < response.items.length; i++) {
        							var loading_time = new Date().getTime() - start;//total turn arround time for particular url
									loading_time*=0.001;//divided by 1000
        							list+='<tr><td><a href="'+String(response.items[i].link)+'" target="_blank">'+(String(response.items[i].link)).substr(0,25)+'</a></td><td>'+(String(response_time)).substr(0,4)+'</td><td>'+(String(loading_time)).substr(0,4)+'</td><td>'+'<input type="radio" id='+(i+1)+' name="radio'+(i+1)+'" value= "'+String(response.items[i].link)+'" onclick="feed('+(i+1)+')">YES<br/><input type="radio" id=n'+(i+1)+' name="radio'+(i+1)+'" value= "'+String(response.items[i].link)+'" onclick="feed('+"'"+'n'+(i+1)+"'"+')">NO</td>';
									$.post('action.php',{name:response.items[i].link,name1:response_time,name2:loading_time,name3:response.items[i].snippet,name4:q,name5:1},function(data){ alert(data);});
        						//response.items[i].link=url,response_time,loading_time,response.items[i].snippet=summary,q,"1" for google all are passed to action.php line 6, 7, 8, 9, 10, 11
								}
								if(!bing){
								list+='</table>';
								$("#resultf").html(list);//updating resultf div line 48 into html format
								}
        					});
							
							
						}
						if (qwanti==true) {
						
							$.ajax({
								url: 'https://cors-anywhere.herokuapp.com/https://api.qwant.com/api/search/images/',
								type: 'GET',
								beforeSend: function (xhr) {
									 // xhr.setRequestHeader('Access-Control-Allow-Origin', "*");
										start= new Date().getTime();
										
								},
								data: {q:searchstring,count:"10",offset:"1"},
								success: function (responses) {
									responsetime=new Date().getTime()-start;
									responsetime=responsetime * 0.001;
									var loadingtime="";
									var security="";
									var securityvalue="";
									//alert(response);
									for (var i = 0; i < responses.data.result.items.length; i++)
									{
										var loading_time = new Date().getTime() - start;
										loading_time *= 0.001;
										listlinks += '<tr><td><i>(Q)</i><a href="'+qwantListLink +'">'+qwantListLink+'</a></td><td>'+responses.data.result.items[i].url+'</td><td>'+loading_time+'</td></tr>' ;
									}
									
									
								},
								error: function () { },
							});
							
						}
						if((bing)){//bing SE
							$.ajax({
								url: 'https://api.cognitive.microsoft.com/bing/v7.0/search',
								type: 'GET',
								beforeSend: function (xhr) {
									xhr.setRequestHeader('Ocp-Apim-Subscription-Key', "4105b043bdd142c18f289d186f9f1724");
									start= new Date().getTime();//initial time
								},
								data: {q:searchstring,mkt:"en-IN",SafeSearch:"off",freshness:"month",promote:"webpages",answerCount:"10",count:"25",offset:"0"},
								success: function (response) {	
								var responsetime=new Date().getTime()-start;//current time-initial time for initial response
								responsetime=responsetime * 0.001;//divided by 1000
								if(google==true){j=i-1;}else{j=0;}//if google and bing are clicked together
								for (i = 0; i <response.webPages.value.length; i++)
								{
									var loading_time = new Date().getTime() - start;//total turn arround time for particular url
									loading_time *= 0.001;//divided by 1000
									var w = window.innerWidth;
									var k = i+j+1;
									list+='<tr><td><a href="'+response.webPages.value[i].url+'" target="_blank">'+(String(response.webPages.value[i].url)).substr(0,25)+'</a></td><td>'+(String(responsetime)).substr(0,4)+'</td><td>'+(String(loading_time)).substr(0,4)+'</td><td>'+'<input type="radio" id="'+k+'" name="radio'+k+'" value= "'+String(response.webPages.value[i].url)+'" onclick="feed('+k+')">YES<br/><input type="radio" id="n'+k+'" name="radio'+k+'" value= "'+String(response.webPages.value[i].url)+'" onclick="feed('+"'n"+k+"'"+')">NO</td>';
									$.post('action.php',{name:response.webPages.value[i].url,name1:responsetime,name2:loading_time,name3:response.webPages.value[i].snippet,name4:q,name5:3},function(data){ alert(data);});
									//response.webPages.value[i].url,responsetime,loadingtime,response.webPages.value[i].snippet=summary,q,"1" for bing all are passed to action.php line 6, 7, 8, 9, 10, 11
								}
								list+='</table>';
								$("#resultf").html(list);//updating resultf div line 48 into html format
							},
							error: function () { },
							});
						}
					}
				}
				
			});
		});
		
	</script>
	</div>
	</body>
</html>
