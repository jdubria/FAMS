<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['ay_id'])) {
	$ay_id = $_POST['ay_id'];
	$query = "SELECT * FROM academic_year WHERE ay_id = {$ay_id};";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
	<div class="container-fluid">
		<center><p>Are you Sure you want to Archive <?php echo $row['ay_name'] ?></p></center>
		<input type="hidden" name="ay_ids" id="ay_idss" class="form-control" value="<?php echo $row['ay_id']; ?>">
	</div>


<?php 
}
?>