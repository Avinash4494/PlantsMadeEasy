<?php session_start();
error_reporting(0);
include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utpannseeds.com | FAQ's</title>
		<?php include 'headerLinks/header_Links.php' ?>
	</head>
	<body class="cnt-home" id="toTheTop">
		<header class="header-style-1">
			<?php include('includes/top-header.php');?>
		</header>
		<div class="setNavHead"></div>
		<div class="body-content" id="top-banner">
			<div class="wrapperBody" >
				<div class="sectionPagin" >
					<div class="overlay">
						<div class="container">
						<div class="row">
							<div class="col-lg-6"></div>
							<div class="col-lg-6">
								<div class="emptyHead"></div>
								<div class="pagigHead">
									<h3>Frequently Asked Questions</h3>
									<h5><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-chevron-right"></i> Frequently Asked Questions</h5>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
				
				<div class="container">
					<div class="breadCrum">
						<div class="row">
							<div class="col-lg-9">
								<div class="paggignation">
									<h5><a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <span> Frequently Asked Questions</span></h5>
								</div>
							</div>
							<div class="col-lg-3"></div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="WrapperContainer" >
						<?php $query=mysqli_query($con,"select * from faqs");
						$cnt=1;
						while($row=mysqli_fetch_array($query))
						{
						?>
						<div class="faqPannel">
							<div class="well">
								<div class="faqQuestion">
									<h4><?php echo htmlentities($cnt);?>. <?php echo htmlentities($row['faq_question']);?></h4>
								</div>
								<div class="faqAnswer">
									<h4><?php echo htmlentities($row['faq_answer']);?></h4>
								</div>
							</div>
						</div>
						<style>
							.faqPannel .well{padding: 0px;border-radius: 0px;background-color: white;}
							.faqQuestion{background-color: #00bcd2;color: white;}
							.faqQuestion h4{margin: 0px;padding: 7px;}
							.faqAnswer h4{margin: 0px;padding: 12px;line-height: 30px;}
						</style>
						<?php $cnt=$cnt+1; } ?>
					</div>
				</div>
			</div>
		</div>
		<?php include('includes/footer.php');?>
	</body>
</html>