<?php include '../../connection/connection.php'; 
include 'populate_functions.php';
$output = '';
if (isset($_POST['cy_id_view'])) {
	$cy_id = $_POST['cy_id_view'];
	$query = "SELECT * FROM course_year WHERE cy_id = {$cy_id}";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
    <div class="container-fluid">
              <div class="container-fluid">
                <div class="form-group">
                  <label>Course</label>
                        <input type="hidden" name="cy_id" id="cy_id" value="<?php echo $row['cy_id'] ?>">
                        <input type="text" name="courses" id="courses" class="form-control" placeholder="Bachelor of ..." value="<?php echo $row['course'] ?>" required>
                </div>
                    <div class="form-group">
                        <label>Year</label>
                        <select class="form-control" name="years" id="years">
                            <option selected value="<?php echo $row['year'] ?>"><?php echo $row['year'] ?></option>
                            <option disabled>Select Year</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>                
                <div class="form-group">
                        <label>Section:</label>
                        <input type="text" name="sections" id="sections" class="form-control" value="<?php echo $row['section'] ?>" placeholder="e.i. A" required>
                    </div>                                  
              </div>	             		 		
    </div>

<?php 
}elseif (isset($_GET['archive']) && !empty($_GET['archive'])) {
    $cy_id = $_POST['cy_ids'];
    $query = "SELECT * FROM course_year WHERE cy_id = {$cy_id}";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
     <div class="container-fluid">
        <center><p>Are you Sure you want to Archive: <br>
        <?php echo $row['course'] ?> <?php echo $row['year'] ?>  <?php echo $row['section'] ?> <br>
        </p></center>
        <input type="hidden" name="cy_ids" id="cy_idss" class="form-control" value="<?php echo $row['cy_id']; ?>">
    </div>
<?php    
}
?>