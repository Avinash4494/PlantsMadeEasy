<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

$admin_id = $_SESSION['alogin'];
$query = mysqli_query($con,"SELECT * FROM admin WHERE admin_id='$admin_id'");
$row = mysqli_fetch_assoc($query);

if(isset($_GET['del']))
{
	mysqli_query($con,"delete from webgallery where id = '".$_GET['id']."'");
    $_SESSION['delmsg']="Image deleted !!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Utpann | Manage Gallery</title>
 <?php include("include/headerLinks.php"); ?>
</head>
<body>
<?php include('include/topHeader.php');?>
<div class="wrapperComp">
		<div class="container-fluid">
			<div class="bodyContent">
				<div class="row">
				<div class="col-lg-2">
					<?php include('include/sidebar.php');?>
				</div>
				<div class="col-lg-10">
					<div class="sideContent">
						<div class="well">
              <div class="moduleHead">
              	<div class="row">
              		<div class="col-lg-10">
              			<h3>Control Pannel</h3>
              		</div> 
              		<div class="col-lg-2">
              			 
              		</div>
              	</div>
              </div><!-- moduleHead -->			
<style>
  .tablePannel{padding:15px;}
  .manageWell .well{background-color: #00bcd2;border-radius: 5px;color: white;
    padding: 10px 20px;text-align: center;}
    .manageWell .well h3{margin: 0px;font-size:2.2em;}
    .tablePannel a{text-decoration: none;}
</style>		 
<div class="moduleContent">
	<div class="tablePannel">
 <div class="row">
   <div class="col-lg-3">
     <a href="manage-gallery.php">
      <div class="manageWell">
       <div class="well">
          <?php
        $feedback_rt = mysqli_query($con,"SELECT * from webgallery");
        $feedback = mysqli_num_rows($feedback_rt);
        {?>
      <h3><?php echo htmlentities($feedback); ?> </h3>
      <?php } ?>
         <h4>Manage Gallery</h4>
       </div>
     </div>
   </a>
   </div>
     <div class="col-lg-3">
     <a href="manage-faq.php">
      <div class="manageWell">
       <div class="well">
          <?php
        $feedback_rt = mysqli_query($con,"SELECT * from faqs");
        $feedback = mysqli_num_rows($feedback_rt);
        {?>
      <h3><?php echo htmlentities($feedback); ?> </h3>
      <?php } ?>
         <h4>Manage FAQ's</h4>
       </div>
     </div>
   </a>
   </div>
 </div>
	</div><!-- tablePannel -->
</div><!-- moduleContent -->
						</div><!-- well -->
					</div><!-- sideContent -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('include/footer.php');?>
</body>
</html>
<?php } ?>