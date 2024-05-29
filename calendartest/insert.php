<?php
require_once '../database/db.php';

$connection = mysqli_connect($hostname, $username, $password, $dbname);

if (!$connection) {
    die('Connection failed: '. mysqli_connect_error());
}

if (isset($_POST["title"])) {
    $query = "INSERT INTO events (title, start_event, end_event) VALUES (?,?,?)";
    $statement = $connection->prepare($query);
    $statement->bind_param("sss", $_POST["title"], $_POST["start"], $_POST["end"]);
    $statement->execute();
}
?>