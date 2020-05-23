<?php 

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
    <table class="table table-sm table-bordered" id="table_teacher">
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
    </div>
    '; 
    return $output;
}



?>