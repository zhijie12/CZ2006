<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Harmonious Living @ NTU v1.0</title>
    <link rel="shortcut icon" type="image/x-icon" href="IMG/logo(S).png" />
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link type="text/css" rel="stylesheet" href="css/LoginPanel.css" />
	<style>
		/* Fixed header and footer.
		* --------------------------------------- */
		#header{
			position:fixed;
			height: 60px;
			display:block;
			width: 100%;
			background: white;
			z-index:9;
			text-align:left;
			color: #f2f2f2;
			padding: 10 0 0 0;
		}

		#footer{
			position:fixed;
			height: 50px;
			display:block;
			width: 100%;
			background: white;
			z-index:9;
			text-align:left;
			color: #f2f2f2;
			padding: 10 0 0 0;
		}
		#header{
			top:0px;
		}
		#footer{
			bottom:0px;
		}
	</style>
  </head>
  <body>
      <!--Import jQuery before materialize.js-->
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js'></script>
	  <script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
	  <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<?php
		$error= $_GET['error'];
		if(!empty($error)){
			if($error=="e1"){
				echo "<script>alert('All fields are not filled up.')</script>";
			}else if($error=="e2"){
				echo "<script>alert('An account has already been created for the user.')</script>";
			}else if($error=="s1"){
				echo "<script>alert('Account has been successfully created. Please try to login with your new account.')</script>";
			}else if($error=="e3"){
				echo "<script>alert('Something went wrong.')</script>";
			}else if($error=="e4"){
				echo "<script>alert('Incorrect credentials. Please try again.')</script>";
			}
		}
	?>
	<div id="header">
		<img src="IMG/logo.png" alt="Logo" height="60px" width="230px" style="padding-left:15%;">
	</div>
	<div id="footer">Footer</div>
		<div class="container">
		<section class="background" style="width:100%px;">
		<div class="content-wrapper" style="width:100%px !important;">
		  <p class="content-title" style="top:10px;font-size:50px;">Harmonious Living @ NTU</p>
		  <p class="content-subtitle" style="font-size:15px;">Buying and selling flats can't get any easier than this.</p>
		  <p><a id="modal_trigger" href="#modal" class="btn btn_log" style="align:left;font-size:20px;padding:20px 60px;color:white;background-color: Transparent;border-style:solid;border-color: white; border-width:5px;">Login</a>
		  </p><p>
		  <a id="modal_trigger_register" href="#modal" class="btn btn_log" style="align:right;font-size:20px;padding:20px 60px;color:white;background-color: Transparent;background-color:Transparent;border-style:solid;border-color: white;border-width:5px;">Sign Up</a></p>

    </div>
	  </section>
	<!--  <section class="background">
		<div class="content-wrapper">
		  <p class="content-title">Cras lacinia non eros nec semper.</p>
		  <p class="content-subtitle">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras ut massa mattis nibh semper pretium.</p>
		</div>
	  </section>
	  <section class="background">
		<div class="content-wrapper">
		  <p class="content-title">Etiam consequat lectus.</p>
		  <p class="content-subtitle">Nullam tristique urna sed tellus ornare congue. Etiam vitae erat at nibh aliquam dapibus.</p>
		</div>
	  </section>
	</div>
	-->
	<div class="container">

	<div id="modal" class="popupContainer" style="display:none;">
		<header class="popupHeader">
			<span class="header_title">Welcome Back!</span>
		</header>
		<section class="popupBody">
			<!-- Username & Password Login form -->
			<div class="user_login">
				<form id="login_form" action="controllers/Login/validateAccountController.php" method="POST">
					<label>NRIC</label>
					<input type="text" name="nric" />
					<br />

					<label>Password</label>
					<input type="password" name="password"/>
					<br />

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last"><a href="href="javascript:{}" 
						onclick="document.getElementById('login_form').submit(); return false;" class="btn btn_red">Login</a></div>
					</div>
				</form>
				<a href="#" class="forgot_password">Forgot password?</a>
			</div>

			<!-- Register Form -->
			<div class="user_register">
				<form id="register_form" action="controllers/Login/validateCreationController.php" method="POST">
				<label>Please enter your credentials below:</label>
				<br />
					<label>NRIC</label>
					<input type="text" name="nric"/>
					<br />

					<label>Email Address</label>
					<input type="email" name="email"/>
					<br />

					<label>Password</label>
					<input type="password" name="password"/>
					<br />
					<br />

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last"><a href="href="javascript:{}" 
						onclick="document.getElementById('register_form').submit(); return false;" class="btn btn_red">Register</a>

						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>
<script src="js/index.js"></script>
<script type="text/javascript">
	$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".one_half" });
	$("#modal_trigger_register").leanModal({top : 200, overlay : 0.6, closeButton: ".back_btn" });
	
	$(function(){
		// Calling Login Form
		$("#modal_trigger").click(function(){
			$(".user_login").show();
			$(".user_register").hide();
			$(".header_title").text('Welcome Back!');
			return false;
		});

		// Calling Register Form
		$("#modal_trigger_register").click(function(){
			$(".user_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});

	})
</script>

	
 </body>
</html>
