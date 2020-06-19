<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_error());//local server connect, providing credential
$res=mysqli_select_db($con,"users");//specifying database and con is the variable to execute queries by including this dbconnect
?>