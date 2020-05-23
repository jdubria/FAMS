$(document).ready(function(){
populate_list_faculty_schedule();
populate_time_range_base_on_day();

function populate_list_faculty_schedule(){
var id = 1;
$('#preloader').show();
$.ajax({
    url: "fetch/populate_data.php",
    method: "POST",
    data:{id:id},
    success: function(data){
        $('#list_faculty_schedule').html(data);
        $('#preloader').hide();
    }
});
} 

function populate_time_range_base_on_day(){
var sched = 1;
$('#preloader1').show();
$.ajax({
    url: "fetch/populate_data.php",
    method: "POST",
    data:{sched:sched},
    success: function(data){
        $('#list_time_schedule').html(data);
        $('#preloader1').hide();
    }
});
} 

 $(document).on('click', '#view_assigned_schedule', function(e){
    e.preventDefault();

    var fac_num = $(this).data('id');
     $('#dynamic_content_schedule_view').html("");
    $.ajax({ 
        url:"fetch/populate_data.php",
        method: "POST",
        data: {fac_num: fac_num},
        success: function(data){
           // console.log(data);
           $('#dynamic_content_schedule_view').html(data);
        }
    });     
});

 $(document).on('click', '#view_thistime_schedule', function(e){
    e.preventDefault();

    var ass_id = $(this).data('id');
     $('#dynamic_content_thistime_schedule_view').html("");
    $.ajax({ 
        url:"fetch/populate_data.php",
        method: "POST",
        data: {ass_id: ass_id},
        success: function(data){
           // console.log(data);
           $('#dynamic_content_thistime_schedule_view').html(data);
        	// alert(data);
        }
    });     
});

});