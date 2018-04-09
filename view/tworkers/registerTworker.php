<?php
session_start();
ob_start();
// $page_name = "Tworkers";
// define("REC_PATH", dirname(dirname(__FILE__)));
// include REC_PATH.'/includes/header.php';

$error = [];
if(array_key_exists('submit', $_POST)){
  // die(var_dump($_POST));
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



<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Tunse| Tworkers Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Tunse">

        <meta http-equiv="x-pjax-version" content="v173">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!-- fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="asset/ico/favico-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="asset/ico/favico-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/favico-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="asset/ico/favico-57-precomposed.png">
        <link rel="shortcut icon" href="asset/ico/favico.png">
        <link rel="shortcut icon" href="asset/ico/favico.html">

        <link rel="stylesheet" href="asset/styles/9281c719.vendor.css"/>
        <link rel="stylesheet" href="asset/styles/3fc417cd.main.css"/>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
        <![endif]-->
    </head>

    <body class="animated fadeIn">

		<div class="content content-full">
			<div class="container">
				<div class="signin-wrapper">
					<div class="tab-content">


						<div class="signup tab-pane fade in active" id="signup">
							<div class="signup-brand">
								<img src="asset/images/dummy/logo2.png" alt="Sign up">
							</div>
							<h1 class="text-lead">Create an account</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, ad, sint, ea, dicta dolor nesciunt adipisci molestias molestiae ex fugit sunt quia praesentium? Deserunt atque tenetur mollitia perspiciatis doloribus sint. By creating an account you agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
							<p>Already have an account, please <a data-toggle="tab" href="#signin">Signin</a>.</p>

							<form id="signup-form" method="POST" data-validate="form" action="" role="form">
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
								<div class="row">
									<div class="col-sm-5">
                    <p>Enter your personal details below</p>
                    <div class="form-group">
                      <label class="control-label text-inverse" for="usernameUp">Surname</label>
                      <input type="text" class="form-control" name="surname" id="usernameUp" required=""  autocomplete="off">

                    <div class="form-group">
                      <label class="control-label text-inverse" for="usernameUp">Firstname</label>
                      <input type="text" class="form-control" name="firstname" id="usernameUp" required="" autocomplete="off">

                    </div>
                    <div class="form-group">
                      <label class="control-label text-inverse" for="usernameUp">Middlename</label>
                      <input type="text" class="form-control" name="middlename" id="usernameUp" required=""  autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label class="control-label text-inverse" for="usernameUp">Phonenumber</label>
                      <input type="text" class="form-control" name="phonenumber" id="usernameUp" required="" minlength="11" maxlength="11" autocomplete="off">
                    </div>
    <p> Enter your account details below</p>
                    <div class="form-group">
                      <label class="control-label text-inverse" for="emailUp">Email</label>
                      <input type="email" class="form-control" name="email" id="emailUp" required="" autocomplete="off">
                      <p class="helper-block text-muted"><small><strong>Type carefully!</strong> You will be sent a confirmation email.</small></p>
                    </div>

                    <div class="form-group">
                      <label class="control-label text-inverse" for="passwordUp">Password</label>
                      <input type="password" class="form-control" name="hash" id="passwordUp" required="" minlength="4">
                      <p class="helper-block text-muted"><small>The longer the better. Include numbers for more security.</small></p>
                    </div>

                    <div class="form-group">
                      <label class="control-label text-inverse" for="cpasswordUp">Confirm Password</label>
                      <input type="password" class="form-control" name="confirm_hash" id="cpasswordUp">
                      <p class="helper-block text-muted"><small>Enter your password again!</small></p>
                    </div>

                    <div class="form-group margin-top">
                      <div class="nice-checkbox">
                        <input class="checkbox-o" value="accept" type="checkbox" name="term" id="newsletter">
                        <label for="newsletter">Accept Terms and Conditions</label>
                      </div>
                    </div>

                    <div class="form-group form-actions">
                      <input name="submit" type="submit" class="btn btn-primary" value="Create account">
                    </div>

                  </div>

									</div>
								</div>

							</form><!--/#signup-form-->
						</div><!--/#signup-->

					</div><!--/tab-content-->

					<div class="signin-footer">
						<ul class="list-inline pull-right">
							<li><a href="#">Knowledge base</a></li>
						</ul>
						<ul class="list-inline">
							<li>&copy; 2018 Tunse</li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>

				</div><!--/signin-wapper-->

			</div><!--/container-->
		</div><!--/content-->



        <!-- javascript
        ================================================== -->
        <script src="asset/scripts/39914ff3.vendor-main.js"></script>
        <script src="asset/scripts/756399db.vendor-usefull.js"></script>
        <script src="asset/scripts/e7058f60.vendor-form.js"></script>
        <script src="asset/scripts/fc9d433c.vendor-editor.js"></script>
        <!--[if lte IE 8]>
        <script src="scripts/eae815b5.excanvas.js"></script>
        <![endif]-->
        <script src="asset/scripts/2ce1156c.vendor-graph.js"></script>
        <script src="asset/scripts/37a77790.vendor-table.js"></script>
        <script src="asset/scripts/1581b2aa.vendor-maps.js"></script>
        <script src="asset/scripts/5f4fd25b.vendor-util.js"></script>


        <!-- required stilearn template js -->
        <script src="asset/scripts/5917523f.main.js"></script>
        <!-- This scripts will be reload after pjax or if popstate event is active (use with class .re-execute) -->
        <script src="asset/scripts/89c3d6c9.initializer.js"></script>

        <script>
          (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
          function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
          e=o.createElement(i);r=o.getElementsByTagName(i)[0];
          e.src='../../../../www.google-analytics.com/analytics.js';
          r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
          ga('create','UA-71722129-1');ga('send','pageview');
        </script>

    </body>


</html>
