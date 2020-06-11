<?php 

class Login_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();

 	}
	
	function login($username, $password) {
		$this->load->library('encryption');
		$chk_qry = $this->db->get_where('users',array('email' =>$username, 'user_status' => 1, 'user_type' => 2));
        if ($chk_qry->num_rows() == 1) {
        	//echo $this->encryption->encrypt($password);
            $pass = $this->encryption->decrypt($chk_qry->row()->password);
            //echo $pass;
            //exit;
            if($password == $pass) {
                $this->db->where('user_id', $chk_qry->row()->user_id); 
                $usr_qry = $this->db->get('users');
                $result = $usr_qry->row();
				return $result;
            } 	
        }
            else {
				 $this->db->where('username',$username);					 
					      $this->db->where('password',md5($password));				 
						  $query=$this->db->get('staff');
						  $query_value=$query->row();					 				   
								   if ($query -> num_rows() == 1) 
								   {
								   return $query_value;
								   }
			}
			
	}

	public function forgetpassword($email){     
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
	   $this->db->where('email',$email);
	   $query1=$this->db->get('users');    
	   $query=$query1->row();
	   $query2=$query1->result_array();
	  
		  //$this->db->select('phone');
		 // $this->db->from('profiles');
		  
	  
	  /*
		 if($query12->num_rows()>0){
	  
		  $apiKey = urlencode('0fiLk8sAj50-F810SajAQVGv9RmBPrmYcapheCx2vT');
		  //echo $mob;
		  // Message details
		  $numbers = array($mob);
		  $sender = urlencode('TORNAM');
		  $message = rawurlencode($msg);
		 
		  $numbers = implode(',', $numbers);
		 
		  // Prepare data for POST request
		  $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
		 
		  // Send the POST request with cURL
		  $ch = curl_init('https://api.textlocal.in/send/');
		  curl_setopt($ch, CURLOPT_POST, true);
		  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  $response = curl_exec($ch);
		  curl_close($ch);
	  
		}
		*/
	  
			/*  $this->db->where('email',$email);
			  $chk_qry1 = $this->db->get('profiles');
		  $my_matr_id = $chk_qry1->result();
		  $mob=$my_matr_id[0]->phone;   */
		 // $query11=$this->db->select('phone')->where('email',$email)->get('profiles');
		 // $query12=$query11->result();
	  
	  
	   //$mob=$query12->phone;
	   if($query1->num_rows()>0)
	   {         
		 $this->load->helper('string');
		 $rand_pwd= random_string('alnum', 8);
		 $pass = $this->encryption->encrypt($rand_pwd);
		 $password=array('password'=>($pass));                 
		 $this->db->where('email',$email);
		 $query=$this->db->update('users',$password);
		 if($query)
		 {
		  /*$this->db->select('phone');
		  $this->db->from('users');
		  
			  $this->db->where('email',$email);
			  $chk_qry = $this->db->get();
		  $my_matr_id = $chk_qry;
		  $mob=$my_matr_id->phone;   */ 
		   $from= 'no-reply@techlabz.in'; 
		   $name='Soulmate Matrimony'; 
		   $sub="Forgot Password";
		   $email=$email;
		   // $mailTemplate="<div style='width:100%;float:left;color: ##ee2979;font-size=14px;font-weight: bold;>Hi,<br>Your Temporary Password is<br><div style='font-style=italics;width:100%; margin:0px 50px;'>$rand_pwd</div><br>You can change it later from account settings</div>";
		   $mailTemplate='Your Temporary Password is '.$rand_pwd.'. You can change it later from account settings';
		 $_SESSION['pwd']=$mailTemplate;
		   $this->sending_mail($from,$name,$email,$sub,$mailTemplate);     
	  
		 //  $this->verify->sent_mobile_msg($mob,$mailTemplate);
	  
	  
	  
		   return "EmailSend";
		 }
	   }
	   else
	   {
		 return "EmailNotExist";
	   }
	  
	   
	  
	  } 
	

}