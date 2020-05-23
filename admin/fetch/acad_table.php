<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['query'])) {
	
}else{
	$query = "SELECT * FROM academic_year WHERE ay_active = 1 ORDER by ay_id ASC";
}
?>
<table id="datatable-buttons_acad" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Academic Year</th>
          <th class="text-center">Details and Edit</th>
          <th>Action</th>
   </thead>
   <tbody>
<?php
      $x=1;
      $result = mysqli_query($conn, $query);
      while ($rows = mysqli_fetch_array($result)) {
?>        
      <tr>
           <td><?php echo $x++; ?></td>
           <td class="text-center"><?php echo $rows['ay_name'] ?></td>
           <td class="text-center">
               <button data-toggle="modal" data-target="#view_modal_ay" data-id="<?php echo $rows['ay_id'] ?>" id="get_ay"  class="btn btn-sm btn-primary"><span class="fa fa-edit"></span> View & Edit</button>
           </td>
           <td class="text-center">
            <button data-toggle="modal" data-target="#archive_ay" id="archive_acad_year" data-id="<?php echo $rows['ay_id'] ?>" class="btn btn-sm btn-danger"><span class="fa fa-archive"></span> Archive</button>
           </td>           
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

    var vtable = $('#datatable-buttons_acad').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf']
    } );

    vtable.buttons().container() 
        .appendTo( '#datatable-buttons_acad_wrapper .col-sm-6:eq(0)' );

    $('#datatable-buttons_acad_filter').addClass('pull-right');
    $('.dt-buttons').addClass('btn-group-sm');
// CLOSE TEACHER DATA TABLE //
	});
</script>
