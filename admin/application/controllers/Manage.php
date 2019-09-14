<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manage extends CI_Controller {
	public function __construct() {
	parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->library(array('session','form_validation','encrypt'));
		$this->load->model('Manage_model');
    }
    public function admin_profile() {
    	if($this->session->userdata('logged_in_admin')['user_type']=='2') {
    		$admin = $this->session->userdata('logged_in_admin');
	    	$where[]  = "users.user_id = '".$admin['id']."'";
	    	$data['admin'] = $this->Manage_model->get_users($where);
			$settings        = get_settings();
	        $header['title'] = $settings->title . " | Admin Profile";
			$this->load->view('Templates/header',$header);
			$this->load->view('admin/profile',$data);
			$this->load->view('Templates/footer');
		} 
       if($this->session->userdata('logged_in_admin')['user_type']=='3') {
    		$uid=$this->session->userdata('logged_in_admin')['user_id'];   	
	    	$data['staff'] = $this->Manage_model->get_staffs($uid);
	    	$settings        = get_settings();
	        $header['title'] = $settings->title . " | Admin Profile";
			$this->load->view('Templates/header',$header);
			$this->load->view('admin/staff_profile',$data);
			$this->load->view('Templates/footer');
		} 
		/*else { redirect(base_url()); } */
    }
	public function change_credentials() {
		if($this->session->userdata('logged_in_admin')) {
			if($_POST) {
    			$admin = $this->session->userdata('logged_in_admin');
	    		$where[]  = "users.user_id = '".$admin['id']."'";
	    		$result = $this->Manage_model->changeCredentials($where,$_POST);
	    		if($result == 1) {
	    			$this->session->set_flashdata('message',array('message' => 'Credentials Updated Successfully. Please Login to reflect changes','class' => 'success'));
					redirect(base_url().'manage/admin_profile');
	    		}
	    		if($result == 2) {
	    			$this->session->set_flashdata('message',array('message' => 'Existing password not matching with Current password.','class' => 'danger'));
					redirect(base_url().'manage/admin_profile');
	    		}
	    		if($result == 3) {
	    			$this->session->set_flashdata('message',array('message' => 'Something went wrong.','class' => 'danger'));
					redirect(base_url().'manage/admin_profile');
	    		}
	    		if($result == 4) {
	    			$this->session->set_flashdata('message',array('message' => 'New password and Retype password are not matching. Please Login to reflect changes','class' => 'danger'));
					redirect(base_url().'manage/admin_profile');
	    		} else {
	    			$this->session->set_flashdata('message', array('message' => "Something Went wrong.",'class' => 'danger'));	
					redirect(base_url().'manage/admin_profile');
	    		}
	    	}
		} else { redirect(base_url()); } 
	}
	public function change_staffcredentials() {
		if($this->session->userdata('logged_in_admin')) {
			if($_POST) {
    			$admin = $this->session->userdata('logged_in_admin');
	    		$where[]="id = ".$this->session->userdata('logged_in_admin')['user_id'];  
	    		$result = $this->Manage_model->changeStaffCredentials($where,$_POST);
	    		if($result == 1) {
	    			$this->session->set_flashdata('message',array('message' => 'Credentials Updated Successfully. Please Login to reflect changes','class' => 'success'));
					redirect(base_url().'manage/admin_profile');
	    		}
	    		if($result == 2) {
	    			$this->session->set_flashdata('message',array('message' => 'Existing password not matching with Current password.','class' => 'danger'));
					redirect(base_url().'manage/admin_profile');
	    		}
	    		if($result == 3) {
	    			$this->session->set_flashdata('message',array('message' => 'Something went wrong.','class' => 'danger'));
					redirect(base_url().'manage/admin_profile');
	    		}
	    		if($result == 4) {
	    			$this->session->set_flashdata('message',array('message' => 'New password and Retype password are not matching. Please Login to reflect changes','class' => 'danger'));
					redirect(base_url().'manage/admin_profile');
	    		} else {
	    			$this->session->set_flashdata('message', array('message' => "Something Went wrong.",'class' => 'danger'));	
					redirect(base_url().'manage/admin_profile');
	    		}
	    	}
		} else { redirect(base_url()); } 
	}
}	 
?>