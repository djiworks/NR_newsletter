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
		
		<table class="table table-hover">
    		<thead>
	    		<tr>
	    			<th><a><i class="icon-chevron-down"></i>Login</a></th>
	    			<th><a><i class="icon-chevron-down"></i>Firstname</a></th>
		    		<th>Lastname</th>
		    		<th>Mail</th>
		    		<th>Phone</th>
		    		<th>Country</th>
		    		<th><a><i class="icon-chevron-down"></i>Rights</a></th>
		    		<th>Verified</th>
	    		</tr>
    		</thead>
    		<tbody>
    			<tr class="success">
	    			<td>USR1</td>
	    			<td>User</td>
	    			<td>No1</td>
	    			<td>example@mail.com</td>
	    			<td>0000 000 000</td>
	    			<td>France</td>
	    			<td>
					    <select name="Right" id="Right" class="input-medium">
							<option value="NoRef">No status</option>
							<option value="User" selected>User</option>
							<option value="Manager">Manager</option>
							<option value="Admin">Admin</option>
						</select>
	    			</td>
	    			<td><i class="icon-ok"></i></td>
	    		</tr>
	    		<tr class="success">
	    			<td>USR2</td>
	    			<td>User</td>
	    			<td>No2</td>
	    			<td>example@mail.com</td>
	    			<td>0000 000 000</td>
	    			<td>France</td>
	    			<td>
			            <select name="Right" id="Right" class="input-medium">
							<option value="NoRef">No status</option>
							<option value="User">User</option>
							<option value="Manager" selected>Manager</option>
							<option value="Admin">Admin</option>
						</select>
	    			</td>
	    			<td><i class="icon-ok"></i></td>
	    		</tr>
	    		<tr class="info">
	    			<td>USR3</td>
	    			<td>User</td>
	    			<td>No3</td>
	    			<td>example@mail.com</td>
	    			<td>0000 000 000</td>
	    			<td>France</td>
	    			<td>
						<select name="Right" id="Right" class="input-medium">
							<option value="NoRef" selected>No status</option>
							<option value="User">User</option>
							<option value="Manager">Manager</option>
							<option value="Admin">Admin</option>
						</select>
	    			</td>
	    			<td><i class="icon-remove"></i></td>
	    		</tr>
    		</tbody>
    	</table>
    	
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="./bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
