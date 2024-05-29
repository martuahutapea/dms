<!-- Include the header of the dashboard -->
<?php require '../dashboard/header.php'; ?>



<?php
session_start();

// Check if the user has an acces to login to the page
if (!isset($_SESSION["user_id"]) ||!isset($_SESSION["user_password"]) || $_SESSION["user_role"] != "student") {
    // Redirect to login page
    header("Location: /dms/index.php");
    exit;}

?>
   
<!-- <div class="wrapper"> -->
<div class="wrapper">
  <!-- Navigation Sidebar -->
  <aside id="sidebar" class="js-sidebar">
    <div class="h-100">
      <div class="sidebar-logo text-center">
        <img src="../images/aiulogo.png" class="rounded-circle mx-auto d-block h-75 w-75 pb-3" alt="" />
        <a href="#" class="fs-2 fw-bold text-center text-dark">DMS</a>
        <!-- <figure class="figure rounded mx-auto d-block"> -->
  <!-- <figcaption class="figure-caption fs-2 fw-bold text-center p-3">DMS</figcaption> -->
<!-- </figure> -->
      </div>  
      <hr size="5" />

      <!-- Sidebar Menu -->
      <ul class="sidebar-nav list-unstyled">
        <li class="sidebar-item">
            <a href="index.php" class="sidebar-link">
                <i class="icon fa-solid fa-gauge pe-2"></i>
                Dashboard
            </a>
        </li>
        
        <li class="sidebar-item">
            <a href="announcement.php" class="sidebar-link">
                <i class="fa-solid fa-bullhorn pe-2"></i>
                Announcement
            </a>
        </li>

        <li class="sidebar-item">
            <a href="inspection.php" class="sidebar-link">
                <i class="fa-solid fa-clipboard pe-2"></i>
                Room Inspection
            </a>
        </li>
        <li class="sidebar-item">
            <a href="report.php" class="sidebar-link">
                <i class="fa-solid fa-hammer pe-2"></i>
                Report
            </a>
        </li>
        <li class="sidebar-item">
            <a href="handbook.php" class="sidebar-link">
                <i class="fa-solid fa-book pe-2"></i>
                Dormitory Handbook
            </a>
        </li>



      <hr size="5" />
      <li class="sidebar-item">
            <a href="../logout.php" class="sidebar-link">
                <i class="fa-solid fa-right-from-bracket pe-2"></i>
                Logout
            </a>
        </li>
      <!-- End of Sidebar Menu -->

    </div>
  </aside>
  <!-- End of Navigation Sidebar -->

  
  <div class="main">
    <!-- Top Bar -->
  <nav class="navbar navbar-expand border-bottom" style="height: 4rem;">
        <div class="navbar-collapse navbar">
            <ul class="navbar-nav ms-auto profile-menu"> 
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="profile-pic">


<!--  Profile Picture -->
<?php
// Check if the ps_picture session variable is set
if (isset($_SESSION['user_id'])) {
    $profile = $_SESSION['user_id'];

    $query = "SELECT student_firstname, student_lastname, student_image, student_password FROM student WHERE student_id = $profile";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $student_firstname = $row["student_firstname"];
    $student_lastname = $row["student_lastname"];
    $student_image = $row["student_image"];
    $student_password = $row["student_password"];
    if (empty($student_image)) {
        echo "<img src='../images/default_profile.png' alt='' width='38' height='38'>";
      } else {
        echo "<img src='../images/$student_image' alt='' width='38' height='38'>";
      }
    } else {
      echo "<img src='../images/default_profile.png' alt='' width='38' height='38'>";
    }
?>



                </div>
            <!-- You can also use icon as follows: -->
              <!--  <i class="fas fa-user"></i> -->
              </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="student_profile.php"><i class="fa-solid fa-user pe-2"></i> Profile </a></li>
                    <!-- <li><a class="dropdown-item" href="#"><i class="fas fa-cog fa-fw"></i> Settings</a></li> -->
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../logout.php"><i class="fa-solid fa-right-from-bracket pe-2"></i> Log Out</a></li>
                  </ul>
            </li>
        </ul>
        </div>
    </nav>
            <!-- End of Top Bar -->


    <!-- Content Goes here -->
<main class="content px-3 py-2">    
     <h1>Student Dormitory Handbook</h1>   
     <hr>    

    <div class="container">
       
 




    

 





            <div class="row mt-5">
              <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0 illustration">
                  <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                      <div class="col-12">
                        <div class="p-3 m-1 text-center">
                          <h4>Dormitory Handbook, English</h4>
                          <a href='../handbook/1.pdf' target='_blank'>View</a>
                        </div>
                      </div>
                      <div class="col-6 align-self-end text-end">
                        <img src="image/customer-support.jpg" class="img-fluid illustration-img" alt="" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0 illustration">
                  <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                      <div class="col-12">
                        <div class="p-3 m-1 text-center">
                          <h4>Dormitory Handbook, Thai</h4>
                          <a href='../handbook/2.pdf' target='_blank'>View</a>
                        </div>
                      </div>
                      <div class="col-6 align-self-end text-end">
                        <img src="image/customer-support.jpg" class="img-fluid illustration-img" alt="" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>





    
    </div>
</main>
            <!-- End of the Content -->

  </div>


</div>


  <!-- End of Main Content -->
</div>





 <!-- Include the footer of the dashboard -->
 <?php include '../dashboard/footer.php'; ?>

