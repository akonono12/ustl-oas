<?php
    session_start();
    include('../db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != 1)
    {
        header("location: Login-form.html");
    }

     if(isset($_POST['save'])){
        if($_GET['mode'] == 'update'){
            $res = mysqli_query($con,"UPDATE users SET username='".$_POST['username']."', password='".$_POST['password']."', role='".$_POST['role']."', emp_id='".$_POST['emp_id']."', student_id = '".$_POST['student_id']."' WHERE id='".$_POST['id']."'") or die("error");
            if($res){
                header("location: ../users.php?id=".$_POST['id']."&update=success");   
            } else {
                header("location: ../users.php?id=".$_POST['id']."&update=fail");   
            }
        } elseif($_GET['mode'] == 'add'){
            $res = mysqli_query($con,"INSERT INTO users(username, password, role, emp_id, student_id) VALUES('".$_POST['username']."','".$_POST['password']."','".$_POST['role']."','".$_POST['emp_id']."','".$_POST['student_id']."')");
            //echo "INSERT INTO users(username, password, role, emp_id, student_id) VALUES('".$_POST['username']."','".$_POST['password']."','".$_POST['role']."','".$_POST['emp_id']."','".$_POST['student_id']."')";
            if($res){
                header("location: ../users.php");   
            } else {
                header("location: ../adduser.php?save=fail");   
            }
        }   
    }
?>