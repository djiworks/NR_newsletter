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
		//~ $session_data = $this->session->userdata('logged_in');
		//~ $data['username'] = $session_data['username'];
		$this->load->view('guidelines/head');
		$session_data = $this->session->userdata('logged_in');
		$sess['username'] = $session_data['username'];
		$this->load->view ( 'guidelines/topmenu', $sess );		//~ $this->load->view('menu',$data);
		$this->load->view('guidelines/guidelines');
		$this->load->view('guidelines/footer');
	}
}

?>
