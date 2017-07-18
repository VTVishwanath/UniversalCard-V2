<div class="scroll">
	<table width="795" align="center" bgcolor="#1596B3">

		<tr align="center">
			<td colspan="6"><h2>View All Bill Details Here</h2></td>
		</tr>

		<tr align="center" bgcolor="skyblue">
			<th>BID</th>
			<th>Date</th>
			<th>Total amount</th>
			<th>Type</th>
			<th>UID</th>
			<th>RID</th>
			<th>Status</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
			include("./includes/db.php");
			$get_pro = "SELECT * FROM bill";
			$run_pro = mysqli_query($connection, $get_pro);

			while($row_pro = mysqli_fetch_array($run_pro)){
				$BID = $row_pro['BID'];
				$date = $row_pro['date'];
				$total_amt = $row_pro['total_amt'];
				$type = $row_pro['type'];
				$UID = $row_pro['UID'];
				$RID = $row_pro['RID'];
				$status = $row_pro['status'];
		?>
		<tr align="center">
			<td><?php echo $BID; ?></td>
			<td><?php echo $date; ?></td>
			<td><?php echo $total_amt; ?></td>
			<td><?php echo $type; ?></td>
			<td><?php echo $UID; ?></td>
			<td><?php echo $RID; ?></td>
			<td><?php echo $status; ?></td>
			<td><a href="adminhome.php?edit_bill=<?php echo $BID; ?>">Edit</a></td>
			<td><a href="adminhome.php?delete_bill=<?php echo $BID; ?>">Delete</a></td>
		</tr>
			<?php } ?>
	</table>
</div>
