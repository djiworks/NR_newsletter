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
		$('#success_deletion').modal('show');
	}
	else if(is_success == 3)
	{
		$('#success_modify').modal('show');
	}
}

function viewDetails(id){
	document.getElementById('viewDetails').setAttribute('data-remote', "/index.php/intern/intern/viewDetails/" + id);
	$('#viewDetails').modal('show');
}

function deleteIntern(id){						
	document.getElementById('confirmDeletionId').value = id ;
	$('#viewDetails').modal('hide');
	$('#confirmDeletion').modal('show');
}
		
function modifyIntern(id){						
	$('#viewDetails').modal('hide');
	document.getElementById('modifyIntern').setAttribute('data-remote', "/index.php/intern/intern/formCompletionModify/" + id);
	$('#modifyIntern').modal('show');
	setTimeout(function(){document.forms['modifyInternForm'].elements['modifyId'].value = id;},1000);
}

//~ $('#modifyIntern').on('show', function() {
	//~ alert(document.forms['modifyInternForm']);
//~ })
//~ 
//~ $('#submitModify').on('click', function() {
	//~ alert(document.forms['modifyInternForm'].elements['modifyId'].value);
	//~ document.forms['modifyInternForm'].elements['modifyId'].value = document.getElementById('tmpId').value;
	//~ alert(document.forms['modifyInternForm'].elements['modifyId'].value);
//~ })
