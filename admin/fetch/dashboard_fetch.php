<?php 
include "populate_functions.php";
include '../../connection/connection.php'; 

if (isset($_POST['sched']) && !empty($_POST['sched'])) {
	echo populate_time_range_base_on_day();
}
elseif (isset($_POST['ass_id']) && !empty($_POST['ass_id'])) {
	$ass_id = $_POST['ass_id'];
	echo populate_schedule_day_time($ass_id);

}elseif (isset($_POST['not']) && !empty($_POST['not'])) {
	$output = '';
	$query = "SELECT * FROM cons_log
INNER JOIN faculty ON cons_log.fac_num = faculty.fac_num;";
	  $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
    	 $today = strtotime($rows['last_date']);    
        $output .= '
            <a href="#" class="list-group-item">'.$rows['first_name'].' '.$rows['middle_name'].' '.$rows['last_name'].' - '.date("F d Y", $today).'</a>
        ';
    }
    echo $output;
}





?>