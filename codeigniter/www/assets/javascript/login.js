		function confirmationAdding(is_success){			
			if(is_success == 1)
			{
				$('#failure').modal('show');
			}
			else if(is_success == 0)
			{
				$('#success').modal('show');
			}
			else if(is_success == 2)
			{
				$('#failure_login').modal('show');
			}
		}
		 
