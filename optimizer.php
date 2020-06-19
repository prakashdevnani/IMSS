<?php
	ini_set('max_execution_time', 300);//setting max time to 300ms
	$srstring=$_POST['srstring'];//getting search value from main2.php line 73 for optimized result
	system('python .\checker.py ' . $srstring);// srstring is passed to python as command line argument
	/*system() is just like the C version of the function in that it executes the given command and outputs the result.*/
?>
