<!DOCTYPE html>
<html>
<head>
    <title>University Newsletter Management</title>
    <script src="holder/holder.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
     <style type="text/css">
	     .table th, .table td {
	        text-align:center;
	      }
	      
	    body {
        	padding-top: 60px;
        	padding-bottom: 40px;
      	}
      	.ajust {margin-top: 100px;}
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
              <li class="active"><a href="index.php">University</a></li>
              <li><a href="interns.php">Interns</a></li>
              <li><a href="newsletter.php">Newsletter</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
    			<div class="btn-group">
					<button class="btn btn-small btn btn-info" type="button"><i class="icon-plus"></i> Add a Newsletter</button>
    			</div>
	    		<table class="table table-hover">
		    		<thead>
			    		<tr>
			    			<th>Cover</th>
				    		<th>#</th>
				    		<th><a><i class="icon-chevron-up"></i> Name</a></th>
				    		<th>Description</th>
				    		<th><a><i class="icon-chevron-up"></i> Created on</a></th>
				    		<th><a><i class="icon-chevron-up"></i> Checking State</a></th>
				    		<th>View Details</th>
			    		</tr>
		    		</thead>
		    		<tbody>
		    		<tr class="success">
		    				<td><img class="media-object" src="./img/ban.png"/></td>
			    			<td>1</td>
			    			<td>News 1</td>
			    			<td>Description of INternship UK first try</td>
			    			<td>07/07/2013</td>
			    			<td>Approved</td>
			    			<td><a href='#myModal' data-toggle='modal'>Click here</a></td>
			    		</tr>
			    		<tr class="error">
			    			<td><img class="media-object" src="./img/ban.png"/></td>
			    			<td>1</td>
			    			<td>News 1</td>
			    			<td>Description of INternship UK first try</td>
			    			<td>07/07/2013</td>
			    			<td>Wrong</td>
			    			<td><a href='#myModal' data-toggle='modal'>Click here</a></td>
			    		</tr>
			    		<tr class="warning">
			    			<td><img class="media-object" src="./img/ban.png"/></td>
			    			<td>1</td>
			    			<td>News 1</td>
			    			<td>Description of INternship UK first try</td>
			    			<td>07/07/2013</td>
			    			<td>Waiting</td>
			    			<td><a href='#myModal' data-toggle='modal'>Click here</a></td>
			    		</tr>
			    		<?php 
			    		for($i=4;$i<=40;$i++)
			    		{
			    			echo "<tr>
			    			<td><img class='media-object' data-src='holder/holder.js/80x100'/></td>
			    			<td>".$i."</td>
			    			<td>News 1</td>
			    			<td>Description of INternship UK first try</td>
			    			<td>07/07/2013</td>
			    			<td>Sent</td>
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
			<h3 id="myModalLabel">Newsletter Name</h3>
		</div>
		<div class="modal-body">
						    <div class="media">
    <a class="pull-left" href="#">
    <img class="media-object" data-src="holder/holder.js/150x200">
    </a>
    
    <div class="media">
    Description: Description of INternship UK first try
    File: /xsp/file/news/fichier.pdf
    Status: Waiting
    Receiver: University1, University2
    </div>
    </div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>