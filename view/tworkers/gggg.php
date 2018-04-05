<?php


session_start();
if(isset($_SESSION['t_id'])){
  $sid = $_SESSION['t_id'];
}
$getInfo = getTworker($econn, $sid);
extract($getInfo);

$error = [];
if(array_key_exists('submit', $_POST)){

if(empty($_POST['dob'])){
$error['dob']= "Please Enter you Date of Birth";
}
if(empty($_POST['state'])){
$error['state']= "Please Enter your State";
}
if(empty($_POST['lga'])){
$error['lga']= "Please Enter your Local Government";
}
if(empty($_POST['address'])){
$error['address']= "Please Enter you Address";
}
if(empty($_POST['description'])){
  $error['description']= "Please Enter Descrip;tion of your Skill";
}

if(empty($error)){
  $clean = array_map('trim', $_POST);

completeRegistration($econn, $clean, $sid);
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TUNSE|Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style2.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body id="login">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style2.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body id="login">
  <div class="login-logo">
    <a href="tworkers"><img src="images/logo.png" alt=""/></a>
  </div>
  <h2 class="form-heading"><a href="tunsehome">Back To Home</a></h2>
  <h2 class="form-heading">Register</h2>


  Welcome, <?php echo $tworkers_firstname  ?>
  <hr>

    <form class="form-signin app-cam"  action="c_registration" method="POST">
      <h1>Complete Registration</h1>
      <input type="date" name="dob" value="" placeholder="Date Of Birth"><hr>
      <!-- <input type="text"  name="state" value="" placeholder="State"><hr> -->
      <select onchange="getlga(this.value)" class="" id='stateid' name="state">
        <option value="">--Select State</option>
        <?php getState($iconn); ?>
      </select>

      <select  class=""  name="skill">
        <option value="">--Select Skill</option>
        <?php getSkill($econn); ?>
      </select>

      <select id="lga" name="lga">
      </select><hr>
      <textarea name="address" rows="8" cols="80" placeholder="Address"></textarea>
      <textarea name="description" rows="8" cols="80" placeholder="Description"></textarea>
      <input type="submit" name="submit" value="Submit">
    </form>

<script type="text/javascript" src="c_ajax">
</script>
<div class="copy_layout login register">
   <p>Copyright &copy; 2015 Modern. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>
</body>
</html>
