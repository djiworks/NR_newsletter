<h3 id="modifyPasswordLabel">Change Password</h3>
<div class="modal-body">
	<form method="post" id="modifyPasswordForm" action="/index.php/admin/changepassword/verificationChangePassword" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="CurrentPassword">Current Password</label>
			<div class="controls">
				<input type="password" id="CurrentPassword" name="CurrentPassword" placeholder="Current Password" />
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="NewPassword">New Password</label>
			<div class="controls">
				<input type="password" id="NewPassword" name="NewPassword" placeholder="New Password" />
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="ConfirmNewPassword">Confirm New Password</label>
			<div class="controls">
				<input type="password" id="ConfirmNewPassword" name="ConfirmNewPassword" placeholder="Confirm New Password" />
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn">Submit</button>
			</div>
		</div>
	</form>
</div>
</div>
</div>

	<div id="success_pwd" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '/index.php/admin/changepassword';">&times;</button>
	<h4>Success</h4>
	</div>
	<div class="modal-body">
	<p>Password modified with success.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '/index.php/admin/changepassword';">Close</button>
	</div>
	</div>
	
	
	<div id="failure_pwd" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" onclick="window.location.href = '/index.php/admin/changepassword';" aria-hidden="true">&times;</button>
	<h4>Failure</h4>
	</div>
	<div class="modal-body">
	<p>Failed to modify password. Please try again.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '/index.php/admin/changepassword';">Close</button>	
	</div>
	</div>
