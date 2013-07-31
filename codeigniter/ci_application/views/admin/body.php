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
			<form method="post" action="/index.php/admin/admin/verificationAddUser" class="form-horizontal">
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
						<input type="text" id="Password" name="Password" placeholder="Password" />
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="ConfirmPassword">Confirm Password</label>
					<div class="controls">
						<input type="text" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password"/>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="Role">Role</label>
					<div class="controls">
						<select id="Role" name="Role" value="<?php echo set_value('Role'); ?>" >							
							<?php echo $roleList; ?>
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
	
	<div id="modifyPassword" class="modal hide fade" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="modifyPasswordLabel">Change Password</h3>
		</div>
		<div class="modal-body">
			<form method="post" action="/index.php/admin/admin/modifyPassword" class="form-horizontal">
				
				<div class="control-group">
					<label class="control-label" for="Password">New Password</label>
					<div class="controls">
						<input type="text" id="Password" name="Password" placeholder="Password" value="<?php echo set_value('Password'); ?>" />
						<?php echo form_error('Password'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="ConfirmPassword">Confirm New Password</label>
					<div class="controls">
						<input type="text" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password" value="<?php echo set_value('ConfirmPassword'); ?>" />
						<?php echo form_error('ConfirmPassword'); ?>
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
	
	<div id="confirmDeletion" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '/index.php/admin/admin';">&times;</button>
	<h4>Confirm deletion</h4>
	</div>
	<div class="modal-body">
	<p>Are you sure you want to delete that user ?</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '/index.php/admin/admin/deleteUser';">Yes</button>
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '/index.php/admin/admin';">Cancel</button>
	</div>
	</div>
	
	<div id="success" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '/index.php/admin/admin';">&times;</button>
	<h4>Success</h4>
	</div>
	<div class="modal-body">
	<p>User added with success.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '/index.php/admin/admin';">Close</button>
	</div>
	</div>
	
	
	<div id="failure" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" data-toggle='modal' data-target='#addUser' aria-hidden="true">&times;</button>
	<h4>Failure</h4>
	</div>
	<div class="modal-body">
	<p>Failed to add user. Please fill in all the fields.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" data-toggle='modal' data-target='#addUser'>Close</button>	
	</div>
	</div>
