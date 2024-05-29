<a href="dean.php?source=add_dean">
<button type="button" class="btn btn-primary m-1 float-end"><i class="fa-solid fa-user-plus"></i> Add Dean </button>
</a>  

<!-- Table -->
<table class="table table-bordered">
                <thead class="table-success">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Dean ID</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lasttname</th>
                    <th scope="col">Email</th>
                    <!-- <th scope="col">Password</th> -->
                    <th scope="col">Phone Number</th>
                    <th scope="col">Office</th>
                    <th scope="col">Image</th>
                    <th scope="col">Hall</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php

for($i=1; $i>=1000; $i++);

$query = "SELECT * FROM dean";
$select_dean = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_dean)){
    $dean_id = $row ['dean_id'];
    $dean_firstname = $row ['dean_firstname'];
    $dean_lastname = $row ['dean_lastname'];
    $dean_email = $row ['dean_email'];
    $dean_password = $row ['dean_password'];
    $dean_phonenumber = $row ['dean_phonenumber'];
    $dean_office = $row ['dean_office'];
    $dean_image = $row ['dean_image'];
    $hall_id = $row ['hall_id'];

    echo "<tr>";
    echo "<td> $i </td>";
    echo "<td> $dean_id </td>";
    echo "<td> $dean_firstname </td>";
    echo "<td> $dean_lastname </td>";
    echo "<td> $dean_email  </td>";
 
    echo "<td> $dean_phonenumber  </td>";
    echo "<td> $dean_office  </td>";
    echo "<td> <img src='../images/$dean_image' alt='Dean Picture' width='100'> </td>";
    echo "<td> $hall_id  </td>";

    echo "<td class='text-center'>
<a href='dean.php?source=edit_dean&edit_dean={$dean_id}' class='text-primary'><i class='fa-solid fa-pen-to-square fa-lg px-2'></i></a>
<a onClick=\"javascript: return confirm('Are you sure want to delete?')\" href='dean.php?delete_dean={$dean_id}' class='text-danger'><i class='fa-solid fa-trash fa-lg'></i></a>
     
    </td>";


    echo "</tr>";
    $i++;
}    
?>                   
                    
                </tbody>
                </table>
            <!-- End of Table -->



<!-- Delete Student -->
<?php
if(isset( $_GET['delete_dean'])){

    $dean_id = $_GET['delete_dean']; 
    $query = "DELETE FROM dean WHERE dean_id = '{$dean_id}'";
    $delete_dean_query = mysqli_query( $connection, $query);
    if($delete_dean_query){  
        header( "Location: dean.php" );
    }else{
        die('Query Failed'.mysqli_error($connection));
    }

}
?>
<!-- End of Delete Student -->