<?php
    session_start();
    include('../db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != 1)
    {
        header("location: ../Login-form.html");
    }

    if(isset($_GET['id'])){
        $res = mysqli_query($con,"DELETE FROM employees WHERE id='".$_GET['id']."'") or die("error");
        if($res){
            header("location: ../employees.php?delete=success");   
        } else {
            header("location: ../employees.php?delete=fail");   
        }  
    }
?>