<?php 

class Reports_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	//add Package
	public function  add_packages($data){

			  $result = $this->db->insert('packages', $data);
		      return $result;
     }
	// view Package 
	 function view_reports(){
		 $query = $this->db->where('package_status','1');
		 $query = $this->db->get('packages');
		 $result = $query->result();
		 return $result;
	}

 function search($data){


         $this->db->select('profiles.*,membership_details.membership_package,active_members.date_time');
         $this->db->from('profiles');
         $this->db->join('membership_details', 'profiles.matrimony_id = membership_details.matrimony_id','left');
         $this->db->join('active_members', 'profiles.matrimony_id = active_members.user_id','left');
         if($data['country']!=0){
         $query = ($this->db->where('profiles.country',$data['country']));
         }if($data['city']!=0){
		 $query = $this->db->where('profiles.city',$data['city']);	
		 }if($data['religion']!=0){
		 $query = $this->db->where('profiles.religion',$data['religion']);
		 }if($data['gender']!=null){
		 $query = $this->db->where('gender',$data['gender']);
		 }if($data['member_type']!=null && $data['member_type']=='1'){
		 $query = $this->db->where('membership_details.membership_package','1');
		 }if($data['member_type']!=null && $data['member_type']=='3'){
		 $query = $this->db->where('membership_details.membership_package !=','1');
		 }if($data['member_type']!=null && $data['member_type']=='2'){
		 $date=date('Y-m-d', strtotime('-15 days'));
		 $query = $this->db->where('active_members.date_time <=',$date);
		 }
		 $query = $this->db->get();
		 $result = $query->result();
		 return $result;
	}

  public function get_packages() {
  	   $my_matr_id = $this->session->userdata('logged_in');
	   $mat_id=$my_matr_id->matrimony_id;
       $this->db->select('packages.package_name,membership_details.membership_package,membership_details.matrimony_id,profiles.matrimony_id');
       $this->db->from('packages');
       $this->db->join('membership_details', 'packages.id = membership_details.membership_package','left');
       $this->db->join('profiles', 'profiles.matrimony_id = membership_details.matrimony_id','left');
       $query = $this->db->where('packages.package_status','1');
       //$query = $this->db->where('membership_details.matrimony_id',$mat_id);
       $query = $this->db->get();
       $result = $query->result();
       return $result;
  }	
	 public function delete_package($id,$data1){
		 
		 $this->db->where('id', $id);
		 $result = $this->db->update('packages',$data1);
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
		 
		 $this->db->where('id',$id);
		 $result = $this->db->update('packages',$data);
		 return $result;		 
	 }
 
	// view Package 
	 function view_manage_packages(){
		 $query = $this->db->where('package_manage_status','1');
		  $query = $this->db->where('package_status','1');
		 $query = $this->db->get('packages');
		 $result = $query->result();
		 return $result;
	}
	
	
	function view_mobile(){
		$query = 	$this->db->select('membership_details.matrimony_id,membership_details.total_mobileview, 
		COUNT(mobile_view.mobileview_from) AS total');
		$query = 	  $this->db->from('membership_details');
			  $query = 	  $this->db->join('mobile_view', 'membership_details.matrimony_id = mobile_view.mobileview_from', 'left');
			  $query = 	$this->db->group_by('membership_details.matrimony_id,membership_details.total_mobileview');
			$query = $this->db->get();
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
	 // DATE_FORMAT(created_date, '%m') as 'month'  DATE_FORMAT(created_date, '%Y') as 'y'

	public function get_graph_details() {
		$query = $this->db->query("SELECT DATE_FORMAT(created_date, '%Y-%m') as 'y' , COUNT(profile_id) as 'total' FROM profiles GROUP BY DATE_FORMAT(created_date, '%Y%m')");
		 if($query->num_rows() > 0){ return $query->result(); } else { return false; }
	}
	public function get_earn_graph_details() {
		$query = $this->db->query("SELECT DATE_FORMAT(purchase_date, '%Y-%m') as 'y' , SUM(purchase_amount) as 'total' FROM payments GROUP BY DATE_FORMAT(purchase_date, '%Y%m')");
		 if($query->num_rows() > 0){ return $query->result(); } else { return false; }
	}

	public function getTable($select,$where,$tbl_name) {
	    if($select != "") { $this->db->select($select); }
	    if($where != "") { foreach($where as $row) {
	            $this->db->where($row);
	      }}
	    $qry_5 = $this->db->get($tbl_name);
	    if($qry_5->num_rows() > 0){ return $qry_5->result(); } else { return false; }
  	}

  	public function getCastes($sel_rlg) {
  	  $qry_2 = $this->db->get_where('castes',array('caste_status' => 1, 'religion_id' => $sel_rlg));
  	  if($qry_2->num_rows() > 0){ return $qry_2->result(); } else { return false; }
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
	    function get_users_list_datatable(array $params)
	    {
	        $offset =$params['offset'];
	        $length =$params['length'];
	        $search =$params['search'];
	        $sortings =$params['sortings'];
	        $sortings_columns =$params['sortings_columns'];
	        $advance_searches =$params['advance_searches'];


	        $this->db->select('SQL_CALC_FOUND_ROWS prf.profile_id, prf.profile_id,profile_name,prf.dob,prf.gender,prf.email,prf.phone,prf.matrimony_id,prf.profile_status,prf.country,prf.city,prf.religion,membership_details.membership_package,active_members.date_time', false);
	        $this->db->from('profiles prf');  
	       	$this->db->join('membership_details', 'prf.matrimony_id = membership_details.matrimony_id','left');
	       	$this->db->join('active_members', 'prf.matrimony_id = active_members.user_id','left'); 
			
                    

	        // if($advance_searches['member_type']!=""){
	        //   $this->db->like("usr.user_name", $advance_searches['member_type']);
	        // }
	        if($advance_searches['country']!=""){
	          $this->db->where('prf.country',$advance_searches['country']);
	        }
	        if($advance_searches['city']!=""){
	          $this->db->where('prf.city',$advance_searches['city']);
	        }
	        if($advance_searches['caste']!=""){
	          $this->db->where('prf.caste',$advance_searches['caste']);
	        }
	        if($advance_searches['religion']!=""){
	          $this->db->where('prf.religion',$advance_searches['religion']);
	        }
	        if($advance_searches['gender']!=""){
	          $this->db->where('gender',$advance_searches['gender']);
	        }

	        if($advance_searches['member_type']!="" && $advance_searches['member_type']=='1'){
	          $this->db->where('membership_details.membership_package','1');
	        }
	        if($advance_searches['member_type']!="" && $advance_searches['member_type']=='3'){
	          $this->db->where('membership_details.membership_package !=','1');
	        }
	        if($advance_searches['member_type']!="" && $advance_searches['member_type']=='2'){
	          $date=date('Y-m-d', strtotime('-15 days'));
	          $this->db->where('active_members.date_time <=',$date);
	        }

	       
	        // Conditions 
	       // $this->db->where('usr.deleted', 0);  

	        
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
	            'recordsTotal' =>$this->get_total_records("profiles"),
	        );
	    }
	      /**
	    * ---This Function is for Getting Data For Users
	    *  
	    * @return int Number total filtered row
	    * @author Tj Thouhid
	    * @version 2017-01-27
	    */
	    function get_new_users_list_datatable(array $params)
	    {
	        $offset =$params['offset'];
	        $length =$params['length'];
	        $search =$params['search'];
	        $sortings =$params['sortings'];
	        $sortings_columns =$params['sortings_columns'];
	        $advance_searches =$params['advance_searches'];


	        $this->db->select('SQL_CALC_FOUND_ROWS prf.profile_id, prf.profile_id,profile_name,prf.dob,prf.gender,prf.email,prf.phone,prf.matrimony_id,prf.created_date,prf.profile_status,prf.country,prf.city,prf.religion,membership_details.membership_package,active_members.date_time', false);
	        $this->db->from('profiles prf');  
	       	$this->db->join('membership_details', 'prf.matrimony_id = membership_details.matrimony_id','left');
	       	$this->db->join('active_members', 'prf.matrimony_id = active_members.user_id','left');

			
                    

	        // if($advance_searches['member_type']!=""){
	        //   $this->db->like("usr.user_name", $advance_searches['member_type']);
	        // }
	        if($advance_searches['from_date']!=""){
	          $this->db->where('prf.created_date>=',$advance_searches['from_date']);
	        }
	        if($advance_searches['to_date']!=""){
	          $this->db->where('prf.created_date<=',$advance_searches['to_date']);
	        }
	        // if($advance_searches['city']!=""){
	        //   $this->db->where('prf.city',$advance_searches['city']);
	        // }
	        // if($advance_searches['caste']!=""){
	        //   $this->db->where('prf.caste',$advance_searches['caste']);
	        // }
	        // if($advance_searches['religion']!=""){
	        //   $this->db->where('prf.religion',$advance_searches['religion']);
	        // }
	        // if($advance_searches['gender']!=""){
	        //   $this->db->where('gender',$advance_searches['gender']);
	        // }

	        // if($advance_searches['member_type']!="" && $advance_searches['member_type']=='1'){
	        //   $this->db->where('membership_details.membership_package','1');
	        // }
	        // if($advance_searches['member_type']!="" && $advance_searches['member_type']=='3'){
	        //   $this->db->where('membership_details.membership_package !=','1');
	        // }
	        // if($advance_searches['member_type']!="" && $advance_searches['member_type']=='2'){
	        //   $date=date('Y-m-d', strtotime('-15 days'));
	        //   $this->db->where('active_members.date_time <=',$date);
	        // }

	       
	        // Conditions 
	       // $this->db->where('usr.deleted', 0);  

	        
	        // Sortings
	        foreach($sortings as $sorting){ 

	            $this->db->order_by($sortings_columns[$sorting['column']], $sorting['dir']);
	        }
	        $this->db->order_by('created_date', 'DESC');

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
	            'recordsTotal' =>$this->get_total_records("profiles"),
	        );
	    }
	      /**
	    * ---This Function is for Getting Data For Users
	    *  
	    * @return int Number total filtered row
	    * @author Tj Thouhid
	    * @version 2017-01-27
	    */
	    function get_inactive_users_list_datatable(array $params)
	    {
	        $offset =$params['offset'];
	        $length =$params['length'];
	        $search =$params['search'];
	        $sortings =$params['sortings'];
	        $sortings_columns =$params['sortings_columns'];
	        $advance_searches =$params['advance_searches'];


	        $this->db->select('SQL_CALC_FOUND_ROWS prf.profile_id, prf.profile_id,profile_name,prf.dob,prf.gender,prf.email,prf.phone,prf.matrimony_id,prf.created_date,prf.profile_status,prf.country,prf.city,prf.religion,membership_details.membership_package,membership_details.membership_expiry,active_members.date_time', false);
	        $this->db->from('profiles prf');  
	       	$this->db->join('membership_details', 'prf.matrimony_id = membership_details.matrimony_id','left');
	       	$this->db->join('active_members', 'prf.matrimony_id = active_members.user_id','left');
	       	

			
                    

	        // if($advance_searches['member_type']!=""){
	        //   $this->db->like("usr.user_name", $advance_searches['member_type']);
	        // }
	        if($advance_searches['from_date']!=""){
	          $this->db->where('prf.created_date>=',$advance_searches['from_date']);
	        }
	        if($advance_searches['to_date']!=""){
	          $this->db->where('prf.created_date<=',$advance_searches['to_date']);
	        }
	        if($advance_searches['member_type']=="1"){
	        	$this->db->where('prf.profile_status!=','1');

	        }elseif($advance_searches['member_type']=="2"){
	        	$this->db->or_where('membership_details.membership_expiry<=',date("Y-m-d h:i:s"));
	        }else{
	        	$this->db->where('prf.profile_status!=','1');
	        	$this->db->or_where('membership_details.membership_expiry<=',date("Y-m-d h:i:s"));
	        }
	        // if($advance_searches['caste']!=""){
	        //   $this->db->where('prf.caste',$advance_searches['caste']);
	        // }
	        // if($advance_searches['religion']!=""){
	        //   $this->db->where('prf.religion',$advance_searches['religion']);
	        // }
	        // if($advance_searches['gender']!=""){
	        //   $this->db->where('gender',$advance_searches['gender']);
	        // }

	        // if($advance_searches['member_type']!="" && $advance_searches['member_type']=='1'){
	        //   $this->db->where('membership_details.membership_package','1');
	        // }
	        // if($advance_searches['member_type']!="" && $advance_searches['member_type']=='3'){
	        //   $this->db->where('membership_details.membership_package !=','1');
	        // }
	        // if($advance_searches['member_type']!="" && $advance_searches['member_type']=='2'){
	        //   $date=date('Y-m-d', strtotime('-15 days'));
	        //   $this->db->where('active_members.date_time <=',$date);
	        // }

	       
	        // Conditions 
	       // $this->db->where('usr.deleted', 0);  

	        
	        // Sortings
	        foreach($sortings as $sorting){ 

	            $this->db->order_by($sortings_columns[$sorting['column']], $sorting['dir']);
	        }
	        $this->db->order_by('created_date', 'DESC');

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
	            'recordsTotal' =>$this->get_total_records("profiles"),
	        );
	    }
	      /**
	    * ---This Function is for Getting Data For Users
	    *  
	    * @return int Number total filtered row
	    * @author Tj Thouhid
	    * @version 2017-01-27
	    */
	    function get_amount_report_datatable(array $params)
	    {
	        $offset =$params['offset'];
	        $length =$params['length'];
	        $search =$params['search'];
	        $sortings =$params['sortings'];
	        $sortings_columns =$params['sortings_columns'];
	        $advance_searches =$params['advance_searches'];


	        $this->db->select('SQL_CALC_FOUND_ROWS payments.id, payments.id,prf.profile_name,pkg.package_name,payments.purchase_amount,payments.purchase_date,md.membership_expiry,payments.payment_method', false);
	        $this->db->from('payments');  
	       	$this->db->join('profiles prf', 'prf.matrimony_id = payments.user_id','left');
	       	$this->db->join('membership_details md', 'md.matrimony_id = payments.user_id','left');
	       	$this->db->join('packages pkg', 'pkg.id = payments.package_id','left');
	   
	       	

			
             $this->db->where('payments.purchase_amount>',0);       

	        // if($advance_searches['member_type']!=""){
	        //   $this->db->like("usr.user_name", $advance_searches['member_type']);
	        // }
	        if($advance_searches['from_date']!=""){
	          $this->db->where('payments.purchase_date>=',$advance_searches['from_date']);
	        }
	        if($advance_searches['to_date']!=""){
	          $this->db->where('payments.purchase_date<=',$advance_searches['to_date']);
	        }
	        
	        // if($advance_searches['caste']!=""){
	        //   $this->db->where('prf.caste',$advance_searches['caste']);
	        // }
	        // if($advance_searches['religion']!=""){
	        //   $this->db->where('prf.religion',$advance_searches['religion']);
	        // }
	        // if($advance_searches['gender']!=""){
	        //   $this->db->where('gender',$advance_searches['gender']);
	        // }

	        // if($advance_searches['member_type']!="" && $advance_searches['member_type']=='1'){
	        //   $this->db->where('membership_details.membership_package','1');
	        // }
	        // if($advance_searches['member_type']!="" && $advance_searches['member_type']=='3'){
	        //   $this->db->where('membership_details.membership_package !=','1');
	        // }
	        // if($advance_searches['member_type']!="" && $advance_searches['member_type']=='2'){
	        //   $date=date('Y-m-d', strtotime('-15 days'));
	        //   $this->db->where('active_members.date_time <=',$date);
	        // }

	       
	        // Conditions 
	       // $this->db->where('usr.deleted', 0);  

	        
	        // Sortings
	        foreach($sortings as $sorting){ 

	            $this->db->order_by($sortings_columns[$sorting['column']], $sorting['dir']);
	        }
	        $this->db->order_by('created_date', 'DESC');

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
	            'recordsTotal' =>$this->get_total_records("profiles"),
	        );
	    }
	 

		public function get_package($mat_id){
			$this->db->where('matrimony_id',$mat_id);
			$query1 = $this->db->get('membership_details');
			$result1 = $query1->row();
			$this->db->where('id',$result1->membership_package);
		 $query = $this->db->get('packages');
		 $result = $query->row();
		 $month=$result->month;
		 $amount=$result->price;
		   /* if($data['package_type']==1){	*/
		 $date=date('Y-m-d H:i:s', time());
	
		$data1['interest'] = $this->getCount($mat_id,"interest_from","profile_interest");
		$data1['mails']= $this->getCount($mat_id,"mail_from","profile_mails");
		$data1['views']= $this->getCount($mat_id,"mobileview_from","mobile_view");
		$data1['sms'] = $this->getCount($mat_id,"send_sms_from","send_sms");
	
		 $data1['total_interest']=$result1->total_interest;
		 $data1['total_sendmail']=$result1->total_sendmail;
		 $data1['total_mobileview']=$result1->total_mobileview;
		 $data1['total_sms']=$result1->total_sms;
		 $data1['membership_package']=$result1->membership_package;
		 $data1['membership_package_name']=$result->package_name;
	
		/*  echo '<pre>'; 
	 print_r($data1);
	 echo '</pre>'; 
	exit();
		 
		 $data1['membership_purchase']= date('Y-m-d H:i:s', time());
		 $data1['membership_expiry']= date('Y-m-d H:i:s', strtotime('+'.$month.' months'));
		 $this->db->where('matrimony_id',$mat_id);
		 $result = $this->db->update('membership_details',$data1); */
		/*}else if($data['package_type']==2){
		 $date=date('Y-m-d H:i:s', time());
	
		 $data2['total_interest']=$result->intrest_permonth;
		 $data2['total_sendmail']=$result->personalized_msg_permonth;
		 $data2['total_mobileview']=$result->verified_mob_permonth;
		 $data2['total_sms']=$result->send_sms_permonth;
		 $data2['addon_package']=$data['package_id'];
		 $data2['addon_purchase']= date('Y-m-d H:i:s', time());
		 $data2['addon_expiry']= date('Y-m-d H:i:s', strtotime('+'.$month.' months'));
		 $this->db->where('matrimony_id',$mat_id);
		 $result = $this->db->update('membership_details',$data2);
		}//*//*
		if($data['package_id']=='1'){
		$data3['is_premium']='0';
		}else{
		$data3['is_premium']='1';
		}
	
		 $this->db->where('matrimony_id',$mat_id);
		 $result = $this->db->update('profiles',$data3);
		 $data4['user_id']=$mat_id;
		 $data4['package_id']=$data['package_id'];
		 $data4['purchase_amount']=$amount;
		 $data4['payment_method']=$data['payment_type'];
		 $data4['purchase_date']=date('Y-m-d H:i:s', time());
		 $result1 = $this->db->insert('payments', $data4);*/
		 return $data1;		 
	 }
		public function getCount($matr_id,$field,$table) {
			$qry=$this->db->get_where($table,array($field => $matr_id));
			$count = $qry->num_rows();
			return $count;
		}
		function get_mobile(){
		$this->db->select('matrimony_id'); 
		//	$this->db->where('id',$result1->membership_package);
		 $query = $this->db->get('profile');
			$result = $query->result();
			return $result;
	   }


	 }