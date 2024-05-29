 <!-- Include the header of the dashboard -->
 <?php include '../dashboard/header.php'; ?>
 <?php
session_start();

// Check if the user has an acces to login to the page
if (!isset($_SESSION["user_id"]) ||!isset($_SESSION["user_password"]) || $_SESSION["user_role"] != "student") {
    // $ps_id_id = $_SESSION["user_id"];
    // Redirect to login page
    header("Location: /dms/index.php");
    exit;
}

?>

<?php


if(isset($_SESSION['user_id'])){
$the_student_id = $_SESSION['user_id'];


$query = "SELECT * FROM student WHERE student_id = $the_student_id";

// Sending the query
$select_student_profile = mysqli_query($connection, $query);


if(!$select_student_profile){
    die('Query Failed' .mysqli_error($connection));
}

while($row = mysqli_fetch_array($select_student_profile)){
  $student_id = $row ['student_id'];
  $student_firstname = $row ['student_firstname'];
  $student_lastname = $row ['student_lastname'];
  $student_email = $row ['student_email'];
  $student_password = $row ['student_password'];
  $student_major = $row ['student_major'];
  $student_image = $row ['student_image'];
  $room_number = $row ['room_number'];
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
if (isset($_SESSION['user_id'])) {
    $profile = $_SESSION['user_id'];

    $query = "SELECT student_image, student_password FROM student WHERE student_id = $profile";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
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
          <div class="container-fluid">
            <div class="mb-3">
              <h1>Announcement</h1>
              <hr>
            </div>
            
        



    <!-- Content Goes here -->

    
            

 <!-- Table -->
 <table class="table table-bordered" id="myTable">
                <thead class="table-success">   
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Date</th>
                    <th scope="col">From</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php

for($i=1; $i>=1000; $i++);

$query = "SELECT * FROM announcement LEFT JOIN dean on dean.dean_id = announcement.dean_id ORDER BY announcement_date DESC";
// $query = "SELECT * FROM report INNER JOIN student ON report.student_id = student.student_id WHERE status_report = 1";
$select_announcement = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_announcement)){
    $announcement_id = $row ['announcement_id'];
    $announcement_title = $row ['announcement_title'];
    $announcement_content = $row ['announcement_content'];
    $announcement_date = $row ['announcement_date'];
    $dean_firstname = $row ['dean_firstname'];


    echo "<tr>";
    echo "<td> $i </td>";
    echo "<td> $announcement_title </td>";
    echo "<td> $announcement_content </td>";
    echo "<td>  $announcement_date </td>";
    echo "<td>  $dean_firstname </td>";

    




    echo 
        "<td class='text-center'>
            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal={$announcement_id}' data-announcement_id='<?php echo $announcement_id; ?>'>
            view
        </button>
           
        </td>";

?> 


<div class="modal fade" id="exampleModal=<?php echo $announcement_id; ?>">
    <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          <div class="modal-header">
                <h1 class="modal-title fs-2" id="view?iannouncement_id=<?php echo $announcement_id ?>"><?php echo $announcement_title ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
            <br>    <br>
            <p class="fw-bold text-dark">Title : <?php echo $announcement_title; ?></p>
            <p class="fw-bold text-dark">Content : <?php echo $announcement_content; ?></p>
            <p class="fw-bold text-dark">Date : <?php echo $announcement_date; ?></p>
            <p class="fw-bold text-dark">From : <?php echo $dean_firstname; ?></p>

            

    
        ...
            </div>
        </div>
    </div>
</div>        

<!-- End of Modal Structure -->








<?php
    echo "</tr>";
    $i++;
}    
?> 
                </tbody>
 </table>

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

