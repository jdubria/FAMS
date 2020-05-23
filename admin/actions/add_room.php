<?php
include '../../connection/connection.php';

if (isset($_POST['room_name']) && isset($_POST['room_type'])) {
	
	$room_name = $_POST['room_name'];
	$room_type = $_POST['room_type'];
	

	$sql = mysqli_query($conn, "INSERT INTO `fams`.`room` (`room_name`, `room_type`, `room_active`) VALUES ('{$room_name}', '{$room_type}', '1');");
	if ($sql == 1) {
			echo "Successfully Added";
		}else{
			echo "No Data Added";
		}	

}else{
		echo "No Data Added";
}

?>