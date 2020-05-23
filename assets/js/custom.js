$(document).ready(function(){
	$(document).on('click', 'a#log-out', function(){
		var r = confirm("Confirm Log-out?");
		if (r == true) {
			location.href = '../log-out.php';
		}else{

		}

	});

	setInterval(function(){
		var a = 1;
		$.ajax({
			url: '../connection/check_absences_notif.php',
			method: 'POST',
			data:{a:a},
			success: function(data){
				console.log(data);
				// alert(data);
			}
		});	
	}, 10000);

});