<!DOCTYPE html>
<?php
include("./includes/db.php");
if(isset($_GET['edit_bill'])){
	$get_id = $_GET['edit_bill'];
	
	$get_pro = "SELECT * FROM bill WHERE BID='$get_id'";
	$run_pro = mysqli_query($connection, $get_pro);
	$row_pro = mysqli_fetch_array($run_pro);
	$BID = $row_pro['BID'];
	$date = $row_pro['date'];
	$total_amt = $row_pro['total_amt'];
	$type = $row_pro['type'];
	$UID = $row_pro['UID'];
	$RID = $row_pro['RID'];
	$status = $row_pro['status'];
}
?>
<html>
	<head>
		<title>Update Bill details</title>
		<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
		<link href="../css/bttn.css" rel="stylesheet" type="text/css" media="all" />
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
	</head>
<body bgcolor="skyblue">

	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="795" border="2" bgcolor="#1596B3">
			<tr align="center">
				<td colspan="7"><h2>Edit and Update Bill details here</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Date :</b></td>
				<td><input type="text" name="date" size="50" value="<?php echo $date; ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>Total amount :</b></td>
				<td><input type="text" name="total_amt" size="10" value="<?php echo $total_amt; ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>Type :</b></td>
				<td><input type="text" name="type" size="50" value="<?php echo $type; ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>UID :</b></td>
				<td><input type="text" name="UID" size="50" value="<?php echo $UID; ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>RID :</b></td>
				<td><input type="text" name="RID" size="50" value="<?php echo $RID; ?>" /></td>
			</tr>
			<tr>
				<td align="right"><b>Status :</b></td>
				<td><input type="text" name="status" size="50" value="<?php echo $status; ?>" /></td>
			</tr>

					<input type="hidden" name="BID" size="50" value="<?php echo $BID; ?>" />

			<tr align="center">
				<td colspan="7"><input type="submit" name="update_bill" class="bttn-gradient bttn-gradient bttn-royal bttn-lg" value="Update Bill" /></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
//getting text data from the field
if(isset($_POST['update_bill'])){
	$BID = $_POST['BID'];
	$date = $_POST['date'];
	$total_amt = $_POST['total_amt'];
	$type = $_POST['type'];
	$UID = $_POST['UID'];
	$RID = $_POST['RID'];
	$status = $_POST['status'];

	$insert_product = "UPDATE `bill` SET date='$date',total_amt='$total_amt',type='$type',UID='$UID',RID='$RID',status='$status' WHERE BID='$BID'";
	$insert_pro = mysqli_query($connection, $insert_product);
	if($insert_pro == true){
		echo "<script>alert('Bill info has been Updated.')</script>";
		echo "<script>window.open('adminhome.php?manage_bill','_self')</script>";
	}else{
		echo "<script>alert('Couldn\'t Update Bill info')</script>";
		echo "<script>window.open('adminhome.php?manage_bill','_self')</script>";
	}
}
?>