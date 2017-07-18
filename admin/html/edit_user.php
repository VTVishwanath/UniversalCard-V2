<!DOCTYPE html>
<?php
include("./includes/db.php");
if(isset($_GET['edit_user'])){
	$get_id = $_GET['edit_user'];
	
	$get_pro = "SELECT * FROM user WHERE UID='$get_id'";
	$run_pro = mysqli_query($connection, $get_pro);
	$row_pro = mysqli_fetch_array($run_pro);
	$UID = $row_pro['UID'];
	$username = $row_pro['username'];
	$password = $row_pro['password'];
	$profile_photo = $row_pro['profile_photo'];
	$phone = $row_pro['phone'];
	$email = $row_pro['email'];
	$balance = $row_pro['balance'];
	$RFID = $row_pro['RFID'];
	$PIN = $row_pro['PIN'];
}
?>
<html>
	<head>
		<title>Update User details</title>
		<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
		<link href="../css/bttn.css" rel="stylesheet" type="text/css" media="all" />
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
	</head>
<body bgcolor="skyblue">

	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="795" border="2" bgcolor="#1596B3">
			<tr align="center">
				<td colspan="7"><h2>Edit and Update User details here</h2></td>
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
				<td align="right"><b>Profile Photo :</b></td>
				<td><img src="../../pages/user/images/profile_photo/<?php echo $profile_photo; ?>" width="50" height="50" alt="<?php echo $username; ?>">
				<td><input type="file" name="profile_photo" /></td>
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
				<td align="right"><b>RFID :</b></td>
				<td><input type="text" name="rfid" size="50" value="<?php echo $RFID; ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>PIN :</b></td>
				<td><input type="number" name="pin" size="10" value="<?php echo $PIN; ?>" maxlenght="4" minlenght="4" /></td>
			</tr>

					<input type="hidden" name="UID" size="50" value="<?php echo $UID; ?>" />

			<tr align="center">
				<td colspan="7"><input type="submit" name="update_user" class="bttn-gradient bttn-gradient bttn-royal bttn-lg" value="Update User" /></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
//getting text data from the field
if(isset($_POST['update_user'])){
	$UID = $_POST['UID'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$phone_no = $_POST['phone_no'];
	$email = $_POST['email'];
	$balance = $_POST['balance'];
	$RFID = $_POST['rfid'];
	$PIN = $_POST['pin'];

	$profile_photo = $_FILES['profile_photo']['name'];
	$tmp_name = $_FILES['profile_photo']['tmp_name'];
	$newname = time().basename($profile_photo);
	$target = "../../pages/user/images/profile_photo/".$newname;

	function generateHash($password) {
	    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
	        $salt = '$2y$12$' . substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
	        return crypt($password, $salt);
	    }
	}
	$password = generateHash($password);
	
	$insert_product = "UPDATE `user` SET username='$username',password='$password',profile_photo='$newname',phone='$phone_no',email='$email',balance='$balance',RFID='$RFID',PIN='$PIN' WHERE UID='$UID'";
	$insert_pro = mysqli_query($connection, $insert_product);
	if($insert_pro == true && move_uploaded_file($tmp_name, $target)){
		echo "<script>alert('User info has been Updated.')</script>";
		echo "<script>window.open('adminhome.php?view_users','_self')</script>";
	}else{
		echo "<script>alert('Couldn\'t Update User info')</script>";
		echo "<script>window.open('adminhome.php?view_users','_self')</script>";
	}
}
?>