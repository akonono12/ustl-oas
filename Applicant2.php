<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != 1)
    {
        header("location: login-form.html");
    }
    $sql = "SELECT applicants.*, scholarships.name, scholarships.id as s_id FROM applicants, scholarships WHERE applicants.scholarships_id = scholarships.id AND applicants.processed = 1 AND applicants.approved = 0";
    //echo "<br>".$sql;
    $res = mysqli_query($con, $sql);
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
              <li class="active"><a class="nav-link" href="Applicant.php">Applicants</a></li>
              <li><a class="nav-link" href="Scholars.php">Scholars</a></li>
            <?php
              elseif($_SESSION['role']=='admin2'):
            ?>
              <li class="active"><a class="nav-link" href="Applicant2.php">Applicants</a></li>
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

    <!-- Header with Background Image -->
    

    <br>
    <br>

    <!-- /.container -->
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
          while ($r = mysqli_fetch_assoc($res)) {
        ?>
        <tr>
          <td><?php echo $r['scholarships_id']; ?></td>
          <td><?php echo $r['name']; ?></td>
          <td><?php echo $r['last_name'].", ".$r['first_name']." ".$r['middle_name']; ?></td>
          <td><?php echo $r['contact_num']; ?></td>
          <td>
            <a href="view_docs.php?id=<?php echo $r['id']; ?>" target="_blank">View Documents</a>
            <a href="?id=<?php echo $r['id']; ?>">Approve</a>
            <a href="delete.php?id=<?php echo $r['id']; ?>">Delete</a>
          </td>
        </tr>
        <?php } ?>
      </table>
      <div class="col-lg-12">
        <?php
          if(isset($_GET['id'])){
            $qry = "SELECT applicants.*, scholarships.name, scholarships.id as s_id FROM applicants, scholarships WHERE applicants.scholarships_id = scholarships.id AND applicants.id = ".$_GET['id'];
            //echo "<br>".$sql;
            $data = mysqli_query($con, $qry);
            $n = mysqli_fetch_assoc($data);
        ?>
          <form method="post" enctype="multipart/form-data">
            <br>
            <p class="form-signin-heading">Docs Checklist for: <strong><?php echo $n['first_name']." ".$n['middle_name']." ".$n['last_name']; ?></strong></p>
            <div class="form-group">
              <?php
                $res = mysqli_query($con,"SELECT * FROM scholarship_reqs WHERE scholarship_id = ".$n['s_id']);
                $numrows = mysqli_num_rows($res);
                if($numrows > 0){
                  //show table of applied scholarships and requirements
                  while($row=mysqli_fetch_array($res)){
              ?>
                    <input type="checkbox" name="doc_check[]" value="<?php echo $row['req_id']; ?>"><?php echo $row['details']; ?><br>
              <?php
                  }
                } else {
                  echo "No requirements? Please check your databse.";
                }
              ?>
              <!-- <label for="exampleInputFile">File input</label>
              <input type="file" name="profile" id="exampleInputFile" required> -->
            </div>
            <input type="submit" name="submitApp" value="Submit"/>
          </form>
        <?php
          }
        ?>
      </div>
    </div>
  <?php
    if(isset($_POST['submitApp'])){
      foreach($_POST['doc_check'] as $a){
        mysqli_query($con,"INSERT INTO applicant_docscheck(application_id,req_id) VALUES('".$_GET['id']."','$a')");
      }
      mysqli_query($con, "UPDATE applicants SET approved = 1 WHERE id =".$_GET['id']);
      header("location: Applicant2.php");
      // $name = $_FILES['profile']['name'];
      // $size = $_FILES['profile']['size'];
      // $type = $_FILES['profile']['type'];
      // $tmp_name = $_FILES['profile']['tmp_name'];
      // $location = "uploads/";

      // if(($size > 1000000)){
      //   die("Error - File too big");
      // }

      // if(($type != "application/pdf")){
      //   die("Error - File not PDF");
      // }

      // $name = $_FILES['profile']['name'];
      // $size = $_FILES['profile']['size'];
      // $type = $_FILES['profile']['type'];
      // $tmp_name = $_FILES['profile']['tmp_name'];
      // $location = "uploads/";

      // if(move_uploaded_file($tmp_name, $location.$name)){
        
      //   //echo $sql = "INSERT INTO `upload` (name, size, type, location) VALUES ('$name', '$size', '$type', '$location$name')";
      //   $sql = "INSERT INTO `uploads` (name, size, type, location, uploader_id) VALUES ('$name', '$size', '$type', '$location$name','".$_GET['id']."')";
      //   $res = mysqli_query($con, $sql);
      //   if($res){
      //     echo "Uploaded successfully";
      //     mysqli_query($con, "UPDATE applicants SET approved = 1 WHERE id =".$_GET['id']);
      //     header("location: Applicant2.php");
      //   }
      // }else{
      //   echo "Failed to Upload";
      // }
    }

    if(isset($_GET['q'])){
      if($_GET['q'] == 'approve'){
        if($_GET['status'] == 'success'){
          echo "Applicant is now Approved for Scholarship.";
        }
      }
    }
  ?>
</div>
    

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
