<div class="container">
	<form class="form-horizontal" name="addNewsletter" action="/index.php/newsletter/newsletter/verificationAddNewsletter"
		method="post" id="addNewsletter" enctype="multipart/form-data">

		<input type="hidden"  name="modifyId" id="modifyId"  value="<?php if(isset($id_modify)){echo $id_modify;}else{echo '-1';} ?>"/>
		<input type="hidden"  name="creationDate" id="creationDate"  value="<?php if(isset($id_modify)){echo $id_modify;}else{echo '-1';} ?>"/>
		<?php if(isset($id_modify))
				{
					echo '<input type="hidden"  name="checkingState" id="checkingState"  value="'.$checkingState.'"/>
					<input type="hidden"  name="creationDate" id="creationDate"  value="'.$creationDate.'"/>';
				} ?>
		<div class="control-group">
			<label class="control-label" for="Name">Name (will be the
				object field of mail):</label>
			<div class="controls">
				<input type="text" id="Name" placeholder="Name"	name="Name" <?php if(isset($name)){echo 'value ="'.$name.'" ';} ?>>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="Description">Description:</label>
			<div class="controls">
				<textarea rows="3" name="Description" id="Description" placeholder="Description"><?php if(isset($description)){echo $description;} ?></textarea>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="Path">PDF:</label>
			<div class="controls">
<!--
				<input type="text" id="Path" name="Path" size="50" placeholder="Path" <?php if(isset($pathnews)){echo 'value ="'.$pathnews.'" ';} ?> />
				<input class="btn" type="button" value="Browse..." onclick="document.getElementById('hiddenfilepath').click();" />
-->
				<input type="file"  id="Path" name="Path" accept="application/pdf" placeholder="Path"/>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="Cover">Cover:</label>
			<div class="controls">
				<input type="file"  id="Cover" name="Cover" accept="image/*" />
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="Newsletter_images">Newsletter images:</label>
			<div class="controls">
				<input type="file"  id="Newsletter_images" name="Newsletter_images[]" accept="image/*" multiple=""/>
			</div>
		</div>
		
		<div class="control-group">
				Content:
			<textarea id='Content' name='Content' class="myTextEditor"><?php if(isset($content)){echo $content;} ?></textarea>
		</div>
		
		<button type="submit" class="btn">Submit</button>
		
	</form>
</div>
</div>
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
