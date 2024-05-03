<div class="mb-3">
    <h1>Add Hall</h1>
</div>

<hr>

<?php

// if(!$connection){
//     die("Connection Failled " .mysqli_connect_error());
// }else{
//     echo "we are connected";
// }


    if(isset($_POST['add_hall'])){
        
        $hall_id = $_POST['hall_id'];
        $hall_name = $_POST['hall_name'];
        $dean_id = $_POST['dean_id'];
        $hall_status = $_POST['hall_status'];
        $hall_category = $_POST['hall_category'];


        //We need a querry to insert the data from the user to the database.
        $query ="INSERT INTO hall (hall_id, hall_name, dean_id, hall_status, hall_category) VALUES ('$hall_id', '$hall_name', '$dean_id', '$hall_status', '$hall_category')";
        $add_hall_query = mysqli_query($connection,$query);

//Error Handling 
if (!$add_hall_query) {
    echo "Error: ". mysqli_error($connection);
}

        echo "<div class='alert alert-success'>Hall Create Succesfully. <a href='hall.php' class='btn btn-primary'>View Hall</a></div>";
        
        // confirmQuery($add_ps_query);
    }

?>





<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="">
    <div class="form-group mb-3">
        <label for="title">ID</label>
        <input type="text" class="form-control" name="hall_id">
    </div>


    <div class="form-group mb-3">
        <label for="title">Name</label>
        <input type="text" class="form-control" name="hall_name">
    </div>






    <div class="form-group dropdown mb-3">
    <label for="title">Dean</label>
			<select name="dean_id" id="dean_id" class="form-select" aria-label="Disabled select example">
	<option selected >Select Dean:</option>
	<?php
	$query = "SELECT * FROM dean ";
	$select_dean = mysqli_query($connection,$query);

	while($row = mysqli_fetch_assoc($select_dean)){
		$dean_id = $row["dean_id"];
		$dean_firstname = $row["dean_firstname"];
		$dean_lastname = $row["dean_lastname"];

		echo "<option value='$dean_id'>{$dean_id} = {$dean_firstname} {$dean_lastname} </option>";
	}
	?>
			</select>
		</div>
	




    <div  class="form-group mb-3">
    <label for="user_lastname">Status</label>
            <select class="form-select mb-3" aria-label="Large select example" name="hall_status">
                <option value="">Select Status:</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
    </div>



    <div  class="form-group mb-3">
    <label for="user_lastname">Category</label>
            <select class="form-select mb-3" aria-label="Large select example" name="hall_category">
                <option value="">Select Category:</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Guest">Guest</option>
            </select>
    </div>
    
    <!-- <div class="form-group mb-3">
        <label for="post_content">Category</label>
        <input type="text" class="form-control" name="hall_category">
    </div> -->



    <div class="form-group mb-3 ">
        <input class="btn btn-primary" type="submit" name="add_hall" value="Add Hall">
    </div>
    
</form>