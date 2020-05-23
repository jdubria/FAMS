<?php
include '../../connection/connection.php'; 
include 'functions.php';
include "../../connection/session.php";
$output = '';
?>
 <table class="table table-sm table-stripped" id="attendance_record">
    <thead>
      <th>Faculty Name</th>
      <th>Room Assigned</th>
      <th>Action</th>
    </thead>
    <tbody>
<?php
if (isset($_POST['start_time']) && !empty($_POST['start_time']) && isset($_POST['day']) && !empty($_POST['day'])) {
	
	$start_time = $_POST['start_time'];
	$day = $_POST['day'];
	$sem_id = $_SESSION['sem_id'];
	$ay_id = $_SESSION['ay_id'] ;


	$query="SELECT * FROM assign_schedule
	INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
	INNER JOIN room ON assign_schedule.room_id = room.room_id
	INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
	WHERE start_time = '{$start_time}' AND day = '{$day}'
	AND assign_schedule.ay_id = {$ay_id} AND assign_schedule.sem_id = {$sem_id};";



	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) {
		while ($rows = mysqli_fetch_array($result)) {
				$id = $rows['ass_id'];
				$date =  get_curDates();
				$query1="
				SELECT * FROM attendance 
				INNER JOIN assign_schedule ON attendance.ass_id = assign_schedule.ass_id
				INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
				INNER JOIN semester ON attendance.sem_id = semester.sem_id
				INNER JOIN academic_year ON attendance.ay_id = academic_year.ay_id
				INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
				WHERE assign_schedule.ass_id = {$id} AND assign_schedule.start_time = '{$start_time}'
				AND assign_schedule.day = '{$day}' AND attendance.date = '{$date}' AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id};
				";	
					$sql = mysqli_query($conn, $query1);
					$data = mysqli_fetch_assoc($sql);

			?>
			
			<tr>
				<?php // echo $query1 ?>
			  <td><?php echo $rows['first_name'] ?> <?php echo $rows['middle_name'] ?> <?php echo $rows['last_name'] ?></td>
			  <td><?php echo $rows['room_name'] ?></td>
			  <td class="text-center">
			  	<?php 
			  	if ($data['dateentered'] != "") { ?>
			  		<button data-toggle="modal" data-target="#check_attendance_form" id="action_attendance" data-id="<?php echo $rows['ass_id'] ?>" class="btn btn-sm btn-success"><span class="fa fa-check"></span>Already Checked</button>	
			  	<?php }else{ ?>
			  		<button data-toggle="modal" data-target="#check_attendance_form" id="action_attendance" data-id="<?php echo $rows['ass_id'] ?>" class="btn btn-sm btn-primary"></span> Check Attendance</button>
			  	<?php	
			  	}
			  	?>
			  </td>
			</tr>			
			
	<?php
		}
	}else{
		echo "<td colspan='3'><center>No Data Available</center></td>";
	}


}else{
	echo "<td colspan='3'><center>No Data Available</center></td>";
}

?>
  </tbody>
</table>