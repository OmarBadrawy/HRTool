<?php

class User extends CI_Controller {

function __construct()
	{
		parent::__construct();

		
		$this->load->model('UserModel','userInstance');

		if(!$this->session->userdata('admin_isLogged'))
		{
			redirect('admin/authentication/login', 'refresh');
		}
	}

	public function userList()
	{
		$list = $this->userInstance->getUsers();
		$users = array('users'=> $list);
		$this->load->view('admin/header_view');
		$this->parser->parse('admin/user_list_view',$users);
		$this->load->view('admin/footer_view');
	}

	public function addUser()
	{	
		$this->load->view('admin/header_view');
		$inputs = array('fname','lname','email', 'password','phone', 'role');
		$messages = $this->session->flashdata('message');
		if(empty($messages)){
			$messages = array();
		}
		$data = returnMessages($inputs, $messages);
		$data['action'] = base_url().'admin/user/validateadduser';
		$this->parser->parse('admin/add_user_view', $data);
		$this->load->view('admin/footer_view');

	}
 
 	

	public function validateAddUser()
	{

		header("Content-type: text/json");
   		header("Content-type: application/json");
		$response = '';

		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('email','E-Mail','required|valid_email|max_length[150]|callback_uniqueEmail');
		$this->form_validation->set_rules('user_password','password','required|min_length[8]');
		$this->form_validation->set_rules('phone','Mobile Phone','required|regex_match[/[0]{1}[1]{1}[0-9]{9}$/]|callback_isRegistered');
		$this->form_validation->set_rules('role','role','callback_checkrole');


		if($this->form_validation->run() == false)
		{
			$inputs = array('fname','lname','email', 'user_password','phone','role');
			$errors = array();
			$e =0; //counter e for errors
			for($i = 0; $i < count($inputs); $i++){
				$error = form_error($inputs[$i]);
				if(!empty($error)){
					$errors[$e] = $inputs[$i];
					$errors[$e+1] = '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.'</div>'; 
					$e+=2;
				}
			}

			$response = array(
							'message' => $errors,
				         );


		}else{
			
			$fname    = $this->input->post('fname');

			$lname    = $this->input->post('lname');
			$email    = $this->input->post('email');
			$password = $this->input->post('user_password');
			$phone    = $this->input->post('phone');
			$role     = $this->input->post('role');
			
			$result   = $this->userInstance->addUser($fname,$lname,$email,md5($password),$phone,$role);
			$this->generateActivationToken($email, $password);
			if($result){
				$response = array(
								'message' =>array(
										'0' => 'result',
										'1' => '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>User has been added!</div>'
									),
				         	);
			}else{
				$response = array(		
								'message' =>array(
												'0' => 'result',
												'1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Something has happened. failed to add user.</div>'
								),
				        	);
			}

		}
		echo json_encode($response);
	}

	public function generatePassword()
	{
		$pass = generateRandomString(8);
		$key = 'set';
		$value = array(	'id' => 'password',
						'setValue' => $pass
						);

		echoAjax($key, $value);
	}


	public function checkRole($role)
 	{
 		if($role == 1 || $role == 2 || $role == 3)
 		{

 		return true;			
		}else{
			$this->form_validation->set_message('checkrole','This role is invalid!');
			return false;
		}
 	}

	public function isRegistered($phone)
	{	
		$result = $this->userInstance->getUserInfo($phone);
		if(!empty($result)){
			$this->form_validation->set_message('isRegistered','This phone is registerd!');
			return false;
		}else{
			return true;
		}
	}

	public function uniqueEmail($email)
	{	
		$result = $this->userInstance->getUserInfo($email);
		if(!empty($result)){
			$this->form_validation->set_message('uniqueEmail','This Email is already registerd! Please enter a different Email');
			return false;
		}else{
			return true;
		}
	}

	private function generateActivationToken($email, $password){
		
		$token = generateRandomString(20);
		$is = FALSE;
		while($is == FALSE){
			$isToken = $this->userInstance->getUserActivationToken($token);
			if(!empty($isToken)){
				$token = generateRandomString(20);
				$is = FALSE;
			}else{
				$this->userInstance->addUserActivationToken($email,$token);
				$is = TRUE;
				$subject = "HRTool - Verification";
				$message = 'Please use the following link to verify your account: <br>
								'.base_url().'dashboard/Authentication/activate/'.$token . '<br> Email: ' .$email . '<br> Password: ' .$password ;
				sendmail($email, $message ,$subject);
			}
		}
	}

	public function deleteUser($id)
	{
        $result = $this->userInstance->deleteUser($id);
	}


}
