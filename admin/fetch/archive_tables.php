<?php include '../../connection/connection.php'; 
include "../../connection/session.php";

if (isset($_POST['as']) && !empty($_POST['as'])) {
$sem_id = $_SESSION['sem_id'];
$ay_id = $_SESSION['ay_id'] ;
	$query = "
	  SELECT * FROM assign_subject
      INNER JOIN academic_year ON assign_subject.ay_id = academic_year.ay_id
      INNER JOIN semester ON assign_subject.sem_id = semester.sem_id
      INNER JOIN subject ON assign_subject.sub_id = subject.sub_id
      INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
      WHERE as_active = 0 AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id}
	"; ?>
<table id="datatable-buttons_as" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Subject Code</th>
          <th class="text-center">Faculty Name</th>
          <th class="text-center">Action</th>
   </thead>
   <tbody>  
  <?php
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) {
		$x = 1;
		while ($rows = mysqli_fetch_array($result)) { 	
			?>
		<tr>
           <td><?php echo $x++; ?></td>
           <td class="text-center"><?php echo $rows['sub_code'] ?></td>
           <td class="text-center"><?php echo $rows['first_name'] ?> <?php echo $rows['middle_name'] ?> <?php echo $rows['last_name'] ?></td>
           <td class="text-center">
               <button data-id="<?php echo $rows['as_id'] ?>" id="unarchive_as"  class="btn btn-sm btn-primary"><span class="fa fa-refresh"></span> Restore</button>
           </td>
        </tr>			
<?php
		}
	}else{ ?>
		<tr>
			<td colspan="4"><center>No Available Data</center></td>
		</tr>
<?php	} ?>
   </tbody>
</table>
<script type="text/javascript">
  $(document).ready(function(){
// DATA TABLE//
// TEACHER DATA TABLE //

    var vtable = $('#datatable-buttons_as').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf']
    } );

    vtable.buttons().container() 
        .appendTo( '#datatable-buttons_as_wrapper .col-sm-6:eq(0)' );

    $('#datatable-buttons_as_filter').addClass('pull-right');
    $('.dt-buttons').addClass('btn-group-sm');
// CLOSE TEACHER DATA TABLE //
  });
</script>	
<?php	
}elseif (isset($_POST['teacher']) && !empty($_POST['teacher'])) {
	$query = "SELECT * FROM faculty WHERE fac_active = 0"; ?>
<table id="datatable-buttons_fac" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Name</th>
          <th class="text-center">ID Number</th>
          <th class="text-center">Action</th>
   </thead>
   <tbody>  
<?php 
	$result = mysqli_query($conn, $query);
	$x = 1;
	if (mysqli_num_rows($result) > 0) { 
		while ($rows = mysqli_fetch_array($result)) { ?>
      <tr>
           <td><?php echo $x++; ?></td>
           <td class="text-center"><?php echo $rows['first_name'] ?> <?php echo $rows['middle_name'] ?> <?php echo $rows['last_name'] ?></td>
           <td class="text-center"><?php echo $rows['fac_ID'] ?></td>
           <td class="text-center">
            <button type="button" id="unarchive_faculty" data-id="<?php echo $rows['fac_num'] ?>" class="btn btn-sm btn-primary"><span class="fa fa-refresh"></span> Restore</button>
           </td>
      </tr>			
	<?php	
		}
	}else{ ?>
		<tr>
			<td colspan="4"><center>No Available Data</center></td>
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

    var vtable = $('#datatable-buttons_fac').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf']
    } );

    vtable.buttons().container() 
        .appendTo( '#datatable-buttons_fac_wrapper .col-sm-6:eq(0)' );

    $('#datatable-buttons_fac_filter').addClass('pull-right');
    $('.dt-buttons').addClass('btn-group-sm');
// CLOSE TEACHER DATA TABLE //
  });
</script>	 	
<?php
}elseif (isset($_POST['subject']) && !empty($_POST['subject'])) {
	$query = "SELECT * FROM subject WHERE sub_active = 0"; ?>
<table id="datatable-buttons_sub" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Subject Code</th>
          <th class="text-center">Description</th>
          <th class="text-center">Action</th>
   </thead>
   <tbody>  
<?php 
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		$x =1;
		while ($rows = mysqli_fetch_array($result)) { ?>
      <tr>
           <td><?php echo $x++; ?></td>
           <td class="text-center"><?php echo $rows['sub_code'] ?></td>
           <td class="text-center"><?php echo $rows['sub_description'] ?></td>
           <td class="text-center">
               <button data-id="<?php echo $rows['sub_id'] ?>" id="unarchive_subject"  class="btn btn-sm btn-primary"><span class="fa fa-refresh"></span> Restore</button>
           </td>           
      </tr>	
	<?php
		}
	}else{ ?>
		<tr>
			<td colspan="4"><center>No Available Data</center></td>
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

    var vtable = $('#datatable-buttons_sub').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf']
    } );

    vtable.buttons().container() 
        .appendTo( '#datatable-buttons_sub_wrapper .col-sm-6:eq(0)' );

    $('#datatable-buttons_sub_filter').addClass('pull-right');
    $('.dt-buttons').addClass('btn-group-sm');
// CLOSE TEACHER DATA TABLE //
  });
