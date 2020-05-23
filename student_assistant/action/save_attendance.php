<?php 
include '../../connection/connection.php'; 
include "../../connection/session.php";

if (isset($_POST['ass_id']) && !empty($_POST['ass_id'])) {
	$ass_id = $_POST['ass_id'];
	$present = $_POST['present'];
	$remarks = $_POST['remarks'];
	$date = $_POST['date'];	
	$sem_id = $_SESSION['sem_id'];
	$ay_id = $_SESSION['ay_id'] ;

	$query = "INSERT INTO `fams`.`attendance` (`ass_id`, `present`, `date`, `dateentered`, `ay_id`, `sem_id`,  `remarks`,`att_active`) VALUES ('{$ass_id}', '$present', '{$date}', NOW(), '{$ay_id}', '{$sem_id}',  '{$remarks}','1');";

	$sql = mysqli_query($conn, $query);

	if ($sql == TRUE) {
		echo "Attendance Added";
	}else{
		echo "Not Data Added";
	}
	


}elseif (isset($_POST['update']) && !empty($_POST['update'])) {

	$att_id = $_POST['att_id'];
	$present = $_POST['present'];
	$remarks = $_POST['remarks'];

	$query = "UPDATE `fams`.`attendance` SET `present`='{$present}', `remarks`='{$remarks}' WHERE  `att_id`={$att_id};";

	$sql = mysqli_query($conn, $query);

	if ($sql == TRUE) {
		echo "Attendance Updated";
	}else{
		echo "Not Data Added";
	}

}


?>