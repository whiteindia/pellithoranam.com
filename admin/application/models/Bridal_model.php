<?php 

class Bridal_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	//add Package
	public function  add_collection($data){

			  $result = $this->db->insert('bridal_collection', $data);
		      return $result;
     }
	
     public function  add_uploader($data){
        $data['password']=md5($data['password']);
                $result = $this->db->insert('bridalusers', $data);
                return $result;
        }
 
	 public function delete_collection($id){
		$this->db->where('id', $id);
		$result =  $this->db->delete('bridal_collection');
        return $result;
		 
		 
	 }

	public function editget_collection_id($id){
		 
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('bridal_collection');
		 $result = $query->row();
		 return $result;
	 }
	 //edit package
	 public function edit_collection($data, $id){
		 
		 $this->db->where('id',$id);
		 $result = $this->db->update('bridal_collection',$data);
		 return $result;		 
	 }

	// Data table 
	/**
    * Get number total filtered row
    *  
    * @return int Number total filtered row
    * @author Tj Thouhid
    * @version 2017-01-20
    */
    private function _get_number_of_filtered_result(){

        $query =$this->db->query("SELECT FOUND_ROWS() as totalRows");
        $row = $query->row();
        
        $result =(int) (isset($row)? $row->totalRows : 0); 
        return $result;
    }

    /**
    * Get Number total row 
    * 
    * @return int Number total row
    * @author Abdul Wadud Chowdhury
    * @version 2017-01-20
    */
    public function get_total_records($table_name) {
 
      $this->db->select("id");
      $this->db->from($table_name);
      //$this->db->where("deleted", 0);

      return (int) ($this->db->count_all_results());
    }


    /**
    * ---This Function is for Getting Data For Users
    *  
    * @return int Number total filtered row
    * @author Tj Thouhid
    * @version 2017-01-27
    */
    function get_bridal_list_datatable(array $params)
    {
        $offset =$params['offset'];
        $length =$params['length'];
        $search =$params['search'];
        $sortings =$params['sortings'];
        $sortings_columns =$params['sortings_columns'];
        $advance_searches =$params['advance_searches'];


        $this->db->select('SQL_CALC_FOUND_ROWS bc.id, bc.id,bc.title,bc.short_desc,bc.img', false);
        $this->db->from('bridal_collection bc');
		
                

       
        if($advance_searches['title']!==""){
          $this->db->like('bc.title',$advance_searches['title']);
        }

       
        
        
        // Sortings
        foreach($sortings as $sorting){ 

            $this->db->order_by($sortings_columns[$sorting['column']], $sorting['dir']);
        }

        // Limit
        if($length != "-1"){
            $this->db->limit($length, $offset);
        }

        $query = $this->db->get();
        // echo $this->db->last_query(); exit;
        $data =$query->result();


        return array(
            'data' =>$data,
            'recordsFiltered' =>$this->_get_number_of_filtered_result(),
            'recordsTotal' =>$this->get_total_records("bridal_collection"),
        );
    }
	      
	    
	    
}