 
<div class="catMenu">	
    <div class="row">
        <div class="col-lg-8">
            <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="aboutUs.php">About Us</a></li>
    <li> <button class="buttoNone" type="button" data-toggle="dropdown">Products
             <i class="fa fa-angle-down"></i>
        </button>
          <ul class="dropdown-menu">
            <li> <a href="services.php">Satified Seeds</a></li><br>
            <li><a href="airServices.php">Organic Fertilizers</a></li>  
          </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Infrastructure
         <i class="fa fa-angle-down"></i></a>
        <ul class="dropdown-menu" style="margin: 0px;margin-top: 4px;">
             <li><a href="researchDev.php">R&D</a></li>
             <li><a href="missVision.php">Mission & Vision</a></li>
          <li><a href="#">Quality & Processing</a></li>
          <li><a href="gallery.php">Gallery</a></li>
        </ul>
    </li>
    <li><a href="newsEvent.php">News & Events</a></li>
    <li><a href="contactUs.php">Contact Us</a></li>
</ul>
 
<style>
 .buttoNone {background-color: transparent;border:none;}
 .dropdown-menu{background-color: #00bcd2;margin-left: 190px;border-radius: 0px;box-shadow: none;border:none;}
 .dropdown-menu li:hover a{background-color: transparent;}
</style>
        </div>
        <div class="col-lg-4">
            <div class="usernameComp hidden-xs">
                <?php if(strlen($_SESSION['login']))
            {   ?>
            <a href="my-account.php"><i class="icon fa fa-user"></i>&nbsp Welcome -<?php echo htmlentities($_SESSION['username']);?></a>
            <?php } ?>
            </div>
        </div>
    </div>
</div>

 <style>
     .usernameComp a
     {
        color:black;
        float: right;
        padding-right: 60px;
        padding-top: 5px;
     }
 </style>
 