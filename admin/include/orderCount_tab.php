<div class="row">
	<div class="col-lg-4">
	<a href="todays-orders.php">
		<div class="orderCounterWell">
			<div class="well">
				<?php
				$f1="00:00:00";
				$from=date('Y-m-d')." ".$f1;
				$t1="23:59:59";
				$to=date('Y-m-d')." ".$t1;
				$result = mysqli_query($con,"SELECT * FROM Orders where orderDate Between '$from' and '$to'");
				$num_rows1 = mysqli_num_rows($result);
				{
				?>
				<div class="row">
					<div class="col-lg-12">
						<h3><?php echo htmlentities($num_rows1); ?></h3>
						<h5>Today's Orders</h5>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
<div class="col-lg-4">
	<a href="pending-orders.php">
		<div class="orderCounterWell">
			<div class="well">
				<?php
				$status='Delivered';
				$ret = mysqli_query($con,"SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
				$num = mysqli_num_rows($ret);
				{?>
				<div class="row">
					<div class="col-lg-12">
						<h3><?php echo htmlentities($num); ?></h3>
						<h5>Pending Orders</h5>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
<div class="col-lg-4">
	<a href="delivered-orders.php">
		<div class="orderCounterWell">
			<div class="well">
				<?php
					$status='Delivered';
				$rt = mysqli_query($con,"SELECT * FROM Orders where orderStatus='$status'");
				$num1 = mysqli_num_rows($rt);
				{?>
				<div class="row">
					<div class="col-lg-12">
						<h3><?php echo htmlentities($num1); ?> </h3>
						<h5>Delivered Orders</h5>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
</div>
<style type="text/css">
	a .orderCounterWell .well
	{
		color: white;
	}
	.orderCounterWell .well
	{
		background-color: #00bcd2;
		text-align: center;
		border-radius: 5px;
		padding: 0px;
	}
	.orderCounterWell .well h4
	{
		margin: 0px;
	}
</style>