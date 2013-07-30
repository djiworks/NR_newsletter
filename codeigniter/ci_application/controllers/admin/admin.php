<?php
include_once (APPPATH . "controllers/login/login.php");

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper('login');
		//~ $this->load->model ( 'admin/admin_md' );
		$this->load->database ();
	}
	
	public function index($is_success = false) {
			isLoggedIn($this);
			isAdmin($this);

			$data = array ();
			//~ $data ['allUniv'] = $this->getAllUniversities ();
			$data ['allUsers'] = $this->getAllUsers();

			//~ if($is_success){
				//~ $data ['is_success'] = "true";
			//~ }
		
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
	
	public function getAllUsers()
	{
		isLoggedIn($this);
		isAdmin($this);

		/**
		 * *************************************************************
		 * Preparing the table of users *
		 * *************************************************************
		 */
	 	$this->load->model ( '/user/user_md' );
	 	
		$fetched_users = $this->user_md->getAllUsers();
		$result = "";
		$id_user = "";
		$i = 1;
		
		foreach ( $fetched_users->result () as $line ) {				

				$result = $result . '
					<tr>
						<tr>
							<td>' . $line->id_user . '</td>
							<td>' . $line->login . '</td>
							<td>' . $line->name . '</td>		
							
							<li class="dropdown">
								<a id="drop1" class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
								Dropdown 
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu" aria-labelledby="drop1" role="menu">
								<li role="presentation"> … </li>
								<li role="presentation"> … </li>
								<li role="presentation"> … </li>
								<li class="divider" role="presentation"></li>
								<li role="presentation"> … </li>
								</ul>
							</li>		
						
						</tr>';
				
				$i ++;
		}
		return $result;
	}
}
