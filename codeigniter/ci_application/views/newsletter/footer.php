		<script type="text/javascript" src="/assets/tinymce/tinymce.min.js"></script>
		<script src="/assets/holder/holder.js"></script>
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="/assets/javascript/newsletter.js"></script>
		
		<?php if(isset($is_success))
			{echo "
				<script type='text/javascript'>
				confirmationAdding(".$is_success.");
				</script>"; 
			}?>
	</body>
</html>
