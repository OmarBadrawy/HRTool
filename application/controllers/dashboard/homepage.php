<?php


class Homepage extends CI_Controller{

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('user_isLogged'))
		{
			redirect('dashboard/authentication/login', 'refresh');
		}
			
	}
	
	public function index()
	{
		$header = array('base_url' => base_url(),'title' => 'Home','heading' => 'Home');
		$this->parser->parse('dashboard/header_view.php',$header);
		$this->load->view('dashboard/pages/homepage_view');
		$footer = array('base_url' => base_url());		
		$this->parser->parse('dashboard/footer_view.php', $footer);
	}

	

}	