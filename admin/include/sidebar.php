
<div class="sideComp">
	  <div class="sideButton">
 	<div class="well">
 		<a href="AdminDashboard.php"><i class="fa fa-dashboard"></i>&nbsp Dashboard </a> 
 	</div>
 </div>
	 <div class="sideButton">
 	<div class="well">
 		<a href="ordersPannel.php">
		<i class="fa fa-cog"></i>&nbsp Order Management
		</a>
 	</div>
 </div>
  <div class="sideButton">
 	<div class="well">
 		<a href="manage-users.php">
		<i class="fa fa-users"></i>&nbsp Manage users
		</a>
 	</div>
 </div>
   <div class="sideButton">
 	<div class="well">
 		<a href="category.php"><i class="fa fa-tasks"></i>&nbsp Create Category </a> 
 	</div>
 </div>
    <div class="sideButton">
 	<div class="well">
 		 <a href="subcategory.php"><i class="fa fa-tasks"></i>&nbsp Sub Category </a>
 	</div>
 </div>
    <div class="sideButton">
 	<div class="well">
 		<a href="insert-product.php"><i class="fa fa-paste"></i>&nbsp Insert Product </a> 
 	</div>
 </div>
    <div class="sideButton">
 	<div class="well">
 		<a href="manage-products.php"><i class="fa fa-table"></i>&nbsp Manage Products </a> 
 	</div>
 </div>
 <div class="sideButton">
 	<div class="well">
 		 <a href="user-logs.php"><i class="fa fa-key"></i>&nbsp User Login Log </a> 
 	</div>
 </div>
  <div class="sideButton">
 	<div class="well">
 		 <a href="feedback-users.php"><i class="fa fa-comments"></i>&nbsp Feedbacks </a> 
 	</div>
 </div>
 <?php $getRole =  $row["roleLevel"];
 if ($getRole == "Level 01") {
 ?>
 <div class="sideButton">
 	<div class="well">
 		 <a href="admin-accounts.php"><i class="fa fa-user"></i>&nbsp Admin Accounts </a> 
 	</div>
 </div>
 <div class="sideButton">
 	<div class="well">
 		 <a href="employee-accounts.php"><i class="fa fa-briefcase"></i>&nbsp Employees Accounts </a> 
 	</div>
 </div>
 <?php
 }
 	?>

  <div class="sideButton">
 	<div class="well">
 		 <a href="manage-web.php"><i class="fa fa-cog"></i>&nbsp Control Pannel</a>
 	</div>
 </div>
 <div class="sideButton">
 	<div class="well">
 		 <a href="my-account.php"><i class="fa fa-cogs"></i>&nbsp Settings </a>
 	</div>
 </div>

</div>
 			
 <style>
 	.sideComp{padding-top:15px; }
 	.sideButton .well 
 	{
 		background-color: #00bcd2;
 		color: white;
 		padding: 6px;
 		border-radius: 0px;
 		margin-top: -15px;
 	}
 	.sideButton .well a
 	{
 		color: white;
 		text-decoration: none;
 	}
 </style>
		 