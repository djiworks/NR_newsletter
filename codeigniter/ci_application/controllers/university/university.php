<?php
include_once (APPPATH."controllers/intern/intern.php");
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
	public function index() {
		$data = array ();
		$data ['allUniv'] = $this->getAllUniversities ();
		$data ['allNames'] = Intern::getAllNames ();
		
		$this->load->view ( 'university/head' );
		$this->load->view ( 'university/topmenu' );
		$this->load->view ( 'university/leftmenu' );
		$this->load->view ( 'university/body', $data );
		//$this->load->view ( 'university/test' );
		$this->load->view ( 'university/footer' );
	}
	public function accueil() {
		$this->index ();
	}
	public function getAllUniversities() {
		$ci = new CI_CONTROLLER ();
		$ci->load->model('university/university_md');
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
			
			$displayInterns [$id_univ] = $displayInterns [$id_univ]."
				<tr>
					<td class='classTabInternNumber'>".$line->id_person."</td>
					<td class='classTabInternStudent'>".$student."</td>
					<td class='classTabInternName'>".$line->first_name." ".$line->last_name."</td>
					<td class='classTabInternWorked'>".$line->worked_until."</td>
				</tr>";
		}
		
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
			
			$displayContact [$id_univ] = $displayContact [$id_univ]."
				<tr>
					<td class='classTabContactNumber'>".$line->id_contact."</td>
					<td class='classTabContactInfo'>".$line->information."</td>
					<td class='classTabContactMail'>".$line->mail."</td>
					<td class='classTabContactPhone'>".$line->number."</td>
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
						$classUniv = "classNormal";
						$state = "First newsletter sent";
						break;
					case 1 :
						$classUniv = "classSuccess";
						$state = "Approved";
						break;
					case 2 :
						$classUniv = "classWarning";
						$state = "Waiting";
						break;
					case 3 :
						$classUniv = "classError";
						$state = "Wrong";
						break;
					default :
						$classUniv = "N/A";
						$state = "N/A";
						break;
				}
				
				$subcription = ($line->subscription == 1) ? "Yes" : "No";
				
				$result = $result."
					<div class='accordion-group'>
						<div class='accordion-heading'>
							<ul class='nav wrapTab ".$classUniv."'>
								<li class='classToSend'>
									<input type='checkbox' id='chk".$i."' onclick='selectedUniv(\"".$line->name."\", \"".$line->id_university."\", \"chk".$i."\")'>
								</li>
								<li class='classNumber'>".$line->id_university."</li>
								<li class='className'>".$line->name."</li>
								<li class='classAddress'>".$line->address."</li>
								<li class='classCountry'>".$line->country."</li>
								<li class='classSubscription'>".$subcription."</li>
								<li class='classChkState'>".$state."</li>
								<li class='classDetails'>
									<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion' href='#collapse".$i."'>Click here</a>
								</li>
							</ul>
						</div>
						
						<br />
						
						<div id='collapse".$i."' class='accordion-body collapse'>
							<div class='accordion-inner ".$classUniv."'>
								<div class='accordion-body collapse in'>
									<ul class='nav wrapTab'>
										<li class='classTabIntern'>
											<table class='classTabInternIn'>
												<thead>
													<tr>
														<th class='classTabInternNumber'>#</th>
														<th class='classTabInternStudent'>Student</th>
														<th class='classTabInternName'>Name</th>
														<th class='classTabInternWorked'>Worked until</th>
													</tr>
												</thead>
												<tbody>
													".$displayInterns[$line->id_university]."
												</tbody>
											</table>
										</li>
										<li class='classTabContact'>
											<table class='classTabContactIn'>
												<thead>
													<tr>
														<th>#</th>
														<th>Information</th>
														<th>Mail</th>
														<th>Phone</th>
													</tr>
												</thead>
												<tbody>
													".$displayContact[$line->id_university]."
												</tbody>
											</table>
										</li>
										<li class='classBtnModify'><button>Modify</button></li>
										<li class='classBtnDelete'><button>Delete</button></li>
									</ul>
								</div>
							</div>
						</div>
					</div>";
		
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
		
		$id = $ci->uri->segment ( 4 );
		$comment = $ci->uri->segment ( 5 );
		
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
		
		$this->form_validation->set_rules ( 'UniversityName', '"University Name"', 'trim|required|alpha_dash|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'Adress', '"Adress"', 'trim|required|alpha_dash|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'inputCountry', '"Country"', 'trim|required|alpha_dash|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'inputIntern', '"Intern"', 'trim|required|alpha_dash|encode_php_tags|xss_clean' );
		
		if ($this->form_validation->run ()) {
			// If the form is valid
			$name = $this->input->post ( 'UniversityName' );
			$address = $this->input->post ( 'Adress' );
			$country = $this->input->post ( 'inputCountry' );
			$subscription = 0;
			$checking_state = 2;
			
			$result = $this->university_md->create ( $name, $address, $country, $subscription, $checking_state );
			
			$this->index ();
		} else {
			// Le formulaire est invalide ou vide
			$address = $this->input->post ( 'Adress' );
			$inputInfoContact = $this->input->post ( 'inputInfoContact' );
			$this->formCompletion ( $address, $inputInfoContact );
		}
	}
	public function formCompletion($address, $inputInfoContact) {
		$data = array ();
		$data ['allUniv'] = $this->getAllUniversities ();
		$data ['allNames'] = Intern::getAllNames ();
		$data ['address'] = $address;
		$data ['inputInfoContact'] = $inputInfoContact;
		
		$this->load->view ( 'university/head' );
		$this->load->view ( 'university/topmenu' );
		$this->load->view ( 'university/leftmenu' );
		$this->load->view ( 'university/body', $data );
		$this->load->view ( 'university/footer' );
	}
}
