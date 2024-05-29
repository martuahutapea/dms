<?php
include "../database/db.php";
// Create database connection
$connection = mysqli_connect($hostname, $username, $password, $dbname);
// $json = array();

if (!empty($_GET['type']) && $_GET['type'] == 'list') {
    $query = "SELECT * FROM events";
    print_r($query);
    $result = $connection->query($query);
    $eventArray = array();
    while ($row = $result->fetch_assoc()) {
        $eventArray[] = $row;
    }
    echo json_encode($eventArray);
} elseif (!empty($_GET['type']) && $_GET['type'] == 'add') {
    $query = "INSERT INTO `events`(`title`, `link`, `start_event`, `end_event`, `color`) VALUES ('" . $_POST['title'] . "', '" . $_POST['link'] . "', '" . $_POST['start_event'] . "', '" . $_POST['end_event'] . "', '" . $_POST['color'] . "')";
    print_r($query);
    if ($connection->query($query) == TRUE) {
        $json['status'] = true;
        $json['message'] = "Event recorded successfully";
    } else {
        $json['status'] = false;
        $json['message'] = "Please, try again!";
    }
    echo json_encode($json);
}