<div class="scroll">
	<table width="795" align="center" bgcolor="#1596B3">

		<tr align="center">
			<td colspan="6"><h2>View All Administrators Here</h2></td>
		</tr>

		<tr align="center" bgcolor="skyblue">
			<th>AID</th>
			<th>Username</th>
			<th>Password</th>
			<th>Phone No</th>
			<th>Email</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
			include("./includes/db.php");
			$get_pro = "SELECT * FROM administrator";
			$run_pro = mysqli_query($connection, $get_pro);

			while($row_pro = mysqli_fetch_array($run_pro)){
				$AID = $row_pro['AID'];
				$username = $row_pro['username'];
				$password = $row_pro['password'];
				$phone = $row_pro['phone'];
				$email = $row_pro['email'];
		?>
		<tr align="center">
			<td><?php echo $AID; ?></td>
			<td><?php echo $username; ?></td>
			<td><?php echo $password; ?></td>
			<td><?php echo $phone; ?></td>
			<td><?php echo $email; ?></td>
			<td><a href="adminhome.php?edit_admin=<?php echo $AID; ?>">Edit</a></td>
			<td><a href="adminhome.php?delete_admin=<?php echo $AID; ?>">Delete</a></td>
		</tr>
			<?php } ?>
	</table>
</div>
