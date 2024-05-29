<?php
session_start();
ob_start();

unset($_SESSION['user_id']);
unset($_SESSION['user_role']);

session_destroy();
ob_end_flush();

header("Location: /dms/index.php");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: Sat, 1 Jan 2000 00:00:00 GMT");
exit;
?>