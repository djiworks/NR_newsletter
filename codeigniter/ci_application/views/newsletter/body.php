	<div class="container">
		<input type="hidden"  name="hasToRefresh" id="hasToRefresh"  value="0"/>

		<div class="btn-group">
					<?php if($role<=3)
				{echo '
			<button class="btn btn-small btn btn-info" type="button"
				onclick="window.location.href = \''.base_url("index.php/newsletter/newsletter/addNewsletter").'\';"
				<i class="icon-plus"></i> Add a Newsletter
			</button>';} ?>
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
	</div>
	</div>

	<!-- Modal -->
	<div id="viewDetails" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-remote="" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true" >x</button>
			<h3 id="myModalLabel">Newsletter Details</h3>
		</div>
		<div class="modal-body">

		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
	
	<div id="success" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
	<h4>Success</h4>
	</div>
	<div class="modal-body">
	<p>Newsletter added with success.</p>
	</div>
	<div class="modal-footer">
	<button class="btn close" type="button" data-dismiss="modal" >Close</button>
	</div>
	</div>
	
	<div id="success_modify" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '<?php echo base_url('index.php/newsletter/newsletter'); ?>';">&times;</button>
	<h4>Success</h4>
	</div>
	<div class="modal-body">
	<p>Newsletter modified with success.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '<?php echo base_url('index.php/newsletter/newsletter'); ?>';">Close</button>
	</div>
	</div>

	<div id="success_deletion" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '<?php echo base_url('index.php/newsletter/newsletter'); ?>';">&times;</button>
	<h4>Success</h4>
	</div>
	<div class="modal-body">
	<p>Newsletter deleted with success.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '<?php echo base_url('index.php/newsletter/newsletter') ?>';">Close</button>
	</div>
	</div>
	
	<div id="confirmDeletion" class="modal hide fade">
	<form method="post" id="deleteNewsletterForm" action="<?php echo base_url("index.php/newsletter/newsletter/deleteNewsletter"); ?>" class="form-horizontal">
	<div class="modal-header">
	<input type="hidden"  name="confirmDeletionId" id="confirmDeletionId"  value=""/>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '<?php echo base_url('index.php/newsletter/newsletter'); ?>';">&times;</button>
	<h4>Confirm deletion</h4>
	</div>
	<div class="modal-body">
	<p>Are you sure you want to delete that newsletter ?</p>
	</div>
	<div class="modal-footer">
	<button type="submit" class="btn">Yes</button>
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '<?php echo base_url('index.php/newsletter/newsletter'); ?>';">Cancel</button>
	</div>
	</form>
	</div>
	
	<div id="failure" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" data-toggle='modal' data-target='#addIntern' aria-hidden="true">&times;</button>
	<h4>Failure</h4>
	</div>
	<div class="modal-body">
	<p>Failed to add newsletter. Please fill in all the fields.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" data-toggle='modal' data-target='#addIntern'>Close</button>	
	</div>
	</div>
