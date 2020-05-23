<?php 
include 'connection/session.php';
if(!empty($_SESSION['uname'])){
    if ($_SESSION['ulevel'] == 1) {
        header("Location: admin/dashboard.php");
    }elseif ($_SESSION['ulevel'] == 2) {
        header("Location: student_assistant/dashboard.php");
    }elseif ($_SESSION['ulevel'] == 3) {
        header("Location: teacher/dashboard.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>BSIS Faculty Attendance Monitoring System</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <title>Teacher Attendance Monitoring System</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/animate.min.css" rel="stylesheet"/> <!-- Animation Lib -->
        <link href="assets/css/core.css" rel="stylesheet"/>
        <link href="assets/css/custom-log-in.css " rel="stylesheet"/>
        <!-- Core CSS -->
        <!-- Data Tables -->
        <link href="assets/css/dataTables.bootstrap.min.css">
        <link href="assets/css/buttons.bootstrap.min.css">

        <!-- /Data Tables -->
        <!-- fonts and icon -->
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
        <!-- /fonts and icon -->	
</head>
<body>
<div class="header-wrapper">
        <div class="header" style="background-image: url('assets/img/CHMSC.jpeg');">
            <div class="filter"></div>
            <div class="card">
               <div class="title-container text-center">
                    <h1>BSIS Faculty Monitoring System</h1>
                    <h4>User Log-in</h4>
                    <div class="margin">
                     <div class="row">
                         <div class="col-sm-4"></div>
                         <div class="col-sm-4">
                           <div class="form-group">
                             <label class="pull-left">User Name:</label>    
                             <input type="text" name="uname" id="uname" class="form-control">    
                           </div>
                           <div class="form-group">
                             <label class="pull-left">Password:</label>    
                             <input type="password" name="pass" id="pass" class="form-control">    
                           </div>
                           <button type="button" class="btn btn-neutral btn-block btn-fill" id="log-in">Log-in</button>                          
                         </div>
                         <div class="col-sm-4"></div>
                     </div>                     
                    </div>
               </div> 
            </div>
        </div>
</div>


</body>
        <!-- scripts -->

        <!-- core JS Scripts -->
        <!-- <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script> -->
        <script src="assets/js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="assets/js/chartist.min.js"></script> <!-- for the chart -->

        <script src="assets/js/bootstrap-notify.js"></script> <!-- Bootstrap Notification -->

        <!-- Bootstrap Table Core Script / changeable to Datatable -->
        <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

        <!-- Datatables -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/dataTables.buttons.min.js"></script>
        <script src="assets/js/buttons.bootstrap.min.js"></script>   
        <script src="assets/js/jszip.min.js"></script>   
        <script src="assets/js/pdfmake.min.js"></script>   
        <script src="assets/js/vfs_fonts.js"></script>
        <script src="assets/js/buttons.html5.min.js"></script>
        <script src="assets/js/buttons.print.min.js"></script>   
        <script src="assets/js/buttons.colVis.min.js"></script>  
        <script src="assets/js/log-in.js"></script>  
</html>
<?php 
if (isset($_GET["logout"]) && !empty($_GET["logout"])) {
    if($_GET['logout'] == 1){
        echo "<script>
        $(document).ready(function(){
            $.notify({
               message: 'You have been Log-out'
           },{
               type: 'success'
           });            
        });              
        </script>";
    }   
}elseif (isset($_GET["error"]) && !empty($_GET["error"])) {
    if($_GET['error'] == 2){
        echo "<script>
        $(document).ready(function(){
            $.notify({
               message: 'Please Log-in First'
           },{
               type: 'danger'
           });            
        });              
        </script>";
    }   
}

?>