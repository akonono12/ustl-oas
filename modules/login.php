<?php
    session_start();
    include('../db.php');
    if(isset($_SESSION['isloggedin']) == 1)
    {
        header("location: ../home.php");
    }
    

    if(isset($_POST['btnsubmit'])){
        $res = mysqli_query($con,"SELECT * FROM users WHERE username='".$_POST['username']."' AND password='".$_POST['password']."' LIMIT 1");
        if(mysqli_num_rows($res) <= 0){
            header("location: ../Login-form.html?err=403");
        } else {
        $row=mysqli_fetch_assoc($res);
        mysqli_close($con);

        $_SESSION['isloggedin'] = 1;
        $_SESSION['role'] = $row['role'];
        if($row['emp_id'] != 0){
            $_SESSION['emp_id'] = $row['emp_id'];
        }

        if($row['student_id'] != 0){
            $_SESSION['student_id'] = $row['student_id'];
        }
        

        header("location: ../home.php");
        }
    }
?>