    <div class="ReviewsTitle">
      <h1>Loved by 100+ customers</h1>
    </div>
    <div class="sect sectOne ">
      <div class="overlayCompReview">
      <div class="container-fluid hidden-xs">
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div id="myCarouselComment" class="carousel slide" data-ride="carousel" data-interval="300000" data-hover="pause" data-item="3">
              <!-- Indicators -->
              
              <!-- Wrapper for slides -->
              
    <div class="carouselComp">
                <div class="carousel-inner" >
                  <div class="item active">
                    <div class="row">
                  <?php
$ret=mysqli_query($con,"select * from user_feedback limit 4");
while ($row=mysqli_fetch_array($ret)) 
{
?>
                     <div class="col-lg-3">
                        <div class="carouselWell">
                            <div class="well">
                              <div class="row">
                                <div class="col-lg-12  col-xs-4">
                                  <p><?php echo $row["message"] ?></p>
<div class="rating">
<div class="row">
  <div class="col-lg-6">
    <h5 style="font-size: 1em;"><?php echo $row["fname"] ?></h5>
  </div>
  <div class="col-lg-6">
    <!-- <h5 style="text-align: right;padding-top: 5px;"><?php echo $row["feedback_Date"] ?></h5> -->
  </div>
</div>
</div>
<style>
  .carouselWell .well{padding-bottom: 0px;height: 240px;background-color: white;}
  .rating{padding-top: 10px;}
  .carouselWell .well p{font-size: 1em;text-align: justify;}
  .rating h5{margin: 0px;margin-top: -5px;}
  .rating i{margin-left: 2px;margin-right: 2px;padding-top: 10px;color: orange;}
</style>
                                </div>
                              </div>
                            </div>
                          </div>
                     </div>
                  <?php } ?>
                  </div>
                   </div>
                                     <div class="item">
                    <div class="row">
                  <?php
$ret=mysqli_query($con,"select * from productreviews limit 3");
while ($row=mysqli_fetch_array($ret)) 
{
?>
                     <div class="col-lg-4">
                        <div class="carouselWell">
                            <div class="well">
                              <div class="row">
                                <div class="col-lg-12  col-xs-4">
                                  <p> improve their skills in this language. With an online course, you can do exactly that.</p>
                                  <h3>Avinash Singh</h3>
                                  <h5>SFC Enginner</h5>
                                </div>
                              </div>
                            </div>
                          </div>
                     </div>
                  <?php } ?>
                  </div>
                   </div>
                                     <div class="item">
                    <div class="row">
                  <?php
$ret=mysqli_query($con,"select * from productreviews limit 3");
while ($row=mysqli_fetch_array($ret)) 
{
?>
                     <div class="col-lg-4">
                        <div class="carouselWell">
                            <div class="well">
                              <div class="row">
                                <div class="col-lg-12  col-xs-4">
                                  <p>As hat.</p>
                                  <h3>Avinash Singh</h3>
                                  <h5>SFC Enginner</h5>
                                </div>
                              </div>
                            </div>
                          </div>
                     </div>
                  <?php } ?>
                  </div>
                   </div>
          
                
              </div>
    </div>
              
 
              
              <div class="carouselPaggination">
                <ol class="carousel-indicators" >
                  <li data-target="#myCarouselComment" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarouselComment" data-slide-to="1"></li>
                  <li data-target="#myCarouselComment" data-slide-to="2"></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
 
      </div>
    </div>
 </div>
  <style>
    .ReviewsTitle h1{
      padding: 40px;
      text-align: center;
      color: black;
      font-weight: bold;

    }
    .sect {
    height: 100%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    margin-bottom: -20px;
}
.sectOne {
    background-image: url(assets/images/sliders/slide3.jpg);
    font-size: 1.5em;
}
.carouselComp
{
  padding: 70px 0px;
} 
    .carousel-indicators .active {
    background-color: #00bcd2;
    border: 1px solid #00bcd2;
    height: 17px;
    width: 17px;
    border-radius: 50%;
    margin-bottom: 15px;
    transition: 0.5s; 
}
 
.carousel-indicators li {
    background-color: white;
        height: 17px;
    width: 17px;
    border-radius: 50%;
    border: 1px solid #00bcd2;
    margin-bottom: 5px;
    margin-left: 0px;
    margin-right: 0px;
    transition: 0.8s;
}

 .overlayCompReview
 {
     background-color: rgba(0,0,0,0.7);
     position: relative;
     height: 100%;
     width: 100%;
 }


  </style>