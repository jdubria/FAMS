<?php
include 'functions.php';
include '../../connection/connection.php'; 


if (isset($_POST['fac_num']) && !empty($_POST['fac_num'])) {
	$fac_num = $_POST['fac_num'];
	echo populate_individual_schedule($fac_num);
}
?>