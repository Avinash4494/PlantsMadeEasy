
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
  if(isset($_POST['submit']))
{
  
$faq_id=$_POST['faq_id'];
$faq_id_gen = rand(10000,99999);
$faq_question=$_POST['faq_question'];
$faq_answer=$_POST['faq_answer'];
$updationDate=$_POST['updationDate'];

$sql=mysqli_query($con,"insert into faqs(faq_id,faq_question,faq_answer,updationDate) values('$faq_id_gen','$faq_question','$faq_answer','$updationDate')");
$_SESSION['msg']="Added Successfully !!";

}
 if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from faqs where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="FAQ's deleted !!";
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
      <h3>Manage FAQ's</h3>
    </div> 
    <div class="col-lg-2">
      <?php
        $feedback_rt = mysqli_query($con,"SELECT * from faqs");
        $feedback = mysqli_num_rows($feedback_rt);
        {?>
      <h3 style="text-align: right;"><?php echo htmlentities($feedback); ?> </h3>
      <?php } ?>
    </div>
  </div>
</div><!-- moduleHead -->          
<div class="moduleContent">
                  <div class="addAccount">
  <div class="well">
    <div class="module Head">
      <div class="row">
        <div class="col-lg-8">
         
        </div>
        <div class="col-lg-4">
     <div class="moduleError">
      <?php if(isset($_POST['submit']))
      {?>
      <div class="alert alert-success" id="success-alert">
        
        <strong>Well done!</strong><?php echo htmlentities($_SESSION['msg']);?>
        <?php echo htmlentities($_SESSION['msg']="");?>
        <script>
          $("#success-alert").fadeTo(2000, 1000).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        });
        </script>
      </div>
      <?php } ?>
    </div><!-- moduleError -->
    <style>
    .alert-success{background-color: green;color: white;text-align: center;margin: 0px;padding: 0px; }
        .buttonAdd {
    background-color: #00BCD2;
    border-radius: 5px;
    padding: 5px 25px;
    border: 1px solid #00BCD2;
    color: white;
    width: 100%;
    margin: 0px;
}
  </style>
        </div>
      </div>
    </div>
    <div class="formPannel">
      <form action="" name="insertproduct" method="post" enctype="multipart/form-data">
        <input type="text" name="faq_id" hidden="">
        <input type="text" name="updationDate" hidden="">
        <div class="form-group">
          <div class="row">
          <div class="col-lg-6">
            <label for="">FAQ's Question</label>
            <input type="text" name="faq_question" class="form-control" placeholder="Fullname">
             
          </div>
          <div class="col-lg-6">
             <label for="">FAQ's Answer</label>
            <input type="text" name="faq_answer" class="form-control" placeholder="Username">
          </div>
 
        </div>
        </div>
        <div class="row">
          <div class="col-lg-10"></div>
          <div class="col-lg-2">
            <button type="submit" name="submit" class="buttonAdd">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
                  <div class="tablePannel">
                        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-striped" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>FAQ's Id.</th>
          <th>FAQ's Question</th>
          <th>FAQ's Answer</th>
          <th>Creation Date</th>
          <th>Updation Date</th>
          <th>Update</th>
          <th>Remove</th>
        </tr>
      </thead>
      <tbody>
        <?php $query=mysqli_query($con,"select * from faqs");
        $cnt=1;
        while($row=mysqli_fetch_array($query))
        {
        ?>
        <tr>
          <td><?php echo htmlentities($cnt);?></td>
          <td width="90"><?php echo htmlentities($row['faq_id']);?></td>
          <td width="250"><?php echo htmlentities($row['faq_question']);?></td>
          <td width="750"><?php echo htmlentities($row['faq_answer']);?></td>
          <td><?php echo htmlentities($row['creationDate']); ?></td>
        <td><?php echo htmlentities($row['updationDate']); ?></td>
           <td> 
            <a href="edit-admin.php?id=<?php echo $row['id']?>">
              <button class="buttonCheck" ><i class="fa fa-pencil"></i></button>
            </a>
          </td>
          <td>
            <a href="admin-accounts.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
              <button class="buttonTimes"><i class="fa fa-trash"></i></button>
            </a>
          </td>
          <?php $cnt=$cnt+1; } ?>
        </table>
                  </div>
                   


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