<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['room_id'])) {
	$room_id = $_POST['room_id'];
	$query = "SELECT * FROM room WHERE room_id = {$room_id};";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
    <div class="container-fluid">
      <div class="form-group">
          <label>Room Name</label>
          <input type="hidden" name="room_id" id="room_id" class="form-control" value="<?php echo $row['room_id']; ?>" placeholder="" required>
          <input type="text" name="room_name" id="room_names" class="form-control" value="<?php echo $row['room_name']; ?>" placeholder="" required>
      </div>
      <div class="form-group">
          <label>Room Type</label>
          <select name="room_type" id="room_types" class="form-control" placeholder="" required>
              <option selected="" value="<?php echo $row['room_type']; ?>"><?php echo $row['room_type']; ?></option>
              <option disabled>Please Select</option>
              <option value="Lecture Room">Lecture Room</option>
              <option value="Laboratory Room">Laboratory Room</option>
          </select>
      </div>  		             		 		
    </div>

<?php 
}
?>