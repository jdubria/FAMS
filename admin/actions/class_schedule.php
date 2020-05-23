<?php 
include '../../connection/connection.php';
include "../../connection/session.php";

if (isset($_POST['save'])  && !empty($_POST['save'])) {
	$as_id = $_POST['as_id'];
	$cy_id = $_POST['cy_id'];
	$room_id = $_POST['room_id'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$days = json_decode(stripslashes($_POST['daysjson']));
	$ay_id = $_SESSION['sem_id'];
	$sem_id = $_SESSION['ay_id'] ;

	$success = FALSE;

	foreach ($days as $day) {
		$sql = mysqli_query($conn, "
			INSERT INTO `fams`.`assign_schedule` (`as_id`, `cy_id`, `room_id`, `ay_id`, `sem_id`, `day`, `start_time`, `end_time`, `sched_active`) VALUES ('{$as_id}', '{$cy_id}', '{$room_id}', '{$ay_id}', '{$sem_id}', '{$day}', '{$start_time}', '{$end_time}', '1');
			");
		$success = TRUE;		
	}
	if ($success == TRUE) {
		echo "Schedule Successfully Save";
	}else{
		echo "No Schedule Added";
	}
}

?>