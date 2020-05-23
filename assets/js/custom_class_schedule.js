$(document).ready(function(){
populate_faculty_form();
populate_subject_form();
populate_course_year();
populate_room();
load_as_table();
populate_scheduled_faculty();

function populate_faculty_form(fac_nums){
	var fac_nums = 1;
	$.ajax({
		url: "fetch/populate_data.php",
		method: "POST",
		data:{fac_nums:fac_nums},
		success: function(data){
			$('#fac_num').append(data);
		}
	});
}

function populate_subject_form(sub_ids){
	var sub_ids = 1;
	$.ajax({
		url: "fetch/populate_data.php",
		method: "POST",
		data:{sub_ids:sub_ids},
		success: function(data){
			$('#sub_id').append(data);
		}
	});
}

function load_as_table(query){
    $('#preloader').show();
    $.ajax({
        url: "fetch/as_table.php",
        method: "POST",
        data:{query:query},
        success: function(data){
            $('#preloader').hide();
            $('#as_results').html(data);
        }
    });
}   


    $('#save_schedule').click(function(){
        if ($('#sub_id').val()===null && $('#fac_num').val()===null) {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
        	var save_schedule = 1;
            var sub_id = $('#sub_id').val();
            var fac_num = $('#fac_num').val();
            $.ajax({
                url:"actions/as_actions.php",
                method:"POST",
                data:{save_schedule: save_schedule, sub_id:sub_id, fac_num:fac_num},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
					load_as_table();
                    $('#sub_id').prop('selectedIndex', 0);
                    $('#fac_num').prop('selectedIndex', 0);
                }
            });
        }
    });


//Request data for teacher edit
    $(document).on('click', '#get_as', function(e){
        e.preventDefault();

        var as_id = $(this).data('id');
        $('#dynamic_content_as').html("");
        $.ajax({ 
            url:"fetch/as_info.php",
            method: "POST",
            data: {as_id: as_id},
            success: function(data){
               // console.log(data);
               $('#dynamic_content_as').html(data);
            }
        });     
    }); 

    // Save subject
    $('#edit_assigned_schedule').click(function(){
        if ($('#as_id').val()==="" && $('#sub_ids').val()==="" && $('#fac_nums').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var as_id = $('#as_id').val();
            var fac_num = $('#fac_nums').val();
            var sub_id = $('#sub_ids').val();
            
            $.ajax({
                url:"actions/as_actions.php?update=1",
                method:"POST",
                data:{as_id:as_id, fac_num:fac_num, sub_id:sub_id},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                    load_as_table();
                                
                }
            });
        }
    });

    $(document).on('click', '#archive_as', function(e){
        e.preventDefault();

        var as_ids = $(this).data('id');
        $('#dynamics_content_archive').html("");
 
        $.ajax({ 
            url:"fetch/as_info.php?archive=1",
            method: "POST",
            data: {as_ids: as_ids},
            success: function(data){
               // console.log(data);
               $('#dynamics_content_archive').html(data);
            }
        });     
    });

$('#confirm_archive_as').click(function(e){
    e.preventDefault();

        if ($('#as_idss').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var as_id_archive = $('#as_idss').val();
            $.ajax({
                url:"actions/as_actions.php?archives=1",
                method:"POST",
                data:{as_id_archive:as_id_archive},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                    load_as_table();
                    $('#archive_asign_schedule_modal').modal('hide');
                    populate_scheduled_faculty();        
                }
            });
        }
    });    


    function populate_course_year(cy_id){
        var cy_id = 1;
        $.ajax({
            url: "fetch/populate_data.php",
            method: "POST",
            data:{cy_id:cy_id},
            success: function(data){
                $('#cy_id').append(data);
            }
        });
    } 

    function populate_room(room_id){
        var room_id = 1;
        $.ajax({
            url: "fetch/populate_data.php",
            method: "POST",
            data:{room_id:room_id},
            success: function(data){
                $('#room_id').append(data);
            }
        });
    } 


     $(document).on('click', '#a_schedule', function(e){
        e.preventDefault();

        var as_ids = $(this).data('id');
         $('#assigned_subject').html("");
        $.ajax({ 
            url:"fetch/populate_data.php",
            method: "POST",
            data: {as_ids: as_ids},
            success: function(data){
               // console.log(data);
               $('#assigned_subject').html(data);
            }
        });     
    });

     $('#save_assignedschedule').click(function(){
        if ($('#start_time').val()==="" && $('#end_time').val()==="" && $('#as_subject').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var  save = 1;
            var as_id = $('#as_subject').val();
            var cy_id = $('#cy_id').val();
            var room_id = $('#room_id').val();
            var day = [];
            $.each($("input[name='day']:checked"), function(){
            day.push($(this).val());
            });
            var start_time = $('#start_time').val();
            var end_time = $('#end_time').val();
            var daysjson = JSON.stringify(day);
            $.ajax({
                url:"actions/class_schedule.php",
                method:"POST",
                data:{save: save, as_id: as_id, cy_id:cy_id, room_id:room_id, daysjson: daysjson, start_time: start_time, end_time: end_time},
                success: function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                    $('#cy_id').prop('selectedIndex', 0);
                    $('#room_id').prop('selectedIndex', 0);
                    $("input[name='day']:checked").prop('checked', false);
                    $('#start_time').val("");
                    $('#end_time').val("");
                    populate_scheduled_faculty();
                }
            });
        }
     });

    function populate_scheduled_faculty(ass_id){
    var ass_id = 1;
    $('#preloader1').show();
    $.ajax({
        url: "fetch/populate_data.php",
        method: "POST",
        data:{ass_id:ass_id},
        success: function(data){
            $('#scheduled_faculty_and_subject').html(data);
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

    $(document).on('click', '#assign_schedule_btn', function(e){
        e.preventDefault();

        var r = confirm("Do you confirm deleting this schedule?");

        if (r == true) {
           var asss_id = $(this).data('id');
           $.ajax({
                url: "fetch/populate_data.php",
                method: "POST",
                data: {asss_id: asss_id},
                success: function(data){
                    $('#dynamic_content_schedule_view').html(data);
                    // alert(data);
                }
           }); 
        }else{
           
        }

     });   


});

