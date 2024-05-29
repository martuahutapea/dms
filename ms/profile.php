 <!-- Include the header of the dashboard -->
 <?php include '../dashboard/header.php'; ?>
 <?php
session_start();

// Check if the user has an acces to login to the page
if (!isset($_SESSION["user_id"]) ||!isset($_SESSION["password_hash"]) || $_SESSION["user_role"] != "ms") {
    // $ps_id_id = $_SESSION["user_id"];
    // Redirect to login page
    header("Location: /dms/index.php");
    exit;
}

// if(isset($_SESSION['user_id'])){
//     $username = $_SESSION['user_id'];

//     $query = "SELECT * FROM plant_service"; 
//     $result = mysqli_query($connection, $query);
    
//     while($row=mysqli_fetch_array($result)){
//         $ps_id = $row["ps_id"];
//         $ps_firstname = $row["ps_firstname"];
//         $ps_lastname = $row["ps_lastname"];
//         $ps_password = $row["ps_password"];
//         $ps_email = $row["ps_email"];
//         $ps_phonenumber = $row["ps_phonenumber"] ;
//         $ps_office = $row["ps_office"];
//         $ps_picture = $row["ps_picture"];
//         $ps_role = $row["ps_role"];
//     }
// }
?>

<?php
  

if(isset($_SESSION['user_id'])){
$the_ps_id = $_SESSION['user_id'];


$query = "SELECT * FROM plant_service WHERE ps_id = $the_ps_id";

// Sending the query
$select_ps_profile = mysqli_query($connection, $query);


if(!$select_ps_profile){
    die('Query Failed' .mysqli_error($connection));
}

while($row = mysqli_fetch_array($select_ps_profile)){
    $ps_id = $row["ps_id"];
    $ps_firstname = $row["ps_firstname"];
    $ps_lastname = $row["ps_lastname"];
    $ps_password = $row["ps_password"];
    $ps_email = $row["ps_email"];
    $ps_phonenumber = $row["ps_phonenumber"] ;
    $ps_office = $row["ps_office"];
    $ps_picture = $row["ps_picture"];
    $ps_role = $row["ps_role"];

}

// Hash the password if a new password was entered
if (isset($_POST['update_profile'])) {
    $ps_email = $_POST['ps_email'];
    $ps_phonenumber = $_POST['ps_phonenumber'];
    // $ps_password = $_POST['ps_password'];
    if (isset($ps_password)) {
        // Hash password
        $hashed_password = password_hash($ps_password, PASSWORD_DEFAULT);
    }

    $file_name = $_FILES['picture']['name'];
    $file_tmp_name = $_FILES['picture']['tmp_name'];

    // Move the uploaded file to the images directory
    if (!empty($file_name)) {
        move_uploaded_file($file_tmp_name, "../images/$file_name");
    } else {
        // Display a default profile picture
        move_uploaded_file($file_tmp_name, "../images/default_profile.png");
    }

    // Prepare the query values
    $query = "UPDATE `plant_service` SET ps_email = '$ps_email', ps_phonenumber = '$ps_phonenumber', ps_password = '$<PASSWORD>', ps_picture = '$file_name' WHERE `ps_id` = $the_ps_id";

    // Send the query
    $edit_user_query = mysqli_query($connection, $query);

    if (!$edit_user_query) {
        die('Query Failed'. mysqli_error($connection));
    }

    echo "<div class='alert alert-success' id='success-alert'>Profile updated successfully. </div>";
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
            <a href="hall.php" class="sidebar-link">
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
<!--  Profile Picture -->
<?php
// Check if the ps_picture session variable is set
if(isset($_SESSION['user_id'])){
    $profile = $_SESSION['user_id'];
    
    $query = "SELECT ps_picture, ps_password FROM plant_service WHERE ps_id = $profile";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $ps_picture = $row["ps_picture"];
    $ps_password = $row["ps_password"];
    echo "<img src='../images/". $ps_picture. "' alt='' width='38' height='38'>";
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
          <div class="container-fluid">
            <div class="mb-3">
              <h1>Profile</h1>
              <h6 class="text-dark"><?= $ps_firstname. ' '. $ps_lastname ?></h6>
              <hr>
            </div>
            
        



    <!-- Content Goes here -->

 





<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group mb-3">
        <label for="post_content">Phone Number</label>
        <input type="text" class="form-control" value="<?= $ps_phonenumber ?>" name="ps_phonenumber">
    </div>



    <div class="form-group mb-3">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" value="<?= $ps_email ?>" name="ps_email">
    </div>
    




    <div class="form-group mb-3">
        <label for="post_content">Picture</label>
        <input type="file" class="form-control" value="<?= $ps_picture ?>" name="picture">
    </div>

    <div class="form-group mb-3">
        <a href="change_password.php">Change Password?</a>
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

