<?php
include('./db/dbconnect.php');//including dbconnect.php in which credentials and database used is mentioned
/*inserting data after fetching the data from api key of various google server
sending data securely with post method from main2.php and recieved here
*/
$url=$_POST['name'];//recieving url with variable name used in main2.php 110 line and 170 line
$resp=$_POST['name1'];//recieving response time with variable name1 used in main2.php 110 line and 170 line
$loa=$_POST['name2'];//recieving load time with variable name2 used in main2.php 110 line and 170 line
$sum=$_POST['name3'];//recieving summary with variable name3 used in main2.php 110 line and 170 line
$title=$_POST['name4'];//recieving title with variable name4 used in main2.php 110 line and 170 line
$se=$_POST['name5'];//recieving search engine value with variable name5 used in main2.php 110 line and 170 line
$sum=str_replace("'","89",$sum);
$query=("INSERT INTO `webdata`(`URL_NAME`, `RES_TIME`, `LOA_TIME`,`SUMMARY`,`TITLE`,`SE`) VALUES ('$url','$resp','$loa','$sum','$title','$se')");//inserting into the database with mentioned query
$sql=mysqli_query($con,$query);//executing above query into the database 'users' represented by con variable in dbconnect.php
echo $url." ".$resp." ".$loa." ".$sum." ".$title;
?>