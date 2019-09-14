<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Myaccount_model');
        $session=$this->session->userdata('user_values'); 
        date_default_timezone_set('Asia/Kolkata'); 
	       if (!isset($session)&& empty($session) )  { 
				redirect(base_url());
			}
    }

	
	public function index()
	{
	    
		$template['page_title'] = "Myaccount";  
		$template['page'] = "myaccount"; 
		$template['profile'] = $this->Myaccount_model->profile();
		$template['profile_pic'] = $this->Myaccount_model->profile_pic();
		$this->load->view('template', $template);                     
	}

}
