			<div class="span10">
	    		<table class="table table-hover" id="displayUserList">
		    	  	<div class="btn-group">
					<button class="btn btn-small btn btn-info" type="button" data-toggle='modal' data-target='#addUser'>
						<i class="icon-plus"></i> Add an User
					</button>
					</div>
		    		<thead>
			    		<tr>
				    		<th><a><i class="icon-chevron-right"></i>ID</a></th>
				    		<th><a><i class="icon-chevron-right"></i>Login</a></th>
				    		<th><a><i class="icon-chevron-right"></i>Role</a></th>
			    		</tr>
		    		</thead>
		    		<tbody>
		    			<?php echo $allUsers; ?>
		    		</tbody>
		    	</table>
	    	  	<div class="btn-group">
				<button class="btn btn-small btn btn-info" type="button" data-toggle='modal' data-target='#addUser'>
					<i class="icon-plus"></i> Add an User
				</button>
				</div>
		    </div>
		</div>
	</div>
