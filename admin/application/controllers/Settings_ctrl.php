<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings_ctrl extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set("Asia/Kolkata");
			$this->load->library('form_validation');
		    $this->load->model('Settings_model');
		    $this->load->model('Reports_model');
			if(!$this->session->userdata('logged_in_admin')) { 
			redirect(base_url());
		}
	}

function view_country()
 {              $settings        = get_settings();
        		$header['title'] = $settings->title . " | View Country";
	            $this->load->view('Templates/header',$header);
	            $template['data'] = $this->Settings_model->view_country();
				$this->load->view('Settings/view_country',$template); 
				$this->load->view('Templates/footer');
 }

 //to add Package
 function add_country()
 {
	            $settings        = get_settings();
        		$header['title'] = $settings->title . " | Add Country";
	            $this->load->view('Templates/header',$header);
				$this->load->view('Settings/add_country');
				$this->load->view('Templates/footer');
				if($_POST) { 
					$data = $_POST;
					$result  = $this->Settings_model->add_country($data);
					if($result=="error"){
						$this->session->set_flashdata('message',array('message' => 'Country  Already Exist','class' => 'error'));	
					}
					else{
						$this->session->set_flashdata('message',array('message' => 'Country Added Successfully','class' => 'success')); 
						
					}			 
				
				redirect(base_url().'Settings_ctrl/view_country'); 	
				} 
	  		//$this->load->view('template',$template);
 
 }

  function edit_country(){
  			$settings        = get_settings();
        	$header['title'] = $settings->title . " | Edit country";
	       $this->load->view('Templates/header',$header);
		   $id = $this->uri->segment(3);
		   $template['data'] = $this->Settings_model->editget_country_id($id);
		   $this->load->view('Settings/edit_country',$template);
		   $this->load->view('Templates/footer');
		   if(!empty($template['data'])){
         
		  if($_POST){ 
			  $data = $_POST;
			      $result = $this->Settings_model->edit_country($data, $id);
				   redirect(base_url().'Settings_ctrl/view_country'); 	
			
		         }
		    }
			else{
				 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
			      redirect(base_url().'Settings_ctrl/view_country'); 	
			}
		      
}
function delete_country(){
		  
		  $data1 = array(
				  "country_status" => '0'
							 );
		  $id = $this->uri->segment(3);
		  $result = $this->Settings_model->delete_country($id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Settings_ctrl/view_country');
	  }

function view_state()
 {              $settings        = get_settings();
        		$header['title'] = $settings->title . " | View State";
	            $this->load->view('Templates/header',$header);
	            $template['data'] = $this->Settings_model->view_state();
				$this->load->view('Settings/view_state',$template); 
				$this->load->view('Templates/footer');
 }	  
 function add_state()
 {
	            $settings        = get_settings();
        		$header['title'] = $settings->title . " | Add State";
	            $this->load->view('Templates/header',$header);
	            $where[] = "country_status = 1";
	            $data['countries'] = $this->Settings_model->getTable("",$where,"country");
				$this->load->view('Settings/add_state',$data);
				$this->load->view('Templates/footer');
                   
				   if($_POST) {
					  
				  $data = $_POST;
			// $data['created_by']=$sessid['created_user']; 
			 $result = $this->Settings_model->add_state($data);
			 if($result)
			 {
				  $this->session->set_flashdata('message',array('message' => 'Success','class' => 'success'));
			 }
			 else
			 {
				 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
			 }			 
				
				  redirect(base_url().'Settings_ctrl/view_state'); 			  
				 
				  }         
		 
	  
	   
	  //$this->load->view('template',$template);
 
 }


 function edit_state(){
		   $settings        = get_settings();
           $header['title'] = $settings->title . " | Edit State";
	       $this->load->view('Templates/header',$header);
		   
		 
		  
		   $id = $this->uri->segment(3);
		   $template['data'] = $this->Settings_model->editget_state_id($id);
		   $where[] = "country_status = 1";
	       $template['countries'] = $this->Settings_model->getTable("",$where,"country");
		   $this->load->view('Settings/edit_state',$template);
		   $this->load->view('Templates/footer');
		   if(!empty($template['data'])){
         
		  if($_POST){ 
			  $data = $_POST;
			 
		
			  
			      $result = $this->Settings_model->edit_state($data, $id);
				   redirect(base_url().'Settings_ctrl/view_state'); 	
			
		         }
		    }
			else{
				 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
			      redirect(base_url().'Settings_ctrl/view_state'); 	
			}	  
	  
}
function delete_state(){
		  
		  $data1 = array(
				  "state_status" => '0'
							 );
		  $id = $this->uri->segment(3);
		  $result = $this->Settings_model->delete_state($id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Settings_ctrl/view_state');
	  }
function view_city()
 {              $settings        = get_settings();
        		$header['title'] = $settings->title . " | City";
	            $this->load->view('Templates/header',$header);
	            $template['data'] = $this->Settings_model->view_city();
				$this->load->view('Settings/view_city',$template); 
				$this->load->view('Templates/footer');
 }	  
 function add_city()
 {
	            $settings        = get_settings();
        		$header['title'] = $settings->title . " | Add City";
	            $this->load->view('Templates/header',$header);
	            $where[] = "country_status = 1";
	            $data['countries'] = $this->Settings_model->getTable("",$where,"country");
				$this->load->view('Settings/add_city',$data);
				$this->load->view('Templates/footer');
                   
				   if($_POST) {
					  
				  $data = $_POST;	 
			// $data['created_by']=$sessid['created_user']; 
			 $result = $this->Settings_model->add_city($data);
			 if($result)
			 {
				  $this->session->set_flashdata('message',array('message' => 'Success','class' => 'success'));
			 }
			 else
			 {
				 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
			 }			 
				
				  redirect(base_url().'Settings_ctrl/view_city'); 			  
				 
				  }         
				    //$this->load->view('template',$template);
 
 }


 function edit_city(){
		   $settings        = get_settings();
           $header['title'] = $settings->title . " | Edit City";
	       $this->load->view('Templates/header',$header);
		   $id = $this->uri->segment(3);
		    $where[] = "country_status = 1";
	       $template['countries'] = $this->Settings_model->getTable("",$where,"country");
		   $template['data'] = $this->Settings_model->editget_city_id($id);
		   $this->load->view('Settings/edit_city',$template);
		   $this->load->view('Templates/footer');
		   if(!empty($template['data'])){
         
		  if($_POST){ 
			  $data = $_POST;
			  
			      $result = $this->Settings_model->edit_city($data, $id);
				   redirect(base_url().'Settings_ctrl/view_city'); 	
			
		         }
		    }
			else{
				 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
			      redirect(base_url().'Settings_ctrl/view_city'); 	
			}
	  
}
function delete_city(){
		  
		  $data1 = array(
				  "city_status" => '0'
							 );
		  $id = $this->uri->segment(3);
		  $result = $this->Settings_model->delete_city($id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Settings_ctrl/view_city');
	  }

function view_education()
 {              $settings        = get_settings();
        		$header['title'] = $settings->title . " | View Education";
	            $this->load->view('Templates/header',$header);
	            $template['data'] = $this->Settings_model->view_education();
				$this->load->view('Settings/view_education',$template); 
				$this->load->view('Templates/footer');
 }

 function add_education()
 {
	            $settings        = get_settings();
        		$header['title'] = $settings->title . " | Add Education";
	            $this->load->view('Templates/header',$header);
				$this->load->view('Settings/add_education');
				$this->load->view('Templates/footer');
                if($_POST) { 
					$data = $_POST;
					$result  = $this->Settings_model->add_education($data);
					if($result){
						$this->session->set_flashdata('message',array('message' => 'Education Added Successfully','class' => 'success')); 
						
					}
					else{
						$this->session->set_flashdata('message',array('message' => 'Education  Already Exist','class' => 'error'));	
					}			 
				
				redirect(base_url().'Settings_ctrl/view_education'); 	
				}        
	   
	  //$this->load->view('template',$template);
 
 }
 function edit_education(){
		   $settings        = get_settings();
           $header['title'] = $settings->title . " | Edit Education";
	       $this->load->view('Templates/header',$header);
	       	   $id = $this->uri->segment(3);
		   $template['data'] = $this->Settings_model->editget_education_id($id);
		   $this->load->view('Settings/edit_education',$template);
		   $this->load->view('Templates/footer');
		   if(!empty($template['data'])){
         
		  if($_POST){ 
			  $data = $_POST;
			 
		
			  
			      $result = $this->Settings_model->edit_education($data, $id);
				  if($result){
				   $this->session->set_flashdata('message', array('message' => "Education details updated successfully",'class' => 'success'));	
				   redirect(base_url().'Settings_ctrl/view_education'); 
				  }	
					else{
						 $this->session->set_flashdata('message', array('message' => "Education already exist",'class' => 'danger'));	
						 redirect(base_url().'Settings_ctrl/view_education'); 
					}	
			
		         }
		    }
			else{
				 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
			      redirect(base_url().'Settings_ctrl/view_education'); 	
			}  
	  
}
function delete_education(){
		  
		  $data1 = array(
				  "education_status" => '0'
							 );
		  $id = $this->uri->segment(3);
		  $result = $this->Settings_model->delete_education($id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Settings_ctrl/view_education');
	  }

function view_occupation()
 {              $settings        = get_settings();
        		$header['title'] = $settings->title . " | View Occupation";
	            $this->load->view('Templates/header',$header);
	            $template['data'] = $this->Settings_model->view_occupation();
				$this->load->view('Settings/view_occupation',$template); 
				$this->load->view('Templates/footer');
 }

 function add_occupation()
 {

		$settings        = get_settings();
		$header['title'] = $settings->title . " | Add Occupation";
		$this->load->view('Templates/header',$header);
		$this->load->view('Settings/add_occupation');
		$this->load->view('Templates/footer');

		if($_POST) {
			$data = $_POST;
			$result  = $this->Settings_model->add_occupation($data);
			if($result=="error"){
				$this->session->set_flashdata('message',array('message' => 'Occupation Already Exist','class' => 'error'));	
			}
			else{
				$this->session->set_flashdata('message',array('message' => 'Success','class' => 'success')); 
				
			}
			redirect(base_url().'Settings_ctrl/view_occupation');
		}

	  //$this->load->view('template',$template);
 
 }
 function edit_occupation(){
		   $settings        = get_settings();
           $header['title'] = $settings->title . " | Edit Occupation";
	       $this->load->view('Templates/header',$header);
		  
		   $id = $this->uri->segment(3);
		   $template['data'] = $this->Settings_model->editget_occupation_id($id);
		   $this->load->view('Settings/edit_occupation',$template);
		   $this->load->view('Templates/footer');
		   if(!empty($template['data'])){
         
		  if($_POST){ 
			  $data = $_POST;
			  
			      $result = $this->Settings_model->edit_occupation($data, $id);
				   redirect(base_url().'Settings_ctrl/view_occupation'); 	
			
		         }
		    }
			else{
				 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
			      redirect(base_url().'Settings_ctrl/view_occupation'); 	
			}	 
	  
	  
}
function delete_occupation(){
		  
		  $data1 = array(
				  "occupation_status" => '0'
							 );
		  $id = $this->uri->segment(3);
		  $result = $this->Settings_model->delete_occupation($id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Settings_ctrl/view_occupation');
	  }


	public function get_drop_data() {
		$sel_val = $this->input->post('sel_val');
		$sel_typ = $this->input->post('sel_typ');
		$where = array(); 
		$tbl = "";

		if($sel_typ == "country") { 
			$tbl = "states";
			$fld_name = "State";
			$where[] = "country_id = '".$sel_val."'"; 
		} else if($sel_typ == "state") {
			$tbl = "cities";
			$fld_name = "City";
			$where[] = "state_id = '".$sel_val."'"; 
		} else { return false; }

		$drop_vals = $this->Reports_model->getTable("",$where,$tbl);

		$html = "";
		$html.= "<option value='0'>Select ".$fld_name."</option>";

		if($fld_name == "State") {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->state_id."'>".$drop_val->state_name."</option>";
			}
		} else {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->city_id."'>".$drop_val->city_name."</option>";
			}
		}
		echo $html;
	}
function view_religion()
 {              $settings        = get_settings();
        		$header['title'] = $settings->title . " | View Religion";
	            $this->load->view('Templates/header',$header);
	            $template['data'] = $this->Settings_model->view_religion();
				$this->load->view('Settings/view_religion',$template); 
				$this->load->view('Templates/footer');
 }

 function add_religion()
 {
	            $settings        = get_settings();
        		$header['title'] = $settings->title . " | Add Religion";
	            $this->load->view('Templates/header',$header);
				$this->load->view('Settings/add_religion');
				$this->load->view('Templates/footer');

                if($_POST) {
					$data = $_POST;
					$result = $this->Settings_model->add_religion($data);
					if($result=="error"){
						$this->session->set_flashdata('message',array('message' => 'Religion Already Exist','class' => 'error'));	
					}
					else{
						$this->session->set_flashdata('message',array('message' => 'Religion Added Successfully','class' => 'success')); 
					}		 
					redirect(base_url().'Settings_ctrl/view_religion'); 			  
				 
				}        
	   
	  //$this->load->view('template',$template);
 
 }

  function edit_religion(){
		   $settings        = get_settings();
           $header['title'] = $settings->title . " | Edit Religion";
	       $this->load->view('Templates/header',$header);
		  
		   $id = $this->uri->segment(3);
		   $template['data'] = $this->Settings_model->editget_religion_id($id);
		   $this->load->view('Settings/edit_religion',$template);
		   $this->load->view('Templates/footer');
		   if(!empty($template['data'])){
         
		  if($_POST){ 
			  $data = $_POST;
			  
			      $result = $this->Settings_model->edit_religion($data, $id);
				   redirect(base_url().'Settings_ctrl/view_religion'); 	
			
		         }
		    }
			else{
				 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
			      redirect(base_url().'Settings_ctrl/view_religion'); 	
			}	 
	  
	  
}
function delete_religion(){
		  
		  $data1 = array(
				  "religion_status" => '0'
							 );
		  $id = $this->uri->segment(3);
		  $result = $this->Settings_model->delete_religion($id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Settings_ctrl/view_religion');
	  }




function view_caste()
 {              $settings        = get_settings();
        		$header['title'] = $settings->title . " | View Caste";
	            $this->load->view('Templates/header',$header);
	            $template['data'] = $this->Settings_model->view_caste();
				$this->load->view('Settings/view_caste',$template); 
				$this->load->view('Templates/footer');
 }	  
 function add_caste()
 {
	           $settings        = get_settings();
        		$header['title'] = $settings->title . " | Add Caste";
	            $this->load->view('Templates/header',$header);
	            $where[] = "religion_status = 1";
	            $data['religions'] = $this->Settings_model->getTable("",$where,"religions");
				$this->load->view('Settings/add_caste',$data);
				$this->load->view('Templates/footer');


				if($_POST) {
					$data = $_POST;
					$result = $this->Settings_model->add_caste($data);
					if($result=="error"){
						$this->session->set_flashdata('message',array('message' => 'Caste Already Exist','class' => 'error'));	
					}
					else{
						$this->session->set_flashdata('message',array('message' => ' Caste Details Added Successfully','class' => 'success')); 
					}

				redirect(base_url().'Settings_ctrl/view_caste'); 			  
				 
			}      
	   
	  //$this->load->view('template',$template);
 
 }


 function edit_caste(){
		   $settings        = get_settings();
           $header['title'] = $settings->title . " | Edit Report";
	       $this->load->view('Templates/header',$header);
		  
		   $id = $this->uri->segment(3);
		   $template['data'] = $this->Settings_model->editget_caste_id($id);
		   $where[] = "religion_status = 1";
	       $template['religionz'] = $this->Settings_model->getTable("",$where,"religions");
	     
		   $this->load->view('Settings/edit_caste',$template);
		   $this->load->view('Templates/footer');
		   if(!empty($template['data'])){
         
		  if($_POST){ 
			  $data = $_POST;  
			      $result = $this->Settings_model->edit_caste($data, $id);
				   redirect(base_url().'Settings_ctrl/view_caste'); 	
			
		         }
		    }
			else{
				 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));	
			      redirect(base_url().'Settings_ctrl/view_caste'); 	
			}	 
	  
	  
}
function delete_caste(){
		  
		  $data1 = array(
				  "caste_status" => 0
							 );
		  $id = $this->uri->segment(3);
		  $result = $this->Settings_model->delete_caste($id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Settings_ctrl/view_caste');
	  }	 

	public function get_drop_data2() {
		$sel_val = $this->input->post('sel_val');
		$sel_typ = $this->input->post('sel_typ');
		$where = array();
	    $tbl = "";

		if($sel_typ == "country") { 
			$tbl = "states";
			$fld_name = "State";
			$where[] = "country_id = '".$sel_val."'"; 
		} else if($sel_typ == "state") {
			$tbl = "cities";
			$fld_name = "City";
			$where[] = "state_id = '".$sel_val."'"; 
		} else { return false; }

		$drop_vals = $this->Settings_model->getTable1("",$where,$tbl);

		$html = "";
		$html.= "<option value='0'> - Select  A ".$fld_name." - </option>";

		if($fld_name == "State") {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->state_id."'>".$drop_val->state_name."</option>";
			}
		} else if($fld_name == "City"){
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->city_id."'>".$drop_val->city_name."</option>";
			}
		}
		echo $html;
	}
function view_parish()
 {              $settings        = get_settings();
        $header['title'] = $settings->title . " | View Parish";
	            $this->load->view('Templates/header',$header);
	            $template['data'] = $this->Settings_model->view_parish();
				$this->load->view('Settings/view_parish',$template); 
				$this->load->view('Templates/footer');
 }	

 public function add_parish(){
 	     $where[] = "country_status = 1";
	     $template['countries'] = $this->Settings_model->getTable1("",$where,"country");
		 $settings        = get_settings();
        $header['title'] = $settings->title . " | Add Parish";
	     $this->load->view('Templates/header',$header);
		 $this->load->view('Settings/add_parish',$template); 
		 $this->load->view('Templates/footer');
		   if($_POST) {
					  
				  $data = $_POST;
				  
				/*var_dump($data);
				die();
			 */
			// $data['created_by']=$sessid['created_user']; 
			 $result = $this->Settings_model->add_parish($data);
			 if($result)
			 {
				  $this->session->set_flashdata('message',array('message' => 'Parish details added successfully.','class' => 'success'));
			 }
			 else
			 {
				 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
			 }			 
				
				  redirect(base_url().'Settings_ctrl/view_parish');	  
				 
				  }     
 } 

 function edit_parish(){
		   $settings        = get_settings();
           $header['title'] = $settings->title . " | Edit Parish";
	       $this->load->view('Templates/header',$header);
		  
		   $id = $this->uri->segment(3);
		    $where[] = "country_status = 1";
	       $template['countries'] = $this->Settings_model->getTable("",$where,"country");
		   $template['data'] = $this->Settings_model->editget_parish_id($id);
		   $this->load->view('Settings/edit_parish',$template);
		   $this->load->view('Templates/footer');
		   if(!empty($template['data'])){
         
		  if($_POST){ 
			  $data = $_POST;			 	
			  
			      $result = $this->Settings_model->edit_parish($data, $id);
			      if($result)
					 {
						  $this->session->set_flashdata('message',array('message' => 'Parish details updated successfully.','class' => 'success'));
					 }
					 else
					 {
						 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
					 }			 
				
				   redirect(base_url().'Settings_ctrl/view_parish'); 	
			
		         }
		    }	  
}
function delete_parish(){
		  
		  $data1 = array(
				  "parish_status" => '0'
							 );
		  $id = $this->uri->segment(3);
		  $result = $this->Settings_model->delete_parish($id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Settings_ctrl/view_parish');
	  }
function sending_mail($from,$name,$mail,$sub, $msg) { 
        
 // 	$settings        = get_settings();
	// $config['protocol'] = "smtp";
	// $config['smtp_host'] = $settings->smtp_host;
	// $config['smtp_port'] = "587";
	// $config['smtp_user'] = $settings->smtp_username; 
	// $config['smtp_pass'] =  $settings->smtp_password; 
	// $config['charset'] = "utf-8";
	// $config['mailtype'] = "html";
	// $config['newline'] = "\r\n";
                       
	// $this->email->initialize($config);
	// $this->email->from($from, $name); 
	// $this->email->to($mail); 
	// $this->email->subject($sub);
	// $this->email->message($msg); 
	// $this->email->send();
	// return "success";

	$this->load->library('Mailgun_lib');
	$mgClient = new Mailgun_lib();
	$from_name = "Pellithoranam";
	$from = "no-reply@pellithoranam.com";
	$mgClient->to($mail);
	$mgClient->from($from,$from_name);
	$mgClient->subject($sub);
	$mgClient->message($msg);
	$mgClient->send();
	return "success";
} 
 function add_newsletter()
 {
    $settings        = get_settings();
	$header['title'] = $settings->title . " | Add Newsletter";
    $this->load->view('Templates/header',$header);
	$this->load->view('Settings/add_newsletter');
	$this->load->view('Templates/footer');
       
	if($_POST) {
		  
	$data = $_POST;
		$res['news_letter']= $data['news_letter'];	
    $result = $this->Settings_model->newsletter_alerts();
    $content = "";
	$settings        = get_settings();
	$res['logo'] = $settings->logo;
/*	$content.= ' <div class="email-temp-wrapper" style="width:800px;margin:0 auto;border:1px solid #c02c48;border-radius:5px;    padding: 10px;">
						<div class="email-temp-logo-div">
							<img src="<?php echo $settings->logo; ?>" style="width:120px;">
							<!--<img src="http://techlabz/public_html/solmatenew/solmate/admin/assets/uploads/logo/soul_logo.png" style="width:120px;">-->
						</div>
						<div class="email-temp-content" style="border:1px solid #c02c48;border-radius:3px;border-top-left-radius:20px;border-top-right-radius:5px;
							border-bottom-left-radius:5px;border-bottom-right-radius:20px;font-family: "Roboto", sans-serif;padding: 25px;">
							<strong style="font-style:italic;"></strong><br>
							<p style="color: #4d4d4d;"> </p>
							<p style="color: #4d4d4d;"></p>
							<br>
							<div>'.$data['news_letter'].'</div>
							<div style="clear:both;"></div>
						</div>
			        </div>';*/
					
					
	 $content = $this->load->view('promoemail',$res,TRUE); //print_r($content);die;	
     foreach ($result as $results) { 
     $matrimony_id=$results->matrimony_id;
     $result2 = $this->Settings_model->get_individual_details($matrimony_id);
     $email=$result2->email;//print_r($email);die;
     $res = $this->match_alert($email,$content);//print_r($res);die;
	 if($res="success"){
		 $this->session->set_flashdata('message',array('message' => 'Successfully sent newsletter','class' => 'success'));
	 }
	}
			       
			}   
}
   	public function match_alert($email,$content) {
   		$settings        = get_settings();
        $title = $settings->title;
     	$from= 'mail.abcd@gmail.com'; 
    	$name1='Soulmate Matrimony'; 
    	//$name1= "$settings->title" 
     	$sub="Fwd: soulmatematrimony,";
     	$mailTemplate= $content;
     	$data = $this->sending_mail($from,$name1,$email,$sub,$mailTemplate);
		if($data="success"){
			return "success";
		}
   	}
   // FOR WEB SETTING
    public function websettings() {
     	$settings        = get_settings();
        $header['title'] = $settings->title . " | View Settings";
        $this->load->view('Templates/header',$header);
        //$id = $this->session->userdata('logged_in')['id'];
			   
			if($_POST){
			$data = $_POST;
			//array_walk($data, "remove_html");
				
				unset($data['submit']); 
				if(isset($_FILES['logo'])) {  
					$config = set_upload_logo('assets/uploads/logo');
					$this->load->library('upload');
					
					$new_name = time()."_".$_FILES["logo"]['name'];
					$config['file_name'] = $new_name;

					$this->upload->initialize($config);

					if ( ! $this->upload->do_upload('logo')) {
							unset($data['logo']);
					}
					else {
						$upload_data = $this->upload->data();
						//$data['logo'] = $config['upload_path']."/".$upload_data['file_name'];
						$data['logo'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
					}
				}
				if(isset($_FILES['icon'])) {  
					$config = set_upload_logo('assets/uploads/favicon');
					$this->load->library('upload');
					
					$new_name = time()."_".$_FILES["icon"]['name'];
					$config['file_name'] = $new_name;

					$this->upload->initialize($config);

					if ( ! $this->upload->do_upload('icon')) {
							unset($data['icon']);
					}
					else {
						$upload_data = $this->upload->data();
						//$data['logo'] = $config['upload_path']."/".$upload_data['file_name'];
						$data['icon'] = base_url().$config['upload_path']."/".$upload_data['file_name'];
					}
				}
				/* Save category details */
				$result = $this->Settings_model->update_settings($data);
				

				if($result) {
					/* Set success message */
					 $this->session->set_flashdata('message',array('message' => 'Settings Details Updated Successfully','class' => 'success'));
				}
				else {
					/* Set error message */
					 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
				}
			}
			$resulttitles = $this->Settings_model->settings_viewing();
			$sessing_arrays = array(
			'title' => $resulttitles->title
			);
		  	$this->session->set_userdata('title', $sessing_arrays);
		  	$template['result'] = $this->Settings_model->settings_viewing();
		$this->load->view('Settings/view_websettings',$template); 
		$this->load->view('Templates/footer');
	   } 	
	 
	   public function update_password($pass_data) {
		//   ini_set('display_errors', 1);
	   //ini_set('display_startup_errors', 1);
	   //error_reporting(E_ALL);
		   $usr  = $this->session->userdata('logged_in');
		   $this->load->library('encryption');
		   $td_date = date('Y-m-d H:i:s', time());
		   if($pass_data['new_password'] == $pass_data['conf_password']) { // checking new & confirm pass are same
		   //print_r($pass_data['new_password']); 
		   //print_r($pass_data['conf_password']);           
			 $qry_1 = $this->db->get_where('users', array('user_id'=>$usr->user_id)); // getting password of that user
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
				 return array('status' => 5,'msg' => "Password Changed Successfully");
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




	   function view_changepassword()
 {              $settings        = get_settings();
        $header['title'] = $settings->title . " | View Change Password";
	            $this->load->view('Templates/header',$header);
	           // $template['data'] = $this->session->userdata('logged_in_admin')['username'];,$template
				$this->load->view('Settings/view_changepassword'); 
				$this->load->view('Templates/footer');
 }	



 } 
 ?>