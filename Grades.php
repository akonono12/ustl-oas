<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] !== 1)
    {
        header("location: Login-form.html");
    }
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>University Of Santo Tomas - Legazpi Online Application for Scholarship</title>


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    

    <!-- Custom styles for this template -->
    <link href="css/business-frontpage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="home.html">
    <img id="brand-image" alt="Website Logo" src="pics/ustlogo.png"> </img>
    </a>
    <font color="white"> <h6>UST-LEGAZPI ONLINE APPLICATION FOR SCHOLARSHIP</h6></font>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
           <ul class="nav navbar-nav ml-auto">
            <li><a class="nav-link" href="Home.php">Home
      <span class="sr-only">(current)</span>
      </a></li>
            <?php
              if($_SESSION['role'] == 'superadmin'):
            ?>
      <li><a class="nav-link" href="Employees.php">Employees</a></li>
            <li><a class="nav-link" href="users.php">Users</a></li>
            <li><a class="nav-link" href="office.php">Offices</a></li>
            <?php
              elseif($_SESSION['role']=='admin'):
            ?>
              <li><a class="nav-link" href="Applicant.php">Applicants</a></li>
              <li><a class="nav-link" href="Scholars.php">Scholars</a></li>
      <?php
              elseif($_SESSION['role']=='user'):
            ?>
              <li><a class="nav-link" href="SchoProg.php">Scholarship Programs</a></li>
              <li><a class="nav-link" href="Grades.php">Apply</a></li>
            <?php 
              endif;
            ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a class="nav-link" href="modules/logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header with Background Image -->
    <br>  
    <br>
    

    <!-- Page Content -->
    
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <center>
          <form method="post" action="Grades.php">
            <p>Your Overall Grade</p>
            <input type="number" min="0.00" name="student_grade" required />
            <input type="submit" name="submitGrade" value="Check for Scholarship"/>     
          </form>
        </center>
        </div>
      </div>
      <div class="row">
      <div class="col-lg-12">
       <?php
        if(isset($_POST['submitGrade'])){
          $res = mysqli_query($con,"SELECT * FROM `scholarships` WHERE ".$_POST['student_grade']." >= min_grade");
          $numrows = mysqli_num_rows($res);
          if($numrows > 0){
              echo "<p>These are the Scholarships you qualify for.</p>";
              echo '<center>';
              while($row=mysqli_fetch_array($res)){
                  
                  echo '<div<form><input type="button" value="'.$row['name'].'" onclick="window.location=\'applyscholarship.php?s_id='.$row['id'].'\'" /></form><br>';
              }
              echo '</center>';
          } else {
              echo "You are not qualified for a scholarship.";
          }
        }
      ?>
      </div>
      </div>
    </div>
    
    <br>  
    <br>
    
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
