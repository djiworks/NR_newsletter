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
			<a href="index.php">
				<button class="btn btn-large btn-primary" type="submit">Log in</button>
			</a> 
			<a href="registration.php">
				<button class="btn btn-large btn-primary pull-right" type="button" data-toggle='modal' data-target='#signUp'>Sign up</button>
			</a>
		</form>


	</div>
