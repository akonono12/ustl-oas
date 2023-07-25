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
                <form method="post" enctype="multipart/form-data">
                    <?php
                        $data = mysqli_query($con,"SELECT * FROM scholarships WHERE id ='".$_GET['s_id']."'");
                        $row = mysqli_fetch_array($data);
                    ?>
                    <p>Apply for Scholarship for <strong><?php echo $row['name'] ?></strong></p>
                    First Name<input type="text" name="first_name" id="" required>
                    <br><br>
                    Middle Name<input type="text" name="middle_name" id="" required>
                    <br><br>
                    Last Name<input type="text" name="last_name" id="" required>
                    <br><br>
                    Contact Number<input type="text" name="contact_num" id="" required>
                    <br><br><br><br>
                    <p class="form-signin-heading">Upload Requirements (PDF File only)<br>
                      *Requirements to submit* <br>
                      -Certification of good moral character<br>
                      -One (1) piece of 2"x2" picture<br>
                    </p>


                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" name="profile" id="exampleInputFile" required>
                    </div>
                    <select name="filetype">
                     <option value="pdf">Pdf</option>
                     <option value="jpg">Jpg</option>
                    </select>

                    <input type="submit" name="submitApp" value="Submit"/>     
                </form>
              </center>
                <?php
                    if(isset($_POST['submitApp'])){

                      $name = $_FILES['profile']['name'];
                      $size = $_FILES['profile']['size'];
                      $type = $_FILES['profile']['type'];
                      $tmp_name = $_FILES['profile']['tmp_name'];
                      $location = "uploads/";

                      if(($size > 1000000)){
                        die("Error - File too big");
                      }

                      mysqli_query($con,"INSERT INTO `applicants` VALUES('','".$_SESSION['student_id']."','".$_POST['first_name']."','".$_POST['middle_name']."','".$_POST['last_name']."','".$_GET['s_id']."','".$_POST['contact_num']."','','',0,0)");
                      $lastid = mysqli_insert_id($con);

                      if(move_uploaded_file($tmp_name, $location.$name)){
                        
                        //echo $sql = "INSERT INTO `upload` (name, size, type, location) VALUES ('$name', '$size', '$type', '$location$name')";
                        $sql = "INSERT INTO `uploads` (name, size, type, location, uploader_id) VALUES ('$name', '$size', '$type', '$location$name','$lastid')";
                        $res = mysqli_query($con, $sql);
                        if($res){
                          echo "Uploaded successfully";
                        }
                      }else{
                        echo "Failed to Upload";
                      }

                      echo "<br>Success!<br>";
                    }
                ?>
            </div>
        </div>
    </div>

    <br>  
    <br><br><br><br><br><br><br><br>
    
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
