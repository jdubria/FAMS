<?php 
include 'populate_functions.php'; 
include '../../connection/connection.php';
if (isset($_POST['fac_nums']) && !empty($_POST['fac_nums'])) {
	echo populate_faculty();
}

elseif (isset($_POST['sub_ids']) && !empty($_POST['sub_ids'])) {
	echo populate_subject();
}

elseif (isset($_POST['cy_id']) && !empty($_POST['cy_id'])) {
	echo populate_course_year();
}

elseif (isset($_POST['room_id']) && !empty($_POST['room_id'])) {
	echo populate_room();
}

elseif (isset($_POST['as_ids']) && !empty($_POST['as_ids'])) {
	$as_id = $_POST['as_ids'];
	echo select_assignedSubject($as_id);
}

elseif (isset($_POST['ass_id']) && !empty($_POST['ass_id'])) {
	echo populate_scheduled_faculty();
}

elseif (isset($_POST['fac_num']) && !empty($_POST['fac_num'])) {
	$fac_num = $_POST['fac_num'];
	echo populate_individual_schedule($fac_num);
}

elseif (isset($_POST['asss_id']) && !empty($_POST['asss_id'])) {
	$ass_id = $_POST['asss_id'];
	$query1 = "
	SELECT * FROM assign_schedule
	INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
	WHERE assign_schedule.ass_id = {$ass_id}
	";
	$result1 = mysqli_query($conn, $query1);
	$row1 = mysqli_fetch_assoc($result1);

	$fac_num = $row1['fac_num'];
	
	$query2 = "
	DELETE FROM `fams`.`assign_schedule` WHERE  `ass_id`={$ass_id};
	";

	$result2 = mysqli_query($conn, $query2);

	if($result2 == true){
		echo populate_individual_schedule($fac_num);
	}else{
		echo "No Schedule Deleted";
	}



}


elseif (isset($_POST['sem']) && !empty($_POST['sem'])) {
	echo populate_semester();
}
elseif (isset($_POST['ay']) && !empty($_POST['ay'])) {
	echo populate_ay();
}elseif (isset($_POST['pop_acad']) && !empty($_POST['pop_acad'])) {
	echo populate_ay();
}elseif (isset($_POST['pop_sem']) && !empty($_POST['pop_sem'])) {
	echo populate_semester();
}
?>