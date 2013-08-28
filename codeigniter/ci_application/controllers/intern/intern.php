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

    public function index($is_success = NULL)
    {
		isLoggedInRedirect($this);

		$data = array();
		$data['allInterns'] = $this->getAllInterns();
		$data ['allCountries'] = University::getAllCountries();

		if(isset($is_success)){
			$data ['is_success'] = $is_success;
		}

		$this->load->view('intern/head');
		$session_data = $this->session->userdata('logged_in');
		$data ['role'] = $session_data['role'];
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
    
    public function deleteIntern()
	{
		isLoggedInRedirect($this);
		isAllowed($this, 3);

		$id = $this->input->post ( 'confirmDeletionId' );

		$this->intern_md->delete($id);
		
		$this->index(2);
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
		isAllowed($this, 3);
		
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
					<td><button class=\"btn btn-small\" type=\"button\" onclick='viewDetails(".$ligne->id_person.")'>Click here</button></td>
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
				$result = $result.'"'.$ligne->id_person.'-'.$ligne->first_name." ".$ligne->last_name.'"';

			}
			else
			{
				$result = $result.',"'.$ligne->id_person.'-'.$ligne->first_name." ".$ligne->last_name.'"';
			}
		}
		$result = $result."]'";
		return $result;
	}
	
	
	public function viewDetails()
	{
		isLoggedInRedirect($this);

		$sess = $this->session->userdata('logged_in');
		$id = $this->uri->segment ( 4 );
		$fetched = $this->intern_md->get($id);

		$result = "";		
		foreach ( $fetched->result () as $line ) {
			$result = $result."
						ID : ".$line->id_person."</br>
						First name: ".$line->first_name."</br>
						Last name: ".$line->last_name."</br>
						Phone number: ".$line->phone."</br>
						Mail: ".$line->mail."</br>
						Country: ".$line->country."</br>
						Worked until: ".$line->worked_until."</br>
						";
						
			if($sess['role']<= 3)
				{		
					$result = $result."
					<button class='btn btn-small' type='button' onclick =modifyIntern(".$line->id_person.")>Modify</button>
					<button class='btn btn-small' type='button' onclick =deleteIntern(".$line->id_person.")>Delete</button>";
				}
			}
		exit($result);
	}
	
	public function verificationAddIntern() {
		isLoggedInRedirect($this);
		isAllowed($this, 3);

		// loading of the library
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'intern/intern_md' );
		$this->load->database ();
		
		$this->form_validation->set_rules ( 'FirstName', '"First Name"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'LastName', '"LastName"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'Phone', '"Phone"', 'trim|required|encode_php_tags|xss_clean|' );
		$this->form_validation->set_rules ( 'Mail', '"Mail"', 'trim|required|encode_php_tags|xss_clean|valid_email' );
		$this->form_validation->set_rules ( 'Country', '"Country"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'WorkedUntil', '"Worked until"', 'trim|required|encode_php_tags|xss_clean' );
		
		
		//~ regex_match[\'([+][0-9]){0,15}$\']
		
		if ($this->form_validation->run()) {
			// If the form is valid
			$first_name = $this->input->post ( 'FirstName' );
			$last_name = $this->input->post ( 'LastName' );
			$phone = $this->input->post ( 'Phone' );
			$mail = $this->input->post ( 'Mail' );
			$country = $this->input->post ( 'Country' );
			$worked_until = $this->input->post ( 'WorkedUntil' );
			
			$only_modify = $this->uri->segment(4);
			if(isset($only_modify) && $only_modify)
			{
				$id = $this->input->post ( 'modifyId' );
				$result = $this->intern_md->update($id, $first_name, $last_name, $country, $phone, $mail, $worked_until);
				$this->index (3);
			}
			else
			{	
				$result = $this->intern_md->create($first_name, $last_name, $country, $phone, $mail, $worked_until);

				$this->index (0);
			}
		} else {
			// If the form is not valid or empty
			$this->formCompletion();
		}
	}
	
	public function formCompletion() {
		isLoggedInRedirect($this);
		isAllowed($this, 3);
			
		$data = array ();
		$data ['allCountries'] = University::getAllCountries();
		$data['allInterns'] = $this->getAllInterns();
		$data ['is_success'] = 1;
		
		$this->load->view ( 'intern/head' );
		$session_data = $this->session->userdata('logged_in');
		loadTopMenu($this, 'intern', $session_data);
		$this->load->view ( 'intern/body', $data );
		$this->load->view ( 'intern/footer' );
	}
	
	public function formCompletionModify(){
		isLoggedInRedirect($this);
		isAllowed($this, 3);
		$result = "";
		$id = $this->uri->segment ( 4 );
		$fetched = $this->intern_md->get($id);

		$result = "";		
		foreach ( $fetched->result () as $line ) {
			$result = $result.'
			<form method="post" name="modifyInternForm" id="modifyInternForm" action="/index.php/intern/intern/verificationAddIntern/true" class="form-horizontal">
			<input type="hidden"  name="modifyId" id="modifyId"  value=""/>

			<div class="control-group">
				<label class="control-label" for="FirstName">First name</label>
				<div class="controls">
					<input type="text" id="FirstName" name="FirstName" placeholder="First name" value="'.$line->first_name.'"/>
						<?php echo form_error(\'FirstName\'); ?> 
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="LastName">Last name</label>
				<div class="controls">
					<input type="text" id="LastName" name="LastName" placeholder="Last name" value="'.$line->last_name.'"/>
						<?php echo form_error(\'LastName\'); ?> 
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Mail">Email</label>
				<div class="controls">
					<input type="text" id="Mail" name="Mail" placeholder="Mail" value="'.$line->mail.'"/>
						<?php echo form_error(\'Mail\'); ?> 
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Phone">Phone</label>
				<div class="controls">
					<input type="text" id="Phone" name="Phone" placeholder="Phone" value="'.$line->phone.'"/>
						<?php echo form_error(\'Phone\'); ?> 
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="Country">Country</label>
				<div class="controls">
						<input class="span2" type="text" id="Country" name="Country"
							placeholder="Country" data-provide="typeahead" data-items="4"
							data-source= '.University::getAllCountries().'
							autocomplete="off" value="'.$line->country.'" />
						<?php echo form_error(\'Country\'); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="WorkedUntil">Worked until</label>
				<div class="controls">
					<input type="text" id="WorkedUntil" name="WorkedUntil" placeholder="ex : 2014-05-21" value="'.$line->worked_until.'"/>
						<?php echo form_error(\'WorkedUntil\'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn">Submit</button>
				</div>
			</div>
		</form>';
			}
		
		exit($result);
	}					
}
