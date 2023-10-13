<div class="row">
	<div class="col-lg-4">
	<a href="manage-products.php">
		<div class="orderCounterWell">
			<div class="well">
				<?php
				$rt = mysqli_query($con,"SELECT * FROM Products");
				$num1 = mysqli_num_rows($rt);
				{?>
				<div class="row">
					<div class="col-lg-12">
						<h3><?php echo htmlentities($num1); ?> </h3>
						<h5>Products</h5>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
<div class="col-lg-4">
	<a href="user-logs.php">
		<div class="orderCounterWell">
			<div class="well">
				<?php
				$status='Delivered';
				$ret = mysqli_query($con,"SELECT * FROM userlog");
				$num = mysqli_num_rows($ret);
				{?>
				<div class="row">
					<div class="col-lg-12">
						<h3><?php echo htmlentities($num); ?></h3>
						<h5>User Logs</h5>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
<div class="col-lg-4">
	<a href="manage-users.php">
		<div class="orderCounterWell">
			<div class="well">
				<?php
				$rt = mysqli_query($con,"SELECT * FROM users");
				$num1 = mysqli_num_rows($rt);
				{?>
				<div class="row">
					<div class="col-lg-12">
						<h3><?php echo htmlentities($num1); ?> </h3>
						<h5>Users</h5>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
</div>
 