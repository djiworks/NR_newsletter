<div class="container">
	<form class="form-horizontal" name="addNeswletter" action="/index.php/newsletter/newsletter/addNewsletter"
		method="post" id="addNeswletter">

		<div class="control-group">
			<label class="control-label" for="Name">Name (will be the
				object field of mail):</label>
			<div class="controls">
				<input type="text" id="Name" placeholder="Name"	name="Name">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="Description">Description:</label>
			<div class="controls">
				<textarea rows="3" name="Description" id="Description"	placeholder="Description"></textarea>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="Path">Path:</label>
			<div class="controls">
				<input type="file" id="Path" placeholder="Path"	name="Path">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="Cover">Cover:</label>
			<div class="controls">
				<input type="file" id="Cover" placeholder="Cover" name="Cover">
			</div>
		</div>

		<div class="control-group">
				Content:
			<textarea id='Content' name='Content' class="myTextEditor"></textarea>
		</div>
		
		<button type="submit" class="btn">Submit</button>
		
	</form>
</div>

	<div id="failure" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
	<h4>Failure</h4>
	</div>
	<div class="modal-body">
	<p>Failed to add newsletter. Please fill in all the fields.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" >Close</button>
	</div>
	</div>
