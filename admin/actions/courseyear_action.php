<?php
include '../../connection/connection.php';

if (isset($_POST['course']) && !empty($_POST['year'])) {
	$course = $_POST['course'];
	$year = $_POST['year'];
	$section = $_POST['section'];

	$sql = mysqli_query($conn, "INSERT INTO `fams`.`course_year` (`course`, `year`, `section`, `cy_active`) VALUES ('{$course}', '{$year}', '{$section}', '1');");

	if ($sql == 1) {
		echo "Successfully Added";
	}else{
		echo "No Data Added";
	}
}
elseif (isset($_GET['update']) && !empty($_GET['update'])) {
	$cy_id = $_POST['cy_ids'];
	$course = $_POST['courses'];
	$year = $_POST['years'];
	$section = $_POST['sections'];

	$sql = mysqli_query($conn, "UPDATE `fams`.`course_year` SET `course`='{$course}', `year`='{$year}', `section`='{$section}' WHERE  `cy_id`={$cy_id};");

	if ($sql == 1) {
		echo "Successfully Updated ";
	}else{
		echo "No Data Added";
	}
}elseif (isset($_GET['archive']) && !empty($_GET['archive'])) {
	$cy_id = $_POST['cy_id'];

	$sql = mysqli_query($conn, "UPDATE `fams`.`course_year` SET `cy_active`= 0 WHERE  `cy_id`={$cy_id};");
	if ($sql == 1) {
			echo "Data Archived";
		}else{
			echo "No Data Archived";
		}	
}else{
	echo "No Action Taken";
}

?>