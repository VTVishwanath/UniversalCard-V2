<!DOCTYPE html>
<?php
include("./includes/db.php");
?>
<html>
	<head>
		<title>Add a new Retailer</title>
		<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
		<link href="../css/bttn.css" rel="stylesheet" type="text/css" media="all" />
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
	</head>
<body bgcolor="skyblue">

	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="795" border="2" bgcolor="#1596B3">
			<tr align="center">
				<td colspan="7"><h2>Add New Retailer here</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Username :</b></td>
				<td><input type="text" name="username" size="50" required="" /></td>
			</tr>
			<tr>
				<td align="right"><b>Password :</b></td>
				<td><input type="password" name="password" size="50" required="" /></td>
			</tr>
			<tr>
				<td align="right"><b>Phone No :</b></td>
				<td><input type="text" name="phone_no" size="10" required="" /></td>
			</tr>
			<tr>
				<td align="right"><b>Email ID :</b></td>
				<td><input type="text" name="email" size="50" required="" /></td>
			</tr>
			<tr>
				<td align="right"><b>Balance :</b></td>
				<td><input type="number" name="balance" size="10" required="" min="0" minlength="1" maxlength="6" /></td>
			</tr>
			<tr>
				<td align="right"><b>PIN :</b></td>
				<td><input type="number" name="pin" size="10" required="" maxlength="4" minlength="4" /></td>
			</tr>
			<tr align="center">
				<td colspan="7"><input type="submit" name="add_retailer" class="bttn-gradient bttn-gradient bttn-royal bttn-lg" value="Add Retailer" /></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
//getting text data from the field
if(isset($_POST['add_retailer'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$phone_no = $_POST['phone_no'];
	$email = $_POST['email'];
	$balance = $_POST['balance'];
	$PIN = $_POST['pin'];
	
	function generateHash($password) {
	    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
	        $salt = '$2y$12$' . substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
	        return crypt($password, $salt);
	    }
	}
	$password = generateHash($password);

	$insert_product = "INSERT INTO `retailer` (`RID`, `username`, `password`, `phone`, `email` , `balance` , `PIN`) VALUES (NULL, '$username', '$password', '$phone_no', '$email' , '$balance' , '$PIN')";
	$insert_pro = mysqli_query($connection, $insert_product);
	if($insert_pro == true){
		echo "<script>alert('Retailer has been added.')</script>";
		echo "<script>window.open('adminhome.php?add_retailer','_self')</script>";
	}else{
		echo "<script>alert('Couldn\'t add Retailer')</script>";
		echo "<script>window.open('adminhome.php?add_retailer','_self')</script>";
	}
}
?>