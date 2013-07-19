			<div class="span10">
				<div class="btn-group">
					<button class="btn btn-small btn btn-info" type="button"
						data-toggle='modal' data-target='#addUniversity'>
						<i class="icon-plus"></i> Add an University
					</button>
					<button class="btn btn-small" onclick="selectAll()">Check All</button>
					<button class="btn btn-small" onclick="unselectAll()">Uncheck All</button>
				</div>
				<form class="form-search pull-right">
					<i class="icon-search"></i>
					<div class="input-append">
						<input type="text" class="input-medium search-query"
							placeholder="Search ...">
						<button type="submit" class="btn">Search</button>
					</div>
				</form>
	    		<table class="table table-hover" id="displayUnivList">
		    		<thead>
			    		<tr>
			    			<th>To Send</th>
				    		<th>#</th>
				    		<th><a><i class="icon-chevron-down"></i> Name</a></th>
				    		<th>Address</th>
				    		<th>Phone</th>
				    		<th>Mail</th>
				    		<th><a><i class="icon-chevron-down"></i> Country</a></th>
				    		<th><a><i class="icon-chevron-up"></i> Subcription</a></th>
				    		<th><a><i class="icon-chevron-down"></i> Checking State</a></th>
				    		<th>View Details</th>
			    		</tr>
		    		</thead>
		    		<tbody>
						<tr class="success" >
							<td><input type='checkbox' id="chk1" onclick="selectedUniv('University 1', '1')"></td>
							<td>1</td>
							<td>University OK</td>
							<td>3 Littlestone Road, New Romney, England</td>
							<td>0000 000 000</td>
							<td>example@mail.com</td>
							<td>France</td>
							<td>Yes</td>
							<td>Approved</td>
							<td><a href='#viewdetail' data-toggle='modal'>Click here</a></td>
						</tr>
						<tr class="error">
							<td>N/A</td>
							<td>2</td>
							<td>University doesn't work</td>
							<td>3 Littlestone Road, New Romney, England</td>
							<td>0000 000 000</td>
							<td>example@mail.com</td>
							<td>France</td>
							<td>Yes</td>
							<td>Wrong</td>
							<td><a href='#viewdetail' data-toggle='modal'>Click here</a></td>
						</tr>
						<tr class="warning">
							<td>N/A</td>
							<td>3</td>
							<td>University waiting for</td>
							<td>3 Littlestone Road, New Romney, England</td>
							<td>0000 000 000</td>
							<td>example@mail.com</td>
							<td>France</td>
							<td>Yes</td>
							<td>Waiting</td>
							<td><a href='#viewdetail' data-toggle='modal'>Click here</a></td>
						</tr>
			    		<?php 
			    		for($i=4;$i<=80;$i++)
			    		{
			    			echo "<tr>
			    			<td><input type='checkbox' id='chk".$i."' onclick=\"selectedUniv('University ".$i."', '".$i."')\"></td>
			    			<td>".$i."</td>
			    			<td>University ".$i."</td>
			    			<td>3 Littlestone Road, New Romney, England</td>
			    			<td>0000 000 000</td>
			    			<td>example@mail.com</td>
			    			<td>France</td>
			    			<td>Yes</td>
			    			<td>Approved</td>
			    			<td><a href='#viewdetail' data-toggle='modal'>Click here</a></td>
			    		</tr>";
									}
									?>
		    		</tbody>
		    	</table>
		    	<div class="btn-group">
					<button class="btn btn-small btn btn-info" type="button"><i class="icon-plus"></i> Add an University</button>
					<button class="btn btn-small" onclick="selectAll()">Check All</button>
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
			<form class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="inputName">University Name</label>
					<div class="controls">
						<input type="text" id="UniversityName"
							placeholder="University Name">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputAddress">Address</label>
					<div class="controls">
						<textarea rows="3" placeholder="Address"></textarea>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputEmail">Email</label>
					<div class="controls">
						<input type="text" id="inputEmail" placeholder="Email">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputPhone">Phone</label>
					<div class="controls">
						<input type="text" id="inputPhone" placeholder="Phone">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputCountry">Country</label>
					<div class="controls">
						<input type="text" id="inputCountry" placeholder="Country">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputIntern">Intern</label>
					<div class="controls">
						<div class="input-append">
							<input class="span2" type="text" id="inputIntern"
								placeholder="Intern" data-provide="typeahead" data-items="4"
								data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'
								autocomplete="off">
							<button class="btn btn-success" type="button">
								<i class="icon-plus icon-white"></i>
							</button>
						</div>
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
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
