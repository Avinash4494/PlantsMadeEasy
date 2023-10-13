<?php session_start();
error_reporting(0);
include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utpannseeds.com | Our Gallery</title>
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
							<div class="col-lg-8"></div>
							<div class="col-lg-4">
								<div class="emptyHead"></div>
								<div class="pagigHead">
									<h3>Our Gallery</h3>
									<h5><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-chevron-right"></i> Our Gallery</h5>
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
					<h5><a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <span>Our Gallery</span></h5>
				</div>
			</div>
			<div class="col-lg-3">
				
			</div>
		</div>
	</div>
	<div class="WrapperContainer" >
		   <div class="row">
                <div class="col-lg-12">
                  <?php
                  include('include/config.php');
                  $upload_dir = 'admin/webimages/';
                  $query = "SELECT * FROM webgallery";
                  $rs_result = mysqli_query ($con, $query);
                  if(mysqli_num_rows($rs_result)){
                  while ($row = mysqli_fetch_array($rs_result)) {
                  ?>
                  <style>
                    .showDocumentEmp .well
                    {
                      background-color: transparent;
                      border-radius: 20px;
                      padding: 0px;
                      border:none;
                      height: 100%;
                      overflow: hidden;
                    }

                  </style>
                  <div class="col-lg-3">
                    <div class="showDocumentEmp">
                      <div class="well">
                        <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-responsive">
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  }
                  else{echo '<h3 style="color:red;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </div>
              </div>
	</div>
</div>
			</div>
		</div>
		<?php include('includes/footer.php');?>
	</body>
</html>