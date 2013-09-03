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
	document.getElementById('viewDetails').setAttribute('data-remote', "http://192.168.2.7/newsletter_project/www/index.php/intern/intern/viewDetails/" + id);
	$('#viewDetails').modal('show');
}

function deleteIntern(id){
	document.getElementById('hasToRefresh').value = 1;												
	document.getElementById('confirmDeletionId').value = id ;
	$('#viewDetails').modal('hide');
	$('#confirmDeletion').modal('show');
}
		
function modifyIntern(id){
	document.getElementById('hasToRefresh').value = 1;																		
	document.getElementById('modifyIntern').setAttribute('data-remote', "http://192.168.2.7/newsletter_project/www/index.php/intern/intern/formCompletionModify/" + id);
	$('#viewDetails').modal('hide');
	$('#modifyIntern').modal('show');
	setTimeout(function(){document.forms['modifyInternForm'].elements['modifyId'].value = id;},1000);
}

$('#viewDetails').on('hide', function() {
	if (document.getElementById('hasToRefresh').value == 0)
	{
		window.location.href = "http://192.168.2.7/newsletter_project/www/index.php/intern/intern/";
	}
})

$('#modifyIntern').on('hide', function() {
		window.location.href = "http://192.168.2.7/newsletter_project/www/index.php/intern/intern/";
})
