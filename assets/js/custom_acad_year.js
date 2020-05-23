$(document).ready(function(){
load_acad_table();
populate_acadyear();

	function load_acad_table(query){
        $('#preloader').show();
	    $.ajax({
	        url: "fetch/acad_table.php",
	        method: "POST",
	        data:{query:query},
	        success: function(data){
                $('#preloader').hide();
	            $('#result_acad_year').html(data);
	        }
	    });		
	}	

// Save Room
    $('#add_acadyear').click(function(){
        if ($('#ay_name').val()==="") {
                $.notify({
                    message: '<strong>Please Fill-up Form</strong>'
                },{
                    type: 'warning'
                });
        }else{
            var ay_name = $('#ay_name').val();
            
            $.ajax({
                url:"actions/add_acadyear.php",
                method:"POST",
                data:{ay_name: ay_name},
                success:function(data){
                    $.notify({
                        message: data
                    },{
                        type: 'success'
                    });
					load_acad_table();
                    $('#ay_name').val("");
                }
            });
        }
    });
// close save rooom

//Request data for teacher edit
    $(document).on('click', '#get_ay', function(e){
        e.preventDefault();

        var ay_id = $(this).data('id');
        $('#dynamic_content_acad_year').html("");
        $.ajax({ 
            url:"fetch/acad_info.php",
            method: "POST",
            data: {ay_id: ay_id},
            success: function(data){
               // console.log(data);
               $('#dynamic_content_acad_year').html(data);
            }
        });     
    });

    // Save subject
    $('#edit_acad').click(function(){
        if ($('#ay_names').val()==="") {
                $.notify({
                    message: '<strong>Please Fill-up Form</strong>'
                },{
                    type: 'warning'
                });
        }else{
            var ay_id = $('#ay_id').val();
            var ay_name = $('#ay_names').val();

            $.ajax({
                url:"actions/edit_acad.php",
                method:"POST",
                data:{ay_id:ay_id, ay_name: ay_name},
                success:function(data){
                    $.notify({
                        message: data
                    },{
                        type: 'success'
                    });                    
					load_acad_table();
                }
            });
        }
    });

    $(document).on('click', '#archive_acad_year', function(e){
        e.preventDefault();

        var ay_id = $(this).data('id');
        $('#dynamics_content_archive_ay').html("");
 
        $.ajax({ 
            url:"fetch/ay_archive.php",
            method: "POST",
            data: {ay_id: ay_id},
            success: function(data){
               // console.log(data);
               $('#dynamics_content_archive_ay').html(data);
            }
        });     
    });

$('#confirm_archive_ay').click(function(e){
    e.preventDefault();

        if ($('#ay_idss').val()==="") {
                $.notify({
                    message: '<strong>Please Fill-up Form</strong>'
                },{
                    type: 'warning'
                });
        }else{
            var ay_id = $('#ay_idss').val();
            $.ajax({
                url:"actions/archive_ay.php",
                method:"POST",
                data:{ay_id:ay_id},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
					load_acad_table();
                    $('#archive_ay').modal('hide');        
                }
            });
        }
    });

  function populate_acadyear(){
    var pop_acad = 1;
    $.ajax({
        url: 'fetch/populate_data.php',
        method: 'POST',
        data: {pop_acad:pop_acad},
        success: function(data){
            $('#set_acad').append(data);
        }
    });
  }    

  $('#set_acads').click(function(e){
    e.preventDefault();
    var r = confirm("Do you confirm to set new Academic Year and Log-in again?");
    if (r == true) {
        var ay_id = $('#set_acad').val();
        var set_ay = 1;
        $.ajax({
            url: 'actions/add_acadyear.php',
            method: 'POST',
            data: {ay_id:ay_id, set_ay:set_ay},
            success: function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                location.href = '../log-out.php';                
            }
        });
    }else{

    }

  });      

});