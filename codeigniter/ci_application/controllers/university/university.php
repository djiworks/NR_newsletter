<?php
 
class University extends CI_Controller
{
	function University()
    {
        parent::__construct(); 

		$this->var['css'] = array();
		//$css = array();
		$this->var['js'] = array();
		
		$this->add_bootstrap_css("bootstrap.min");
		$this->add_css("university");
    }
    
    
    /*
	|===============================================================================
	| methods to add the css and javascript files
	|   . add_css
	|   . add_js
	|===============================================================================
	*/
	
	public function add_bootstrap_css($name)
	{
		if(is_string($name) AND !empty($name) AND file_exists('./assets/bootstrap/css/' . $name . '.css'))
		{
		    $this->var['css'][] = "./assets/bootstrap/css/" . $name . ".css";
		    //echo "blah";
		    
		    return true;
		}
		return false;
	}
	
	public function add_css($name)
	{
		if(is_string($name) AND !empty($name) AND file_exists('./assets/css/' . $name . '.css'))
		{
		    $this->var['css'][] = "./assets/css/" . $name . ".css";
		    //echo "blah";
		    
		    return true;
		}
		return false;
	}
	

	public function add_js($name)
	{
		if(is_string($name) AND !empty($name) AND file_exists('./assets/javascript/' . $name . '.js'))
		{
		    $this->var['js'][] = "/assets/javascript/" . $name . ".js";
		    return true;
		}
		return false;
	}
	

    public function index()
    {		
		$this->load->view('university/head');
		$this->load->view('university/topmenu');
		$this->load->view('university/leftmenu');
		$this->load->view('university/footer');
		$this->load->view('university/body');

    }
    
    public function accueil()
    {
    	echo $this->var['css'];
    	
		$this->load->view('university/head', $css);
		$this->load->view('university/topmenu');
		$this->load->view('university/leftmenu');
		$this->load->view('university/footer');
    }
}

?>
