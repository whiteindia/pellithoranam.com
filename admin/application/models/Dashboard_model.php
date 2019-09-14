<?php 

class Dashboard_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}

 	public function get_users($whr) {
 		if(!empty($whr)) { foreach($whr as $row) { $this->db->where($row); }}
 		$this->db->join('membership_details', 'profiles.matrimony_id = membership_details.matrimony_id','left');
 		$query = $this->db->get('profiles');
        if($query->num_rows() > 0) {
        	return $query->num_rows();
        }
 	}
	
} ?>