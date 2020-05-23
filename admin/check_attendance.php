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
                   <li>
                       <a href="room.php">
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
                    <a class="navbar-brand" href="#">Attendance Record</a>
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
           <nav aria-labelled="breadcrumb">
             <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
               <li class="breadcrumb-item active" aria-current="page"><a href="#">Check_Attendance</a></li>
             </ol>
           </nav>
        <div class="box-container">
          <div class="pull-right">
              <small>Semester: <?php echo $_SESSION['sem_name']; ?> | Academic Year: <?php echo $_SESSION['ay_name']; ?></small>
          </div>
        </div>                  
       <!-- /topbar main panel -->
       <div class="container-fluid">
          <div class="row">
            <div class="table-responsive">
               <h6>Kindly Input the Start Time of a Class</h6> 
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                 <label>Start Time</label>
                 <input type="time" name="start_time" id="start_time" class="form-control">
               </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Day</label>
                <input type="text" name="day" id="day" class="form-control">
              </div>
            </div>            
            <div class="col-sm-3">
              <div class="form-group">
                <label>Date</label>
                <input type="text" name="date" id="date" class="form-control" readonly="">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Click to Populate</label><br>
                <button type="button" class="btn btn-block btn-primary" id="filter">Populate Form</button>
              </div>
            </div>
          </div>
          <br>
          <div class="table-responsive">
            <div id="schedule_result"></div>
          </div>
       </div>
    </div>
    <!-- /main Panel -->
</div>
<?php include 'modals/check_attendance_modal.php';?>
<?php include 'html_part/footer.php';?>
<script src="../assets/js/check_attendance_faculty.js"></script>  