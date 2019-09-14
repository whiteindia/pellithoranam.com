<?php 

class Staff_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	//add Package
	public function  add_staff($data){
			  $data2['user_type']=3;
			  $data2['staff_name']=$data['staff_name'];
			  $data2['username']=$data['username'];
			  $data2['phone']=$data['phone'];
			  $data2['password']=md5($data['password']);
			  $result = $this->db->insert('staff', $data2);
			  $insert_id = $this->db->insert_id();
              
              $data1['staff_id']=$insert_id;
			  $data1['matrimony_members']=$data['matrimony_members'];
			  $data1['packages']=$data['packages'];
			  $data1['settings']=$data['settings'];
			  $data1['staff']=$data['staff'];
			  $data1['index_management']=$data['index_management'];
			  $data1['classifieds_management']=$data['classifieds_management'];
			  $result = $this->db->insert('staff_roles', $data1);
		      return $result;
     }

	 function view_staff(){
		 $query = $this->db->where('staff_status','1');
		 $query = $this->db->get('staff');
		 $result = $query->result();
		 return $result;
	}
	 function view_adminstaff(){
		 $this->db->select('staff.*, staff_roles.classifieds_management');
		 $this->db->from('staff' );
		 $this->db->join('staff_roles', 'staff.id = staff_roles.staff_id','left');
		 $query = $this->db->where('staff.staff_status','1');
		 $query = $this->db->where('staff_roles.classifieds_management','1');			
		 $query = $this->db->get();	 			
		 $result = $query->result();
		 return $result; 				
	}
	 public function delete_staff($id,$data1){
		 
		 $this->db->where('id', $id);
		 $result = $this->db->update('staff',$data1);

		 $this->db->where('staff_id', $id);
		 $this->db->delete('staff_roles');
         return $result;
		 
		 
	 }

	public function editget_staff_id($id){
		 
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('staff');
		 $result = $query->row();
		 return $result;
	 }

	 public function editget_staff_role_id($id){
		 
		 $query = $this->db->where('staff_id',$id);
		 $query = $this->db->get('staff_roles');
		 $result = $query->row();
		 return $result;
	 }
	 //edit package
	 public function edit_staff($data, $id){
		 
		 $this->db->where('id',$id);
		 $data2['staff_name']=$data['staff_name'];
		 $data2['username']=$data['username'];
		 $data2['phone']=$data['phone'];
		 // $data2['password']=md5($data['password']);
		 $result = $this->db->update('staff',$data2);

		 // $this->db->where('staff_id',$id);
		 // $data1['matrimony_members']=$data['matrimony_members'];
		 // $data1['packages']=$data['packages'];
	  //    $data1['settings']=$data['settings'];
		 // $data1['staff']=$data['staff'];
		 // $data1['index_management']=$data['index_management'];
	  //    $data1['classifieds_management']=$data['classifieds_management'];
		 // $result = $this->db->update('staff_roles',$data1);
		 return $result;		 
	 }
 
	 function view_super_admin(){
		 $query = $this->db->where('user_status','1');
		 $query = $this->db->where('user_type','2');
		 $query = $this->db->get('users');
		 $result = $query->result();
		 return $result;
	}

	public function  add_super_admin($data){
			  $data2['user_type']=2;
			  $data2['user_status']=1;
			  $data2['email']=$data['email'];
			  $pass = $this->encrypt->encode($data['password']);
			  $data2['password']=$pass;
			  $data2['created_date']=date('Y-m-d H:i:s', time());
			  $data2['modified_date']=date('Y-m-d H:i:s', time());
			  $result = $this->db->insert('users', $data2);
			 /* $insert_id = $this->db->insert_id();
              
              $data1['staff_id']=$insert_id;
			  $data1['matrimony_members']=$data['matrimony_members'];
			  $data1['packages']=$data['packages'];
			  $data1['settings']=$data['settings'];
			  $data1['staff']=$data['staff'];
			  $data1['index_management']=$data['index_management'];
			  $data1['classifieds_management']=$data['classifieds_management'];
			  $result = $this->db->insert('staff_roles', $data1);*/
		      return $result;
     }
		public function editget_admin_id($id){
		 
		 $query = $this->db->where('user_id',$id);
		 $query = $this->db->get('users');
		 $result = $query->row();
		 return $result;
	 } 
	 public function edit_super_admin($data, $id){
		 
		 $this->db->where('user_id',$id);
		 $data2['email']=$data['email'];
		 $result = $this->db->update('users',$data2);
		 return $result;		 
	 }
	 public function delete_super_admin($id,$data1){
		 
		 $this->db->where('user_id', $id);
		 $result = $this->db->update('users',$data1);		
         return $result;
		 
		 
	 }
	 }