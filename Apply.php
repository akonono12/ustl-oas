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
              <li class="active"><a class="nav-link" href="Apply.php">Application</a></li>
              <li ><a class="nav-link" href="upload.php">Upload</a></li>
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
      <table class="table">
        <tr>
          <th>S.No</th>
          <th>Scholarship</th>
          <th>Applicant</th>
          <th>Contact Number</th>
          <th>Status</th>
        </tr>
      <?php
        $res = mysqli_query($con,"SELECT *, applicants.id as app_id FROM `applicants` LEFT JOIN scholarships ON applicants.scholarships_id = scholarships.id WHERE student_id = '".$_SESSION['student_id']."'");
        $numrows = mysqli_num_rows($res);
        if($numrows > 0){
          //show table of applied scholarships and requirements
          while($row=mysqli_fetch_array($res)){
      ?>
        <tr>
          <td><?php echo $row['scholarships_id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['last_name'].", ".$row['first_name']." ".$row['middle_name']; ?></td>
          <td><?php echo $row['contact_num']; ?></td>
          <td>
            <?php
              if($row['graded'] == 1){
                //check if grade is passed on the requirements of the scholarship
                $res2 = mysqli_query($con,"select (CASE WHEN c.grade >= b.min_grade THEN 'passed' ELSE 'failed' END) as result from applicants as a LEFT JOIN scholarships as b ON a.scholarships_id = b.id LEFT JOIN students as c ON a.student_id = c.id WHERE a.id =".$row['app_id']);
                $row2=mysqli_fetch_array($res2);
                if($row2['result'] == 'passed'){
                  if($row['processed'] == 1){
                    if($row['approved'] == 1){
                      echo "Application for Scholarship is now Approved";
                    } else {
                      echo "Application is waiting for the final approval.";
                    }
                  } else {
                    echo "Your Applications is still on process.";
                  }
                } else {
                  echo "You did not reach the minimum grade qouta.";
                }
              } else {
                echo "Your Applications is still being assesed by the Dean.";
              }
            ?>
          </td>
        </tr> 
      <?php      
          }
        } 
        
      ?>
      </table>
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
