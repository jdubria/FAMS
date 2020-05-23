<?php
include '../../connection/connection.php';

if (isset($_POST['fac_num']) && isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_POST['middle_name']) && isset($_POST['date_of_birth']) && isset($_POST['contact']) && isset($_POST['email'])) {
	
	$fac_num = $_POST['fac_num'];	
	$last_name = $_POST['last_name'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$date_of_birth = $_POST['date_of_birth'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];


	$sql = mysqli_query($conn, "UPDATE `fams`.`faculty` SET `last_name`='{$last_name}', `first_name`='{$first_name}', `middle_name`='{$middle_name}', `date_of_birth`='{$date_of_birth}', `contact`='{$contact}', `email`='{$email}' WHERE  `fac_num`={$fac_num};");
	if ($sql == 1) {
			echo "Successfully Updated";
		}else{
			echo "No Data Updated";
		}	

}else{
		echo "No Data Added";
}

?>