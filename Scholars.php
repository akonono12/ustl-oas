<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != 1)
    {
        header("location: login-form.html");
    }
    $sql = "SELECT applicants.*, scholarships.name, scholarships.id as s_id FROM applicants, scholarships WHERE applicants.scholarships_id = scholarships.id AND processed = 1 AND approved = 1";
    $res = mysqli_query($con, $sql);
    $numrows = mysqli_num_rows($res);
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
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
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
              <li class="active"><a class="nav-link" href="Scholars.php">Scholars</a></li>
			<?php
              elseif($_SESSION['role']=='user'):
            ?>
              <li><a class="nav-link" href="SchoProg.php">Scholarship Programs</a></li>
              <li><a class="nav-link" href="Application.php">Application</a></li>
              <li><a class="nav-link" href="Grades.php">Grades</a></li>
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
    
    <br>
    <br>
    <br>
    <!-- Header with Background Image -->
    <div class="container">
      <div class="row">
        <table class="table">
          <tr>
            <th>S.No</th>
            <th>Scholarship</th>
            <th>Applicant</th>
            <th>Contact Number</th>
            <th>Action</th>
          </tr>
          <?php
            if($numrows > 0):
            while ($r = mysqli_fetch_assoc($res)) {
          ?>
          <tr>
            <td><?php echo $r['scholarships_id']; ?></td>
            <td><?php echo $r['name']; ?></td>
            <td><?php echo $r['last_name'].", ".$r['first_name']." ".$r['middle_name']; ?></td>
            <td><?php echo $r['contact_num']; ?></td>
            <td>
              <a href="view_docs.php?id=<?php echo $r['id']; ?>" target="_blank">View Documents</a>
              <a href="delete.php?id=<?php echo $r['id']; ?>">Remove</a>
            </td>
          </tr>
          <?php } //end of while
            else:
              echo "<tr><td colspan=5>No Data</td></tr>";
            endif;
          ?>
        </table>
      </div>
      <?php
        if(isset($_GET['q'])){
          if($_GET['q'] == 'approve'){
            if($_GET['status'] == 'success'){
              echo "Applicant is Approved for Initial Scholarship Screening/Application.";
            }
          }
        }
      ?>
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
