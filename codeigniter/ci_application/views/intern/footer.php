		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="/assets/javascript/university.js"></script>
		
			<?php if(isset($is_success))
			{echo "
				<script type='text/javascript'>
				confirmationAdding(".$is_success.");
				</script>"; 
			}?>
	</body>
</html>
