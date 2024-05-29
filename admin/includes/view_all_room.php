
 
<a href="room.php?source=add_room">
<button type="button" class="btn btn-primary m-1 float-end"><i class="fa-solid fa-user-plus"></i> Add Room </button>
</a>   
 
 
 <!-- Table -->
 <table class="table table-bordered" id="myTable">
                <thead class="table-success">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col"> Room Number</th>
                    <!-- <th scope="col"> Student-Id</th> -->
                    <th scope="col">Facility</th>
                    <th scope="col">Status</th>
                    <th scope="col">Hall</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
for($i=1; $i>=1000; $i++);

$query = "SELECT * FROM room";
$select_room = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_room)){
    $room_number = $row ['room_number'];
    // $student_id = $row ['student_id'];
    $room_facility = $row ['room_facility'];
    $room_status = $row ['room_status'];
    $hall_id = $row ['hall_id'];


    echo "<tr>";
    echo "<td> $i </td>";
    echo "<td> $room_number </td>";
    // echo "<td> $student_id </td>";
    echo "<td> $room_facility </td>";
    echo "<td> $room_status </td>";
    echo "<td> $hall_id </td>";


    echo "<td class='text-center'>
<a href='room.php?source=edit_room&edit_room={$room_number}' class='text-primary'><i class='fa-solid fa-pen-to-square fa-lg px-2'></i></a>
<a onClick=\"javascript: return confirm('Are you sure want to delete?')\" href='room.php?delete_room={$room_number}' class='text-danger'><i class='fa-solid fa-trash fa-lg'></i></a>
    </td>";


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
if(isset( $_GET['delete_room'])){

    $room_number = $_GET['delete_room']; 
    $query = "DELETE FROM room WHERE room_number = '{$room_number}'";
    $delete_room_query = mysqli_query( $connection, $query);
    if($delete_room_query){  
        header( "Location: room.php" );
    }else{
        die('Query Failed'.mysqli_error($connection));
    }

}
?>
<!-- End of Delete Student -->