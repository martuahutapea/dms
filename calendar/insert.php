<?php

//insert.php
include "../database/db.php";

if(isset($_POST["title"]))
{
 $query = "INSERT INTO calendar (title, start_event, end_event) VALUES (:title, :start_event, :end_event)
 ";
 $statement = $connection->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>