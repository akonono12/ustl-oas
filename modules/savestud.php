<?php
    session_start();
    include('../db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != 1)
    {
        header("location: ../Login-form.html");
    }

    if(isset($_POST['save'])){
        if($_GET['mode'] == 'update'){
            $res = mysqli_query($con,"UPDATE students SET first_name='".$_POST['first_name']."', middle_name='".$_POST['middle_name']."', last_name='".$_POST['last_name']."'  WHERE id='".$_POST['id']."'") or die("error");
            if($res){
                header("location: ../students.php?id=".$_POST['id']."&update=success");    
            } else {
                header("location: ../students.php?id=".$_POST['id']."&update=fail");   
            }

           $res1 = mysqli_query($con,"UPDATE users SET username='".$_POST['username']."', password='".$_POST['password']."', role='".$_POST['role']."', student_id = '".$_POST['student_id']."' WHERE id='".$_POST['id']."'") or die("error");
            if($res1){
                header("location: ../users.php?id=".$_POST['id']."&update=success");
            } else {
                header("location: ../users.php?id=".$_POST['id']."&update=fail");
            }
        } elseif($_GET['mode'] == 'add'){
            $res = mysqli_query($con,"INSERT INTO students(first_name, middle_name, last_name, contact_num) VALUES('".$_POST['first_name']."','".$_POST['middle_name']."','".$_POST['last_name']."','".$_POST['contact_num']."')") or die("error");
            if($res){
                header("location: ../students.php");   
            } else {
                header("location: ../addstud.php?save=fail");   
            }

            $res1 = mysqli_query($con,"INSERT INTO users(username, password, role, student_id) VALUES('".$_POST['username']."','".$_POST['password']."','".$_POST['role']."','".$_POST['student_id']."')");
            if($res1){
                header("location: ../users.php");   
            } else {
                header("location: ../addstud.php?save=fail");   
            }
        }   
    }

?>