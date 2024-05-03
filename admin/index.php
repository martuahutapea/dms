 <!-- Include the header of the dashboard -->
<?php include '../dashboard/header.php'; ?>
<?php
session_start();

// Check if the user has an acces to login to the page
if (!isset($_SESSION["user_id"]) ||!isset($_SESSION["user_password"]) || $_SESSION["user_role"] != "admin") {
    // Redirect to login page
    header("Location: /dms/index.php");
    exit;
}
?>

    
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
            <a href="worship_attendance.php" class="sidebar-link">
                <i class="fa-solid fa-check pe-2"></i>
                Worship Attendance
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
    <nav class="navbar navbar-expand px-3 border-bottom">
        <div class="navbar-collapse navbar">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" data-bs-target="#drop" class="nav-icon pe-md-0">
                    <img src="../images/aiulogo.png" class="avatar img-fluid rounded" alt="" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end ">
                        <a href="profile.php" class="dropdown-item">Profile</a>
                        <a href="../logout.php" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

            <!-- End of Top Bar -->


    <!-- Content Goes here -->
    <main class="content px-3 py-2">
    <div class="mb-3">
              <h1>Welcome Back Admin</h1>
            </div>
            <hr>
    <div class="container">

            
            
    <div class="row row-cols-1 row-cols-md-4 g-6">
  <div class="col text-center">
    <div class="card" style="width: 20rem;">
      <img src="../images/hall.png" class="card-img-top" alt="" />
      <div class="card-body text-end">
        <h5 class="card-title">Total Halls</h5>
        <p class="card-text">
<?php
$query = "SELECT * FROM hall ";
$result = mysqli_query($connection, $query);
if ($result) {
  $total_halls = mysqli_num_rows($result);
  echo "<span class='info-box-number text-right'><h4>$total_halls</4></span>";
} else {
  echo "Error: ". $sql. "<br>". mysqli_error($connection);
}
?>  
        </p>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card" style="width: 20rem;">
      <img src="../images/user.png" class="card-img-top" alt="" />
      <div class="card-body text-end">
        <h5 class="card-title">Total Dean</h5>
        <p class="card-text">
<?php
$query = "SELECT * FROM dean";
$result = mysqli_query($connection, $query);
if ($result) {
  $total_halls = mysqli_num_rows($result);
  echo "<span class='info-box-number text-right'><h4>$total_halls</4></span>";
} else {
  echo "Error: ". $sql. "<br>". mysqli_error($connection);
}
?>  
        </p>
      </div>
    </div>
  </div>


  <div class="col">
    <div class="card" style="width: 20rem;">
      <img src="../images/maintenance.png" class="card-img-top" height="90%" alt="" />
      <div class="card-body text-end">
        <h5 class="card-title">Total Plant-Service</h5>
        <p class="card-text">
<?php
$query = "SELECT * FROM plant_service";
$result = mysqli_query($connection, $query);
if ($result) {
  $total_halls = mysqli_num_rows($result);
  echo "<span class='info-box-number text-right'><h4>$total_halls</4></span>";
} else {
  echo "Error: ". $sql. "<br>". mysqli_error($connection);
}
?>  
        </p>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card" style="width: 20rem;">
      <img src="../images/maintenance.png" class="card-img-top" height="90%" alt="" />
      <div class="card-body text-end">
        <h5 class="card-title">Total Plant-Service</h5>
        <p class="card-text">
<?php
$query = "SELECT * FROM plant_service";
$result = mysqli_query($connection, $query);
if ($result) {
  $total_halls = mysqli_num_rows($result);
  echo "<span class='info-box-number text-right'><h4>$total_halls</4></span>";
} else {
  echo "Error: ". $sql. "<br>". mysqli_error($connection);
}
?>  
        </p>
      </div>
    </div>
  </div>
</div>






            <div class="row">
              <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0 illustration">
                  <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                      <div class="col-6">
                        <div class="p-3 m-1">
                          <h4>Welcome Back, Student</h4>
                          <p class="mb-0">Student Dashboard, CodzSword</p>
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
                <div class="card flex-fill border-0">
                  <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                      <div class="flex-grow-1">
                        <h4 class="mb-2">$ 78.00</h4>
                        <p class="mb-2">Total Earnings</p>
                        <div class="mb-0">
                          <span class="badge text-success me-2"> +9.0% </span>
                          <span class="text-muted"> Since Last Month </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Table Element -->
            <div class="card border-0">
              <div class="card-header">
                <h5 class="card-title">Basic Table</h5>
                <h6 class="card-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ducimus, necessitatibus reprehenderit itaque!</h6>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td colspan="2">Larry the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>
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

