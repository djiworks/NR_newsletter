		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="/assets/javascript/university.js"></script>
		
			<?php if(isset($is_success))
			{echo "
				<script type='text/javascript'>
				confirmationAdding(".$is_success.");
				</script>"; 
			}?>
			
			<?php if(isset($failureLog))
			{echo "
				<script type='text/javascript'>
				$('#failure_sending').modal('show');
				</script>"; 
			}?>

			<?php if(isset($previewNewsletter))
			{echo "
				<script type='text/javascript'>
				$('#previewNewsletter').modal('show');
				</script>"; 
			}?>
			
			<?php if(isset($numContact_js)&& isset($nbInput_js))
			{
			echo "
				<script type='text/javascript'>
				numContact = ".$numContact_js."
				"; 

				for($i=1 ; $i <= $numContact_js; $i++)
				{
					echo "
					nbInput[".$i."] = ".$i.";
					nbInput[".$i."] = new Array();
					nbInput[".$i."][1] = ".$nbInput_js[$i][1].";
					nbInput[".$i."][2] = ".$nbInput_js[$i][2].";
					";
				}
				
				echo "</script>"; 
			}?>
	</body>
</html>
