$(document).ready(function(){
	load_users();

	$('#user_level').change(function(){
		var selected = $(this).children("option:selected").val();
		if (selected == 3) {
			var fac = 1;
			$.ajax({
				url: 'fetch/user_fetch.php',
				method: 'POST',
				data: {fac:fac},
				success: function(data){
					$('#teacher').html("<label>Faculty</label><select name='fac_num' id='fac_num' class='form-control'><option disabled selected>Please Select Faculty</option></select>");
					$('#fac_num').append(data);
				}
			});			
		}else{
			$('#teacher').html("");
		}
	});


	function load_users(){
		var users = 1;
		$.ajax({
			url: 'fetch/user_fetch.php',
			method: 'POST',
			data: {users:users},
			success: function(data){
				$('#result_users').html(data);
			}			
		})
	}



	$('#user_names').keyup(function(){
		var a = $(this).val();
		if (a == "") {
			$('#label').html("");
		}else{
			$.ajax({
				url: 'fetch/user_fetch.php',
				method: 'POST',
				data: {a:a},
				success: function(data){
						$('#label').html(data);
						$('#label').addClass('text-danger');						
				}
			});
		}
	});


	$(document).on('click', '#archive_user', function(e){
		var r = confirm("Do you confirm Archive of this Data?");
		if (r == true) {
			var user_name = $(this).data('id');
			$.ajax({
				url: 'fetch/user_fetch.php',
				method: 'POST',
				data: {user_name:user_name},
				success: function(data){
	                $.notify({
	                    message: data
	                },{
	                    type: 'success'
	                });
					load_users();	                					
				}
			});	
		}

	});


	$('#add_user').click(function(){
		if ($('#fac_num').length) {
			
			if ($('#user_names').val() === "" || $('#password').val() === "" || $('#user_level').val() === null || $('fac_num').val() === null) {
				    $.notify({
			            message: 'Please Provide Information'
			        },{
			            type: 'danger'
			        });				
			}else{
				var add = 2;
				var uname = $('#user_names').val();
				var pass = $('#password').val();
				var ulevel = $('#user_level').val();
				var fac_num = $('#fac_num').val();
				$.ajax({
					url: 'fetch/user_fetch.php',
					method: 'POST',
					data:{add: add, uname:uname, pass:pass, ulevel:ulevel, fac_num:fac_num},
					success: function(data){
						$.notify({
				            message: data
				        },{
				            type: 'success'
				        });
				        load_users();
				        $('#user_names').val("");
				        $('#password').val("");
				        $('#fac_num').prop('selectedIndex', 0);
				        $('#user_level').prop('selectedIndex', 0);
				        $('#label').html("");				
					}
				});
				
			}

			
		}else{
			if ($('#user_names').val() === "" || $('#password').val() === "" || $('#user_level').val() === null) {
				    $.notify({
			            message: 'Please Provide Information'
			        },{
			            type: 'danger'
			        });				
			}else{
				var add = 1;
				var uname = $('#user_names').val();
				var pass = $('#password').val();
				var ulevel = $('#user_level').val();
				$.ajax({
					url: 'fetch/user_fetch.php',
					method: 'POST',
					data:{add: add, uname:uname, pass:pass, ulevel:ulevel},
					success: function(data){
						$.notify({
				            message: data
				        },{
				            type: 'success'
				        });
				        load_users();
				        $('#user_names').val("");
				        $('#password').val("");
				        $('#user_level').prop('selectedIndex', 0);
				        $('#label').html("");					
					}
				});
			}
		}
	});



});