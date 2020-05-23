<?php
include '../../connection/connection.php';

if (isset($_POST['sem_name'])) {
	
	$sem_name = $_POST['sem_name'];


	$sql = mysqli_query($conn, "INSERT INTO `fams`.`semester` (`sem_name`, `sem_active`) VALUES ('{$sem_name}', '1');");
	if ($sql == 1) {
			echo "Successfully Added";
		}else{
			echo "No Data Added";
		}	

}else{
		echo "No Data Added";
}

?>