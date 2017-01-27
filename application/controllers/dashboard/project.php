<?php



class Project extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('user_isLogged'))
		{
			redirect('dashboard/authentication/login', 'refresh');
		}
		$this->load->model('UserModel','userInstance');
		$this->load->model('AssignmentModel','assignmentInstance');
		$this->load->model('ProjectModel','projectInstance');
		
		$this->userId   = $this->session->userdata('user_isLogged')['user_id'];
		$this->username = $this->session->userdata('user_isLogged')['first_name'].' '.$this->session->userdata('user_isLogged')['last_name'];
			
	}

	public function createProject()
	{
		$profile = $this->userInstance->getProfileInfo($this->userId);
		$fname = $this->userInstance->getDetails($this->userId)->first_name;
		$lname = $this->userInstance->getDetails($this->userId)->last_name;
		$inputs = array('fname'=>$fname, 'lname'=>$lname, 'project_name','description', 'deadline');
		$messages = $this->session->flashdata('message');
		if(empty($messages)){
			$messages = array();
		}
		$data = returnMessages($inputs, $messages);
		$data['action'] = base_url().'dashboard/project/validateproject';
		$data['profile']=$profile;
		$header = array('base_url' => base_url(),'title' => 'Project','heading' => 'Create Project');
		$this->parser->parse('dashboard/header_view.php',$header);
		$this->parser->parse('dashboard/pages/create_project_view',$data);
		$footer = array('base_url' => base_url());		
		$this->parser->parse('dashboard/footer_view.php', $footer);
	}

	

	public function validateProject($userid)
	{
		$key = ''; 
		$value = '';
		$values = array();
		$this->form_validation->set_rules('project_name', 'Project_name','required');
		$this->form_validation->set_rules('description', 'Description','required');
		
		$this->form_validation->set_rules('deadline', 'Deadline','required');
		


		if($this->form_validation->run() == false)
		{
			$inputs = array('project_name','description', 'deadline');
			$errors = fillErrors($inputs);
			$key    = $errors[0];
			$value  = $errors[1];  
		}else{

			
			$project_name    = $this->input->post('project_name');
			$description    = $this->input->post('description');
			
			$deadline 		= $this->input->post('deadline');
			
			
			$result   = $this->projectInstance->createProject($project_name,$description,$deadline,$userid);
					
				if($result)
				{
					$key = 'message';
					$value = array('0' => 'result',
								   '1' => '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Project has been created!</div>'
					         	);
				}
				else
				{
					$key = 'message'; 
					$value = array('0' => 'result',
								   '1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Something went wrong. failed to create Project.</div>'
					        	);
				}
			}
			
			

		$this->session->set_flashdata('values', $values);
		$redirect ='dashboard/project/createproject';
		ajaxHelper($key, $value, $redirect);
	}
}	
