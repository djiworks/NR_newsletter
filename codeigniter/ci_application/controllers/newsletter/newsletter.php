<?php
 
class Newsletter extends CI_Controller
{
	private $id;
	
	public function __construct($id = false){
		parent::__construct(); 
		$this->load->helper('login');

		$this->load->model('newsletter/newsletter_md');
		$this->load->database();

		if($id){
			$this->id = $id;
			$this->initialiseValue();	
		}
	}

    public function index()
    {
		isLoggedInRedirect($this);

		$data = array();
		$data['allNews'] = $this->getAllNewsletters();
		
		$this->load->view('newsletter/head');
		$session_data = $this->session->userdata('logged_in');
		loadTopMenu($this, 'newsletter', $session_data);
		$this->load->view('newsletter/body', $data);
		$this->load->view('newsletter/footer');
    }
    
    public function accueil()
    {
		isLoggedInRedirect($this);

		$this->index();
    }
       
    public function mail()
    {
		isLoggedInRedirect($this);

		$this->load->view('newsletter/head');
		$session_data = $this->session->userdata('logged_in');
		loadTopMenu($this, 'newsletter', $session_data);	
		$this->load->view('newsletter/mail');
		$this->load->view('newsletter/footer');
    }
    
    public static function getNewsletterList()
	{	
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');
		isLoggedInRedirect($ci);

		$ci->load->model ( '/newsletter/newsletter_md' );
		$fetched_roles = $ci->newsletter_md->getAll();
		$result = "";
				
		foreach ( $fetched_roles->result () as $line_bis ) {				
				$result = $result . '<option>'.$line_bis->id_newsletter.' - '. $line_bis->name .'</option>';
		}

		return $result;
	}
    
	public function getAllNewsletters() {
		isLoggedInRedirect($this);

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
		isLoggedInRedirect($this);

	 }

	public function getId() {
	isLoggedInRedirect($this);

	}

	public function getName() {
	isLoggedInRedirect($this);
	}

	public function getAdress() {
		isLoggedInRedirect($this);
	}

	public function getCountry() {
	isLoggedInRedirect($this);

	}

	public function getSubscription() {
	isLoggedInRedirect($this);

	}

	public function getCheckingState() {
		isLoggedInRedirect($this);

	}

	public function getComment() {
	isLoggedInRedirect($this);

	}

	public function addNewsletter(){
	isLoggedInRedirect($this);

	}

	public function addCommentOnNewsletter(){
	isLoggedInRedirect($this);

	}

	public function initialiseValue(){
	isLoggedInRedirect($this);

	}

}
