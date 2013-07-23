<div class="container">
	<form class="form-horizontal" name="add" action="newsletter.php"
		method="GET" id="addnews">

		<div class="control-group">
			<label class="control-label" for="inputName">Name (will be the
				object field of mail):</label>
			<div class="controls">
				<input type="text" id="inputName" placeholder="Name"
					name="inputName">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputDescription">Description:</label>
			<div class="controls">
				<textarea rows="3" name="inputDesc" id="inputDescription"
					placeholder="Description"></textarea>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputPath">Path:</label>
			<div class="controls">
				<input type="file" id="inputPath" placeholder="Path"
					name="inputPath">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputCover">Cover:</label>
			<div class="controls">
				<input type="file" id="inputCover" placeholder="Cover"
					name="inputCover">
			</div>
		</div>

		Content:
		<textarea class="myTextEditor"></textarea>
	</form>
</div>
