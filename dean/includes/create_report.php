

<?php
    if(isset($_POST['create_report'])){
        
        $report_id = $_POST['report_id'];
        $student_id = $_POST['student_id']; 
        $report_title = $_POST['report_title'];
        $report_desc = $_POST['report_desc'];
        $hall_id = $_POST['hall_id'];
        $room_number = $_POST['room_number'];
        $report_date = $_POST['report_date'];
        $report_status = $_POST['report_status'];


        //We need a querry to insert the data from the user to the database.
        $query ="INSERT INTO report(report_id, student_id, report_titile, report_desc,  hall_id, room_number, report_date, report_status) 
                VALUES ('$report_id','$student_id', '$report_titile' , '$report_desc',   '$hall_id', '$room_number' , '$report_date' ,  '$report_status')";

        $create_report_query = mysqli_query($connection,$query);


        // Test the Querry
        if(!$create_report_query){
            die("Cant send your Report " .mysqli_error($connection));
        }
     

        echo "<div class='alert alert-success'>Report sent Succesfully. <a href='report.php' class='btn btn-primary'>View Student
        </a></div>";
        
        
    }

?>








<!-- Create Report  Form-->

<form action="" method="post">

<div class="form-group mt-3">
    <label for="report_title">Report Title</label>
    <input type="text" class="form-control" id="report_title" name="report_title" required>
</div>

<div class="form-group mt-3">
    <label for="report_description">Report Description</label>
    <textarea class="form-control" id="report_description" name="report_description" rows="4" required></textarea>
</div>

<div class="form-group mt-3">
    <label for="report_image"><h6>Picture</h6></label><br>
    <input type="file" name="report_image" id="report_image">
</div>



<input type="submit" value="create_report" class="btn btn-primary mt-3">

</form>
<!-- End of the form -->
            



