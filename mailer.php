<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/PHPMailer/src/Exception.php';
require 'vendor/phpmailer/PHPMailer/src/PHPMailer.php';
require 'vendor/phpmailer/PHPMailer/src/SMTP.php';

function createMailer() {
    $mail = new PHPMailer(true);

    try {
        // Enable verbose debug output (for development, disable in production)
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 

        // Set mailer to use SMTP
        $mail->isSMTP(); 

        // Specify main and backup SMTP servers
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'mhutapea2708@gmail.com'; // Replace with your SMTP username
        $mail->Password = 'ebrybdcxizgdrvuy'; // Replace with your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // TCP port to connect to

        // Set email format to HTML
        $mail->isHTML(true);

        return $mail;

    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        return null;
    }
}
?>
