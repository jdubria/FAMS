<?php include 'html_part/header.php'; ?>                                                                
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
                           <i class="pe-7s-display1"></i>
                           <p>Dashboard</p>
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
                    <a class="navbar-brand" href="#">Dashboard-Student Assistant</a>
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
       <div class="container-fluid">
          <div class="box-container">
            <div class="pull-right">
                <small>Semester: <?php echo $_SESSION['sem_name']; ?> | Academic Year: <?php echo $_SESSION['ay_name']; ?></small>
            </div>
          </div>        
          <div class="row">
              <div class="box-container">
                <a href="check_attendance.php" class="btn btn-sm btn-primary">Check Attendance</a>
              </div>
            <div class="col-sm-7">
              <div class="table-responsive">
                <div class="text-center"  id="preloader" style="display: none;"><img  src="../assets/img/giphy (1).gif" style="width: 50px;"></div>
                <div id="list_faculty_schedule"></div>

              </div>
            </div>
            <div class="col-sm-5">
                <div class="card">
                  <div class="table-responsive">
                    <div class="text-center"  id="preloader1" style="display: none;"><img  src="../assets/img/giphy (1).gif" style="width: 50px;"></div>
                    <div id="list_time_schedule"></div>

                  </div>                   
                </div>             
            </div>
          </div>
       </div>
    </div>
    <!-- /main Panel -->
</div>
<?php include 'modals/dashboard_sa_modal.php';?>
<?php include 'html_part/footer.php';?>
<script src="../assets/js/student_dashboard.js"></script>  