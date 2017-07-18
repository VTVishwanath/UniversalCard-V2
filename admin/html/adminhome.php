<?php
session_start();
if(isset($_SESSION["adminid"])){
$adminid=$_SESSION["adminid"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
	<link href="../css/adminhome.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/bttn.css" rel="stylesheet" type="text/css" media="all" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

</head>
<body>
	<!--Main Container starts-->
	<div class="main_wrapper">
		<!--Header starts-->
		<div class="header_wrapper" align="center">
			<h1>
			<span style="color:purple;">Welcome to Admin Panel</span> <br />
			<span >Customize your settings here</span>
			</h1>
		</div>
		<!--Header ends-->

		<!--Navigation bar starts-->
		<div class="menubar">
			<!-- Menu Bar starts-->
			<ul id="menu">
				<li><a href="./adminhome.php?home" />Home</a></li>
		        <li><a href="./adminhome.php?add_admin" />Add Admin</a></li>
		        <li><a href="./adminhome.php?view_admins" />View Admins</a></li>
		        <li><a href="./adminhome.php?add_retailer" />Add Retailer</a></li>
		        <li><a href="./adminhome.php?view_retailers" />View Retailers</a></li>
		        <li><a href="./adminhome.php?add_user" />Add user</a></li>
		        <li><a href="./adminhome.php?view_users" />View users</a></li>
		        <li><a href="./adminhome.php?manage_bill" />Manage bill details</a></li>

		        <form class="logout" action="../php/logout.php" method="post">
		        	<input type="submit" name="logout" class="bttn-gradient bttn-gradient bttn-royal bttn-md" value="LogOut" />
		        </form>
			</ul>
			<!-- Menu Bar ends-->
		</div>
		<!--Navigation bar ends-->

		<!--Content wrapper starts-->
		<div class="contenet_wrapper">
			<?php
			if(isset($_GET['home'])){
				include("home.php");
			}
			if(isset($_GET['add_admin'])){
				include("add_admin.php");
			}
			if(isset($_GET['view_admins'])){
				include("view_admins.php");
			}
			if(isset($_GET['delete_admin'])){
				include("./includes/db.php");
				$AID = $_GET['delete_admin'];
				if($AID != $adminid && $AID != '1'){
						$sql = "DELETE FROM `administrator` WHERE `administrator`.`AID` = '$AID'";
						$run_sql = mysqli_query($connection, $sql);
						if($run_sql == true){
								echo "<script>alert('Admin has been deleted.')</script>";
								echo "<script>window.open('adminhome.php?view_admins','_self')</script>";
						}else{
							echo "<script>alert('Can not deleted admin.')</script>";
							echo "<script>window.open('adminhome.php?view_admins','_self')</script>";
						}
					}else{
						echo "<script>alert('Can not deleted Signed in/Default admin.')</script>";
						echo "<script>window.open('adminhome.php?view_admins','_self')</script>";
					}
			}
			if(isset($_GET['edit_admin'])){
				include("edit_admin.php");
			}
			if(isset($_GET['add_retailer'])){
				include("add_retailer.php");
			}
			if(isset($_GET['view_retailers'])){
				include("view_retailers.php");
			}
			if(isset($_GET['delete_retailer'])){
				include("./includes/db.php");
				$RID = $_GET['delete_retailer'];
				$sql = "DELETE FROM `retailer` WHERE `retailer`.`RID` = '$RID'";
				$run_sql = mysqli_query($connection, $sql);
				if($run_sql == true){
						echo "<script>alert('Retailer has been deleted.')</script>";
						echo "<script>window.open('adminhome.php?view_retailers','_self')</script>";
				}else{
					echo "<script>alert('Can not deleted Retailer.')</script>";
					echo "<script>window.open('adminhome.php?view_retailers','_self')</script>";
				}
					
			}
			if(isset($_GET['edit_retailer'])){
				include("edit_retailer.php");
			}
			if(isset($_GET['add_user'])){
				include("add_user.php");
			}
			if(isset($_GET['view_users'])){
				include("view_users.php");
			}
			if(isset($_GET['delete_user'])){
				include("./includes/db.php");
				$UID = $_GET['delete_user'];
				$sql = "DELETE FROM `user` WHERE `user`.`UID` = '$UID'";
				$run_sql = mysqli_query($connection, $sql);
				if($run_sql == true){
						echo "<script>alert('User has been deleted.')</script>";
						echo "<script>window.open('adminhome.php?view_users','_self')</script>";
				}else{
					echo "<script>alert('Can not deleted User.')</script>";
					echo "<script>window.open('adminhome.php?view_users','_self')</script>";
				}
					
			}
			if(isset($_GET['edit_user'])){
				include("edit_user.php");
			}
			if(isset($_GET['manage_bill'])){
				include("manage_bill.php");
			}
			if(isset($_GET['edit_bill'])){
				include("edit_bill.php");
			}
			if(isset($_GET['delete_bill'])){
				include("./includes/db.php");
				$BID = $_GET['delete_bill'];
				$sql = "DELETE FROM `bill` WHERE `bill`.`BID` = '$BID'";
				$run_sql = mysqli_query($connection, $sql);
				if($run_sql == true){
						echo "<script>alert('Bill has been deleted.')</script>";
						echo "<script>window.open('adminhome.php?manage_bill','_self')</script>";
				}else{
					echo "<script>alert('Can not deleted Bill.')</script>";
					echo "<script>window.open('adminhome.php?manage_bill','_self')</script>";
				}
					
			}
			?>
		</div>
		<!--Content wrapper ends-->

		<!--Footer starts-->
		<div id="footer" >
			<h2 style="text-align:center; padding-top:30px;">&copy; 2017 by www.universalcard.16mb.com All Rights Reserved</h2>
		</div>
		<!--Footer ends-->
	</div>
	<!--Main Container ends-->
</body>
</html>
<?php
} else {
  echo "<script language='Javascript'>
	location.href = '../index.php'
	</script>";
}
?>
