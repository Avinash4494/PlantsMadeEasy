<?php
include("include/session.php");
include("include/headerLinks.php");
$admin_id = $_SESSION['alogin'];
$query = mysqli_query($con,"SELECT * FROM admin WHERE admin_id='$admin_id'");
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard - <?php echo $row['Fullname']; ?></title>
  </head>
  <body > 
  <?php include('include/topHeader.php');?>
  <div class="wrapperComp">
      <div class="container-fluid">
        <div class="bodyContent">
          <div class="row">
          <div class="col-lg-2">
           <div class="sidebarContent" style="margin-top: -15px;margin-bottom: -10px;">
              <?php include('include/sidebar.php');?>
           </div> 
          </div><!-- col-lg-2 -->
          <div class="col-lg-10">
            <div class="sideContent" style="margin-top: -15px;">
                <div class="row">
                  <div class="col-lg-6">
                    <?php include("include/orderCount_tab.php") ?>
                     <?php include("include/productCount_tab.php") ?>
                  </div>
                  <div class="col-lg-6"></div>
                </div>
            </div><!-- sideContent -->
          </div><!-- col-lg-10 -->
        </div><!-- row -->
      </div><!-- bodyContent -->
    </div><!-- container-fluid -->
  </div><!-- wrapperComp -->
</body>
</html>