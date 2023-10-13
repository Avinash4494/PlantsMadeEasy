<?php
//session_start();
?>
<?php
if(isset($_Get['action'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
		}
	}
?>
<nav class="navbar navbar-default navbar-fixed hidden-xs" >
	<div class="collapse navbar-collapse">
		<div class="topMenu">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-2">
						<div class="topLogo">
							<a href="index.php">
								<img src="img/logo.png" alt="" class="img-responsive">
							</a>
						</div>
					</div>
					<div class="col-lg-1"></div>
					<div class="col-lg-6">
<div class="searchForm">
	<form name="search" method="post" action="search-result.php">
		<div class="form-group">
			<div class="row">
				<div class="col-lg-10">
					<input class="form-control" placeholder="Search Product here..." name="product" required="required" />
				</div>
				<div class="col-lg-2">
					<button class="buttonSearch" type="submit" name="search"><i class="fa fa-search"></i></button>
				</div>
			</div>
		</div>
	</form>
</div>
<style>
	.buttonSearch
	{
		border-top-left-radius: 0px;
		border-bottom-left-radius: 0px;
		padding: 10px 10px 11px 10px;
		border:1px solid #00bcd2;
		margin-left: -30px;
		background-color: #00bcd2;
 		border-top-right-radius: 5px;
		border-bottom-right-radius: 5px;
		color: white;
   		width: 100%;
	}
</style>
					</div>
					<div class="col-lg-3">
<div class="topMenus">
	<ul>
		<li>
			
		</li>
		<!-- <li><a href="my-account.php"><i class="fa fa-user"></i></a></li> -->
		<li><a href="my-wishlist.php"><i class="fa fa-heart"></i></a></li>
		<li><a href="my-cart.php"><i class="fa fa-shopping-cart"></i>
			<?php
			if(!empty($_SESSION['cart'])){
			?>
			<div class="count" id="count">
				<?php echo $_SESSION['qnty'];?>
			</div>
			<?php } ?>
		</a>
	</li>
	<li>
		<?php if(strlen($_SESSION['login'])==0)
		{   ?>
		<a href="login.php"><i class="fa fa-user"></i></a>
		<?php }
		else{ ?>
		<a href="logout.php"><i class="fa fa-sign-out"></i></a>
		<?php } ?>
	</li>
</ul>
</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'menu-bar.php' ?>
</div>
</nav>
<!-- SMALL DEVICE --> 
<nav class="navbar navbar-default navbar-fixed hidden-lg">
	<div class="navbar-header">
		<div class="row">
			<div class="col-xs-2">
				<div class="topLogo">
							<a href="index.php">
								<img src="img/shortLogo.png" alt="" class="img-responsive">
							</a>
						</div>
			</div>
			<div class="col-xs-8">
				<div class="searchForm">
					<form name="search" method="post" action="search-result.php">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-10 col-xs-9">
									<input class="form-control" placeholder="Search Product here..." name="product" required="required" />
								</div>
								<div class="col-lg-2 col-xs-3">
									<button class="buttonSearch" type="submit" name="search"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-xs-2" >
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar" style="background-color:#00bcd2"></span>
					<span class="icon-bar" style="background-color:#00bcd2"></span>
					<span class="icon-bar" style="background-color: #00bcd2"></span>
				</button>
			</div>
		</div>
	</div>
	<div class="collapse navbar-collapse" id="myNavbar">
		<div class="topMenu">
				<div class="row">
					<div class="col-lg-12">
						 
	<ul>
 
		<li><a href="my-account.php"><i class="fa fa-cogs"></i></a></li>
		<li><a href="my-wishlist.php"><i class="fa fa-heart"></i></a></li>
		<li><a href="my-cart.php"><i class="fa fa-shopping-cart"></i>
			<?php
			if(!empty($_SESSION['cart'])){
			?>
			<div class="count" id="count">
				<?php echo $_SESSION['qnty'];?>
			</div>
			<?php } ?>
		</a>
	</li>
	<li>
		<?php if(strlen($_SESSION['login'])==0)
		{   ?>
		<a href="login.php"><i class="fa fa-user"></i></a>
		<?php }
		else{ ?>
		<a href="logout.php"><i class="fa fa-sign-out"></i></a>
		<?php } ?>
	</li>
	<li>
		 
                <?php if(strlen($_SESSION['login']))
            {   ?>
            <a href="my-account.php"><i class="icon fa fa-user"></i>&nbsp Welcome -<?php echo htmlentities($_SESSION['username']);?></a>
            <?php } ?>
             
	</li>
</ul>
 
					</div>
					  
				</div>
			 <?php include 'menu-bar.php' ?>
		</div>
	</div>
</nav>