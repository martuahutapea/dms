<?php

$email = $_POST["email"];

// Using bin2hex to convert to hexadecimal string
$token = bin2hex(random_bytes(16));


// hash the token using the sha256 (this will return 256 character)
$token_hash = hash("sha256", $token);


// Adding 30 minutes from current time. for the expires token
$expiry = date("Y-m-d H:i:s", time() + 60 * 30); 

include "database/db.php";


$query = "UPDATE student SET
            reset_token_hash = ?
            reset_token_expires_at =?
         WHERE student_email = ?";

$stmt= $mysqli->prepare($query);
$stmt->bind_param("sss", $token_hash, $expiry, $email);
$stmt->execute();
if ($stmt == false) {
    die ("Query failed");
}
echo json_encode([
        'status' => true,
        'message'=>"Token Generated Successfully! Please check your email.",
]);


if (!mysqli_stmt_affected_rows($stmt)) {
    echo json_encode([
        "status" => false,
        "message" => "Email not found."
    ]);
} else{
     // Send email with this link http://localhost:8080/resetPassword?
     $to = "user@example.com";
     $subject = "Password Reset Request";
     $message = "Please click on the link below to reset your password: \n\nhttp://localhost:8080/resetPassword.php";
     $headers = "From: admin@yourdomain.com";
     mail($to,$subject,$message,$headers);
     
}

?>