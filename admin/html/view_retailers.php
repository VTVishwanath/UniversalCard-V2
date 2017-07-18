<div class="scroll">
	<table width="795" align="center" bgcolor="#1596B3">

		<tr align="center">
			<td colspan="6"><h2>View All Retailers Here</h2></td>
		</tr>

		<tr align="center" bgcolor="skyblue">
			<th>RID</th>
			<th>Username</th>
			<th>Password</th>
			<th>Phone No</th>
			<th>Email</th>
			<th>Balance</th>
			<th>PIN</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
			include("./includes/db.php");
			$get_pro = "SELECT * FROM retailer";
			$run_pro = mysqli_query($connection, $get_pro);

			while($row_pro = mysqli_fetch_array($run_pro)){
				$RID = $row_pro['RID'];
				$username = $row_pro['username'];
				$password = $row_pro['password'];
				$phone = $row_pro['phone'];
				$email = $row_pro['email'];
				$balance = $row_pro['balance'];
				$PIN = $row_pro['PIN'];
		?>
		<tr align="center">
			<td><?php echo $RID; ?></td>
			<td><?php echo $username; ?></td>
			<td><?php echo $password; ?></td>
			<td><?php echo $phone; ?></td>
			<td><?php echo $email; ?></td>
			<td><?php echo $balance; ?></td>
			<td><?php echo $PIN; ?></td>
			<td><a href="adminhome.php?edit_retailer=<?php echo $RID; ?>">Edit</a></td>
			<td><a href="adminhome.php?delete_retailer=<?php echo $RID; ?>">Delete</a></td>
		</tr>
			<?php } ?>
	</table>
</div>
