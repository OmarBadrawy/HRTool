<?php


class Authentication extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('UserModel','userInstance');
	}

	

	public function login()
	{   

		if($this->session->userdata('user_isLogged'))
		{
			redirect('dashboard/homepage', 'refresh');
		}
		$inputs = array('email', 'password');

		$messages = $this->session->flashdata('message');
		if(empty($messages)){
			$messages = array();
		}
		$data = returnMessages($inputs, $messages);
		$data['action'] = base_url().'dashboard/Authentication/validatelogin';
		$data['activation_message'] = '';
		$this->parser->parse('dashboard/login_view', $data);
	}

	public function register()	
	{
		$inputs = array('fname','lname','email', 'password','rpassword','phone', 'role');
		$messages = $this->session->flashdata('message');
		if(empty($messages)){
			$messages = array();
		}
		$data = returnMessages($inputs, $messages);
		$data['action'] = base_url().'dashboard/Authentication/validateregister';
		$this->parser->parse('dashboard/register_view',$data);
	}

	public function validateLogin()
	{
		$key = ''; $value = base_url().'dashboard/Authentication/validatelogin';
		$values = array();
		$this->form_validation->set_rules('email','E-Mail','required|valid_email|max_length[150]');
		$this->form_validation->set_rules('password','password','required|min_length[8]');
		if($this->form_validation->run() == false)
		{

			$inputs = array('email', 'password');
			$errors = fillErrors($inputs);
			$key    = $errors[0];
			$value    = $errors[1];  
		}else{

			$email    = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$result   = $this->userInstance->getUserInfo($email);
			$user_id  = $this->userInstance->getUser($email)->user_id;

			if(!empty($result)){
				$val = 1;
				$active = $this->userInstance->isActive($user_id, $val);
				if($active==1){
					$activated = $result[0]['activated'];
					if($activated){
						$flogin = $result[0]['flogin'];
						if($flogin==0){
							$flogin = $this->userInstance->fLogin($user_id,$val);
							$data = $result[0];
							$this->session->set_userdata('user_isLogged',$data);
							$key   = 'redirect';
							$value = 'dashboard/authentication/forgotpassword';
						}
						else{
						$dbPassword = $result[0]['password'];
						if($dbPassword == $password){
							$data = $result[0];
							$this->session->set_userdata('user_isLogged',$data);
							$key   = 'redirect';
							$value = 'dashboard/homepage';
						}else{
							$key   = 'message';
							$value = array('0' => 'email',
										   '1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Invalid Email or Password!</div>'	);
						}
					}
					}else{
						$key = 'message';
						$value = array('0' => 'email',
								   '1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Please check your mail for activation url.</div>'
									);	
						}
				}else{
					$key = 'message';
					$value = array('0' => 'email',
							   '1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>This account has been suspended.</div>'
								);	
				}
			}else{
				$key = 'message';
				$value = array('0' => 'email',
							   '1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>This E-Mail Is Not Registerd.</div>'
								);	
								
			}

		}
		$this->session->set_flashdata('values', $values);
		$redirect = 'dashboard/Authentication/login';
		ajaxHelper($key, $value, $redirect);
	}

	public function validateRegister()
	{
		$key = ''; 
		$value = '';
		$values = array();

		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('email','E-Mail','required|valid_email|max_length[150]|callback_uniqueEmail');
		$this->form_validation->set_rules('password','password','required|min_length[8]|matches[rpassword]');
		$this->form_validation->set_rules('rpassword','password confirmation','required');
		$this->form_validation->set_rules('phone','Mobile Phone','required|regex_match[/[0]{1}[1]{1}[0-9]{9}$/]|callback_isRegistered');
		$this->form_validation->set_rules('role','role','required');


		if($this->form_validation->run() == false)
		{
			$inputs = array('fname','lname','email', 'password','rpassword','phone','role');
			$errors = fillErrors($inputs);
			$key    = $errors[0];
			$value    = $errors[1];  

		}else{

			$fname    = $this->input->post('fname');
			$lname    = $this->input->post('lname');
			$email    = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$phone    = $this->input->post('phone');
			$role    = $this->input->post('role');
			
			$result   = $this->userInstance->addUser($fname,$lname,$email,$password,$phone,$role);
			$this->generateActivationToken($email);
			if($result){
				$key = 'message';
				$value = array('0' => 'register',
							   '1' => '<div class="alert btn alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>User has been added! please check your mail for activation.</div>'
				         	);
			}else{
				$key = 'message'; 
				$value = array('0' => 'register',
							   '1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Something has happened. failed to register.</div>'
				        	);
			}

		}
		$this->session->set_flashdata('values', $values);
		$redirect ='dashboard/Authentication/register';
		ajaxHelper($key, $value, $redirect);
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
			$this->form_validation->set_message('uniqueEmail','this email is registerd!');
			return false;
		}else{
			return true;
		}
	}

	public function logout()
	{ 
	  $this->session->unset_userdata('user_isLogged');
	  $this->session->unset_userdata('reselect');
	  redirect('dashboard/Authentication/login', 'refresh');
	}

	public function activate(){
		$token = (string) $this->uri->segment(4);
		if(strlen($token) == 20){
			$user = $this->userInstance->getUserActivationToken($token);
			if(!empty($user)){
				$userId = $user[0]['user_id'];
				$activated = $user[0]['activated'];
				if(!$activated){
					$active = 1;
					$this->userInstance->activate($userId, $active);
					$data = array('activation_message' => 'Your account has been activated please Login',
								  'email' => '',
								  'email_value' => '',
								  'password' => '',
								  'password_value'=>'');
					$this->parser->parse('dashboard/login_view',$data);
				}else{
					load404();
				}
			}else{
				load404();
			}
		}else{
			load404();
		}
	}

	public function reset(){
		$token = (string) $this->uri->segment(4);
		if(strlen($token) == 30){
			$user = $this->userInstance->getUserPasswordToken($token);
			if(!empty($user)){
				$expired = $user[0]['time_stamp'];
				$userId  = $user[0]['user_id'];
				if((time()-(60*60*24)) < strtotime($expired)){
					$data['token'] = $token;
					$this->parser->parse('dashboard/authenticate/reset_password_view',$data);
				}else{
					$this->userInstance->disableTokens($userId);
					load404();
				}

			}else{
				load404();
			}		
		}else{
			load404();
		}

	}

	public function resetPassword(){
		$values = array(); $key = ''; $value = '';
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('token', 'Session Token', 'required|min_length[30]|max_length[30]');
		$this->form_validation->set_rules('cpass', 'Password Confirmation', 'required|min_length[8]|matches[pass]');
		$token = (string) $this->input->post('token');
		if($this->form_validation->run() == false){
			$inputs = array('pass','cpass', 'token');
			$errors = fillErrors($inputs);
			$key    = $errors[0];
			$value    = $errors[1];  
		}else{
			$password = md5($this->input->post('pass'));
			$user = $this->userInstance->getUserPasswordToken($token);
			if(!empty($user)){
				$expired = $user[0]['time_stamp'];
				$userId  = $user[0]['user_id'];
				if((time()-(60*60*24)) < strtotime($expired)){
					$this->userInstance->updateUserPassword($userId, $password);
					$this->userInstance->passwordChanged($token);
					$this->userInstance->disableTokens($userId);
					$key = 'message'; 
					$value = array('0' => 'token',
							   '1' => '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>password changed.</div>'
				        	);

				}else{
					$key = 'message'; 
					$value = array('0' => 'token',
							   '1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>token expired.</div>'
				        	);
				}
				
			}else{
				$key = 'message'; 
				$value = array('0' => 'token',
							   '1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>token expired.</div>'
				        	);
			}	
		}

		$this->session->set_flashdata('values', $values);
		$redirect ='dashboard/Authentication/reset/'.$token;
		ajaxHelper($key, $value, $redirect);
	}

	private function generateActivationToken($userEmail){
		$token = generateRandomString(20);
		$is = FALSE;
		while($is == FALSE){
			$isToken = $this->userInstance->getUserActivationToken($token);
			if(!empty($isToken)){
				$token = generateRandomString(20);
				$is = FALSE;
			}else{
				$this->userInstance->addUserActivationToken($userEmail,$token);
				$is = TRUE;
				$subject = "HRTool - Verification";
				$message = 'Please use the following link to verify your account:
								'.base_url().'dashboard/Authentication/activate/'.$token;
				sendmail($userEmail, $message ,$subject);
			}
		}
	}

	private function generatePasswordResetToken($userId, $userEmail){
		$token = generateRandomString(30);
		$is = FALSE;
		while($is == FALSE){
			$isToken = $this->userInstance->getUserPasswordToken($token);
			if(!empty($isToken)){
				$token = generateRandomString(30);
				$is = FALSE;
			}else{
				$disableTokens = $this->userInstance->disableTokens($userId);
				$this->userInstance->addUserPasswordToken($userId,$token);
				$is = TRUE;

				$subject = "HRTool - Password Reset URL";
				$message = 'Please use the following link to reset your password. valid for 24 hours!:
								'.base_url().'dashboard/Authentication/reset/'.$token;
				sendmail($userEmail, $message ,$subject);
			}
		}
	}

	public function forgotPassword(){
		$this->load->view('dashboard/authenticate/forget_password_view');
	}

	public function forgot(){
		$key = ''; 
		$value = '';
		$values = array();

		$this->form_validation->set_rules('email', 'Email Address','required|valid_email');
		if($this->form_validation->run() == false)
		{
			$inputs = array('email');
			$errors = fillErrors($inputs);
			$key    = $errors[0];
			$value    = $errors[1]; 

		}else{
			$email = (string) $this->input->post('email');
			$user = $this->userInstance->getUserInfo($email);
			if(!empty($user)){
				$userId = $user[0]['user_id'];
				$this->generatePasswordResetToken($userId, $email);
			}
			$key = 'message'; 
				$value = array('0' => 'email',
							   '1' => '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Reset url will be sent to your mail shortly. (if you were registered)</div>'
				        	);
		}
		$this->session->set_flashdata('values', $values);
		$redirect ='dashboard/Authentication/forgotpassword';
		ajaxHelper($key, $value, $redirect);
	}
}