
<?php

//delete.php
include "../database/db.php";
if(isset($_POST["id"]))
{

 $query = "DELETE from calendar WHERE id=:id ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>