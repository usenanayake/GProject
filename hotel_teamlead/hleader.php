<?php session_start(); ?>
<?php //require_once('inc1/connection.php'); ?>

<?php
// Check connection
$conn=mysqli_connect('localhost','root','','trial');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM trial";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  $sql2="SELECT * FROM trial WHERE bill='1'";
  if($query2=mysqli_query($conn,$sql2)){
    $result2=mysqli_num_rows($query2);
  }
  //Create the Percentage
  function percentage($a, $b){
	  return ($a/$b)*100;
  }
  $percent=percentage($result2,$rowcount);
  
  // Free result set
  mysqli_free_result($result);
  mysqli_free_result($query2);
  }

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home Page </title>
    <!-- Our customize file -->
    <link href="css/main.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
    .progress {height: 20px;}
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>ICTER</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="hleader.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li>
                  
                  <li><a href="hmembers.php"><i class="fa fa-edit"></i> Committee Details <span class="fa fa-chevron-down"></span></a>
                  
                </li>
                  <li><a href="msaintask.php"><i class="fa fa-desktop"></i> Assigning Task <span class="fa fa-chevron-down"></span></a>
                    
                  </li>
                  <li><a href="hotelm.php"><i class="fa fa-table"></i> Committee Database<span class="fa fa-chevron-down"></span></a>
                   
                </ul>
              </div>
              
                  

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                  <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                  </ul> 
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          
          <div class="left-main">
            <div class="process">
              <div class="process" id="process-heading">
                <h3>Progess of Each Committee</h3>
              </div>    
              
              <div class="process" id="process-body">
                <h4><a href="Publicity.html"> Publicity Committee</a></h4>
                <div class="progress">
                   <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%; height: 20px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="pro">25%</div>
                   </div>
                  <h4> Sponsorship Handling Gorup</h4>
                <div class="progress">
                   <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $percent; ?>%; height: 20px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $percent; ?>%</div>
                   </div>
                  <h4> Bag Quatation </h4>
                <div class="progress">
                   <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 45%; height: 20px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">45%</div>
                   </div>
                  <h4> Food Allocation</h4>
                <div class="progress">
                   <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 55%; height: 20px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">55%</div>
                   </div>
                  <h4> Paper Handling Gorup</h4>
                <div class="progress">
                   <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 65%; height: 20px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">65%</div>
                   </div>
                  <h4>Keynote Group</h4>
                <div class="progress">
                   <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%; height: 20px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                   </div>
                  <h4> Hotel Quatation Group</h4>
                <div class="progress">
                   <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%; height: 20px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                   </div>

              </div>
            </div>
          </div>
            <div class="right-main">
              <div class="text-cal">
                        <div class="daterangepicker picker_3 xdisplay single opensright show-calendar pull-right">
                          <div class="calendar first single right" style="display: block;">
                            <div class="calendar-date">
                              <table class="table-condensed">
                                <thead>
                                  <tr>
                                    <th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i>
                                    </th>
                                    <th colspan="5" class="month">July 2017</th>
                                    <th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i>
                                    </th>
                                  </tr>
                                  <tr>
                                    <th>Su</th>
                                    <th>Mo</th>
                                    <th>Tu</th>
                                    <th>We</th>
                                    <th>Th</th>
                                    <th>Fr</th>
                                    <th>Sa</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="available off" data-title="r0c0">24</td>
                                    <td class="available off" data-title="r0c1">25</td>
                                    <td class="available off" data-title="r0c2">26</td>
                                    <td class="available off" data-title="r0c3">27</td>
                                    <td class="available off" data-title="r0c4">28</td>
                                    <td class="available" data-title="r0c5">1</td>
                                    <td class="available" data-title="r0c6">2</td>
                                  </tr>
                                  <tr>
                                    <td class="available" data-title="r1c0">3</td>
                                    <td class="available" data-title="r1c1">4</td>
                                    <td class="available" data-title="r1c2">5</td>
                                    <td class="available" data-title="r1c3">6</td>
                                    <td class="available" data-title="r1c4">7</td>
                                    <td class="available" data-title="r1c5">8</td>
                                    <td class="available" data-title="r1c6">9</td>
                                  </tr>
                                  <tr>
                                    <td class="available" data-title="r2c0">10</td>
                                    <td class="available" data-title="r2c1">11</td>
                                    <td class="available" data-title="r2c2">12</td>
                                    <td class="available" data-title="r2c3">13</td>
                                    <td class="available" data-title="r2c4">14</td>
                                    <td class="available" data-title="r2c5">15</td>
                                    <td class="available" data-title="r2c6">16</td>
                                  </tr>
                                  <tr>
                                    <td class="available" data-title="r3c0">17</td>
                                    <td class="available active start-date end-date" data-title="r3c1">18</td>
                                    <td class="available" data-title="r3c2">19</td>
                                    <td class="available" data-title="r3c3">20</td>
                                    <td class="available" data-title="r3c4">21</td>
                                    <td class="available" data-title="r3c5">22</td>
                                    <td class="available" data-title="r3c6">23</td>
                                  </tr>
                                  <tr>
                                    <td class="available" data-title="r4c0">24</td>
                                    <td class="available" data-title="r4c1">25</td>
                                    <td class="available" data-title="r4c2">26</td>
                                    <td class="available" data-title="r4c3">27</td>
                                    <td class="available" data-title="r4c4">28</td>
                                    <td class="available" data-title="r4c5">29</td>
                                    <td class="available" data-title="r4c6">30</td>
                                  </tr>
                                  <tr>
                                    <td class="available" data-title="r5c0">31</td>
                                    <td class="available off" data-title="r5c1">1</td>
                                    <td class="available off" data-title="r5c2">2</td>
                                    <td class="available off" data-title="r5c3">3</td>
                                    <td class="available off" data-title="r5c4">4</td>
                                    <td class="available off" data-title="r5c5">5</td>
                                    <td class="available off" data-title="r5c6">6</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="calendar second left" style="display: none;">
                            <div class="calendar-date">
                              <table class="table-condensed">
                                <thead>
                                  <tr>
                                    <th class="prev available"><i class="fa fa-arrow-left icon icon-arrow-left glyphicon glyphicon-arrow-left"></i>
                                    </th>
                                    <th colspan="5" class="month">Mar 2013</th>
                                    <th class="next available"><i class="fa fa-arrow-right icon icon-arrow-right glyphicon glyphicon-arrow-right"></i>
                                    </th>
                                  </tr>
                                  <tr>
                                    <th>Su</th>
                                    <th>Mo</th>
                                    <th>Tu</th>
                                    <th>We</th>
                                    <th>Th</th>
                                    <th>Fr</th>
                                    <th>Sa</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="available off" data-title="r0c0">24</td>
                                    <td class="available off" data-title="r0c1">25</td>
                                    <td class="available off" data-title="r0c2">26</td>
                                    <td class="available off" data-title="r0c3">27</td>
                                    <td class="available off" data-title="r0c4">28</td>
                                    <td class="available" data-title="r0c5">1</td>
                                    <td class="available" data-title="r0c6">2</td>
                                  </tr>
                                  <tr>
                                    <td class="available" data-title="r1c0">3</td>
                                    <td class="available" data-title="r1c1">4</td>
                                    <td class="available" data-title="r1c2">5</td>
                                    <td class="available" data-title="r1c3">6</td>
                                    <td class="available" data-title="r1c4">7</td>
                                    <td class="available" data-title="r1c5">8</td>
                                    <td class="available" data-title="r1c6">9</td>
                                  </tr>
                                  <tr>
                                    <td class="available" data-title="r2c0">10</td>
                                    <td class="available" data-title="r2c1">11</td>
                                    <td class="available" data-title="r2c2">12</td>
                                    <td class="available" data-title="r2c3">13</td>
                                    <td class="available" data-title="r2c4">14</td>
                                    <td class="available" data-title="r2c5">15</td>
                                    <td class="available" data-title="r2c6">16</td>
                                  </tr>
                                  <tr>
                                    <td class="available" data-title="r3c0">17</td>
                                    <td class="available active start-date end-date" data-title="r3c1">18</td>
                                    <td class="available" data-title="r3c2">19</td>
                                    <td class="available" data-title="r3c3">20</td>
                                    <td class="available" data-title="r3c4">21</td>
                                    <td class="available" data-title="r3c5">22</td>
                                    <td class="available" data-title="r3c6">23</td>
                                  </tr>
                                  <tr>
                                    <td class="available" data-title="r4c0">24</td>
                                    <td class="available" data-title="r4c1">25</td>
                                    <td class="available" data-title="r4c2">26</td>
                                    <td class="available" data-title="r4c3">27</td>
                                    <td class="available" data-title="r4c4">28</td>
                                    <td class="available" data-title="r4c5">29</td>
                                    <td class="available" data-title="r4c6">30</td>
                                  </tr>
                                  <tr>
                                    <td class="available" data-title="r5c0">31</td>
                                    <td class="available off" data-title="r5c1">1</td>
                                    <td class="available off" data-title="r5c2">2</td>
                                    <td class="available off" data-title="r5c3">3</td>
                                    <td class="available off" data-title="r5c4">4</td>
                                    <td class="available off" data-title="r5c5">5</td>
                                    <td class="available off" data-title="r5c6">6</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="ranges" style="display: none;">
                            <div class="range_inputs">
                              <div class="daterangepicker_start_input">
                                <label for="daterangepicker_start2">From</label>
                                <input id="daterangepicker_start2" class="input-mini" type="text" name="daterangepicker_start" value="">
                              </div>
                              <div class="daterangepicker_end_input">
                                <label for="daterangepicker_end2">To</label>
                                <input id="daterangepicker_end2" class="input-mini" type="text" name="daterangepicker_end" value="">
                              </div>
                              <button class="applyBtn btn btn-small btn-sm btn-success">Apply</button>&nbsp;
                              <button class="cancelBtn btn btn-small btn-sm btn-default">Cancel</button>
                            </div>
                          </div>
                        </div>  
              
              
              
            
            
              </div> 
                                
        </div>    
          

    
    <!-- jQuery -->
    <script src="jquery-3.2.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="bootstrap.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	<!--Progress bar-->
	
    
  </body>
</html>