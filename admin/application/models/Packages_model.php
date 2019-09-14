<?php 

class Packages_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	//add Package
	public function  add_packages($data){
	$this->db->where('package_name', $data['package_name']);
		$query = $this->db->get('packages');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
			$result = $this->db->insert('packages', $data);
		    return $result;
		}
     }
	

	 public function delete_package($id,$data1){
		 
		 $this->db->where('id', $id);
		 $result = $this->db->update('packages',$data1);
		 //$result = $this->db->delete('packages');
         return $result;
		 
		 
	 }

	public function editget_package_id($id){
		 
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('packages');
		 $result = $query->row();
		 return $result;
	 }
	 //edit package
	 public function edit_package($data, $id){
		$this->db->where('package_name', $data['package_name']);
		$this->db->where('id<>', $id);
		$query = $this->db->get('packages');
		if( $query->num_rows() > 0 ){ 
			return false;
		} 
		else{
			$this->db->where('id', $id);
			$result = $this->db->update('packages', $data);
			return $result;
		}		 
	 }
	 // view Package 
	 function view_packages(){
	     //$query = $this->db->where('package_manage_status','1');
		 $query = $this->db->where('package_status','1');
		 $query = $this->db->get('packages');
		 $result = $query->result();
		 return $result;
	}
 
	// view Package 
	 function view_manage_packages(){
		// $query = $this->db->where('package_manage_status','1');
		 $query = $this->db->where('package_status','1');
		 $query = $this->db->get('packages');
		 $result = $query->result();
		 return $result;
	}
 	
	 public function manage_package($data){
		 
		 $this->db->where('id',$data['id']);
		 $result = $this->db->update('packages',$data);
		 return $result;		 
	 }

public function edit_manage_package($data, $id){
		 
		 $this->db->where('id',$id);
		 $result = $this->db->update('packages',$data);
		 return $result;		 
	 }
  public function delete_manage_package($id,$data1){
		 
		 $this->db->where('id', $id);
		 $result = $this->db->update('packages',$data1);
         return $result;
		 
		 
	 }	
/*		 
	 public function get_categorydetails() {
		              
					 
				$query = $this->db->get('category');
			    $result = $query->result();
			    return $result; 				
	 }
	 
	 
		 //popup promocode
	 function get_promopopupdetails($id){
	
				$this->db->select('*'); 			
                $this->db->from('promocode');              				
                $this->db->where('id',$id); 
                $query = $this->db->get();			
			    $result = $query->row();	
			    return $result;				
	         }*/
	 
	 }