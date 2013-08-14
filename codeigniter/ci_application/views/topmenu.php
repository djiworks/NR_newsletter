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
				<ul class="nav navbar-nav pull-right">
					<li class="navbar-text">Logged as</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><strong><?php echo $username; ?></strong>
						 <b class="caret"></b></a>
						<ul class="dropdown-menu">
						    <li><a href="/index.php/admin/changepassword"><i class="icon-lock"></i> Change password</a></li>
						    <li class="divider"></li>
						    <li><a href="/index.php/login/login/logout"><i class="icon-off"></i> Log out</a></li>
					  </ul>
					</li>
			</ul>
				<ul class="nav">
					<li <?php if($path == "university") echo 'class="active"' ;?>><a href="/index.php/university/university">University <span class="badge badge-warning"><?php echo $nb_w_univ;?></span><span class="badge badge-important"><?php echo $nb_wr_univ;?></span></a></li>
					<li <?php if($path == "intern") echo 'class="active"'; ?>><a href="/index.php/intern/intern">Interns</a></li>
					<li <?php if($path == "newsletter") echo 'class="active"'; ?>><a href="/index.php/newsletter/newsletter">Newsletter <span class="badge badge-warning"><?php echo $nb_w_news;?></span><span class="badge badge-important"><?php echo $nb_wr_news;?></span></a></li>
					<li <?php if($path == "guidelines") echo 'class="active"' ;?>><a href="/index.php/guidelines/guidelines">
						<i class="icon-question-sign icon-white"></i>&nbsp;Guidelines</a></li>
					<?php if(($path == "admin") && ($role == 1))
						{echo '	<li class="divider-vertical"></li><li class="active"><a href="/index.php/admin/admin">Administration <span class="badge badge-warning">'; echo $nb_w_users; echo '</span></a></li>';}
						else if($role == 1)
							{echo '	<li class="divider-vertical"></li><li><a href="/index.php/admin/admin">Administration <span class="badge badge-warning">'; echo $nb_w_users; echo '</span></a></li>';  }?>
							
					
				</ul>
			</div>
		</div>
	</div>
</div>
	<div class="container-fluid">
		<div class="row-fluid">
