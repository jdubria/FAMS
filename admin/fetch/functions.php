<?php 
function poppulate_list_faculty_schedule(){
    include '../../connection/connection.php';
    include "../../connection/session.php";
    $sem_id = $_SESSION['sem_id'];
    $ay_id = $_SESSION['ay_id'] ;    
	$output = ''; 
    $query = "SELECT * FROM assign_schedule 
    INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
    INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
    INNER JOIN semester ON assign_schedule.sem_id = semester.sem_id
    INNER JOIN academic_year ON assign_schedule.ay_id = academic_year.ay_id    
    WHERE assign_schedule.sched_active = 1 AND assign_subject.as_active = 1
    AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id}
    GROUP BY fac_ID ";
    $result = mysqli_query($conn, $query);
    $output .= '
    <table class="table table-sm table-stripe">
    <thead>
    <th class="text-center"><h6>Faculty with Schedule</h6></th>
    <th class="text-center"><h6>View</h6></th>
    </thead>
    <tbody>'; 
    while ($rows = mysqli_fetch_array($result)) {
        $output .= '
        <tr>
           <td class="text-center">'.$rows['first_name'].' '.$rows['middle_name'].' '.$rows['last_name'].'</td>    
           <td class="text-center">
            <button data-toggle="modal" data-target="#view_modal_assigned_schedule" id="view_assigned_schedule" data-id="'.$rows['fac_num'].'" class="btn btn-sm btn-primary"><span class="fa fa-th"></span> View Schedule</button>
           </td>
        </tr>
        ';
    }
    $output .= '</tbody>
    </table>'; 
    return $output;
}

function populate_time_range_base_on_day(){
	include '../../connection/connection.php';
    include "../../connection/session.php";
	$query="SELECT NOW();";
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_assoc($result);
	$date = $data['NOW()'];
	$today = strtotime($date);
	$curday = date("l", $today);
    $sem_id = $_SESSION['sem_id'];
    $ay_id = $_SESSION['ay_id'] ;

	$output = '';
	$query1 = "
	SELECT * FROM assign_schedule
    INNER JOIN semester ON assign_schedule.sem_id = semester.sem_id
    INNER JOIN academic_year ON assign_schedule.ay_id = academic_year.ay_id
    WHERE assign_schedule.day = '{$curday}' 
    AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id}
    GROUP BY end_time ORDER BY start_time ASC
	";
	$result = mysqli_query($conn, $query1);
 	$output .= '
    <table class="table table-sm table-stripe">
    <thead>
    <th class="text-center"><h6>Time Schedule Today <span class="text-primary">'.$curday.'</span></h6></th>
    <th class="text-center"><h6>View</h6></th>
    </thead>
    <tbody>';
    if (mysqli_num_rows($result) > 0){ 
    while ($rows = mysqli_fetch_array($result)) {
        $output .= '
        <tr>
           <td class="text-center"><h6>'.$rows['start_time'].' - '.$rows['end_time'].'</h6></td>    
           <td class="text-center">
            <button data-toggle="modal" data-target="#view_modal_schedule_thistime" id="view_thistime_schedule" data-id="'.$rows['ass_id'].'" class="btn btn-sm btn-primary"><span class="fa fa-th"></span> View Classes On This Time</button>
           </td>
        </tr>
        ';
    }
}else{
 $output .= '<td colspan="2" class="bg-warning text-center">No Available Data</td>';    
}
    $output .= '</tbody>
    </table>'; 
    return $output;

}

