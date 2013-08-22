		<form method="post" action="/index.php/university/university/verificationAddUniversity" class="form-horizontal">
			<table id="tableFormAddUniversity">
				<tr>
					<td id="cellUniversity">
						<div id="blockAddUniversity">
							<h3 id="addUniversityLabel">Add a University</h3>
							<div>
								<div class="control-group">
									<label class="control-label" for="inputName">University Name</label>
									<div class="controls">
										<input type="text" id="UniversityName" name="UniversityName" placeholder="University Name" value="<?php echo $univName; ?>" />
										<?php echo form_error('UniversityName'); ?>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputAddress">Address</label>
									<div class="controls">
										<textarea rows="3" name="Adress" placeholder="Address" ><?php echo $univAddress; ?></textarea>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputCountry">Country</label>
									<div class="controls">
										<input class="span2" type="text" id="inputCountry" name="inputCountry"
										placeholder="Country" data-provide="typeahead" data-items="4"
										data-source= <?php echo $allCountries; ?> 
										autocomplete="off" value="<?php echo $univCountry; ?>"/>
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
											autocomplete="off" value="<?php echo $univIntern; ?>"/>
											<?php echo form_error('inputIntern'); ?>
											<button class="btn btn-success" type="button" id="button2AddIntern">
												<i class="icon-plus icon-white"></i>
											</button>
										</div>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="buttonAddContact">Add a contact</label>
									<div class="controls">
										<button class="btn btn-success" type="button" id="buttonAddContact">
											<i class="icon-plus icon-white"></i>
										</button>
									</div>
								</div>
								
								<div class="control-group">
									<div class="controls">
										<input type="hidden" id="nbContact2Add" name="nbContact2Add" />
									</div>
								</div>
								
								<div class="control-group">
									<div class="controls">
										<input type="hidden" id="nbInputPhoneMail" name="nbInputPhoneMail" />
									</div>
								</div>
								
								<div class="control-group">
									<div class="controls">
										<button type="submit" class="btn" onclick="saveArrayNbInput()">Submit</button>
									</div>
								</div>
							</div>
						</div>
					</td>
					<td id="cellContact">
						<div class='modal-header'>
							<h4 id='addUniversityLabel'>Add a contact for this university</h4>
						</div>
						
						<div class='accordion' id='accordion'>
							<?php echo $univContactList; ?>
						</div>
					</td>
				</tr>
			</table>
		</form>
		
		<!-- Modals -->
		<div id="failure" class="modal hide fade">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Failure</h4>
			</div>
			<div class="modal-body">
				<p>Failed to add university. Please fill in all the fields.</p>
			</div>
			<div class="modal-footer">
				<button class="btn" type="button" data-dismiss="modal" >Close</button>	
			</div>
		</div>
