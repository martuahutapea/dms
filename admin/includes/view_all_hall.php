<div class="mb-3">
    <h1>List of Halls</h1>
</div>

<hr>

<a href="hall.php?source=add_hall">
<button type="button" class="btn btn-primary m-2 float-end"><i class="fa-solid fa-user-plus"></i> Add New Hall</button>
</a>  

<!-- Table -->
<table class="table table-bordered mt-5">
                <thead class="table-success">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col"> Hall Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Dean Id</th>
                    <th scope="col">Status</th>
                    <th scope="col">Category</th>
                    <!-- <th scope="col">View</th> -->
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php

for($i=1; $i>=1000; $i++);

$query = "SELECT * FROM hall";
$select_hall = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_hall)){
    $hall_id = $row ['hall_id'];
    $hall_name = $row ['hall_name'];
    $dean_id = $row ['dean_id'];
    $hall_status = $row ['hall_status'];
    $hall_category = $row ['hall_category'];


    echo "<tr>";
    echo "<td> $i </td>";
    echo "<td> $hall_id </td>";
    echo "<td> $hall_name </td>";
    echo "<td> $dean_id </td>";
    echo "<td> $hall_status </td>";
    echo "<td> $hall_category </td>";





    echo "<td class='text-center'>
<a href='hall.php?source=edit_hall&edit_hall={$hall_id}' class='text-primary'><i class='fa-solid fa-pen-to-square fa-lg px-2'></i></a>
<a onClick=\"javascript: return confirm('Are you sure want to delete?')\" href='hall.php?delete_hall={$hall_id}' class='text-danger'><i class='fa-solid fa-trash fa-lg'></i></a>
    </td>";


    echo "</tr>";
    $i++;
}    
?>                   
           <!-- echo "<td class='text-center'>
    <a href='hall.php?source=view_hall&view_hall={$hall_id}' class='text-primary'><button class='btn btn-success'>view</button></a>
    </td>"; -->







                </tbody>
                </table>
            <!-- End of Table -->



<!-- Delete Student -->
<?php
if(isset( $_GET['delete_hall'])){

    $hall_id = $_GET['delete_hall']; 
    $query = "DELETE FROM hall WHERE hall_id = '{$hall_id}'";
    $delete_hall_query = mysqli_query( $connection, $query);
    if($delete_hall_query){  
        header( "Location: hall.php" );
    }else{
        die('Query Failed'.mysqli_error($connection));
    }

}
?>
<!-- End of Delete Student -->

<?php

// get the hall id from the URL
// $hall_id = $_GET['hall_id'];

// // connect to the database
// // $connection = mysqli_connect('localhost', 'username', 'password', 'database_name');

// // check connection
// if (!$connection) {
//     die('Connection failed: '. mysqli_connect_error());
// }

// // get the room data from the database
// $sql = "SELECT * FROM room WHERE hall_id = $hall_id";
// $select_room = mysqli_query($connection,$sql);

// // check if the query was successful
// if (!$select_room) {
//     die('Query Failed'. mysqli_error($connection));
// }

// // display the room data
// echo "<table border='1'>";
// echo "<tr>";
// echo "<th>Room ID</th>";
// echo "<th>Room Name</th>";
// echo "<th>Hall ID</th>";
// echo "</tr>";

// while($row = mysqli_fetch_assoc($select_room)){
//     $room_id = $row["room_id"];
//     $room_name = $row["room_name"];
//     $hall_id = $row["hall_id"];

//     echo "<tr>";
//     echo "<td>$room_id</td>";
//     echo "<td>$room_name</td>";
//     echo "<td>$hall_id</td>";
//     echo "</tr>";
// }

// echo "</table>";

?>