          		  
<div class="col-lg-3">
	<a href="todays-orders.php">
		<div class="counterWell">
			<div class="well" style="background-color: red;">
				<?php
				$f1="00:00:00";
				$from=date('Y-m-d')." ".$f1;
				$t1="23:59:59";
				$to=date('Y-m-d')." ".$t1;
				$result = mysqli_query($con,"SELECT * FROM Orders where orderDate Between '$from' and '$to'");
				$num_rows1 = mysqli_num_rows($result);
				{
				?>
				<div class="row">
					<div class="col-lg-9">
						<h5>Today's Orders</h5>
					</div>
					<div class="col-lg-3">
						<span><?php echo htmlentities($num_rows1); ?></span>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
<div class="col-lg-3">
	<a href="pending-orders.php">
		<div class="counterWell">
			<div class="well" style="background-color: orange;">
				<?php
				$status='Delivered';
				$ret = mysqli_query($con,"SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
				$num = mysqli_num_rows($ret);
				{?>
				<div class="row">
					<div class="col-lg-9">
						<h5>Pending Orders</h5>
					</div>
					<div class="col-lg-3">
						<span><?php echo htmlentities($num); ?></span>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
<div class="col-lg-3">
	<a href="delivered-orders.php">
		<div class="counterWell">
			<div class="well" style="background-color: green;">
				<?php
					$status='Delivered';
				$rt = mysqli_query($con,"SELECT * FROM Orders where orderStatus='$status'");
				$num1 = mysqli_num_rows($rt);
				{?>
				<div class="row">
					<div class="col-lg-9">
						<h5>Delivered Orders</h5>
					</div>
					<div class="col-lg-3">
						<span><?php echo htmlentities($num1); ?> </span>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</a>
</div>
<div class="col-lg-3"></div>
<div class="col-lg-3">
	<div class="buttonGroup">
		<p class="lead"><button id="json" class="buttonDownload">JSON</button> <button id="csv" class="buttonDownload">CSV</button></p>
	</div>
</div>          			
<style>
.buttonGroup{margin-top: -10px;margin-bottom: -15px;}
.buttonDownload{font-size: 0.4em;}
.bodyContent
{
margin-top: -15px;
}
.headPaggignation h5{
font-size: 0.8em;
font-weight: bold;
margin: 0px;
padding: 4px;
color: white;
width: 100%;
background-color: #00bcd2;
}
.headPaggignation a{color: white;}
.dataTables_wrapper select,
.dataTables_wrapper input,
.dataTables_wrapper label {
font-size: 0.8em;
font-weight: normal;
margin: 0;
}
.tablePannel table th {
font-size: 0.8em;
}
.tablePannel table td {
font-size: 0.8em;
}
</style>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.min.js"></script>
<script src="scripts/tableHTMLExport.js"></script>

  <script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
</body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>