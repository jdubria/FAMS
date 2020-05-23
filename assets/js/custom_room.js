$(document).ready(function(){
	load_rooms();

	function load_rooms(query){
        $('#preloader').show();
	    $.ajax({
	        url: "fetch/room_table.php",
	        method: "POST",
	        data:{query:query},
	        success: function(data){
                $('#preloader').hide();
	            $('#room_result').html(data);
	        }
	    });		
	}
// Save Room
    $('#save_room').click(function(){
        if ($('#room_name').val()==="" && $('#room_type').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var room_name = $('#room_name').val();
            var room_type = $('#room_type').val();

            $.ajax({
                url:"actions/add_room.php",
                method:"POST",
                data:{room_name: room_name, room_type:room_type},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
					load_rooms();
                    $('#room_name').val("");
                    $('#room_type').prop('selectedIndex', 0);
                }
            });
        }
    });
// close save rooom

//Request data for teacher edit
    $(document).on('click', '#get_room', function(e){
        e.preventDefault();

        var room_id = $(this).data('id');
        $('#dynamic_content_room').html("");
        $.ajax({ 
            url:"fetch/room_info.php",
            method: "POST",
            data: {room_id: room_id},
            success: function(data){
               // console.log(data);
               $('#dynamic_content_room').html(data);
            }
        });     
    });

    // Save subject
    $('#edit_room').click(function(){
        if ($('#room_names').val()==="" && $('#room_types').val()==="") {
                $.notify({
                    message: "Please Fill-up Form"
                },{
                    type: 'warning'
                });
        }else{
            var room_id = $('#room_id').val();
            var room_name = $('#room_names').val();
            var room_type = $('#room_types').val();

            $.ajax({
                url:"actions/edit_room.php",
                method:"POST",
                data:{room_id:room_id, room_name: room_name, room_type:room_type},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
					load_rooms();
                    $('#room_names').val("");
                    $('#room_types').prop('selectedIndex', 0);            
                }
            });
        }
    });

    $(document).on('click', '#archive_rooms', function(e){
        e.preventDefault();

        var room_id = $(this).data('id');
        $('#dynamics_content_archive_room').html("");
 
        $.ajax({ 
            url:"fetch/room_archive.php",
            method: "POST",
            data: {room_id: room_id},
            success: function(data){
               // console.log(data);
               $('#dynamics_content_archive_room').html(data);
            }
        });     
    });

$('#confirm_archive_room').click(function(e){
    e.preventDefault();

        if ($('#room_idss').val()==="") {
                $.notify({
                    message: 'Please Fill-up Form'
                },{
                    type: 'warning'
                });
        }else{
            var room_id = $('#room_idss').val();
            $.ajax({
                url:"actions/archive_room.php",
                method:"POST",
                data:{room_id:room_id},
                success:function(data){
                $.notify({
                    message: data
                },{
                    type: 'success'
                });
					load_rooms();
                    $('#archive_room').modal('hide');        
                }
            });
        }
    });        

});