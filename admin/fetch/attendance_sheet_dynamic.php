<?php 
include '../../connection/connection.php'; 
include 'functions.php';
include "../../connection/session.php";
if (isset($_POST['ass_id']) && !empty($_POST['ass_id'])) {
	$ass_id = $_POST['ass_id'];
	$start_time = $_POST['start_time'];
	$day = $_POST['day'];
	$sem_id = $_SESSION['sem_id'];
	$ay_id = $_SESSION['ay_id'] ;
	$present = "";
	$datetime = "Not Yet Checked";
	$dateToday = get_curDates();
	$query1="
	SELECT * FROM attendance 
	INNER JOIN assign_schedule ON attendance.ass_id = assign_schedule.ass_id
	INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
	INNER JOIN semester ON attendance.sem_id = semester.sem_id
	INNER JOIN academic_year ON attendance.ay_id = academic_year.ay_id
	INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
	WHERE assign_schedule.ass_id = {$ass_id} AND assign_schedule.start_time = '{$start_time}'
	AND assign_schedule.day = '{$day}' AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id} AND attendance.date = '{$dateToday}';
	";


	$query2 = "SELECT * FROM assign_schedule 
	INNER JOIN assign_subject ON assign_schedule.as_id = assign_subject.as_id
	INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
    INNER JOIN semester ON assign_schedule.sem_id = semester.sem_id
    INNER JOIN academic_year ON assign_schedule.ay_id = academic_year.ay_id	
	WHERE assign_schedule.ass_id = {$ass_id} AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id}";



	$sql = mysqli_query($conn, $query1);

	if (mysqli_num_rows($sql) > 0) {
		$data = mysqli_fetch_assoc($sql); 
		if ($data['present'] == 1) {
			$present = "checked";
		}else{
			$present = "";
		}
		if($data['dateentered'] == ""){
			$datetime = "Not Yet Checked";
		}else{
			$datetime = $data['dateentered'];
		}
		if($data['date'] == "0000-00-00"){
			$dateToday = get_curDates();
		}else{
			$dateToday = $data['date'];
		}

		?>
		<div class="modal-body">
		<div class="container-fluid">
		    <div class="container-fluid">
		      <div class="form-group">
		        <label>Faculty Name</label>
		              <input type="hidden" name="id" id="id" value="<?php echo $ass_id ?>">
		              <input type="hidden" name="att_id" id="att_id" value="<?php echo $data['att_id'] ?>">
		              <input type="hidden" name="dates" id="dates" value="<?php echo $dateToday ?>">
		              <input type="text" name="name" class="form-control" readonly value="<?php echo $data['first_name'] ?> <?php echo $data['middle_name'] ?> <?php echo $data['last_name'] ?>">
		      </div>
		      <div class="form-row">
		      	<div class="col-sm-6">
		      		<label>Present?</label>
		      	</div>
		      	<div class="col-sm-6">
		      		<div class="onoffswitch">
						<input type="checkbox" name="" class="onoffswitch-checkbox" id="onoffswitch" <?php echo $present; ?>>
						<label class="onoffswitch-label" for="onoffswitch">
						<span class="onoffswitch-inner"></span>
						<span class="onoffswitch-switch"></span>
						</label>
					</div>
		      	</div>
		      </div>
		      <br>
		      <div class="form-group">
		      	<label>Remarks</label>
		      	<textarea rows="3" id="remarks" class="form-control" name="remarks"><?php echo $data['remarks']; ?></textarea>
		      	<small>Checked: <?php $time = strtotime($datetime); 
		      	echo date('F d Y - h:i:s A', $time);
		      	?></small>
		      </div>
		                               
		    </div>	             		 		
		    </div>
		</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Close</button>
                <button type="submit" id="update_attendance" class="btn btn-sm btn-success"><span class="fa fa-edit"></span> Update</button>
            </div>		
<?php		
	}else{
		$sql1 = mysqli_query($conn, $query2);
		$data = mysqli_fetch_assoc($sql1); 

?>		<div class="modal-body">
		<div class="container-fluid">
		    <div class="container-fluid">
		      <div class="form-group">
		        <label>Faculty Name</label>
		              <input type="hidden" name="id" id="id" value="<?php echo $ass_id ?>">
		              <input type="hidden" name="dates" id="dates" value="<?php echo $dateToday; ?>">
		              <input type="text" name="name" class="form-control" readonly value="<?php echo $data['first_name'] ?> <?php echo $data['middle_name'] ?> <?php echo $data['last_name'] ?>">
		      </div>
		      <div class="form-row">
		      	<div class="col-sm-6">
		      		<label>Present?</label>
		      	</div>
		      	<div class="col-sm-6">
		      		<div class="onoffswitch">
						<input type="checkbox" name="" class="onoffswitch-checkbox" id="onoffswitch">
						<label class="onoffswitch-label" for="onoffswitch">
						<span class="onoffswitch-inner"></span>
						<span class="onoffswitch-switch"></span>
						</label>
					</div>
		      	</div>
		      </div>
		      <br>
		      <div class="form-group">
		      	<label>Remarks</label>
		      	<textarea rows="3" id="remarks" class="form-control" name="remarks"></textarea>
		      	<small>Checked: <?php $time = strtotime($datetime); 
		      	echo date('F d Y - h:i:s A', $time);
		      	?></small>
		      </div>
		                               
		    </div>	             		 		
		    </div>
		</div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><span class="fa fa-remove"></span> Close</button>
                <button type="submit" id="save_attendance" class="btn btn-sm btn-primary"><span class="fa fa-check"></span> Save</button>
            </div>		

<?php
	}	 
}

