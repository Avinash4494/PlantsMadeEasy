
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
  if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from employee where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Category deleted !!";
      }
?>
 
<!DOCTYPE html>
<html>
  <head>
    <title>Utpann | Employees Account</title>
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
      <h3><i class="fa fa-briefcase"></i>&nbsp Employees Accounts</h3>
    </div> 
    <div class="col-lg-2">
         <?php
        $feedback_rt = mysqli_query($con,"SELECT * FROM employee");
        $feedback = mysqli_num_rows($feedback_rt);
        {?>
      <h3 style="text-align: right;"><?php echo htmlentities($feedback); ?> </h3>
      <?php } ?>
    </div>
  </div>
  <style>
    .buttonAdd {
    background-color: #00BCD2;
    border-radius: 5px;
    padding: 5px 10px;
    border: 1px solid #00BCD2;
    color: white;
    width: 100%;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: -10px;
}
  </style>
</div><!-- moduleHead -->
 
 <div class="row">
   <div class="col-lg-10"></div>
   <div class="col-lg-2">
     <a href="add-employee.php"> <button class="buttonAdd"><i class="fa fa-briefcase"></i>&nbsp Add Employee</button></a>
   </div>
 </div>
<div class="tablePannel">
  <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-striped" width="100%">
    <thead>
      <tr>
        <th>#</th>
        <th>Ref. Id.</th>
        <th>Employee Id.</th>
        <th>Designation</th>
        <th>Full Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Creation Date</th>
        <th>Status</th>
        <th>Update</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
      <?php $query=mysqli_query($con,"select * from employee");
      $cnt=1;
      while($row=mysqli_fetch_array($query))
      {
      ?>
      <tr>
        <td><?php echo htmlentities($cnt);?></td>
        <td><a href="empDetails.php?id=<?php echo $row['id']?>">Ref <?php echo htmlentities($row['id']);?></a></td>
        <td><?php echo htmlentities($row['emp_id']);?></td>
        <td><?php echo htmlentities($row['empRole']);?></td>
        <td><?php echo htmlentities($row['Fullname']);?></td>
        <td><?php echo htmlentities($row['contact']);?></td>
        <td><?php echo htmlentities($row['email']);?></td>
        <td><?php echo htmlentities($row['creationDate']); ?></td>
        <td><?php echo htmlentities($row['emp_status']); ?></td>
        <td>
          <a href="edit-employee.php?id=<?php echo $row['id']?>">
            <button class="buttonCheck" ><i class="fa fa-pencil"></i></button>
          </a>
        </td>
        <td>
          <a href="employee-accounts.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
            <button class="buttonTimes"><i class="fa fa-trash"></i></button>
          </a>
        </td>
         </tr>
        <?php $cnt=$cnt+1; } ?>
     
    </tbody>
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
  </body>
</html>
<?php } ?>