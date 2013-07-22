<?php
 
class Intern extends CI_Controller
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
		$this->load->model('intern_md');
		$this->load->database();

		if($id){
					
			$this->id = $id;
			$this->initialiseValue();	
		}
	}

    public function index()
    {
		$this->load->view('intern/head');
		$this->load->view('intern/topmenu');
		$this->load->view('intern/leftmenu');
		$this->load->view('intern/body');
		$this->load->view('intern/footer');
    }
    
    public function accueil()
    {
		$this->index();
    }
    
    public function get()
    {
		$ci = new CI_CONTROLLER();
		$id = $ci->uri->segment(4);
		
		$intern = new Intern($id);
		
		exit (json_encode(
							array(
									"id" => $intern->getId(), 
									"name" => $intern->getName(), 
									"address" => $intern->getAdress(),
									"country" => $intern->getCountry(), 
									"subscription" => $intern->getSubscription(), 
									"checking state" => $intern->getCheckingState(),  
									"comment" => $intern->getComment()
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

	public function addIntern(){
		$ci = new CI_CONTROLLER();
		$this->load->model('intern_md');
		$this->load->database();

		$name = $ci->uri->segment(4);
		$address = $ci->uri->segment(5);
		$country = $ci->uri->segment(6);
		$subscription = $ci->uri->segment(7);
		$checking_state = $ci->uri->segment(8);
	
		$result = $this->intern_md->create($name, $address, $country, $subscription, $checking_state);
	}

	public function addCommentOnIntern(){
		$ci = new CI_CONTROLLER();
		$this->load->model('intern_md');
		$this->load->database();

		$id = $ci->uri->segment(4);
		$comment = $ci->uri->segment(5);
	
		$result = $this->intern_md->addCommentOnIntern($id, $comment);
	}

	public function initialiseValue(){
		$result = $this->intern_md->get($this->id);

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
