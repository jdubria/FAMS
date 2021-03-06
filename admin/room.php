<?php include 'html_part/header.php'; ?>
<div class="wrapper">
    <!-- sidebar -->
        <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-4.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">Teacher <b>AMS</b></a>
                </div>

                <ul class="nav">
                    <li>
                        <a href="dashboard.php">
                            <i class="pe-7s-display1"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                   <li>
                       <a href="class_schedule.php">
                           <i class="pe-7s-note2"></i>
                           <p>Class Schedules</p>
                       </a>
                   </li>                                        
                    <li>
                       <a href="attendance_record.php">
                           <i class="pe-7s-news-paper"></i>
                           <p>Attendance Record</p>
                       </a>
                   </li>   
                    <li>
                        <a href="teachers.php">
                            <i class="pe-7s-id"></i>
                            <p>Teachers Information</p>
                        </a>
                    </li>
                   <li>
                       <a href="subject.php">
                           <i class="pe-7s-paperclip"></i>
                           <p>Manage Subject</p>
                       </a>
                   </li>
                   <li class="active">
                       <a href="#">
                           <i class="pe-7s-culture"></i>
                           <p>Manage Rooms</p>
                       </a>
                   </li>  
                    <li>
                        <a href="archives.php">
                            <i class="pe-7s-safe"></i>
                            <p>Archives</p>
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
                    <a class="navbar-brand" href="#">Manage Subject</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                      <i class="fa fa-cogs"></i>
                                      <b class="caret hidden-lg hidden-md"></b>
                                      <p class="hidden-lg hidden-md">
                                          Settings
                                          <b class="caret"></b>
                                      </p>
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a href="acad_year.php">Academic Year</a></li>
                                  <li><a href="semester.php">Semester</a></li>
                                  <li><a href="course_year.php">Course Year</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                      <i class="fa fa-users"></i>
                                      <b class="caret hidden-lg hidden-md"></b>
                                      <p class="hidden-lg hidden-md">
                                          User and Logs
                                          <b class="caret"></b>
                                      </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="users.php">Users</a></li>
                                </ul>
                            </li>      
                    </ul>

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
        <br>
        <div class="container-fluid">
          <div class="box-container">
            <div class="pull-right">
                <small>Semester: <?php echo $_SESSION['sem_name']; ?> | Academic Year: <?php echo $_SESSION['ay_name']; ?></small>
            </div>
          </div>          
           <div class="table-responsive">
                <div class="pull-right">
                    <a href="#addroom" class="btn btn-sm btn-outline-primary" data-toggle="modal" title="Print Document">
                        <span class="fa fa-plus"></span> Add Room
                    </a>                                                      
                </div>
                <br><br><br>
                <div class="text-center"  id="preloader" style="display: none;"><img  src="../assets/img/giphy (1).gif" style="width: 50px;"></div>
                <div id="room_result"></div>
           </div>
        </div>        
    </div>
    <!-- /main Panel -->
</div> 
<?php  include 'modals/room_modal.php' ?>  
<?php include 'html_part/footer.php'; ?>
<script src="../assets/js/custom_room.js"></script> 