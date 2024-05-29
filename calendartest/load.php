<?php
require '../database/db.php';

// $connection = mysqli_connect($hostname, $username, $password, $dbname);

if (!$connection) {
    die('Connection failed: '. mysqli_connect_error());
}

$data = [];

$query = "SELECT * FROM events ORDER BY id";
$result = $connection->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'start' => $row['start_event'],
            'end' => $row['end_event']
        ];
    }
}

echo json_encode($data);
?>