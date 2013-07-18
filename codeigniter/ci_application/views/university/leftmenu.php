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
