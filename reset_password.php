<?php
// Database connection
include "database/db.php";  

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['token'])) {
    $token = $connection->real_escape_string($_GET['token']);

    // Hash the token from the URL parameter
    $hashed_token = hash("sha256", $token);

    // Check if token is valid
    $result = $connection->query("SELECT * FROM plant_service WHERE reset_token_hash = '$hashed_token'");

    if ($result) {
        if ($result->num_rows > 0) {
            // Show reset password form
            echo '<div style="width: 50%; margin: 0 auto; justify-content:center; align-items: center; padding: 20px; background-color: #f0f0f0;">
                    <form action="reset_password.php" method="post" style="text-align: center; align-items: center;">
                        <input type="hidden" name="token" value="'. $token. '">
                        <div class="mb-3">
                            <label for="password">Enter new password:</label>
                        </div>
                        <div class="mb-3" style="margin-bottom: 10px;">
                            <input type="password" name="password" id="password" required>
                        </div>
                        <button class="btn btn-primary text-center form-control" type="submit">Reset Password</button>
                        <hr size="10" class="mt-4 mb-4">
                        <h5 class="text-center">Dormitory Management System</h5> 
                    </form>
                  </div>';
        } else {
            echo 'Invalid or expired token.';
        }
    } else {
        echo 'Error executing query: ' . $connection->error;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['token']) && isset($_POST['password'])) {
    $token = $connection->real_escape_string($_POST['token']);
    $password = password_hash($connection->real_escape_string($_POST['password']), PASSWORD_BCRYPT);

    // Hash the token from the form before querying the database
    $hashed_token = hash("sha256", $token);

    // Check if token is valid
    $result = $connection->query("SELECT * FROM plant_service WHERE reset_token_hash = '$hashed_token'");
    if ($result->num_rows > 0) {
        // Update the user's password
        $connection->query("UPDATE plant_service SET ps_password = '$password', reset_token_hash = NULL  WHERE reset_token_hash = '$hashed_token'");
        echo 'Your password has been reset successfully.';
    } else {
        echo 'Invalid or expired token.';
    }
}
?>
