<?php
class Home_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->model('Profile_model');
  }

 /* public function login($data) { 
    $chk_qry = $this->db->get_where('users',array('email' => $data['email'], 'user_status' => 1));
    
    if ($chk_qry->num_rows() == 1) {
      $pass = $this->encrypt->decode($chk_qry->row()->password);

      if($data['password'] == $pass) {
        $this->db->where('user_id', $chk_qry->row()->user_id); 
        $usr_qry = $this->db->get('profiles');

        if(!empty($usr_qry->result())) {
          if($usr_qry->result()[0]->profile_status != 2) {
            if($usr_qry->result()[0]->profile_status != 4) {
              if($usr_qry->result()[0]->profile_approval == 1) {
                $status = 1;
                $this->session->set_userdata('logged_in',$usr_qry->result()[0]);
                $data1['date_time'] = date('Y-m-d H:i:s', time());
                $data1['user_id']=$usr_qry->result()[0]->matrimony_id;

                $query = $this->db->where('user_id',$data1['user_id']);
                $query = $this->db->get('active_members');
                if ($query->num_rows() > 0){
                 $this->db->where('user_id',$data1['user_id']);
                 $this->db->update('active_members',$data1); 
               } else {                   
                $this->db->insert('active_members', $data1);
              }
                        } else { $status = 2; } // Profile Not Approved
                      } else { $status = 7; } // Profile Deactivated
                    } else { $status = 5; } // Profile Deleted or Banned
                } else { $status = 6; } // No Accounts Found
            } else {    $status = 3; } // Ivalid Password 
        } else {        $status = 4; } // Email not exist
        return $status;
      }*/
 public function login($data) { 


    if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $res = $data['email'];
    }
    else {
		$settings        = get_setting();
		$pre = $settings->id_prefix;
		
        $res =  trim($data['email'],$pre);
    }
	$this->db->select('*');
	$this->db->from('users');
	
			$this->db->join('profiles', 'profiles.email = users.email','left');
			$this->db->where('user_status','1');
			$this->db->where('users.email', $res);
      $this->db->or_where('matrimony_id',$res);
      $this->db->or_where('phone',$res);
		$chk_qry = $this->db->get();
		//$chk_qry = $query->row();
		//echo $this->db->last_query();die;
	
	
	
    if ($chk_qry->num_rows() == 1) {
      $pass = $this->encryption->decrypt($chk_qry->row()->password);

      if($data['password'] == $pass) {
        $this->db->where('user_id', $chk_qry->row()->user_id); 
        $usr_qry = $this->db->get('profiles');

        if(!empty($usr_qry->result())) {
          if($usr_qry->result()[0]->profile_status != 2) {
            if($usr_qry->result()[0]->profile_status != 4) {
              if($usr_qry->result()[0]->profile_approval == 1) {
                $status = 1;
                $this->session->set_userdata('logged_in',$usr_qry->result()[0]);
                $data1['date_time'] = date('Y-m-d H:i:s', time());
                $data1['user_id']=$usr_qry->result()[0]->matrimony_id;

                $query = $this->db->where('user_id',$data1['user_id']);
                $query = $this->db->get('active_members');
                if ($query->num_rows() > 0){
                 $this->db->where('user_id',$data1['user_id']);
                 $this->db->update('active_members',$data1); 
               } else {                   
                $this->db->insert('active_members', $data1);
              }
                        } else { $status = 2; } // Profile Not Approved
                      } else { $status = 7; } // Profile Deactivated
                    } else { $status = 5; } // Profile Deleted or Banned
                } else { $status = 6; } // No Accounts Found
            } else {    $status = 3; } // Ivalid Password 
        } else {        $status = 4; } // Email not exist
        return $status;
      }
	  
	  
      public function getReligions() {
        $this->db->order_by('religion_id','ASC');
        $qry_1 = $this->db->get_where('religions',array('religion_status' => 1));
        if($qry_1->num_rows() > 0){ return $qry_1->result(); } else { return false; }
      }

      public function getCastes($sel_rlg) {
        $qry_2 = $this->db->get_where('castes',array('caste_status' => 1, 'religion_id' => $sel_rlg));
        if($qry_2->num_rows() > 0){ return $qry_2->result(); } else { return false; }
      }

      public function getSubCastes($sel_cst) {
        $qry_2 = $this->db->get_where('sub_castes',array('sub_caste_status' => 1, 'caste_id' => $sel_cst));
        if($qry_2->num_rows() > 0){ return $qry_2->result(); } else { return false; }
      }

      public function getMotherTongues() {
        $qry_3 = $this->db->get_where('mother_tongues',array('mother_tongue_status' => 1));
        if($qry_3->num_rows() > 0){ return $qry_3->result(); } else { return false; }
      }
      public function view_success_story(){
         /* $this->db->where('banner_image is NOT NULL', NULL, FALSE);
         $this->db->order_by("date_time", "desc");*/
         //$this->db->limit('3');
         $this->db->where('success_status','1');
         $this->db->where('success_approval','1');
         $query = $this->db->get('success_story');
         $result = $query->result(); //echo $this->db->last_query();die;
         return $result;
       }
       

       // Regster User First Step
       public function InsertRegistration($rcvd_arr) {
      //var_dump($rcvd_arr); die();
        $td_date = date('Y-m-d H:i:s', time());
        $td_date1 = date('Y-m-d');
        // $dob = $rcvd_arr['year']."-".$rcvd_arr['month']."-".$rcvd_arr['day'];
        $query = $this->db->get_where('profiles',array('email'=>$rcvd_arr['email']));
        $query1 = $this->db->get_where('profiles',array('phone'=>$rcvd_arr['phone']));
        if ($query->num_rows() > 0){   
         return 0;
       }                              
       if($query1->num_rows() > 0){
        return 2;
      }              
      else{
		   $now = new DateTime();
			$age = $now->diff(new DateTime($rcvd_arr['dob']));
			$my_age = $age->format('%Y');
			
        $pass = $this->encryption->encrypt($rcvd_arr['password']);
        $ins_arr_1 = array('email' => $rcvd_arr['email'],
         'password'=> $pass,
         'created_date' => $td_date,
         'modified_date'=> $td_date,
         'user_type' => 1,
         'user_status' => 1);
        $this->db->insert('users',$ins_arr_1);
        $insert_id = $this->db->insert_id();
        $ins_arr = array('user_id' => $insert_id,
         'profile_for'  => $rcvd_arr['profile_for'],
         'profile_name' => $rcvd_arr['name'],
         'profile_surname' => $rcvd_arr['surname'],
         'gender' => $rcvd_arr['gender'],
         'dob'    => $rcvd_arr['dob'],
		 'age' => $my_age,
         'religion' => $rcvd_arr['religion'],
         'caste'    => $rcvd_arr['cast'],
         'mother_language' => $rcvd_arr['mother_tongue'],
         'phone' => $rcvd_arr['phone'],
         'phone_countrycode' => $rcvd_arr['phone_countrycode'],
         'email' => $rcvd_arr['email'],
         'created_date' =>$td_date1,
         'modified_date' =>$td_date1);
        $this->db->insert('profiles',$ins_arr);
        $ins_id = $this->db->insert_id();
        $this->session->set_userdata('ins_id',$ins_id);
        $this->session->set_userdata('gender',$rcvd_arr['gender']);
        $this->session->set_userdata('religion',$rcvd_arr['religion']);
        $this->session->set_userdata('dob',$rcvd_arr['dob']);
        $this->session->set_userdata('email',$rcvd_arr['email']);
        $this->session->set_userdata('mobile',$rcvd_arr['phone']);
        $this->session->set_userdata('is_catholic','0');
        return 1;
      }
    }
    function check_email($email){
      $where = array(
        'email' => $email
        );
      $result=$this->db->get_where('profiles',$where);
       
       if ($result->num_rows()) {
           return false;
       } else{
          return true;
       }
    }
    function check_phone($check_phone){
      $where = array(
        'phone' => $check_phone
        );
      $result=$this->db->get_where('profiles',$where);
       if ($result->num_rows()) {
           return false;
       } else{
          return true;
       }
    }
    public function InsertRegistrationDetails($data) {
   //   var_dump($data); die();
      $ins_ids = $this->session->userdata('ins_id');
      $gender=$this->session->userdata('gender');
      //$gender='female';
      $unq = $this->GenerateUique($gender);
      //echo $gender;
      //echo "<pre>";print_r($unq);echo "</pre>";exit;
      $age = $this->CalcAge($this->session->userdata('dob'));
      $upd_arr_2 =  array('matrimony_id' =>$unq,
        'age' => $age,
        'maritial_status' => $data['maritial_status'],
        'children_number'=> isset($data['children_number'])? $data['children_number'] : NULL,
        'children_living'=> isset($data['children_living'])? $data['children_living'] : NULL,
        //'willing_intercast'=> $data['willing'],
        'sub_caste'=> $data['sub_caste'],
        //'division'=> $data['division'],
        //'caste'=> $data['caste'],
        'country'=> $data['country'],
        'state'=> $data['state'],
        'city'=> $this->retrive_city1($data),
        'city_name_1'=> $this->retrive_city2($data),
        'parish'=> isset($data['parish'])? $data['parish'] : NULL,
        'resident_status'=> isset($data['resident_status'])? $data['resident_status'] : NULL,
        'citizenship'=> isset($data['citizenship'])? $data['citizenship'] : NULL,
        'income' =>isset($data['income'])? $this->get_currency($data) : NULL,
        'income_actual'=>isset($data['income'])? $this->get_actual_currency($data) : NULL,
        'currency'=> $data['country_currency'],
        'mothers_maiden_name'=> $data['mothers_maiden_name'],
        'height_id'=> $data['feet'],
        'weight_id'=> $data['weight'],
        'body_type'=> $data['body_type'],
        'complexion'=> $data['complexion'],
        'physical_status'=> $data['physical_status'],
        'education_id'=> $data['education'],
        'occupation_id'=> $data['occupation'],
        'occupation_sector'=> $data['employed_in'],
        'eating'=> $data['food'],
        'smoking'=> $data['smoking'],
        'drinking'=> $data['drinking'],
        'star_id'=> $data['star'],
        'padam'=> $data['padam'],
        'gothram'=> $data['gothram'],
        'dosham'=> $data['dosham'],
        'horo_img'=> $data['horo_img'],
        //'raasi_id'=> $data['raasi'],
        'family_status'=> $data['family_status'],
        'family_type'=> $data['family_type'],
        'family_value'=> $data['family_value'],
        'about_you'=> $data['about_you'],
        'is_premium' => 0,
        'is_phone_verified' =>0,
        'profile_approval' => 1,
                          'profile_status' => 1); // change verified and approval after admin
      $this->db->where('profile_id',$ins_ids);
     // print_r($upd_arr_2); die();
      $var = $this->db->update('profiles',$upd_arr_2);

      $this->InsertMembershipDetails($unq);
      $this->InsertSettingsPreferences($unq);

      $user = $this->Profile_model->get_profile_details($unq,"");
      $this->session->set_userdata('logged_in',$user[0]);
      return $var;
    }

    public function InsertMembershipDetails($unq) {
      $td_date = date('Y-m-d H:i:s', time());
      $package = $this->getPackages(1)[0];
	  //print_r($package);die;
      $ins_arrs = array('matrimony_id' => $unq,
       'membership_package'  => 1,
       'membership_purchase' => "",
       'membership_expiry' => "",
       'addon_package'    => "",
       'addon_purchase' => "",
       'addon_expiry'    => "",
       'total_interest' => $package->intrest_permonth,
       'total_sendmail' => $package->personalized_msg_permonth,
       'total_mobileview' => $package->verified_mob_permonth,
       'total_sms' => $package->send_sms_permonth);
      $this->db->insert('membership_details',$ins_arrs);
    }
    
    public function retrive_city1($data){
      if($data['country']=='-1'){
        $city=$data['city'];
        return $city;
      }
    }

    public function retrive_city2($data){
      if($data['country']!='-1'){        
        $city_name=$data['city_choose'];
        return $city_name;
      }

    }

    function convertCurrency($amount, $from, $to){ 
 // $amount1='1000';
      $data = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to"); 
      preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted); $converted = preg_replace("/[^0-9.]/", "", $converted[1]); 
      return number_format(round($converted, 3),2); 
    } 
    public function get_currency($data){
  //var_dump($data['income']); die();
      $inr='';
      if($data['income_per']==1 && $data['country_currency']!='INR'){
        $inr=$this->convertCurrency($data['income']*12,$data['country_currency'],"INR"); 

      }else if($data['income_per']==2 && $data['country_currency']!='INR'){
        $inr=$this->convertCurrency($data['income'],$data['country_currency'],"INR"); 
      }else if($data['income_per']==1 && $data['country_currency']=='INR'){ 
        $inr=$data['income']*12; 
      }
      else if($data['country_currency']=='INR'){ 
        $inr=$data['income']; 
      }
      return $inr;
    }

    public function get_actual_currency($data){
      $inr_act='';
      if($data['income_per']==1){
        $inr_act=$data['income']*12;
      }else{
        $inr_act=$data['income'];
      }
      return $inr_act;
    }
    public function get_citizen($citizenship){
      $citizenship1=array();
      if(($citizenship!='Not Specified')){
        $citz=explode(",", $citizenship);
  //var_dump($citizenship); die();
   for($i=0;$i<count($citz);$i++) { //echo $ctry[$i];
    $citizenship_ids[]= $citz[$i];
    if(isset($citz[$i])){
      $citizenship1[]=$this->Profile_model->getDetails('country','country_id',$citz[$i])[0]->country_name;
    }
  }
  
}
return $citizenship1;

}

