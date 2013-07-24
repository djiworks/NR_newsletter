<?php
include_once(APPPATH."controllers/intern/intern.php");
 
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
		$this->load->model('university/university_md');
		$this->load->database();

		if($id){
					
			$this->id = $id;
			$this->initialiseValue();	
		}
	}

    public function index()
    {
		$data = array();
		$data['allUniv'] = $this->getAllUniversities();
		$data['allNames'] = Intern::getAllNames();
		
		$this->load->view('university/head');
		$this->load->view('university/topmenu');
		$this->load->view('university/leftmenu');
		$this->load->view('university/body', $data);
		$this->load->view('university/footer');
    }
    
    public function accueil()
    {
		$this->index();
    }
    
	public function getAllUniversities()
	{
		$ci = new CI_CONTROLLER();
		$ci->load->model('university/university_md');
		$this->load->database();
		$fetched = $ci->university_md->getAll();
		
		$result = "";		
		$i = 1;
		
		foreach($fetched->result() as $ligne)
		{
			//Switching the state number to the real values
			switch($ligne->checking_state) {
				case 0:
					$classUniv = "";
					$state = "First newsletter sent";
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
			
			$subcription = ($ligne->subscription == 1) ? "Yes" : "No";
		
			if(!($ligne->mail)||!($ligne->number))
			{
				
				$result = $result."
				<tr class='".$classUniv."'>
					<td>
					NA
					</td>
					<td>".$ligne->id_university."</td>
					<td>".$ligne->name."</td>
					<td>".$ligne->address."</td>
					<td>No information</td>
					<td>No information</td>
					<td>".$ligne->country."</td>
					<td>".$subcription."</td>
					<td>".$state."</td>
					<td><a href='#viewdetail' data-toggle='modal'>Click here</a></td>
				</tr>";
			}
			else
			{
				$result = $result."
				<tr class='".$classUniv."'>
					<td>
						<input type='checkbox' id='chk".$i."' onclick='selectedUniv(\"".$ligne->name."\", \"".$ligne->id_university."\", \"chk".$i."\")'>
					</td>
					<td>".$ligne->id_university."</td>
					<td>".$ligne->name."</td>
					<td>".$ligne->address."</td>
					<td>".$ligne->number."</td>
					<td>".$ligne->mail."</td>
					<td>".$ligne->country."</td>
					<td>".$subcription."</td>
					<td>".$state."</td>
					<td><a href='#viewdetail' data-toggle='modal'>Click here</a></td>
				</tr>";
			}
		}
		
		return $result;
	}
    
    public function get()
    {
		$ci = new CI_CONTROLLER();
		$id = $ci->uri->segment(4);
		
		$university = new University($id);
		
		exit (json_encode(
							array(
									"id" => $university->getId(), 
									"name" => $university->getName(), 
									"address" => $university->getAdress(),
									"country" => $university->getCountry(), 
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

	public function addCommentOnUniversity(){
		$ci = new CI_CONTROLLER();
		$this->load->model('university/university_md');
		$this->load->database();

		$id = $ci->uri->segment(4);
		$comment = $ci->uri->segment(5);
	
		$result = $this->university_md->addCommentOnUniversity($id, $comment);
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
	
	public function verificationAddUniversity()
	{
		//  loading of the library
		$this->load->library('form_validation');
	 	$this->load->model('university/university_md');
		$this->load->database(); 
		
		$this->form_validation->set_rules('UniversityName', '"University Name"', 'trim|required|alpha_dash|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('Adress', '"Adress"', 'trim|required|alpha_dash|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('inputCountry','"Country"', 'trim|required|alpha_dash|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('inputIntern','"Intern"', 'trim|required|alpha_dash|encode_php_tags|xss_clean');
	 
		if($this->form_validation->run())
		{
			//  If the form is valid
			$name = $this->input->post('UniversityName');
			$address = $this->input->post('Adress');
			$country = $this->input->post('inputCountry');
			$subscription = 0;
			$checking_state = 2;
			
			$result = $this->university_md->create($name, $address, $country, $subscription, $checking_state);
			
			$this->index();
		}
		else
		{
			//  Le formulaire est invalide ou vide
			$address = $this->input->post('Adress');
			$inputInfoContact = $this->input->post('inputInfoContact');
			$this->formCompletion($address, $inputInfoContact);
		}
	}
	   
	public function formCompletion($address, $inputInfoContact)
    {
		$data = array();
		$data['allUniv'] = $this->getAllUniversities();
		$data['allNames'] = Intern::getAllNames();
		$data['address'] = $address;
		$data['inputInfoContact'] = $inputInfoContact;
		
		$this->load->view('university/head');
		$this->load->view('university/topmenu');
		$this->load->view('university/leftmenu');
		$this->load->view('university/body', $data);
		$this->load->view('university/footer');
    }
}
