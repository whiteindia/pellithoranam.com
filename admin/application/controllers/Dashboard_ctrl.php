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

	public function update_password($pass_data) {
		//   ini_set('display_errors', 1);
	   //ini_set('display_startup_errors', 1);
	   //error_reporting(E_ALL);
		   $usr  = $pass_data['uid'];
		   $this->load->library('encryption');
		   $td_date = date('Y-m-d H:i:s', time());
		   if($pass_data['new_password'] == $pass_data['conf_password']) { // checking new & confirm pass are same
		   //print_r($pass_data['new_password']); 
		   //print_r($pass_data['conf_password']);           
			 $qry_1 = $this->db->get_where('users', array('user_id'=>$usr)); // getting password of that user
			 $exist_pass = $this->encryption->decrypt($qry_1->result()[0]->password); // decoding pass  
		 
		 //   $exist_pass = $this->encrypt->decode($qry_1->result()[0]->password);
			 //$pass = $this->encryption->decrypt($chk_qry->row()->password);
		  //       echo '<pre>';
		 //  print_r($exist_pass);
		  // echo '</pre>';
		 //  exit();
				 //print_r($exist_pass); 
			  //var_dump($pass_data['crnt_password']);die();   
			 
			 if($exist_pass == $pass_data['crnt_password']) { // checking db pass = current
	   
				 if($pass_data['new_password'] != $exist_pass) {                      // checking new pass != db pass
					 $new_pass = $this->encrypt->encode($pass_data['new_password']);
					 $this->db->where("user_id",$usr->user_id);
					 if($this->db->update("users",array("password" => $new_pass,"modified_date" => $td_date))){
					   return array('status' => 1,'msg' => "Password Changed Successfully");
					   echo "1";
					 }
				 } 
				 else { 
				   return array('status' => 2,'msg' => "New password and Existing password are same");
				   echo "2"; 
				 }
				// return array('status' => 5,'msg' => "Password Changed Successfully");
				redirect(base_url().'Dashboard_ctrl/dashboard');
				 echo "5";
			 } 
			 else { 
				 return array('status' => 3,'msg' => "Current password not matching with Existing password []");
				 echo "3"; 
			 } 
		   } 
		   else { 
			 return array('status' => 4,'msg' => "New password and Confirm Password must be same");
			 echo "4";
		   } 
		 }


}
?>