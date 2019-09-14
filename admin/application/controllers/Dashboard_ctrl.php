<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_ctrl extends CI_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Dashboard_model');
		if(!$this->session->userdata('logged_in_admin')) {
			redirect(base_url());
		}
 	}
	public function dashboard() {
		$settings = get_settings();
		$header['title'] = $settings->title." | Admin Dashboard";
		// $header['title'] = "Soulmate Matrimony | Admin Dashboard";
		$where[] = "profiles.profile_status != 2";
		$where[] = "membership_details.membership_package = 1";
		$data['all_members'] = $this->Dashboard_model->get_users($where);
		$where1[] = "profiles.profile_status != 2";
		$where1[] = "membership_details.membership_package = 3";
		//$data['paid_members'] = $this->Dashboard_model->get_users($where1);
		//$template['users'] = $this->dashboard_model->get_users_count();
		//$template['customers'] = $this->dashboard_model->get_customers_count();
		//$template['bookings'] = $this->dashboard_model->get_bookings_count();
		$this->load->view('Templates/header',$header);
		$this->load->view('dashboard',$data);
		$this->load->view('Templates/footer');
	}
	public function logout() {
	//	$this->session->sess_destroy();
		//session_destroy();
		$this->session->unset_userdata('logged_in_admin');
		redirect(base_url());
	}
}
?>