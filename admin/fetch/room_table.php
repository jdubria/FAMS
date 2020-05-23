<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['query'])) {
	
}else{
	$query = "SELECT * FROM room WHERE room_active = 1 ORDER by room_id ASC";
}
?>
<table id="datatable-buttons_room" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Room Name</th>
          <th class="text-center">Room Type</th>
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
           <td class="text-center"><?php echo $rows['room_name'] ?></td>
           <td class="text-center"><?php echo $rows['room_type'] ?></td>
           <td class="text-center">
               <button data-toggle="modal" data-target="#view_modal_room" data-id="<?php echo $rows['room_id'] ?>" id="get_room"  class="btn btn-sm btn-primary"><span class="fa fa-edit"></span> View & Edit</button>
           </td>
           <td class="text-center">
            <button data-toggle="modal" data-target="#archive_room" id="archive_rooms" data-id="<?php echo $rows['room_id'] ?>" class="btn btn-sm btn-danger"><span class="fa fa-archive"></span> Archive</button>
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
