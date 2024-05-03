


    <!-- Content Goes here -->


    <?php
    //get the student id from url
    if(isset($_GET['edit_student'])){
        $the_student_id = $_GET['edit_student'];  
    }


        $query = "SELECT * FROM student WHERE student_id = $the_student_id";
        $select_student_by_id = mysqli_query($connection, $query);

        if(!$select_student_by_id){
            die('Query Failed' .mysqli_error($connection));
        }
        // $row  = mysqli_fetch_assoc($edit_student_query);

        while($row = mysqli_fetch_assoc($select_student_by_id)){
            $student_id = $row["student_id"];
            $user_id = $row["user_id"];
            $student_firstname = $row["student_firstname"];
            $student_lastname = $row["student_lastname"];
            $student_email = $row["student_email"];
            $student_password = $row["student_password"];
            $student_major = $row["student_major"] ;
            $student_image = $row["student_image"];
            $hall_id = $row["hall_id"];
            $room_number = $row["room_number"];
    }






    if(isset($_POST['update_student'])){   
        $student_id = $_POST['student_id'];
        $user_id = $_POST['user_id'];
        $student_firstname = $_POST['student_firstname'];
        $student_lastname = $_POST['student_lastname'];
        $student_email = $_POST['student_email'];
        $student_password = $_POST['student_password'];
        $student_major = $_POST['student_major'];
        $hall_id = $_POST['hall_id'];
        $room_number = $_POST['room_number'];


        //We need a querry to insert the data from the user to the database.
        // $query ="UPDATE student SET (student_id, user_id, student_firstname, student_lastname, student_password, student_email, student_major, student_image) VALUES ('$student_id', '$user_id', '$student_firstname', '$student_lastname', '$student_password', '$student_email', '$student_major', '$student_image') WHERE student_id = '$the_student_id'";

        // $update_student_query = mysqli_query($connection,$query);



        // $query = "UPDATE student SET ";
        // $query .= "student_id = '{$student_id}'";
        // $query .= "user_id = '{$user_id}'"; 
        // $query .= "student_firstname = '{$student_firstname}'";
        // $query .= "student_lastname = '{$student_lastname}'";
        // $query .= "student_password = '{$student_password}'";
        // $query .= "student_email = '{$student_email}'";  
        // $query .= "student_major = '{$student_major}'";
        // $query .= "student_image = '{$student_image}'";
        // $query .= "WHERE `student_id` = $the_student_id";


        $query = "UPDATE `student` SET student_id = $student_id, user_id = $user_id, student_firstname = '$student_firstname', student_lastname = '$student_lastname', student_email = '$student_email',  student_password = '$student_password', student_major = '$student_major', student_image = '$student_image', hall_id = '$hall_id' , room_number = '$room_number' WHERE `student_id` = $the_student_id";

        $update_student_query = mysqli_query($connection,$query);

        // confirmQuery( $update_student_query );
        

        // Test the Querry
        if(!$update_student_query){
            die("Cannot Add the User " .mysqli_error($connection));
        }
     

        echo "<div class='alert alert-success'>User Updated Succesfully. <a href='student.php' class='btn btn-primary'>View Student</a></div>";
        
        
    }

?>





<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group mb-3">
        <label for="title">Student ID</label>
        <input type="text" class="form-control" value="<?= $student_id ?>" name="student_id">
    </div>

    <div class="form-group mb-3">
        <label for="user_lastname">User ID</label>
        <input type="text" class="form-control" value="<?= $user_id ?>" name="user_id">
    </div>

    <div class="form-group mb-3">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" value="<?= $student_firstname ?>" name="student_firstname">
    </div>

    <div class="form-group mb-3">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" value="<?= $student_lastname ?>" name="student_lastname">
    </div>


    
    <div class="form-group mb-3">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" value="<?= $student_email ?>" name="student_email">
    </div>
    


    <div class="form-group mb-3">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" value="<?= $student_password ?>" name="student_password">
    </div>


    <div class="form-group mb-3">
        <label for="post_content">Major</label>
        <input type="text" class="form-control" value="<?= $student_major ?>" name="student_major">
    </div>


    <!-- <div class="form-group mb-3">
        <select class="form-control" name="student_major" id=""  >
            <option  value=""></option>

        </select>
    </div> -->


    <div class="form-group mb-3">
        <label for="post_content">Image</label>
        <input type="text" class="form-control" value="<?= $student_image ?>" name="student_image">
    </div>


    <div class="form-group mb-3">
        <label for="post_content">Hall</label>
        <input type="text" class="form-control" value="<?= $hall_id ?>" name="hall_id">
    </div>
    
    
    <div class="form-group mb-3">
        <label for="post_content">Room</label>
        <input type="text" class="form-control" value="<?= $room_number ?>" name="room_number">
    </div>





    <div class="form-group mb-3">
        <input class="btn btn-primary" type="submit" name="update_student" value="Update Student">
    </div>
    
</form>
            
            
 
