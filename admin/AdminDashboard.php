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
          <style>
            .wrapperComp{
              background-image: url(images/dalCusine.png);
              background-position: center;
              background-size: cover;
            }
          </style>
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
                  </div>
                  <div class="col-lg-6">
                      <?php include("include/productCount_tab.php") ?>
                  </div>
                </div>
              <?php include("include/progressCircleComp.php") ?>
              <div class="row">
                  <div class="col-lg-12">
                    <?php include("include/recordCount_tab.php") ?>
                  </div>
                </div>
            </div><!-- sideContent -->
          </div><!-- col-lg-10 -->
        </div><!-- row -->
      </div><!-- bodyContent -->
    </div><!-- container-fluid -->
  </div><!-- wrapperComp -->
</body>
</html>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="Progress-Circle/progresscircle.js"></script>
        <link rel="stylesheet" type="text/css" href="Progress-Circle/progresscircle.css">
    <script>
    $('.circlechart').circlechart(); // Initialization
    </script>