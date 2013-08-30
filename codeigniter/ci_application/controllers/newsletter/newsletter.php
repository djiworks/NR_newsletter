<?php
 
class Newsletter extends CI_Controller
{
	private $id;
	
	public function __construct(){
		parent::__construct(); 
		$this->load->helper('login');
		$this->load->model('newsletter/newsletter_md');

	}

	public static function get($i)
	{
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');

		isLoggedInRedirect($ci);
		
		$ci->load->model('newsletter/newsletter_md');
		return $ci->newsletter_md->get($i);
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
		isAllowed($this, 3);
		
		$id = $this->input->post ( 'confirmDeletionId' );

		$old_result = $this->newsletter_md->get($id)->row(0);
		
		$this->load->helper('file');

		unlink($old_result->cover);
		unlink($old_result->path);

		$this->newsletter_md->delete($id);
		
		$this->index(2);
	}
       
    public function addNewsletter($is_success = NULL)
    {
		isLoggedInRedirect($this);
		isAllowed($this, 3);

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
    
    public static function getNewsletterListForUniversity(){	
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');
		isLoggedInRedirect($ci);

		$ci->load->model ( '/newsletter/newsletter_md' );
		$fetched_roles = $ci->newsletter_md->getNewsletterListForUniversity();
		$result = "";
				
		foreach ( $fetched_roles->result () as $line_bis ) {
				$result = $result . '<option>'.$line_bis->id_newsletter.'-'. $line_bis->name .'</option>';
		}

		return $result;
	}
	
    public static function getNewsletterListForIntern(){	
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');
		isLoggedInRedirect($ci);

		$ci->load->model ( '/newsletter/newsletter_md' );
		$fetched_roles = $ci->newsletter_md->getNewsletterListForIntern();
		$result = "";
				
		foreach ( $fetched_roles->result () as $line_bis ) {
				$result = $result . '<option>'.$line_bis->id_newsletter.'-'. $line_bis->name .'</option>';
		}

		return $result;
	}
    
	public function getAllNewsletters() {
		isLoggedInRedirect($this);
		
		$state_table = array();
		$state_table[0] = "Sent";
		$state_table[1] = "Approved";
		$state_table[2] = "Waiting";
		$state_table[3] = "Wrong";

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
			
				if(isset($ligne->cover)) {
					$cover_url = explode('/', $ligne->cover);
					$cover_url = "/assets/images/".$cover_url[count($cover_url)-1];
					$image = $cover_url;
				}
				else
				{
					$image = "/assets/holder/holder.js/80x100";
				}

			
			$state_list = '<ul><li class="dropdown">
						<a id="dropCheckingState'.$ligne->id_newsletter.'" class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
						 '. $state_table[$ligne->checking_state] .' 
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropCheckingState'.$ligne->id_newsletter.'" role="menu">
							';
		
				$state_list = $state_list . '<li role="presentation">
				<a href="newsletter/updateCheckingState/'.$ligne->id_newsletter.'/0" tabindex="-1" role="menuitem">
			Sent</a></li>';
			
				$state_list = $state_list . '<li role="presentation">
				<a href="newsletter/updateCheckingState/'.$ligne->id_newsletter.'/1" tabindex="-1" role="menuitem">
			Approved</a></li>';
			
				$state_list = $state_list . '<li role="presentation">
				<a href="newsletter/updateCheckingState/'.$ligne->id_newsletter.'/2" tabindex="-1" role="menuitem">
			Waiting</a></li>';
			
				$state_list = $state_list . '<li role="presentation">
				<a href="newsletter/updateCheckingState/'.$ligne->id_newsletter.'/3" tabindex="-1" role="menuitem">
			Wrong</a></li>';
							
				$state_list = $state_list . '
								</ul>
							</li></ul>';	
			
			$result =  $result."
				<tr class='".$classUniv."'>
					<td><img class='media-object' src='".$image."' alt='".$image."' width='100'/></td>
					<td>".$ligne->id_newsletter."</td>
					<td>".$ligne->name."</td>
					<td>".$ligne->description."</td>
					<td>".$ligne->creation_date."</td>
					<td>".$state_list."</td>
					<td><button class=\"btn btn-small\" type=\"button\" onclick='viewDetails(".$ligne->id_newsletter.")'>Click here</button></td>
				</tr>";
		}
		
		return $result;
	}

