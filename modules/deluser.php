<?php
    session_start();
    include('../db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != 1)
    {
        header("location: ../Login-form.html");
    }

    if(isset($_GET['id'])){
        $res = mysqli_query($con,"DELETE FROM users WHERE id='".$_GET['id']."'") or die("error");
        if($res){
            header("location: ../users.php?delete=success");   
        } else {
            header("location: ../users.php?delete=fail");   
        }  
    }
?>