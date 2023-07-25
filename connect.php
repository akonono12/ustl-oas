<?php
	$host	='localhost';
    $db 	='oas';
    $user = 'root';
    $pass = '';
$connection = mysqli_connect($host,$user,$pass,$db);
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, $db);
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}