?>
<script type="text/javascript">
	$(document).ready(function(){
function load_faculty_on_schedule(start_time, day){
	$.ajax({
		url: 'fetch/populate_attendance_form.php',
		method: 'POST',
		data: {start_time:start_time, day:day},
		success: function(data){
			$('#schedule_result').html(data);
		}
	});
}



$('#save_attendance').click(function(e){
	e.preventDefault();
	var present;
	var remarks;
	var start_time =  $('#start_time').val();
	var day = $('#day').val();
	if ($('#onoffswitch').prop('checked') === true) {
		present =1;
		if ($('#remarks').val() === "") {
			var a = confirm("Do you confirm empty remarks?");
			if (a == true) {
				var ass_id = $('#id').val();
				var date = $('#dates').val();
				remarks = "";
				$.ajax({
					url: 'actions/save_attendance.php',
					method: 'POST',
					data: {ass_id:ass_id, present:present, date:date, remarks:remarks},
					success: function(data){
						// alert(data);
						$.notify(data);
						$('#check_attendance_form').modal('hide');
						load_faculty_on_schedule(start_time, day);
					}
				});
			}else{
				
			}
		}else{
				var ass_id = $('#id').val();
				var date = $('#dates').val();
				remarks = $('#remarks').val();
				$.ajax({
					url: 'actions/save_attendance.php',
					method: 'POST',
					data: {ass_id:ass_id, present:present, date:date, remarks:remarks},
					success: function(data){
						// alert(data);
						$.notify(data);
						$('#check_attendance_form').modal('hide');
						load_faculty_on_schedule(start_time, day);
					}
				});			
		}		
		
	}else{
		present = 0;
		if ($('#remarks').val() === "") {
			var a = confirm("Do you confirm empty remarks?");
			if (a == true) {
				var ass_id = $('#id').val();
				var date = $('#dates').val();
				remarks = "";
				$.ajax({
					url: 'actions/save_attendance.php',
					method: 'POST',
					data: {ass_id:ass_id, present:present, date:date, remarks:remarks},
					success: function(data){
						// alert(data);
						$.notify(data);
						$('#check_attendance_form').modal('hide');
						load_faculty_on_schedule(start_time, day);
					}
				});
			}else{
				
			}
		}else{
				var ass_id = $('#id').val();
				var date = $('#dates').val();
				remarks = $('#remarks').val();
				$.ajax({
					url: 'actions/save_attendance.php',
					method: 'POST',
					data: {ass_id:ass_id, present:present, date:date, remarks:remarks},
					success: function(data){
						// alert(data);
						$.notify(data);
						$('#check_attendance_form').modal('hide');
						load_faculty_on_schedule(start_time, day);
					}
				});			
		}				
		
	}

});

$('#update_attendance').click(function(){
	var update = 1;
	var att_id = $('#att_id').val();
	var present;
	var remarks;
	var start_time =  $('#start_time').val();
	var day = $('#day').val();
	if ($('#onoffswitch').prop('checked') === true) {
		present =1;
		if ($('#remarks').val() === "") {
			var a = confirm("Do you confirm empty remarks?");
			if (a == true) {
				var ass_id = $('#id').val();
				remarks = "";
				$.ajax({
					url: 'actions/save_attendance.php',
					method: 'POST',
					data: {update: update, att_id:att_id, present:present, remarks:remarks},
					success: function(data){
						// alert(data);
						$.notify(data);
						$('#check_attendance_form').modal('hide');
						load_faculty_on_schedule(start_time, day);
					}
				});
			}else{
				
			}
		}else{
				var att_id = $('#att_id').val();
				remarks = $('#remarks').val();
				$.ajax({
					url: 'actions/save_attendance.php',
					method: 'POST',
					data: {update: update, att_id:att_id, present:present, remarks:remarks},
					success: function(data){
						// alert(data);
						$.notify(data);
						$('#check_attendance_form').modal('hide');
						load_faculty_on_schedule(start_time, day);
					}
				});			
		}		
		
	}else{
		present = 0;
		if ($('#remarks').val() === "") {
			var a = confirm("Do you confirm empty remarks?");
			if (a == true) {
				var att_id = $('#att_id').val();
				remarks = "";
				$.ajax({
					url: 'actions/save_attendance.php',
					method: 'POST',
					data: {update: update, att_id:att_id, present:present, remarks:remarks},
					success: function(data){
						// alert(data);
						$.notify(data);
						$('#check_attendance_form').modal('hide');
						load_faculty_on_schedule(start_time, day);
					}
				});
			}else{
				
			}
		}else{
				var att_id = $('#att_id').val();
				remarks = $('#remarks').val();
				$.ajax({
					url: 'actions/save_attendance.php',
					method: 'POST',
					data: {update: update, att_id:att_id, present:present, remarks:remarks},
					success: function(data){
						// alert(data);
						$.notify(data);
						$('#check_attendance_form').modal('hide');
						load_faculty_on_schedule(start_time, day);
					}
				});			
		}				
		
	}

});


	});
</script>