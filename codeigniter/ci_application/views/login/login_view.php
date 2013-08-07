	<div class="container">
		<?php if (validation_errors() != ""): ?>
		<div class="alert alert-error">
				<strong>Warning!</strong>
				<?php echo validation_errors(); ?>
		</div>
		<?php endif; ?>
		<?php echo form_open('login/verifylogin'); ?>
		<form>
			<h2 class="form-signin-heading">Please sign in</h2>
			<input type="text" class="input-block-level" placeholder="Username" id="username" name="username"> 
			<input type="password" class="input-block-level" placeholder="Password" id="passowrd" name="password"> 
			<button class="btn btn-large btn-primary" type="submit">Log in</button>
			<button class="btn btn-large btn-primary pull-right" type="button" data-toggle='modal' data-target='#addUser'>Sign up</button>
		</form>


	</div>

<div id="addUser" class="modal hide fade" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="addUserLabel">Add an User</h3>
		</div>
		<div class="modal-body">
			<form method="post" action="/index.php/login/login/verificationAddUser" class="form-horizontal">
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
						<input type="password" id="Password" name="Password" placeholder="Password" />
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="ConfirmPassword">Confirm Password</label>
					<div class="controls">
						<input type="password" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password"/>
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
	
	<div id="success" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '/index.php/admin/admin';">&times;</button>
	<h4>Success</h4>
	</div>
	<div class="modal-body">
	<p>Account created with success. </br>Please wait for an administrator to validate your account.</p>
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
	
	<div id="failure_login" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" data-toggle='modal' data-target='#addUser' aria-hidden="true">&times;</button>
	<h4>Failure</h4>
	</div>
	<div class="modal-body">
	<p>Failed to add user. This login is already registered.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" data-toggle='modal' data-target='#addUser'>Close</button>	
	</div>
	</div>
