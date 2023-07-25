<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] != 1)
    {
        header("location: login-form.html");
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
            <li><a class="nav-link" href="home.php">Home
            <span class="sr-only">(current)</span>
            </a></li>
			<?php
              if($_SESSION['role'] == 'superadmin'):
            ?>
            <li><a class="nav-link" href="Students.php">Students</a></li>
			      <li class="active"><a class="nav-link" href="Employees.php">Employees</a></li>
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
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
   
   <div class="container"> 
        <div class="row">
            <div class="col-md-12"><br><br>
                <h2 id=tables-hover-rows>List of Employees</h2>
                <a href="addemp.php"><button type="button" name="add" class="btn btn-success">Add</button></a>
                <div class=bs-example data-example-id=hoverable-table> 
                    <table class="table table-hover"> 
                        <thead> 
                            <tr>  
                                <th>First Name</th> 
                                <th>Middle Name</th> 
                                <th>Last Name</th> 
                                <th>Office</th>
                                <th>Action</th>
                            </tr> 
                        </thead> 
                        <tbody>
                            <?php
                                $res = mysqli_query($con,"SELECT a.*, b.office_name FROM employees a JOIN office b ON a.office_id = b.id");
                                //$row=mysqli_fetch_all($res,MYSQLI_ASSOC);
                                $numrows = mysqli_num_rows($res);
                                if($numrows > 0){
                                    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
                                        echo "
                                            <tr> 
                                                <td>".$row['first_name']."</td> 
                                                <td>".$row['middle_name']."</td> 
                                                <td>".$row['last_name']."</td> 
                                                <td>".$row['office_name']."</td> 
                                                <td>
                                                    <a href='editemp.php?id=".$row['id']."'><button type='button' class='btn btn-info'>Update</button></a>
                                                    <a href='./modules/delemp.php?id=".$row['id']."'><button type='button' class='btn btn-danger'>Delete</button></a>
                                                </td>
                                            </tr>
                                            ";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No Data</td></tr>";
                                }
                                
                            ?>
                             
                        </tbody> 
                    </table> 
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
