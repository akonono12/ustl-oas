<?php
    session_start();
    include('../db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != 1)
    {
        header("location: ../Login-form.html");
    }

    if(isset($_POST['save'])){
        if($_GET['mode'] == 'update'){
            $res = mysqli_query($con,"UPDATE employees SET first_name='".$_POST['first_name']."', middle_name='".$_POST['middle_name']."', last_name='".$_POST['last_name']."', office_id='".$_POST['office']."' WHERE id='".$_POST['id']."'") or die("error");
            if($res){
                header("location: ../employees.php?id=".$_POST['id']."&update=success");    
            } else {
                header("location: ../employees.php?id=".$_POST['id']."&update=fail");   
            }
           $res1 = mysqli_query($con,"UPDATE users SET username='".$_POST['username']."', password='".$_POST['password']."', role='".$_POST['role']."', emp_id='".$_POST['emp_id']."', student_id = '".$_POST['student_id']."' WHERE id='".$_POST['id']."'") or die("error");
            if($res1){
                header("location: ../users.php?id=".$_POST['id']."&update=success");
            } else {
                header("location: ../users.php?id=".$_POST['id']."&update=fail");
            }
        } elseif($_GET['mode'] == 'add'){
            $res = mysqli_query($con,"INSERT INTO employees(first_name, middle_name, last_name, office_id) VALUES('".$_POST['first_name']."','".$_POST['middle_name']."','".$_POST['last_name']."','".$_POST['office']."')") or die("error");
            if($res){
                header("location: ../employees.php");   
            } else {
                header("location: ../addemp.php?save=fail");   
            }
            $res1 = mysqli_query($con,"INSERT INTO users(username, password, role, emp_id, student_id) VALUES('".$_POST['username']."','".$_POST['password']."','".$_POST['role']."','".$_POST['emp_id']."','".$_POST['student_id']."')");
            if($res1){
                header("location: ../users.php");   
            } else {
                header("location: ../adduser.php?save=fail");   
            }
        }   
    }

     
?>