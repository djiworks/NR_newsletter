<?php
 
class Newsletter extends CI_Controller
{
	private $id;
	
	public function __construct($id = false){
		parent::__construct(); 
		$this->load->model('newsletter/newsletter_md');
		$this->load->database();

		if($id){
					
			$this->id = $id;
			$this->initialiseValue();	
		}
	}

    public function index()
    {
		//~ $data = array();
		//~ $data['allUniv'] = $this->getAllNewsletters();
		
		$this->load->view('newsletter/head');
		$this->load->view('newsletter/topmenu');
		$this->load->view('newsletter/body');
		//~ $this->load->view('newsletter/body', $data);
		$this->load->view('newsletter/footer');
    }
    
    public function accueil()
    {
		$this->index();
    }
       
    public function mail()
    {
		//~ $data = array();
		//~ $data['allUniv'] = $this->getAllNewsletters();
		
		$this->load->view('newsletter/head');
		$this->load->view('newsletter/topmenu');
		$this->load->view('newsletter/mail');
		$this->load->view('newsletter/footer');
    }
    
	public function getAllUniversities()
	{

	}
    
    public function get()
    {

	 }

	public function getId() {
	}

	public function getName() {
	}

	public function getAdress() {
	}

	public function getCountry() {
	}

	public function getSubscription() {
	}

	public function getCheckingState() {
	}

	public function getComment() {
	}

	public function addNewsletter(){

	}

	public function addCommentOnNewsletter(){

	}

	public function initialiseValue(){
	}

}
