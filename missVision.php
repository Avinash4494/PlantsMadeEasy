<?php session_start();
error_reporting(0);
include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utpannseeds.com | Mission & Vision</title>
		<?php include 'headerLinks/header_Links.php' ?>
	</head>
	<body class="cnt-home" id="toTheTop">
		<header class="header-style-1">
			<?php include('includes/top-header.php');?>
		</header>
		<div class="setNavHead"></div>
		<div class="body-content" id="top-banner">
			<div class="wrapperBody" >
				
					<div class="sectionPagin">
						<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-lg-6"></div>
							<div class="col-lg-6">
								<div class="emptyHead"></div>
								<div class="pagigHead">
									<h3>Mission & Vision</h3>
									<h5><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-chevron-right"></i> Mission & Vision</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				<style>

				</style>
				<div class="container">
					<div class="breadCrum">
						<div class="row">
							<div class="col-lg-9">
								<div class="paggignation">
									<h5><a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <span> Mission & Vision</span></h5>
								</div>
							</div>
							<div class="col-lg-3"></div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="WrapperContainer" >
    <section id="OurValuesComp">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-xs-12" >
            <div class="OurVisionWell">
              <div class="well">
                <div class="widgetValuesWindow"> </div>
                <img src="assets/images/banners/" alt="" class="img-responsive">
              </div>
              <div class="widgetText">
                <h1>Our Vision</h1>
              </div>
              <p>Our vision is to offer a one stop solution for all transportations needs of the people around the country. As a well respected transporter in Bangalore, Aaradhya Cargo Movers makes consistent efforts to materialize our vision by designing and developing a systematic course of action for the future.</p>
            </div>
          </div>
          <div class="col-lg-4 col-xs-12" >
            <div class="OurVisionWell">
              <div class="well">
                <div class="widgetValuesWindow"> </div>
               <img src="assets/images/banners/" alt="" class="img-responsive">
              </div>
              <div class="widgetText">
                <h1>Our Mission</h1>
              </div>
              <p>We revolutionize agriculture through the best technology in R&D, production and processing, continuously innovating seed quality control, combined with the development of our workforce, so that we can offer our customers the very best.</p>
            </div>
          </div>
          <div class="col-lg-4 col-xs-12" >
            <div class="OurVisionWell">
              <div class="well">
                <div class="widgetValuesWindow"> </div>
               <img src="assets/images/banners/our_team.png" alt="" class="img-responsive">
              </div>
              <div class="widgetText">
                <h1>Our Team</h1>
              </div>
              <p>Our team comprises of dedicated and competent employees and many other people are indirectly associated with us. We maintain only passionate individuals who love the process of transporter and their expertise in this field cannot be matched at all.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
					</div>
				</div>
			</div>
		</div>
		<?php include('includes/footer.php');?>
	</body>
</html>
<style>
  #OurValuesComp{height: 500px;overflow: hidden;}
  .OurVisionWell .well {
    overflow: hidden;
    padding: 0px;
    border-radius: 0px;
    border: 1px solid white;
    transition: 0.5s;
    height: 190px;
    background-color: white;
}

.widgetText {
    height: 40px;
    width: 100%;
    color: white;
margin: 0px;
    background-color: red;
    margin-top: -35px;
    position: relative;
    transition: 0.5s;
  
}

 
.OurVisionWell p {
    line-height: 25px;
    text-align: justify;
}

.widgetText h1 {
    font-size: 1.2em;
    text-align: center;
    margin: 0px;
   
}

.OurVisionWell:hover .widgetText {
    margin-top: -30px;
    margin-bottom: 10px;
    overflow: hidden;
}
</style>