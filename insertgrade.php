<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] !== 1)
    {
        header("location: Login-form.html");
    }
               
    if(isset($_POST['submitGrade'])){
    	mysqli_query($con, "UPDATE students SET grade = '".$_POST['student_grade']."' WHERE id = '".$_POST['student_id']."'");
        mysqli_query($con, "UPDATE applicants SET graded = 1 WHERE id ='".$_POST['applicant_id']."' ");
        header("location: Applicant3.php?q=approve&status=success");
        echo "Grade has been entered.";
    }
              
    
?>