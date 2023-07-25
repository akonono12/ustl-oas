<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != 1)
    {
        header("location: login-form.html");
    }
    $sql = "SELECT * FROM uploads WHERE uploader_id = '".$_GET['id']."'";
    $res = mysqli_query($con, $sql);
    $numrows = mysqli_num_rows($res);

    if($numrows > 0){
        while($n = mysqli_fetch_array($res)){
            echo "<div style='float: left;width: 100%;height: 100%;'>";
            echo "<iframe src='".$n['location']."' width='100%' height='100%'></iframe>";
            echo "</div>";
        }
    }
    
?>