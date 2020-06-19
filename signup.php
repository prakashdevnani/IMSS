<?php
	session_start();
	if(isset($_SESSION['Username']))
	{
		header('location:main2.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Signup form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
	var name;
	var email;
	var phone;
	var password,flag;
	$(document).ready(function () {
			$("#name").keypress(function(){
				document.getElementById("name").style.borderColor="grey";
			});
		
			$("#email").keypress(function(){
				document.getElementById("email").style.borderColor="grey";
			});
			$("#phone").keypress(function(){
				document.getElementById("phone").style.borderColor="grey";
			});
			$("#password").keypress(function(){
				document.getElementById("password").style.borderColor="grey";
			});
	});
		function validate(){
			var i;
			flag=0;
			name=document.getElementById("name").value;
			email=document.getElementById("email").value;
			phone=document.getElementById("phone").value;
			password=document.getElementById("password").value;
			var atposition=email.indexOf("@");  
			var dotposition=email.lastIndexOf(".");
			if((name=="")||(email=="")||(phone=="")||(password=="")){
				flag=1;
				if(name==""){
					document.getElementById("name").style.borderColor="red";
				}
				if(email==""){
					document.getElementById("email").style.borderColor="red";
				}
				if(phone==""){
					document.getElementById("phone").style.borderColor="red";
				}
				if(password==""){
					document.getElementById("password").style.borderColor="red";
				}
				alert("PLEASE ENTER DATA");
				event.preventDefault();
				return false;
			}
			  
			if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){  
				flag=1;
			    alert("Please enter a valid e-mail");  
				document.getElementById("email").style.borderColor="red";
				event.preventDefault();
				return false;
			}
			
			if((phone.length)!=10){
				flag=1;
				document.getElementById("phone").style.borderColor="red";
				alert("Enter 10 digit mobile number accurately");
				event.preventDefault();
				return false;
			}
			
			for (i=0;i<phone.length;i++){
				if(!(phone[i]=='0' || phone[i]=='1' || phone[i]=='2' || phone[i]=='3' || phone[i]=='4' || phone[i]=='5' || phone[i]=='6' || phone[i]=='7' || phone[i]=='8' || phone[i]=='9')){
					break;
				}
			}
			if(i<phone.length){
				flag=1;
				document.getElementById("phone").style.borderColor="red";
				alert("INPUT SHOULD BE IN DIGITS");			
				event.preventDefault();
				return false;
			}
		}
		$(document).ready(function () {
		$("#submit").click(function(){
		$.post('check.php',{email:email,mobile:phone},function(data){if(data=="1"){alert("DATA ALREADY EXIST"); flag=1; event.preventDefault();
				return false;}
			else{
				if(flag==0)
			{
				alert("1");
				$.post('form.php',{email:email,phone:phone,name:name,password:password});
				window.location.href = "login.php?created";
				alert("1");
			}} });
		});
		});
	</script>
</head>
<body>

<div class="container">
	<div class="well well-lg">
	<center><h2>Please Sign Up Here</h2></center>
	</div>
	<div class="jumbotron">
	<form class="form-horizontal" method="post">
		<div class="form-group">
	  <label class="control-label col-sm-2">Name:-</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter name" name="name" id="name" >
      </div>
	  </div>
		<div class="form-group">
	    <label class="control-label col-sm-2">Email:-</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" >
      </div>
		</div>
		<div class="form-group">
	    <label class="control-label col-sm-2">Phone Number:-</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" id="phone" >
      </div>
		</div>
		<div class="form-group">
	    <label class="control-label col-sm-2">Password:-</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" placeholder="Enter Passsword" name="password" id="password" >
      </div>
		</div>
		<center><button class="btn btn-danger" onclick="validate()" id="submit">Submit</button></center>
	</form>
</div>
</div>
</body>
</html>