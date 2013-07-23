	<div class="container">
		<div class="btn-group">
			<button class="btn btn-small btn btn-info" type="button"
				onclick="window.location.href = '/index.php/newsletter/newsletter/mail';">
				<i class="icon-plus"></i> Add a Newsletter
			</button>
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
				<?php echo $allNews; ?>
				<!--<tr class="success">
					<td><img class="media-object" src="/assets/images/ban.png" /></td>
					<td>1</td>
					<td>News 1</td>
					<td>Description of Internship UK first try</td>
					<td>07/07/2013</td>
					<td>Approved</td>
					<td><a href='#myModal' data-toggle='modal'>Click here</a></td>
				</tr>
				<tr class="error">
					<td><img class="media-object" src="/assets/images/ban.png" /></td>
					<td>1</td>
					<td>News 1</td>
					<td>Description of Internship UK first try</td>
					<td>07/07/2013</td>
					<td>Wrong</td>
					<td><a href='#myModal' data-toggle='modal'>Click here</a></td>
				</tr>
				<tr class="warning">
					<td><img class="media-object" src="/assets/images/ban.png" /></td>
					<td>1</td>
					<td>News 1</td>
					<td>Description of Internship UK first try</td>
					<td>07/07/2013</td>
					<td>Waiting</td>
					<td><a href='#myModal' data-toggle='modal'>Click here</a></td>
				</tr>
			    		<?php
									for($i = 4; $i <= 40; $i ++) {
										echo "<tr>
			    			<td><img class='media-object' data-src='/assets/holder/holder.js/80x100'/></td>
			    			<td>" . $i . "</td>
			    			<td>News 1</td>
			    			<td>Description of INternship UK first try</td>
			    			<td>07/07/2013</td>
			    			<td>Sent</td>
			    			<td><a href='#myModal' data-toggle='modal'>Click here</a></td>
			    		</tr>";
									}
									?>-->
		    		</tbody>
		</table>
	</div>
	<!-- Modal -->
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="myModalLabel">Newsletter Name</h3>
		</div>
		<div class="modal-body">
			<div class="media">
				<a class="pull-left" href="#"> <img class="media-object"
					data-src="/assets/holder/holder.js/150x200">
				</a>
				<div class="media">Description: Description of INternship UK first
					try File: /xsp/file/news/fichier.pdf Status: Waiting Receiver:
					University1, University2</div>
			</div>
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
			<h3 id="myModalLabel">New Newsletter</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" name="add" action="newsletter.php"
				method="GET" id="addnews">

				<div class="control-group">
					<label class="control-label" for="inputName">Name (will be the
						object field of mail):</label>
					<div class="controls">
						<input type="text" id="inputName" placeholder="Name"
							name="inputName">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputDescription">Description:</label>
					<div class="controls">
						<textarea rows="3" name="inputDesc" id="inputDescription"
							placeholder="Description"></textarea>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputPath">Path:</label>
					<div class="controls">
						<input type="file" id="inputPath" placeholder="Path"
							name="inputPath">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputCover">Cover:</label>
					<div class="controls">
						<input type="file" id="inputCover" placeholder="Cover"
							name="inputCover">
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
