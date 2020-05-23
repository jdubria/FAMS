$(document).ready(function(){
populate_semester();
populate_academic_year();
list_of_attendance_record();

function populate_semester(sem){
	var sem = 1;
	$.ajax({
		url: "fetch/populate_data.php",
		method: "POST",
		data: {sem:sem},
		success: function(data){
			$('#sem_id').append(data);
		}
	});
}	

function populate_academic_year(ay){
	var ay = 1;
	$.ajax({
		url: "fetch/populate_data.php",
		method: "POST",
		data: {ay:ay},
		success: function(data){
			$('#ay_id').append(data);
		}
	});
}	

 function list_of_attendance_record(dates, sem_id, ay_id){
   $('#preloader').show();
    $.ajax({
        url: 'fetch/attendance_record_info.php',
        method: 'POST',
        data: {dates:dates, sem_id:sem_id, ay_id:ay_id},
        success: function(data){
            $('#preloader').hide();
            $('#attendance_record_result').html(data);
        }
    });
 }


$('#filter').click(function(e){
	e.preventDefault();

	if ($('#sem_id').val() != null && $('#ay_id').val() != null && $('#date').val() != "")  {
	   var dates = $('#date').val();
	   var sem_id = $('#sem_id').val();
	   var ay_id = $('#ay_id').val();
	   list_of_attendance_record(dates, sem_id, ay_id);	
	}else{
	    $.notify({
            message: 'Please Provide Filter Information'
        },{
            type: 'danger'
        });
        $('#date').val("");
 		$('#sem_id').prop('selectedIndex', 0);
		$('#ay_id').prop('selectedIndex', 0);

	}

})


	$('#date').dblclick(function(){
		$(this).val("");
	});
	$('#sems').dblclick(function(){
		$('#sem_id').prop('selectedIndex', 0);
	});	
	$('#ays').dblclick(function(){
		$('#ay_id').prop('selectedIndex', 0);
	});	


});