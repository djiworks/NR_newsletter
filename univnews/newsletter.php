<!DOCTYPE html>
<html>
<head>
    <title>University Newsletter Management</title>
    <script src="holder/holder.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="./tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
	tinymce.init({
		mode : "specific_textareas",
        editor_selector : "myTextEditor",
	    theme: "modern",
	    plugins: [
	              "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	              "searchreplace wordcount visualblocks visualchars code fullscreen",
	              "insertdatetime media nonbreaking save table contextmenu directionality",
	              "emoticons template paste textcolor"
	          ],
	    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	    toolbar2: "print preview media | forecolor backcolor emoticons | code",
	    image_advtab: true,
	    templates: [
	        {title: 'Test template 1', content: 'Test 1'},
	        {title: 'Test template 2', content: 'Test 2'}
	    ]
	});
	</script>
    
    
     <style type="text/css">
	     .table th, .table td {
	        text-align:center;
	      }
	      
	    body {
        	padding-top: 60px;
        	padding-bottom: 40px;
      	}
      	.ajust {margin-top: 100px;}
      	
      	.modal-body {
    max-height: 520px;
}

      	#sendingbox 
{
    width: 800px; 
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
              <li><a href="interns.php">Interns</a></li>
              <li class="active"><a href="newsletter.php">Newsletter</a></li>
              <li><a href="guidelines.php"><i class="icon-question-sign icon-white"></i>&nbsp;Guidelines</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
    			<div class="btn-group">
					<button class="btn btn-small btn btn-info" type="button" onclick="window.location.href = 'mail.php';"><i class="icon-plus"></i> Add a Newsletter</button>
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
	
	<div id="sendingbox" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3 id="myModalLabel">New Newsletter</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" name="add" action="newsletter.php" method="GET" id="addnews">
			    
			    <div class="control-group">
				    <label class="control-label" for="nam">Name (will be the object field of mail):</label>
				    <div class="controls">
				    	<input type="text" id="nam" placeholder="Email" name="koko">
				    </div>
			    </div>
			    
			    <div class="control-group">
				    <label class="control-label" for="inputEmail">Description:</label>
				    <div class="controls">
				    	<textarea rows="3" name="koko" id="inputEmail" placeholder="Email"></textarea>
				    </div>
			    </div>
		    
		    	<div class="control-group">
				    <label class="control-label" for="inputEmail">Path:</label>
				    <div class="controls">
				    	<input type="file" id="inputEmail" placeholder="Email" name="koko">
				    </div>
			    </div>
			    
			    <div class="control-group">
				    <label class="control-label" for="inputEmail">Cover:</label>
				    <div class="controls">
				    	<input type="file" id="inputEmail" placeholder="Email" name="koko">
				    </div>
			    </div>
			    
				   Content:
				    <textarea class="myTextEditor"></textarea>
		    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button class="btn btn-primary" type="submit" form="addnews">Save</button>
		</div>
	</div>
	
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
