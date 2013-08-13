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
	document.getElementById('viewDetails').setAttribute('data-remote', "/index.php/newsletter/newsletter/viewDetails/" + id);

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
		window.location.href = "/index.php/newsletter/newsletter/";
	}
})
	
	tinymce.init({
		mode : "specific_textareas",
        editor_selector : "myTextEditor",
	    theme: "modern",
	    plugins: [
	              "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	              "searchreplace wordcount visualblocks visualchars code fullscreen",
	              "insertdatetime media nonbreaking save table contextmenu directionality",
	              "emoticons template paste textcolor"
	          ],
	    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	    toolbar2: "print preview media | forecolor backcolor emoticons | code",
	    image_advtab: true,
	    templates: [
	        {title: 'Test template 1', content: 'Test 1'},
	        {title: 'Test template 2', content: 'Test 2'}
	    ]
	});

