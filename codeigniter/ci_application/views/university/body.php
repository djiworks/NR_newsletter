			<div class="span10">
				<div class="btn-group">
					<button class="btn btn-small btn btn-info" type="button"
						 onclick="window.location.href = '/index.php/university/university/addUniversity';">
						<i class="icon-plus"></i> Add University
					</button>
					<button class="btn btn-small" onclick="selectAll()">Check All</button>
					<button class="btn btn-small" onclick="unselectAll()">Uncheck All</button>
				</div>
				<form method="post" action="#" class="form-search pull-right">
					<i class="icon-search"></i>
					<div class="input-append">
						<input type="text" id="inputSearchUniv" class="input-medium search-query" placeholder="Search ...">
						<button type="submit" class="btn">Search</button>
					</div>
				</form>
				
				<div class="accordion" id="accordion">
					<div class="navbar navbar-inverse">
						<div class="container-fluid">
							<div class="nav-collapse collapse">
								<ul class="nav wrapTabColName">
									<li class="classToSend">To Send</li>
									<li class="classNumber">#</li>
									<li class="className"><i class="icon-chevron-down"></i> Name</li>
									<li class="classAddress"><i class="icon-chevron-down"></i>Address</li>
									<li class="classCountry"><i class="icon-chevron-down"></i> Country</li>
									<li class="classSubscription"><i class="icon-chevron-down"></i> Subcription</li>
									<li class="classChkState"><i class="icon-chevron-down"></i> Checking State</li>
									<li class="classDetails"></li>
									<li class="divider"></li>
								</ul>
							
								<br />
										
								<?php echo $allUniv; ?>
							</div>
						</div>
					</div>
				</div>
				
		    	<div class="btn-group">
					<button class="btn btn-small btn btn-info" type="button"  onclick="window.location.href = '/index.php/university/university/addUniversity';">
						<i class="icon-plus"></i> Add University
					</button>					<button class="btn btn-small" onclick="selectAll()">Check All</button>
					<button class="btn btn-small" onclick="unselectAll()">Uncheck All</button>
    			</div>
		    </div>
		</div>
	</div>

	<!-- Modals -->

	<div id="modifyUniversity" class="modal hide fade" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="modifyUniversityLabel">Add University</h3>
		</div>
		<div class="modal-body">
			<form method="post" action="/index.php/university/university/modifyUniversity" class="form-horizontal">
				TODO reprendre addUniversity nouvelle version

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

	<div id="sendingbox" class="modal hide fade" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="myModalLabel">Prepare to send Newsletter</h3>
		</div>
		
		<form method="post" id="sendNewsletter" action="/index.php/university/university/sendNewsletter" class="form-horizontal">
		<div class="modal-body">

			<label>Select the newsletter to send:</label>
			 <select>
					<?php echo $newsletterList; ?>
			</select>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button type="submit" class="btn">Confirm</button>
<!--
			<button class="btn btn-info"
				onclick="$('#sendingbox2').modal('show');$('#sendingbox').modal('hide')">Confirm</button>
-->
			</form>
		</div>
	</div>

	<div id="sendingbox2" class="modal hide fade" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="myModalLabel">Ready to send Newsletter - Preview</h3>
		</div>
		<div class="modal-body">
			<h3>Object: Newsletter Name</h3>
			<h3>Content:</h3>
			newsletter contents in html
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button class="btn btn-info">
				<i class="icon-envelope icon-white"></i> Send Now
			</button>
		</div>
	</div>

	<div id="success" class="modal hide fade">
	<div class="modal-header">
	<h4>Success</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '/index.php/university/university';">&times;</button>
	</div>
	<div class="modal-body">
	<p>University added with success.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '/index.php/university/university';">Close</button>
	</div>
	</div>
	
	<div id="success_deletion" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '/index.php/university/university';">&times;</button>
	<h4>Success</h4>
	</div>
	<div class="modal-body">
	<p>University deleted with success.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '/index.php/university/university';">Close</button>
	</div>
	</div>

	<div id="confirmDeletion" class="modal hide fade">
	<div class="modal-header">

	<form method="post" id="deleteUserForm" action="/index.php/university/university/deleteUniversity" class="form-horizontal">

	<input type="hidden"  name="confirmDeletionId" id="confirmDeletionId"  value="">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '/index.php/university/university';">&times;</button>
	<h4>Confirm deletion</h4>
	</div>
	<div class="modal-body">
	<p>Are you sure you want to delete that university ?</p>
	</div>
	<div class="modal-footer">
	<button type="submit" class="btn">Yes</button>

	</form>
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '/index.php/university/university';">Cancel</button>

	</div>
	</div>
