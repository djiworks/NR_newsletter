		<script src="<?php echo base_url("assets/holder/holder.js"); ?>"></script>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/javascript/newsletter.js"); ?>"></script>
		
		<?php if(isset($is_success))
			{echo "
				<script type='text/javascript'>
				confirmationAdding(".$is_success.");
				</script>"; 
			}?>
	</body>
</html>
