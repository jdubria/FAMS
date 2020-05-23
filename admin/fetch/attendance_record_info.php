<?php
include '../../connection/connection.php';
include "../../connection/session.php";

$query="";

if (isset($_POST['dates']) && isset($_POST['sem_id']) && isset($_POST['ay_id'])) {
   $date = $_POST['dates'];
   $sem_id = $_POST['sem_id'];
   $ay_id = $_POST['ay_id']; 		
   $query="
	SELECT * FROM attendance 
	INNER JOIN assign_schedule ON attendance.ass_id = assign_schedule.ass_id
	INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
	INNER JOIN semester ON attendance.sem_id = semester.sem_id
	INNER JOIN academic_year ON attendance.ay_id = academic_year.ay_id
	INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
	WHERE  semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id} 
	AND attendance.date = '{$date}';
   "; 
}else{
	$ay_id = 1;
	$sem_id = 1;	
	$query="
	SELECT * FROM attendance 
	INNER JOIN assign_schedule ON attendance.ass_id = assign_schedule.ass_id
	INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
	INNER JOIN semester ON attendance.sem_id = semester.sem_id
	INNER JOIN academic_year ON attendance.ay_id = academic_year.ay_id
	INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
	WHERE  semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id};
	";
}
?>
<div class="table-responsive">
	<table class="table table-sm table-bordered" id="table_attendance_record">
		<thead>
			<th class="text-center">Name</th>
			<th class="text-center">Date</th>
			<th class="text-center">Attendance</th>
			<th class="text-center">Date Check</th>
			<th class="text-center">Remarks</th>
		</thead>
		<tbody>
<?php 
	$present = "";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
	
	while ($row = mysqli_fetch_array($result)) { 
		if ($row['present'] == 1) {
			$present = "Present";
		}else{
			$present = "Absent";
		}

		?>
		<tr>
			<td class="text-center"><?php echo $row['first_name']; ?> <?php echo $row['middle_name']; ?> <?php echo $row['last_name']; ?></td>
			<td class="text-center"><?php echo $row['date']; ?></td>
			<td class="text-center"><?php echo $present ?></td>
			<td class="text-center"><?php echo $row['dateentered']; ?></td>
			<td class="text-center"><?php echo $row['remarks']; ?></td>
		</tr>
<?php }	

	}else{ ?>
		<tr>
			<td colspan="5"><strong>No Item Found</strong></td>
		</tr>
<?php	 		
	}

?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
  $(document).ready(function(){


    var vtable = $('#table_attendance_record').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf']
    } );

    vtable.buttons().container() 
        .appendTo( '#table_attendance_record_wrapper .col-sm-6:eq(0)' );

    $('#table_attendance_record_filter').addClass('pull-right');
    $('.dt-buttons').addClass('btn-group-sm');

  });
</script>