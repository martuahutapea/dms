<?php

// if(!$connection){
//     die("Connection Failled " .mysqli_connect_error());
// }else{
//     echo "we are connected";
// }


    if(isset($_POST['add_ms'])){
        
        $ps_id = $_POST['ps_id'];
        $ps_firstname = $_POST['ps_firstname'];
        $ps_lastname = $_POST['ps_lastname'];
        $ps_password = $_POST['ps_password'];
        $ps_email = $_POST['ps_email'];
        $ps_phonenumber = $_POST['ps_phonenumber'];
        $ps_office = $_POST['ps_office'];
        $ps_picture = $_POST['ps_picture'];
        $ps_role = $_POST['ps_role'];


        //We need a querry to insert the data from the user to the database.
        $query ="INSERT INTO plant_service (ps_id, ps_firstname, ps_lastname, ps_password, ps_email, ps_phonenumber, ps_office, ps_picture, ps_role ) VALUES ('$ps_id', '$ps_firstname', '$ps_lastname', '$ps_password', '$ps_email', '$ps_phonenumber', '$ps_office', '$ps_picture', '$ps_role')";
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
<form action="" method="post" enctype="">
    <div class="form-group">
        <label for="title">ID</label>
        <input type="text" class="form-control" name="ps_id">
    </div>


    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="ps_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="ps_lastname">
    </div>


    
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="ps_password">
    </div>

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="ps_email">
    </div>

    <div class="form-group">
        <label for="post_content">Phone Number</label>
        <input type="text" class="form-control" name="ps_phonenumber">
    </div>



    <div class="form-group">
        <label for="post_content">Office</label>
        <input type="text" class="form-control" name="ps_office">
    </div>


    <div class="form-group">
        <label for="post_content">Picture</label>
        <input type="text" class="form-control" name="ps_picture">
    </div>
   
   
    <div class="form-group">
        <label for="post_content">Role</label>
        <input type="text" class="form-control" name="ps_role">
    </div>



    <div class="form-group mt-3">
        <input class="btn btn-primary" type="submit" name="add_ms" value="Add MS">
    </div>
    
</form>