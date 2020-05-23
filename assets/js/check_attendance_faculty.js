$(document).ready(function(){
load_faculty_on_schedule();
populate_cur_day();
populate_cur_date();

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

function populate_cur_day(curday){
	var curday = 1;
	$.ajax({
		url: 'fetch/populate_datas.php',
		method: 'POST',
		data: {curday:curday},
		success: function(data){
			$('#day').val(data);	
		}
	});
}

function populate_cur_date(curdate){
	var curdate = 1;
	$.ajax({
		url: 'fetch/populate_datas.php',
		method: 'POST',
		data: {curdate:curdate},
		success: function(data){
			$('#date').val(data);	
		}
	});
}

$("#filter").click(function(e){
	e.preventDefault();
	if ($('#start_time').val()==="") {
		$.notify({
			message: '<strong>Kindly Fill-up the Form</strong>'
		},{
			type: 'warning'
		});		
	}else{
		var start_time =  $('#start_time').val();
		var day = $('#day').val();
		load_faculty_on_schedule(start_time, day);
	}

});

$(document).on('click', '#action_attendance', function(e){
	e.preventDefault();
	var ass_id = $(this).data('id');
	var start_time =  $('#start_time').val();
	var day = $('#day').val();
	$.ajax({
		url: 'fetch/attendance_sheet_dynamic.php',
		method: 'POST',
		data: {ass_id:ass_id, start_time:start_time, day:day},
		success: function(data){
			$('#dynamic_attendance_sheet').html(data);	
			// alert(data);
		}	
	});

});

}); 