
 
<a href="student.php?source=add_student">
<button type="button" class="btn btn-primary m-1 float-end"><i class="fa-solid fa-user-plus"></i> Add Student </button>
</a>   
 
 
 <!-- Table -->
 <table class="table table-bordered" id="myTable">
                <thead class="table-success">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lasttname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Major</th>
                    <th scope="col">Image</th>
                    <th scope="col">Room Number</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php

for($i=1; $i>=1000; $i++);

$query = "SELECT * FROM student";
$select_student = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_student)){
    $student_id = $row ['student_id'];
    $student_firstname = $row ['student_firstname'];
    $student_lastname = $row ['student_lastname'];
    $student_email = $row ['student_email'];
    $student_password = $row ['student_password'];
    $student_major = $row ['student_major'];
    $student_image = $row ['student_image'];
    $room_number = $row ['room_number'];

    echo "<tr>";
    echo "<td> $i </td>";
    echo "<td> $student_id </td>";
    echo "<td> $student_firstname </td>";
    echo "<td> $student_lastname </td>";
    echo "<td> $student_email  </td>";
    echo "<td> $student_password  </td>";
    echo "<td>  $student_major </td>";
    echo "<td>  <img src='../images/$student_image' alt='Picture' width='100'></td>";
    echo "<td>  $room_number </td>";
    echo "<td class='text-center'>


<a href='student.php?source=edit_student&edit_student={$student_id}' class='text-primary'><i class='fa-solid fa-pen-to-square fa-lg px-2'></i></a>
<a onClick=\'javascript: return confirm('Are you sure want to delete?')\' href='student.php?delete_student={$student_id}' class='text-danger'><i class='fa-solid fa-trash fa-lg'></i></a>
     
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
if(isset( $_GET['delete_student'])){

    $student_id = $_GET['delete_student']; 
    $query = "DELETE FROM student WHERE student_id = '{$student_id}'";
    $delete_student_query = mysqli_query( $connection, $query);
    if($delete_student_query){  
        header( "Location: student.php" );
    }else{
        die('Query Failed'.mysqli_error($connection));
    }

}
?>
<!-- End of Delete Student -->