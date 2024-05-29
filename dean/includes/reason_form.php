<!-- Create Report  Form-->

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" value="<?= $report_id ?>" name="report_id">
<div class="form-group mt-3">
    <label for="report_title">Report Title</label>
    <input type="text" class="form-control" id="report_title" name="report_title" value="<?= $row['report_title']; ?>" readonly>
</div>

<div class="form-group mt-3">
    <label for="report_description">Report Description</label>
    <textarea class="form-control" id="report_description" name="report_description" rows="4" readonly></textarea>
</div>

<div class="form-group mt-3">
    <label for="report_image"><h6>Picture</h6></label><br>
    <img src="<?php echo "../report_image/" .$row['report_image']; ?>" width="10%">
</div>
<br>
<div  class="form-group mt-3">
    <label for="reason">Reason</label>
    <textarea type="text" class="form-control" name="reason" id="reason" required></textarea>
</div>

<input type="submit" value="Update reason" name="update_reason" class="btn btn-primary mt-3">

</form>
<!-- End of the form -->