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
	document.getElementById('viewDetails').setAttribute('data-remote', "http://192.168.2.7/newsletter_project/www/index.php/newsletter/newsletter/viewDetails/" + id);

	$('#viewDetails').modal('show');
}

function deleteNewsletter(id){
	document.getElementById('hasToRefresh').value = 1;						
	document.getElementById('confirmDeletionId').value = id ;
	$('#viewDetails').modal('hide');
	$('#confirmDeletion').modal('show');
}

$('#hiddenfilepath').on('change', function() {
	document.getElementById('Path').value = document.getElementById('hiddenfilepath').value;
})

$('#hiddenfilecover').on('change', function() {
	document.getElementById('Cover').value = document.getElementById('hiddenfilecover').value;
})

$('#viewDetails').on('hide', function() {
	if (document.getElementById('hasToRefresh').value == 0)
	{
		window.location.href = "http://192.168.2.7/newsletter_project/www/index.php/newsletter/newsletter/";
	}
})
	
