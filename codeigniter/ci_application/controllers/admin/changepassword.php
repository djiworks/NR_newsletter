<?php
include_once (APPPATH . "controllers/login/login.php");

class ChangePassword extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper('login');
	}
	
	public function index($is_success = NULL) {
		isLoggedInRedirect($this);

		$data = array ();

		if(isset($is_success)){
			$data ['is_success'] = $is_success;
		}

		$this->load->view ( 'admin/head' );
		$session_data = $this->session->userdata('logged_in');
		
		loadTopMenu($this, 'admin', $session_data) ;

		$this->load->view ( 'admin/change_password', $data );
		$this->load->view ( 'admin/footer' );
	}

	public function accueil() {
		isLoggedInRedirect($this);

		$this->index ();
	}
	
	
	public function verificationChangePassword() {
		isLoggedInRedirect($this);
		
		// loading of the library
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'user/user_md' );
		
		$this->form_validation->set_rules ( 'CurrentPassword', '"Current Password"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'NewPassword', '"New Password"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'ConfirmNewPassword', '"ConfirmNewPassword"', 'trim|required|encode_php_tags|xss_clean' );
		
		if ($this->form_validation->run ()) {
			// If the form is valid			
			$new_password = crypt($this->input->post ( 'NewPassword' ));
			$confirm_new_password = crypt($this->input->post ( 'ConfirmNewPassword' ), $new_password);
			
			$session_data = $this->session->userdata('logged_in');
			$id = $session_data['id'];
			
			$password_array = $this->user_md->getPassword($id)->result ();
			
			foreach ( $password_array as $line ) {	
				$password = $line->password;
				$current_password = crypt($this->input->post ( 'CurrentPassword' ), $password);
			}
			
			if(($password == $current_password) && ($new_password == $confirm_new_password))
			{
				$result = $this->user_md->updatePassword($id, $new_password);
				$this->index (2);
			}
			else
			{	
				$this->index (3);
			}
		} else {
			// If the form is not valid or empty
			$this->index (2);
		}
	}
}
