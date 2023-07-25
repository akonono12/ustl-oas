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
            <li class="nav-item">
              <a class="nav-link" href="home.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php
              if($_SESSION['role'] == 'superadmin'):
            ?>
            <li class="active"><a class="nav-link" href="Students.php">Students</a></li>
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

    <!-- Page Content -->
    <div class="container">
    <div class="row">
      <div class="col-md-12"><br><br>
        <h2>Edit</h2>
        <center>
        <form method="post" action="modules/savestud.php?mode=update">
          <?php
            $data = mysqli_query($con,"SELECT * FROM students WHERE id = '".$_GET['id']."' LIMIT 1");
            $n = mysqli_fetch_array($data);
          ?>
          <input type="hidden" name="id" value="<?php echo $n['id']; ?>">
          <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $n['first_name']; ?>" >
          </div>
          <div class="form-group">
            <label for="mname">Middle Name</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" value="<?php echo $n['middle_name']; ?>" >
          </div>
          <div class="form-group">
            <label for="lname">Lastname</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $n['last_name']; ?>" >
          </div>
          <form method="post" action="modules/saveuser.php?mode=update">
          <?php
            $data = mysqli_query($con,"SELECT * FROM users WHERE id = '".$_GET['id']."'");
            $n = mysqli_fetch_array($data);
          ?>
          <input type="hidden" name="id" value="<?php echo $n['id']; ?>">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required value ="<?php echo $n['username']; ?>" >
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required value ="<?php echo $n['password']; ?>" >
          </div>
          <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            <?
            if ($_POST["password"] === $_POST["confirm_password"]) {
               echo "Matched!"     
            } else {
              echo "Password don't match!";
            }
            ?>
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="" name="role" >
              <option value='user' <?php ($n['role'] == "user" ? "selected":""); ?> >user</option>
            </select>
          </div>
          <button type="submit" name="save" class="btn btn-default">Save</button>
        </form>
        </center>     
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
