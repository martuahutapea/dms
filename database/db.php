<?php

// Connect to database
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "dms";

// Create database connection
$connection = mysqli_connect($hostname, $username, $password, $dbname);

//To check the connection
if(!$connection){
    die("Connection Failled " .mysqli_connect_error());
}
//else{
//     echo "Database Connected";
// }

