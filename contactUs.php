 <?php session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit'])) {
	$feedback_id = $_POST['feedback_id'];
	$feedback_id_gen = 'FD'.'-'.rand(100000,999999);
	$fname = $_POST['fname'];
	$email= $_POST['email'];
	$phone= $_POST['phone'];
	$message= $_POST['message'];
	$feedback_Date = date("d-m-Y");
$sql=mysqli_query($con,"insert into user_feedback (feedback_id,fname,email,phone,message,feedback_Date)
					values('$feedback_id_gen','$fname','$email','$phone','$message',
					'$feedback_Date')"); 
$_SESSION['msg']="Thank you !!";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utpannseeds.com | Contact Us</title>
		<?php include 'headerLinks/header_Links.php' ?>
	</head>
<body class="cnt-home" id="toTheTop">
	<header class="header-style-1">
	<?php include('includes/top-header.php');?>
	</header>
	<div class="setNavHead"></div>
	<div class="body-content" id="top-banner">
			<div class="sectionPagin" >
					<div class="overlay">
						<div class="container">
						<div class="row">
							<div class="col-lg-8"></div>
							<div class="col-lg-4">
								<div class="emptyHead"></div>
								<div class="pagigHead">
									<h3>Contact Us</h3>
									<h5><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-chevron-right"></i> Contact Us</h5>
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
	 		<h5><a href="index.php">Home</a> <i class="fa fa-chevron-right"></i> <span>Contact Us</span></h5>
	 	</div>
	 		</div>
	 		<div class="col-lg-3">
	 					
	 		</div>
	 	</div>
	 </div>
	 <style>

	 	    .icons ul li a i{
   color: #00bcd2;
}

.icons ul {

    margin: 0;
    padding: 0;
   color: #00bcd2;
    display: flex;
    margin-top: 50px;

}

.icons ul li {
    list-style: none;
    position: relative;
    width: 100px;
    height: 50px;
    line-height: 50px;
    text-align: center;
    background-color:transparent;
    color: black;

    transition: .5s;
    font-size: 24px;
    cursor: pointer;
}

.icons ul li a:hover {
    color: white;
}

.icons ul li span {
    position: absolute;
    top: -20px;
    left: 50%;
    transform: translateX(-50%) translateY(-20px);
    width: 120px;
    height: 24px;
    line-height: 24px;
    background-color: #00bcd2;
    color: white;
    font-size: 14px;
    border-radius: 4px;
    letter-spacing: 1px;
    transition: 0.5s;
    opacity: 0;
    visibility: hidden;

}

.icons ul li:hover span {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0px);
}

.icons ul li span:before {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 50%;
    transform: rotate(45deg) translateX(-50%);
    width: 10px;
    height: 10px;
    background-color: #00bcd2;
    z-index: -1;
}
.widgetQuote span{color: red;}
.widgetQuote input, .widgetQuote textarea
{
	padding: 20px;border:1px solid #00bcd2;
}
	 </style>
	</div>
<div class="WrapperContainer">
	<section id="sectionContactComp">
		<div class="container">
 
 <div class="row">
 	<div class="col-lg-6">
 		<div class="sectionAddress">
 			<h1>How can we help you?</h1>
 			<h4>We are at your disposal 7 days a week!</h4>
 		 <hr>
 			<h4><b>Corporate Office :</b></h4>
                <h4>S.No. 9,First Floor,Plot No. 22,Municipal No.6-8-97,IDA Kattedan,Ranga Reddy Dist.,Hyderabad,Telangana</h4>
                <hr>
                <h4><b>Branch Office :</b></h4>
                <h4>Office No. B-210, Second Floor, Capital Mall Misrod,Hosangabad Road, <br> 
Bhopal- 462001, Madhya Pradesh, India</h4>
<hr>
<div class="row">
	<div class="col-lg-6">
		<div class="row">
	<div class="col-lg-2">
		<div class="addressIcon">
			<i class="fa fa-envelope" style="color: white;font-size: 1.3em;"> </i>
		</div>
	</div>
	<div class="col-lg-10">
		<h4>support@utpannseeds.com</h4>
	</div>
</div>
	</div>
	<div class="col-lg-6">
				<div class="row">
	<div class="col-lg-2">
		<div class="addressIcon">
			<i class="fa fa-phone" style="color: white;font-size: 1.3em;"> </i>
		</div>
	</div>
	<div class="col-lg-10">
<h4>+91 9826993344</h4>
	</div>
</div>
	</div>
