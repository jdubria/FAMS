<?php
include '../../connection/connection.php';

if (isset($_POST['sem_id'])) {
	
	$sem_id = $_POST['sem_id'];

	

	$sql = mysqli_query($conn, "UPDATE `fams`.`semester` SET `sem_active`= 0 WHERE  `sem_id`={$sem_id};");
	if ($sql == 1) {
			echo "Data Archived";
		}else{
			echo "No Data Archived";
		}	

}else{
		echo "No Data Archived";
}

?>