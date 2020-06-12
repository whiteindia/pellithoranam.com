<?php 

class Settings_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}

	public function  add_country($data){
		$this->db->where('country_name', $data['country_name']);
		$query = $this->db->get('country');
		//echo $this->db->last_query();die;
		if($query->num_rows() > 0){
			 return "error"; 
		}
		else {
			 $result = $this->db->insert('country', $data);
			return "success";
		}
     }

	 function view_country(){
		 $query = $this->db->where('country_status','1');
		 $query = $this->db->get('country');
		 $result = $query->result();
		 return $result;
	}
 public function editget_country_id($id){
		 
		 $query = $this->db->where('country_id',$id);
		 $query = $this->db->get('country');
		 $result = $query->row();
		 return $result;
	 }

	 public function edit_country($data, $id){
		 
		 $this->db->where('country_id',$id);
		 $result = $this->db->update('country',$data);
		 return $result;		 
	 } 

	 public function delete_country($id,$data1){
		 
		 $this->db->where('country_id', $id);
		 $result = $this->db->update('country',$data1);
         return $result;
		 
		 
	 } 

	public function  add_state($data){

			  $result = $this->db->insert('states', $data);
		      return $result;
     }

	 function view_state(){
	 	 $this->db->select('states.*,country.country_name');
         $this->db->from('states');
         $this->db->join('country', 'country.country_id = states.country_id','left');
		 $query = $this->db->where('states.state_status','1');
		 $query = $this->db->get();
		 $result = $query->result();
		 return $result;
	}
 public function editget_state_id($id){
		 
		 $query = $this->db->where('state_id',$id);
		 $query = $this->db->get('states');
		 $result = $query->row();
		 return $result;
	 }

	 public function edit_state($data, $id){
		 
		 $this->db->where('state_id',$id);
		 $result = $this->db->update('states',$data);
		 return $result;		 
	 } 

	 public function delete_state($id,$data1){
		 
		 $this->db->where('state_id', $id);
		 $result = $this->db->update('states',$data1);
         return $result;
		 
		 
	 } 

    public function  add_city($data){

			  $result = $this->db->insert('cities', $data);
		      return $result;
     }
 	public function view_city1(){
		 $query = $this->db->where('city_status','1');
		 $query = $this->db->get('cities');
		 $result = $query->result();
		 return $result;
	}
    function view_city(){
	 	 $this->db->select('cities.*,country.country_name,states.state_name');
         $this->db->from('cities');
         $this->db->join('country', 'country.country_id = cities.country_id','left');
         $this->db->join('states', 'states.state_id = cities.state_id','left');
		 $query = $this->db->where('cities.city_status','1');
		 $query = $this->db->get();
		 $result = $query->result();
		 return $result;
	}
 public function editget_city_id($id){
		 
		 $query = $this->db->where('city_id',$id);
		 $query = $this->db->get('cities');
		 $result = $query->row();
		 return $result;
	 }

	 public function edit_city($data, $id){
		 
		 $this->db->where('city_id',$id);
		 $result = $this->db->update('cities',$data);
		 return $result;		 
	 } 

	 public function delete_city($id,$data1){
		 
		 $this->db->where('city_id', $id);
		 $result = $this->db->update('cities',$data1);
         return $result;
		 
		 
	 }

	 function view_education(){
		 $query = $this->db->where('education_status','1');
		 $query = $this->db->get('educations');
		 $result = $query->result();
		 return $result;
	}
	public function  add_education($data){
		$this->db->where('education', $data['education']);
		$query = $this->db->get('educations');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
		$result = $this->db->insert('educations',$data);
		return $result;
		}	
     }


 public function editget_education_id($id){
		 
		 $query = $this->db->where('education_id',$id);
		 $query = $this->db->get('educations');
		 $result = $query->row();
		 return $result;
	 }
	 //edit package
	 public function edit_education($data, $id){
		$this->db->where('education', $data['education']);
		$this->db->where('education_id<>', $id);
		$query = $this->db->get('educations');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
	     $this->db->where('education_id', $id);
		 $result = $this->db->update('educations', $data);
		 return $result;
		}		 
	 } 

	 public function delete_education($id,$data1){
		 
		 $this->db->where('education_id', $id);
		 $result = $this->db->update('educations',$data1);
         return $result;
		 
		 
	 } 
	 function view_occupation(){
		 $query = $this->db->where('occupation_status','1');
		 $query = $this->db->get('occupations');
		 $result = $query->result();
		 return $result;
	}

	// public function  add_occupation($data){

	// 	  $result = $this->db->insert('occupations', $data);
	// 	  return $result;
 //    }

    public function add_occupation($data){
   		$this->db->where('occupation', $data['occupation']);
		$query = $this->db->get('occupations');
		if($query->num_rows() > 0){
			 return "error"; 
		}
		else {
			$this->db->insert('occupations', $data);
			//echo $this->db->last_query();die;
			return "success";
		}	  
	} 


 public function editget_occupation_id($id){
		 
		 $query = $this->db->where('occupation_id',$id);
		 $query = $this->db->get('occupations');
		 $result = $query->row();
		 return $result;
	 }
	 //edit package
	 public function edit_occupation($data, $id){
		 
		 $this->db->where('occupation_id',$id);
		 $result = $this->db->update('occupations',$data);
		 return $result;		 
	 } 

	 public function delete_occupation($id,$data1){
		 
		 $this->db->where('occupation_id', $id);
		 $result = $this->db->update('occupations',$data1);
         return $result;
		 
		 
	 } 	

	public function getTable($select,$where,$tbl_name) {
	    if($select != "") { $this->db->select($select); }
	    if($where != "") { foreach($where as $row) {
	            $this->db->where($row);
	      }}
	    $qry_5 = $this->db->get($tbl_name);
	    if($qry_5->num_rows() > 0){ return $qry_5->result(); } else { return false; }
  	}
 	function view_religion(){
		 $query = $this->db->where('religion_status','1');
		 $query = $this->db->get('religions');
		 $result = $query->result();
		 return $result;
	}

	public function  add_religion($data){
	    $this->db->where('religion_name', $data['religion_name']);
		$query = $this->db->get('religions');
		if($query->num_rows() > 0){
			return "error"; 
		}
		else {
			$result = $this->db->insert('religions', $data);
			return "success";
		}
     }


 	public function editget_religion_id($id){
		 
		 $query = $this->db->where('religion_id',$id);
		 $query = $this->db->get('religions');
		 $result = $query->row();
		 return $result;
	 }

	public function edit_religion($data, $id){
		 
		 $this->db->where('religion_id',$id);
		 $result = $this->db->update('religions',$data);
		 return $result;		 
	 } 

	public function delete_religion($id,$data1){
		 
		 $this->db->where('religion_id', $id);
		 $result = $this->db->update('religions',$data1);
         return $result;
		 
		 
	 } 	


	public function  add_caste($data){

			  // $result = $this->db->insert('castes', $data);
		   //    return $result;
		$this->db->where('caste_name', $data['caste_name']);
		$this->db->where('religion_id', $data['religion_id']);
		$query = $this->db->get('castes');
		if($query->num_rows() > 0){
			return "error"; 
		}
		else {
			$result = $this->db->insert('castes', $data);
			return "success";
		}
     }

	 function view_caste(){
	 	 $this->db->select('castes.*,religions.religion_name');
         $this->db->from('castes');
         $this->db->join('religions', 'religions.religion_id = castes.religion_id','left');
		 $query = $this->db->where('castes.caste_status','1');
		 $query = $this->db->get();
		 $result = $query->result();
		 return $result;
	}
 	public function editget_caste_id($id){
		 
		 $query = $this->db->where('caste_id',$id);
		 $query = $this->db->get('castes');
		 $result = $query->row();
		 return $result;
	 }

	 public function edit_caste($data, $id){
		 
		 $this->db->where('caste_id',$id);
		 $result = $this->db->update('castes',$data);
		 return $result;		 
	 } 

	 public function delete_caste($id,$data1){
		 
		 $this->db->where('caste_id', $id);
		 $result = $this->db->update('castes',$data1);
         return $result;
		 
		 
	 } 


	public function getTable1($select,$where,$tbl_name) {
	    if($select != "") { $this->db->select($select); }
	    if($where != "") { foreach($where as $row) {
	            $this->db->where($row);
	      }}
	    $qry_5 = $this->db->get($tbl_name);
	    if($qry_5->num_rows() > 0){ return $qry_5->result(); } else { return false; }
  	}
    function view_parish(){
	 	 $this->db->select('parish.*,country.country_name,states.state_name,cities.city_name');
         $this->db->from('parish');
         $this->db->join('country', 'country.country_id = parish.country_id','left');
         $this->db->join('states', 'states.state_id = parish.state_id','left');
         $this->db->join('cities', 'cities.city_id = parish.city_id','left');
		 $query = $this->db->where('parish.parish_status','1');
		 $query = $this->db->get();
		 $result = $query->result();
		 return $result;
	} 	

	public function  add_parish($data){

			  $result = $this->db->insert('parish', $data);
		      return $result;
     }

  	public function editget_parish_id($id){
		 
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('parish');
		 $result = $query->row();
		 return $result;
	 }

	 public function edit_parish($data, $id){
		 
		 $this->db->where('id',$id);
		 $result = $this->db->update('parish',$data);
		 return $result;		 
	 } 

	 public function delete_parish($id,$data1){
		 
		 $this->db->where('id', $id);
		 $result = $this->db->update('parish',$data1);
         return $result;
		 
		 
	 }   
	 public function newsletter_alerts() {
		 $this->db->select('*');
	    $this->db->where('newsletter_alert','1');
	    $query = $this->db->get('mail_alerts');
	    $result = $query->result();//echo $this->db->last_query();die;
	    return $result;
	   }
	 public function get_individual_details($matrimony_id) {
	    $this->db->where('matrimony_id',$matrimony_id);
	    $query = $this->db->get('profiles');
	    $result = $query->row();
	   // echo $this->db->last_query();//die();
	    return $result;


	   }


// FOR WEBSETTINGS
	function settings_viewing(){
		 
		  $query = $this->db->query(" SELECT * FROM `settings` order by id DESC ")->row();
		  return $query ;
		  // echo $this->db->last_query();die;
	 }
	 
	public function get_single_settings($id){
       $query = $this->db->where('id',$id);
	   $query = $this->db->get('settings');
	   $result = $query->row();
	   return $result;  
	 }	
	 
	public function update_settings($data){
       //$this->db->where('id', $id);
	   $result = $this->db->update('settings', $data); 
	   return $result;
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
	
}