public function InsertSettingsPreferences($unq) {
  $ins_arrs1 = array('matrimony_id' => $unq);
  $this->db->insert('settings_preferences',$ins_arrs1);
}

public function getPackages($pakg_id) {
  $qry_2 = $this->db->get_where('packages',array('id' => $pakg_id));
  if($qry_2->num_rows() > 0){ return $qry_2->result(); } else { return false; }
}

public function UpdateMobile($data,$user) {
  $this->db->where('user_id',$user);
  $var = $this->db->update('profiles',$data);
}

public function UpdateAbout($data,$user) {
  $this->db->where('user_id',$user);
  $var = $this->db->update('profiles',$data);
}

public function UpdateProfile1($data,$user) {
     // print_r($data);
  $this->db->where('user_id',$user);
  $var = $this->db->update('profiles',$data);
      //echo $this->db->last_query();
}

public function get_currency1($data){
  $inr='';
  if($data['currency']!='INR'){
    $inr=$this->convertCurrency($data['income_actual'],$data['currency'],"INR");  
  }else{
    $inr=$data['income_actual'];
  }

//var_dump($data['currency']); die();
  return $inr;
}

public function get_currency2($currency,$data){
  //var_dump($currency); die();
  $inr='';
  if($currency!=$data['currency']){
    $inr1=$this->convertCurrency($data['income_actual'],$data['currency'],$currency);
    $inr=preg_replace("/[^0-9.]/", "", $inr1);  
  }else{
    $inr=$data['income_actual'];
  }

//var_dump($data['currency']); die();
  return $inr;
}
public function UpdateProfile($data,$user) {
     //print_r($data); die();
  
  if(isset($data['income_actual'])){
       $data['income']=$this->get_currency1($data); 
  }
  if(isset($data['dob'])) {
    $age = $this->CalcAge($data['dob']);
    $data['age']=$age;
  }
  if(isset($data['maritial_status']) && ($data['maritial_status'])==1){
   $data['children_number']=NULL; 
   $data['children_living']=NULL; 
 }if(isset($data['country'])){
  $currency1=$this->fetch_currency($data['country']);
  $currency=$currency1->country_currency;
      // $currency='AUD';
       // 
  if($data['income_actual']!=null){
    $data['income_actual']=$this->get_currency2($currency,$data);   
  }
  $data['currency']=$currency; 
}
$this->db->where('user_id',$user);
$var = $this->db->update('profiles',$data);
/*      if(isset($data['parish'])){
      $query = $this->db->where('parish_name',$data['parish']); 
      $query = $this->db->get('parish'); 
                 if ($query->num_rows() > 0){

             return true;
                 }else{
             
              $data1['country_id']=$data['country'];
              $data1['state_id']=$data['state'];
              $data1['city_id']=$data['city'];
              $data1['parish_name']=$data['parish'];
              $result = $this->db->insert('parish', $data1);
         }   
       }  
       return $result;*/
     }
     public function fetch_currency($country_id){
//var_dump($country_id); die();
       $query = $this->db->where('country_id',$country_id);
       $query = $this->db->get('country');
       $result = $query->row();
       return $result;
     }

     public function GenerateUique($gender) {
      if($gender=='male'){
        $uniq = mt_rand(10001, 19999);
      }else{
        $uniq = mt_rand(20001, 29999);
      }
      
      $query_5 = $this->db->select('matrimony_id')->get_where('profiles',array('matrimony_id =' =>$uniq));
      if($query_5->num_rows() > 0) {
        $this->GenerateUique($gender);
      } else {
        return $uniq;
      }
    }

    public function CalcAge($dob) {
      $now = new DateTime();
      $age = $now->diff(new DateTime($dob));
      return $age->format('%Y');
    }
    


    public function view_content(){
      $this->db->where('content_para is NOT NULL', NULL, FALSE);
      $this->db->order_by("date_time", "desc");
      $this->db->limit('1');
      $query = $this->db->get('index_management');
      $result = $query->row();
     //echo $this->db->last_query();
     //die();
      return $result;
    }
    public function view_footer(){
      $this->db->where('footer_para is NOT NULL', NULL, FALSE);
      $this->db->order_by("date_time", "desc");
      $this->db->limit('1');
      $query = $this->db->get('index_management');
      $result = $query->row();
     //echo $this->db->last_query();
     //die();
      return $result;
    }

    public function view_banner(){
      $this->db->where('banner_image is NOT NULL', NULL, FALSE);
      $this->db->order_by("date_time", "desc");
      $this->db->limit('1');
      $query = $this->db->get('index_management');
      $result = $query->row();
      return $result;
    }

    public function get_highlighted_profiles(){
     $this->db->select('profiles.*,profiles.profile_name,profiles.profile_photo,profiles.age,educations.education');
     $this->db->from('profiles');
     $this->db->join('educations', 'profiles.education_id = educations.education_id','left');
     $query = $this->db->where('profiles.profile_highlight','1');
     //$query = $this->db->where('profiles.profile_status','1');
    // $query = $this->db->where('profiles.profile_approval','1');
     //$query = $this->db->where('profiles.is_phone_verified','1');
     $query = $this->db->where('educations.education_status','1');
     $query = $this->db->get();
     $result = $query->result();
     return $result;
   }
   public function view_rightad(){
    $this->db->where('right_ad is NOT NULL', NULL, FALSE);
    $this->db->order_by("date_time", "desc");
    $this->db->limit('1');
    $query = $this->db->get('index_management');
    $result = $query->row();
     //echo $this->db->last_query();
     //die();
    return $result;
  }
  public function view_leftad(){
    $this->db->where('left_ad is NOT NULL', NULL, FALSE);
    $this->db->order_by("date_time", "desc");
    $this->db->limit('1');
    $query = $this->db->get('index_management');
    $result = $query->row();
     //echo $this->db->last_query();
     //die();
    return $result;
  }
  /*----------------customer registration----------------------------------*/

  function customer_registration($data){

            $this->db->where('email',$data['email']);
            $query = $this->db->get('registration');
               if ($query->num_rows() > 0){ // check if user exist or not
               return 0;
               }else{
                   
                   $data['password']= md5($data['password']);
                  $data['age']=date("Y")-$data['year'];
                   $result = $this->db->insert('registration', $data);
                   $insert_id = $this->db->insert_id();
                   if($result){

                              
                      $sess_array = array();
                      $sess_array = array(
                                        'id' =>$insert_id,                         
                                        'email' =>$data['email'],
                                        'name'=>$data['name'],
                                        'surname'=>$data['surname'],
                                        'gender'=>$data['gender'],
                                        'religion'=>$data['religion'],
                                        'mother_tongue'=>$data['mother_tongue'],
                                        'profile_for'=>$data['profile_for']
                                       
                                       
                                      );                                     
                      $this->session->set_userdata('user_values',$sess_array);
                      echo 1;
               }
     }
   //  return($data);
   }
   public function sending_mail($from,$name,$mail,$sub, $msg) { 
	//$settings        = get_setting();
	// $config['protocol'] = "smtp";
	// $config['smtp_host'] = $settings->smtp_host;
	// $config['smtp_port'] = "465";
	// $config['smtp_user'] = $settings->smtp_username; 
	// $config['smtp_pass'] =  $settings->smtp_password; ;
	// $config['charset'] = "utf-8";
	// $config['mailtype'] = "html";
	// $config['newline'] = "\r\n";
    // $this->email->initialize($config); 
    // $this->email->from($from, $name); 
    // $this->email->to($mail); 
    // $this->email->subject($sub);
    // $this->email->message($msg); 
    // $this->email->send(); //echo $this->email->print_debugger(); 

    $this->load->library('Mailgun_lib');
    $mgClient = new Mailgun_lib();
    $from_name = "Pellithoranam";
    $from = "no-reply@pellithoranam.com";
    $mgClient->to($mail);
    $mgClient->from($from,$from_name);
    $mgClient->subject($sub);
    $mgClient->message($msg);
    $mgClient->send();
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
    
   $this->db->select('*');
   $this->db->from('profiles');
   $this->db->where('email', $email);
   $query12 = $this->db->get();
   $query11= $query12->row();
   $my_matr_id =  $query12->result();
   $mob=$my_matr_id->phone;



      /*  $this->db->where('email',$email);
        $chk_qry1 = $this->db->get('profiles');
    $my_matr_id = $chk_qry1->result();
    $mob=$my_matr_id[0]->phone;   */
   // $query11=$this->db->select('phone')->where('email',$email)->get('profiles');
   // $query12=$query11->result();


 $mob=$query12->phone;
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
     $mailTemplate='Your Temporary Password is '.$rand_pwd.'.'.$mob.' You can change it later from account settings';
     $this->sending_mail($from,$name,$email,$sub,$mailTemplate);     



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



     return "EmailSend";
   }
 }
 else
 {
   return "EmailNotExist";
 }

 

} 
/*---------------------login -----------------------------------------------------------*/


