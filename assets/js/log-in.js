$(document).ready(function(){

$('#log-in').click(function(){
	var uname = $('#uname').val();
	var pass = $('#pass').val();

	if (uname === "" || pass === "") {
        $.notify({
            message: "Please Provide Log-in Data"
        },{
            type: 'danger'
        });		
	}else{
		$.ajax({
			url: 'login.php',
			method: 'POSt',
			dataType: 'json',
			data: {uname:uname, pass:pass},
			success: function(data){
			
				if (data.status == 0) {
					$.notify({
			            message: data.message
			        },{
			            type: 'danger'
			        });							
				}else if(data.status == 1){
					$.notify({
			            message: data.message
			        },{
			            type: 'success'
			        });
			        location.href = 'admin/dashboard.php';
				}else if (data.status == 2) {
					$.notify({
			            message: data.message
			        },{
			            type: 'success'
			        });
			        location.href = 'student_assistant/dashboard.php';
				}else if (data.status == 3) {
					$.notify({
			            message: data.message
			        },{
			            type: 'success'
			        });
			        location.href = 'teacher/dashboard.php';
				}
			
			}
		});
	}

});	


});