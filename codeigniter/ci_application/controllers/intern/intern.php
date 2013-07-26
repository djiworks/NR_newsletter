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
		$this->load->database();

		if($id){
					
			$this->id = $id;
			$this->initialiseValue();	
		}
	}

    public function index()
    {
		$data = array();
		$data['allInterns'] = $this->getAllInterns();
		$data ['allCountries'] = University::getAllCountries();

		$this->load->view('intern/head');
		$this->load->view('intern/topmenu');
		$this->load->view('intern/body', $data);
		$this->load->view('intern/footer');
    }
    
    public function accueil()
    {
		$this->index();
    }
    
    public function get()
    {
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
		return $this->id;
	}

	public function getFirstName() {
		return $this->first_name;
	}

	public function getLastName() {
		return $this->last_name;
	}

	public function getCountry() {
		return $this->country;
	}

	public function getPhone() {
		return $this->phone;
	}

	public function getMail() {
		return $this->mail;
	}

	public function getWorkUntil() {
	return $this->work_until;
	}

	public function addIntern(){
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
}
