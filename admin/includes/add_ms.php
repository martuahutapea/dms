<?php
    if(isset($_POST['add_ms'])){
        
        $ps_id = $_POST['ps_id'];
        $ps_firstname = $_POST['ps_firstname'];
        $ps_lastname = $_POST['ps_lastname'];
        $ps_password = $_POST['ps_password'];
        $ps_email = $_POST['ps_email'];
        $ps_phonenumber = $_POST['ps_phonenumber'];
        $ps_office = $_POST['ps_office'];


        $ps_picture = $_FILES['picture']['name'];
        $ps_picture_tmp = $_FILES['picture']['tmp_name'];


        $ps_role = $_POST['ps_role'];


        // move_uploaded_file($ps_picture_tmp, "../images/$ps_picture");
         // Hash the password
        $hashed_password = password_hash($ps_password, PASSWORD_BCRYPT);

//Set the default picture 
if (isset($_FILES['picture'])) {
    $ps_picture = $_FILES['picture']['name'];
    $ps_picture_tmp = $_FILES['picture']['tmp_name'];
    move_uploaded_file($ps_picture_tmp, "../images/$ps_picture");
} else {
    $ps_picture = '../images/default_picture.jpg';
}


        //We need a querry to insert the data from the user to the database.
        $query ="INSERT INTO plant_service (ps_id, ps_firstname, ps_lastname, ps_password, ps_email, ps_phonenumber, ps_office, ps_picture, ps_role ) VALUES ('$ps_id', '$ps_firstname', '$ps_lastname', '$hashed_password', '$ps_email', '$ps_phonenumber', '$ps_office', '$ps_picture', '$ps_role')";
        $add_ps_query = mysqli_query($connection,$query);

//Error Handling 
if (!$add_ps_query) {
    echo "Error: ". mysqli_error($connection);
}

        echo "<div class='alert alert-success'>User Create Succesfully. <a href='ms.php' class='btn btn-primary'>View User</a></div>";
        
        // confirmQuery($add_ps_query);
    }

?>





<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
        <label for="title">ID</label>
        <input type="text" class="form-control" name="ps_id">
    </div>


    <div class="form-group mb-3">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="ps_firstname">
    </div>

    <div class="form-group mb-3">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="ps_lastname">
    </div>


    
    <div class="form-group mb-3">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="ps_password">
    </div>

    <div class="form-group mb-3">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="ps_email">
    </div>

    <div class="form-group mb-3">
        <label for="post_content">Phone Number</label>
        <input type="text" class="form-control" name="ps_phonenumber">
    </div>



    <div class="form-group mb-3">
        <label for="post_content">Office</label>
        <input type="text" class="form-control" name="ps_office">
    </div>


    <div class="form-group mb-3">
        <label for="post_content">Picture</label>
        <br>
        <input type="file" width="100" class="form-file" name="picture">
    </div>
   
   
    <div class="form-group mb-3">
        <label for="post_content">Role</label>
        <input type="text" class="form-control" name="ps_role">
    </div>



    <div class="form-group mb-3">
        <input class="btn btn-primary" type="submit" name="add_ms" value="Add MS">
    </div>
    
</form>