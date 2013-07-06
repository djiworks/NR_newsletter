<!DOCTYPE html>
<html>
<head>
    <title>University Newsletter Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
     <style type="text/css">
	     .table th, .table td {
	        text-align:center;
	      }
	      
	      .container {
	      		margin-top: 60px;
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
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p>
            <ul class="nav">
              <li><a href="index.php">University</a></li>
              <li class="active"><a href="interns.php">Interns</a></li>
              <li><a href="newsletter.php">Newsletter</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    	<div class="container">
    		
				<button class="btn btn-small btn btn-info" type="button"><i class="icon-plus"></i> Add an Intern</button>
			    
	    	<table class="table table-hover table-striped">
	    		<thead>
		    		<tr>
			    		<th>#</th>
			    		<th>Name</th>
			    		<th>Address</th>
			    		<th>Phone</th>
			    		<th>Mail</th>
			    		<th>University</th>
			    		<th>Country</th>
			    		<th>View Details</th>
		    		</tr>
	    		</thead>
	    		<tbody>
		    		<?php 
		    		for($i=1;$i<=50;$i++)
		    		{
		    			echo "<tr>
		    			<td>".$i."</td>
		    			<td>Intern ".$i."</td>
		    			<td>3 Littlestone Road, New Romney, England</td>
		    			<td>0000 000 000</td>
		    			<td>example@mail.com</td>
		    			<td>University 1</td>
		    			<td>France</td>
		    			<td><a href='#myModal' data-toggle='modal'>Click here</a></td>
		    		</tr>";
		    		}
		    		?>
	    		</tbody>
	    	</table>
    	</div>
    	
    	
    	
    	<!-- Modal -->
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3 id="myModalLabel">Intern Name</h3>
		</div>
		<div class="modal-body">
						ID: 3<br/>
		    			Address: 3 Littlestone Road, New Romney, England<br/>
		    			Phone: 0000 000 000<br/>
		    			Mail: example@mail.com<br/>
		    			Country: France<br/>
		    			University: University1
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>