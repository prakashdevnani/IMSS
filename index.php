<?php
	session_start();
	if(isset($_SESSION['Username']))
	{
		header('location:main2.php');
	}//Whether user has login into the session if yes then redirect to main2
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
			HELLO VISITOR
		</div>
		<div class="cont1" id="cont1"><!-- first line-->
			<a href="signup.php">Sign up</a>/<a href="login.php">Login</a><!-- javascript is aligned to signup and login-->
		</div>
		<div class="cont1"><!-- first line-->
			USER ID: xyz@gmail.com
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
		<div id="resulto"></div><!-- here user can watch the optimized result-->
		<script >
		
		$(document).ready(function () {
			$("#SearchBox").keyup(function(){// if not login/sign up line 39
				document.getElementById("SearchBox").style.borderColor="red";
				document.getElementById('SearchBox').value = "please sign up/login";
			 });
			$("#submit").click(function(){
				alert("please sign up/login");
				
			});
			$("#cont1").click(function(){
				$.post('start.php');
			});
		});
		
	</script>
	</div>
	</body>
</html>