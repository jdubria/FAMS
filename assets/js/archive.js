$(document).ready(function(){
load_current();

function load_current(){
	var as = 1;
$('#preloader').show();
	$.ajax({
		url: 'fetch/archive_tables.php',
		method: 'POST',
		data: {as:as},
		success: function(data){
			$('#preloader').hide();
			$('#result').html(data);
		}
	});
}

function load_teacher(){
	var teacher = 1;
	$('#preloader').show();
	$.ajax({
		url: 'fetch/archive_tables.php',
		method: 'POST',
		data: {teacher:teacher},
		success: function(data){
			$('#preloader').hide();
			$('#result').html(data);
	}	
});
}
function load_subjects(){
	var subject = 1;
	$('#preloader').show();
	$.ajax({
		url: 'fetch/archive_tables.php',
		method: 'POST',
		data: {subject:subject},
		success: function(data){
			$('#preloader').hide();
			$('#result').html(data);
		}
	});	
}

function load_room(){
	var room = 1;
	$('#preloader').show();
	$.ajax({
		url: 'fetch/archive_tables.php',
		method: 'POST',
		data: {room:room},
		success: function(data){
			$('#preloader').hide();
			$('#result').html(data);
		}
	});
}

function load_course_year(){
	var cy = 1;
	$('#preloader').show();
	$.ajax({
		url: 'fetch/archive_tables.php',
		method: 'POST',
		data: {cy:cy},
		success: function(data){
			$('#preloader').hide();
			$('#result').html(data);
		}
	});	
}

function load_semester(){
	var semester = 1;
	$('#preloader').show();
	$.ajax({
		url: 'fetch/archive_tables.php',
		method: 'POST',
		data: {semester:semester},
		success: function(data){
			$('#preloader').hide();
			$('#result').html(data);
		}
	});	
}

function load_academic_year(){
	var academic_year = 1;
	$('#preloader').show();
	$.ajax({
		url: 'fetch/archive_tables.php',
		method: 'POST',
		data: {academic_year:academic_year},
		success: function(data){
			$('#preloader').hide();
			$('#result').html(data);
		}
	});	
}

function load_user(){
	var user = 1;
	$('#preloader').show();
	$.ajax({
		url: 'fetch/archive_tables.php',
		method: 'POST',
		data: {user:user},
		success: function(data){
			$('#preloader').hide();
			$('#result').html(data);
		}
	});	
}

$('.list-group-item').on('click', function(){
	var sel= $(this).attr('href');
	 var a = $(this);
	$('.list-group-item.active').removeClass('active');
	a.toggleClass('active');

	if (sel === "#assigned_subject") {
		load_current();	
	}else if (sel === "#teacher_info") {
		load_teacher();	
	}else if (sel === "#subject") {
		load_subjects();
	}else if(sel === "#room"){
		load_room();
	}else if(sel === "#course_year"){
		load_course_year();
	}else if(sel === "#semester"){
		load_semester();
	}else if(sel === "#ay"){
		load_academic_year();
	}else if(sel === "#user"){
		load_user();
	}

});

$(document).on('click', '#unarchive_as', function(e){
	var r = confirm("Are you sure you want to restore this data?");
	if (r == true) {
		var as_id = $(this).data('id');
		$.ajax({
			url: 'actions/restore_actions.php',
			method: 'POST',
			data: {as_id:as_id},
			success: function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                load_academic_year();			
			}
		});
	}else{
		
	}

});

$(document).on('click', '#unarchive_faculty', function(){
	var r = confirm("Are you sure you want to restore this data?");
	if (r == true) {
		var fac_num = $(this).data('id');
		$.ajax({
			url: 'actions/restore_actions.php',
			method: 'POST',
			data: {fac_num:fac_num},
			success: function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                load_teacher();				
			}
		});
	}else{
		
	}
});

$(document).on('click', '#unarchive_subject', function(){
	var r = confirm("Are you sure you want to restore this data?");
	if (r == true) {
		var sub_id = $(this).data('id');
		$.ajax({
			url: 'actions/restore_actions.php',
			method: 'POST',
			data: {sub_id:sub_id},
			success: function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                load_subjects();	
			}
		});
	}else{
		
	}
});

$(document).on('click', '#unarchive_room', function(){
	var r = confirm("Are you sure you want to restore this data?");
	if (r == true) {
		var room_id = $(this).data('id');
		$.ajax({
			url: 'actions/restore_actions.php',
			method: 'POST',
			data: {room_id:room_id},
			success: function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                load_room();	
			}
		});
	}else{
		
	}
});

$(document).on('click', '#unarchive_cy', function(){
	var r = confirm("Are you sure you want to restore this data?");
	if (r == true) {
		var cy = $(this).data('id');
		$.ajax({
			url: 'actions/restore_actions.php',
			method: 'POST',
			data: {cy:cy},
			success: function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                load_course_year();	
			}
		});
	}else{
		
	}
});

$(document).on('click', '#unarchive_sem', function(){
	var r = confirm("Are you sure you want to restore this data?");
	if (r == true) {
		var sem_id = $(this).data('id');
		$.ajax({
			url: 'actions/restore_actions.php',
			method: 'POST',
			data: {sem_id:sem_id},
			success: function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                load_semester();
			}
		});
	}else{
		
	}
});

$(document).on('click', '#unarchive_ay', function(){
	var r = confirm("Are you sure you want to restore this data?");
	if (r == true) {
		var ay_id = $(this).data('id');
		$.ajax({
			url: 'actions/restore_actions.php',
			method: 'POST',
			data: {ay_id:ay_id},
			success: function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                load_semester();
			}
		});
	}else{
		
	}
});

$(document).on('click', '#unarchive_user', function(){
	var r = confirm("Are you sure you want to restore this data?");
	if (r == true) {
		var user_name = $(this).data('id');
		$.ajax({
			url: 'actions/restore_actions.php',
			method: 'POST',
			data: {user_name:user_name},
			success: function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                load_user();
			}
		});
	}else{
		
	}
});


});
