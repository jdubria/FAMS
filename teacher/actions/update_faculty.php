<?php 
include '../../connection/connection.php';


if (isset($_POST['update']) && !empty($_POST['update'])) {
	$fac_num = $_POST['fac_num'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	$query = "UPDATE `fams`.`faculty` SET `contact`='{$phone}', `email`='{$email}' WHERE  `fac_num`='{$fac_num}';";
	$sql = mysqli_query($conn, $query);

	if ($sql == TRUE) {
		echo "Successfully Updated";
	}else{
		echo "No Data Updated";
	}

}


?>