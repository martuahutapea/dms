<?php                
require '../database/db.php'; 
$event_name = $_POST['event_name'];
$event_start_date = date("y-m-d", strtotime($_POST['event_start_date'])); 
$event_end_date = date("y-m-d", strtotime($_POST['event_end_date'])); 
			
$insert_query = "INSERT INTO `calendar_event_master`(`event_name`,`event_start_date`,`event_end_date`) VALUES ('".$event_name."','".$event_start_date."','".$event_end_date."')";             
if(mysqli_query($connection, $insert_query))
{
	$data = array(
                'status' => true,
                'msg' => 'Event added successfully!'
            );
}
else
{
	$data = array(
                'status' => false,
                'msg' => 'Sorry, Event not added.'				
            );
}
echo json_encode($data);	
?>
