<?php include 'html_part/header.php'; 
$fac_num = $_SESSION['fac_num'];
$query = "SELECT * FROM faculty WHERE fac_num = {$fac_num} AND fac_active = 1";
$result = mysqli_query($conn, $query);
$fetch = mysqli_fetch_assoc($result);
?>
<div class="wrapper">
    <!-- sidebar -->
        <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-4.jpg">
            <div class="sidebar-wrapper">
               <div class="logo">
                   <a href="#" class="simple-text">Teacher <b>AMS</b></a>
               </div>

               <ul class="nav">
                   <li class="active">
                       <a href="#">
                           <i class="pe-7s-user"></i>
                           <p>User Profile</p>
                       </a>
                   </li>
                   <li>
                       <a href="attendance_record.php">
                           <i class="pe-7s-news-paper"></i>
                           <p>Attendace Record</p>
                       </a>
                   </li>                                                          
               </ul>
            </div>
        </div>
    <!-- /sidebar --> 
    
    <!-- main Panel -->
    <div class="main-panel">
       <!-- topbar main panel -->
       <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Faculty Profile</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" id="log-out">
                                <p><i class="fa fa-sign-out"></i> Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
       </nav>
       <!-- /topbar main panel -->
       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Profile</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="hidden" name="fac_num" id="fac_num" value="<?php echo $fetch['fac_num'] ?>">
                                                <input type="text" class="form-control" disabled placeholder="Last Name" value="<?php echo $fetch['last_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" disabled  placeholder="First Name" value="<?php echo $fetch['first_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input type="text" disabled class="form-control" placeholder="Middle Name" value="<?php echo $fetch['middle_name'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="fa fa-phone"></span> Phone Number</label>
                                                <input type="number" id="phone" class="form-control" placeholder="+639" value="<?php echo $fetch['contact'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="fa fa-envelope"></span> Email</label>
                                                <input type="email" id="email" class="form-control" placeholder="name@email.com" value="<?php echo $fetch['email'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" id="update_information" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="../assets/img/CHMSC.jpeg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="../assets/img/faces/face-0.jpg" alt="..."/>

                                      <h4 class="title"><?php echo $fetch['first_name'] ?> <?php echo $fetch['middle_name'] ?> <?php echo $fetch['last_name'] ?><br />
                                         <p><?php echo $fetch['fac_ID'] ?></p>
                                         <small>User Name: <?php echo $_SESSION['uname'] ?></small>
                                      </h4>
                                    </a>
                                </div>
                                <hr>
                                <p class="text-center">
                                	<a href="#view_modal_assigned_schedule" data-toggle="modal" class="btn btn-sm btn-primary">
                                	View Assign Schedule
                                	</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>       	
       </div>
    </div>
    <!-- /main Panel -->
</div>
<?php include 'html_part/footer.php';
	  include 'modals/teacher_view_modal.php';	
?>
<script src="../assets/js/teacher_view.js"></script>  
