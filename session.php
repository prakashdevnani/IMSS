<?php
				include('./db/dbconnect.php');//including dbconnect.php in which credentials and database used is mentioned
				session_start();// starting session
				if (isset($_POST['btnc'])) {// if email and password are entered into login.php with post method btnc is value for name for submit button
					
					$Username=$_POST['email'];//email entered from login.php line 32
					$Password=$_POST['password'];//password entered from login.php line 39
					
					$mysqli_result=mysqli_query($con,"SELECT * FROM signup where email='$Username' and Password='$Password'");//con variable mentioned in dbconnect.php which specify the database 'users' is used
					if(mysqli_num_rows($mysqli_result)==1){//if the above query will fetch any record, then condition=true
						$_SESSION['Username']=$Username;//session variable email, main2.php 24 line will show the email of the user
						$name=mysqli_fetch_row($mysqli_result);//fetch the record from the table in terms of rows
						$_SESSION['uname']=$name[1];//session variable username so that main2.php 21 line will show the name of the user
						header('location:main2.php');//directs to main2.php
					}
				else{
					header('location: login.php?wrong');//looping back to login.php if credentials are wrong
					}	
					}
				if (isset($_POST['LOGOUT'])) {//on clicking logout button
					header('location:index.php');//directs to index.php(homepage)
					session_destroy();//terminate session
				}
				

?>