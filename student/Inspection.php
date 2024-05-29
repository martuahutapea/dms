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
            <div class="mb-5">
              <h1>Room's Inspections</h1>
              
              <hr>
              <div class="mb-3">
              <h6 class="text-dark"> Room Number : <?= $room_number;?></h6>

            </div>
            </div>

            <?php
             $query = "SELECT SUM(score) AS total_score FROM room_inspection_detail LEFT JOIN room_inspection ON room_inspection.id = room_inspection_detail.id_room_inspection WHERE room_number ='$room_number'";
             $select_room = mysqli_query($connection,$query);
                   
             $total_score = 0;
             if($row = mysqli_fetch_assoc($select_room)){
                $total_score = $row['total_score'];           
            }  

            
            $query = "SELECT count(id) AS total_count FROM room_inspection";
            $select_room = mysqli_query($connection,$query);
                      
            $total_count = 0;
            if($row = mysqli_fetch_assoc($select_room)){
               $total_count = $row['total_count'];           
           }
            ?>
            <div class="mb-3">
              <h3 class="text-dark"> Percentage: <?= number_format($total_score/($total_count*100)*100,1,',','.'); ?>%</h3>

            </div>
            
        



    <!-- Content Goes here -->

    
    <table class="table table-bordered" id="myTable">
                <thead class="table-success">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Score</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                 $query = "SELECT * FROM room_inspection_detail LEFT JOIN room_inspection ON room_inspection.id = room_inspection_detail.id_room_inspection WHERE room_number ='$room_number'";
                 $select_room = mysqli_query($connection,$query);
                 $no=1;
                 while($row = mysqli_fetch_assoc($select_room)){
                     $id = $row ['id'];
                     $description = $row ['description'];
                     $room_inspection_date = $row ['room_inspection_date'];
                     $score = $row ['score'];
  
                 
                 
                     echo "<tr>";
                     
  
  
                     echo "<td> $no </td>";
                     echo "<td>  $description</td>";
                     echo "<td> $room_inspection_date </td>";
                     echo "<td>  $score</td>";
                 
                 
                     echo "</tr>";
                    $no++;
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

