<?php

$to_mail = "martua2708@gmail.com";
$subject = "Send email VIA PHP";
$body = "Hi, this is the test email from PHP";
$headers = "From: martua2708@gmail.com";

if(mail($to_mail, $subject, $body, $headers)){
    echo "Email successfuly sent to ".$to_mail." ... ";
}else{
    echo "Email sending failled";
}