$(document).ready(function(){
populate_assign_schedule();

	$('#update_information').click(function(e){
		e.preventDefault();
		
		if ($('#phone').val() === "" || $('#email').val() === "") {
                $.notify({
                    message: "Please Provide Required Information"
                },{
                    type: 'danger'
                });
		}else{
			var fac_num = $('#fac_num').val();
			var phone = $('#phone').val();
			var email = $('#email').val();
			var update = 1;
			
			$.ajax({
				url: 'actions/update_faculty.php',
				method: 'POST',
				data: {update:update, fac_num:fac_num, phone:phone, email:email},
				success: function(data){
	                $.notify({
	                    message: data
	                },{
	                    type: 'success'
	                });					
				}
			});
		}

	});


	function populate_assign_schedule(){
		var fac_num = $('#fac_num').val();
		$.ajax({
			url: 'fetch/fetch_data.php',
			method: 'POST',
			data: {fac_num:fac_num},
			success: function(data){
				$('#dynamic_content_schedule_view').html(data);
			}
		});
	}


});