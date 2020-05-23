$(document).ready(function() {
    load_subject_table();
    populate_semester();


function load_subject_table(query){
    $('#preloader').show();
    $.ajax({
        url: "fetch/subject_table.php",
        method: "POST",
        data:{query:query},
        success: function(data){
            $('#preloader').hide();
            $('#subject_result').html(data);
        }
    });
}   

 function populate_semester(query){
    var sem = 1;    
    $.ajax({
        url:"fetch/populate_data.php",
        method: "POST",
        data: {sem:sem},
        success: function(data){
            $('#sem_id').append(data);
        }
    });
 }



// Save subject
    $('#save_subject').click(function(){
        if ($('#sub_code').val()==="" && $('#sub_desc').val()==="" && $('#num_unit').val()==="" && $('#num_hours').val()==="" && $('#sem_id').val()===null) {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var sub_code = $('#sub_code').val();
            var sub_desc = $('#sub_desc').val();
            var num_unit = $('#num_unit').val();
            var num_hours = $('#num_hours').val();
            var sem_id = $('#sem_id').val();
            var save = 1;
            $.ajax({
                url:"actions/subject_action.php",
                method:"POST",
                data:{save:save, sub_code: sub_code, sub_desc: sub_desc, num_unit: num_unit, num_hours: num_hours, sem_id:sem_id},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                    load_subject_table()
                    $('#sub_code').val("");
                    $('#sub_desc').val("");
                    $('#num_unit').val("");
                    $('#num_hours').val(""); 
                    $('#sem_id').prop('selectedIndex', 0);        
                }
            });
        }
    });

// close save subject

//Request data for teacher edit
    $(document).on('click', '#get_subject', function(e){
        e.preventDefault();

        var sub_id = $(this).data('id');
        $('#dynamic_content_subject').html("");
        $.ajax({ 
            url:"fetch/subject_info.php",
            method: "POST",
            data: {sub_id: sub_id},
            success: function(data){
               // console.log(data);
               $('#dynamic_content_subject').html(data);
            }
        });     
    });

// Request data for Archive Subject

    $(document).on('click', '#archive_sub', function(e){
        e.preventDefault();

        var sub_id = $(this).data('id');
        $('#dynamics_content_archive_subject').html("");
 
        $.ajax({ 
            url:"fetch/subject_archive.php",
            method: "POST",
            data: {sub_id: sub_id},
            success: function(data){
               // console.log(data);
               $('#dynamics_content_archive_subject').html(data);
            }
        });     
    });

    // Save subject
    $('#edit_subject').click(function(){
        if ($('#sub_id').val()==="" && $('#sub_codes').val()==="" && $('#sub_descs').val()==="" && $('#num_units').val()==="" && $('#num_hourss').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var sub_id = $('#sub_id').val();
            var sub_code = $('#sub_codes').val();
            var sub_desc = $('#sub_descs').val();
            var num_unit = $('#num_units').val();
            var num_hours = $('#num_hourss').val();
            var sem_id = $('#sem_ids').val();
            var edit = 1;
            $.ajax({
                url:"actions/subject_action.php",
                method:"POST",
                data:{edit:edit, sub_id:sub_id, sub_code: sub_code, sub_desc: sub_desc, num_unit: num_unit, num_hours: num_hours, sem_id:sem_id},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                    load_subject_table()    
                }
            });
        }
    });

$('#confirm_archive_subject').click(function(e){
    e.preventDefault();

        if ($('#sub_idss').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var sub_id = $('#sub_idss').val();
            var archive = 1;
            $.ajax({
                url:"actions/subject_action.php",
                method:"POST",
                data:{archive:archive, sub_id:sub_id},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                    load_subject_table();
                    $('#archive_subject').modal('hide');        
                }
            });
        }
    });



});