</div>
<!--     <div class="icons">
        <ul>
            <li><a href=""><i class="fa fa-facebook-square"></i><span>Facebook</span></a></li>
            <li><a href=""><i class="fa fa-twitter-square"></i><span>Twitter</span></a></li>
            <li><a href=""><i class="fa fa-linkedin-square" ></i><span>Linkdein</span></a></li>
            <li><a href=""><i class="fa fa-instagram"></i><span>Instagram</span></a></li>
            
        </ul>
    </div> -->
 		</div>
 	</div>
 	<div class="col-lg-6">
 		 <section id="sectionLocation">
 		 	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3668.15868290013!2d77.46630821428519!3d23.164407866826537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397c43c87e1fa1b7%3A0x7258f6d017b6112d!2sUtpann%20Seeds!5e0!3m2!1sen!2sin!4v1663510795336!5m2!1sen!2sin" width="100%" height="400px;"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
 
    </section>
 	</div>
 </div>
      	</div>
     </section>

	       <section id="sectionTitle" class="container">
          <h2>LEAVE YOUR MESSAGE</h2>
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="background-color:;">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-5 col-xs-5" style="background-color:;"></div>
                    <div class="col-lg-2 col-xs-2" style="background-color:#00bcd2"></div>
                    <div class="col-lg-5 col-xs-5" style="background-color:;"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <p>If you have any questions about the services we provide <br>simply use the form below. We try and respond to all
          queries and comments within 24 hours.</p>
        </section>
        <div class="row">
        	<div class="col-lg-4"></div>
        	<div class="col-lg-4">
        		<div class="moduleError">
			<?php if(isset($_POST['submit']))
			{?>
			<div class="alert alert-success" id="success-alert">
				 
				<strong>Well done !</strong>	<?php echo htmlentities($_SESSION['msg']);?>
				<?php echo htmlentities($_SESSION['msg']="");?>
				<script>
					$("#success-alert").fadeTo(2000, 1000).slideUp(500, function(){
				$("#success-alert").slideUp(500);
				});
				</script>
			</div>
			<?php } ?>
		</div><!-- moduleError -->
        	</div>
        	<div class="col-lg-4"></div>
        </div>
        <section>
        <div class="container">
        	        <div class="row">
          <div class="col-lg-12">
            <div class="widgetFeedbackRight">
              <div class="widgetQuote"><p id="AllFields"></p>
<form name ="register" onsubmit="return feedbackvalidate();" method="post" enctype="multipart/form-data" action="">
	<input type="text" id="feedback_id" name="feedback_id" hidden="">
	<input type="text" id="feedback_Date" name="feedback_Date" hidden="">
	<div class="row">
		<div class="col-lg-4 col-xs-12">
			<label for="usr"><b>Name <span>*</span></b></label>
			<div class="form-group">
				<input type="text" class="form-control" id="fname" name="fname" placeholder="Your Name" onkeyup="NameValidate()">
				<span id='NameError'></span>
			</div>
		</div>
		<div class="col-lg-4">
			<label for="usr"><b>Email <span>*</span></b></label>
			<div class="form-group">
				<input type="email" class="form-control" id="email" name="email" placeholder="Your email" onkeyup="emailValidate()">
				<span id='emailError'></span>
			</div>
		</div>
		<div class="col-lg-4">
			<label for="usr"><b>Phone <span>*</span></b></label>
			<div class="form-group">
				<input type="text" class="form-control" id="contact" name="phone" placeholder="Your Mobile Number" onkeyup="contactValidate()">
				<span id='contactError'></span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<label for="usr"><b>Special Info</b></label>
			<div class="form-group">
				<textarea class="form-control" type="textarea" id="message" name="message" placeholder="Your Message Here" maxlength="6000" rows="5"> </textarea>
			</div>
		</div>
	</div>
<div class="row">
	<div class="col-lg-2 col-xs-12" style="background-color:;">
		<div class="form-group">
			<button type="submit" name="submit" class="buttonAddCart">Send</button>
		</div>
		<style>
			.buttonAddCart{font-weight: bold;letter-spacing: 2px;font-size: 1.2em;}
		</style>
	</div>
	<div class="col-lg-6"></div>
	<div class="col-lg-4 col-xs-6" style="background-color:;">
 
	<style>
		.alert-success{background-color: green;color: white;text-align: center;line-height: 10px;
			padding: 12px;margin: 0px; }
		button.close{color: white;}
	</style>
	</div>
</div>
</form>
              </div>
            </div>
          </div>
        </div>
        </div>

</section>
   
   
 </div>
</div>
	<?php include('includes/brands-slider.php');?>
	<?php include('includes/footer.php');?>
</body>
</html>
 