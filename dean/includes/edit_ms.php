


    <!-- Content Goes here -->


    <?php
    //get the student id from url
    if(isset($_GET['edit_ms'])){
        $the_ps_id = $_GET['edit_ms'];  
    }


        $query = "SELECT * FROM plant_service WHERE ps_id = $the_ps_id";
        $select_ps_by_id = mysqli_query($connection, $query);

        if(!$select_ps_by_id){
            die('Query Failed' .mysqli_error($connection));
        }
        // $row  = mysqli_fetch_assoc($edit_student_query);

        while($row = mysqli_fetch_assoc($select_ps_by_id)){
            $ps_id = $row["ps_id"];
            $ps_firstname = $row["ps_firstname"];
            $ps_lastname = $row["ps_lastname"];
            $ps_password = $row["ps_password"];
            $ps_email = $row["ps_email"];
            $ps_phonenumber = $row["ps_phonenumber"] ;
            $ps_office = $row["ps_office"];
            $ps_picture = $row["ps_picture"];
            $ps_role = $row["ps_role"];
    }






    if(isset($_POST['update_ms'])){   
        $ps_id = $_POST['ps_id'];
        $ps_firstname = $_POST['ps_firstname'];
        $ps_lastname = $_POST['ps_lastname'];
        $ps_password = $_POST['ps_password'];
        $ps_email = $_POST['ps_email'];
        $ps_phonenumber = $_POST['ps_phonenumber'];
        $ps_office = $_POST['ps_office'];
        $ps_picture = $_POST['ps_picture'];
        $ps_role = $_POST['ps_role'];




        $query = "UPDATE `plant_service` SET ps_id = $ps_id, ps_firstname = '$ps_firstname', ps_lastname = '$ps_lastname', ps_password = '$ps_password', ps_email = '$ps_email', ps_phonenumber = '$ps_phonenumber', ps_office = '$ps_office', ps_picture = '$ps_picture', ps_role = '$ps_role' WHERE `ps_id` = $the_ps_id";

        $update_ps_query = mysqli_query($connection,$query);

        // confirmQuery( $update_student_query );
        

        // Test the Querry
        if(!$update_ps_query){
            die("Cannot Add the User " .mysqli_error($connection));
        }
     

        echo "<div class='alert alert-success'>User Updated Succesfully. <a href='ms.php' class='btn btn-primary'>View</a></div>";
        
        
    }

?>





<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group mb-3">
        <label for="title"> ID</label>
        <input type="text" class="form-control" value="<?= $ps_id ?>" name="ps_id">
    </div>


    <div class="form-group mb-3">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" value="<?= $ps_firstname ?>" name="ps_firstname">
    </div>

    <div class="form-group mb-3">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" value="<?= $ps_lastname ?>" name="ps_lastname">
    </div>

    
    <div class="form-group mb-3">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" value="<?= $ps_password ?>" name="ps_password">
    </div>

    <div class="form-group mb-3">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" value="<?= $ps_email ?>" name="ps_email">
    </div>

    <div class="form-group mb-3">
        <label for="post_content">Major</label>
        <input type="text" class="form-control" value="<?= $ps_phonenumber ?>" name="ps_phonenumber">
    </div>



    <div class="form-group mb-3">
        <label for="post_content">Office</label>
        <input type="text" class="form-control" value="<?= $ps_office ?>" name="ps_office">
    </div>


    <div class="form-group mb-3">
        <label for="post_content">Picture</label>
        <input type="text" class="form-control" value="<?= $ps_picture ?>" name="ps_picture">
    </div>


    <div class="form-group mb-3">
        <label for="post_content">Role</label>
        <input type="text" class="form-control" value="<?= $ps_role ?>" name="ps_role">
    </div>





    <div class="form-group mb-3">
        <input class="btn btn-primary" type="submit" name="update_ms" value="Update MS">
    </div>
    
</form>
            
            
 
