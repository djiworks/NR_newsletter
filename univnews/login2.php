<!DOCTYPE html>
<html>
	<head>
		<title>University Newsletter Management</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<style type="text/css">
			body {
				padding-top: 40px;
				padding-bottom: 40px;
			}

			.form-signin {
				max-width: 300px;
				margin: 100px auto 20px;
			}
			.form-signin .form-signin-heading,
			.form-signin .checkbox {
				margin-bottom: 10px;
			}
			.form-signin input[type="text"],
			.form-signin input[type="password"] {
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
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="brand" href="index.php">University Newsletter Management</a>
				</div>
			</div>
		</div>
		
		<div class="container">
			<form class="form-signin input-xlarge">
				<h2 class="form-signin-heading">Please sign in</h2>
				<input type="text" class="input-block-level" placeholder="Email address">
				<input type="password" class="input-block-level" placeholder="Password">
				<button class="btn btn-large btn-primary" type="submit">Log in</button>
				<button class="btn btn-large btn-primary pull-right" type="submit">Sign up</button>
			</form>
		</div>
    
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="./bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
