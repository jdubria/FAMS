<?php
include 'functions.php';
include '../../connection/connection.php'; 

if (isset($_POST['id']) && !empty($_POST['id'])) {
	echo poppulate_list_faculty_schedule();
}
elseif (isset($_POST['sched']) && !empty($_POST['sched'])) {
	echo populate_time_range_base_on_day();
}

elseif (isset($_POST['fac_num']) && !empty($_POST['fac_num'])) {
	$fac_num = $_POST['fac_num'];
	echo populate_individual_schedule($fac_num);
}
elseif (isset($_POST['ass_id']) && !empty($_POST['ass_id'])) {
	$ass_id = $_POST['ass_id'];
	echo populate_schedule_day_time($ass_id);
}elseif (isset($_POST['curday']) && !empty($_POST['curday'])) {
	echo get_curday();
}elseif (isset($_POST['curdate']) && !empty($_POST['curdate'])) {
	echo get_curdate();
}

elseif (isset($_POST['dates']) && !empty($_POST['dates'])) {
	echo get_curDates();
}

?>