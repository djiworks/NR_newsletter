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
		$data = array();
		$data['allNews'] = $this->getAllNewsletters();
		
		$this->load->view('newsletter/head');
		$session_data = $this->session->userdata('logged_in');
		$sess['username'] = $session_data['username'];
		$this->load->view ( 'newsletter/topmenu', $sess );
		$this->load->view('newsletter/body', $data);
		$this->load->view('newsletter/footer');
    }
    
    public function accueil()
    {
		$this->index();
    }
       
    public function mail()
    {
		$this->load->view('newsletter/head');
		$this->load->view('newsletter/topmenu');
		$this->load->view('newsletter/mail');
		$this->load->view('newsletter/footer');
    }
    
	public function getAllNewsletters() {
		$ci = new CI_CONTROLLER();
		$ci->load->model('newsletter/newsletter_md');
		$this->load->database();
		$fetched = $ci->newsletter_md->getAll();
		
		$result = "";		
		$i = 1;
		
		foreach($fetched->result() as $ligne)
		{
			//Switching the state number to the real values
			switch($ligne->checking_state) {
				case 0:
					$classUniv = "";
					$state = "Sent";
					break;
				case 1:
					$classUniv = "success";
					$state = "Approved";
					break;
				case 2:
					$classUniv = "warning";
					$state = "Waiting";
					break;
				case 3:
					$classUniv = "error";
					$state = "Wrong";
					break;
			}
			
			$image = (isset($ligne->cover)) ? $ligne->cover : "/assets/holder/holder.js/80x100";
			
			$result =  $result."
				<tr class='".$classUniv."'>
					<td><img class='media-object' src='".$image."'/></td>
					<td>".$ligne->id_newsletter."</td>
					<td>".$ligne->name."</td>
					<td>".$ligne->description."</td>
					<td>".$ligne->creation_date."</td>
					<td>".$state."</td>
					<td><a href='#myModal' data-toggle='modal'>Click here</a></td>
				</tr>";
		}
		
		return $result;
	}
    
    public function get() {

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
