 <!-- Table -->
 <table class="table table-bordered mt-5" id="">
                <thead class="table-success">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Title</th>
                    <!-- <th scope="col">Description</th> -->
                    <!-- <th scope="col">Hall</th>
                    <th scope="col">Room No</th> -->
                    <!-- <th scope="col">Date</th> -->
                    <th scope="col">Status</th>
                    <th scope="col">Urgency</th>
                    <th scope="col">view</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php

for($i=1; $i>=1000; $i++);

$query = "SELECT * FROM report INNER JOIN student ON report.student_id = student.student_id WHERE report_status in(1,3,5)";
// $query = "SELECT * FROM report INNER JOIN student ON report.student_id = student.student_id WHERE status_report = 1";
$select_report = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_report)){
    $report_id = $row ['report_id'];
    $student_id = $row ['student_id'];
    $report_title = $row ['report_title'];
    $report_desc = $row ['report_desc'];
    // $hall_id = $row ['hall_id'];
    $room_number = $row ['room_number'];
    $report_date = $row ['report_date'];
    $report_status = $row ['report_status'];
    $urgency = $row ['urgency'];
    $report_image = $row ['report_image'];

    $current_status ="";

    switch ($report_status){
        case 0 : $current_status = 'submitted'; break;
        case 1 : $current_status = 'approved'; break;
        case 2 : $current_status = 'rejected'; break;
        case 3 : $current_status = 'progress'; break;
        case 4 : $current_status = 'pending'; break;
        case 5 : $current_status = 'completed'; break;
    
    }

    echo "<tr>";
    echo "<td> $i </td>";
    echo "<td> $report_date </td>";
    echo "<td> $student_id </td>";
    echo "<td> $report_title </td>";
    echo "<td>  $current_status </td>";
    echo "<td>  $urgency </td>";

    




    echo 
        "<td class='text-center'>
            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal={$report_id}' data-report_id='<?php echo $report_id; ?>'>
            view
        </button>
           
        </td>"; 


    echo "<td class='text-center'>
<a href='report.php?source=update_urgency&update_urgency={$report_id}' class='text-primary'><i class='fa-solid fa-pen-to-square fa-lg px-2'></i></a>
<a onClick=\'javascript: return confirm('Are you sure want to delete?')\' href='report.php?delete_report={$report_id}' class='text-danger'><i class='fa-solid fa-trash fa-lg'></i></a>
     
    </td>";
?>




<!-- Modal Structure -->
<!-- Button trigger modal -->


<div class="modal fade" id="exampleModal=<?php echo $report_id; ?>">
    <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          <div class="modal-header">
                <h1 class="modal-title fs-2" id="view?ireport_id=<?php echo $report_id ?>"><?php echo $report_title ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
            <br>    <br>
            <p class="fw-bold text-dark">Student-Id : <?php echo $student_id; ?></p>
            <p class="fw-bold">Room : <?php echo $room_number; ?></p>
            <p class="fw-bold">Request : <br> <?php echo $report_desc; ?></p>
            <p class="fw-bold">Date : <br> <?php echo $report_date; ?></p>
            <p class="fw-bold">Urgency : <br> <?php echo $urgency; ?></p>
            <p class="fw-bold">Image : <img src="<?php echo "../report_image/" .$report_image; ?>" width="100%"></p>
            
        ...
            </div>
            <div class="modal-footer">
                <a href="report.php?action=progress&report_id=<?= $report_id; ?>">In-progress </a>
                <a href="report.php?action=completed&report_id=<?= $report_id; ?>">Complete <a>
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














                    
<!-- <a href='' class='text-success'><i class='fa-solid fa-circle-info fa-lg '></i></a> -->
  
                </tbody>
                </table>
            <!-- End of Table -->










<!-- Delete Student -->
<?php
if(isset( $_GET['delete_report'])){

    $report_id = $_GET['delete_report']; 
    $query = "DELETE FROM report WHERE report_id = '{$report_id}'";
    $delete_report_query = mysqli_query( $connection, $query);
    if($delete_report_query){  
        header( "Location: report.php" );
    }else{
        die('Query Failed'.mysqli_error($connection));
    }

}
?>
<!-- End of Delete Student -->

<script type="text/javascript">
$(document).ready(function() {
    // Get the modal element
    var modal = new bootstrap.Modal(document.getElementById('#exampleModal-' + reportId));

    // Get all the view buttons
    var viewButtons = document.querySelectorAll('button[data-bs-toggle="modal"], a[data-bs-toggle="modal"]');

    // Add a click event listener to each view button
    viewButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the report_id value from the button's dataset
            var reportId = button.dataset.report_id;

            // Set the modal's title with the report_id value
            $('#exampleModalLabel').html('Modal title <small id="viewReportId">view?report_id=' + reportId + '</small>');

            // Show the modal
            modal.show();
        });
    });
});
</script>