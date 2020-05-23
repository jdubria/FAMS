<?php
include '../../connection/connection.php';

if (isset($_POST['save_schedule']) && !empty($_POST['save_schedule'])) {
	
	$fac_num = $_POST['fac_num'];
	$sub_id = $_POST['sub_id'];
	$ay_id = 1;
	$sem_id = 1;


	$sql = mysqli_query($conn, "INSERT INTO `fams`.`assign_subject` (`ay_id`, `sem_id`, `sub_id`, `fac_num`, `as_active`) VALUES ('{$ay_id}', '{$sem_id}', '{$sub_id}', '{$fac_num}', '1');");

	if ($sql == 1) {
			echo "Successfully Added";
		}else{
			echo "No Data Added";
		}	


}

elseif (isset($_GET['update']) && !empty($_GET['update'])) {
	$as_id = $_POST['as_id'];
	$fac_num = $_POST['fac_num'];
	$sub_id = $_POST['sub_id'];
	$ay_id = 1;
	$sem_id = 1;

	$sql = mysqli_query($conn, "UPDATE `fams`.`assign_subject` SET `ay_id`='{$ay_id}', `sem_id`='$sem_id', `sub_id`='$sub_id', `fac_num`='$fac_num' WHERE  `as_id`={$as_id};");

	if ($sql == 1) {
			echo "Successfully Updated";
		}else{
			echo "No Data Added";
		}	

}

elseif (isset($_GET['archives']) && !empty($_GET['archives'])) {
	$as_id = $_POST['as_id_archive'];

	$sql = mysqli_query($conn, "UPDATE `fams`.`assign_subject` SET `as_active`= 0 WHERE  `as_id`={$as_id};");
	if ($sql == 1) {
			echo "Data Archived";
		}else{
			echo "No Data Archived";
		}	


}else{
	echo "No Data Updated";
}


?>