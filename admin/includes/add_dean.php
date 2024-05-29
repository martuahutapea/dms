<?php


    if(isset($_POST['add_dean'])){
        
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

//Set the default picture 
if (isset($_FILES['picture'])) {
    $dean_image = $_FILES['image']['name'];
    $dean_image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($ps_picture_tmp, "../images/$dean_image");
} else {
    $ps_picture = 'default_picture.jpg';
}

        //We need a querry to insert the data from the user to the database.
        $query ="INSERT INTO dean (dean_id, dean_firstname, dean_lastname, dean_email, dean_password,  dean_phonenumber, dean_office, dean_image, hall_id ) VALUES ('$dean_id', '$dean_firstname', '$dean_lastname', '$dean_email',  '$dean_password', '$dean_phonenumber', '$dean_office', '$dean_image', '$hall_id')";
        $add_dean_query = mysqli_query($connection,$query);

//Error Handling 
if (!$add_dean_query) {
    echo "Error: ". mysqli_error($connection);
}

        echo "<div class='alert alert-success'>User Create Succesfully. <a href='dean.php' class='btn btn-primary'>View</a></div>";
        
        // confirmQuery($add_ps_query);
    }

?>





<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
        <label for="title">Dean ID</label>
        <input type="text" class="form-control" name="dean_id">
    </div>

    <!-- <div class="form-group">
        <label for="title"> User ID</label>
        <input type="text" class="form-control" name="user_id">
    </div> -->



          <!-- Dynamic User -->
          <!-- <div class="form-group dropdown mb-3">
    <label for="title">User</label>
			<select name="user_id" id="user_id" class="form-select" aria-label="Disabled select example">
	<option selected >User:</option> -->
<?php
// $query = "SELECT * FROM login ";
// $select_user = mysqli_query($connection,$query);

// while($row = mysqli_fetch_assoc($select_user)){
// $user_id = $row["user_id"];
// $role = $row["role"];

// echo "<option value='$user_id'>{$user_id} = {$role} </option>";
// }
?>
			<!-- </select>
		</div> -->


    <div class="form-group mb-3">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="dean_firstname">
    </div>

    <div class="form-group mb-3">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="dean_lastname">
    </div>


    

    <div class="form-group mb-3">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="dean_email">
    </div>

    <div class="form-group mb-3">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="dean_password">
    </div>



    <div class="form-group mb-3">
        <label for="post_content">Phone Number</label>
        <input type="text" class="form-control" name="dean_phonenumber">
    </div>



    <div class="form-group mb-3">
        <label for="post_content">Office</label>
        <input type="text" class="form-control" name="dean_office">
    </div>

    <div class="form-group mb-3">
        <label for="post_content">Image</label>
        <br>
        <input type="file" class="form-file" name="image">
    </div>


    <!-- <div class="form-group">
        <label for="post_content">Hall</label>
        <input type="text" class="form-control" name="hall_id">
    </div> -->


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
        <input class="btn btn-primary" type="submit" name="add_dean" value="Add Dean">
    </div>
    
</form>