
<!-- Title -->
<?php
// echo  $hall_id = $_GET['hall_id'];
// if (isset($_GET['hall_id'])) {
//     $hall_id = $_GET['hall_id'];
// }
?>



<a href="room.php?source=add_room">
<button type="button" class="btn btn-primary mb-3 mt-3 float-end"><i class="fa-solid fa-user-plus"></i> Add Room</button>
</a>  

<!-- Table -->
<table class="table table-bordered mt-5">
                <thead class="table-success">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col"> Room Number</th>
                    <th scope="col"> Student-Id</th>
                    <th scope="col">Facility</th>
                    <th scope="col">Status</th>
                    <th scope="col">Hall</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
// Check if "hall_id" is set in the $_GET array
if (isset($_GET['hall_id'])) {
    $hall_id = intval($_GET['hall_id']);

    // Fetch rooms for the specified hall from the database
    $query = "SELECT * FROM room WHERE hall_id = $hall_id";
    $result = mysqli_query($connection, $query);

    // Loop through the results and display each room in a table row
    while ($row = mysqli_fetch_assoc($result)) {
        $room_number = $row['room_number'];
        $student_id = $row['student_id'];
        $facility = $row['facility'];
        $status = $row['status'];
        echo "<tr>";
        echo "<td>". $room_number. "</td>";
        echo "<td>". $student_id. "</td>";
        echo "<td>". $facility. "</td>";
        echo "<td>". $status. "</td>";
        echo "</tr>";
    }
} else {
    // Handle the case where "hall_id" is not set
    echo "Hall ID is not set.";
}
?>
                    
                </tbody>
                </table>
            <!-- End of Table -->



<!-- Delete Student -->
<?php
if(isset( $_GET['room'])){

    $hall_id = $_GET['room']; 
    $query = "DELETE FROM room WHERE room_number = '{$room_number}'";
    $room_query = mysqli_query( $connection, $query);
    if($room_query){  
        header( "Location: view_hall.php" );
    }else{
        die('Query Failed'.mysqli_error($connection));
    }

}
?>
<!-- End of Delete Student -->