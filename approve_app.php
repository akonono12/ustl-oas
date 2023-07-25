<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] !== 1)
    {
        header("location: Login-form.html");
    }
    mysqli_query($con,"UPDATE applicants SET processed = 1 WHERE id = '".$_GET['id']."'");
    header("location: Applicant.php?q=approve&status=success");
?>