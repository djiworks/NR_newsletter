<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<button type="button" class="btn btn-navbar" data-toggle="collapse"
				data-target=".nav-collapse">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="brand" href="/index.php/university/university">University Newsletter Management</a>
			<div class="nav-collapse collapse">
				<p class="navbar-text pull-right">
					Logged in as <a href="#" class="navbar-link"><?php echo $username; ?></a>
					<a href="<?php echo site_url('login/login/logout'); ?>" class="btn btn-mini btn-danger"><i class="icon-off icon-white"></i> Logout</a>
				</p>
				<ul class="nav">
					<li><a href="/index.php/university/university">University <span
							class="badge badge-important">1</span></a></li>
					<li><a href="/index.php/intern/intern">Interns</a></li>
					<li><a href="/index.php/newsletter/newsletter">Newsletter <span
							class="badge badge-important">2</span></a></li>
					<li><a href="/index.php/guidelines/guidelines"><i
							class="icon-question-sign icon-white"></i>&nbsp;Guidelines</a></li>
					<li class="divider-vertical"></li>
					<li class="active"><a href="/index.php/admin/admin">Administration</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
</div>
