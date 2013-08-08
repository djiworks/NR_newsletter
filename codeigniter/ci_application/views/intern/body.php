<div class="container">
	<input type="hidden"  name="tmpId" id="tmpId"  value=""/>

		<button class="btn btn-small btn btn-info" type="button"
			data-toggle='modal' data-target='#addIntern'>
			<i class="icon-plus"></i> Add an Intern
		</button>

		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Mail</th>
					<th>University</th>
					<th>Country</th>
					<th>Work until</th>
					<th>View Details</th>
				</tr>
			</thead>
			<tbody>
				<?php echo $allInterns; ?>
	    		</tbody>
		</table>
	</div>



	<!-- Modal -->
	<div id="viewDetails" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-remote="" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true" onclick="window.location.href = '/index.php/intern/intern';">x</button>
			<h3 id="myModalLabel">Intern Name</h3>
		</div>
		<div class="modal-body">

		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '/index.php/intern/intern';">Close</button>
		</div>
	</div>
	
	
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="myModalLabel">Intern Name</h3>
		</div>
		<div class="modal-body">
			ID: 3<br /> Address: 3 Littlestone Road, New Romney, England<br />
			Phone: 0000 000 000<br /> Mail: example@mail.com<br /> Country:
			France<br /> University: University1
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>


	<div id="addIntern" class="modal hide fade" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="addInternLabel">Add an Intern</h3>
		</div>
		<div class="modal-body">
			<form method="post" action="/index.php/intern/intern/verificationAddIntern" class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="inputName">First name</label>
					<div class="controls">
						<input type="text" id="FirstName" name="FirstName" placeholder="First name" value="<?php echo set_value('FirstName'); ?>"/>
							<?php echo form_error('FirstName'); ?> 
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputName">Last name</label>
					<div class="controls">
						<input type="text" id="LastName" name="LastName" placeholder="Last name" value="<?php echo set_value('LastName'); ?>"/>
							<?php echo form_error('LastName'); ?> 
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputEmail">Email</label>
					<div class="controls">
						<input type="text" id="Mail" name="Mail" placeholder="Mail" value="<?php echo set_value('Mail'); ?>"/>
							<?php echo form_error('Mail'); ?> 
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputPhone">Phone</label>
					<div class="controls">
						<input type="text" id="Phone" name="Phone" placeholder="Phone" value="<?php echo set_value('Phone'); ?>"/>
							<?php echo form_error('Phone'); ?> 
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="Country">Country</label>
					<div class="controls">
							<input class="span2" type="text" id="Country" name="Country"
								placeholder="Country" data-provide="typeahead" data-items="4"
								data-source= <?php echo $allCountries; ?>
								autocomplete="off" value="<?php echo set_value('Country'); ?>"/>
							<?php echo form_error('Country'); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="WorkedUntil">Worked until</label>
					<div class="controls">
						<input type="text" id="WorkedUntil" name="WorkedUntil" placeholder="ex : 2014-05-21" value="<?php echo set_value('WorkedUntil'); ?>"/>
							<?php echo form_error('WorkedUntil'); ?>
					</div>
				</div>

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
	
	<div id="modifyIntern" class="modal hide fade" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true" onclick="window.location.href = '/index.php/intern/intern';">x</button>
			<h3 id="addInternLabel">Modify an Intern</h3>
		</div>
		<div class="modal-body">
			
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '/index.php/intern/intern';">Close</button>
		</div>
	</div>

	<div id="success" class="modal hide fade">
	<div class="modal-header">
	<h4>Success</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '/index.php/intern/intern';">&times;</button>
	</div>
	<div class="modal-body">
	<p>Intern added with success.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" class="close" data-dismiss="modal" onclick="window.location.href = '/index.php/intern/intern';">Close</button>
	</div>
	</div>
	
	
	<div id="failure" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" data-toggle='modal' data-target='#addIntern' aria-hidden="true">&times;</button>
	<h4>Failure</h4>
	</div>
	<div class="modal-body">
	<p>Failed to add intern. Please fill in all the fields.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" data-toggle='modal' data-target='#addIntern'>Close</button>	
	</div>
	</div>
	
	<div id="confirmDeletion" class="modal hide fade">
	<form method="post" id="deleteUserForm" action="/index.php/intern/intern/deleteIntern" class="form-horizontal">
	<div class="modal-header">
	<input type="hidden"  name="confirmDeletionId" id="confirmDeletionId"  value=""/>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '/index.php/intern/intern';">&times;</button>
	<h4>Confirm deletion</h4>
	</div>
	<div class="modal-body">
	<p>Are you sure you want to delete that intern ?</p>
	</div>
	<div class="modal-footer">
	<button type="submit" class="btn">Yes</button>
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '/index.php/intern/intern';">Cancel</button>
	</div>
	</form>
	</div>
	
	<div id="success_deletion" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '/index.php/intern/intern';">&times;</button>
	<h4>Success</h4>
	</div>
	<div class="modal-body">
	<p>Intern deleted with success.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '/index.php/intern/intern';">Close</button>
	</div>
	</div>
	
	<div id="success_modify" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href = '/index.php/intern/intern';">&times;</button>
	<h4>Success</h4>
	</div>
	<div class="modal-body">
	<p>Intern modified with success.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" onclick="window.location.href = '/index.php/intern/intern';">Close</button>
	</div>
	</div>
