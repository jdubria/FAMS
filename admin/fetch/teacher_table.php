<?php include '../../connection/connection.php'; 
$output = '';
if (isset($_POST['query'])) {
	
}else{
	$query = "SELECT * FROM faculty WHERE fac_active = 1 ORDER by fac_num ASC";
}
?>
<table id="datatable-buttons" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Name</th>
          <th class="text-center">ID Number</th>
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
           <td class="text-center"><?php echo $rows['first_name'] ?> <?php echo $rows['middle_name'] ?> <?php echo $rows['last_name'] ?></td>
           <td class="text-center"><?php echo $rows['fac_ID'] ?></td>
           <td class="text-center">
               <button data-toggle="modal" data-target="#view_modal" data-id="<?php echo $rows['fac_num'] ?>" id="get_faculty"  class="btn btn-sm btn-primary"><span class="fa fa-edit"></span> View & Edit</button>
           </td>
           <td class="text-center">
            <button type="button" data-toggle="modal" data-target="#archive_teacher" id="archive_faculty" data-id="<?php echo $rows['fac_num'] ?>" class="btn btn-sm btn-danger"><span class="fa fa-archive"></span> Archive</button>
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

    var table = $('#datatable-buttons').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf']
    } );

    table.buttons().container() 
        .appendTo( '#datatable-buttons_wrapper .col-sm-6:eq(0)' );

    $('#datatable-buttons_filter').addClass('pull-right');
    $('.dt-buttons').addClass('btn-group-sm');
// CLOSE TEACHER DATA TABLE //
	});
</script>
