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
}

$('#viewDetails').on('hidden', function() {
	alert('debut listener');
	//~ document.getElementById('viewDetails').setAttribute('data-remote', "");
	$(this).removeData('modal');
	alert('fin listener');

	//~ $('#viewDetails').removeData("modal");
})

function viewDetails(id){
	//~ alert(document.getElementById('viewDetails').getAttribute('data-remote'));
	document.getElementById('viewDetails').setAttribute('data-remote', "/index.php/intern/intern/viewDetails/" + id);
	alert(document.getElementById('viewDetails').getAttribute('data-remote'));
	$('#viewDetails').modal('show');
}
