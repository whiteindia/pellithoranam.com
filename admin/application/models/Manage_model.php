<?php 

class Manage_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	// view customer details
	public function get_users($whr){
        if(!empty($whr)) { foreach($whr as $row) { $this->db->where($row); } }
        $query = $this->db->get('users');
        $result = $query->result();         
        return $result;
    }
// view staffs 
 function get_staffs($uid){
		 $query = $this->db->where('id',$uid);  
		 $query = $this->db->get('staff');
		 $result = $query->row();
		 return $result;
}
    public function changeCredentials($whr,$data) {
		
		//print_r($whr);die;
    	if(!empty($whr)) { foreach($whr as $row) { $this->db->where($row); } }
    	if($data['ctype'] == 'email') {														// update email
			$result = $this->db->update('users',array("email" => $data['email']));
			return 1;
		} else {
			if($data['n_pass'] == $data['r_pass']) {
				$chk_qry = $this->db->get('users');
	        	if($chk_qry->num_rows() == 1) {
		            $pass = $this->encrypt->decode($chk_qry->row()->password);
		            if($data['e_pass'] == $pass) {
						
		            	$new_pass = $this->encrypt->encode($data['n_pass']);
						if(!empty($whr)) { foreach($whr as $row) { $this->db->where($row); } }
		                $result = $this->db->update('users',array("password" => $new_pass));
		                return 1;
		            } else { return 2; }    
	        	} else { return 3; }
    		} else { return 4; }
		} 
    }
    public function changeStaffCredentials($whr,$data) {
    	if(!empty($whr)) { foreach($whr as $row) { $this->db->where($row); } }
    	if($data['ctype'] == 'email') {														// update email
			$result = $this->db->update('staff',array("username" => $data['email']));
			return 1;
		} else {
			if($data['n_pass'] == $data['r_pass']) {
				$chk_qry = $this->db->get('staff');
	        	if($chk_qry->num_rows() == 1) {
		            $pass =$chk_qry->row()->password;
		            if((md5($data['e_pass'])) == $pass) {
		            	$new_pass = (md5($data['n_pass']));
						if(!empty($whr)) { foreach($whr as $row) { $this->db->where($row); } }
		                $result = $this->db->update('staff',array("password" => $new_pass));
		                return 1;
		            } else { return 2; }    
	        	} else { return 3; }
    		} else { return 4; }
		} 
    }
}
?>