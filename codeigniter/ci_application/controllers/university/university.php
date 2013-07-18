<?php
 
class University extends CI_Controller
{
	private $id;
	private $name;
	private $address;
	private $country;
	private $subscription;
	private $checking_state;
	private $comment;
	
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
									"id" => $university->getId(), 
									"name" => $university->getName(), 
									"address" => $university->getAdress(),
									"country" => $country->getCountry(), 
									"subscription" => $university->getSubscription(), 
									"checking state" => $university->getCheckingState(),  
									"comment" => $university->getComment()
							)
		));
	 }

     public function getId() {
		 return $this->id;
	 }
	 
	 public function getName() {
		 return $this->name;
	 }
	 
	 public function getAdress() {
		 return $this->address;
	 }
	 
	 public function getCountry() {
		 return $this->country;
	 }
	 
	 public function getSubscription() {
		 return $this->subscription;
	 }
	 
	 public function getCheckingState() {
		 return $this->checking_state;
	 }
	 
	 public function getComment() {
		 return $this->comment;
	 }
}
