<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['sub_id'])) {
	$sub_id = $_POST['sub_id'];
	$query = "SELECT * FROM subject WHERE sub_id = {$sub_id};";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
	<div class="container-fluid">
		<center><p>Are you Sure you want to Archive Subject <?php echo $row['sub_description'] ?></p></center>
		<input type="hidden" name="sub_ids" id="sub_idss" class="form-control" value="<?php echo $row['sub_id']; ?>">
	</div>


<?php 
}
?>