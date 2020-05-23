<?php
include '../../connection/connection.php';

if (isset($_POST['save']) && !empty($_POST['save'])) {
	
	$sub_code = $_POST['sub_code'];
	$sub_desc = $_POST['sub_desc'];
	$num_unit = $_POST['num_unit'];
	$num_hours = $_POST['num_hours'];
	$sem_id = $_POST['sem_id'];
	

	$sql = mysqli_query($conn, "INSERT INTO `fams`.`subject` (`sub_code`, `sub_description`, `sub_unit`, `sub_hours`, `sem_id`, `sub_active`) VALUES ('{$sub_code}', '{$sub_desc}', '{$num_unit}', '{$num_hours}', '{$sem_id}', '1');");
	if ($sql == 1) {
			echo "Successfully Added";
		}else{
			echo "No Data Added";
		}	

}elseif (isset($_POST['edit']) && !empty($_POST['edit'])) {
	$sub_id = $_POST['sub_id'];
	$sub_code = $_POST['sub_code'];
	$sub_desc = $_POST['sub_desc'];
	$num_unit = $_POST['num_unit'];
	$num_hours = $_POST['num_hours'];
	$sem_id = $_POST['sem_id'];
	

	$sql = mysqli_query($conn, "UPDATE `fams`.`subject` SET `sub_code`='{$sub_code}', `sub_description`='{$sub_desc}', `sub_unit`='{$num_unit}', `sub_hours`='{$num_hours}', `sem_id`='{$sem_id}' WHERE  `sub_id`={$sub_id};");
	if ($sql == 1) {
			echo "Successfully Updated";
		}else{
			echo "No Data Added";
		}	
}elseif (isset($_POST['archive']) && !empty($_POST['archive'])){

	$sub_id = $_POST['sub_id'];


	$sql = mysqli_query($conn, "UPDATE `fams`.`subject` SET `sub_active`= 0  WHERE  `sub_id`={$sub_id};");
	if ($sql == 1) {
			echo "Data Archived";
		}else{
			echo "No Data Updated";
		}	

}else{
		echo "No Action Taken";
}

?>