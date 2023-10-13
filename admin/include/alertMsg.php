<div class="row">
	<div class="col-lg-12">
		<div class="moduleError">
			<?php if(isset($_POST['submit']))
			{?>
			<div class="alert alert-success" id="success-alert">
				<button type="button" class="close" data-dismiss="alert">×</button>
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
	<style>
		.alert-success{background-color: green;color: white;text-align: center;line-height: 30px;}
		button.close{color: white;}
	</style>