<?php
    session_start();
    include('../db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != 1)
    {
        header("location: Login-form.php");
    }

    if(isset($_POST['save'])){
        if($_GET['mode'] == 'update'){
            $res = mysqli_query($con,"UPDATE office SET office_name='".$_POST['dept_name']."', office_head_id='".$_POST['dept_head']."' WHERE id='".$_POST['id']."'") or die("error");
            if($res){
                header("location: ../office.php?id=".$_POST['id']."&update=success");   
            } else {
                header("location: ../office.php?id=".$_POST['id']."&update=fail");   
            }
        } elseif($_GET['mode'] == 'add'){
            $res = mysqli_query($con,"INSERT INTO office(office_name,office_head_id) VALUES('".$_POST['dept_name']."','".$_POST['dept_head']."')") or die("error");
            if($res){
                header("location: ../office.php");   
            } else {
                header("location: ../adddept.php?save=fail");   
            }
        }   
    }
?>