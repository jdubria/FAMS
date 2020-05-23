<?php 
include 'connection/connection.php';
include "connection/session.php";

if (isset($_POST['uname']) && !empty($_POST['uname']) && isset($_POST['pass']) && !empty($_POST['pass'])) {

   
    $uname = stripslashes($_POST['uname']);
    $pass = stripslashes($_POST['pass']);

	$query = "SELECT * FROM user WHERE user.user_name = '{$uname}' AND user.password= MD5('{$pass}') AND user.active = 1";	
	$query1 = "SELECT * FROM active_sem_ay
	INNER JOIN semester ON active_sem_ay.sem_id = semester.sem_id
	INNER JOIN academic_year ON active_sem_ay.ay_id = academic_year.ay_id";	

	 $result = mysqli_query($conn, $query);
	 $result1 = mysqli_query($conn, $query1);

	if (mysqli_num_rows($result) > 0) {
		$get = mysqli_fetch_assoc($result);
		$fetch = mysqli_fetch_assoc($result1);
		$data = array(
			'status' => $get['user_level'], 
			'message' => 'Successfully Login' 
		);
		if ($get['fac_num'] != null) {
			$_SESSION['fac_num'] = $get['fac_num'];
		}else{
			
		}
		$_SESSION['uname'] =  $get['user_name'];
		$_SESSION['ulevel'] = $get['user_level']; 
		$_SESSION['sem_id'] = $fetch['sem_id'];
		$_SESSION['ay_id'] = $fetch['ay_id'];
		$_SESSION['sem_name'] = $fetch['sem_name'];
		$_SESSION['ay_name'] = $fetch['ay_name'];
	}else{
		$data = array(
			'status' => 0, 
			'message' => 'Invalid User' 
		);
	}


	echo json_encode($data);
}

?>
