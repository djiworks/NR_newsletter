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
				<li class="divider-vertical"></li>
				<li><a href="admin.php">Administration</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
			<form class="form-horizontal" name="add" action="newsletter.php" method="GET" id="addnews">
			    
			    <div class="control-group">
				    <label class="control-label" for="inputName">Name (will be the object field of mail):</label>
				    <div class="controls">
				    	<input type="text" id="inputName" placeholder="Name" name="inputName">
				    </div>
			    </div>
			    
			    <div class="control-group">
				    <label class="control-label" for="inputDescription">Description:</label>
				    <div class="controls">
				    	<textarea rows="3" name="inputDesc" id="inputDescription" placeholder="Description"></textarea>
				    </div>
			    </div>
		    
		    	<div class="control-group">
				    <label class="control-label" for="inputPath">Path:</label>
				    <div class="controls">
				    	<input type="file" id="inputPath" placeholder="Path" name="inputPath">
				    </div>
			    </div>
			    
			    <div class="control-group">
				    <label class="control-label" for="inputCover">Cover:</label>
				    <div class="controls">
				    	<input type="file" id="inputCover" placeholder="Cover" name="inputCover">
				    </div>
			    </div>
			    
				Content:
				<textarea class="myTextEditor"></textarea>
		    </form>
		</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
