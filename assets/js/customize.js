// <!-- Realtime Notification Purposes -->

//     $(document).ready(function(){

//         demo.initChartist();

//         $.notify({
//             icon: 'pe-7s-gift',
//             message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

//         },{
//             type: 'info',
//             timer: 4000
//         });

//     });
// <!-- Realtime Notification Purposes -->
$(document).ready(function() {
    load_teacher_table();

// LOAD TABLE
    function load_teacher_table(query){
        $('#preloader').show();
        $.ajax({
            url:"fetch/teacher_table.php",
            method:"POST",
            data:{query:query},
            success: function(data){
                $('#preloader').hide();
                $('#result').html(data);
            }
        });
    }

 
// SAVE TEACHER

    $('#save_teacher').click(function(){
        if ($('last_name').val()==="" && $('first_name').val()==="" && $('middle_name').val()==="" && $('date_of_birth').val()==="" && $('contact').val()==="" && $('email').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'Warning'
                });
        }else{
            var last_name = $('#last_name').val();
            var first_name = $('#first_name').val();
            var middle_name = $('#middle_name').val();
            var date_of_birth = $('#date_of_birth').val();
            var contact = $('#contact').val();
            var email = $('#email').val();
            $.ajax({
                url:"actions/add_faculty.php",
                method:"POST",
                data:{last_name: last_name, first_name: first_name, middle_name: middle_name, date_of_birth: date_of_birth, contact: contact, email: email},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                    load_teacher_table()
                    $('#last_name').val("");
                    $('#first_name').val("");
                    $('#middle_name').val("");
                    $('#date_of_birth').val("");
                    $('#contact').val("+639");
                    $('#email').val("");            
                }
            });
        }
    });
//  CLOSE SAVE TEACHER


//Request data for teacher edit
    $(document).on('click', '#get_faculty', function(e){
        e.preventDefault();

        var fac_id = $(this).data('id');
        $('#dynamic_content').html("");
        $.ajax({ 
            url:"fetch/teacher_info.php",
            method: "POST",
            data: {fac_id: fac_id},
            success: function(data){
               // console.log(data);
               $('#dynamic_content').html(data);
            }
        });     
    });

// Request data for Archive

    $(document).on('click', '#archive_faculty', function(e){
        e.preventDefault();

        var fac_id = $(this).data('id');
        $('#dynamics_content').html("");
        $.ajax({ 
            url:"fetch/teacher_archive.php",
            method: "POST",
            data: {fac_id: fac_id},
            success: function(data){
               // console.log(data);
               $('#dynamics_content').html(data);
            }
        });     
    });



// Edit teacher

$('#edit_teacher').click(function(){
        if ($('last_name').val()==="" && $('first_name').val()==="" && $('middle_name').val()==="" && $('date_of_birth').val()==="" && $('contact').val()==="" && $('email').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var fac_num = $('#fac_nums').val();
            var last_name = $('#last_names').val();
            var first_name = $('#first_names').val();
            var middle_name = $('#middle_names').val();
            var date_of_birth = $('#date_of_births').val();
            var contact = $('#contacts').val();
            var email = $('#emails').val();
            $.ajax({
                url:"actions/edit_faculty.php",
                method:"POST",
                data:{fac_num:fac_num, last_name: last_name, first_name: first_name, middle_name: middle_name, date_of_birth: date_of_birth, contact: contact, email: email},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                    load_teacher_table()
                    $('#view_modal').close();          
                }
            });
        }
    });

$('#archive_teachers').click(function(e){
    e.preventDefault();

        if ($('#fac_numss').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var fac_num = $('#fac_numss').val();
            $.ajax({
                url:"actions/archive_faculty.php",
                method:"POST",
                data:{fac_num:fac_num},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
                    load_teacher_table()
                    $('#archive_teacher').modal('hide');        
                }
            });
        }
    });

} );        