 <!-- Table -->


 <h3 class="mb-3">New Record</h3>


<form action="inspection.php" method="POST">

<input type="date" name="inspection_date" value="<?php echo date("Y-m-d");?>">
 <table class="table table-bordered mt-3" id="">
                <thead class="table-success">
                    <tr>
                    <th scope="col">Room Number</th>
                    <th scope="col">Description</th>
                    <th scope="col">Score</th>
                    </tr>
                </thead>
                <?php
               $query = "SELECT * FROM room";
               $select_room = mysqli_query($connection,$query);
               
               while($row = mysqli_fetch_assoc($select_room)){
                   $room_number = $row ['room_number'];

               
               
                   echo "<tr>";

                   echo "<td> $room_number </td>";

                   echo "<td> <input type='text' name='description$room_number'> </td>";
                   echo "<td> <input type='number' min=1 max=100 step=1 name='score$room_number'  required> </td>";
               
               
               
                   echo "</tr>";
         
               }  
                ?>
                <tbody>


                    
<!-- <a href='' class='text-success'><i class='fa-solid fa-circle-info fa-lg '></i></a> -->
  
                </tbody>
                </table>
            <!-- End of Table -->
            <input type="submit" class="btn btn-primary" name="submit" VALUE="Submit" />

</form>