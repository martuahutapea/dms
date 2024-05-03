


    <!-- Content Goes here -->


    <?php
    //get the student id from url
    if(isset($_GET['edit_room'])){
        $the_room_number = $_GET['edit_room'];  
    }


        $query = "SELECT * FROM room WHERE room_number = $the_room_number";
        $select_room_number = mysqli_query($connection, $query);

        if(!$select_room_number){
            die('Query Failed' .mysqli_error($connection));
        }
        // $row  = mysqli_fetch_assoc($edit_room_query);

        while($row = mysqli_fetch_assoc($select_room_number)){
            // $room_number = $row["room_number"];
            // $student_id = $row["student_id"];
            $room_facility = $row["room_facility"];
            $room_status = $row["room_status"];
            // $hall_id = $row["hall_id"];

    }






    if(isset($_POST['update_room'])){   
        // $room_number = $_POST['room_number'];
        // $student_id = $_POST['student_id'];
        $room_facility = isset($_POST['room_facility'])? $_POST['room_facility'] : '';
        $room_status = $_POST['room_status'];
        // $hall_id = $_POST['hall_id'];



        $query = "UPDATE `room` SET room_number = '$room_number', room_facility = '$room_facility', room_status = '$room_status' WHERE hall_id=$the_room_number AND room_number=$the_room_number";

        $update_room_query = mysqli_query($connection,$query);

        // confirmQuery( $update_room_query );  
        

        // Test the Querry
        if(!$update_room_query){
            die("Cannot Add the User " .mysqli_error($connection));
        }
     

        echo "<div class='alert alert-success'>Room Updated Succesfully. <a href='room.php' class='btn btn-primary'>View Student</a></div>";
        
        
    }

?>





<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">


    <!-- <div class="form-group mb-3">
        <label for="title">Room Number</label>
        <input type="text" class="form-control" value="" name="room_number">
    </div> -->

    <!-- <div class="form-group mb-3">
        <label for="user_lastname">Student ID</label>
        <input type="text" class="form-control" value="" name="student_id">
    </div> -->

    <!-- <div class="form-group mb-3">
        <label for="title">Facility</label>
        <input type="text" class="form-control" value="" name="$room_facility">
    </div> -->


            <!-- Make Status dynamic -->
            <div class="form-group mb-3">
                <label for="status">Facility:</label><br>
                    <select name="room_facility" id=""  class="form-select mb-3">
                        <option value='<?php echo $room_facility; ?>'> <?php echo $room_facility; ?> </option>
<?php

if($room_facility == 'Ac'){
    echo "<option value='Fan'> Fan </option>";
}else{
    echo "<option value='Ac'> AC </option>";
}
?>
                    <option value=''></option>
                </select>
            </div>



            <!-- Make Status dynamic -->
            <div class="form-group mb-3">
                <label for="status">Status:</label><br>
                    <select name="room_status" id=""  class="form-select mb-3">
                        <option value='<?php echo $room_status; ?>'> <?php echo $room_status; ?> </option>
<?php

if($room_status == 'Available'){
    echo "<option value='Unavailable'> Unavailable </option>";
    echo "<option value='Storage'> Storage </option>";
}elseif($room_status == 'Unavailable'){
    echo "<option value='Available'> Available </option>";
    echo "<option value='Storage'> Storage </option>";
}else {
     echo "<option value='Unavailable'> Unavailable </option>";
     echo "<option value='Available'> Available </option>";
}
?>
                    <option value=''></option>
                </select>
            </div>


	
    

    <div class="form-group mb-3">
        <input class="btn btn-primary" type="submit" name="update_room" value="Update Room">
    </div>
    
</form>
            
            
 
