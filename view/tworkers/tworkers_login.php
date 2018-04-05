<?php
ob_start();
session_start();
// $page_name = "Tworkers|Login";
// define("REC_PATH", dirname(dirname(__FILE__)));
// include REC_PATH.'/includes/header.php';


  $error = [];
  if(array_key_exists('submit', $_POST)){
    if(empty($_POST['email'])){
      $error['email'] = "Please Enter Your EMail";
    }

    if(empty($_POST['hash'])){
      $error['hash'] = "Please Enter Your Password";
    }

    if(empty($error)){
      var_dump($_POST);
      $clean = array_map('trim', $_POST);
      loginTworker($econn, $clean);

    }


  }


?>




     <!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
<link href="csss/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<script src="jss/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->
<!-- Bootstrap Core JavaScript -->
<script src="jss/bootstrap.min.js"></script>
</head>
<body id="login">
  <div class="login-logo">
    <a href="tunsehome"><img src="image/logo.png" alt=""/></a>

  </div>
  <h2 class="form-heading"><a href="tunsehome">Back To Home</a></h2>
  <h2 class="form-heading">login</h2>
  <div class="app-cam">
	  <form method="post" action="">
      <?php
      if(isset($error['email'])){
        $err =displayErrors($error, 'email');
        echo $err;
      }
      if(isset($error['hash'])){
        $err =displayErrors($error, 'hash');
        echo $err;
      }
       ?>
       <?php if(isset($_GET['msg'])){
         $msg = str_replace('_', ' ', $_GET['msg']);
       echo  "<div class=\"alert alert-danger\" role=\"alert\">
         <strong>Warning!</strong>$msg
       </div>";
       } ?>
		<input name="email" type="text" class="text" placeholder="email">
		<input name="hash" type="password"  placeholder="Password">
		<div class="submit"><input name="submit" type="submit"  value="Login"></div>
		<div class="login-social-link">
          <a href="#" class="facebook">
              Facebook
          </a>
          <a href="#" class="twitter">
              Twitter
          </a>
        </div>
		<ul class="new">
			<li class="new_left"><p><a href="#">Forgot Password ?</a></p></li>
			<li class="new_right"><p class="sign">New here ?<a href="tworkerRegistration"> Sign Up</a></p></li>
			<div class="clearfix"></div>
		</ul>
	</form>
  </div>
   <div class="copy_layout login">
      <p>Copyright &copy; 2015 Modern. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
   </div>
</body>
</html>
