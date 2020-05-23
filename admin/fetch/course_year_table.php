<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['query'])) {
	
}else{
	$query = "SELECT * FROM course_year WHERE cy_active = 1 ORDER by cy_id ASC";
}
?>
<table id="datatable-buttons_cy" class="table table-bordered table-sm">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Course</th>
          <th class="text-center">Year</th>
          <th class="text-center">Section</th>
          <th class="text-center">Edit</th>
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
           <td class="text-center"><?php echo $rows['course'] ?></td>
           <td class="text-center"><?php echo $rows['year'] ?></td>
           <td class="text-center"><?php echo $rows['section'] ?></td>
           <td class="text-center">
               <button data-toggle="modal" data-target="#view_modal_cy" data-id="<?php echo $rows['cy_id'] ?>" id="get_cy"  class="btn btn-sm btn-primary"><span class="fa fa-edit"></span> View & Edit</button>
           </td>
           <td class="text-center">
            <button data-toggle="modal" data-target="#archive_cy" id="archive_course_year" data-id="<?php echo $rows['cy_id'] ?>" class="btn btn-sm btn-danger"><span class="fa fa-archive"></span> Archive</button>
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
