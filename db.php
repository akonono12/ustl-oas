<?php
    $host	='localhost';
    $db 	='ust-l_oas';
    $user = 'root';
    $pass = '';
    date_default_timezone_set('Asia/Manila');
	$con = mysqli_connect($host,$user,$pass,$db) or die(header("location: error/500.php"));

	  if (!$con){
  		die("Database Connection Failed" . mysqli_error($con));
		}
		$select_db = mysqli_select_db($con, $db);

		if (!$select_db)
	{	
 	 die("Database Selection Failed" . mysqli_error($con));
	}
?>