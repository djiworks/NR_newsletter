<?php
include_once (APPPATH . "controllers/intern/intern.php");

class University extends CI_Controller {
	private $id;
	private $name;
	private $address;
	private $country;
	private $subscription;
	private $checking_state;
	private $comment;
	public function __construct($id = false) {
		parent::__construct ();
		$this->load->model ( 'university/university_md' );
		$this->load->database ();
		
		if ($id) {
			
			$this->id = $id;
			$this->initialiseValue ();
		}
	}
	public function index($is_success = false) {
	if($this->session->userdata('logged_in'))
		{
			$data = array ();
			$data ['allUniv'] = $this->getAllUniversities ();
			$data ['allNames'] = Intern::getAllNames ();
			$data ['allCountries'] = $this->getAllCountries();

			if($is_success){
				$data ['is_success'] = "true";
			}
		
			$this->load->view ( 'university/head' );
			$session_data = $this->session->userdata('logged_in');
			$sess['username'] = $session_data['username'];
			$this->load->view ( 'university/topmenu', $sess );
			$this->load->view ( 'university/leftmenu' );
			$this->load->view ( 'university/body', $data );
			$this->load->view ( 'university/footer' );
		}
		else
		{
			//If no session, redirect to login page
			redirect('login/login', 'refresh');
		}

	}
	public function accueil() {
		$this->index ();
	}
	public function getAllUniversities() {
		$ci = new CI_CONTROLLER ();
		$ci->load->model ( 'university/university_md' );
		$this->load->database ();
		
		/**
		 * *************************************************************
		 * Preparing the table of interns *
		 * *************************************************************
		 */
		$fetched_intern = $ci->university_md->getAllUniv_Interns ();
		$displayInterns = array ();
		$id_univ = "";
		
		foreach ( $fetched_intern->result () as $line ) {
			$id_univ = $line->id_university;
			
			if (! isset ( $displayInterns [$id_univ] )) {
				$displayInterns [$id_univ] = "";
			}
			
			switch ($line->is_student) {
				case 0 :
					$student = "No";
					break;
				case 1 :
					$student = "Yes";
					break;
				default :
					$student = "N/A";
					break;
			}
			
			$displayInterns [$id_univ] = $displayInterns [$id_univ] . "<tr>
					<td>" . $line->id_person . "</td>
					<td>" . $student . "</td>
					<td>" . $line->first_name . " " . $line->last_name . "</td>
					<td>" . $line->worked_until . "</td>
				</tr>";
		}
		
		/*
		 * echo '$displayInterns[1] = '.$displayInterns["1"].'<br />'; echo '$displayInterns[2] = '.$displayInterns["2"].'<br />'; echo '$displayInterns[3] = '.$displayInterns["3"].'<br />'; echo '$displayInterns[4] = '.$displayInterns["4"].'<br />'; echo '$displayInterns[5] = '.$displayInterns["5"].'<br />'; echo '$displayInterns[6] = '.$displayInterns["6"].'<br />';
		 */
		
		/**
		 * *************************************************************
		 * Preparing the table of contacts *
		 * *************************************************************
		 */
		$fetched_Contact = $ci->university_md->getAllUniv_Contact ();
		$displayContact = array ();
		$id_univ = "";
		$i = 1;
		
		foreach ( $fetched_Contact->result () as $line ) {
			$id_univ = $line->id_university;
			
			if (! isset ( $displayContact [$id_univ] )) {
				$displayContact [$id_univ] = "";
			}
			
			$displayContact [$id_univ] = $displayContact [$id_univ] . "<tr>
					<td>" . $line->id_contact . "</td>
					<td>" . $line->information . "</td>
					<td>" . $line->mail . "</td>
					<td>" . $line->number . "</td>
				</tr>";
		}
		
		/**
		 * *************************************************************
		 * Preparing the table of universities *
		 * *************************************************************
		 */
		$fetched_univ = $ci->university_md->getAll ();
		$result = "";
		$id_univ = "";
		$i = 1;
		
		foreach ( $fetched_univ->result () as $line ) {
			if ($id_univ != $line->id_university) {
				$id_univ = $line->id_university;
				
				// Switching the state number to the real values
				switch ($line->checking_state) {
					case 0 :
						$classUniv = "";
						$state = "First newsletter sent";
						break;
					case 1 :
						$classUniv = "success";
						$state = "Approved";
						break;
					case 2 :
						$classUniv = "warning";
						$state = "Waiting";
						break;
					case 3 :
						$classUniv = "error";
						$state = "Wrong";
						break;
					default :
						$classUniv = "N/A";
						$state = "N/A";
						break;
				}
				
				$subcription = ($line->subscription == 1) ? "Yes" : "No";
				
				$result = $result . "
					<tr>
						<tr>
							<td>
								<input type='checkbox' id='chk" . $i . "' onclick='selectedUniv(\"" . $line->name . "\", \"" . $line->id_university . "\", \"chk" . $i . "\")'>
							</td>
							<td>" . $line->id_university . "</td>
							<td>" . $line->name . "</td>
							<td>" . $line->address . "</td>
							<td>" . $line->country . "</td>
							<td>" . $subcription . "</td>
							<td>" . $state . "</td>
							<td><a href='#viewdetail' data-toggle='modal'>Click here</a></td>
						
						</tr>

						<tr class='" . $classUniv . "' id='secLine" . $i . "'>
							<td colspan='3'>
								<table>
									<thead>
										<tr>
											<th>#</th>
											<th>Student</th>
											<th>Name</th>
											<th>Worked until</th>
										</tr>
									</thead>
									<tbody>
										" . $displayInterns [$line->id_university] . "
									</tbody>
								</table>
							</td>
							<td colspan='3'>
								<table>
									<thead>
										<tr>
											<th>#</th>
											<th>Information</th>
											<th>Mail</th>
											<th>Phone</th>
										</tr>
									</thead>
									<tbody>
										" . $displayContact [$line->id_university] . "
									</tbody>
								</table>
							</td>
							<td><button>Modify</button></td>
							<td><button>Delete</button></td>
					</tr>";
				
				$i ++;
			}
		}
		return $result;
	}
	public function get() {
		$ci = new CI_CONTROLLER ();
		$id = $ci->uri->segment ( 4 );
		
		$university = new University ( $id );
		
		exit ( json_encode ( array (
				"id" => $university->getId (),
				"name" => $university->getName (),
				"address" => $university->getAdress (),
				"country" => $university->getCountry (),
				"subscription" => $university->getSubscription (),
				"checking state" => $university->getCheckingState (),
				"comment" => $university->getComment () 
		) ) );
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
	public function addCommentOnUniversity() {
		$ci = new CI_CONTROLLER ();
		$this->load->model ( 'university/university_md' );
		$this->load->database ();
		
		$id = $this->input->post ( 'id' );
		$comment = $this->input->post ( 'comment' );
		
		$result = $this->university_md->addCommentOnUniversity ( $id, $comment );
	}
	public function initialiseValue() {
		$result = $this->university_md->get ( $this->id );
		
		if ($result->num_rows ()) {
			$data = $result->row ();
			$this->name = $data->name;
			$this->address = $data->address;
			$this->country = $data->country;
			$this->subscription = $data->subscription;
			$this->checking_state = $data->checking_state;
			$this->comment = $data->comment;
		}
	}
	public function verificationAddUniversity() {
		// loading of the library
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'university/university_md' );
		$this->load->database ();
		
		$this->form_validation->set_rules ( 'UniversityName', '"University Name"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'Adress', '"Adress"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'inputCountry', '"Country"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'inputIntern', '"Intern"', 'trim|required|encode_php_tags|xss_clean' );
		
		if ($this->form_validation->run ()) {
			// If the form is valid
			$name = $this->input->post ( 'UniversityName' );
			$address = $this->input->post ( 'Adress' );
			$country = $this->input->post ( 'inputCountry' );
			$subscription = 0;
			$checking_state = 2;
			
			$result = $this->university_md->create ( $name, $address, $country, $subscription, $checking_state );

			$this->index (true);
		} else {
			// If the form is not valid or empty
			$address = $this->input->post ( 'Adress' );
			$inputInfoContact = $this->input->post ( 'inputInfoContact' );
			$this->formCompletion ( $address, $inputInfoContact );
		}
	}
	
	public function formCompletion($address, $inputInfoContact) {
		$data = array ();
		$data ['allUniv'] = $this->getAllUniversities ();
		$data ['allNames'] = Intern::getAllNames ();
		$data ['allCountries'] = University::getAllCountries();
		$data ['address'] = $address;
		$data ['inputInfoContact'] = $inputInfoContact;
		$data ['is_success'] = "false";
		
		$this->load->view ( 'university/head' );
		$session_data = $this->session->userdata('logged_in');
		$sess['username'] = $session_data['username'];
		$this->load->view ( 'university/topmenu', $sess );
		$this->load->view ( 'university/leftmenu' );
		$this->load->view ( 'university/body', $data );
		$this->load->view ( 'university/footer' );
	}
	
	public static function getAllCountries()
	{	
		$ci = new CI_CONTROLLER();
		$ci->load->model('university/university_md');
		$ci->load->database();
		$fetched = $ci->university_md->getAllCountries();
		
		$result = "'[";		
		$first = true;
		
		foreach($fetched->result() as $ligne)
		{
			if ($first)
			{
				$first = false;
				$result = $result.'"'.$ligne->country.'"';

			}
			else
			{
				$result = $result.',"'.$ligne->country.'"';
			}
		}
		$result = $result."]'";
		return $result;
	}
}
