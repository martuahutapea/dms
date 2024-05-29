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
          <div class="container-fluid">
            <div class="mb-3">
              <h1>Welcome Back Student</h1>
              <hr>
              
            </div>
            <div class="row">
              <div class="col">
                <div class="card flex-fill border-0 illustration">
                  <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                      <div class="col">
                        <div class="p-3 m-1">
                        <h4>Dashboard, <?= $student_firstname. ' '. $student_lastname ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>





            <!-- Calender -->

<br />
   <div id="calendar" style="padding:5px; max-height: 1000px;"> </div>
   


<div class="modal fade" id="AddEvent" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Add New Event</h5>
      </div>
      <form action="../dashboard/function.php" method="post" id="SubmitEvent">
        <div class="modal-body">
          <div class="img-container">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="title"><b>Title</b></label>
                  <input type="text" name="title" id="title" class="form-control clear-form">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="start_event_date"><b>Start Date</b></label>
                  <input type="date" name="start_event" id="start_event" class="form-control clear-form">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="end_event_date"><b>End Date</b></label>
                  <input type="date" name="end_event" id="end_event" class="form-control clear-form">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="link"><b>URL</b></label>
                  <input type="url" name="link" id="link" class="form-control clear-form">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="color"><b>Color</b></label>
                  <input type="color" name="color" id="color" class="form-control clear-form">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

   




   


            <!-- End of Calender -->
          </div>
        </main>
            <!-- End of the Content -->

  </div>


</div>


  <!-- End of Main Content -->
</div>







<!-- Calendar -->
<script src="../fullcalendar/dist/index.global.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
<script type="text/javascript">
    function getEvent() {
        var events = new Array();

        $.ajax({
            type: "POST",
            url: "function.php?type=list",
            dataType: "json",
            success: function(data) {
                var result = data;

                $.each(result, function(i, item) {
                    events.push({
                        id: result[i].id,
                        title: result[i].title,
                        url: result[i].link,
                        start_event: result[i].start_event,
                        end_event: result[i].end_event,
                        color: result[i].color
                    });
                });

                var calendarEl = document.getElementById("calendar");

                var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
    },
    initialDate: "<?= date('Y-m-d')?>",
    navLinks: true, // can click day/week names to navigate views
    businessHours: true, // display business hours
    editable: true,
    selectable: true,
    eventSources: [
        {
            url: 'function.php?type=list',
            method: 'POST',
            extraParams: {
                type: 'list'
            },
            failure: function() {
                alert('There was an error while fetching events!');
            },
        },
    ],
    select: function(datetime) {
        console.log(datetime);
        $('.clear-form').val('');
        $('#start_event').val(moment(datetime.start).format('YYYY-MM-DD HH:mm:ss'));
        $('#end_event').val(moment(datetime.end).format('YYYY-MM-DD HH:mm:ss'));
        $('#AddEvent').modal('show');
    },
});

calendar.render();
            }
        });
    }

    getEvent();

    $('body').delegate('#SubmitEvent', 'submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "function.php?type=add",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                alert(data.message);
                $('#AddEvent').modal('hide');
                getEvent();
            }
        });
    });
</script>



 <!-- Include the footer of the dashboard -->
 <?php include '../dashboard/footer.php'; ?>

