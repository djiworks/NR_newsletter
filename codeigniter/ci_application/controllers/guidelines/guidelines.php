<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Guidelines extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->helper('login');
		isLoggedInRedirect($this);
		$this->load->view('guidelines/head');
		$session_data = $this->session->userdata('logged_in');
		//~ $sess['username'] = $session_data['username'];
		loadTopMenu($this, 'guidelines', $session_data);
		$this->load->view('guidelines/guidelines');
		$this->load->view('guidelines/footer');
	}
}

?>
