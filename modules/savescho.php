<?php
    session_start();
    include('../db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != 1)
    {
        header("location: Login-form.php");
    }

    if(isset($_POST['save'])){
        if($_GET['mode'] == 'update'){
            $res = mysqli_query($con,"UPDATE scholarships SET name='".$_POST['scho_name']."', office_id='".$_POST['office']."', min_grade='".$_POST['grade']."' WHERE id='".$_POST['id']."'") or die("error");
            if($res){
                header("location: ../scholarships.php?id=".$_POST['id']."&update=success");   
            } else {
                header("location: ../scholarships.php?id=".$_POST['id']."&update=fail");   
            }
        } elseif($_GET['mode'] == 'add'){
            $res = mysqli_query($con,"INSERT INTO scholarships(name,office_id,min_grade) VALUES('".$_POST['scho_name']."','".$_POST['office']."','".$_POST['grade']."')") or die("error");
            if($res){
                header("location: ../scholarships.php");   
            } else {
                header("location: ../addscho.php?save=fail");   
            }
        }   
    }
?>