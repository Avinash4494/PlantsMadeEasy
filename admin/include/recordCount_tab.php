<br>
<div class="row">
	<div class="col-lg-2">
	<a href="feedback-users.php">
		<div class="orderCounterWell">
			<div class="well">
				<?php
				$rt = mysqli_query($con,"SELECT * FROM user_feedback");
				$num1 = mysqli_num_rows($rt);
				{?>
				<div class="row">
					<div class="col-lg-12">
						<h3><?php echo htmlentities($num1); ?> </h3>
						<h5>Feedbacks</h5>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
	<div class="col-lg-2">
	<a href="">
		<div class="orderCounterWell">
			<div class="well">
				<?php
				$rt = mysqli_query($con,"SELECT * FROM admin");
				$num1 = mysqli_num_rows($rt);
				{?>
				<div class="row">
					<div class="col-lg-12">
						<h3><?php echo htmlentities($num1); ?> </h3>
						<h5>Admin Accounts</h5>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
	<div class="col-lg-2">
	<a href="employee-accounts.php">
		<div class="orderCounterWell">
			<div class="well">
				<?php
				$rt = mysqli_query($con,"SELECT * FROM employee");
				$num1 = mysqli_num_rows($rt);
				{?>
				<div class="row">
					<div class="col-lg-12">
						<h3><?php echo htmlentities($num1); ?> </h3>
						<h5>Employees Accounts</h5>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
</div>
 