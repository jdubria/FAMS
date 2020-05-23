<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['room_id'])) {
	$room_id = $_POST['room_id'];
	$query = "SELECT * FROM room WHERE room_id = {$room_id};";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
	<div class="container-fluid">
		<center><p>Are you Sure you want to Archive <?php echo $row['room_name'] ?></p></center>
		<input type="hidden" name="room_ids" id="room_idss" class="form-control" value="<?php echo $row['room_id']; ?>">
	</div>


<?php 
}
?>