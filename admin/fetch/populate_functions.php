<?php
function populate_faculty(){
    include '../../connection/connection.php'; 
    $output = '';
    $query = "SELECT * FROM faculty WHERE fac_active = 1 ORDER by fac_num ASC";
    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
        $output .= '
            <option value="'.$rows['fac_num'].'">'.$rows['first_name'].' '.$rows['middle_name'].' '.$rows['last_name'].'</option>
        ';
    }
    return $output;
}

function populate_subject(){
    include '../../connection/connection.php'; 
    $output = '';
    $query = "SELECT * FROM subject 
    INNER JOIN semester ON subject.sem_id = semester.sem_id
    WHERE subject.sub_active = 1 AND semester.sem_id = 1 ORDER by sub_id ASC";
    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
        $output .= '
            <option value="'.$rows['sub_id'].'">'.$rows['sub_code'].'</option>
        ';
    }
    return $output;
}

function populate_course_year(){
    include '../../connection/connection.php'; 
    $output = '';
    $query = "SELECT * FROM course_year WHERE cy_active = 1 ORDER by cy_id ASC";
    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
        $output .= '
            <option value="'.$rows['cy_id'].'">'.$rows['course'].' '.$rows['year'].' '.$rows['section'].'</option>
        ';
    }
    return $output;
}

function populate_room(){
    include '../../connection/connection.php'; 
    $output = '';
    $query = "SELECT * FROM room WHERE room_active = 1 ORDER by room_id ASC";
    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
        $output .= '
            <option value="'.$rows['room_id'].'">'.$rows['room_name'].'-'.$rows['room_type'].'</option>
        ';
    }
    return $output;
}

function select_assignedSubject($as_id){
    $as_id = $as_id;
    include '../../connection/connection.php';
    include "../../connection/session.php"; 
    $sem_id = $_SESSION['sem_id'];
    $ay_id = $_SESSION['ay_id'] ;
    $output = '';
    $query = "SELECT * FROM assign_subject
            INNER JOIN academic_year ON assign_subject.ay_id = academic_year.ay_id
            INNER JOIN semester ON assign_subject.sem_id = semester.sem_id
            INNER JOIN subject ON assign_subject.sub_id = subject.sub_id
            INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
            WHERE assign_subject.as_id = {$as_id} AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id}";
    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
        $output .= '
            <input type="text" name="asubject_id" class="form-control" disabled value="'.$rows['first_name'].' '.$rows['middle_name'].' '.$rows['last_name'].'-'.$rows['sub_code'].'">
            <input type="hidden" name="as_subject" id="as_subject" value="'.$rows['as_id'].'">
        ';
    }
    return $output;

}


function populate_scheduled_faculty(){
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
    WHERE assign_schedule.sched_active = 1
    AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id} 
    AND assign_subject.as_active = 1 
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

function populate_individual_schedule($fac_num){
    $fac_num = $fac_num;
    include '../../connection/connection.php';
    include "../../connection/session.php";
    $sem_id = $_SESSION['sem_id'];
    $ay_id = $_SESSION['ay_id'] ; 
    $output = ''; 
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
    <th class="text-center"><h6>Action</h6></th>
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
        <td class="text-center">
            <button type="button" id="assign_schedule_btn" data-id="'.$rows['ass_id'].'" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Delete
            </button>
        </td>
        </tr>
        ';
    }
    $output .= '</tbody>
    </table>
    </div>'; 
    return $output;
}


function populate_time_range_base_on_day(){
    include '../../connection/connection.php';
    include "../../connection/session.php";
    $sem_id = $_SESSION['sem_id'];
    $ay_id = $_SESSION['ay_id'] ;
    $query="SELECT NOW();";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $date = $data['NOW()'];
    $today = strtotime($date);
    $curday = date("l", $today);    
 

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
    $output .= '</tbody>
    </table>'; 
    return $output;

}

function populate_schedule_day_time($ass_id){
    $ass_id = $ass_id;
    include '../../connection/connection.php'; 
    include "../../connection/session.php";
    $sem_id = $_SESSION['sem_id'];
    $ay_id = $_SESSION['ay_id'] ;
    $output = ''; 


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


function populate_semester(){
    include '../../connection/connection.php'; 
    $output = '';
    $query = "SELECT * FROM semester WHERE sem_active = 1 ORDER BY sem_id ASC";
    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
        $output .= '
            <option value="'.$rows['sem_id'].'">'.$rows['sem_name'].'</option>
        ';
    }
    return $output;
}

function populate_ay(){
    include '../../connection/connection.php'; 
    $output = '';
    $query = "SELECT * FROM academic_year WHERE ay_active = 1 ORDER BY ay_id ASC";
    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
        $output .= '
            <option value="'.$rows['ay_id'].'">'.$rows['ay_name'].'</option>
        ';
    }
    return $output;
}


?>


