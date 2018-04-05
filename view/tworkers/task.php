<?php
ob_start();
// $page_name = "Home";
// define("REC_PATH", dirname(dirname(__FILE__)));
// include REC_PATH.'/includes/header.php';
//
//
session_start();
authenticateTworker();
if(isset($_SESSION['t_id'])){
  $sid = $_SESSION['t_id'];
}

$getInfo = getTworker($econn, $sid);
extract($getInfo);

if(isset($_GET['updLoc'])){
  if($_GET['updLoc'] == "upt"){
    updateTworkersLocation($econn, $sid, $_POST['my_lat'], $_POST['my_long']);
  }
}

$info = getTaskInfo($econn, $_GET['id']);
extract($info);

$client_info = getUser($econn, $client_id);
extract($client_info);
$uname = ucwords($username);
$msg = "$tworkers_firstname accepted your task request";
$msg2 = "$tworkers_firstname Declined your task request";

if(isset($_GET['id'])){
  $getid = $_GET['id'];

}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Tunse|Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
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
<body onpageshow="getNofication();getNoficationCount(); updateNotif('<?php echo $getid ?>');getAcceptedTaskCount();getDeclinedTaskCount()">
<div id="wrapper">
  <input type="hidden" id="getid" name="" value="<?php echo $getid ?>">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard">User Dashboard</a>
            </div>
            <!-- /.navbar-header -->
            <?php if($tworkers_dob == NULL){?>
              To continue, Please Complete your registration <a href="c_registration">here</a>
            <?php }else{ ?>
            <p>Welcome, <?php echo $tworkers_firstname  ?></p>
            <a href="viewMap">View Location</a>
<?php }?>
            <ul class="nav navbar-nav navbar-right">
<!-- ///////////////////notification/////////////////////////////////////// -->
				<li class="dropdown">
	        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o"></i><span id="notCnt" class="badge"></span></a>
	        		<ul id="not" class="dropdown-menu">
						<!-- <li class="dropdown-menu-footer text-center">
							<a href="#">View all messages</a>
						</li> -->
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
  <!--//////////////////////////message End///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

  <!--//////////////////////////setting Start ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="image/1.png"><span class="badge">9</span></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header text-center">
							<strong>Account</strong>
						</li>
						<li class="m_2"><a href="#"><i class="fa fa-bell-o"></i> Notification <span class="label label-info" id="" ></span></a></li>


						<li class="dropdown-menu-header text-center">
							<strong>Settings</strong>
						</li>
						<li class="m_2"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
						<li class="m_2"><a href="#"><i class="fa fa-wrench"></i> Settings</a></li>
						<li class="m_2"><a href="#"><i class="fa fa-usd"></i> Payments <span class="label label-default">42</span></a></li>
						<li class="m_2"><a href="#"><i class="fa fa-file"></i> Projects <span class="label label-primary">42</span></a></li>
						<li class="divider"></li>
						<li class="m_2"><a href="#"><i class="fa fa-shield"></i> Lock Profile</a></li>
						<li class="m_2"><a href="t_logout"><i class="fa fa-lock"></i> Logout</a></li>
	        		</ul>
	      		</li>
<!--//////////////////////////setting Start ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
			</ul>
  <!--//////////////////////////side barstart ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

<?php include 'includes/tsidebar.php'; ?>
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
                      <h5><strong id="ataskNot"></strong></h5>
                      <span>Approved Tasks</span>
                    </div>
                </div>
                <input type="hidden" id="session" name="" value="<?php echo $sid  ?>">
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong id="dtaskNot"></strong></h5>
                      <span>Rejected Tasks</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-comment user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong></strong></h5>
                      <span></span>
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

                <p>You have a task request From <?php echo $uname ?>, Below are the information</p>
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
              <p><strong>User:</strong> <?php echo $uname ?></p>
              <p><strong>Task:</strong> <?php echo $task ?></p>
              <p><strong>Date:</strong> <?php echo $task_created ?></p>
              <p><strong>Time:</strong> <?php echo $time_created ?></p>
               <!-- <p><a href="#" class="tooltips" title="this one" data-original-title="Tooltip">This link</a> and <a href="#" class="tooltips" title="" data-original-title="Tooltip">that link</a> should have tooltips on hover.</p> -->
               <hr>

               <p><img src="image/pic3.jpg" style="height: 100px; width: 150px" class="img-responsive" alt="Fountain" class="img-rounded img-responsive"></p>

                           </div>
             <div class="modal-footer">
               <span>Are you available for this task?</span>
               <button onclick="updateTask('<?php echo $_GET['id'] ?>','1');redirect('myDashboard');sendNotif('<?php echo $msg2 ?>','<?php echo $hash_id ?>','<?php echo $sid ?>', '<?php echo $getid ?>', 'decline')" type="button" class="btn btn-default" >Decline</button>
               <button onclick="updateTask('<?php echo $_GET['id'] ?>','2'); sendNotif('<?php echo $msg ?>','<?php echo $hash_id ?>','<?php echo $sid ?>', '<?php echo $getid ?>', 'reply');addContact('<?php echo $sid ?>', '<?php echo $task_category ?>','<?php echo $uname ?>','<?php echo $phonenumber ?>','<?php echo $hash_id ?>', 'Client')" id="msg" type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
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



    <!--//////////////////////////mapStart ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
	  <div class="span_11">
		<div class="col-md-6 col_4">
		  <div class="map_container"><div id="vmap" style="width: 100%; height: 400px;"></div></div>

		</div>


    <!--//////////////////////////Map view End ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
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
   </div>

    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="jss/bootstrap.min.js"></script>
    <script type="text/javascript" src="jss/td_ajax.js">

    </script>

    <!-- script to get location and send to the database -->
    <script type="text/javascript" src="jss/t_ajax.js">

    </script>
</body>
</html>
