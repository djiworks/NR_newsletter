<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();
		$this->load->helper('login');
	 }
	 
	 function index($is_success = NULL)
	 {
		if($this->session->userdata('logged_in'))
		{
			redirect('university/university', 'refresh');
		}
		$data = array();
		
		if(isset($is_success))
		{
			$data['is_success'] = $is_success;
		}
		
	 	$this->load->view('login/head');
	   	$this->load->view('login/login_view', $data);
	   	$this->load->view('login/footer');

	 }
	 
	 function logout()
	 {
	 	session_start();
	 	$this->session->unset_userdata('logged_in');
	 	session_destroy();
	 	redirect('login/login', 'refresh');
	 }
	 
	 public function verificationAddUser() {
		//~ isLoggedInRedirect($this);
		
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
			$role = 5;
			
			$result =  $this->user_md->getByLogin($login);
			if($result->num_rows() == 0)
			{
				if($password == $confirm_password)
				{
					$result = $this->user_md->create ( $login, $password, $role);
					$this->index (0);
				}
				else
				{
					$this->index (1);
				}
			}
			else
			{
				$this->index (2);
			}
		} else {
			// If the form is not valid or empty
			$this->index (1);
		}
	}
	 
}	 
?>
