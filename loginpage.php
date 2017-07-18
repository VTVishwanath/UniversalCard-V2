<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['uid']))
{
	header('Location: ./pages/user/user-home.php');
}
else if(isset($_SESSION['id']) && isset($_SESSION['rid']))
{
	header('Location: ./pages/retailer/retailer-home.php');
}
else if(isset($_SESSION['id']))
{
	session_unset(); // remove all session variables
	session_destroy();	// destroy the session
	echo "<script language='Javascript'>
	location.reload();
	</script>";
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
<title>Universal Card | Login</title>
<link rel="icon" href="./images/fevicon.png" type="image/gif" sizes="16x16">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Magical Login Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="./css/login-style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Text+Me+One' rel='stylesheet' type='text/css'>
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Login</h1>
		<div class="main-agileinfo">
			<div class="agileits-top"> 
				<form action="./php/login.php" method="post" enctype="multipart/form-data">
					<select class="select" name="Type" >
					  <option value="user" selected>User</option>
					  <option value="retailer">Retailer</option>
					</select>

					<input class="text" type="text" name="Username" placeholder="Username" value="<?php if(isset($_COOKIE['member_username'])) { echo $_COOKIE['member_username']; } ?>" required="">

					<input class="text" type="password" name="Password" placeholder="Password" value="<?php if(isset($_COOKIE['member_password'])) { echo $_COOKIE['member_password']; } ?>" required="">
					<div class="wthree-text"> 
						<ul> 
							<li>
								<label class="anim">
									<input type="checkbox" name="rme" class="checkbox" <?php if(isset($_COOKIE["member_username"])) { ?> checked <?php } ?> />
									<span> Remember me ?</span> 
								</label> 
							</li>
							<li><a href="./pages/forgotpass.php">Forgot password?</a> </li>
						</ul>
						<div class="clear"> </div>
					</div>
					<input type="submit" name="Submit" value="LOGIN">
				</form>
				<p>Don't have an Account? <a href="./pages/signup.php"> Signup Now!</a></p>
				<p>&#8678; <a href="./index.html">Go Back to Home</a></p>
			</div>	 
		</div>	
		<!-- copyright -->
		<div class="w3copyright-agile">
			<p>© 2017 www.universalcard.000webhostapp.com All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
		</div>
		<!-- //copyright -->
		<ul class="w3lsg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>	
	<!-- //main --> 
</body>
</html>
<?php } ?>