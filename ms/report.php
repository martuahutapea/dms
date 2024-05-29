 <?php
 
 include '../dashboard/header.php'; 
 include "../database/db.php";

//  Start the session
session_start();

// Check if the user has an acces to login to the page
if (!isset($_SESSION["user_id"]) ||!isset($_SESSION["password_hash"]) || $_SESSION["user_role"] != "ms") {
    // Redirect to login page
    header("Location: /dms/index.php");
    exit;
}


 $action ="";
 $report_id = "";
 if(isset($_GET['action'])){
    $action = $_GET['action'];
 }

 if(isset ($_GET['report_id'])){
    $report_id = $_GET['report_id'];
 }



$message ="";

 if($action == 'progress'){
    $query = "UPDATE report SET report_status='3' WHERE report_id=$report_id";
    // echo $query;
    // die;
    $approved_status = mysqli_query($connection, $query);
    if(isset($approved_status)){
        $message = "Report In-progres";
    }
 }  

 if($action == 'completed'){
    $query = "UPDATE report SET report_status='5' WHERE report_id=$report_id";
    $approved_status = mysqli_query($connection, $query);
    if(isset($approved_status)){
        $message = "Report Coompleted";
    }
 }
 ?>
 
 
 <!-- Include the header of the dashboard -->
 <?php include '../dashboard/header.php'; ?>

 <?php ob_start(); ?>


    
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
            <a href="index.php" class="sidebar-link">
                <i class="fa-solid fa-building pe-2"></i>
                Hall
            </a>
        </li>





        <li class="sidebar-item">
            <a href="ms.php" class="sidebar-link">
                <i class="fa-solid fa-wrench pe-2"></i>
                Maintenace Service
            </a>
        </li>

        <li class="sidebar-item">
            <a href="report.php" class="sidebar-link">
                <i class="fa-solid fa-comment pe-2"></i>
                Report
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

    <!--  Top Bar -->
    <nav class="navbar navbar-expand border-bottom" style="height: 4rem;">
        <div class="navbar-collapse navbar">
            <ul class="navbar-nav ms-auto profile-menu"> 
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="profile-pic">
                

                <?php
// Check if the ps_picture session variable is set
if(isset($_SESSION['user_id'])){
    $profile = $_SESSION['user_id'];
    
    $query = "SELECT ps_picture FROM plant_service WHERE ps_id = $profile";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $ps_picture = $row["ps_picture"];
    echo "<img src='../images/". $ps_picture. "' alt='' width='38' height='38'>";
} else {
    // Display a default profile picture
    echo "<img src='../images/default_profile.png' alt='' width='38' height='38'>";
}
?>

                    <!-- <img src="https://source.unsplash.com/250x250?girl" alt="Profile Picture" style="width: 100px; height: 100px;"> -->
                </div>
            <!-- You can also use icon as follows: -->
              <!--  <i class="fas fa-user"></i> -->
              </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-user pe-2"></i> Profile </a></li>
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
      
        case 'update_urgency';
        include "includes/update_urgency.php";
        break;


        case '200';
        echo "Nice 200";
        break;

default:
//Include the view all user.php to  display the table.
include "includes/list_approved_report.php";

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

