<?php
include_once (APPPATH . "controllers/login/login.php");

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper('login');
		$this->load->database ();
	}
	
	public function index($is_success = NULL) {
		isLoggedInRedirect($this);
		isAdmin($this);

		$data = array ();
		$data ['allUsers'] = $this->getAllUsers();
		$data ['roleList'] = $this->getRoleList();

		if(isset($is_success)){
			$data ['is_success'] = $is_success;
		}

		$this->load->view ( 'admin/head' );
		$session_data = $this->session->userdata('logged_in');
		
		loadTopMenu($this, 'admin', $session_data) ;

		$this->load->view ( 'admin/body', $data );
		$this->load->view ( 'admin/footer' );
	}

	public function accueil() {
		isLoggedInRedirect($this);
		isAdmin($this);

		$this->index ();
	}

	public function backup() {
		isLoggedInRedirect($this);
		isAdmin($this);

		// Load the DB utility class
		$this->load->dbutil();

		//~ echo base_url('../univ_news_data/backup_database/');
		$prefs = array(
						'tables'      => array(),  // Array of tables to backup.
						'ignore'      => array(),           // List of tables to omit from the backup
						'format'      => 'txt',             // gzip, zip, txt
						'filename'    => 'mybackup.sql',    // File name - NEEDED ONLY WITH ZIP FILES
						'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
						'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
						'newline'     => "\n"               // Newline character used in backup file
					  );

		// Backup your entire database and assign it to a variable
		$backup =& 	$this->dbutil->backup($prefs); 

		// Load the file helper and write the file to your server
		$this->load->helper('file');

		if(!write_file(base_url('../univ_news_data/backup_database/').date("Y-m-d H:i:s").'.txt', $backup,'w+'))
		{
			//~ echo 'ERROR';
			$this->index (6);
		}
		else
		{
			//~ echo 'SUCCESS';
			$this->index (5);
		}
	}
	
	public function updateRole()
	{
		isLoggedInRedirect($this);
		isAdmin($this);
		
		$session_data = $this->session->userdata('logged_in');
		$id_user_session = $session_data['id'];
		
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');
		$ci->load->helper('url');		

		isLoggedInRedirect($ci);
		
		$ci->load->model('/user/user_md');
		//~ $ci->load->database();
		$id_user = $ci->uri->segment(4);
		$id_role = $ci->uri->segment(5);
		
		if($id_user_session != $id_user)
		{
			$ci->user_md->updateRole($id_user, $id_role);		
			redirect('admin/admin', 'refresh');
		}
	}
	
	public function getAllUsers()
	{
		isLoggedInRedirect($this);
		isAdmin($this);
		
		/**
		 * *************************************************************
		 * Preparing the table of users *
		 * *************************************************************
		 */	 	
		$this->load->model ( '/user/user_md' );
		$fetched_roles = $this->user_md->getAllRoles();
		$fetched_users = $this->user_md->getAllUsers();
		$result = "";
		
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		
		foreach ( $fetched_users->result () as $line ) {				
			if($id_user != $line->id_user)
				{
					$result = $result . '
								<tr>
								<td>' . $line->id_user . '</td>
								<td>' . $line->login . '</td>
								<td>
								<ul>
								<li class="dropdown">
									<a id="dropRole'.$line->id_user.'" class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
									 '. $line->id_role .' - '. $line->name .' 
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu" aria-labelledby="dropRole'.$line->id_user.'" role="menu">
										';
					foreach ( $fetched_roles->result () as $line_bis ) {				
							$result = $result . '<li role="presentation">
							<a href="admin/updateRole/'.$line->id_user.'/'.$line_bis->id_role.'" tabindex="-1" role="menuitem">
						'. $line_bis->id_role .' - '. $line_bis->name .'</a></li>';
					}
										
					$result = $result . '
									</ul>
								</li>
								</ul>
								</td>
								<td>		
								<button class="btn btn-small" type="button" onclick =\'modifyPassword('.$line->id_user.')\'>Change Password</button>
								<button class="btn btn-small" type="button" onclick =\'deleteUser('.$line->id_user.')\'>Delete</button>
								</td>
											
							</tr>';
				}
				else
				{
					$result = $result . '
								<tr>
								<td>' . $line->id_user . '</td>
								<td>' . $line->login . '</td>
								<td>
								<ul>
								<li>
									 '. $line->id_role .' - '. $line->name .' 
								</li>
								</ul>
								</td>		
								<td></td>		

							
							</tr>';
				}
		}
		return $result;
	}
	
	public function deleteUser()
	{
		isLoggedInRedirect($this);
		isAdmin($this);

		$this->load->model ( 'user/user_md' );
		
		$id = $this->input->post ( 'confirmDeletionId' );

		$this->user_md->deleteUser($id);
		
		$this->index(4);
	}
	
	public function modifyPassword()
	{
		isLoggedInRedirect($this);
		isAdmin($this);

		// loading of the library
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'user/user_md' );
		
		$this->form_validation->set_rules ( 'Password', '"Password"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'ConfirmPassword', '"Confirm Password"', 'trim|required|encode_php_tags|xss_clean' );

		
		if ($this->form_validation->run ()) {
			// If the form is valid
			$id = $this->input->post ( 'id' );
			$password = $this->input->post ( 'Password' );
			$confirmPassword = $this->input->post ( 'ConfirmPassword' );
						
			if($password == $confirmPassword)
			{
				$this->user_md->updatePassword ( $id, crypt($password) );
			
				$this->index (2);
			}
			else
			{	
				$this->index (3);
			}
		}
		else
		{
			$this->index (3);
		}
	}
	
	public function verificationAddUser() {
		isLoggedInRedirect($this);
		isAdmin($this);
		
		// loading of the library
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'user/user_md' );
		
		$this->form_validation->set_rules ( 'Login', '"Login"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'Password', '"Password"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'ConfirmPassword', '"ConfirmPassword"', 'trim|required|encode_php_tags|xss_clean' );
		
		if ($this->form_validation->run ()) {
			// If the form is valid
			$login = $this->input->post ( 'Login' );
			$password = crypt($this->input->post ( 'Password' ));
			$confirm_password = crypt($this->input->post ( 'ConfirmPassword' ),$password);
			$role = $this->input->post ( 'Role' );
			
			if($password == $confirm_password)
			{
				$result = $this->user_md->create ( $login, $password, $role);
				$this->index (0);
			}
			else
			{
				$this->index (1);
			}
		} else {
			// If the form is not valid or empty
			$this->index (1);
		}
	}
	
	public function getRoleList()
	{
		isLoggedInRedirect($this);
		isAdmin($this);

		$this->load->model ( '/user/user_md' );
		$fetched_roles = $this->user_md->getAllRoles();
		$result = "";
				
		foreach ( $fetched_roles->result () as $line_bis ) {				
				$result = $result . '<option>'.$line_bis->id_role.' - '. $line_bis->name .'</option>';
		}

		return $result;
	}
	
	public static function getNumberNotConfirmedUsers()
	{	
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');

		isLoggedInRedirect($ci);
	
		$ci->load->model ( 'user/user_md' );
		$fetched = $ci->user_md->getNumberNotConfirmedUsers();
		
		$result = "";
		if($fetched->num_rows()>0 && ($fetched->row()->nb != 0))
		{
			$result = $fetched->row()->nb;
		}
		
		return $result;
	}
}
