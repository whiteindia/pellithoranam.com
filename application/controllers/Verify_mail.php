<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify_mail extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Verify_model');
        $session=$this->session->userdata('logged_in');  
	      
    }

	




public function verify_account(){


   $email_unique = $this->uri->segment(3);
   $email = $this->uri->segment(4);
   $result = $this->Verify_model->verify_account($email_unique);
   echo "<meta http-equiv='refresh' content='3;url=".base_url()."profile/my_profile' />";
   if($result) { 
      echo "Email ID Verified. Now you are redicting to your home page...";
   } else {
     echo "Sorry, Something went wrong";
   }
  // sleep(13);
  // redirect('../profile/my_profile');
   
}
 
}
