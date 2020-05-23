<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['sem_id'])) {
	$sem_id = $_POST['sem_id'];
	$query = "SELECT * FROM semester WHERE sem_id = {$sem_id};";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
    <div class="container-fluid">
      <div class="form-group">
          <label>Semester</label>
          <input type="hidden" name="sem_id" id="sem_id" class="form-control" value="<?php echo $row['sem_id']; ?>" placeholder="" required>
          <input type="text" name="sem_name" id="sem_names" class="form-control" value="<?php echo $row['sem_name']; ?>" placeholder="" required>
      </div>  		             		 		
    </div>

<?php 
}
?>