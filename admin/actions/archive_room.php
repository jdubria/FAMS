<?php
include '../../connection/connection.php';

if (isset($_POST['room_id'])) {
	
	$room_id = $_POST['room_id'];


	$sql = mysqli_query($conn, "UPDATE `fams`.`room` SET `room_active`= 0  WHERE  `room_id`={$room_id};");
	if ($sql == 1) {
			echo "Data Archived";
		}else{
			echo "No Data Updated";
		}	

}else{
		echo "No Data Added";
}

?>