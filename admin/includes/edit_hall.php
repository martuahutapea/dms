<div class="mb-5">
    <h1>Update Hall</h1>
    <hr>
    
</div>




    <!-- Content Goes here -->


    <?php
    //get the student id from url
    if(isset($_GET['edit_hall'])){
        $the_hall_id = $_GET['edit_hall'];  
    }


        $query = "SELECT * FROM hall WHERE hall_id = $the_hall_id";
        $select_hall_by_id = mysqli_query($connection, $query);

        if(!$select_hall_by_id){
            die('Query Failed' .mysqli_error($connection));
        }
        // $row  = mysqli_fetch_assoc($edit_student_query);

        while($row = mysqli_fetch_assoc($select_hall_by_id)){
            $hall_id = $row["hall_id"];
            $hall_name = $row["hall_name"];
            $dean_id = $row["dean_id"];
            $hall_status = $row["hall_status"];
            $hall_category = $row["hall_category"];
    }






    if(isset($_POST['update_hall'])){   
        $hall_id = $_POST['hall_id'];
        $hall_name = $_POST['hall_name'];
        $dean_id = $_POST['dean_id'];
        $hall_status = $_POST['hall_status'];
        $hall_category = $_POST['hall_category'];



        $query = "UPDATE `hall` SET hall_id = $hall_id, hall_name = '$hall_name', hall_status = '$hall_status', hall_category = '$hall_category', dean_id = '$dean_id' WHERE `hall_id` = $the_hall_id";

        $update_hall_query = mysqli_query($connection,$query);

        // confirmQuery( $update_student_query );
        

        // Test the Querry
        if(!$update_hall_query){
            die("Cannot Add the User " .mysqli_error($connection));
        }
     

        echo "<div class='alert alert-success'> Hall has been Updated Succesfully. <a href='hall.php' class='btn btn-primary'>View Hall</a></div>";
        
        
    }

?>





<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group mb-3">
        <label for="title"> Hall-ID</label>
        <input type="text" class="form-control" value="<?= $hall_id ?>" name="hall_id">
    </div>


    <div class="form-group mb-3">
        <label for="title">Name</label>
        <input type="text" class="form-control" value="<?= $hall_name ?>" name="hall_name">
    </div>
    
    <!-- <div class="form-group mb-3">
        <label for="title">Dean Id</label>
        <input type="text" class="form-control" value="" name="dean_id">
    </div> -->



	
            <!-- Make a Dean dynamic -->
            <div class="form-group dropdown mb-3">
    <label for="title">Dean</label>
			<select name="dean_id" id="dean_id" class="form-select" aria-label="Disabled select example"  value="<?= $dean_id ?>">
	<option value="<?= $dean_id ?>">Select dean:</option>
	<?php
	$query = "SELECT * FROM dean ";
	$select_dean = mysqli_query($connection,$query);

	while($row = mysqli_fetch_assoc($select_dean)){
		$dean_id = $row["dean_id"];
        $dean_firstname = $row["dean_firstname"];
		$dean_lastname = $row["dean_lastname"];

		echo "<option value='$dean_id' ". ($dean_id == $row['dean_id']? 'selected' : ''). ">{$dean_id} = {$dean_firstname} {$dean_lastname}  </option>";
	}
	?>
			</select>
		</div>
    <!--  -->





        <!-- Make Status dynamic -->
        <div class="form-group mb-3">
            <label for="status">Status</label><br>
                <select name="hall_status" id=""  class="form-select mb-3">
                    <option value='<?php echo $hall_status; ?>'> <?php echo $hall_status; ?> </option>
<?php

if($hall_status == 'Active'){
    echo "<option value='Inactive'> Inactive </option>";
}else{
    echo "<option value='Active'> Active </option>";
}
?>
                <option value=''></option>
            </select>
        </div>
 
 
 
 
 
        <!-- Make Category dynamic -->
        <div class="form-group mb-3">
            <label for="category">Category</label><br>
                <select name="hall_category" id=""  class="form-select mb-3">
                    <option value='<?php echo $hall_category; ?>'> <?php echo $hall_category; ?> </option>
<?php

if($hall_category == 'Male'){
    echo "<option value='Female'> Female </option>";
    echo "<option value='Guest'> Guest </option>";
}elseif ($hall_category == 'Female') {
    echo "<option value='Male'> Male </option>";
    echo "<option value='Guest'> Guest </option>";
}else{
    echo "<option value='Male'> Male </option>";
    echo "<option value='Female'> Female </option>";
}
?>
                <option value=''></option>
            </select>
        </div>



    <div class="form-group mb-3">
        <input class="btn btn-primary" type="submit" name="update_hall" value="Update">
    </div>
    
</form>
            
            
 
