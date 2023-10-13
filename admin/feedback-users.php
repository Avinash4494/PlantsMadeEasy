
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
$admin_id = $_SESSION['alogin'];
$query = mysqli_query($con,"SELECT * FROM admin WHERE admin_id='$admin_id'");
$row = mysqli_fetch_assoc($query)
?>
 
<!DOCTYPE html>
<html>
  <head>
    <title>Utpann | Feedback Pannel</title>
    <?php include("include/headerLinks.php"); ?>
  </head>
  <body >
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
      <h3><i class="fa fa-comments"></i> Feedback Pannel</h3>
    </div> 
    <div class="col-lg-2">
      <?php
        $feedback_rt = mysqli_query($con,"SELECT * FROM user_feedback");
        $feedback = mysqli_num_rows($feedback_rt);
        {?>
      <h3 style="text-align: right;"><?php echo htmlentities($feedback); ?> </h3>
      <?php } ?>
    </div>
  </div>
</div><!-- moduleHead -->
                  <div class="tablePannel">
                        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-striped" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Feedback Id.</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Message</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php $query=mysqli_query($con,"select * from user_feedback");
        $cnt=1;
        while($row=mysqli_fetch_array($query))
        {
        ?>
        <tr>
          <td><?php echo htmlentities($cnt);?></td>
          <td><?php echo htmlentities($row['feedback_id']);?></td>
          <td><?php echo htmlentities($row['fname']);?></td>
          <td> <?php echo htmlentities($row['email']);?></td>
          <td><?php echo htmlentities($row['phone']); ?></td>
          <td><?php echo htmlentities($row['message']); ?></td>
          <td><?php echo htmlentities($row['feedback_Date']); ?></td>
 
          <?php $cnt=$cnt+1; } ?>
          
        </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include('include/footer.php');?>

  <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
  <script src="scripts/datatables/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function() {
      $('.datatable-1').dataTable();
      $('.dataTables_paginate').addClass("btn-group datatable-pagination");
      $('.dataTables_paginate > a').wrapInner('<span />');
      $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
      $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    } );
  </script>
  </body>
</html>
<?php } ?>