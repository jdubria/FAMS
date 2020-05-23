<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['query'])) {
	
}else{
	$query = "SELECT * FROM subject
INNER JOIN semester ON subject.sem_id = semester.sem_id
WHERE sub_active = 1 
ORDER by sub_id ASC";
}
?>
<table id="datatable-buttons_subject" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Subject Code</th>
          <th class="text-center">Description</th>
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
           <td class="text-center"><?php echo $rows['sub_code'] ?></td>
           <td class="text-center"><?php echo $rows['sub_description'] ?></td>
           <td class="text-center">
               <button data-toggle="modal" data-target="#view_modal_subject" data-id="<?php echo $rows['sub_id'] ?>" id="get_subject"  class="btn btn-sm btn-primary"><span class="fa fa-edit"></span> View & Edit</button>
           </td>
           <td class="text-center">
            <button data-toggle="modal" data-target="#archive_subject" id="archive_sub" data-id="<?php echo $rows['sub_id'] ?>" class="btn btn-sm btn-danger"><span class="fa fa-archive"></span> Archive</button>
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

    var vtable = $('#datatable-buttons_subject').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf']
    } );

    vtable.buttons().container() 
        .appendTo( '#datatable-buttons_subject_wrapper .col-sm-6:eq(0)' );

    $('#datatable-buttons_subject_filter').addClass('pull-right');
    $('.dt-buttons').addClass('btn-group-sm');
// CLOSE TEACHER DATA TABLE //
	});
</script>
