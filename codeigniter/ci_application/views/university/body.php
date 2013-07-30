			<div class="span10">
				<div class="btn-group">
					<button class="btn btn-small btn btn-info" type="button"
						data-toggle='modal' data-target='#addUniversity'>
						<i class="icon-plus"></i> Add an University
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
									<li class="className"><a><i class="icon-chevron-down"></i> Name</a></li>
									<li class="classAddress">Address</li>
									<li class="classCountry"><a><i class="icon-chevron-down"></i> Country</a></li>
									<li class="classSubscription"><a><i class="icon-chevron-up"></i> Subcription</a></li>
									<li class="classChkState"><a><i class="icon-chevron-down"></i> Checking State</a></li>
									<li class="classDetails">View Details</li>
									<li class="divider"></li>
								</ul>
							
								<br />
										
								<?php echo $allUniv; ?>
							</div>
						</div>
					</div>
				</div>
				
		    	<div class="btn-group">
					<button class="btn btn-small btn btn-info" type="button" data-toggle='modal' data-target='#addUniversity'>
						<i class="icon-plus"></i> Add an University
					</button>					<button class="btn btn-small" onclick="selectAll()">Check All</button>
					<button class="btn btn-small" onclick="unselectAll()">Uncheck All</button>
    			</div>
		    </div>
		</div>
	</div>

	<!-- Modals -->

	<div id="viewdetail" class="modal hide fade" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="myModalLabel">University Name</h3>
		</div>
		<div class="modal-body">
			ID: 3<br /> Address: 3 Littlestone Road, New Romney, England<br />
			Phone: 0000 000 000<br /> Mail: example@mail.com<br /> Country:
			France<br /> Susbcription: Yes<br /> Checking State: Yes<br />
			Interns: Interns1, Interns2, Interns3
		</div>
		<input class="btn" type="button" value="Modify"> <input class="btn"
			type="button" value="Delete">
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>

	<div id="addUniversity" class="modal hide fade" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="addUniversityLabel">Add an University</h3>
		</div>
		<div class="modal-body">
			<form method="post" action="/index.php/university/university/verificationAddUniversity" class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="inputName">University Name</label>
					<div class="controls">
						<input type="text" id="UniversityName" name="UniversityName" placeholder="University Name" value="<?php echo set_value('UniversityName'); ?>" />
						<?php echo form_error('UniversityName'); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputAddress">Address</label>
					<div class="controls">
						<textarea rows="3" name="Adress" placeholder="Address" ><?php if(isset($address)){echo $address ;} ?></textarea>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputCountry">Country</label>
					<div class="controls">
							<input class="span2" type="text" id="inputCountry" name="inputCountry"
								placeholder="Country" data-provide="typeahead" data-items="4"
								data-source= <?php echo $allCountries; ?>
								autocomplete="off" value="<?php echo set_value('inputCountry'); ?>"/>
							<?php echo form_error('inputCountry'); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputIntern">Intern</label>
					<div class="controls">
						<div class="input-append">
							<input class="span2" type="text" id="inputIntern" name="inputIntern"
								placeholder="Intern" data-provide="typeahead" data-items="4"
								data-source= <?php echo $allNames; ?>
								autocomplete="off" value="<?php echo set_value('inputIntern'); ?>"/>
							<?php echo form_error('inputIntern'); ?>
							<button class="btn btn-success" type="button">
								<i class="icon-plus icon-white"></i>
							</button>
						</div>
					</div>
				</div>
				
				<div class="modal-header">
					<h4 id="addUniversityLabel">Add a contact for this university</h4>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="inputNameContact">Contact name</label>
					<div class="controls">
						<input type="text" id="inputNameContact" name="inputNameContact" placeholder="Contact name" value="<?php echo set_value('inputNameContact'); ?>"/>
							<?php echo form_error('inputNameContact'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="inputInfoContact">Additional Information</label>
					<div class="controls">
						<textarea rows="3" name="inputInfoContact" placeholder="Additional Information"><?php if(isset($inputInfoContact)){echo $inputInfoContact ;} ?></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="inputEmail">Email</label>
					<div class="controls">
						<input type="text" id="inputEmail" name="inputEmail" placeholder="Email" value="<?php echo set_value('inputEmail'); ?>"/>
							<?php echo form_error('inputEmail'); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputPhone">Phone</label>
					<div class="controls">
						<input type="text" id="inputPhone" name="inputPhone" placeholder="Phone" value="<?php echo set_value('inputPhone'); ?>"/>
							<?php echo form_error('inputPhone'); ?>
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


	<div id="sendingbox" class="modal hide fade" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">x</button>
			<h3 id="myModalLabel">Prepare to send Newsletter</h3>
		</div>
		<div class="modal-body">
			<label>Select the newsletter to send:</label> <select>
				<option>1 - Newsletter One</option>
				<option>2 - Newsletter Two</option>
				<option>3 - Newsletter Three</option>
				<option>4 - Newsletter Four</option>
				<option>5 - Newsletter Five</option>
			</select>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button class="btn btn-info"
				onclick="$('#sendingbox2').modal('show');$('#sendingbox').modal('hide')">Confirm</button>
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
	<button class="btn" type="button" class="close" data-dismiss="modal" onclick="window.location.href = '/index.php/university/university';">Close</button>
	</div>
	</div>
	
	
	<div id="failure" class="modal hide fade">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" data-toggle='modal' data-target='#addUniversity' aria-hidden="true">&times;</button>
	<h4>Failure</h4>
	</div>
	<div class="modal-body">
	<p>Failed to add university. Please fill in all the fields.</p>
	</div>
	<div class="modal-footer">
	<button class="btn" type="button" data-dismiss="modal" data-toggle='modal' data-target='#addUniversity'>Close</button>	
	</div>
	</div>
