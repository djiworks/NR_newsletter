<?php
 
class University extends CI_Controller
{
	function University()
    {
        parent::__construct();   
    }

    public function index()
    {
    	//echo "Hello world";
		//$this->load->view('leftmenu');
		$this->load->view('university/topmenu');
		$this->load->view('university/leftmenu');
		//~ $this->load->view('topmenu');
    }
    public function accueil()
    {
    	//echo "Hello world";
		//$this->load->view('leftmenu');
		$this->load->view('university/topmenu');
		$this->load->view('university/leftmenu');
		//~ $this->load->view('topmenu');
    }
}

?>
