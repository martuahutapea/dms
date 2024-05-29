 <!-- Include the header of the dashboard -->
 <?php include '../dashboard/header.php'; 
 include "../database/db.php";?>
 <?php
session_start();


// Check if the user has an acces to login to the page
if (!isset($_SESSION["user_id"]) ||!isset($_SESSION["password_hash"]) || $_SESSION["user_role"] != "ms") {
    // Redirect to login page
    header("Location: /dms/index.php");
    exit;
}

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the user has access to login to the page
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["password_hash"]) || $_SESSION["user_role"] != "ms") {
    // Redirect to login page
    header("Location: /dms/index.php");
    exit;
}

$error = "";
$success = "";

if (isset($_POST['update_password'])) {
    if (isset($_POST['old_password'], $_POST['new_password'], $_POST['confirm_password'])) {
        $ps_id = $_SESSION["user_id"]; 
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if ($connection) {
            $stmt = $connection->prepare("SELECT ps_password FROM plant_service WHERE ps_id = ?");
            $stmt->bind_param("i", $ps_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hashed_password = $row['ps_password'];

                if (password_verify($old_password, $hashed_password)) {
                    if ($new_password === $confirm_password) {
                        $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT);

                        $stmt = $connection->prepare("UPDATE plant_service SET ps_password = ? WHERE ps_id = ?");
                        $stmt->bind_param("si", $hashed_new_password, $ps_id); 

                    if ($stmt->execute()) {
                        $success = "Password updated successfully";
                    } else {
                        $error = "Failed to update the password";
                    }
                } else {
                        $error = "New password and confirm password do not match";
                    }
    } else {
        $error = "Old password is incorrect";
    }
    } else {
    $error = "User not found";
    }

    $stmt->close();
    } else {
    $error = "Database connection failed";
    }
    } else {
        $error = "Please fill in all the fields";
    }
}

?>

<!-- Output HTML content after PHP logic -->
<?php if (!empty($error)): ?>
    <div class="error">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>






    
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
              <h1>Password</h1>

              <hr>
            </div>
            
        



    <!-- Content Goes here -->

 





<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">

<?php if (!empty($success)): ?>
    <div id="success-message" class="success">
        <?php echo htmlspecialchars($success); ?>
    </div>
    <script>
        // Hide the success message after 5 seconds
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 2000); // 5000 milliseconds = 5 seconds
    </script>
<?php endif; ?>

<input type="hidden" name="ps_id" value="<?php echo htmlspecialchars($ps_id); ?>">

    <div class="form-group mb-3">
        <label for="password">Old Password</label>
        <input type="password" class="form-control" placeholder="Old Password"  name="old_password">
    </div>
    <div class="form-group mb-3">
        <label for="password">New Password</label>
        <input type="password" class="form-control" placeholder="New Password"  name="new_password">
    </div>
    <div class="form-group mb-3">
        <label for="password">Verify Password</label>
        <input type="password" class="form-control" placeholder="Confirm Password"  name="confirm_password">
    </div>







    <div class="form-group mb-3">
        <input class="btn btn-primary" type="submit" name="update_password" value="Update">
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

