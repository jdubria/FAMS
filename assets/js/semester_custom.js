$(document).ready(function(){
load_semester_table();
populate_sem();

	function load_semester_table(query){
        $('#preloader').show();
	    $.ajax({
	        url: "fetch/semester_table.php",
	        method: "POST",
	        data:{query:query},
	        success: function(data){
                $('#preloader').hide();
	            $('#result_semester').html(data);
	        }
	    });		
	}

// Save semester
    $('#add_semester').click(function(){
        if ($('#semester').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var sem_name = $('#sem_name').val();
            
            $.ajax({
                url:"actions/add_semester.php",
                method:"POST",
                data:{sem_name: sem_name},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
					load_semester_table();
                    $('#sem_name').val("");
                }
            });
        }
    });
// close save rooom	

//Request data for teacher edit
    $(document).on('click', '#get_sem', function(e){
        e.preventDefault();

        var sem_id = $(this).data('id');
        $('#dynamic_content_semester').html("");
        $.ajax({ 
            url:"fetch/sem_info.php",
            method: "POST",
            data: {sem_id: sem_id},
            success: function(data){
               // console.log(data);
               $('#dynamic_content_semester').html(data);
            }
        });     
    });	

    // Save subject
    $('#edit_sem').click(function(){
        if ($('#sem_names').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var sem_id = $('#sem_id').val();
            var sem_name = $('#sem_names').val();

            $.ajax({
                url:"actions/edit_sem.php",
                method:"POST",
                data:{sem_id:sem_id, sem_name: sem_name},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
					load_semester_table();
                }
            });
        }
    });

    $(document).on('click', '#archive_semester', function(e){
        e.preventDefault();

        var sem_id = $(this).data('id');
        $('#dynamics_content_semesters').html("");
 
        $.ajax({ 
            url:"fetch/sem_info_archive.php",
            method: "POST",
            data: {sem_id: sem_id},
            success: function(data){
               // console.log(data);
               $('#dynamics_content_semesters').html(data);
            }
        });     
    });

$('#confirm_archive_sem').click(function(e){
    e.preventDefault();

        if ($('#sem_idss').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var sem_id = $('#sem_idss').val();
            $.ajax({
                url:"actions/archive_sem.php",
                method:"POST",
                data:{sem_id:sem_id},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
					load_semester_table();
                    $('#archive_sem').modal('hide');        
                }
            });
        }
    });        

  function populate_sem(){
    var pop_sem = 1;
    $.ajax({
        url: 'fetch/populate_data.php',
        method: 'POST',
        data: {pop_sem:pop_sem},
        success: function(data){
            $('#set_sem').append(data);
        }
    });
  }    

  $('#set_sems').click(function(e){
    e.preventDefault();
    var r = confirm("Do you confirm to set new Semester and Log-in again?");
    if (r == true) {
        var sem_id = $('#set_sem').val();
        var set_sem = 1;
        $.ajax({
            url: 'actions/add_acadyear.php',
            method: 'POST',
            data: {sem_id:sem_id, set_sem:set_sem},
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