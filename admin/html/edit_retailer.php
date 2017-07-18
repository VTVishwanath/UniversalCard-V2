<!DOCTYPE html>
<?php
include("./includes/db.php");
if(isset($_GET['edit_retailer'])){
	$get_id = $_GET['edit_retailer'];
	
	$get_pro = "SELECT * FROM retailer WHERE RID='$get_id'";
	$run_pro = mysqli_query($connection, $get_pro);
	$row_pro = mysqli_fetch_array($run_pro);
	$RID = $row_pro['RID'];
	$username = $row_pro['username'];
	$password = $row_pro['password'];
	$phone = $row_pro['phone'];
	$email = $row_pro['email'];
	$balance = $row_pro['balance'];
	$PIN = $row_pro['PIN'];
}
?>
<html>
	<head>
		<title>Update Retailer details</title>
		<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
		<link href="../css/bttn.css" rel="stylesheet" type="text/css" media="all" />
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
	</head>
<body bgcolor="skyblue">

	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="795" border="2" bgcolor="#1596B3">
			<tr align="center">
				<td colspan="7"><h2>Edit and Update Retailer details here</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Username:</b></td>
				<td><input type="text" name="username" size="50" value="<?php echo $username; ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>Password :</b></td>
				<td><input type="text" name="password" size="50" value="<?php echo $password; ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>Phone No :</b></td>
				<td><input type="text" name="phone_no" size="10" value="<?php echo $phone; ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>Email ID :</b></td>
				<td><input type="text" name="email" size="50" value="<?php echo $email; ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>Balance :</b></td>
				<td><input type="number" name="balance" size="10" value="<?php echo $balance; ?>" min="0" maxlenght="6" minlenght="1" /></td>
			</tr>
			<tr>
				<td align="right"><b>PIN :</b></td>
				<td><input type="number" name="pin" size="10" value="<?php echo $PIN; ?>" maxlenght="4" minlenght="4" /></td>
			</tr>

					<input type="hidden" name="RID" size="50" value="<?php echo $RID; ?>" />

			<tr align="center">
				<td colspan="7"><input type="submit" name="update_retailer" class="bttn-gradient bttn-gradient bttn-royal bttn-lg" value="Update retailer" /></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
//getting text data from the field
if(isset($_POST['update_retailer'])){
	$RID = $_POST['RID'];
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
	
	$insert_product = "UPDATE `retailer` SET username='$username',password='$password',phone='$phone_no',email='$email',balance='$balance',PIN='$PIN' WHERE RID='$RID'";
	$insert_pro = mysqli_query($connection, $insert_product);
	if($insert_pro == true){
		echo "<script>alert('Retailer info has been Updated.')</script>";
		echo "<script>window.open('adminhome.php?view_retailers','_self')</script>";
	}else{
		echo "<script>alert('Couldn\'t Update Retailer info')</script>";
		echo "<script>window.open('adminhome.php?view_retailers','_self')</script>";
	}
}
?>