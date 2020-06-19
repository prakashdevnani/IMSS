<?php
	session_start();
	if(isset($_SESSION['Username']))
	{
		header('location:main2.php');
	}//Whether user has login into the session if yes then redirect to main2.php
	if($_GET){
		$temp=$_SERVER['REQUEST_URI'];
		$val = explode("?", $temp);
		if($val[1]=="wrong")
		echo '<script>alert("You have entered wrong credentials");</script>';
		else
		echo '<script>alert("User got Created");</script>';
	}
?>
<!DOCTYPE html>
<html lang="en">

</SCRIPT>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"><!-- scalling with initial scale=1 so as to create refrence for responsiveness i.e. @media tag-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><!--bootstrap css for implementing class-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><!-- ajax js script-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!--bootstrap js script-->
</head>
<body>

<div class="container"><!--bootstrap container class-->
	<div class="well well-lg"><!--well bootstrap class, middle of the container-->
	<center><h2>Please Login Here</h2></center>
	</div>
	<div class="jumbotron">
	<form class="form-horizontal" method="post" action="session.php"><!--calling session.php for sending credentials-->
		
		<div class="form-group">
	    <label class="control-label col-sm-2">Email:-</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" placeholder="Enter Email" name="email"><!--Text box for entering email-->
      </div>
		</div>
		
		<div class="form-group">
	    <label class="control-label col-sm-2">Password:-</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" placeholder="Enter Passsword" name="password"><!--Text box for entering password-->
      </div>
		</div>
		<center><button class="btn btn-success" name="btnc">Submit</button></center><!--submit button for transfering data-->
	</form>
</div>
</div>
</body>
</html>