<?php

class Account extends CI_Controller{
	public function __construct(){

		parent::__construct();

		if(!$this->session->userdata('user_isLogged'))
		{
			redirect('dashboard/authentic/login', 'refresh');
		}
		$this->load->model('UserModel','userInstance');
		$this->load->model('AssignmentModel','assignmentInstance');
		
		$this->userId   = $this->session->userdata('user_isLogged')['user_id'];
		$this->username = $this->session->userdata('user_isLogged')['first_name'].' '.$this->session->userdata('user_isLogged')['last_name'];
		
	}

	public function index(){
		$header = array('base_url' => base_url(),'title' => $this->username,'heading' => 'Profile');
		$this->parser->parse('dashboard/header_view.php',$header);
		$profile = $this->userInstance->getProfileInfo($this->userId);
		$assignments =$this->assignmentInstance->getAssignInfo($this->userId);
		
		$fname = $this->userInstance->getDetails($this->userId)->first_name;
		$lname = $this->userInstance->getDetails($this->userId)->last_name;
		$email = $this->userInstance->getDetails($this->userId)->email;
		$mobile = $this->userInstance->getDetails($this->userId)->mobile;
		$id = $this->userInstance->getDetails($this->userId)->user_id;
		$role = $this->userInstance->getDetails($this->userId)->role;

		$inputs = array('fname'=>$fname,'lname'=>$lname,'email1'=>$email, 'phone'=>$mobile, 'cpass', 'npass', 'rpass');
		$messages = $this->session->flashdata('message');
		if(empty($messages)){
			$messages = array();
		}
		$data = returnMessages($inputs, $messages);
		if($role==1){
			$data['role'] = '<a class="btn btn-primary" href="'.base_url().'dashboard/project/createproject/'.$id.'">New Project</a>';
		}else{
			$data['role'] = '';
		}
		$data['action'] = base_url().'dashboard/authentication/validateregister';
		$data['profile'] = $profile;
		$data['assignments'] = $assignments;
		
		$this->parser->parse('dashboard/account/account_view', $data);
		$footer = array('base_url' => base_url());		
		$this->parser->parse('dashboard/footer_view.php', $footer);
	}
	
	public function validateAccountInfo(){
		$key = ''; 
		$value = '';
		$values = array();

		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('email1','E-Mail','required|valid_email|max_length[150]|callback_uniqueEmail');
		$this->form_validation->set_rules('phone','Mobile Phone','required|regex_match[/[0]{1}[1]{1}[0-9]{9}$/]|callback_isRegistered');

		if($this->form_validation->run() == false)
		{
			$inputs = array('fname','lname','email1','phone');
			$errors = fillErrors($inputs);
			$key    = $errors[0];
			$value    = $errors[1];  

		}else{

			$fname    = $this->input->post('fname');
			$lname    = $this->input->post('lname');
			$email    = $this->input->post('email1');
			$phone    = $this->input->post('phone');

			$result   = $this->userInstance->updateUserInfo($this->userId, $fname,$lname,$email,$phone);
			if($result){
				$key = 'message';
				$value = array('0' => 'fname',
							   '1' => '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>account info '.$fname.' has been updated!</div>'
				         	);
			}else{
				$key = 'message'; 
				$value = array('0' => 'fname',
							   '1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Something has happened. failed to update your account.</div>'
				        	);
			}

		}
		$this->session->set_flashdata('values', $values);
		$redirect ='dashboard/account/';
		ajaxHelper($key, $value, $redirect);
	}

	

	public function validateEditProfile(){
		$key = ''; 
		$value = '';
		$values = array();
		$this->form_validation->set_rules('fname');
		$this->form_validation->set_rules('lname');
		$this->form_validation->set_rules('email','E-Mail','valid_email|max_length[150]|callback_uniqueEmail');
		$this->form_validation->set_rules('phone','Mobile Phone','regex_match[/[0]{1}[1]{1}[0-9]{9}$/]|callback_isRegistered');
		$this->form_validation->set_rules('cpass','password confirmation','callback_isCurruentPass');
		$this->form_validation->set_rules('npass','password','min_length[8]|matches[rpass]');
		$this->form_validation->set_rules('rpass','password confirmation');

		if($this->form_validation->run() == false)
		{
			$inputs = array('fname','lname','email','phone','cpass','npass','rpass');
			$errors = fillErrors($inputs);
			$key    = $errors[0];
			$value    = $errors[1];  

		}else{

			$fname    = $this->input->post('fname');
			$lname    = $this->input->post('lname');
			$email    = $this->input->post('email');
			$phone    = $this->input->post('phone');
			$newPassword   = md5($this->input->post('npass'));

			$result   = $this->userInstance->updateProfile($fname, $lname, $email, $phone, $newPassword,$this->userId);
			if($result){
				$key = 'message';
				$value = array('0' => 'rpass',
							   '1' => '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Profile has Been Updated!</div>'
				         	);
			}else{
				$key = 'message'; 
				$value = array('0' => 'rpass',
							   '1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Something has happened. failed to update Profile.</div>'
				        	);
			}

		}
		$this->session->set_flashdata('values', $values);
		$redirect ='dashboard/account/';
		ajaxHelper($key, $value, $redirect);
	}

	public function isRegistered($phone)
	{	
		$result = $this->userInstance->getUserInfo($phone);
		if(!empty($result)){
			$userId = $result[0]['user_id'];
			if($userId == $this->userId){
				return true;
			}else{
				$this->form_validation->set_message('isRegistered','This phone is registerd!');
				return false;
			}
		}else{
			return true;
		}
	}

	public function uniqueEmail($email)
	{	
		$result = $this->userInstance->getUserInfo($email);
		if(!empty($result)){
			$userId = $result[0]['user_id'];
			if($userId == $this->userId){
				return true;
			}else{		
				$this->form_validation->set_message('uniqueEmail','this email is registerd!');
				return false;
			}
		}else{
			return true;
		}
	}

	public function isCurruentPass($password)
	{	
		$result = $this->userInstance->getUserInfo($this->userId);
		if(!empty($password) ){
			$currentPassword = $result[0]['password'];
			if(md5($password) == $currentPassword){
				return true;
			}else{		
				$this->form_validation->set_message('isCurruentPass','Incorrect Password!');
				return false;
			}
			
		}
	}
}
