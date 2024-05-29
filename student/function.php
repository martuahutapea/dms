<?php
include "../database/db.php";

$json = array();

if (!empty($_GET['type']) && $_GET['type'] == 'list') {
    $query = "SELECT * FROM events";
    $result = $connection->query($query);
    $eventArray = array();
    while ($row = $result->fetch_assoc()) {
        $eventArray[] = $row;
    }
    echo json_encode($eventArray);
} elseif (!empty($_GET['type']) && $_GET['type'] == 'add') {
    $title = $_POST['title'];
    $link = $_POST['link'];
    $start_event = $_POST['start_event'];
    $end_event = $_POST['end_event'];

    $query = "INSERT INTO `events`(`title`, `link`, `start_event`, `end_event`) VALUES ('$title', '$link', '$start_event', '$end_event')";
    if ($connection->query($query) == TRUE) {
        $json['status'] = true;
        $json['message'] = "Event recorded successfully";
    } else {
        $json['status'] = false;
        $json['message'] = "Please, try again!";
    }
    echo json_encode($json);
}
?>