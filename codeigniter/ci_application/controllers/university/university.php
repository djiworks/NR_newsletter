<?php
 
class University extends CI_Controller
{
	function University()
    {
        parent::__construct(); 
    }

    public function index()
    {		
		$this->load->view('university/topmenu');
		$this->load->view('university/leftmenu');
    }
    
    public function accueil()
    {
		$this->load->view('university/topmenu');
		$this->load->view('university/leftmenu');
    }
}

?>
