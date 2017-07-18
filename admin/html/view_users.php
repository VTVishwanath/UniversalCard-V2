<div class="scroll">
	<table width="795" align="center" bgcolor="#1596B3">

		<tr align="center">
			<td colspan="6"><h2>View All Users Here</h2></td>
		</tr>

		<tr align="center" bgcolor="skyblue">
			<th>UID</th>
			<th>Username</th>
			<th>Password</th>
			<th>Profile Photo</th>
			<th>Phone No</th>
			<th>Email</th>
			<th>Balance</th>
			<th>RFID</th>
			<th>PIN</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
			include("./includes/db.php");
			$get_pro = "SELECT * FROM user";
			$run_pro = mysqli_query($connection, $get_pro);

			while($row_pro = mysqli_fetch_array($run_pro)){
				$UID = $row_pro['UID'];
				$username = $row_pro['username'];
				$password = $row_pro['password'];
				$profile_photo = $row_pro['profile_photo'];
				$phone = $row_pro['phone'];
				$email = $row_pro['email'];
				$balance = $row_pro['balance'];
				$RFID = $row_pro['RFID'];
				$PIN = $row_pro['PIN'];
		?>
		<tr align="center">
			<td><?php echo $UID; ?></td>
			<td><?php echo $username; ?></td>
			<td><?php echo $password; ?></td>
			<td><?php echo "<img src='../../pages/user/images/profile_photo/".$profile_photo."' alt='".$username."' height='40' width='40'>"; ?></td>
			<td><?php echo $phone; ?></td>
			<td><?php echo $email; ?></td>
			<td><?php echo $balance; ?></td>
			<td><?php echo $RFID; ?></td>
			<td><?php echo $PIN; ?></td>
			<td><a href="adminhome.php?edit_user=<?php echo $UID; ?>">Edit</a></td>
			<td><a href="adminhome.php?delete_user=<?php echo $UID; ?>">Delete</a></td>
		</tr>
			<?php } ?>
	</table>
</div>
