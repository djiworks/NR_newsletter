		function confirmationAdding(is_success){			
			if(is_success == 1)
			{
				$('#failure').modal('show');
			}
			else if(is_success == 0)
			{
				$('#success').modal('show');
			}
			else if(is_success == 3)
			{
				$('#failure_pwd').modal('show');
			}
			else if(is_success == 2)
			{
				$('#success_pwd').modal('show');
			}
			else if(is_success == 4)
			{
				$('#success_deletion').modal('show');
			}
			else if(is_success == 5)
			{
				$('#success_backup').modal('show');
			}
			else if(is_success == 4)
			{
				$('#failure_backup').modal('show');
			}
		}
		
		function modifyPassword(id){			
			document.forms['modifyPasswordForm'].elements["id"].value = id;
			$('#modifyPassword').modal('show');			
		}
		
		function deleteUser(id){						
			document.getElementById('confirmDeletionId').value = id ;
			$('#confirmDeletion').modal('show');
		}
