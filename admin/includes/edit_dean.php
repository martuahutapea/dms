


    <!-- Content Goes here -->


    <?php
    //get the student id from url
    if(isset($_GET['edit_dean'])){
        $the_dean_id = $_GET['edit_dean'];  
    }


        $query = "SELECT * FROM dean WHERE dean_id = $the_dean_id";
        $select_dean_by_id = mysqli_query($connection, $query);

        if(!$select_dean_by_id){
            die('Query Failed' .mysqli_error($connection));
        }
        // $row  = mysqli_fetch_assoc($edit_student_query);

        while($row = mysqli_fetch_assoc($select_dean_by_id)){
            $dean_id = $row["dean_id"];
            $dean_firstname = $row["dean_firstname"];
            $dean_lastname = $row["dean_lastname"];
            $dean_email = $row["dean_email"];
            $dean_password = $row["dean_password"];
            $dean_phonenumber = $row["dean_phonenumber"] ;
            $dean_office = $row["dean_office"];
            $dean_image = $row["dean_image"];
            $hall_id = $row["hall_id"];
    }





    // Update the Dean
    if(isset($_POST['update_dean'])){   
        $dean_id = $_POST['dean_id'];
        $dean_firstname = $_POST['dean_firstname'];
        $dean_lastname = $_POST['dean_lastname'];
        $dean_email = $_POST['dean_email'];
        $dean_password = $_POST['dean_password'];
        $dean_phonenumber = $_POST['dean_phonenumber'];
        $dean_office = $_POST['dean_office'];


        $dean_image = $_FILES['image']['name'];
        $dean_image_tmp = $_FILES['image']['tmp_name'];
        
        
        $hall_id = $_POST['hall_id'];


        move_uploaded_file($dean_image_tmp, "../images/$dean_image");

        $query = "UPDATE `dean` SET dean_id = $dean_id, dean_firstname = '$dean_firstname', dean_lastname = '$dean_lastname',  dean_email = '$dean_email', dean_password = '$dean_password', dean_phonenumber = '$dean_phonenumber', dean_office = '$dean_office', dean_image = '$dean_image', hall_id = '$hall_id' WHERE `dean_id` = $the_dean_id";

        $update_dean_query = mysqli_query($connection,$query);

        // confirmQuery( $update_student_query );
        

        // Test the Querry
        if(!$update_dean_query){
            die("Cannot Add the User " .mysqli_error($connection));
        }
     

        echo "<div class='alert alert-success'>User Updated Succesfully. <a href='dean.php' class='btn btn-primary'>View</a></div>";
        
        
    }

?>





<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Dean ID</label>
        <input type="text" class="form-control" value="<?= $dean_id ?>" name="dean_id">
    </div>



    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" value="<?= $dean_firstname ?>" name="dean_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" value="<?= $dean_lastname ?>" name="dean_lastname">
    </div>

    

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" value="<?= $dean_email ?>" name="dean_email">
    </div>


    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" value="<?= $dean_password ?>" name="dean_password">
    </div>



    <div class="form-group">
        <label for="post_content">Phone Number</label>
        <input type="text" class="form-control" value="<?= $dean_phonenumber ?>" name="dean_phonenumber">
    </div>



    <div class="form-group">
        <label for="post_content">Office</label>
        <input type="text" class="form-control" value="<?= $dean_office ?>" name="dean_office">
    </div>

    <div class="form-group">
        <label for="post_content">Image</label>
        <input type="file" class="form-control" value="<?= $dean_image ?>" name="image">
    </div>


        <!-- Make a hall dynamic -->
        <div class="form-group dropdown mb-3">
    <label for="title">Hall</label>
			<select name="hall_id" id="hall_id" class="form-select" aria-label="Disabled select example"  value="<?= $hall_id ?>">
	<option value="<?= $hall_id ?>">Select hall:</option>
	<?php
	$query = "SELECT * FROM hall ";
	$select_hall = mysqli_query($connection,$query);

	while($row = mysqli_fetch_assoc($select_hall)){
		$hall_id = $row["hall_id"];
		$hall_name = $row["hall_name"];

		echo "<option value='$hall_id' ". ($hall_id == $row['hall_id']? 'selected' : ''). ">{$hall_id} ({$hall_name}) </option>";
	}
	?>
			</select>
		</div>
    <!--  -->
 





    <div class="form-group mt-3">
        <input class="btn btn-primary" type="submit" name="update_dean" value="Update">
    </div>
    
</form>
            
            
 
