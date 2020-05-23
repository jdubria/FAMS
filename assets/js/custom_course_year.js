$(document).ready(function(){
load_course_year_table();

	function load_course_year_table(query){
        $('#preloader').show();
	    $.ajax({
	        url: "fetch/course_year_table.php",
	        method: "POST",
	        data:{query:query},
	        success: function(data){
                $('#preloader').hide();
	            $('#result_course_year').html(data);
	        }
	    });		
	}	

// Save course year
    $('#add_courseyear').click(function(){
        if ($('#course').val()==="" && $('#section').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var course = $('#course').val();
            var year = $('#year').val();
            var section = $('#section').val();
            
            $.ajax({
                url:"actions/courseyear_action.php",
                method:"POST",
                data:{course:course, year:year, section:section},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
					load_course_year_table();
                    $('#course').val("");
                    $('#year').prop('selectedIndex', 0);
                    $('#section').val("");
                }
            });
        }
    });
// close save rooom

//Request data for teacher edit
    $(document).on('click', '#get_cy', function(e){
        e.preventDefault();

        var cy_id_view = $(this).data('id');
        $('#dynamic_content_course_year').html("");
        $.ajax({ 
            url:"fetch/courseyear_fetch.php",
            method: "POST",
            data: {cy_id_view: cy_id_view},
            success: function(data){
               // console.log(data);
               $('#dynamic_content_course_year').html(data);
            }
        });     
    });

    // Save subject
    $('#edit_courseyear').click(function(){
        if ($('#courses').val()==="" && $('#sections').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var update = 1;
            var cy_ids = $('#cy_id').val();
            var courses = $('#courses').val();
            var years = $('#years').val();
            var sections = $('#sections').val();
            
            $.ajax({
                url:"actions/courseyear_action.php?update=1",
                method:"POST",
                data:{update:update, cy_ids:cy_ids, courses:courses, years:years, sections:sections},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
					load_course_year_table();
                }
            });
        }
    });

    $(document).on('click', '#archive_course_year', function(e){
        e.preventDefault();

        var cy_ids = $(this).data('id');
        $('#dynamics_content_archive_cy').html("");
 
        $.ajax({ 
            url:"fetch/courseyear_fetch.php?archive=1",
            method: "POST",
            data: {cy_ids: cy_ids},
            success: function(data){
               // console.log(data);
               $('#dynamics_content_archive_cy').html(data);
            }
        });     
    });

$('#confirm_archive_cy').click(function(e){
    e.preventDefault();

        if ($('#cy_idss').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var cy_id = $('#cy_idss').val();
            $.ajax({
                url:"actions/courseyear_action.php?archive=1",
                method:"POST",
                data:{cy_id:cy_id},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
					load_course_year_table();
                    $('#archive_cy').modal('hide');        
                }
            });
        }
    });        

});