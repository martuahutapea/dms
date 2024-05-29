<?php
session_start();
ob_start();

// Check if the user has an acces to login to the page
if (!isset($_SESSION["user_id"]) ||!isset($_SESSION["user_password"]) || $_SESSION["user_role"] != "dean") {
    // Redirect to login page
    header("Location: /dms/index.php");
    exit;
}
?> 
 
 
 <?php

include "../database/db.php";


 $action ="";
 $report_id = "";
 if(isset($_GET['action'])){
    $action = $_GET['action'];
 }

 if(isset ($_GET['report_id'])){
    $report_id = $_GET['report_id'];
 }



$message ="";

 if($action == 'approved'){
    $query = "UPDATE report SET report_status='1' WHERE report_id=$report_id";
    $approved_status = mysqli_query($connection, $query);
    if(isset($approved_status)){
        $message = "Report Approved";
    }
 }  

 if($action == 'rejected'){
    $query = "UPDATE report SET report_status='2' WHERE report_id=$report_id";
    $approved_status = mysqli_query($connection, $query);
    if(isset($approved_status)){
        $message = "Report Rejected";
    }
 }
 ?>
 
 
 <!-- Include the header of the dashboard -->
 <?php include '../dashboard/header.php'; ?>




    
<!-- <div class="wrapper"> -->
<div class="wrapper">
  <!-- Navigation Sidebar -->
  <aside id="sidebar" class="js-sidebar">
    <div class="h-100">
      <div class="sidebar-logo text-center">
        <img src="../images/aiulogo.png" class="rounded-circle mx-auto d-block h-75 w-75 pb-3" alt="" />
        <a href="index.php" class="fs-2 fw-bold text-center text-dark">DMS</a>
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
          <a href="room.php" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
              aria-expanded="false"><i class="fa-solid fa-building pe-2"></i>
              Hall
          </a>
          <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
              <li class="sidebar-item ps-4">
                  <a href="hall.php" class="sidebar-link ">View All Halls</a>
              </li>
              <li class="sidebar-item ps-4">
                  <a href="hall.php?source=add_hall" class="sidebar-link">Add Hall</a>
              </li>
              <!-- <li class="sidebar-item ps-4">
                  <a href="add_hall.php" class="sidebar-link">Room Inspection</a>
              </li> -->
          </ul>
      </li>

        <li class="sidebar-item">
            <a href="dean.php" class="sidebar-link">
                <i class="fa-solid fa-user pe-2"></i>
                Dean
            </a>
        </li>
        <li class="sidebar-item">
            <a href="room.php" class="sidebar-link">
                <i class="fa-solid fa-bed pe-2"></i>
                Room
            </a>
        </li>
        <li class="sidebar-item">
            <a href="ms.php" class="sidebar-link">
                <i class="fa-solid fa-wrench pe-2"></i>
                Maintenace Service
            </a>
        </li>
        <li class="sidebar-item">
            <a href="student.php" class="sidebar-link">
                <i class="fa-solid fa-users pe-2"></i>
                Student
            </a>
        </li>
        <li class="sidebar-item">
            <a href="report.php" class="sidebar-link">
                <i class="fa-solid fa-comment pe-2"></i>
                Report
            </a>
        </li>
        <li class="sidebar-item">
            <a href="announcement.php" class="sidebar-link">
                <i class="fa-solid fa-bullhorn pe-2"></i>
                Announcement
            </a>
        </li>
        <li class="sidebar-item">
            <a href="handbook.php" class="sidebar-link">
                <i class="fa-solid fa-book pe-2"></i>
                Dormitory Handbook
            </a>
        </li>
        <!-- <li class="sidebar-item">
          <a href="room.php" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
              aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
              Room
          </a>
          <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
              <li class="sidebar-item">
                  <a href="room.php" class="sidebar-link">Room Inspection</a>
              </li>
              <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Facility</a>
              </li>
          </ul>
      </li> -->

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
   <!--  Top Bar -->
   <nav class="navbar navbar-expand border-bottom" style="height: 4rem;">
          <div class="navbar-collapse navbar">
              <ul class="navbar-nav ms-auto profile-menu"> 
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="profile-pic">


  <!--  Profile Picture -->
  <?php
  // Check if the ps_picture session variable is set
  if(isset($_SESSION['user_id'])){
      $profile = $_SESSION['user_id'];
      
      $query = "SELECT dean_firstname, dean_lastname, dean_image FROM dean WHERE dean_id = $profile";
      $result = mysqli_query($connection, $query);
      $row = mysqli_fetch_assoc($result);
      $dean_firstname = $row["dean_firstname"];
      $dean_lastname = $row["dean_lastname"];
      $dean_image = $row["dean_image"];
  
  if (empty($dean_image)) {
    echo "<img src='../images/default_profile.png' alt='' width='38' height='38'>";
  } else {
    echo "<img src='../images/$dean_image' alt='' width='38' height='38'>";
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
                    <li><a class="dropdown-item" href="dean_profile.php"><i class="fa-solid fa-user pe-2"></i> Profile </a></li>
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
        <h1>Report</h1> 
        <hr>
 <?= $message ?>

    <div class="container">
       
        <!-- Create a complaints report -->


        

                
            

<?php

    if(isset($_GET['source'])){
    $source = $_GET['source'];
    }
    else{
    $source = '';
    }

        switch($source){
        case 'create_report';
        include "includes/create_report.php";
        break;

        // case 'edit_hall';
        // include "includes/edit_hall.php";
        // break;

        // case 'view_hall';
        // include "includes/list_all_report.php";
        // break;

        case '200';
        echo "Nice 200";
        break;

default:
//Include the view all user.php to  display the table.
include "includes/list_all_report.php";

break;
}
?>

            
    
    </div>
</main>
            <!-- End of the Content -->

  </div>


</div>


  <!-- End of Main Content -->
</div>





 <!-- Include the footer of the dashboard -->
 <?php include '../dashboard/footer.php'; ?>

