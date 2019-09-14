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
	

}