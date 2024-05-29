
 
 <!-- Table -->
 <table class="table table-bordered mt-5" id="">
                <thead class="table-success">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Upload</th>
                    <th scope="col">view</th>
                    <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
<?php

for($i=1; $i>=1000; $i++);

$query = "SELECT * FROM handbook ";
$select_handbook = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_handbook)){
    $id = $row ['id'];
    $name = $row ['name'];



    echo "<tr>";
    echo "<td> $i </td>";
    echo "<td> $name </td>";






    echo 
        "<td class='text-center'>
        <a href='handbook.php?source=upload_handbook&id=$id'>Upload</a>
        </td>"; 
     
        // if((move_uploaded_file($handbook_file_tmp,"../handbook/".$id.'.pdf'))){
    echo 
    "<td class='text-center'>
    <a href='../handbook/$id.pdf' target='_blank'>View</a>
    </td>"; 


?>


<?php
    echo "</tr>";
    $i++;
}    
?> 

                    
<!-- <a href='' class='text-success'><i class='fa-solid fa-circle-info fa-lg '></i></a> -->
  
                </tbody>
                </table>
            <!-- End of Table -->