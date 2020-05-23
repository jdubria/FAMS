<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['fac_id'])) {
	$fac_id = $_POST['fac_id'];
	$query = "SELECT * FROM faculty WHERE fac_num = {$fac_id};";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
    <div class="container-fluid">
    	<div class="form-group">
    		<label>Faculty ID:</label>
    		<input type="text" name="fac_id" id="fac_ids" class="form-control" value="<?php echo $row['fac_ID']; ?>" readonly>
    		<input type="hidden" name="fac_num" id="fac_nums" class="form-control" value="<?php echo $row['fac_num']; ?>" readonly>
    	</div>
    	<div class="form-group">
    		<label>Last Name:</label>
    		<input type="text" name="last_name" id="last_names" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="e.i. Dela Cruz" required>
    	</div>
    	<div class="form-group">
    		<label>First Name:</label>
    		<input type="text" name="first_name" id="first_names" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="e.i. Juan" required>
    	</div>
    	<div class="form-group">
    		<label>Middle Name:</label>
    		<input type="text" name="middle_name" id="middle_names" class="form-control" value="<?php echo $row['middle_name']; ?>" placeholder="e.i. Filipe" required>
    	</div>
    	<div class="form-group">
    		<label>Date of Birth</label>
    		<input type="date" name="date_of_birth" id="date_of_births" class="form-control" value="<?php echo $row['date_of_birth']; ?>" required>
    	</div>
    	<div class="form-group">
    		<label>Contact</label>
    		<input type="number" name="contact" id="contacts" class="form-control" value="<?php echo $row['contact']; ?>" value="+639" maxlength="14" required>
    	</div>
    	<div class="form-group">
    		<label>Email</label>
    		<input type="email" name="email" id="emails" class="form-control" value="<?php echo $row['email']; ?>" placeholder="name@email.com" required>
    	</div>             		             		 		
    </div>	

<?php
}
?>