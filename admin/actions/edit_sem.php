<?php
include '../../connection/connection.php';

if (isset($_POST['sem_id']) && isset($_POST['sem_name'])) {
	
	$sem_id = $_POST['sem_id'];
	$sem_name = $_POST['sem_name'];

	

	$sql = mysqli_query($conn, "UPDATE `fams`.`semester` SET `sem_name`='{$sem_name}' WHERE  `sem_id`={$sem_id};");
	if ($sql == 1) {
			echo "Successfully Updated";
		}else{
			echo "No Data Updated";
		}	

}else{
		echo "No Data Added";
}

?>