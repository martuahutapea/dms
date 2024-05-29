<!-- <a href="ms.php?source=add_ms">
<button type="button" class="btn btn-primary m-1 float-end"><i class="fa-solid fa-user-plus"></i> Add MS</button>
</a>   -->

<!-- Table -->
<table class="table table-bordered mt-5" id="">
                <thead class="table-success ">
                    <tr class="">
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <!-- <th scope="col">Password</th> -->
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Office</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Role</th>
                    <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
<?php

for($i=1; $i>=1000; $i++);

$query = "SELECT * FROM plant_service";
$select_ps = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_ps)){
    $ps_id = $row ['ps_id'];
    $ps_firstname = $row ['ps_firstname'];
    $ps_lastname = $row ['ps_lastname'];
    $ps_password = $row ['ps_password'];
    $ps_email = $row ['ps_email'];
    $ps_phonenumber = $row ['ps_phonenumber'];
    $ps_office = $row ['ps_office'];
    $ps_picture = $row ['ps_picture'];
    $ps_role = $row ['ps_role'];

    echo "<tr>";
    echo "<td> $i </td>";
    echo "<td> $ps_id </td>";
    echo "<td> $ps_firstname </td>";
    echo "<td> $ps_lastname </td>";

    echo "<td> $ps_email  </td>";
    echo "<td> $ps_phonenumber  </td>";
    echo "<td> $ps_office  </td>";
    echo "<td> $ps_picture  </td>";
    echo "<td> $ps_role  </td>";



    echo "</tr>";
    $i++;
}    
?>                   
                    
                </tbody>
                </table>
            <!-- End of Table -->



<!-- Delete Student -->
<?php
if(isset( $_GET['delete_ps'])){

    $ps_id = $_GET['delete_ps']; 
    $query = "DELETE FROM plant_service WHERE ps_id = '{$ps_id}'";
    $delete_ps_query = mysqli_query( $connection, $query);
    if($delete_ps_query){  
        header( "Location: ms.php" );
    }else{
        die('Query Failed'.mysqli_error($connection));
    }

}
?>
<!-- End of Delete Student -->