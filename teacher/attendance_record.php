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
                           <i class="pe-7s-user"></i>
                           <p>User Profile</p>
                       </a>
                   </li>
                   <li  class="active">
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
                    <a class="navbar-brand" href="#">Attendance Record</a>
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
         <div class="table-responsive">
            <div class="box-container">
              <div class="pull-right">
                  <small>Semester: <?php echo $_SESSION['sem_name']; ?> | Academic Year: <?php echo $_SESSION['ay_name']; ?></small>
              </div>
            </div>        
            
             <div class="text-center"  id="preloader" style="display: none;"><img  src="../assets/img/giphy (1).gif" style="width: 50px;"></div>
             <div id="list_of_attendance"></div>         
         </div>
       </div>
    </div>
    <!-- /main Panel -->
</div>
<?php include 'html_part/footer.php';?>
<script src="../assets/js/attendance_record_faculty.js"></script>  
