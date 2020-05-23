$(document).ready(function(){
populate_time_range_base_on_day();
list_of_attendance();
load_notified();

function populate_time_range_base_on_day(){
var sched = 1;
$('#preloader1').show();
$.ajax({
    url: "fetch/dashboard_fetch.php",
    method: "POST",
    data:{sched:sched},
    success: function(data){
        $('#list_time_schedule').html(data);
        $('#preloader1').hide();
    }
});
} 


 $(document).on('click', '#view_thistime_schedule', function(e){
    e.preventDefault();

    var ass_id = $(this).data('id');
     $('#dynamic_content_thistime_schedule_view').html("");
    $.ajax({ 
        url:"fetch/dashboard_fetch.php",
        method: "POST",
        data: {ass_id: ass_id},
        success: function(data){
           // console.log(data);
           $('#dynamic_content_thistime_schedule_view').html(data);
        	// alert(data);
        }
    });     
});

 function list_of_attendance(date){
   $('#preloader').show(); 
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


$('#populate_btn').click(function(e){
    e.preventDefault();

    if ($('#date').val() === "") {
        list_of_attendance();
    }else{
        var date = $('#date').val();
        list_of_attendance(date);
    }

})



function load_notified(){
    var not = 1;
    $.ajax({
        url: 'fetch/dashboard_fetch.php',
        method: 'POST',
        data: {not:not},
        success: function(data){
            $('#notified_result').append(data);
        }
    });
}


});