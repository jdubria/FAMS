<?php include '../../connection/connection.php'; 
include 'populate_functions.php';
$output = '';
if (isset($_POST['sub_id'])) {
	$sub_id = $_POST['sub_id'];
	$query = "SELECT * FROM subject
  INNER JOIN semester ON subject.sem_id = semester.sem_id
   WHERE sub_id = {$sub_id};";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
    <div class="container-fluid">
          <div class="form-group">
              <label>Subject Code</label>
              <input type="hidden" name="sub_id" id="sub_id" class="form-control" value="<?php echo $row['sub_id']; ?>" placeholder="" required>
              <input type="text" name="sub_code" id="sub_codes" class="form-control" value="<?php echo $row['sub_code']; ?>" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Subject Description</label>
              <input type="text" name="sub_desc" id="sub_descs" class="form-control" value="<?php echo $row['sub_description']; ?>" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Number Unit</label>
              <input type="number" name="num_unit" id="num_units" class="form-control" value="<?php echo $row['sub_unit']; ?>" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Number Hours</label>
              <input type="number" name="num_hours" id="num_hourss" value="<?php echo $row['sub_hours']; ?>" class="form-control" placeholder="" required>
          </div>
          <div class="form-group">
              <label>Semester</label>
              <select id="sem_ids" name="sem_ids" class="form-control">
                  <option  selected value="<?php echo $row['sem_id']; ?>"><?php echo $row['sem_name']; ?></option>
                  <option disabled>Please Select Semester</option>
                  <?php echo populate_semester(); ?>
              </select>
          </div> 		             		 		
    </div>

<?php 
}
?>