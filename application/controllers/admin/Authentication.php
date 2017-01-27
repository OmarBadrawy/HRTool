<?php 
class Authentication extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel','adminInstance');
	}

	public function login()
	{   
		if($this->session->userdata('admin_isLogged'))
		{
			redirect('admin/homepage', 'refresh');
		}
		$inputs = array('email', 'password');
		$messages = $this->session->flashdata('message');
		if(empty($messages)){
			$messages = array();
		}
		$data = returnMessages($inputs, $messages);
		$data['action'] = base_url().'admin/authentication/validatelogin';
		$data['base_url'] = base_url();
		$this->parser->parse('admin/login_view', $data);
	}

	public function validateLogin()
	{
		$key = ''; $value = base_url().'admin/authentication/validatelogin';
		$values = array();
		$this->form_validation->set_rules('email','E-Mail','required|valid_email|max_length[150]');
		$this->form_validation->set_rules('password','password','required|min_length[8]');
		if($this->form_validation->run() == false)
		{

			$inputs = array('email', 'password');
			$errors = array();
			$e =0; //counter e for errors
			for($i = 0; $i < count($inputs); $i++){
				$error = form_error($inputs[$i]);
				$values[$inputs[$i]] = set_value($inputs[$i]);
				if(!empty($error)){
					$errors[$e] = $inputs[$i];
					$errors[$e+1] = '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.'</div>'; 
					$e+=2;
				}
			}

			$key   = 'message';
			$value = $errors;
		}
		else
		{

			$email    = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$result  = $this->adminInstance->getAdminInfo($email);
			$adminId = $this->adminInstance->getAdmin($email)->admin_id;
				if(!empty($result)){
				$val =1;
				$active = $this->adminInstance->isActive($adminId, $val);
				if($active==1){
					$activated = $result[0]['activated'];
					if($activated){
						$flogin = $result[0]['flogin'];
						if($flogin==0){
							$flogin = $this->adminInstance->fLogin($adminId,$val);
							$data = $result[0];
							$this->session->set_userdata('admin_isLogged',$data);
							$key   = 'redirect';
							$value = 'admin/authentication/newpassword';
						}else{
						$dbPassword = $result[0]['password'];
						if($dbPassword == $password){
							$data = $result[0];
							$this->session->set_userdata('admin_isLogged',$data);
							$key   = 'redirect';
							$value = 'admin/homepage';
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
		$redirect = 'admin/authentication/login';
		ajaxHelper($key, $value, $redirect);
	}

	public function newPassword(){
		$this->load->view('admin/authenticate/new_password_view');
	}

	public function activate(){
		$token = (string) $this->uri->segment(4);
		if(strlen($token) == 20){
			$admin = $this->adminInstance->getUserActivationToken($token);
			if(!empty($admin)){
				$adminId = $admin[0]['admin_id'];
				$activated = $admin[0]['activated'];
				if(!$activated){
					$active = 1;
					$this->adminInstance->activate($adminId, $active);
					$data = array('activation_message' => 'Your account has been activated please Login',
								  'email' => '',
								  'email_value' => '',
								  'password' => '',
								  'password_value'=>'',
								  'base_url' => base_url());
					$this->parser->parse('admin/login_view',$data);
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

	public function newPass(){
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
			$admin = $this->adminInstance->getAdminInfo($email);
			if(!empty($admin)){
				$AdminId = $admin[0]['admin_id'];
				$this->generatePasswordResetToken($AdminId, $email);
			}
			$key = 'message'; 
				$value = array('0' => 'email',
							   '1' => '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Reset url will be sent to your mail shortly. (if you were registered)</div>'
				        	);
		}
		$this->session->set_flashdata('values', $values);
		$redirect ='admin/Authentication/newpassword';
		ajaxHelper($key, $value, $redirect);
	}

	private function generatePasswordResetToken($AdminId, $adminEmail){
		$token = generateRandomString(30);
		$is = FALSE;
		while($is == FALSE){
			$isToken = $this->adminInstance->getUserPasswordToken($token);
			if(!empty($isToken)){
				$token = generateRandomString(30);
				$is = FALSE;
			}else{
				$disableTokens = $this->adminInstance->disableTokens($AdminId);
				$this->adminInstance->addUserPasswordToken($AdminId,$token);
				$is = TRUE;

				$subject = "HRTool - Password Reset URL";
				$message = 'Please use the following link to reset your password. valid for 24 hours!
								'.base_url().'admin/authentication/reset/'.$token;
				sendmail($adminEmail, $message ,$subject);
			}
		}
	}

	public function reset(){
		$token = (string) $this->uri->segment(4);
		if(strlen($token) == 30){
			$admin = $this->adminInstance->getUserPasswordToken($token);
			if(!empty($admin)){
				$expired = $admin[0]['time_stamp'];
				$adminId  = $admin[0]['admin_id'];
				if((time()-(60*60*24)) < strtotime($expired)){
					$data['token'] = $token;
					$this->parser->parse('admin/authenticate/reset_password_view',$data);
				}else{
					$this->adminInstance->disableTokens($userId);
					load404();
				}

			}else{
				load404();
			}		
		}else{
			load404();
		}

	}

	public function logout()
	{ 
	  

	  $this->session->unset_userdata('admin_isLogged');
	  redirect('admin/authentication/login', 'refresh');
	}


}