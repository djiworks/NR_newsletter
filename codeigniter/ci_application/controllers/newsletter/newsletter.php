<?php
 
class Newsletter extends CI_Controller
{
	private $id;
	
	public function __construct($id = false){
		parent::__construct(); 
		$this->load->helper('login');
		$this->load->model('newsletter/newsletter_md');

		if($id){
			$this->id = $id;
			$this->initialiseValue();	
		}
	}

    public function index($is_success = NULL)
    {
		isLoggedInRedirect($this);

		$data = array();
		$data['allNews'] = $this->getAllNewsletters();
		

		if(isset($is_success)){
			$data ['is_success'] = $is_success;
		}
		
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
       
    public function mail($is_success = NULL)
    {
		isLoggedInRedirect($this);

		$data = array();
		if (isset($is_success))
		{
			$data['is_success'] = $is_success;
		}
		
		$this->load->view('newsletter/head');
		$session_data = $this->session->userdata('logged_in');
		loadTopMenu($this, 'newsletter', $session_data);
		$this->load->view('newsletter/mail', $data);

		$this->load->view('newsletter/footer');
    }
    
    public static function getNewsletterList()
	{	
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');
		isLoggedInRedirect($ci);

		$ci->load->model ( '/newsletter/newsletter_md' );
		$fetched_roles = $ci->newsletter_md->getNewsletterList();
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
		
		// loading of the library
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'newsletter/newsletter_md' );
		$this->load->database ();
		
		$this->form_validation->set_rules ( 'Name', '"Name"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'Description', '"Description"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'Content', '"Content"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'Path', '"Path"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'Cover', '"Cover"', 'trim|required|encode_php_tags|xss_clean' );
		
		if ($this->form_validation->run ()) {
			// If the form is valid
			$name = $this->input->post ( 'Name' );
			$cover = $this->input->post ( 'Cover' );
			$path = $this->input->post ( 'Path' );
			$content = $this->input->post ( 'Content' );
			$description = $this->input->post ( 'Description' );
			$creation_date = date("Y-m-d");
			$checking_state = 2;
			
			$result = $this->newsletter_md->create ( $name, $cover, $path, $content, $description, $creation_date, $checking_state);
			
			$this->index (0);
		} else {
			// If the form is not valid or empty
			$description = $this->input->post ( 'Description' );
			$content = $this->input->post ( 'Content' );
			
			//~ $this->formCompletion ( $description, $content );
			$this->mail(1);
		}
	}

	public function addCommentOnNewsletter(){
	isLoggedInRedirect($this);

	}

	public function initialiseValue(){
	isLoggedInRedirect($this);

	}

}
