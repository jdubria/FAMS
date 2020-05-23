<?php
include '../../connection/connection.php';

if (isset($_POST['fac_num'])) {
	
	$fac_num = $_POST['fac_num'];


	$sql = mysqli_query($conn, "UPDATE `fams`.`faculty` SET `fac_active`= 0  WHERE  `fac_num`={$fac_num};");
	if ($sql == 1) {
			echo "Data Archived";
		}else{
			echo "No Data Updated";
		}	

}else{
		echo "No Data Added";
}

?>