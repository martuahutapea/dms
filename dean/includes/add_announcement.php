

<?php
    if(isset($_POST['add_announcement'])){
        
        $announcement_title = $_POST['announcement_title'];
        $announcement_content = $_POST['announcement_content']; 
        $announcement_date = $_POST['announcement_date'];
        $dean_id = $_SESSION["dean_id"];



        //We need a querry to insert the data from the user to the database.
        $query ="INSERT INTO announcement(announcement_title, announcement_content, announcement_date, dean_id) 
                VALUES ('$announcement_title','$announcement_content', '$announcement_date' , '$dean_id')";

        $add_announcement = mysqli_query($connection,$query);


        // Test the Querry
        if(!$add_announcement){
            die("Cant send your Announcement " .mysqli_error($connection));
        }
     

        echo "<div class='alert alert-success'>Announcement sent Succesfully. <a href='announcement.php' class='btn btn-primary'>View
        </a></div>";
        
        
    }

?>








<!-- Create Report  Form-->

<form action="" method="post">

<div class="form-group mt-3">
    <label for="announcement_title">Title</label>
    <input type="text" class="form-control" id="announcement_title" name="announcement_title" required>
</div>

<div class="form-group mt-3">
    <label for="announcement_content">Content</label>
    <textarea class="form-control" id="announcement_content" name="announcement_content" rows="4" required></textarea>
</div>

<div class="form-group mt-3">
    <label for="announcement_date"><h6>Date</h6></label><br>
    <input type="text" class="form-control" id="announcement_date" name="announcement_date" value="<?= date('Y-m-d H:i:s')?>" required readonly>
</div>



<input type="submit" name="add_announcement" value="Add" class="btn btn-primary mt-3">

</form>
<!-- End of the form -->
            



