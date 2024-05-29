<?php


if (!$connection) {
    die("Connection failed: ". mysqli_connect_error());
}

// Get the room number from the URL

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the report ID from the URL
if (isset($_GET['update_urgency'])) {
    $the_report_id = $_GET['update_urgency'];
} else {
    echo "No report ID provided.";
    exit;
}

// Fetch the current report details from the database
$query = "SELECT * FROM report WHERE report_id = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, 'i', $the_report_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die('Query Failed: ' . mysqli_error($connection));
}

$row = mysqli_fetch_assoc($result);

// Update the report details in the database
if (isset($_POST['update_urgency'])) {
    // Get the updated report details from the form
    $urgency = $_POST['urgency'];

    // Use prepared statement to prevent SQL injection
    $query = "UPDATE report SET urgency = ? WHERE report_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'si', $urgency, $the_report_id);
    $update_report = mysqli_stmt_execute($stmt);

    if (!$update_report) {
        die('Update Failed: ' . mysqli_error($connection));
    }else {
        echo "<div class='alert alert-success'>Updated Succesfully. <a href='report.php' class='btn btn-primary'>View</a></div>";
    }
}
?>

<!-- The enctype in a form allow us to sending different form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">

    <input type="hidden" name="report_id" value="<?php echo $the_report_id;?>">

    <div class="form-group mt-3">
        <label for="urgency">Urgency Status</label>
        <select class="form-select mb-3" aria-label="Large select example" name="urgency">
            <option value="">Select Status:</option>
            <option value="Critical">Critical</option>
            <option value="High">High</option>
            <option value="Moderate">Moderate</option>
            <option value="Medium">Medium</option>
            <option value="Low">Low</option>
        </select>
    </div>

    <input type="submit" value="Update" name="update_urgency" class="btn btn-primary mt-3">

</form>