<?php
include '../../connection/connection.php';

if (isset($_POST['ay_id'])) {
	
	$ay_id = $_POST['ay_id'];

	

	$sql = mysqli_query($conn, "UPDATE `fams`.`academic_year` SET `ay_active`= 0 WHERE  `ay_id`={$ay_id};");
	if ($sql == 1) {
			echo "Data Archived";
		}else{
			echo "No Data Archived";
		}	

}else{
		echo "No Data Archived";
}

?>