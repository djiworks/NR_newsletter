<div class="container">

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
		    		<!--<?php
						for($i = 1; $i <= 50; $i ++) {
							echo "<tr>
									  <td>" . $i . "</td>
									  <td>Intern " . $i . "</td>
									  <td>3 Littlestone Road, New Romney, England</td>
									  <td>0000 000 000</td>
									  <td>example@mail.com</td>
									  <td>University 1</td>
									  <td>France</td>
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
			<form class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="inputLogin">Login</label>
					<div class="controls">
						<input type="text" id="Login" placeholder="Login">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputName">First name</label>
					<div class="controls">
						<input type="text" id="firstName" placeholder="First name">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputName">Last name</label>
					<div class="controls">
						<input type="text" id="Name" placeholder="Last name">
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
