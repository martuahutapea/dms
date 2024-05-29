 <!-- Include the header of the dashboard -->
 <?php include '../dashboard/header.php'; ?>
 <?php
session_start();

// Check if the user has an acces to login to the page
if (!isset($_SESSION["user_id"]) ||!isset($_SESSION["user_password"]) || $_SESSION["user_role"] != "dean") {
    // $ps_id_id = $_SESSION["user_id"];
    // Redirect to login page
    header("Location: /dms/index.php");
    exit;
}

?>

<?php


if(isset($_SESSION['user_id'])){
$the_dean_id = $_SESSION['user_id'];


$query = "SELECT * FROM dean WHERE dean_id = $the_dean_id";

// Sending the query
$select_dean_profile = mysqli_query($connection, $query);


if(!$select_dean_profile){
    die('Query Failed' .mysqli_error($connection));
}

while($row = mysqli_fetch_array($select_dean_profile)){
    $dean_id = $row["dean_id"];
    $dean_firstname = $row["dean_firstname"];
    $dean_lastname = $row["dean_lastname"];
    $dean_email = $row["dean_email"];
    $dean_password = $row["dean_password"];
    $dean_phonenumber = $row["dean_phonenumber"] ;
    $dean_office = $row["dean_office"];
    $dean_image = $row["dean_image"];
    $hall_id = $row["hall_id"];
}
}

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
          <a href="room.php" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
              aria-expanded="false"><i class="fa-solid fa-building pe-2"></i>
              Hall
          </a>
          <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
              <li class="sidebar-item ps-2">
                  <a href="hall.php" class="sidebar-link ">View All Halls</a>
              </li>
              <li class="sidebar-item ps-2">
                  <a href="hall.php?source=add_hall" class="sidebar-link">Add Hall</a>
              </li>
              </li>
              <!-- <li class="sidebar-item ps-2">
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
    
    $query = "SELECT dean_image, dean_password FROM dean WHERE dean_id = $profile";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $dean_image = $row["dean_image"];
    $dean_password = $row["dean_password"];
    echo "<img src='../images/". $dean_image. "' alt='' width='38' height='38'>";
} else {
    // Display a default profile picture
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
          <div class="container-fluid">
            <div class="mb-3">
              <h1>Profile</h1>
              <h6 class="text-dark"><?= $dean_firstname. ' '. $dean_lastname ?></h6>
              <hr>
            </div>
            
        



    <!-- Content Goes here -->

    <?php



if (isset($_POST['update_profile'])) {
    $dean_email = $_POST['dean_email'];
    $dean_password = $_POST['dean_password'];
    $dean_phonenumber = $_POST['dean_phonenumber'];
    $file_name = $_FILES['picture']['name'];
    $file_tmp_name = $_FILES['picture']['tmp_name'];

    // Hash the password if a new password was entered
    if (!empty($dean_password)) {
        $hashed_password = password_hash($dean_password, PASSWORD_DEFAULT);
    } else {
        // If no new password was entered, use the existing password
        $hashed_password = $_POST['dean_password'];
    }

    // Move the uploaded file to the images directory
    if (!empty($file_name)) {
        move_uploaded_file($file_tmp_name, "../images/$file_name");
    }

    // Prepare the query values
    $query = "UPDATE `dean` SET dean_email = '$dean_email', dean_password = '$hashed_password', dean_image = '$file_name' WHERE `dean_id` = $the_dean_id";

    // Send the query
    $edit_user_query = mysqli_query($connection,$query);

    if(!$edit_user_query){
        die('Query Failed'.mysqli_error($connection));
    }

    echo "<div class='alert alert-success' id='success-alert'>Profile updated successfully. </div>";
}

?>






<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">



    <div class="form-group mb-3">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" value="<?= $dean_email ?>" name="dean_email">
    </div>
    
    <div class="form-group mb-3">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" value="<?= $dean_password ?>" name="dean_password" required>
    </div>

    <div class="form-group mb-3">
        <label for="post_content">Phone Number</label>
        <input type="text" class="form-control" value="<?= $dean_phonenumber ?>" name="dean_phonenumber" required>
    </div>




    <div class="form-group mb-3">
        <label for="post_content">Picture</label>
        <input type="file" class="form-control" value="<?= $dean_image ?>" name="picture">
    </div>





    <div class="form-group mb-3">
        <input class="btn btn-primary" type="submit" name="update_profile" value="Update">
    </div>
    
</form>
            
            
 
<!-- End form -->




          </div>
        </main>
            <!-- End of the Content -->

  </div>


</div>


  <!-- End of Main Content -->
</div>


<script>
    setTimeout(function() {
        $("#success-alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 3000);
</script>



 <!-- Include the footer of the dashboard -->
 <?php include '../dashboard/footer.php'; ?>

