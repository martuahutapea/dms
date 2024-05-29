<?php

require 'database/db.php'; 
require 'mailer.php'; // Include the mailer script
require __DIR__ . '/vendor/autoload.php'; // Ensure PHPMailer is autoloaded

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check for the database connection.
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Ensure email is provided
if (!isset($_POST['email']) || empty($_POST['email'])) {
    die("Email is required");
}

$email = $_POST['email'];

// Generate a token
$token = bin2hex(random_bytes(16));

// Debugging: Output the generated token
// echo "Token generated: $token<br>";

$token_hash = hash("sha256", $token); // Correct hashing algorithm

// Prepare the SQL statement to update the token
$sql = "UPDATE plant_service SET reset_token_hash = ? WHERE ps_email = ?";
$stmt = $connection->prepare($sql);

if (!$stmt) {
    die("Statement preparation failed: " . $connection->error);
}

$stmt->bind_param("ss", $token_hash, $email);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        // Create the mailer
        $mail = createMailer();

        if ($mail) {
            // Suppress debug output from PHPMailer
            $mail->SMTPDebug = false;

            try {
                // Recipients
                $mail->setFrom('mhutapea2708@gmail.com', 'Dormitory Management System');
                $mail->addAddress($email);

                // Content
                $mail->Subject = 'Password Reset';
                $mail->Body    = "Click <a href='http://localhost:8080/dms/reset_password.php?token=$token'>here</a> to reset your password.";

                $mail->send();
                echo '<div style="color: green;">Password reset link has been sent to your email.</div>';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    } else {
        echo 'No account found with that email address.';
    }
} else {
    echo "Error executing query: " . $stmt->error;
}

$stmt->close();
$connection->close();

// Redirect to login.php after showing success message
header("refresh:3; url=index.php"); // Redirect to login.php after 3 seconds

?>
