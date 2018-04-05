<?php
ob_start();
// $page_name = "Home";
// define("REC_PATH", dirname(dirname(__FILE__)));
// include REC_PATH.'/includes/header.php';
//
//
session_start();
authenticateUser();
if(isset($_SESSION['u_id'])){
  $sid = $_SESSION['u_id'];
  $getInfo = getUser($econn, $sid);
  extract($getInfo);
}

if(isset($_GET['id'])){
  $getid = $_GET['id'];
  setReadNotification($econn, $getid );
}

$info = getTaskInfo($econn, $_GET['id']);
extract($info);

$client_info = getTworker($econn, $tworkers_id);
extract($client_info);
$uname = ucwords($tworkers_firstname);



?>
<!DOCTYPE HTML>
<html>
<head>
<title>Tunse|Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="csss/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="csss/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="csss/lines.css" rel='stylesheet' type='text/css' />
<link href="csss/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<script src="jss/jquery.min.js"></script>
<!----webfonts--->
<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'> -->
<!---//webfonts--->
<!-- Nav CSS -->
<link href="csss/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="jss/metisMenu.min.js"></script>
<script src="jss/custom.js"></script>
<!-- Graph JavaScript -->
<script src="jss/d3.v3.js"></script>
<script src="jss/rickshaw.js"></script>
</head>
<body onpageshow="getPendingTaskCount();getTaskCount(); getNofication('<?php echo $hash_id ?>');getNoficationCount('<?php echo $hash_id ?>')">
<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <input type="hidden" id="session" name="" value="<?php echo $sid ?> ">
                <a class="navbar-brand" href="dashboard">User Dashboard</a>

                <?php
                  $Username = ucfirst($username);
                  echo "Welcome, $Username";
                ?>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">



<!-- ///////////////////notification/////////////////////////////////////// -->
<li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o"></i><span id="notCnt" class="badge"></span></a>
      <ul id="showNot" class="dropdown-menu">

    <li class="dropdown-menu-footer text-center">
      <a href="#">View all messages</a>
    </li>
      </ul>
    </li>
<!-- ////////////////////////////////////////////////////////////// -->


<!-- ////////////////////////////Message////////////////////////////////// -->


<li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comments-o"></i><span class="badge" id="msgNotCnt"></span></a>
      <ul id=msgNot class="dropdown-menu">

    <!-- <li class="avatar">
      <a href="#">
        <img src="image/1.png" alt=""/>
        <div>New message</div>
        <small>1 minute ago</small>
        <span class="label label-info">NEW</span>
      </a>
    </li>
    <li class="avatar">
      <a href="#">
        <img src="image/2.png" alt=""/>
        <div>New message</div>
        <small>1 minute ago</small>
        <span class="label label-info">NEW</span>
      </a>
    </li>
    <li class="avatar">
      <a href="#">
        <img src="image/3.png" alt=""/>
        <div>New message</div>
        <small>1 minute ago</small>
      </a>
    </li>
    <li class="avatar">
      <a href="#">
        <img src="image/4.png" alt=""/>
        <div>New message</div>
        <small>1 minute ago</small>
      </a>
    </li>
    <li class="avatar">
      <a href="#">
        <img src="image/5.png" alt=""/>
        <div>New message</div>
        <small>1 minute ago</small>
      </a>
    </li>
    <li class="avatar">
      <a href="#">
        <img src="image/pic1.png" alt=""/>
        <div>New message</div>
        <small>1 minute ago</small>
      </a>
    </li>
    <li class="dropdown-menu-footer text-center">
      <a href="#">View all messages</a>
    </li> -->
      </ul>
    </li>

<!-- ////////////////////////////Message End////////////////////////////////// -->



<!--//////////////////////////setting Start ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->




			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="image/1.png"><span class="badge">9</span></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header text-center">
							<strong>Account</strong>
						</li>
						<li class="m_2"><a href="#"><i class="fa fa-bell-o"></i> Notification <span class="label label-info" id="notCnt" ></span></a></li>
						<li class="m_2"><a href="#"><i class="fa fa-tasks"></i> Pending Tasks <span class="label label-danger" id="ptaskNot"></span></a></li>
						<li class="m_2"><a href="#"><i class="fa fa-tasks"></i>Tasks <span class="label label-danger" id="taskNot"></span></a></li>

						<li class="dropdown-menu-header text-center">
							<strong>Settings</strong>
						</li>
						<li class="m_2"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
						<li class="m_2"><a href="#"><i class="fa fa-wrench"></i> Settings</a></li>
						<li class="m_2"><a href="#"><i class="fa fa-usd"></i> Payments <span class="label label-default">42</span></a></li>
						<li class="m_2"><a href="#"><i class="fa fa-file"></i> Projects <span class="label label-primary">42</span></a></li>
						<li class="divider"></li>
						<li class="m_2"><a href="#"><i class="fa fa-shield"></i> Lock Profile</a></li>
						<li class="m_2"><a href="u_logout"><i class="fa fa-lock"></i> Logout</a></li>
	        		</ul>
	      		</li>
            <!--//////////////////////////setting Start ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
			</ul>
      <!--//////////////////////////side barstart ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="dashboard"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="contact"><i class="fa fa-indent nav_icon"></i>Directory</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="message"><i class="fa fa-envelope nav_icon"></i>Messages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="u_message">inbox</a>
                                </li>
                            </ul>

                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!--//////////////////////////Side bar ends ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->



