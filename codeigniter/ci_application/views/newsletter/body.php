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
		    </tbody>
		</table>
	</div>
	<!-- Modal -->
	<div id="success" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
	<h4>Success</h4>
	</div>
	<div class="modal-body">
	<p>Newsletter added with success.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" class="close" data-dismiss="modal" >Close</button>
	</div>
	</div>
