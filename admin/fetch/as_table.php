<?php include '../../connection/connection.php'; 
include "../../connection/session.php";
$output = '';
$sem_id = $_SESSION['sem_id'];
$ay_id = $_SESSION['ay_id'] ;
if (isset($_POST['query'])) {
  
}else{
  $query = "
        SELECT * FROM assign_subject
        INNER JOIN academic_year ON assign_subject.ay_id = academic_year.ay_id
        INNER JOIN semester ON assign_subject.sem_id = semester.sem_id
        INNER JOIN subject ON assign_subject.sub_id = subject.sub_id
        INNER JOIN faculty ON assign_subject.fac_num = faculty.fac_num
        WHERE as_active = 1 AND semester.sem_id = {$sem_id} AND academic_year.ay_id = {$ay_id}
  ";
}
?>
<table id="datatable-buttons_as" class="table table-bordered">
   <thead>
          <th class="text-center">No.</th>    
          <th class="text-center">Subject Code</th>
          <th class="text-center">Faculty Name</th>
          <th class="text-center">Details and Edit</th>
          <th>Action</th>
          <th class="text-center">Assign Schedule</th>
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
           <td class="text-center"><?php echo $rows['first_name'] ?> <?php echo $rows['middle_name'] ?> <?php echo $rows['last_name'] ?></td>
           <td class="text-center">
               <button data-toggle="modal" data-target="#view_modal_asign_schedule" data-id="<?php echo $rows['as_id'] ?>" id="get_as"  class="btn btn-sm btn-primary"><span class="fa fa-edit"></span> View & Edit</button>
           </td>
           <td class="text-center">
            <button data-toggle="modal" data-target="#archive_asign_schedule_modal" id="archive_as" data-id="<?php echo $rows['as_id'] ?>" class="btn btn-sm btn-danger"><span class="fa fa-archive"></span> Archive</button>
           </td>
           <td class="text-center">
            <button data-toggle="modal" data-target="#add_assignschedule" id="a_schedule" data-id="<?php echo $rows['as_id'] ?>" class="btn btn-sm btn-primary"><span class="fa fa-plus"></span>  Assign Schedule</button>
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
