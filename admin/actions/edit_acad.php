<?php
include '../../connection/connection.php';

if (isset($_POST['ay_id']) && isset($_POST['ay_name'])) {
	
	$ay_id = $_POST['ay_id'];
	$ay_name = $_POST['ay_name'];

	

	$sql = mysqli_query($conn, "UPDATE `fams`.`academic_year` SET `ay_name`='{$ay_name}' WHERE  `ay_id`={$ay_id};");
	if ($sql == 1) {
			echo "Successfully Updated";
		}else{
			echo "No Data Updated";
		}	

}else{
		echo "No Data Added";
}

?>