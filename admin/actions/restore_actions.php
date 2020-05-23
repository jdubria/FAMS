<?php
include '../../connection/connection.php';

if (isset($_POST['as_id']) && $_POST['as_id']) {
	$as_id = $_POST['as_id'];
	$query = "UPDATE `fams`.`assign_subject` SET `as_active`='1' WHERE  `as_id`={$as_id};";

	$sql = mysqli_query($conn, $query);

	if ($sql == TRUE) {
		echo "Restored Successfully";
	}else{
		echo "No data restored";
	}
}elseif (isset($_POST['fac_num']) && !empty($_POST['fac_num'])) {
	$fac_num = $_POST['fac_num'];
	$query = "UPDATE `fams`.`faculty` SET `fac_active`='1' WHERE  `fac_num`={$fac_num};";

	$sql = mysqli_query($conn, $query);

	if ($sql == TRUE) {
		echo "Restored Successfully";
	}else{
		echo "No data restored";
	}	
}elseif (isset($_POST['sub_id']) && !empty($_POST['sub_id'])) {
	$sub_id = $_POST['sub_id'];
	$query = "UPDATE `fams`.`subject` SET `sub_active`='1' WHERE  `sub_id`={$sub_id};";

	$sql = mysqli_query($conn, $query);

	if ($sql == TRUE) {
		echo "Restored Successfully";
	}else{
		echo "No data restored";
	}	
}elseif (isset($_POST['room_id']) && !empty($_POST['room_id'])) {
	$room_id = $_POST['room_id'];
	$query = "UPDATE `fams`.`room` SET `room_active`='1' WHERE  `room_id`={$room_id};";

	$sql = mysqli_query($conn, $query);

	if ($sql == TRUE) {
		echo "Restored Successfully";
	}else{
		echo "No data restored";
	}	
}elseif (isset($_POST['cy']) && !empty($_POST['cy'])) {
	$cy = $_POST['cy'];
	$query = "UPDATE `fams`.`course_year` SET `cy_active`='1' WHERE  `cy_id`={$cy};";

	$sql = mysqli_query($conn, $query);

	if ($sql == TRUE) {
		echo "Restored Successfully";
	}else{
		echo "No data restored";
	}	
}elseif (isset($_POST['sem_id']) && !empty($_POST['sem_id'])) {
	$sem_id = $_POST['sem_id'];
	$query = "UPDATE `fams`.`semester` SET `sem_active`='1' WHERE  `sem_id`={$sem_id};";

	$sql = mysqli_query($conn, $query);

	if ($sql == TRUE) {
		echo "Restored Successfully";
	}else{
		echo "No data restored";
	}	
}elseif (isset($_POST['ay_id']) && !empty($_POST['ay_id'])) {
	$ay_id = $_POST['ay_id'];
	$query = "UPDATE `fams`.`academic_year` SET `ay_active`='1' WHERE  `ay_id`={$ay_id};";

	$sql = mysqli_query($conn, $query);

	if ($sql == TRUE) {
		echo "Restored Successfully";
	}else{
		echo "No data restored";
	}	
}elseif (isset($_POST['user_name']) && !empty($_POST['user_name'])) {
	$user_name = $_POST['user_name'];
	$query = "UPDATE `fams`.`user` SET `active`='1' WHERE  `user_name`='{$user_name}';";

	$sql = mysqli_query($conn, $query);

	if ($sql == TRUE) {
		echo "Restored Successfully";
	}else{
		echo "No data restored";
	}	
}



?>