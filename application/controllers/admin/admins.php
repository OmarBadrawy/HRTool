<?php

class Admins extends CI_Controller {

  function __construct()
	{
		parent::__construct();

		$this->load->model('AdminModel','adminInstance');
		$this->load->model('UserModel','userInstance');

		if(!$this->session->userdata('admin_isLogged'))
		{
			redirect('admin/authentication/login', 'refresh');
		}
	}
	public function index()
	{
		$list = $this->adminInstance->getAllAdmins();
		$admins = array('admins'=> $list);
		$this->load->view('admin/header_view');
		$this->parser->parse('admin/admins_list_view',$admins);
		$this->load->view('admin/footer_view');
	}

	public function addAdmin()
	{	
		
		
		$this->load->view('admin/header_view');
		$this->load->view('admin/add_admin_view');
		$this->load->view('admin/footer_view');

	}

	public function validateAddAdmin()
	{
		header("Content-type: text/json");
   		header("Content-type: application/json");
		$response = '';

		$this->form_validation->set_rules('fname','First Name','required');

		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('admin_email','Email','required|valid_email|max_length[150]|callback_uniqueEmail');
		$this->form_validation->set_rules('admin_password','Password','required|min_length[8]');
		
		
		


		if($this->form_validation->run() == false)
		{
			$inputs = array('fname','lname','admin_email', 'admin_password');
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
			$email    = $this->input->post('admin_email');
			$password = $this->input->post('admin_password');
			

			$result   = $this->adminInstance->addAdmin($fname, $lname, $email, md5($password));
			
			$this->generateActivationToken($email, $password);
			if($result){
				$response = array(
								'message' =>array(
										'0' => 'result',
										'1' => '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>admin has been added!</div>'
									),
				         	);
			}else{
				$response = array(		
								'message' =>array(
												'0' => 'result',
												'1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Something has happened. failed to add admin.</div>'
								),
				        	);
			}

		}
		echo json_encode($response);
	}

	public function uniqueEmail($email)
	{	
		$result = $this->adminInstance->getAdminInfo($email);
		if(!empty($result)){
			$this->form_validation->set_message('uniqueEmail','This Email is already registerd! Please enter a different Email');
			return false;
		}else{
			return true;
		}
	}

	private function generateActivationToken($Email, $password){
		
		$token = generateRandomString(20);
		$is = FALSE;
		while($is == FALSE){
			$isToken = $this->adminInstance->getUserActivationToken($token);
			if(!empty($isToken)){
				$token = generateRandomString(20);
				$is = FALSE;
			}else{
				$this->adminInstance->addUserActivationToken($Email,$token);
				$is = TRUE;
				$subject = "HRTool - Verification";
				$message = 'Please use the following link to verify your account: <br>
								'.base_url().'admin/Authentication/activate/'.$token . '<br> Email: ' .$Email . '<br> Password: ' .$password ;
				sendmail($Email, $message ,$subject);
			}
		}
	}

	 public function editAdmin($id)
	{
		$admin = $this->adminInstance->getAdminInfo($id);
		
		$data = array('admin'=>$admin);

		$this->load->view('admin/header_view');
		$this->parser->parse('admin/edit_admin_view',$data);
		$this->load->view('admin/footer_view');
	}

	public function validateEditAdmin()
	{
		header("Content-type: text/json");
   		header("Content-type: application/json");
		$response = '';

		$this->form_validation->set_rules('fname','First Name','required');

		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('admin_email','Email','required|valid_email|max_length[150]');
		$this->form_validation->set_rules('admin_password','Password','required|min_length[8]');
		
		
		



		if($this->form_validation->run() == false)
		{

			$inputs = array('id', 'fname','lname','admin_email', 'admin_password');
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
			$id       = $this->input->post('id');
			$fname    = $this->input->post('fname');
			$lname    = $this->input->post('lname');
			
			$email    = $this->input->post('admin_email');
			$password = md5($this->input->post('admin_password'));
			

			$result   =  $this->adminInstance->editAdmin($id,$fname,$lname,$email,$password);

			if($result){
				$response = array(
								'message' =>array(
										'0' => 'result',
										'1' => '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Admin has been updated! Please Check your Email for activation</div>'
									),
				         	);
			}else{
				$response = array(		
								'message' =>array(
												'0' => 'result',
												'1' => '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Something has happened. failed to add Pharmacy.</div>'
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
		$value = array(	'id'  => 'admin_pass',
						'setValue' => $pass
						);

		echoAjax($key, $value);
	}



	public function deleteAdmin($id)
	{
        $result = $this->adminInstance->deleteAdmin($id);
	}


}