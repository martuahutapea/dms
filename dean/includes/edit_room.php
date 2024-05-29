<?php

// Connect to the database
// $connection = mysqli_connect("localhost", "root", "", "dms");

// Check connection
if (!$connection) {
    die("Connection failed: ". mysqli_connect_error());
}

// Get the room number from the URL
if (isset($_GET['edit_room'])) {
    $the_room_number = $_GET['edit_room'];
} else {
    echo "No room number provided.";
    exit;
}

// Fetch the current room details from the database
$query = "SELECT * FROM room WHERE room_number = '$the_room_number'";
$select_room_number = mysqli_query($connection, $query);

if (!$select_room_number) {
    die('Query Failed'.mysqli_error($connection));
}

$row = mysqli_fetch_assoc($select_room_number);

$room_number = $row["room_number"];
$room_facility = $row["room_facility"];
$room_status = $row["room_status"];
$hall_id = $row["hall_id"];

// Update the room details in the database
if (isset($_POST['update_room'])) {
    // Get the updated room details from the form
    $room_number = $_POST['room_number'];
    $room_facility = isset($_POST['room_facility'])? $_POST['room_facility'] : '';
    $room_status = $_POST['room_status'];

    // Escape any special characters in the room details
    $room_number = mysqli_real_escape_string($connection, $room_number);
    $room_facility = mysqli_real_escape_string($connection, $room_facility);
    $room_status = mysqli_real_escape_string($connection, $room_status);

    // Update the room details in the database
    $query = "UPDATE `room` SET room_number = '$room_number', room_facility = '$room_facility', room_status = '$room_status' WHERE room_number = '$the_room_number'";
    $update_room_query = mysqli_query($connection,$query);

    // Check if the update was successful
    if (!$update_room_query) {
        die("Cannot Add the User ".mysqli_error($connection));
    } else {
        echo "<div class='alert alert-success'>Room Updated Succesfully. <a href='room.php' class='btn btn-primary'>View Student</a></div>";
    }
}

?>

<!-- The enctype in a form allow us to sending differnt form of data because we need a image to be uploaded -->
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group mb-3">
        <label for="title"> <?php echo htmlspecialchars($room_number);?></label>
        <input type="text" class="form-control" value="<?= $room_number; ?>" name="room_number" readonly>
    </div>

    <!-- Make Status dynamic -->
    <div class="form-group mb-3">
    <label for="status">Facility:</label><br>
    <select name="room_facility" id=""  class="form-select mb-3">
        <option value='<?php echo htmlspecialchars($room_facility);?>'> <?php echo htmlspecialchars($room_facility);?> </option>
        <?php
        if($room_facility == 'Ac'){
            echo "<option value='Fan'> Fan </option>";
        } elseif($room_facility == 'Fan'){
            echo "<option value='Ac'> AC </option>";
        } else {
            echo "<option value='Fan'> Fan </option>";
        }
       ?>
        <option value=''></option>
    </select>
</div>

        <!-- Make Status dynamic -->
        <div class="form-group mb-3">
            <label for="status">Status:</label><br>
                <select name="room_status" id=""  class="form-select mb-3">
                    <option value='<?php echo htmlspecialchars($room_status);?>'> <?php echo htmlspecialchars($room_status);?> </option>
                    <?php
                    if($room_status == 'Available'){
                        echo "<option value='Unavailable'> Unavailable </option>";
                        echo "<option value='Storage'> Storage </option>";
                    }elseif($room_status == 'Unavailable'){
                        echo "<option value='Available'> Available </option>";
                        echo "<option value='Storage'> Storage </option>";
                    }else {
                         echo "<option value='Unavailable'> Unoption value='Available'> Available </option>";
                         echo "<option value='Storage'> Storage </option>";
                    }
                  ?>
                    <option value=''></option>
                </select>
            </div>

    <div class="form-group mb-3">
        <input class="btn btn-primary" type="submit" name="update_room" value="Update Room">
    </div>

</form>