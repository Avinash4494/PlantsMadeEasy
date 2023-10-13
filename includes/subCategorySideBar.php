<div class="sidebarWidget">
	<div class="widgetHeader">
	<div class="row">
			<div class="col-lg-3">
				<img src="assets/images/categoryWhite.png" alt="" class="img-responsive">
			</div>
			<div class="col-lg-9">
				<h5 class="widgetTitle">  Sub Categories</h5>
			</div>
		</div>
	</div>
	<div class="widgetNavigation">
		    <nav role="navigation" >
        <ul class="nav" >
            <li class="" >
	              <?php $sql=mysqli_query($con,"select id,subcategory  from subcategory");
				while($row=mysqli_fetch_array($sql))
				{
	    		?>
	         	<a href="sub-category.php?scid=<?php echo $row['id'];?>" 
	         		class="active" style="padding: 8px;">
		         	<i class="fa-solid fa-seedling"></i> &nbsp 
		            <?php echo $row['subcategory'];?>
	        	</a>
	        	<div class="lineVertical"></div>
            	<?php }?>          
			</li>
		</ul>
    </nav>
	</div>
</div>
 
 