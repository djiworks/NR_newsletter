<!DOCTYPE html>
<html>
<head>
<title>University Newsletter Management</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet"
	media="screen">
<style type="text/css">
body {
	padding-top: 40px;
	padding-bottom: 40px;
}

.form-signin {
	max-width: 300px;
	margin: 100px auto 20px;
}

.form-signin .form-signin-heading,.form-signin .checkbox {
	margin-bottom: 10px;
}

.form-signin input[type="text"],.form-signin input[type="password"] {
	font-size: 16px;
	height: auto;
	margin-bottom: 15px;
	padding: 7px 9px;
}
</style>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<button type="button" class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="brand" href="index.php">University Newsletter Management</a>
			</div>
		</div>
	</div>

	<div class="container">
		<form class="form-signin input-xlarge">
			<h2 class="form-signin-heading">Please sign in</h2>
			<input type="text" class="input-block-level"
				placeholder="Email address"> <input type="password"
				class="input-block-level" placeholder="Password"> <a
				href="index.php"><button class="btn btn-large btn-primary"
					type="button">Log in</button></a> <a href="registration.php"><button
					class="btn btn-large btn-primary pull-right" type="button"
					data-toggle='modal' data-target='#signUp'>Sign up</button></a>
		</form>
	</div>

	<div id="signUp" class="modal hide fade" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="signUpLabel">Registration form</h3>
		</div>

		<div class="modal-body">
			<form class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="inputLogin">Login</label>
					<div class="controls">
						<input type="text" id="UserLogin" placeholder="Login">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputFirstName">First Name</label>
					<div class="controls">
						<input type="text" id="UserFirstName" placeholder="First Name">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputSurname">Surname</label>
					<div class="controls">
						<input type="text" id="UserSurname" placeholder="Surname">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputEmail">Email</label>
					<div class="controls">
						<input type="text" id="inputEmail" placeholder="Email">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputPhone">Phone</label>
					<div class="controls">
						<input type="text" id="inputPhone" placeholder="Phone">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputCountry">Country</label>
					<div class="controls">
						<input type="text" id="inputCountry" placeholder="Country">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputPassword">Password</label>
					<div class="controls">
						<input type="password" id="inputPassword" placeholder="Password">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputPassword">Confirm password</label>
					<div class="controls">
						<input type="password" id="inputPassword"
							placeholder="Confirm password">
					</div>
				</div>

				<div class="bs-docs-example">
					<div class="control-group">
						<div class="controls">
							<button type="button" class="btn" data-toggle='modal'
								data-target='#registrationConplete'>Submit</button>
						</div>
					</div>
				</div>
			</form>
		</div>

		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>

	<!--	
		<div id="registrationConplete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="signUpLabel">Registration complete</h3>
			</div>
			
			<div class="modal-body">
				<p>
					Your form has been submited to the administrator.<br />
					You will be able to connect once he accepted your form.
				</p>
			</div>
			
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
    -->
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
