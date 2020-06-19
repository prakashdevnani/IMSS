<?php
/* this php file is actually for checking whether the data is already present or not
if yes then sign up page will prompt some exception/alert*/
			include('./db/dbconnect.php');//including dbconnect.php in which credentials and database used is mentioned
			$email=$_POST['email'];//recieving email from variable email mentioned in signup.php line 96 with method post
			$mobile=$_POST['mobile'];//recieving mobile from variable mobile mentioned in signup.php line 96 with method post
			$mysqli_result=mysqli_query($con,"SELECT * FROM signup where email='$email' or phone='$mobile'");// executing sql query with database 'users'
			if(mysqli_num_rows($mysqli_result)>=1){// if no. of rows>=1 then data is already present inside the table
				echo "1";//redundant email or mobile 
			}
			else{
				echo "0";
			}
			?>