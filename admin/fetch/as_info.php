<?php include '../../connection/connection.php'; 
include "../../connection/session.php";
include 'populate_functions.php';
$output = '';
if (isset($_POST['as_id'])) {
	$as_id = $_POST['as_id'];
$sem_id = $_SESSION['sem_id'];
$ay_id = $_SESSION['ay_id'] ;  
	$query = "SELECT * FROM assign_subject
    INNER JOIN academic_year ON assign_subject.ay_id = academic_year.ay_id
    INNER JOIN semester ON assign_subject.sem_id = semester.sem_id
    INNER JOIN subject ON assign_subject.sub_id = subject.sub_id
    INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
    WHERE assign_subject.as_id = {$as_id} AND semester.sem_id ='{$sem_id}' AND academic_year.ay_id = '{$ay_id}'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
?>
    <div class="container-fluid">
              <div class="container-fluid">
                <div class="form-group">
                  <label>Faculty:</label>
                        <input type="hidden" name="as_id" id="as_id" value="<?php echo $row['as_id'] ?>">
                        <select class="form-control" id="fac_nums" name="fac_nums">
                            <option selected="<?php echo $row['fac_num'] ?>"><?php echo $row['first_name'] ?> <?php echo $row['middle_name'] ?>  <?php echo $row['last_name'] ?></option>
                            <option disabled>Select Faculty</option>
                            <?php echo populate_faculty(); ?>
                        </select>
                </div>
                <div class="form-group">
                        <label>Subject:</label>
                        <select class="form-control" id="sub_ids" name="sub_ids">
                            <option selected value="<?php echo $row['sub_id'] ?>"><?php echo $row['sub_code']; ?></option>
                            <option disabled>Choose Subject</option>
                            <?php echo populate_subject(); ?>
                        </select>
                    </div>                                  
              </div>	             		 		
    </div>

<?php 
}elseif (isset($_GET['archive']) && !empty($_GET['archive'])) {
    $as_id = $_POST['as_ids'];
    $sem_id = $_SESSION['sem_id'];
    $ay_id = $_SESSION['ay_id'] ;   
    $query = "SELECT * FROM assign_subject
              INNER JOIN academic_year ON assign_subject.ay_id = academic_year.ay_id
              INNER JOIN semester ON assign_subject.sem_id = semester.sem_id
              INNER JOIN subject ON assign_subject.sub_id = subject.sub_id
              INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
              WHERE assign_subject.as_id = {$as_id} AND semester.sem_id ='{$sem_id}' AND academic_year.ay_id = '{$ay_id}'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>

    <div class="container-fluid">
        <center><p>Are you Sure you want to Archive Assigned Subject to: <br>
        <?php echo $row['first_name'] ?> <?php echo $row['middle_name'] ?>  <?php echo $row['last_name'] ?> <br>
        The Subject:<br>    
         <?php echo $row['sub_description'] ?></p></center>
        <input type="hidden" name="as_ids" id="as_idss" class="form-control" value="<?php echo $row['as_id']; ?>">
    </div>


<?php 
}
?>
