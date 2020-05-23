<?php
include '../../connection/connection.php';

if (isset($_POST['ay_name'])) {
	
	$ay_name = $_POST['ay_name'];


	$sql = mysqli_query($conn, "INSERT INTO `fams`.`academic_year` (`ay_name`, `ay_active`) VALUES ('{$ay_name}', '1');");
	if ($sql == 1) {
			echo "Successfully Added";
		}else{
			echo "No Data Added";
		}	

}elseif (isset($_POST['set_ay']) && !empty($_POST['set_ay'])) {
	$ay_id = $_POST['ay_id'];

	$sql = mysqli_query($conn, "UPDATE `fams`.`active_sem_ay` SET `ay_id`='{$ay_id}' WHERE  `asa_id`=1;");

	if ($sql == TRUE) {
		echo "Successfully Change";
	}else{
		echo "Nothing is set";
	}
}elseif (isset($_POST['set_sem']) && !empty($_POST['set_sem'])) {
	$sem_id = $_POST['sem_id'];

	$sql = mysqli_query($conn, "UPDATE `fams`.`active_sem_ay` SET `sem_id`='{$sem_id}' WHERE  `asa_id`=1;");

	if ($sql == TRUE) {
		echo "Successfully Change";
	}else{
		echo "Nothing is set";
	}
}

?>