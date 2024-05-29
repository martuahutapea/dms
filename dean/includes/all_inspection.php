<?php

// Delete Inspection 
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM room_inspection_detail WHERE id_room_inspection ='$id'";
    $result = mysqli_query($connection, $query);
    $query = "DELETE FROM room_inspection WHERE id='$id'";
    $result = mysqli_query($connection, $query);
}
//  End

    if(isset($_POST['submit'])){


        $inspection_date = $_POST['inspection_date'];
        // date("Y-m-d");
     //We need a querry to insert the data from the user to the database.
     $query ="INSERT INTO room_inspection (room_inspection_date, room_inspection_status) VALUES ('$inspection_date', '')";

    $add_inspection = mysqli_query($connection,$query);


    if(!$add_inspection){
    die("Cannot Add the Grade " .mysqli_error($connection));
    }

    // Detail Inspection for each room
    $id = $connection->insert_id;

    $query = "SELECT * FROM room";
               $select_room = mysqli_query($connection,$query);
               
               while($row = mysqli_fetch_assoc($select_room)){
                   $room_number = $row ['room_number'];
                    
                    $description = $_POST ["description$room_number"];
                    $score = $_POST ["score$room_number"];

                    $query ="INSERT INTO room_inspection_detail (id_room_inspection, room_number, score, description) VALUES ('$id', '$room_number', '$score', '$description')";

                    $add_inspection = mysqli_query($connection,$query);
                

                    if(!$add_inspection){
                    die("Cannot Add the Grade " .mysqli_error($connection));
                    }
               
               }  
                if(isset($id)){
                $query = "UPDATE room_inspection SET room_inspection_status = 'completed' WHERE id='$id'";
                // echo $query;
                $update_status = mysqli_query($connection,$query);
            }
    }



    


?>
 
<a href="inspection.php?source=add_inspection">
<button type="button" class="btn btn-primary float-end"><i class="fa-solid fa-user-plus"></i> New Inspection </button>
</a>   
 

 <!-- Table -->
 <table class="table table-bordered mt-3" id="myTable">
                <thead class="table-success">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete</th>
                    <th scope="col">View</th>
                    </tr>
                </thead>
                <?php
                 $query = "SELECT * FROM room_inspection";
                 $select_room = mysqli_query($connection,$query);
                 $no=1;
                 while($row = mysqli_fetch_assoc($select_room)){
                     $id = $row ['id'];
                     $room_inspection_date = $row ['room_inspection_date'];
                     $room_inspection_status = $row ['room_inspection_status'];
  
                 
                 
                     echo "<tr>";
                     
  
  
                     echo "<td> $no </td>";
                     echo "<td> $room_inspection_date </td>";
                     echo "<td>  $room_inspection_status</td>";
                     echo "<td>  <a onClick=\"javascript: return confirm('Are you sure want to delete?')\" href='inspection.php?delete={$id}' class='text-danger'><i class='fa-solid fa-trash fa-lg'></i></a></td>";
                    

                    //  View
                    echo "<td class='text-center'>  <a href='inspection.php?view={$id}' class='text-primary'>View</a></td>";
                     echo "</tr>";
                    $no++;
                 } 
                ?>
                <tbody>


                    
<!-- <a href='' class='text-success'><i class='fa-solid fa-circle-info fa-lg '></i></a> -->
  
                </tbody>
                </table>
            <!-- End of Table -->






