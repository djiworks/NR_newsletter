<?php
 
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
		$this->load->view('intern/head');
		$this->load->view('intern/topmenu');
		$this->load->view('intern/body');
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
		$ci->load->model('intern_md');
		$this->load->database();
		$fetched = $ci->intern_md->getAll();
		
		$result = "";		
		$i = 1;
		
		foreach($fetched->result() as $ligne)
		{
			//Switching the state number to the real values
			switch($ligne->checking_state) {
				case 0:
					$classUniv = "";
					$state = "Approved";
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
}