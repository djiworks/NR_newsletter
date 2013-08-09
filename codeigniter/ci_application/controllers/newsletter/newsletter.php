<?php
 
class Newsletter extends CI_Controller
{
	private $id;
	
	public function __construct(){
		parent::__construct(); 
		$this->load->helper('login');
		$this->load->model('newsletter/newsletter_md');

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
    
     public function deleteNewsletter()
	{
		isLoggedInRedirect($this);
		
		$id = $this->input->post ( 'confirmDeletionId' );

		$this->newsletter_md->delete($id);
		
		$this->index(2);
	}
       
    public function addNewsletter($is_success = NULL)
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
		$this->load->view('newsletter/addNewsletter', $data);

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
		//~ $this->load->database();
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
					<td><button class=\"btn btn-small\" type=\"button\" onclick='viewDetails(".$ligne->id_newsletter.")'>Click here</button></td>
				</tr>";
		}
		
		return $result;
	}

	public function verificationAddNewsletter(){
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
			$id_modify = $this->input->post ( 'modifyId' );
			if($id_modify != -1)
			{
				$creation_date = $this->input->post ( 'creationDate' );
				$checking_state = $this->input->post ( 'checkingState' );
			}
			else
			{
				$creation_date = date("Y-m-d");
				$checking_state = 2;
			}
			
			if($id_modify != -1)
			{
				$this->newsletter_md->update( $id_modify, $name, $cover, $path, $content, $description, $creation_date, $checking_state);
				$this->index (3);
			}
			else
			{
				$result = $this->newsletter_md->create ( $name, $cover, $path, $content, $description, $creation_date, $checking_state);
				$this->index (0);
			}
		} else {
			// If the form is not valid or empty
			$description = $this->input->post ( 'Description' );
			$content = $this->input->post ( 'Content' );
			
			//~ $this->formCompletion ( $description, $content );
			$this->addNewsletter(1);
		}
	}

	public function viewDetails()
	{
		isLoggedInRedirect($this);

		$sess = $this->session->userdata('logged_in');
		$id = $this->uri->segment ( 4 );
		$fetched = $this->newsletter_md->get($id);

		$result = "";		
		foreach ( $fetched->result () as $line ) {
			$result = $result."
						ID : ".$line->id_newsletter."</br>
						Type : ".$line->type."</br>
						Name: ".$line->name."</br>
						Description: ".$line->description."</br>
						Path: ".$line->path."</br>
						Creation date: ".$line->creation_date."</br>
						Cover: ".$line->cover."</br>
						Checking state: ".$line->checking_state."</br>
						Content: ".$line->content."</br>
						";
						
			if($sess['role']<= 3)
				{		
					$result = $result."
					<button class='btn btn-small' type='button' onclick=\"window.location.href = '/index.php/newsletter/newsletter/modifyNewsletter/".$id."';\">Modify</button>
					<button class='btn btn-small' type='button' onclick=deleteNewsletter(".$line->id_newsletter.")>Delete</button>";
				}
			}
		exit($result);
	}
	
	public function modifyNewsletter($id)
	{
		isLoggedInRedirect($this);

		$result = "";
		$fetched = $this->newsletter_md->get($id);
		$data = array();
		
		if(isset($is_success)){
			$data ['is_success'] = $is_success;
		}

		foreach ( $fetched->result () as $line ) {
			$data ['name'] = $line->name;
			$data ['cover'] = $line->cover;
			$data ['pathnews'] = $line->path;
			$data ['content'] = $line->content;
			$data ['description'] = $line->description;
			$data ['checkingState'] = $line->checking_state;
			$data ['creationDate'] = $line->creation_date;
			$data ['id_modify'] = $id;
			}
		
		$this->load->view('newsletter/head');
		$session_data = $this->session->userdata('logged_in');
		loadTopMenu($this, 'newsletter', $session_data);
		$this->load->view('newsletter/addNewsletter', $data);
		$this->load->view('newsletter/footer');
	}	
}