</script>	
<?php
}elseif (isset($_POST['room']) && !empty($_POST['room'])) {
	$query = "SELECT * FROM room WHERE room_active = 0 ORDER by room_id ASC"; ?>
<table id="datatable-buttons_room" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Room Name</th>
          <th class="text-center">Room Type</th>
          <th class="text-center">Action</th>
   </thead>
   <tbody>  
<?php 
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		$x =1;
		while ($rows = mysqli_fetch_array($result)) { ?>
      <tr>
           <td><?php echo $x++; ?></td>
           <td class="text-center"><?php echo $rows['room_name'] ?></td>
           <td class="text-center"><?php echo $rows['room_type'] ?></td>
           <td class="text-center">
               <button data-id="<?php echo $rows['room_id'] ?>" id="unarchive_room"  class="btn btn-sm btn-primary"><span class="fa fa-refresh"></span> Restore</button>
           </td>           
      </tr>	
	<?php
		}
	}else{ ?>
		<tr>
			<td colspan="4"><center>No Available Data</center></td>
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

    var vtable = $('#datatable-buttons_room').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf']
    } );

    vtable.buttons().container() 
        .appendTo( '#datatable-buttons_room_wrapper .col-sm-6:eq(0)' );

    $('#datatable-buttons_room_filter').addClass('pull-right');
    $('.dt-buttons').addClass('btn-group-sm');
// CLOSE TEACHER DATA TABLE //
  });
</script>	
<?php
}elseif (isset($_POST['cy']) && !empty($_POST['cy'])) {
	$query = "SELECT * FROM course_year WHERE cy_active = 0 ORDER by cy_id ASC"; ?>
<table id="datatable-buttons_cy" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Course</th>
          <th class="text-center">Year</th>
          <th class="text-center">Section</th>
          <th class="text-center">Action</th>
   </thead>
   <tbody>  
<?php 
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		$x =1;
		while ($rows = mysqli_fetch_array($result)) { ?>
      <tr>
           <td><?php echo $x++; ?></td>
           <td class="text-center"><?php echo $rows['course'] ?></td>
           <td class="text-center"><?php echo $rows['year'] ?></td>
           <td class="text-center"><?php echo $rows['section'] ?></td>
           <td class="text-center">
               <button data-id="<?php echo $rows['cy_id'] ?>" id="unarchive_cy"  class="btn btn-sm btn-primary"><span class="fa fa-refresh"></span> Restore</button>
           </td>           
      </tr>	
	<?php
		}
	}else{ ?>
		<tr>
			<td colspan="5"><center>No Available Data</center></td>
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

    var vtable = $('#datatable-buttons_cy').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf']
    } );

    vtable.buttons().container() 
        .appendTo( '#datatable-buttons_cy_wrapper .col-sm-6:eq(0)' );

    $('#datatable-buttons_cy_filter').addClass('pull-right');
    $('.dt-buttons').addClass('btn-group-sm');
// CLOSE TEACHER DATA TABLE //
  });
</script>	
<?php
}elseif (isset($_POST['semester']) && !empty($_POST['semester'])) {
	$query = "SELECT * FROM semester WHERE sem_active = 0 ORDER by sem_id ASC"; ?>
<table id="datatable-buttons_sem" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Semester</th>
          <th class="text-center">Action</th>
   </thead>
   <tbody>  
<?php 
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		$x =1;
		while ($rows = mysqli_fetch_array($result)) { ?>
      <tr>
           <td><?php echo $x++; ?></td>
           <td class="text-center"><?php echo $rows['sem_name'] ?></td>
           <td class="text-center">
               <button data-id="<?php echo $rows['sem_id'] ?>" id="unarchive_sem"  class="btn btn-sm btn-primary"><span class="fa fa-refresh"></span> Restore</button>
           </td>           
      </tr>	
	<?php
		}
	}else{ ?>
		<tr>
			<td colspan="5"><center>No Available Data</center></td>
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

    var vtable = $('#datatable-buttons_sem').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf']
    } );

    vtable.buttons().container() 
        .appendTo( '#datatable-buttons_sem_wrapper .col-sm-6:eq(0)' );

    $('#datatable-buttons_sem_filter').addClass('pull-right');
    $('.dt-buttons').addClass('btn-group-sm');
// CLOSE TEACHER DATA TABLE //
  });
</script>	
<?php
}elseif (isset($_POST['academic_year']) && !empty($_POST['academic_year'])) {
	$query = "SELECT * FROM academic_year WHERE ay_active = 0 ORDER by ay_id ASC"; ?>
<table id="datatable-buttons_ay" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Academic Year</th>
          <th class="text-center">Action</th>
   </thead>
   <tbody>  
<?php 
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		$x =1;
		while ($rows = mysqli_fetch_array($result)) { ?>
      <tr>
           <td><?php echo $x++; ?></td>
           <td class="text-center"><?php echo $rows['ay_name'] ?></td>
           <td class="text-center">
               <button data-id="<?php echo $rows['ay_id'] ?>" id="unarchive_ay"  class="btn btn-sm btn-primary"><span class="fa fa-refresh"></span> Restore</button>
           </td>           
      </tr>	
	<?php
		}
	}else{ ?>
		<tr>
			<td colspan="5"><center>No Available Data</center></td>
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

    var vtable = $('#datatable-buttons_ay').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf']
    } );

    vtable.buttons().container() 
        .appendTo( '#datatable-buttons_ay_wrapper .col-sm-6:eq(0)' );

    $('#datatable-buttons_ay_filter').addClass('pull-right');
    $('.dt-buttons').addClass('btn-group-sm');
// CLOSE TEACHER DATA TABLE //
  });
</script>	
<?php
}elseif (isset($_POST['user']) && !empty($_POST['user'])) {
  $query = "SELECT * FROM user 
LEFT JOIN faculty ON user.fac_num = faculty.fac_num
WHERE user.active = 0;" ?>

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
            <button id="unarchive_user" data-id="<?php echo $rows['user_name'] ?>" class="btn btn-sm btn-primary"><span class="fa fa-refresh"></span> Restore User</button>
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
}
?>