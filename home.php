<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != 1)
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
        <div id="navbar" class="navbar-collapse collapse" id="navbarResponsive">
          <ul class="nav navbar-nav ml-auto">
            <li class="active"><a class="nav-link" href="home.php">Home
			<span class="sr-only">(current)</span>
			</a></li>
            <?php
              if($_SESSION['role'] == 'superadmin'):
            ?>
              <li><a class="nav-link" href="Students.php">Students</a></li>
              <li><a class="nav-link" href="Employees.php">Employees</a></li>
              <li><a class="nav-link" href="Scholarships.php">Scholarships</a></li>
              <li><a class="nav-link" href="users.php">Users</a></li>
              <li><a class="nav-link" href="office.php">Offices</a></li>            
            <?php
              elseif($_SESSION['role']=='admin'):
            ?>
              <li><a class="nav-link" href="Applicant.php">Applicants</a></li>
              <li><a class="nav-link" href="Scholars.php">Scholars</a></li>
            <?php
              elseif($_SESSION['role']=='admin2'):
            ?>
              <li class=""><a class="nav-link" href="Applicant2.php">Applicants</a></li>
            <?php
              elseif($_SESSION['role']=='admin3'):
            ?>
              <li class=""><a class="nav-link" href="Applicant3.php">Applicants</a></li>
			      <?php
              elseif($_SESSION['role']=='user'):
            ?>
              <li><a class="nav-link" href="SchoProg.php">Scholarship Programs</a></li>
              <li><a class="nav-link" href="Apply.php">Application</a></li>
              <li class=""><a class="nav-link" href="upload.php">Upload</a></li>
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
    <header class="">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <br><br>
            <img src="pics/UST-L cover photo.jpg" style="width:800px;height:300px;">
            		  </div>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <br><br><br><br><br><br><br>
     <div class="container">

      <div class="row">
        <div class="col-sm-20">
          <h2 class="mt-4">MISSION</h2>
          <p> ~To utilize online technology trough a web based software for applying in scholarship programs in University of Santo Thomas-Legazpi~</p>
          <h2 class="mt-4">VISION</h2>
          <p> ~To Create Automated process for identifying the qualified applicants by using sorthing algorithms that can automatically screen the most qualified applications~ </p>
        </div>
  
      </div>
     
    </div>
      

    
    <!-- /.container -->
    <br><br><br><br><br>
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
