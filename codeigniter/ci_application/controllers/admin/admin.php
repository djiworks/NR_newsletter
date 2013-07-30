<?php
include_once (APPPATH . "controllers/login/login.php");

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper('login');
		$this->load->database ();
	}
	
	public function index($is_success = false) {
			isLoggedIn($this);
			isAdmin($this);

			$data = array ();
			$data ['allUsers'] = $this->getAllUsers();
		
			$this->load->view ( 'admin/head' );
			$session_data = $this->session->userdata('logged_in');
			$sess['username'] = $session_data['username'];
			
			loadTopMenu($this, 'admin', $sess) ;

			$this->load->view ( 'admin/body', $data );
			$this->load->view ( 'admin/footer' );
	}

	public function accueil() {
		isLoggedIn($this);
		isAdmin($this);

		$this->index ();
	}
	
	public function updateRole()
	{
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');
		$ci->load->helper('url');		

		isLoggedIn($ci);
		
		$ci->load->model('/user/user_md');
		$ci->load->database();
		$id_user = $ci->uri->segment(4);
		$id_role = $ci->uri->segment(5);
		
		$ci->user_md->updateRole($id_user, $id_role);		
		redirect('admin/admin', 'refresh');
	}
	
	public function getAllUsers()
	{
		isLoggedIn($this);
		isAdmin($this);

		/**
		 * *************************************************************
		 * Preparing the list of roles *
		 * *************************************************************
		 */
		 
 	 	$this->load->model ( '/user/user_md' );
		$fetched_roles = $this->user_md->getAllRoles();
		
		/**
		 * *************************************************************
		 * Preparing the table of users *
		 * *************************************************************
		 */	 	
		$fetched_users = $this->user_md->getAllUsers();
		$result = "";
		$id_user = "";
		$i = 1;
		
		foreach ( $fetched_users->result () as $line ) {				

				$result = $result . '
							<tr>
							<td>' . $line->id_user . '</td>
							<td>' . $line->login . '</td>
							<td>
							<li class="dropdown">
								<a id="drop1" class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
								 '. $line->id_role .' - '. $line->name .' 
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu" aria-labelledby="drop1" role="menu">
									';
				foreach ( $fetched_roles->result () as $line_bis ) {				
						$result = $result . '<li role="presentation">
						<a href="admin/updateRole/'.$line->id_user.'/'.$line_bis->id_role.'" tabindex="-1" role="menuitem">
					'. $line_bis->id_role .' - '. $line_bis->name .'</a></li>';
				}
									
				$result = $result . '
								</ul>
							</li>
							</td>		
						
						</tr>';
				
				$i ++;
		}
		return $result;
	}
}
//~ <li class="divider" role="presentation"></li>
