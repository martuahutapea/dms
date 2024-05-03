<?php
function confirmQuery($result){
    //Function to check if the query failled load to database and give  an error message if it did.
    global $connection;
    
    if(!$result){
        die("Querry Failled ." . mysqli_error($connection));
    }
}


// Function to display the halls