	public function verificationAddNewsletter(){
		isLoggedInRedirect($this);
		isAllowed($this, 3);
		
		// loading of the library
		$this->load->library ( 'form_validation' );
		$this->load->model ( 'newsletter/newsletter_md' );
		
		$this->form_validation->set_rules ( 'Name', '"Name"', 'trim|required|encode_php_tags|xss_clean' );
		$this->form_validation->set_rules ( 'Description', '"Description"', 'trim|required|encode_php_tags|xss_clean' );
		//~ $this->form_validation->set_rules ( 'Content', '"Content"', 'trim|required|encode_php_tags|xss_clean' );
		//~ $this->form_validation->set_rules ( 'Path', '"Path"', 'trim|required|encode_php_tags|xss_clean' );
		//~ $this->form_validation->set_rules ( 'Cover', '"Cover"', 'trim|required|encode_php_tags|xss_clean' );
		
		if ($this->form_validation->run () && ($_FILES['Path']['name']!='') && ($_FILES['Cover']['name']!='') && ($_FILES['Content']['name']!='')) {
			// If the form is valid
			$name = $this->input->post ( 'Name' );
			//~ $cover = $this->input->post ( 'Cover' );
			//~ $path = $this->input->post ( 'Path' );
			//~ $content = $this->input->post ( 'Content' );

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

			//If modify only, deletion of old files
			if($id_modify != -1)
			{
				$old_result = $this->newsletter_md->get($id_modify)->row(0);
				
				//~ var_dump($old_result);
				$this->load->helper('file');

				unlink($old_result->cover);
				unlink($old_result->path);
			}
			
			//Upload of the pdf
			$config['upload_path'] = '../univ_news_data/uploads/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '0';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['encrypt_name'] = false;
			$config['max_width']  = '';
			$config['max_height']  = '';

			$this->load->library('upload', $config);
			
			$errors = "";
			if(!$this->upload->do_upload('Path'))
			{
				echo "PATH PDF";
				$errors .= $this->upload->display_errors();
			}
			else
			{	
				$pdf_name = $this->upload->data();
				$pdf_name = $pdf_name['full_path'];
			}
				
			//Upload of the cover
			$config['upload_path'] = 'assets/images';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
			$config['max_size'] = '0';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['encrypt_name'] = false;
			$config['max_width']  = '';
			$config['max_height']  = '';
			
			$this->upload->initialize($config);
			
			if(!$this->upload->do_upload('Cover'))
			{
				echo "COVER";
				$errors .= $this->upload->display_errors();
			}
			else
			{
				$cover_name = $this->upload->data();
				$cover_name = $cover_name['full_path'];
			}
				
			//Upload of the content
			$config['upload_path'] = '../univ_news_data/uploads/';
			$config['allowed_types'] = 'html|htm|htmls|htx';
			$config['max_size'] = '0';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['encrypt_name'] = false;
			$config['max_width']  = '';
			$config['max_height']  = '';
			
			$this->upload->initialize($config);
			
			if(!$this->upload->do_upload('Content'))
			{
				echo "CONTENT";
				$errors .= $this->upload->display_errors();
			}
			else
			{
				$content = $this->upload->data();
				$content = $content['full_path'];
			}
				
			//Upload of the images of the newsletter
			$files = $_FILES;
			$cpt = count($_FILES['Newsletter_images']['name']);
			for($i=0; $i<$cpt; $i++)
			{

				$_FILES['Newsletter_images']['name']= $files['Newsletter_images']['name'][$i];
				$_FILES['Newsletter_images']['type']= $files['Newsletter_images']['type'][$i];
				$_FILES['Newsletter_images']['tmp_name']= $files['Newsletter_images']['tmp_name'][$i];
				$_FILES['Newsletter_images']['error']= $files['Newsletter_images']['error'][$i];
				$_FILES['Newsletter_images']['size']= $files['Newsletter_images']['size'][$i];
				
				$config['upload_path'] = '../univ_news_data/img';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '0';
				$config['remove_spaces'] = true;
				$config['overwrite'] = true;
				$config['encrypt_name'] = false;
				$config['max_width']  = '';
				$config['max_height']  = '';
					
				$this->upload->initialize($config);
				$this->upload->do_upload('Newsletter_images');	
				if(!$this->upload->do_upload('Newsletter_images'))
				{
					echo "Newsletter_images : ".$i;
					$errors .= $this->upload->display_errors();
				}
			}
			if($id_modify != -1)
			{
				if($errors == "")
				{
					$this->newsletter_md->update( $id_modify, $name, $cover_name, $pdf_name, $content, $description, $creation_date, $checking_state);
					$this->index (3);
				}
				else
				{
					$description = $this->input->post ( 'Description' );
					//~ $content = $this->input->post ( 'Content' );
					
					echo $errors;
					//~ $this->addNewsletter(1);
				}
			}
			else
			{
				if($errors == "")
				{
					$result = $this->newsletter_md->create ( $name, $cover_name, $pdf_name, $content, $description, $creation_date, $checking_state);
					//~ $content = $this->get($result);
					//~ var_dump($content->row(0)->content);
					$this->index (0);
				}
				else
				{
					$description = $this->input->post ( 'Description' );
					$content = $this->input->post ( 'Content' );
					
					echo $errors;
					//~ $this->addNewsletter(1);
				}
			}
		} else {
			// If the form is not valid or empty
			$description = $this->input->post ( 'Description' );
			$content = $this->input->post ( 'Content' );
			
			$this->addNewsletter(1);
		}
	}

