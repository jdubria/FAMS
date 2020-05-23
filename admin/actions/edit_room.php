<?php
include '../../connection/connection.php';

if (isset($_POST['room_id']) && isset($_POST['room_name']) && isset($_POST['room_type'])) {
	
	$room_id = $_POST['room_id'];
	$room_name = $_POST['room_name'];
	$room_type = $_POST['room_type'];

	

	$sql = mysqli_query($conn, "UPDATE `fams`.`room` SET `room_name`='{$room_name}', `room_type`='{$room_type}' WHERE  `room_id`={$room_id};");
	if ($sql == 1) {
			echo "Successfully Updated";
		}else{
			echo "No Data Updated";
		}	

}else{
		echo "No Data Added";
}

?>