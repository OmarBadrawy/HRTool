<?php

class Project extends CI_Controller {

function __construct()
	{
		parent::__construct();

		
		$this->load->model('UserModel','userInstance');
		$this->load->model('ProjectModel','projectInstance');
		$this->load->model('AssignmentModel','assignmentInstance');

		if(!$this->session->userdata('admin_isLogged'))
		{
			redirect('admin/authentication/login', 'refresh');
		}
	}

	public function projectsList()
	{
		$list         = $this->projectInstance->getProjects();

		$creator_name = $this->projectInstance->getCreatedBy();
		$projects     = array('projects'=> $list,'creator'=>$creator_name);
		$this->load->view('admin/header_view');
		$this->parser->parse('admin/project_list_view',$projects);
		$this->load->view('admin/footer_view');
	}

	public function assignmentsList()
	{
		$list          = $this->assignmentInstance->getAssignments();
		//var_dump($list); die;
		$assigned_to   = $this->assignmentInstance->getAssignmentDetails()->assigned_to;
		$assigned_name = $this->assignmentInstance->getAssignedName($assigned_to);
		$project_id    = $this->projectInstance->getProjectDetails()->project_id;
		$project_name  = $this->assignmentInstance->getProjectName($project_id);

		$assignments   = array('assignments'=> $list, 'assign'=> $assigned_name,'p_name'=>$project_name);
		//print_r($assignments); die;
		$this->load->view('admin/header_view');
		$this->parser->parse('admin/assignment_list_view',$assignments);
		$this->load->view('admin/footer_view');
	}
}