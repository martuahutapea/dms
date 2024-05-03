


    <!-- Content Goes here -->


    <?php
    if(isset($_POST['add_student'])){
        
        $student_id = $_POST['student_id'];
        $student_firstname = $_POST['student_firstname'];
        $student_lastname = $_POST['student_lastname'];
        $student_email = $_POST['student_email'];
        $student_password = $_POST['student_password'];
        $student_major = $_POST['student_major'];


        $student_image = $_FILES['image']['name'];
        $student_image_tmp = $_FILES['image']['tmp_name'];


        $room_number = $_POST['room_number'];


        //We need a querry to insert the data from the user to the database.
        $query ="INSERT INTO student(student_id, student_firstname, student_lastname, student_email, student_password, student_major, student_image, room_number) 
        VALUES ('$student_id', '$student_firstname', '$student_lastname', '$student_email', '$student_password', '$student_major', '$student_image', '$room_number')";       

        $add_student_query = mysqli_query($connection,$query);


        // Test the Querry
        if(!$add_student_query){
            die("Cannot Add the User " .mysqli_error($connection));
        }
     

        echo "<div class='alert alert-success'>User Create Succesfully. <a href='student.php' class='btn btn-primary'>View Student
        </a></div>";
        
        
    }

?>





<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group mb-3">
        <label for="title">Student ID</label>
        <input type="text" class="form-control" name="student_id">
    </div>


    <div class="form-group mb-3">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="student_firstname">
    </div>

    <div class="form-group mb-3">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="student_lastname">
    </div>


    <!-- <div class="form-group">
    <label> Select Roles:</label><br>       
        <select  name="user_role" id="">
            <option class="form-control" value="subscriber">Subscriber</option>
            <option class="form-option" value="admin">Admin</option>         
        </select>
    </div> -->

    


    <div class="form-group mb-3">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="student_email">
    </div>


    <div class="form-group mb-3">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="student_password">
    </div>
    

    <div class="form-group mb-3">
        <label for="post_content">Major</label>
        <input type="text" class="form-control" name="student_major">
    </div>


    <!-- <div class="form-group mb-3">
        <select class="form-control" name="student_major" id=""  >
            <option  value="">Select Major:</option>
            <option value="Biology">Biology</option>
            <option value="Bussiness">Bussiness</option>
            <option value="Theology">Theology</option>
            <option value="English">Englsih</option>

        </select>
    </div> -->
   
    <!-- <div class="form-group">
        <label for="post_content">Nationality</label>
        <input type="text" class="form-control" name="student_nationlity">
    </div> -->


    <div class="form-group mb-3">
        <label for="post_content">Image</label>
        <input type="file" width="100" class="form-control" name="image">
    </div>



    <!-- Make a room dynamic -->
    <div class="form-group dropdown mb-3">
    <label for="title">Room Number</label>
			<select name="room_number" id="room_number" class="form-select" aria-label="Disabled select example">
	<option selected >Select Room:</option>
	<?php
	$query = "SELECT * FROM room ";
	$select_room = mysqli_query($connection,$query);

	while($row = mysqli_fetch_assoc($select_room)){
		$room_number = $row["room_number"];

		echo "<option value='$room_number'>{$room_number} </option>";
	}
	?>
			</select>
		</div>
    <!--  -->


    <!-- <div class="form-group mb-3">
        <select class="form-control" name="type" id="type">
            <option  value="student">User type:</option>
            <option value="student">Student</option>
        </select>
    </div> -->




    <div class="form-group mb-3">
        <input class="btn btn-primary" type="submit" name="add_student" value="Add Student">
    </div>
    
</form>
            
            
 
