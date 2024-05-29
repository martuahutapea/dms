<!-- Create Report  Form-->

<form action="handbook.php?id=<?= $id; ?>" method="post" enctype="multipart/form-data">


<div class="form-group mt-3">
    <label for="handbook_file"><h6>Handbook</h6></label><br>
    <input type="file" name="handbook_file" id="handbook_file">
</div>



<input type="submit" value="Upload handbook" name="upload_handbook" class="btn btn-primary mt-3">

</form>
<!-- End of the form -->