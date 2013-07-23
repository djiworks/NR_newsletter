<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Guideline extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$this->load->view('header');
		$this->load->view('menu',$data);
		$this->load->view('guideline');
		$this->load->view('footer');
	}
}

?>