<?php
include("include/headerLinks.php");
$admin_id = $_SESSION['alogin'];
$query = mysqli_query($con,"SELECT * FROM admin WHERE admin_id='$admin_id'");
$row = mysqli_fetch_assoc($query)
?>
<style>
 

.dropdown-menu {
    margin-left: -170px;
    padding: 0px;
    width: 250px;
    background-color: #1C2833;
    color: white;
    border-radius: 0px;
    box-shadow: 0px 10px 20px 6px rgba(243, 234, 232, 0.5);
    margin-top: 22px;
}

.dropdown-menu .profileCircleDropdown img {
    height: 40px;
    width: 40px;
    margin-top: 8px;
    border-radius: 50%;
    margin-left: 15px;
}
 
</style>
<div class="topHeadComp">
	
</div>
<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="AdminDashboard.php">
			  		Utpann | <?php echo $row['Fullname']; ?>
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav pull-right">
						<li><a href="#">
							<?php echo $row['Fullname']; ?>
						</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="change-password.php">Change Password</a></li>
								<li class="divider"></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->
