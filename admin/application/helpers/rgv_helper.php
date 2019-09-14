<?php
/* Set upload option */

function set_upload_options($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] =  'gif|jpg|png|jpeg';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}


function set_upload_logo($path) {
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['width'] = 60;
    $config['height'] = 80;
	$config['overwrite']     = FALSE;

	return $config;
}

function get_settings(){
	$CI = & get_instance();		
	$CI->db->limit(1);	
	$settings = $CI->db->get('settings')->row();
	return $settings;	
}
function get_successstories(){
			$CI = & get_instance();		
			$CI->db->where('success_approval',1);
			$query = $CI->db->get('success_story');
			$car=$query->num_rows();
			return $car;	
		}
		function get_paidmember(){
			$CI = & get_instance();	
			$CI->db->select('* ');
	    	$CI->db->from('profiles');
        	$CI->db->join('membership_details', 'profiles.matrimony_id = membership_details.matrimony_id','left');
	    	$CI->db->where('profiles.is_premium',1);
		//	$CI->db->where('membership_details.membership_package',1);
			$CI->db->where('profiles.profile_status',1);
			$query = $CI->db->get();
			$res=$query->num_rows();
			return $res;	
		}
		function get_users(){
			$CI = & get_instance();		
			$CI->db->where('profile_status',1);
			$query = $CI->db->get('profiles');
			$car=$query->num_rows();
			return $car;	
		}
		function get_amount(){
			$CI = & get_instance();	
			 $CI->db->select_sum('purchase_amount');
				$CI->db->from('payments');
			 $query = $CI->db->get();//echo $CI->db->last_query();die;
			$amount= $query->row()->purchase_amount;
			return $amount;	
		}
?>