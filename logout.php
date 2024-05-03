<?php
session_start();
ob_start();


$_SESSION['user_id'] = null;
$_SESSION['user_role'] = null;



unset($_SESSION['user_id']);
unset($_SESSION['user_role']);



// Destroy all the session and comback to the login page which is index.php 
session_destroy();
ob_end_flush();

// Redirect to login page
header("Location: /dms/index.php");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: Sat, 1 Jan 2000 00:00:00 GMT");
exit;