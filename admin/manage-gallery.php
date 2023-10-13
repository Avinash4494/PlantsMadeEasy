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
      <h3>Manage Gallery</h3>
    </div> 
    <div class="col-lg-2">
      <?php
        $feedback_rt = mysqli_query($con,"SELECT * from webgallery");
        $feedback = mysqli_num_rows($feedback_rt);
        {?>
      <h3 style="text-align: right;"><?php echo htmlentities($feedback); ?> </h3>
      <?php } ?>
    </div>
  </div>
</div><!-- moduleHead -->          
<div class="moduleContent">
  <div class="tablePannel">
    <div class="row">
      <div class="col-lg-6"></div>
          <div class="col-lg-2"></div>
            <div class="col-lg-4">
          <div class="moduleError">
<?php if(isset($_GET['del']))
{?>
<div class="alert alert-error" id="error-alert">
   
  <strong>Oh snap!</strong>   <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
  <script>
     $("#error-alert").fadeTo(2000, 1000).slideUp(500, function(){
        $("#error-alert").slideUp(500);
        });
  </script>
</div>
<?php } ?>
   <?php if(isset($_POST['submit']))
      {?>
      <div class="alert alert-success" id="success-alert">
        
        <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?>
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
    </div>
<?php
  $upload_dir = 'webimages/';
if(isset($_POST['submit']))
{
  $image_id=$_POST['image_id'];
  $image_idGen = rand(10000,99999);
  $img_head=$_POST['img_head'];
  $updationDate=$_POST['updationDate'];

  $imgName1 = $_FILES['image']['name'];
  $imgTmp1 = $_FILES['image']['tmp_name'];
  
  $imgExt1 = strtolower(pathinfo($imgName1, PATHINFO_EXTENSION));
  $userPic1 = $image_idGen.'.'.$imgExt1;
  move_uploaded_file($imgTmp1, $upload_dir.$userPic1);
 
$sql=mysqli_query($con,"insert into webgallery(image_id,img_head,updationDate,image) values('$image_idGen','$img_head','$updationDate','$userPic1')");
$_SESSION['msg']="Added Successfully !!";

} 

?>
<style>
   .alert-success{background-color: green;color: white;text-align: center;margin: 0px;padding: 0px;margin-top: 15px;}
    .alert-error{background-color: red;color: white;text-align: center;margin: 0px;padding: 0px;margin-top: 15px;}
    
  a.buttonUpdate{color: white;text-decoration: none;}
.buttonUpdate {
background-color: #00BCD2;
border-radius: 5px;
padding: 3px 5px;
text-align: center;
border: 1px solid #00BCD2;
color: white;
width: 100%;
}
  .buttonClose {
background-color: #00BCD2;
border-radius: 5px;
padding: 3px 5px;
margin-top: 7px;
border: 1px solid #00BCD2;
color: white;
width: 100%;
}
.buttonInsert {
background-color: #00BCD2;
border-radius: 5px;
padding: 5px 25px;
border: 1px solid #00BCD2;
color: white;
margin-top: 25px;
width: 100%;
}
</style>
              <div class="bodyComponent">
              <h5 style="padding-left: 15px;font-weight: bold;">Upload Gallery</h5>
                <div class="formPannel">
                  <form class="" name ="register" onsubmit="return myvalidate();" method="post" enctype="multipart/form-data">
                    <input type="text" id="image_id" name="image_id"  hidden="">
                   <input type="text" name="updationDate" hidden="">
                    <div class="row">
                      <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                          <label for="">Image Description<span>*</span></label>
                          <input type="text" name="img_head" class="form-control" placeholder="Image Description">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="updateProfilePic">
                          <div class="form-group">
                            <label for="image">Chosse Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                      </div>
                      <style type="text/css">
                      .actionButton{
                      margin-top: 25px;
                      }
                      </style>
                      <div class="col-lg-3 col-xs-12">
                        <button type="submit" name="submit" class="buttonInsert">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
                          <div class="row">
                <div class="col-lg-12">
                  <h5 style="margin-top: 0px;padding-left: 15px;">Our Gallery </h5>
                  <?php
                  $query = "SELECT * FROM webgallery";
                  $rs_result = mysqli_query ($con, $query);
                  if(mysqli_num_rows($rs_result)){
                  while ($row = mysqli_fetch_array($rs_result)) {
                  ?>
                  <style>
                    .showDocumentEmp .well
                    {
                      background-color: transparent;
                      border-radius: 0px;
                      padding: 0px;
                      border:none;
                      height: 250px;
                     
                    }
                     .showDocumentEmp .well .buttonTimes
                     {
                      margin-left: 220px;
                      height: 35px; 
                      width: 35px;
                       padding: 5px;
                       font-size: 1.2em;
                      border-radius: 50%;
                      position: absolute;
                      transition: 0.3s;
                      margin-top: -40px;
                      color: transparent;
                       margin-bottom: -40px;
                      background-color: transparent;
                      border:1px solid transparent;
                     }
                     .showDocumentEmp .well:hover .buttonTimes
                     {
 margin-left: 190px;
 margin-top: 20px;
 transition: 0.5s;
  background-color: red;
  border:1px solid red;
  color: white;
                     }
                  </style>
                  <div class="col-lg-3">
                    <div class="showDocumentEmp">
                      <div class="well">
                        <a href="manage-web.php?id=<?php echo $row['id']?>&del=delete" >
          <button class="buttonTimes" ><i class="fa fa-trash"></i></button>
        </a>
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