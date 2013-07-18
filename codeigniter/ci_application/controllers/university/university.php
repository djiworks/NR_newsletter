<?php
 
class University extends CI_Controller
{
	public $id;
	
	public function __construct($id = false){
		parent::__construct(); 
		if(isset($id)){
			$this->load->model('university_md');
					
			$this->id = $id;
			$this->initialiseValue();	
		}
		
	}

    public function index()
    {
		//~ echo 'coucou';
		$this->load->view('university/head');
		$this->load->view('university/topmenu');
		$this->load->view('university/leftmenu');
		$this->load->view('university/body');
		$this->load->view('university/footer');

    }
    
    public function accueil()
    {
		$this->index();
    }
    
     public function get()
     {
		$ci = new CI_CONTROLLER();
		$ci->load->model('university_md');
		$id = $ci->uri->segment(4);
		
		$university = new University($id);
		
		exit (json_encode(
							array(
									"id" => $university->get_id(), 
									"name" => $university->get_name(), 
									"address" => $university->get_adress(),
									"country" => $university->get_country(), 
									"subscription" => $university->get_subscription(), 
									"checking state" => $university->get_checking_state(),  
									"comment" => $university->get_comment()
							)
		));
	 }

     public function get()
     {
		 
	 }
	 
	 public function initialiseValue(){
		$result = $this->university_md->get($this->id);
		
		if($result->num_rows()){
			$data = $result->row();
			$this->name = $data->name;
			$this->address = $data->address;
			$this->country = $data->country;
			$this->subscription = $data->subscription;
			$this->checking_state = $data->checking_state;
			$this->comment = $data->comment;
			
			}
		}
	}
}
