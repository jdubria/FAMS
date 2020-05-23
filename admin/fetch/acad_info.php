<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['ay_id'])) {
	$ay_id = $_POST['ay_id'];
	$query = "SELECT * FROM academic_year WHERE ay_id = {$ay_id};";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
    <div class="container-fluid">
      <div class="form-group">
          <label>Room Name</label>
          <input type="hidden" name="ay_id" id="ay_id" class="form-control" value="<?php echo $row['ay_id']; ?>" placeholder="" required>
          <input type="text" name="ay_name" id="ay_names" class="form-control" value="<?php echo $row['ay_name']; ?>" placeholder="" required>
      </div>  		             		 		
    </div>

<?php 
}


?>