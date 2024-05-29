<!-- Create Report  Form-->

<form action="report.php" method="post" enctype="multipart/form-data">

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

<div  class="form-group mt-3">
    <label for="urgency">Urgency Status</label>
            <select class="form-select mb-3" aria-label="Large select example" name="urgency">
                <option value="">Select Status:</option>
                <option value="Critical">Critical</option>
                <option value="High">High</option>
                <option value="High">Moderate</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
    </div>



<input type="submit" value="Send Report" name="create_report" class="btn btn-primary mt-3">

</form>
<!-- End of the form -->