	public function viewDetails()
	{
		isLoggedInRedirect($this);

		$sess = $this->session->userdata('logged_in');
		$id = $this->uri->segment ( 4 );
		$fetched = $this->newsletter_md->get($id);
		$this->load->helper('file');
		$result = "";		
		foreach ( $fetched->result () as $line ) {
			$cover_url = explode('/', $line->cover);
			$cover_url = "/assets/images/".$cover_url[count($cover_url)-1];
			
			$result = $result."
						ID : ".$line->id_newsletter."</br>
						Type : ".$line->type."</br>
						Name: ".$line->name."</br>
						Description: ".$line->description."</br>
						Path: ".$line->path."</br>
						Creation date: ".$line->creation_date."</br>
						Cover: ".$line->cover."</br>
						Checking state: ".$line->checking_state."</br>
						Content: ".$line->content."</br></br>
						<center><img src='".$cover_url."' alt='".$cover_url."' width='450'></center></br></br>
						";
						
			if($sess['role']<= 3)
				{		
					$result = $result."
					<button class='btn btn-small' type='button' onclick=\"window.location.href = '/index.php/newsletter/newsletter/modifyNewsletter/".$id."';\">Modify</button>
					<button class='btn btn-small' type='button' onclick=deleteNewsletter(".$line->id_newsletter.")>Delete</button></br>";
				}
			}
		exit($result);
	}
	
	public function modifyNewsletter($id)
	{
		isLoggedInRedirect($this);
		isAllowed($this, 3);

		$result = "";
		$fetched = $this->newsletter_md->get($id);
		$data = array();
		
		if(isset($is_success)){
			$data ['is_success'] = $is_success;
		}

		foreach ( $fetched->result () as $line ) {
			$data ['name'] = $line->name;
			//~ $data ['cover'] = $line->cover;
			//~ $data ['pathnews'] = $line->path;
			//~ $data ['content'] = $line->content;
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
	
	public static function getNumberWaitingNewsletters()
	{	
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');

		isLoggedInRedirect($ci);
		
		$ci->load->model('newsletter/newsletter_md');
		$fetched = $ci->newsletter_md->getNumberWaitingNewsletters();
		$result = "";
		if($fetched->num_rows()>0 && ($fetched->row()->nb != 0))
		{
			$result = $fetched->row()->nb;
		}
		
		return $result;	}
	
	public static function getNumberWrongNewsletters()
	{	
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');

		isLoggedInRedirect($ci);
		
		$ci->load->model('newsletter/newsletter_md');
		$fetched = $ci->newsletter_md->getNumberWrongNewsletters();
		$result = "";
		if($fetched->num_rows()> 0 && ($fetched->row()->nb != 0))
		{
			$result = $fetched->row()->nb;
		}
		
		return $result;	}
		
	public function updateCheckingState()
	{
		isLoggedInRedirect($this);
		
		$session_data = $this->session->userdata('logged_in');
		$id_user_session = $session_data['id'];
		
		$ci = new CI_CONTROLLER();
		$ci->load->helper('login');
		$ci->load->helper('url');		

		isLoggedInRedirect($ci);
		
		$ci->load->model('/newsletter/newsletter_md');
		$id_newsletter = $ci->uri->segment(4);
		$checking_state = $ci->uri->segment(5);
		
		$ci->newsletter_md->updateCheckingState($id_newsletter, $checking_state);		
		redirect('newsletter/newsletter', 'refresh');
	}
	
}
