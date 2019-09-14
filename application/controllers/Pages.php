<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct() {
	  
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('pages_model');
        $this->load->library(array('session','form_validation','encryption','email'));
        $this->load->helper(array('form', 'url'));
        date_default_timezone_set('Asia/Kolkata');
                ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
    }

	public function index($err = NULL)	{
		$data['religions'] = $this->Home_model->getReligions();
		$data['mother_tongue'] = $this->Home_model->getMotherTongues();
		$data['content'] = $this->Home_model->view_content();
		$data['footer'] = $this->Home_model->view_footer();
		$data['banner'] = $this->Home_model->view_banner();
		$data['left'] = $this->Home_model->view_leftad();
		$data['right'] = $this->Home_model->view_rightad();
		$data['success'] = $this->Home_model->view_success_story();
		$slug            = $this->uri->segment(1,0);
		$data['page_content'] = $this->pages_model->get_page_content($slug);
		// print_r($data['page_content'] );
		// exit;

		if($data['page_content']==false){
			//redirect(base_url()."my404/index");
		}
		$data['profile_highlight'] = $this->Home_model->get_highlighted_profiles();			
		// $header['logn_err'] = $err;
		$settings        = get_setting();
    	$header['title'] = $settings->title;
		$this->load->view('header', $header); 
		$this->load->view('page',$data);
		$this->load->view('footer');  
	}
}