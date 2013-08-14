<?php
include_once (APPPATH . "controllers/intern/intern.php");
include_once (APPPATH . "controllers/newsletter/newsletter.php");

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
		$this->load->helper('login');
		$this->load->model ( 'university/university_md' );
		$this->load->database ();
		
		if ($id) {
			$this->id = $id;
			$this->initialiseValue ();
		}
	}
	
	public function index($is_success = NULL) {
			isLoggedInRedirect($this);
			
			$data = array ();
			$data ['allUniv'] = $this->getAllUniversities ();
			$data ['allNames'] = Intern::getAllNames ();
			$data ['allCountries'] = $this->getAllCountries();
			$data ['newsletterList'] = Newsletter::getNewsletterList();

			if(isset($is_success)){
				$data ['is_success'] = $is_success;
			}
		
			$this->load->view ( 'university/head' );
			$session_data = $this->session->userdata('logged_in');
			$data ['role'] = $session_data['role'];
			
			loadTopMenu($this, 'university', $session_data) ;
			isAllowedToView($this, 2, '/university/leftmenu');
			//~ $this->load->view ( '/university/leftmenu' );
			$this->load->view ( 'university/body', $data );
			$this->load->view ( 'university/footer' );
	}
	
	public function addUniversity($is_success = NULL) {
			isLoggedInRedirect($this);
			
			$data = array ();
			$data ['allUniv'] = $this->getAllUniversities ();
			$data ['allNames'] = Intern::getAllNames ();
			$data ['allCountries'] = $this->getAllCountries();
			$data ['newsletterList'] = Newsletter::getNewsletterList();

			if(isset($is_success)){
				$data ['is_success'] = $is_success;
			}
		
			$this->load->view ( 'university/head' );
			$session_data = $this->session->userdata('logged_in');
			
			loadTopMenu($this, 'university', $session_data) ;

			//~ $this->load->view ( 'university/leftmenu' );
			$this->load->view ( 'university/addUniversity', $data );
			$this->load->view ( 'university/footer' );
	}
	
	public function accueil() {
		isLoggedInRedirect($this);

		$this->index ();
	}
	
	public function getAllUniversities() {
		isLoggedInRedirect($this);

		$state_table = array();
		$state_table[0] = "First newsletter sent";
		$state_table[1] = "Approved";
		$state_table[2] = "Waiting";
		$state_table[3] = "Wrong";
		
		$ci = new CI_CONTROLLER ();
		$ci->load->model('university/university_md');
		//~ $this->load->database ();
		$sess = $this->session->userdata('logged_in');
		
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
					<td class='classTabContactPhone'>".$line->number."</td>";
					
			if($line->number){
				$displayContact [$id_univ] = $displayContact [$id_univ]."
					<td><button class='btn btn-small btn-info' onclick=\"window.location.href = 'skype:".$line->number."?call';\"><i class='icon-headphones'></i>Call</button></td>";
				}
				else
				{
					$displayContact [$id_univ] = $displayContact [$id_univ]."
					<td></td>";
				}
			
				$displayContact [$id_univ] = $displayContact [$id_univ]."
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
				$sess = $this->session->userdata('logged_in');

				switch ($line->checking_state) {
					case 0 :
						$classUniv = "classNormal";
						$state = "First newsletter sent";
						$input = "<input type='checkbox' id='chk".$i."' onclick='selectedUniv(\"".$line->name."\", \"".$line->id_university."\", \"chk".$i."\")'>";
						break;
					case 1 :
						$classUniv = "classSuccess";
						$state = "Approved";
						$input = "<input type='checkbox' id='chk".$i."' onclick='selectedUniv(\"".$line->name."\", \"".$line->id_university."\", \"chk".$i."\")'>";
						break;
					case 2 :
						$classUniv = "classWarning";
						$state = "Waiting";
						$input = "NA";
						break;
					case 3 :
						$classUniv = "classError";
						$state = "Wrong";
						$input = "NA";
						break;
					default :
						$classUniv = "N/A";
						$state = "N/A";
						$input = "N/A";
						break;
				}
				
				$state_list = '<li class="dropdown">
						<a id="dropCheckingState'.$line->id_university.'" class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
						 '. $state_table[$line->checking_state] .' 
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropCheckingState'.$line->id_university.'" role="menu">
							';
		
				$state_list = $state_list . '<li role="presentation">
				<a href="university/updateCheckingState/'.$line->id_university.'/0" tabindex="-1" role="menuitem">
			First newsletter sent</a></li>';
			
				$state_list = $state_list . '<li role="presentation">
				<a href="university/updateCheckingState/'.$line->id_university.'/1" tabindex="-1" role="menuitem">
			Approved</a></li>';
			
				$state_list = $state_list . '<li role="presentation">
				<a href="university/updateCheckingState/'.$line->id_university.'/2" tabindex="-1" role="menuitem">
			Waiting</a></li>';
			
				$state_list = $state_list . '<li role="presentation">
				<a href="university/updateCheckingState/'.$line->id_university.'/3" tabindex="-1" role="menuitem">
			Wrong</a></li>';
							
				$state_list = $state_list . '
								</ul>
							</li>';	
				
				//Changing the value of subscription
				$subcription = ($line->subscription == 1) ? "Yes" : "No";
				
				$result = $result."
					<div class='accordion-group'>
						<div class='accordion-heading'>
							<ul class='nav wrapTab ".$classUniv."'>
								<li class='classToSend'>
									";
				if($sess['role']<= 2)
				{
					$result = $result.$input;
				}				
					$result = $result."
								</li>
								<li class='classNumber'>".$line->id_university."</li>
								<li class='className'>".$line->name."</li>
								<li class='classAddress'>".$line->address."</li>
								<li class='classCountry'>".$line->country."</li>
								<li class='classSubscription'>".$subcription."</li>";
												
								
					$result = $result."	<li class='classChkState'><ul>".$state_list."</ul></li>
								<li class='classDetails'>
									<a class='accordion-toggle btn btn-small' data-toggle='collapse' data-parent='#accordion' href='#collapse".$i."'>View Details</a>
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
														<th></th>
													</tr>
												</thead>
												<tbody>
													".$displayContact[$line->id_university]."
												</tbody>
											</table>
										</li>";
							if($sess['role']<= 3)
							{
								$result = $result.		
										"<li class='classBtnModify'><button class='btn btn-small' type='button' onclick =modifyUniversity(".$line->id_university.")>Modify</button></li>
										<li class='classBtnDelete'><button class='btn btn-small' type='button' onclick =deleteUniversity(".$line->id_university.")>Delete</button></li>";
							}				
								$result = $result."</ul>
								</div>
							</div>
						</div>
					</div>";
		
				$i ++;
			}
		}
		return $result;
	}
	
	public function deleteUniversity() {
		isLoggedInRedirect($this);
		isAllowed($this, 3);
		
		$id = $this->input->post ( 'confirmDeletionId' );

		$this->university_md->delete($id);
		
		$this->index(2);
	}
	
	public function get() {
		isLoggedInRedirect($this);

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
		isLoggedInRedirect($this);

		return $this->id;
	}
	
	public function getName() {
		isLoggedInRedirect($this);
		
		return $this->name;
	}
	
	public function getAdress() {
		isLoggedInRedirect($this);
		
		return $this->address;
	}
	
	public function getCountry() {
		isLoggedInRedirect($this);
		
		return $this->country;
	}
	
	public function getSubscription() {
		isLoggedInRedirect($this);
		
		return $this->subscription;
	}
	
	public function getCheckingState() {
		isLoggedInRedirect($this);
		
		return $this->checking_state;
	}
	
	public function getComment() {
		isLoggedInRedirect($this);
		
		return $this->comment;
	}
	
	public function addCommentOnUniversity() {
		isLoggedInRedirect($this);
		
		$ci = new CI_CONTROLLER ();
		$this->load->model ( 'university/university_md' );
		$this->load->database ();
		
		$id = $this->input->post ( 'id' );
		$comment = $this->input->post ( 'comment' );
		
		$result = $this->university_md->addCommentOnUniversity ( $id, $comment );
	}
	
	public function initialiseValue() {
		isLoggedInRedirect($this);
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
		isLoggedInRedirect($this);
		isAllowed($this, 3);

		// loading of the library
		$this->load->library('form_validation');
		$this->load->model('university/university_md');
		$this->load->model('contact/contact_md');
		$this->load->model('intern/intern_md');
		$this->load->database();
		
		$this->form_validation->set_rules('UniversityName', '"University Name"', 'trim|required|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('Adress', '"Adress"', 'trim|required|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('inputCountry', '"Country"', 'trim|required|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('inputIntern', '"Intern"', 'trim|encode_php_tags|xss_clean');
		
		if ($this->form_validation->run ()) {
			//If the form is valid
			//In a first time we create the university
			$name = $this->input->post('UniversityName');
			$address = $this->input->post('Adress');
			$country = $this->input->post('inputCountry');
			$subscription = 0;
			$checking_state = 2;
			
			//Getting the id of the new university
			$result = $this->university_md->create($name, $address, $country, $subscription, $checking_state);
			foreach ( $result->result () as $line ) {
				$id_univ = $line->id_univ;
			}
			
			//Then we link the intern to the university
			$person = $this->input->post('inputIntern');
			$person = explode(" ", $person);
			$resultPerson = $this->intern_md->getSearchedInterns("last_name", $person[sizeOf($person) -1]);
			
			//Getting the id of the intern
			foreach($resultPerson->result () as $line) {
				$id_person = $line->id_person;
			}
			$this->university_md->university_recommendedBy_intern($id_univ, $id_person);

			//Finally we create the contacts linked to the university
			$nbContact = $this->input->post('nbIntern2Add');
			
			for($i = 1 ; $i <= $nbContact ; $i++) {
				//Get the value of the text area
				$varName = 'textAreaInfoContact'.$i;
				if($this->input->post($varName)) {
					$InfoContact = $this->input->post($varName);
				} else {
					$InfoContact = "";
				}
				
				if(!empty($InfoContact)) {
					//Creation of the contact
					$resultCo = $this->contact_md->createContact($InfoContact, $id_univ);
					foreach($resultCo->result () as $line) {
						$id_contact = $line->id_contact;
					}
					
					//We add the phone and mail of the contact newly created
					//Get the email
					$varName = 'inputEmail'.$i;
					if($this->input->post($varName)) {
						$mail = $this->input->post($varName);
					} else {
						$mail = "";
					}
					
					//Get the phone 
					$varName = 'inputPhone'.$i;
					if($this->input->post($varName)) {
						$phone = $this->input->post($varName);
					} else {
						$phone = "";
					}
					
					///Check if it's a fax
					$varName = 'inputCheckFax'.$i;
					if($this->input->post($varName)) {
						$type = true;
					} else {
						$type = false;
					}
					
					if((!empty($mail)) && (!empty($phone))) {
						$this->contact_md->addMail2Contact($mail, $id_contact);
						$this->contact_md->addPhone2Contact($phone, $type, $id_contact);
					}
				}
			}
			
			$this->index (0);
		} else {
			// If the form is not valid or empty
			$address = $this->input->post ( 'Adress' );
			$inputInfoContact = $this->input->post ( 'inputInfoContact' );
			$this->formCompletion ( $address, $inputInfoContact );
		}
	}
	
	public function modifyUniversity() {
		isLoggedInRedirect($this);
		isAllowed($this, 3);

		echo 'TODO faire le controller modifyUniversity (reprendre addUniversity nouvelle version ?)';
	}
	
	public function formCompletion($address, $inputInfoContact) {
		isLoggedInRedirect($this);
		isAllowed($this, 3);

		$data = array ();
		$data ['allUniv'] = $this->getAllUniversities ();
		$data ['allNames'] = Intern::getAllNames ();
		$data ['allCountries'] = University::getAllCountries();
		$data ['newsletterList'] = Newsletter::getNewsletterList();
		$data ['address'] = $address;
		$data ['inputInfoContact'] = $inputInfoContact;
		$data ['is_success'] = 1;
		
		$this->load->view ( 'university/head' );
		$session_data = $this->session->userdata('logged_in');
		
		loadTopMenu($this, 'university', $session_data) ;
		
		//~ $this->load->view ( 'university/leftmenu' );
		$this->load->view ( 'university/addUniversity', $data );
		$this->load->view ( 'university/footer' );
	}
	
	public static function getAllCountries() {	
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');

		isLoggedInRedirect($ci);
		
		$ci->load->model('university/university_md');
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
	
	public static function getNumberWaitingUniversities() {	
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');

		isLoggedInRedirect($ci);
		
		$ci->load->model('university/university_md');
		$fetched = $ci->university_md->getNumberWaitingUniversities();
		$result = "";
		if($fetched->num_rows()>0 && ($fetched->row()->nb != 0))
		{
			$result = $fetched->row()->nb;
		}
		
		return $result;	}
	
	public static function getNumberWrongUniversities() {	
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');

		isLoggedInRedirect($ci);
	
		$ci->load->model('university/university_md');
		$fetched = $ci->university_md->getNumberWrongUniversities();
		
		$result = "";
		if($fetched->num_rows()>0 && ($fetched->row()->nb != 0))
		{
			$result = $fetched->row()->nb;
		}
		
		return $result;
	}
	
	public function updateCheckingState() {
		isLoggedInRedirect($this);
		
		$session_data = $this->session->userdata('logged_in');
		$id_user_session = $session_data['id'];
		
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');
		$ci->load->helper('url');		

		isLoggedInRedirect($ci);
		
		$ci->load->model('/university/university_md');
		$id_university = $ci->uri->segment(4);
		$checking_state = $ci->uri->segment(5);
		
		$ci->university_md->updateCheckingState($id_university, $checking_state);		
		redirect('university/university', 'refresh');
	}
	
}
