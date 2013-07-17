<?php
 
class University extends CI_Controller
{
	function University()
    {
        parent::__construct();   
    }

    public function index()
    {
		$this->load->view('leftmenu');
		//~ $this->load->view('topmenu');
    }
    public function accueil()
    {
		$this->load->view('leftmenu');
		//~ $this->load->view('topmenu');
    }
}
