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

$('#viewDetails').on('hidden', function() {
	//~ alert('debut listener');
	//~ document.getElementById('viewDetails').setAttribute('data-remote', "");
	//~ $(this).removeData('modal');
	//~ alert('fin listener');

	//~ $('#viewDetails').removeData("modal");
})

function viewDetails(id){
	//~ alert(document.getElementById('viewDetails').getAttribute('data-remote'));
	document.getElementById('viewDetails').setAttribute('data-remote', "/index.php/intern/intern/viewDetails/" + id);
	//~ alert(document.getElementById('viewDetails').getAttribute('data-remote'));
	$('#viewDetails').modal('show');
}

function deleteIntern(id){						
	document.getElementById('confirmDeletionId').value = id ;
	$('#viewDetails').modal('hide');
	$('#confirmDeletion').modal('show');
}
		
function modifyIntern(id){						
	$('#viewDetails').modal('hide');
	//~ document.getElementById('modifyId').value = id ;
	document.getElementById('modifyIntern').setAttribute('data-remote', "/index.php/intern/intern/formCompletionModify/" + id);
	document.getElementById('tmpId').value = id;
	//~ alert(document.getElementById('tmpId').value);
	$('#modifyIntern').modal('show');
	setTimeout(function(){document.forms['modifyInternForm'].elements['modifyId'].value = document.getElementById('tmpId').value;},1000);
	//~ $('#modifyIntern').modal('show');
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
