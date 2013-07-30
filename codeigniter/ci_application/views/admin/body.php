<div class="span10">
	<div class="btn-group">
	<button class="btn btn-small btn btn-info" type="button" data-toggle='modal' data-target='#addUser'>
	<i class="icon-plus"></i> Add an User
	</button>
	</div>
	<table class="table table-hover" id="displayUserList">
		<thead>
    		<tr>
	    		<th><a><i class="icon-chevron-right"></i>ID</a></th>
	    		<th><a><i class="icon-chevron-right"></i>Login</a></th>
	    		<th><a><i class="icon-chevron-right"></i>Role</a></th>
    		</tr>
		</thead>
		<tbody>
			<?php echo $allUsers; ?>
		</tbody>
	</table>
	<div class="btn-group">
	<button class="btn btn-small btn btn-info" type="button" data-toggle='modal' data-target='#addUser'>
		<i class="icon-plus"></i> Add an User
	</button>
	</div>
</div>


<div id="addUser" class="modal hide fade" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="addUserLabel">Add an User</h3>
		</div>
		<div class="modal-body">
			<form method="post" action="/index.php/university/university/verification/addUser" class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="Login">Login</label>
					<div class="controls">
						<input type="text" id="Login" name="Login" placeholder="Login" value="<?php echo set_value('Login'); ?>" />
						<?php echo form_error('Login'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="Password">Password</label>
					<div class="controls">
						<input type="text" id="Password" name="Password" placeholder="Password" value="<?php echo set_value('Password'); ?>" />
						<?php echo form_error('Password'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="ConfirmPassword">Confirm Password</label>
					<div class="controls">
						<input type="text" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password" value="<?php echo set_value('ConfirmPassword'); ?>" />
						<?php echo form_error('ConfirmPassword'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="Role">Role</label>
					<div class="controls">
						<select id="Role" name="Role" value="<?php echo set_value('Role'); ?>" >
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>						
						<?php echo form_error('Role'); ?>
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn">Submit</button>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
