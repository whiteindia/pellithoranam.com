<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('rgv_admin')) { 
			redirect(base_url());
		}
 	}
	
	public function index()
	{
		$template['page'] = "table-demo";
		$template['page_title'] = "Home Page";
		$template['data'] = "Home page";
		$this->load->view('template', $template);
	}
	
	public function test()
	{
		$template['page'] = "form-demo";
		$template['page_title'] = "Test Page";
		$template['data'] = "Test page";
		$this->load->view('template', $template);
	}
	

}