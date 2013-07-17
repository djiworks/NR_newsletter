<!DOCTYPE html>
<html>
<head>
<title>University Newsletter Management</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet"
	media="screen">
<style type="text/css">
.table th,.table td {
	text-align: center;
}

body {
	padding-top: 60px;
	padding-bottom: 40px;
}

.ajust {
	margin-top: 60px;
}

#divListUniv {
	height: auto;
	max-height: 270px;
	overflow: auto;
}
</style>
<script>
		function selectedUniv (univName, univId) {
			//Creation of variables
			var chkName = "chk".concat(univId);
			var checkBoxState = document.getElementById(chkName).checked;
			
			//Creation or removal of the universty from the list
			if(checkBoxState === true) {
				addUniv(univName, univId);
			} else {
				removeUniv(univId);
			}
		}
	
		function addUniv(univName, univId) {
			//Creation of the new li element
			var newElementInList = document.createElement('li');
			newElementInList.id = "li".concat(univId);
			
			//Creation of the label
			var newLabel = document.createElement('label');
			newLabel.class = "checkbox inline";
		
			//Creation of the input
			var newInput = document.createElement('input');
			newInput.type = "checkbox";
			newInput.id = "inlineCheckbox1";
			newInput.value = "option1";
			newInput.checked = true;
			newInput.setAttribute("onclick", "removeUniv("+univId+")");
			
			//Creation of the link
			var newLink = document.createElement('a');
			var newLinkText = document.createTextNode(" ".concat(univName));
			newLink.href = "#myModal";
			newLink.setAttribute("data-toggle", "modal");
			newLink.appendChild(newLinkText);
		
			//appending the elements all together
			newLabel.appendChild(newInput);
			newLabel.appendChild(newLink);
			newElementInList.appendChild(newLabel);
		
			//appending the new list element to the list
			document.getElementById("divListUniv").appendChild(newElementInList);
		}
		
		function removeUniv(univId) {
			//Creation of variables
			var listElementToRemove = "li".concat(univId);
			var listElem = document.getElementById(listElementToRemove);
			
			//Removal of the university from the list
			listElem.parentNode.removeChild(listElem);
			
			//Uncheck the checkbox
			document.getElementById("chk"+univId).checked = false;
		}
		
		function unselectAll() {
			//Get all the children of the ul element
			var arrayLi = document.getElementById("divListUniv");
		
			//We remove the element in the list
			while(arrayLi.hasChildNodes()){
    			arrayLi.removeChild(arrayLi.lastChild);
			}
			
			//Uncheck all the checkboxes
			var arrayInput = document.getElementsByTagName("input");
			
			for(var i = 0 ; i <= arrayInput.length ; i++) {
				if(arrayInput[i].type == 'checkbox') {
					arrayInput[i].checked = false;
				}
			}
		}

		function selectAll() {
			//Check all the checkboxes
			var arrayInput = document.getElementById("displayUnivList").getElementsByTagName("input");
			var nbCheckbox = arrayInput.length;
			
			for(var i = 0 ; i <= nbCheckbox*2 ; i++) {
				if(arrayInput[i].getAttribute('type') == 'checkbox') {
					if(arrayInput[i].checked == false) {						
						arrayInput[i].checked = true;
						var tmpString = arrayInput[i].getAttribute('onclick');
						var arrayString = tmpString.split("'");
						addUniv(arrayString[1], arrayString[3]);
					}
				}
			}
		}
	</script>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<button type="button" class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="brand" href="index.php">University Newsletter Management</a>
				<div class="nav-collapse collapse">
					<p class="navbar-text pull-right">
						Logged in as <a href="#" class="navbar-link">Username</a>
					</p>
					<ul class="nav">
						<li class="active"><a href="index.php">University <span
								class="badge badge-important">1</span></a></li>
						<li><a href="interns.php">Interns</a></li>
						<li><a href="newsletter.php">Newsletter <span
								class="badge badge-important">2</span></a></li>
						<li><a href="guidelines.php"><i
								class="icon-question-sign icon-white"></i>&nbsp;Guidelines</a></li>
						<li class="divider-vertical"></li>
						<li><a href="admin.php">Administration</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span2 ajust">
				<div class="affix">
					<ul class="nav nav-list" id="listSelectedUniversity">
						<li class="nav-header">Information selected</li>
						<li>University checked:</li>
						<div id="divListUniv"></div>
						<li class="divider" id="liDivider"></li>
						<li>
							<button class="btn btn-mini btn-primary" type="button"
								onclick="$('#sendingbox').modal('show')">
								<i class="icon-envelope icon-white"></i> Send Mail
							</button>
							<button class="btn btn-mini btn-inverse" type="button"
								onclick="unselectAll()">
								<i class="icon-trash icon-white"></i> Empty List
							</button>
						</li>
					</ul>
				</div>
			</div>
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
	<script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
