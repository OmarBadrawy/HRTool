<?php


class Homepage extends CI_Controller{

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('admin_isLogged'))
		{
			redirect('admin/authentication/login', 'refresh');
		}
			
	}
	
	public function index()
	{
		$header = array('base_url' => base_url(),'title' => 'Admin Home','heading' => 'Admin Home');
		$this->parser->parse('admin/header_view.php',$header);
		//$this->load->view('admin/add_admin_view');
		$footer = array('base_url' => base_url());		
		$this->parser->parse('admin/footer_view.php', $footer);
	}

	

}	