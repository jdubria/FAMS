$(document).ready(function(){
list_of_attendance();
populate_date();

 function list_of_attendance(){
   $('#preloader').show();
   var date = $('#date').val();
    $.ajax({
        url: 'fetch/dashboard_attendance.php',
        method: 'POST',
        data: {date:date},
        success: function(data){
            $('#preloader').hide();
            $('#list_of_attendance').html(data);
        }
    });
 }

 function populate_date(dates){
 	var dates = 1;
 	$.ajax({
 		url: 'fetch/populate_data.php',
 		method: 'POST',
 		data: {dates:dates},
 		success: function(data){
 			$('#date').val(data);
 		}
 	});
 }


});