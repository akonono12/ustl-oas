<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] !== 1)
    {
        header("location: Login-form.php");
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
        <a class="navbar-brand" href="home.php">
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
              <li class="active"><a class="nav-link" href="SchoProg.php">Scholarship Programs</a></li>
              <li><a class="nav-link" href="Apply.php">Application</a></li>
              <li><a class="nav-link" href="upload.php">Upload</a></li>
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
    <header class="business-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
                  </div>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <div class="row">
        <div class="col-sm-4 my-4">
          <div class="card">
            
            <div class="card-body">
              <h4 class="card-title">Entrance Scholarship</h4>
              <p class="card-text" style="text-align:justify">The scholarship is awarded to students who belong to the first five of each honors category: with highest honors, with high honors, with honors. It is open to all students in all program.<br><br> 
              <form>
              <input type="button" value="Learn more..." class="btn btn-success btn-xs" onclick="window.location.href='EntranceScholar.php'" />
              </form>
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card">
            
            <div class="card-body">
              <h4 class="card-title">Academic Scholarship</h4>
              <p class="card-text" style="text-align:justify">The scholarship is awarded to students who excel in academics on semestral basis with a regular carrying load as specified in the curriculum and earned a general weighted average (GWA) of 87% or higher and with ni grade below 85% and dropped subject.<br><br> 
              <form>
             <input type="button" value="Learn more..." class="btn btn-success btn-xs" onclick="window.location.href='AcademicScholar.php'" />
              </form>
            </p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card">
            
            <div class="card-body">
              <h4 class="card-title">Arts Scholarship</h4>
              <p class="card-text" style="text-align:justify">The scholarship grant covers chorale,dance troupe, theatre, band and string ensemble. The scholarship is open to students of all programs.<br><br> 
              <form>
              <input type="button" value="Learn more..." class="btn btn-success btn-xs" onclick="window.location.href='ArtsScholar.php'" />
              </form>
            </p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card">
            
            <div class="card-body">
              <h4 class="card-title">Sports Scholarship</h4>
              <p class="card-text" style="text-align:justify">The scholarship is granted to highly talented in sports such as basketball, badminton, table tennis, volley ball and athletics. The scholarship is open to students in all programs.<br><br> 
              <form>
              <input type="button" value="Learn more..." class="btn btn-success btn-xs" onclick="window.location.href='SportsScholar.php'" />
              </form>
            </p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card">
            
            <div class="card-body">
              <h4 class="card-title">Rector Scholarship</h4>
              <p class="card-text" style="text-align:justify">The scholarship is awarded to students who graduated from Senior High School with highest honors. This is given to only one student per board program and is on a semestral basis subject to a retention policy.<br><br> 
              <form>
              <input type="button" value="Learn more..." class="btn btn-success btn-xs" onclick="window.location.href='RectorScholar.php'" />
              </form>
            </p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card">
            
            <div class="card-body">
              <h4 class="card-title">Students Assistance Scholarship</h4>
              <p class="card-text" style="text-align:justify">The Student Assistantship Grant (SAG) is a scholarship for poor but deserving students. It is open to stundents in selected programs.<br><br> 
              <form>
              <input type="button" value="Learn more..." class="btn btn-success btn-xs" onclick="window.location.href='SAScholar.php'" />
              </form>
            </p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card">
            
            <div class="card-body">
              <h4 class="card-title">Beadles Scholarship</h4>
              <p class="card-text" style="text-align:justify">This special grant is for student assistants serving in the St. Raymond of Penafort Convent.<br><br> 
              <form>
              <input type="button" value="Learn more..." class="btn btn-success btn-xs" onclick="window.location.href='BeadlesScholar.php'" />
              </form>
            </p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card">
            
            <div class="card-body">
              <h4 class="card-title">Teacher Educational Grant</h4>
              <p class="card-text" style="text-align:justify">The grant is awarded to takers of Bachelor of Secondary Education (BSEd) and Bachelor of Elementtary Education (BEEd). Takers must have a GWA of 85% and above with no grade below 80% in Grade 12.<br><br> 
              <form>
              <input type="button" value="Learn more..." class="btn btn-success btn-xs" onclick="window.location.href='TeacherEducScholar.php'" />
              </form>
            </p>
            </div>
          </div>
        </div>

      </div>
      

    
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
