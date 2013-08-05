<?php
include_once (APPPATH . "controllers/university/university.php");

 
class Intern extends CI_Controller
{
	private $id;
	private $first_name;
	private $last_name;
	private $country;
	private $mail;
	private $phone;
	private $work_until;
	
	public function __construct($id = false){
		parent::__construct(); 
		$this->load->model('intern/intern_md');
		$this->load->helper('login');

		$this->load->database();

		if($id){
					
			$this->id = $id;
			$this->initialiseValue();	
		}
	}

    public function index($is_success = false)
    {
		isLoggedInRedirect($this);

		$data = array();
		$data['allInterns'] = $this->getAllInterns();
		$data ['allCountries'] = University::getAllCountries();

		if($is_success){
			$data ['is_success'] = "true";
		}

		$this->load->view('intern/head');
		$session_data = $this->session->userdata('logged_in');
		//~ $sess['username'] = $session_data['username'];
		loadTopMenu($this, 'intern', $session_data);
		$this->load->view('intern/body', $data);
		$this->load->view('intern/footer');
    }
    
    public function accueil()
    {
		isLoggedInRedirect($this);

		$this->index();
    }
    
    public function get()
    {
		isLoggedInRedirect($this);

		$ci = new CI_CONTROLLER();
		$id = $ci->uri->segment(4);
		
		$intern = new Intern($id);
		
		exit (json_encode(
							array(
									"id" => $intern->getId(), 
									"first_name" => $intern->getFirstName(), 
									"last_name" => $intern->getLastName(),
									"country" => $intern->getCountry(), 
									"phone" => $intern->getPhone(), 
									"mail" => $intern->getMail(),  
									"work_until" => $intern->getWorkUntil()
							)
		));
	 }

	public function getId() {
		isLoggedInRedirect($this);

		return $this->id;
	}

	public function getFirstName() {
		isLoggedInRedirect($this);
		return $this->first_name;
	}

	public function getLastName() {
		isLoggedInRedirect($this);

		return $this->last_name;
	}

	public function getCountry() {
		isLoggedInRedirect($this);

		return $this->country;
	}

	public function getPhone() {
		isLoggedInRedirect($this);

		return $this->phone;
	}

	public function getMail() {
		isLoggedInRedirect($this);

		return $this->mail;
	}

	public function getWorkUntil() {
		isLoggedInRedirect($this);
		return $this->work_until;
	}

	public function addIntern(){
		isLoggedInRedirect($this);

		$ci = new CI_CONTROLLER();
		$this->load->model('intern/intern_md');
		$this->load->database();

		$first_name = $ci->uri->segment(4);
		$last_name = $ci->uri->segment(5);
		$country = $ci->uri->segment(6);
		$phone = $ci->uri->segment(7);
		$mail = $ci->uri->segment(8);
		$work_until = $ci->uri->segment(9);
	
		$result = $this->intern_md->create($first_name, $last_name, $country, $phone, $mail, $work_until);
	}

	public function initialiseValue(){
		isLoggedInRedirect($this);

		$result = $this->intern_md->get($this->id);

		if($result->num_rows()){
			$data = $result->row();
			$this->first_name = $data->first_name;
			$this->last_name = $data->last_name;
			$this->country = $data->country;
			$this->phone = $data->phone;
			$this->mail = $data->mail;
			$this->work_until = $data->work_until;
		}
	}
	
	public function getAllInterns()
	{
		isLoggedInRedirect($this);

		$ci = new CI_CONTROLLER();
		$ci->load->model('intern/intern_md');
		$this->load->database();
		$fetched = $ci->intern_md->getAll();
		
		$result = "";		
		$id_person = -1;
		
		foreach($fetched->result() as $ligne)
		{
			if($id_person != $ligne->id_person) {
				$result = $result."
				<tr>
					<td>".$ligne->id_person."</td>
					<td>".$ligne->first_name." ".$ligne->last_name."</td>
					<td>".$ligne->phone."</td>
					<td>".$ligne->mail."</td>";
					
				if($ligne->is_student) {
					$result = $result."<td>".$ligne->name."</td>";
				} else {
					$result = $result."<td></td>";
				}
				
				$result = $result."
					<td>".$ligne->country."</td>
					<td>".$ligne->worked_until."</td>
					<td><a href='#myModal' data-toggle='modal'>Click here</a></td>
				</tr>";
				
				$id_person = $ligne->id_person;
			}
		}
		
		return $result;
	}
	
	public static function getAllNames()
	{
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');

		isLoggedInRedirect($ci);

		$ci->load->model('intern/intern_md');
		$ci->load->database();
		$fetched = $ci->intern_md->getAllNames();
		
		$result = "'[";		
		$first = true;
		
		foreach($fetched->result() as $ligne)
		{
			if ($first)
			{
				$first = false;
				$result = $result.'"'.$ligne->first_name." ".$ligne->last_name.'"';

			}
			else
			{
				$result = $result.',"'.$ligne->first_name." ".$ligne->last_name.'"';
			}
		}
		$result = $result."]'";
		return $result;
	}
	
		public function verificationAddIntern() {
		isLoggedInRedirect($this);

		// loading of the library
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'intern/intern_md' );
		$this->load->database ();
		
		$this->form_validation->set_rules ( 'FirstName', '"First Name"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'LastName', '"LastName"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'Phone', '"Phone"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'Mail', '"Mail"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'Country', '"Country"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'WorkedUntil', '"Worked until"', 'trim|required|encode_php_tags|xss_clean' );
		
		if ($this->form_validation->run()) {
			// If the form is valid
			$first_name = $this->input->post ( 'FirstName' );
			$last_name = $this->input->post ( 'LastName' );
			$phone = $this->input->post ( 'Phone' );
			$mail = $this->input->post ( 'Mail' );
			$country = $this->input->post ( 'Country' );
			$worked_until = $this->input->post ( 'WorkedUntil' );
			
			$result = $this->intern_md->create($first_name, $last_name, $country, $phone, $mail, $worked_until);

			$this->index (true);
		} else {
			// If the form is not valid or empty
			$this->formCompletion();
		}
	}
	
		public function formCompletion() {
		isLoggedInRedirect($this);
			
		$data = array ();
		$data ['allCountries'] = University::getAllCountries();
		$data['allInterns'] = $this->getAllInterns();
		$data ['is_success'] = "false";
		
		$this->load->view ( 'intern/head' );
		$session_data = $this->session->userdata('logged_in');
		//~ $sess['username'] = $session_data['username'];
		loadTopMenu($this, 'intern', $session_data);
		$this->load->view ( 'intern/body', $data );
		$this->load->view ( 'intern/footer' );
	}
}
