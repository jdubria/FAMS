<?php
include '../../connection/connection.php';

if (isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_POST['middle_name']) && isset($_POST['date_of_birth']) && isset($_POST['contact']) && isset($_POST['email'])) {
	
	$last_name = $_POST['last_name'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$date_of_birth = $_POST['date_of_birth'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$dob = str_replace("-", "",$date_of_birth);
	$fac_ID = $last_name[0]."".$first_name[0]."".$middle_name[0]."".$dob."00";


	$sql = mysqli_query($conn, "INSERT INTO `fams`.`faculty` (`fac_ID`, `last_name`, `first_name`, `middle_name`, `date_of_birth`, `contact`, `email`, `fac_active`) VALUES ('{$fac_ID}', '{$last_name}', '{$first_name}', '{$middle_name}', '{$date_of_birth}', '{$contact}', '{$email}', '1');");
	if ($sql == 1) {
			echo "Successfully Added";
		}else{
			echo "No Data Added";
		}	

}else{
		echo "No Data Added";
}

?>