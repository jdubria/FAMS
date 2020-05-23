<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['sem_id'])) {
	$sem_id = $_POST['sem_id'];
	$query = "SELECT * FROM semester WHERE sem_id = {$sem_id};";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
	<div class="container-fluid">
		<center><p>Are you Sure you want to Archive <?php echo $row['sem_name'] ?></p></center>
		<input type="hidden" name="sem_ids" id="sem_idss" class="form-control" value="<?php echo $row['sem_id']; ?>">
	</div>


<?php 
}
?>