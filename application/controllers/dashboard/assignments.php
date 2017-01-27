<?php



class Assignments extends CI_Controller{

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

	public function createAssignment()
	{

		$project = $this->projectInstance->getProjects();

		$inputs = array('project', 'assign_name','description','assigned_to', 'deadline');
		$messages = $this->session->flashdata('message');
		if(empty($messages)){
			$messages = array();
		}
		$data = returnMessages($inputs, $messages);
		$role = $this->userInstance->getDetails($this->userId)->role;
		if($role==1)
		{
			$data['profile'] = $this->userInstance->getUsers();
		}
		else
		{
			$data['profile'] = $this->assignmentInstance->getValidList($this->userId);
		}
		$data['action'] = base_url().'dashboard/assignments/validateassignment';
		
		$data['project']=$project;
		$header = array('base_url' => base_url(),'title' => 'Assignments','heading' => 'Create Assignments');
		$this->parser->parse('dashboard/header_view.php',$header);
		$this->parser->parse('dashboard/pages/create_assign_view',$data);
		$footer = array('base_url' => base_url());		
		$this->parser->parse('dashboard/footer_view.php', $footer);
	}

	

	public function validateAssignment($userid)
	{
		$key = ''; 
		$value = '';
		$values = array();
		$this->form_validation->set_rules('assign_name', 'Assign_name','required');
		$this->form_validation->set_rules('description', 'Description','required');
		$this->form_validation->set_rules('assigned_to', 'Assign_To','required');
		$this->form_validation->set_rules('deadline', 'Deadline','required');
		$this->form_validation->set_rules('project', 'Project','required');


		if($this->form_validation->run() == false)
		{
			$inputs = array('project','assign_name','description','assigned_to', 'deadline');
			$errors = fillErrors($inputs);
			$key    = $errors[0];
			$value  = $errors[1];  
		}else{

			$project 		= $this->input->post('project');
			$assign_name    = $this->input->post('assign_name');
			$description    = $this->input->post('description');
			$assign_to      = $this->input->post('assigned_to');
			$deadline 		= $this->input->post('deadline');
			
			
					
					$result   = $this->assignmentInstance->createAssignment($project,$assign_name,$description,$deadline,$assign_to,$userid);
					
				if($result)
				{
					$key = 'message';
					$value = array('0' => 'result',
								   '1' => '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Assignment has been created!</div>'
					         	);
				}
				else
				{
					$key = 'message'; 
					$value = array('0' => 'result',
								   '1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Something went wrong. failed to create assignment.</div>'
					        	);
				}
			}
			

		$this->session->set_flashdata('values', $values);
		$redirect ='dashboard/assignments/createassignment';
		ajaxHelper($key, $value, $redirect);
	}

	public function createSeparateAssignment()
	{

		$project = $this->projectInstance->getProjects();

		$inputs = array('assign_name','description','assigned_to', 'deadline');
		$messages = $this->session->flashdata('message');
		if(empty($messages)){
			$messages = array();
		}
		$data = returnMessages($inputs, $messages);
		$role = $this->userInstance->getDetails($this->userId)->role;
		if($role==1)
		{
			$data['profile'] = $this->userInstance->getUsers();
		}
		else
		{
			$data['profile'] = $this->assignmentInstance->getValidList($this->userId);
		}
		$data['action'] = base_url().'dashboard/assignments/validateseparateassignment';
		
		$data['project']=$project;
		$header = array('base_url' => base_url(),'title' => 'Assignments','heading' => 'Create Separate Assignments');
		$this->parser->parse('dashboard/header_view.php',$header);
		$this->parser->parse('dashboard/pages/create_sepassign_view',$data);
		$footer = array('base_url' => base_url());		
		$this->parser->parse('dashboard/footer_view.php', $footer);
	}

	

	public function validateSeparateAssignment($userid)
	{
		$key = ''; 
		$value = '';
		$values = array();
		$this->form_validation->set_rules('assign_name', 'Assign_name','required');
		$this->form_validation->set_rules('description', 'Description','required');
		$this->form_validation->set_rules('assigned_to', 'Assign_To','required');
		$this->form_validation->set_rules('deadline', 'Deadline','required');
		


		if($this->form_validation->run() == false)
		{
			$inputs = array('assign_name','description','assigned_to', 'deadline');
			$errors = fillErrors($inputs);
			$key    = $errors[0];
			$value  = $errors[1];  
		}else{

			
			$assign_name    = $this->input->post('assign_name');
			$description    = $this->input->post('description');
			$assign_to      = $this->input->post('assigned_to');
			$deadline 		= $this->input->post('deadline');
			
			
					
					$result   = $this->assignmentInstance->createSeparateAssignment($assign_name,$description,$deadline,$assign_to,$userid);
					
				if($result)
				{
					$key = 'message';
					$value = array('0' => 'sepresult',
								   '1' => '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Assignment has been created!</div>'
					         	);
				}
				else
				{
					$key = 'message'; 
					$value = array('0' => 'sepresult',
								   '1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Something went wrong. failed to create assignment.</div>'
					        	);
				}
			}
			

		$this->session->set_flashdata('values', $values);
		$redirect ='dashboard/assignments/createseparateassignment';
		ajaxHelper($key, $value, $redirect);
	}

}	