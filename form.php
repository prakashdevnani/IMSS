<?php
		include('./db/dbconnect.php');//including dbconnect.php in which credentials and database used is mentioned
			$name=$_POST['name'];//recieving name from signup.php line 101
			$email=$_POST['email'];//recieving email from signup.php line 101
			$phone=$_POST['phone'];//recieving phone from signup.php line 101
			$pass=$_POST['password'];//recieving pass from signup.php line 101
			$query=("INSERT INTO `signup`(`name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$pass');");// inserting value into the table signup
			$sql=mysqli_query($con,$query);//executing query with variable con signifying 'users' database
			$query=("COMMIT;");
			$sql=mysqli_query($con,$query);
				?>