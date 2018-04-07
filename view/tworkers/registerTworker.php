<?php
session_start();
ob_start();
// $page_name = "Tworkers";
// define("REC_PATH", dirname(dirname(__FILE__)));
// include REC_PATH.'/includes/header.php';







$error = [];
if(array_key_exists('submit', $_POST)){
  if(doesEmailExist($econn, $_POST['email'])){
    $error['email'] = "Email Already Exist";
  }
  if(doesPhoneNumberExist($econn, $_POST['phonenumber'])){
    $error['phonenumber'] = "This Phone number has been used to Register";
  }
  if($_POST['hash'] !== $_POST['confirm_hash']){
    $error['hash'] = "Password Does Not Match";
  }
  if(empty($error)){
    $clean = array_map('trim', $_POST);
     $red = registerTworker($econn, $clean);
// die(var_dump($red));
     $hid = $red[0];
     $token = $red[1];

header("Location:tworkersVerification?hid=$hid&token=$token");



     //From email address and
            // loginTworker($econn,$clean);


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
<title>Modern an Admin Panel Category Flat Bootstarp Resposive Website Template | Register :: w3layouts</title>
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
  <?php
  // displaying error
      if(isset($error['email'])){
        $err =displayErrors($error, 'email');
        echo $err;
      }
      if(isset($error['phonenumber'])){
        $err =displayErrors($error, 'phonenumber');
        echo $err;
      }
      if(isset($error['hash'])){
        $err =displayErrors($error, 'hash');
        echo $err;
      }

       ?>
  <div class="login-logo">
    <a href="tunsehome"><img src="image/logo.png" alt=""/></a>
  </div>
  <h2 class="form-heading"><a href="tunsehome">Back To Home</a></h2>
  <h2 class="form-heading">Tworkers Registeration</h2>
  <form class="form-signin app-cam"  action="" method="post">
    <p>Enter your personal details below</p>
    <input name="surname" type="text" class="form-control1" placeholder="Surname" autofocus="" required>
    <input name="firstname" type="text" class="form-control1" placeholder="Firstname" autofocus="" required>
    <input name="middlename" type="text" class="form-control1" placeholder="Middelname" autofocus="" required>
    <input name="phonenumber" type="text" class="form-control1" placeholder="Phone Number" autofocus="" required>
    <p> Enter your account details below</p>
      <input name="email" type="text" class="form-control1" placeholder="Email" autofocus="" required>
      <input name="hash" type="password" class="form-control1" placeholder="Password" required>
      <input name="confirm_hash" type="password" class="form-control1" placeholder="Re-type Password" required>
      <label class="checkbox-custom check-success">
          <input name="term" type="checkbox" value="accept" id="checkbox1" required> <label for="checkbox1">I agree to the Terms of Service and Privacy Policy</label>
      </label>
      <button name="submit" class="btn btn-lg btn-success1 btn-block" type="submit">Submit</button>
      <div class="registration">
          Already Registered.
          <a class="" href="tworkers_login">
              Login
          </a>
      </div>
  </form>

   <div class="copy_layout login register">
      <p>Copyright &copy; 2017 Tunse. All Rights Reserved | UI Designed by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
   </div>
</body>
</html>
