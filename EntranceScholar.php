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

    <title>UNIVERSITY OF SANTO TOMAS-LEGAZPI ONLINE APPLICATION FOR SCHOLARSHIP</title>

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
            <li><a class="nav-link" href="home.php">Home
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
              elseif($_SESSION['role']=='admin2'):
            ?>
              <li class=""><a class="nav-link" href="Applicant2.php">Applicants</a></li>
            <?php
              elseif($_SESSION['role']=='user'):
            ?>
              <li class="active"><a class="nav-link" href="SchoProg.php">Scholarship Programs</a></li>
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
    
      
    <!-- /.container -->
    <br><br>
    <center>
    <img src="pics/Entrance.jpg" style="width:800px;height:500px;">
    <h1>Entrance Scholarship</h1>
    <p><h3>The scholarship is awarded to students who belong to the first five of each honors category:<br> 
    with highest honors, with high honors, with honors. It is open to all students in all program.</h3></p>
    

    <br><br>
    <h1><u>Priveleges</u></h1>
    
      <h3><p>a.) With highest honors - One hundred percent (100%) semestral <br>
          discount on tuition and selected miscellaneous fees.<br><br>
     b.) With high honors - Seventy-five percent (75%) semestral <br>
          discount on tuition and selected miscellaneous fees.<br><br>
     c.) With honors - Fifty percent (50%) semestral <br>
          discount on tuition and selected miscellaneous fees.</p></h3>
    

    </center>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>
  </body>

</html>