//Update Registration details       
public function registration_update($data){
 $session=$this->session->userdata('user_values');
 $this->db->where('id',$session['id']);      
 $result = $this->db->update('registration',$data);

 if($result){
  $status=1;           
  
}else{
 $status=1; 
}  
$message = array('status' => $status ,'result' => $data);
return $message; 

}

public function getSingleFieldById($select,$where,$tbl_name) {
  if($select != "") { $this->db->select($select); }
  if(!empty($where)) {
    foreach($where as $row) { $this->db->where($row); }
  }
  $qry_4 = $this->db->get($tbl_name);
  if($qry_4->num_rows() > 0){ return $qry_4->result()[0]; } else { return false; }
}

public function getTable($select,$where,$tbl_name) {
  if($select != "") { $this->db->select($select); }
  if($where != "") { foreach($where as $row) {
    $this->db->where($row);
  }}
  $qry_5 = $this->db->get($tbl_name);
  if($qry_5->num_rows() > 0){ return $qry_5->result(); } else { return false; }
}
public function getTable2($select,$where,$tbl_name,$ordr_by) {
  if($select != "") { $this->db->select($select); }
  if($where != "") { foreach($where as $row) {
    $this->db->where($row);
  }}
  if($ordr_by!="") { $this->db->order_by($ordr_by,"asc"); }
  $qry_5 = $this->db->get($tbl_name);
  if($qry_5->num_rows() > 0){ return $qry_5->result(); } else { return false; }
}
public function getTable1($select,$where,$like,$order_by,$tbl_name) {
  if($select != "") { $this->db->select($select); }
  if($where != "") { foreach($where as $row) {
    $this->db->where($row);
  }}
  if($like!="") { $this->db->like('parish_name',$like); }
  if($order_by!="") { $this->db->order_by($order_by); }
  $qry_5 = $this->db->get($tbl_name);
  if($qry_5->num_rows() > 0){ return $qry_5->result(); } else { return false; }
}
public function insertTable($ins_arr,$tbl) {
  $field_1 = array_keys($ins_arr)[0];
  $field_2 = array_keys($ins_arr)[1];
  $qry = $this->db->get_where($tbl, array($field_1 => $ins_arr[$field_1],$field_2 =>$ins_arr[$field_2]));
      //echo $this->db->last_query();
  if($qry->num_rows() == 0) {
    $this->db->insert($tbl,$ins_arr); 
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
}
public function check_verification($data) {
	 if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
		$res = $data['email'];
	  }
	  else{
		$settings        = get_setting();
		$pre = $settings->id_prefix;
        $res =  trim($data['email'],$pre);
	  }
	    $this->db->where('is_phone_verified',1);
		$this->db->where('email', $res);
		$this->db->or_where('matrimony_id',$res);	
		$query1=$this->db->get('profiles');  		
		$query=$query1->row();
		return $query;
  }


  function getCityByCountry($country){
    $sql = "SELECT st.state_id,st.state_name,ct.city_id,ct.city_name FROM states st LEFT JOIN cities ct on ct.state_id = st.state_id WHERE st.country_id = '".$country."' AND st.state_status = 1 order by st.state_name ASC";
    $result=$this->db->query($sql);
     
     if ($result->num_rows()) {
         return $result->result();
     } else{
        return false;
     }
  }
  function getCurrency(){

    $result=$this->db->get('currency');
     
     if ($result->num_rows()) {
         return $result->result();
     } else{
        return false;
     }
  }
} ?>