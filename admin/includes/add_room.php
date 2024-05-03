


    <!-- Content Goes here -->


    <?php
    if(isset($_POST['add_room'])){
        
        $room_number = $_POST['room_number'];
        // $student_id = $_POST['student_id'];
        $room_facility = $_POST['room_facility'];
        $room_status = $_POST['room_status'];
        $hall_id = $_POST['hall_id'];


        //We need a querry to insert the data from the user to the database.
        $query ="INSERT INTO room (room_number,  room_facility, room_status, hall_id ) 
                VALUES ('$room_number', '$room_facility' , '$room_status',   '$hall_id' )";

        $add_room_query = mysqli_query($connection,$query);


        // Test the Querry
        if(!$add_room_query){
            die("Cannot Add the User " .mysqli_error($connection));
        }
     

        echo "<div class='alert alert-success'>User Create Succesfully. <a href='room.php' class='btn btn-primary'>View Room
        </a></div>";
        
        
    }

?>





<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group mb-3">
        <label for="title">Room Number</label>
        <input type="text" class="form-control" name="room_number">
    </div>

    <!-- <div class="form-group mb-3">
        <label for="user_lastname">Student</label>
        <input type="text" class="form-control" name="student_id">
    </div> -->



        <!-- Make Status dynamic -->
    <div  class="form-group mb-3">
    <label for="user_lastname">Facility</label>
            <select class="form-select mb-3" aria-label="Large select example" name="room_facility">
                <option value="">Facility:</option>
                <option value="Ac">Ac</option>
                <option value="Fan">Fan</option>
            </select>
    </div>


    <!-- Make Status dynamic -->
    <div  class="form-group mb-3">
    <label for="user_lastname">Status</label>
            <select class="form-select mb-3" aria-label="Large select example" name="room_status">
                <option value="">Select Status:</option>
                <option value="Available">Available</option>
                <option value="Unavailable">Unavailable</option>
            </select>
    </div>



           <!-- Dynamic Hall -->
           <div class="form-group dropdown mb-3">
                <label for="title">Hall</label>
			        <select name="hall_id" id="hall_id" class="form-select" aria-label="Disabled select example">
	                    <option selected >Select Hall:</option>
<?php
$query = "SELECT * FROM hall ";
$select_dean = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_dean)){
$hall_id = $row["hall_id"];
$hall_name = $row["hall_name"];

echo "<option value='$hall_id'>{$hall_id} = {$hall_name} </option>";
}
?>
                </select>
            </div>





    <div class="form-group mb-3">
        <input class="btn btn-primary" type="submit" name="add_room" value="Add Room">
    </div>
    
</form>
            
            
 