<!--//////////////////////////page start ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --><!--//////////////////////////page Start ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --><!--//////////////////////////page Start ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  --><!--//////////////////////////page Start ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->





        <div id="page-wrapper">
        <div class="graphs">
          <!--//////////////////////////Top status Nav Start ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
     	<div class="col_3">
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-thumbs-up icon-rounded"></i>
                    <div class="stats">
                      <h5><strong id="taskNot2"></strong></h5>
                      <span>Tasks</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong id="ptaskNot2"></strong></h5>
                      <span>Pending Tasks</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-comment user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>1012</strong></h5>
                      <span>New Users</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>$450</strong></h5>
                      <span>Profit Today</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>

      <!--//////////////////////////Top status Nav End ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->


      <!--//////////////////////////Body Start ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
      <div class="col_1">
        <div class="col-md-12 span_8">
           <div class="activity_box">
            <div class="scrollbar" id="style-2">
              <div class="bs-example2 bs-example-padded-bottom">

                  <p>Your task was accepted by <?php echo $uname ?>, Below are the information</p>
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
     View Details
    </button>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h2 class="modal-title">Task Detail</h2>
             </div>
             <div class="modal-body">
               <p><strong>Tworker:</strong> <?php echo $uname ?></p>
               <p><strong>Task:</strong> <?php echo $task ?></p>
               <p><strong>Date:</strong> <?php echo $task_created ?></p>
               <p><strong>Time:</strong> <?php echo $time_created ?></p>
               <!-- <p><a href="#" class="tooltips" title="this one" data-original-title="Tooltip">This link</a> and <a href="#" class="tooltips" title="" data-original-title="Tooltip">that link</a> should have tooltips on hover.</p> -->
               <hr>

               <p><img src="image/pic3.jpg" style="height: 100px; width: 150px" class="img-responsive" alt="Fountain" class="img-rounded img-responsive"></p>

                           </div>
             <div class="modal-footer">
               <span>Add Contact <?php $uname ?>?</span>

               <button onclick="addContact('<?php echo $sid ?>', '<?php echo $task_category ?>','<?php echo $uname ?>','<?php echo $tworkers_phonenumber ?>', '<?php echo $tworkers_hashid ?>', 'Tworker')"  id="msg" type="button" class="btn btn-primary" data-dismiss="modal">Add</button>
             </div>
           </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
       </div>
          </div>

              <!-- <div class="activity-row">
                   <div class="col-xs-1"><i class="fa fa-comment text-info"></i> </div>
                   <div class="col-xs-3 activity-img"><img src='image/3.png' class="img-responsive" alt=""/></div>
                   <div class="col-xs-8 activity-desc">
                    <h5><a href="#">simply random</a> liked <a href="#">passages</a></h5>
                      <p>Lorem Ipsum is simply dummy</p>
                      <h6>8:03</h6>
                   </div>
                   <div class="clearfix"> </div>
                    </div>
                    <div class="activity-row">
                   <div class="col-xs-1"><i class="fa fa-check text-info icon_11"></i></div>
                   <div class="col-xs-3 activity-img"><img src='image/1.png' class="img-responsive" alt=""/></div>
                   <div class="col-xs-8 activity-desc">
                    <h5><a href="#">standard chunk</a> liked <a href="#">model</a></h5>
                      <p>Lorem Ipsum is simply dummy</p>
                      <h6>8:03</h6>
                   </div>
                   <div class="clearfix"> </div>
                    </div>
                    <div class="activity-row1">
                   <div class="col-xs-1"><i class="fa fa-user text-info icon_12"></i></div>
                   <div class="col-xs-3 activity-img"><img src='image/4.png' class="img-responsive" alt=""/></div>
                   <div class="col-xs-8 activity-desc">
                    <h5><a href="#">perspiciatis</a> liked <a href="#">donating</a></h5>
                      <p>Lorem Ipsum is simply dummy</p>
                      <h6>8:03</h6>
                   </div>
                   <div class="clearfix"> </div>
                     </div> -->
                </div>
              </div>
        </div>

    </div>

          <!--//////////////////////////Tbody End ///////////////////////////////////////////////////////////////////////////
          ////////////////////////////////////////////////  -->
	  <div class="span_11">
		<div class="col-md-6 col_4">
		  <div class="map_container"><div id="vmap" style="width: 100%; height: 400px;"></div></div>

		</div>
		<div class="col-md-6 col_5">
		  <div id="chart_container">

	      <!-- map -->
<link href="csss/jqvmap.css" rel='stylesheet' type='text/css' />
<script src="jss/jquery.vmap.js"></script>
<script src="jss/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="jss/jquery.vmap.world.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#vmap').vectorMap({
		    map: 'world_en',
		    backgroundColor: '#333333',
		    color: '#ffffff',
		    hoverOpacity: 0.7,
		    selectedColor: '#666666',
		    enableZoom: true,
		    showTooltip: true,
		    values: sample_data,
		    scaleColors: ['#C8EEFF', '#006491'],
		    normalizeFunction: 'polynomial'
		});
	});
</script>
<!-- //map -->
       </div>
       </div>
       <div class="clearfix"> </div>
       <div class="clearfix"> </div>



		<div class="copy">
            <p>Copyright &copy; 2017 Tunse. All Rights Reserved | UI Designed by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
	    </div>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="jss/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/d_ajax.js">
</script>

    <!-- <script type="text/javascript" src="u_ajax">
    </script> -->
</body>
</html>
