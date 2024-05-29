
 
<a href="report.php?source=create_report">
<button type="button" class="btn btn-primary float-end"><i class="fa-solid fa-user-plus"></i> New Report </button>
</a>   
 
 
 <!-- Table -->
 <table class="table table-bordered mt-3" id="myTable">
                <thead class="table-success">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Report id</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Title</th>
                    <!-- <th scope="col">Description</th> -->
                    <!-- <th scope="col">Hall</th>
                    <th scope="col">Room No</th> -->
                    <!-- <th scope="col">Date</th> -->
                    <th scope="col">Status</th>
                    <th scope="col">view</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php

for($i=1; $i>=1000; $i++);

$query = "SELECT * FROM report INNER JOIN student ON report.student_id = student.student_id ORDER BY report_status ASC";
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
    $report_image = $row ['report_image'];

    $status_word ="";

    switch ($report_status){
        case 0 : $status_word = 'submitted'; break;
        case 1 : $status_word = 'approved'; break;
        case 2 : $status_word = 'rejected'; break;
        case 3 : $status_word = 'progress'; break;
        case 4 : $status_word = 'pending'; break;
        case 5 : $status_word = 'completed'; break;
    
    }

    echo "<tr>";
    echo "<td> $i </td>";
    echo "<td> $report_id </td>";
    echo "<td> $student_id </td>";
    echo "<td> $report_title </td>";
    echo "<td>  $status_word </td>";

    




    echo 
        "<td class='text-center'>
            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal={$report_id}' data-report_id='<?php echo $report_id; ?>'>
            view
        </button>
           
        </td>"; 


    echo "<td class='text-center'>
<a href='student.php?source=edit_student&edit_student={$student_id}' class='text-primary'><i class='fa-solid fa-pen-to-square fa-lg px-2'></i></a>
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
            <p class="fw-bold">Image : <img src="<?php echo "../report_image/" .$report_image; ?>" width="25%"></p>
            

    
        ...
            </div>
            <div class="modal-footer">
                <a href="report.php?action=approved&report_id=<?= $report_id; ?>">Approved </a>
                <a href="reason.php?action=rejected&report_id=<?= $report_id; ?>">Rejected <a>
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