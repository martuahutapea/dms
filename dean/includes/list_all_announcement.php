 
<a href="announcement.php?source=add_announcement">
<button type="button" class="btn btn-primary m-1 float-end"><i class="fa-solid fa-user-plus"></i> New Announcement </button>
</a>   
  
 
 <!-- Table -->
            <table class="table table-bordered" id="">
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
            <button type='button' class='btn btn-primary m-2' data-bs-toggle='modal' data-bs-target='#exampleModal={$announcement_id}' data-announcement_id='<?php echo $announcement_id; ?>'>
            view
        </button>
        <a onClick=\'javascript: return confirm('Are you sure want to delete?')\' href='announcement.php?delete_announcement={$announcement_id}' class='text-danger'><i class='fa-solid fa-trash fa-lg'></i></a>
           
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




<!-- Delete Student -->
<?php
if(isset( $_GET['delete_announcement'])){

    $announcement_id = $_GET['delete_announcement']; 
    $query = "DELETE FROM announcement WHERE announcement_id = '{$announcement_id}'";
    $delete_announcement_query = mysqli_query( $connection, $query);
    if($delete_announcement_query){  
        header( "Location: announcement.php" );
    }else{
        die('Query Failed'.mysqli_error($connection));
    }

}
?>
<!-- End of Delete Student -->
                </tbody>
 </table>