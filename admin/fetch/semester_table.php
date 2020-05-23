<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['query'])) {
	
}else{
	$query = "SELECT * FROM semester WHERE sem_active = 1 ORDER by sem_id ASC";
}
?>
<table id="datatable-buttons_semester" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Semester</th>
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
           <td class="text-center"><?php echo $rows['sem_name'] ?></td>
           <td class="text-center">
               <button data-toggle="modal" data-target="#view_modal_semester" data-id="<?php echo $rows['sem_id'] ?>" id="get_sem"  class="btn btn-sm btn-primary"><span class="fa fa-edit"></span> View & Edit</button>
           </td>
           <td class="text-center">
            <button data-toggle="modal" data-target="#archive_sem" id="archive_semester" data-id="<?php echo $rows['sem_id'] ?>" class="btn btn-sm btn-danger"><span class="fa fa-archive"></span> Archive</button>
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

    var vtable = $('#datatable-buttons_semester').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf']
    } );

    vtable.buttons().container() 
        .appendTo( '#datatable-buttons_semester_wrapper .col-sm-6:eq(0)' );

    $('#datatable-buttons_semester_filter').addClass('pull-right');
    $('.dt-buttons').addClass('btn-group-sm');
// CLOSE TEACHER DATA TABLE //
	});
</script>
