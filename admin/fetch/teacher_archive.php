<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['fac_id'])) {
	$fac_id = $_POST['fac_id'];
	$query = "SELECT * FROM faculty WHERE fac_num = {$fac_id};";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
	<div class="container-fluid">
		<center><p>Are you Sure you want to Archive the data of <?php echo $row['first_name']; ?> <?php echo $row['middle_name']; ?> <?php echo $row['last_name']; ?></p></center>
		<input type="hidden" name="fac_num" id="fac_numss" class="form-control" value="<?php echo $row['fac_num']; ?>" readonly>
	</div>


<?php 
}
?>