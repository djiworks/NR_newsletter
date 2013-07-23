<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();
	 }
	 
	 function index()
	 {
	 	$this->load->view('login/head');
	   	$this->load->view('login/login_view');
	   	$this->load->view('login/footer');
	 }
	 
	 function logout()
	 {
	 	session_start();
	 	$this->session->unset_userdata('logged_in');
	 	session_destroy();
	 	redirect('login/login', 'refresh');
	 }
}	 
?>
