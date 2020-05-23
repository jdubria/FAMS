<?php 
include '../../connection/connection.php'; 
include 'populate_functions.php'; 

if (isset($_POST['a']) && !empty($_POST['a'])) {
	$search = $_POST['a'];
	$query = "SELECT * FROM user WHERE user.user_name LIKE '%{$search}%' AND user.active = 1;";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		echo "Already Exist";
	}else{
		echo "Accepted";
	}
}elseif (isset($_POST['fac']) && !empty($_POST['fac'])) {
	echo populate_faculty();
}elseif (isset($_POST['users']) && !empty($_POST['users'])) {
	$query = "SELECT * FROM user 
LEFT JOIN faculty ON user.fac_num = faculty.fac_num
WHERE user.active = 1;" ?>

<table id="datatable-buttons_user" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">User Name</th>
          <th class="text-center">User Level</th>
          <th class="text-center">Name</th>
          <th class="text-center">Action</th>
   </thead>
   <tbody>
<?php 
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		$x= 1;
		$ulevel = "";
		$name = "";
		while ($rows = mysqli_fetch_array($result)) { 
			if ($rows['user_level'] == 1) {
				$ulevel = "Admin";
			}elseif ($rows['user_level'] == 2) {
				$ulevel = "Student Assistant";
			}elseif ($rows['user_level'] == 3) {
				$ulevel = "Faculty";
			}

			if ($rows['fac_num'] != null) {
				$name = ''.$rows['first_name'].' '.$rows['middle_name'].' '.$rows['last_name'].'';
			}else{
				$name = "Not Applicable";
			}
			?>
      <tr>
           <td><?php echo $x++; ?></td>
           <td class="text-center"><?php echo $rows['user_name'] ?></td>
           <td class="text-center"><?php echo $ulevel; ?></td>
           <td class="text-center">
           	<?php echo $name; ?>
           </td>
           <td class="text-center">
            <button id="archive_user" data-id="<?php echo $rows['user_name'] ?>" class="btn btn-sm btn-danger"><span class="fa fa-archive"></span> Archive User</button>
           </td>
       </tr>
<?php				
			}	
	}else{ ?>
		<tr>
			<td colspan="5">No Available Data</td>
		</tr>
<?php 
	}	
?>   
   </tbody>
</table>
<script type="text/javascript">
  $(document).ready(function(){
// DATA TABLE//
// TEACHER DATA TABLE //

    var vtable = $('#datatable-buttons_user').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf']
    } );

    vtable.buttons().container() 
        .appendTo( '#datatable-buttons_user_wrapper .col-sm-6:eq(0)' );

    $('#datatable-buttons_user_filter').addClass('pull-right');
    $('.dt-buttons').addClass('btn-group-sm');
// CLOSE TEACHER DATA TABLE //
  });
</script>
<?php
}elseif (isset($_POST['user_name']) && !empty($_POST['user_name'])) {
	$user_name = $_POST['user_name'];
	$query = "UPDATE `fams`.`user` SET `active`='0' WHERE  `user_name`='{$user_name}';";

	$sql = mysqli_query($conn, $query);

	if ($sql == TRUE) {
		echo "Successfully Archived";
	}else{
		echo "No Data Archived";
	}

}elseif (isset($_POST['add']) && !empty($_POST['add'])) {
	if ($_POST['add'] == 1) {
		$user_name = $_POST['uname'];
		$password = $_POST['pass'];
		$user_level = $_POST['ulevel'];

		$query = "INSERT INTO `fams`.`user` (`user_name`, `password`, `user_level`, `active`) VALUES ('{$user_name}', MD5('{$password}'), '{$user_level}', '1');";

		$sql = mysqli_query($conn, $query);

		if ($sql == TRUE) {
			echo "Successfully Added";
		}else{
			echo "No Data Added";
		}


	}elseif ($_POST['add'] == 2) {
		$user_name = $_POST['uname'];
		$password = $_POST['pass'];
		$user_level = $_POST['ulevel'];
		$fac_num = $_POST['fac_num'];

		$query = "INSERT INTO `fams`.`user` (`user_name`, `password`, `user_level`, `fac_num`, `active`) VALUES ('{$user_name}', MD5('{$password}'), '{$user_level}', '{$fac_num}', '1');";

		$sql = mysqli_query($conn, $query);

		if ($sql == TRUE) {
			echo "Successfully Added";
		}else{
			echo "No Data Added";
		}

	}
}
?>