function populate_individual_schedule($fac_num){
    $fac_num = $fac_num;
    include '../../connection/connection.php';
    include "../../connection/session.php"; 
    $output = ''; 
    $sem_id = $_SESSION['sem_id'];
    $ay_id = $_SESSION['ay_id'] ;

    $query = "
    SELECT * FROM assign_schedule 
INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
INNER JOIN subject ON assign_subject.sub_id = subject.sub_id
INNER JOIN room ON assign_schedule.room_id = room.room_id
INNER JOIN course_year ON assign_schedule.cy_id = course_year.cy_id
INNER JOIN semester ON assign_schedule.sem_id = semester.sem_id
INNER JOIN academic_year ON assign_schedule.ay_id = academic_year.ay_id
WHERE assign_schedule.sched_active = 1 AND faculty.fac_num = {$fac_num}
AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id}
    ";
    $result = mysqli_query($conn, $query);
    $output .= '
    <div class="table-responsive">
    <table class="table table-sm table-bordered">
    <thead class="bg-success">
    <th class="text-center" colspan="2"><h6>Time</h6></th>
    <th class="text-center"><h6>Day</h6></th>
    <th class="text-center"><h6>Subject</h6></th>
    <th class="text-center"><h6>Room</h6></th>
    <th class="text-center"><h6>Course</h6></th>
    <th class="text-center"><h6>Year</h6></th>
    <th class="text-center"><h6>Section</h6></th>
    </thead>
    <tbody>'; 
    while ($rows = mysqli_fetch_array($result)) {
        $output .= '
        <tr>
        <td class="text-center">'.$rows['start_time'].'</td>
        <td class="text-center">'.$rows['end_time'].'</td>
        <td class="text-center">'.$rows['day'].'</td>
        <td class="text-center">'.$rows['sub_code'].'</td>
        <td class="text-center">'.$rows['room_name'].'</td>
        <td class="text-center">'.$rows['course'].'</td>
        <td class="text-center">'.$rows['year'].'</td>
        <td class="text-center">'.$rows['section'].'</td>
        </tr>
        ';
    }
    $output .= '</tbody>
    </table>
    </div>'; 
    return $output;
}


function populate_schedule_day_time($ass_id){
    $ass_id = $ass_id;
    include '../../connection/connection.php';
    include "../../connection/session.php"; 
    $output = '';
    $sem_id = $_SESSION['sem_id'];
    $ay_id = $_SESSION['ay_id'] ;      
    $query = "
    SELECT * FROM assign_schedule
    INNER JOIN semester ON assign_schedule.sem_id = semester.sem_id
    INNER JOIN academic_year ON assign_schedule.ay_id = academic_year.ay_id
    WHERE assign_schedule.ass_id = {$ass_id} AND assign_schedule.sched_active = 1
    AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id}
    ";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $day = $data['day'];
    $start_time = $data['start_time'];
    $end_time = $data['end_time'];

    $query1 = "
    SELECT * FROM assign_schedule 
	INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
	INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
	INNER JOIN subject ON assign_subject.sub_id = subject.sub_id
	INNER JOIN room ON assign_schedule.room_id = room.room_id
	INNER JOIN course_year ON assign_schedule.cy_id = course_year.cy_id
    INNER JOIN semester ON assign_schedule.sem_id = semester.sem_id
    INNER JOIN academic_year ON assign_schedule.ay_id = academic_year.ay_id    
	WHERE assign_schedule.sched_active = 1 AND assign_schedule.day = '{$day}'
	AND assign_schedule.start_time = '{$start_time}' AND assign_schedule.end_time = '{$end_time}'
    AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id} 
    ";
    $result1 = mysqli_query($conn, $query1);
    $output .= '
    <div class="table-responsive">
    <table class="table table-sm table-bordered">
    <thead class="bg-success">
    <th class="text-center"><h6>Name</h6></th>
    <th class="text-center"><h6>Subject</h6></th>
    <th class="text-center"><h6>Room</h6></th>
    <th class="text-center"><h6>Course</h6></th>
    <th class="text-center"><h6>Year</h6></th>
    <th class="text-center"><h6>Section</h6></th>
    </thead>
    <tbody>'; 
    while ($rows = mysqli_fetch_array($result1)) {
        $output .= '
        <tr>
        <td class="text-center">'.$rows['first_name'].' '.$rows['middle_name'].' '.$rows['last_name'].'</td>
        <td class="text-center">'.$rows['sub_code'].'</td>
        <td class="text-center">'.$rows['room_name'].'</td>
        <td class="text-center">'.$rows['course'].'</td>
        <td class="text-center">'.$rows['year'].'</td>
        <td class="text-center">'.$rows['section'].'</td>
        </tr>
        ';
    }
    $output .= '</tbody>
    </table>
    </div>'; 
    return $output;
}

function get_curday(){
    include '../../connection/connection.php';
    $query="SELECT NOW();";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $date = $data['NOW()'];
    $today = strtotime($date);
    $curday = date("l", $today);    

    return $curday;
}

function get_curdate(){
    include '../../connection/connection.php';
    $query="SELECT NOW();";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $date = $data['NOW()'];
    $today = strtotime($date);
    $curdate = date("F d Y", $today);    

    return $curdate;
}

function get_curDates(){
    include '../../connection/connection.php';
    $query="SELECT DATE(NOW());";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $date = $data['DATE(NOW())'];
    return $date;
}


?>