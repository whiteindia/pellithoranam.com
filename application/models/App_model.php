<?php
class App_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function checkLogin($email,$pass) {
    	/*$qry_1 = $this->db->where('email',$email)->where('password',md5($pass))->get('registration');
    	if($qry_1->num_rows() > 0) { return $qry_1->result(); } else { return false; }*/

      $chk_qry = $this->db->get_where('users',array('email' => $email, 'user_status' => 1));
      if ($chk_qry->num_rows() == 1) {
        $passwd = $this->encrypt->decode($chk_qry->row()->password);

        if($pass == $passwd) {
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
                return array("status"=> 1, "data" => $usr_qry->row());
                        } else { return array("status"=> 2, "data" => ""); } // Profile Not Approved
                      } else { return array("status"=> 7, "data" => ""); } // Profile Deactivated
                    } else { return array("status"=> 5, "data" => ""); } // Profile Deleted or Banned
                } else { return array("status"=> 6, "data" => ""); } // No Accounts Found
            } else {   return array("status"=> 3, "data" => ""); } // Ivalid Password 
        } else {  return array("status"=> 4, "data" => ""); } // Email not exist
      }


      public function insertRegistration($data) {
        $age = $this->CalcAge($data['DOB']);
        if($data['gender'] == "Male") { $pic = "img_3.JPG"; } else { $pic = "img_1.JPG"; }
        if(isset($data['sub_caste'])) { $subc = $data['sub_caste']; } else { $subc = 0; }
        if(isset($data['caste'])) { $cast = $data['caste']; } else { $cast = 0; }
        if(isset($data['country'])) { $cntry = $data['country']; } else { $cntry = 0; }
        if(isset($data['state'])) { $stat = $data['state']; } else { $stat = 0; }
        if(isset($data['city'])) { $city = $data['city']; } else { $city = 0; }

        $matr_id = $this->Home_model->GenerateUique();

        $td_date = date('Y-m-d H:i:s', time());
        $td_date1 = date('Y-m-d');

        $pass = $this->encrypt->encode($data['password']);
        $ins_arr_1 = array('email' => $data['email'],
         'password'=> $pass,
         'created_date' => $td_date,
         'modified_date'=> $td_date,
         'user_type' => 1,
         'user_status' => 1);
        $this->db->insert('users',$ins_arr_1);
        $insert_id = $this->db->insert_id();

        if($data['gender']=='Male' || $data['gender']=='male'){
          $gender='male';
        }else if($data['gender']=='Female' || $data['gender']=='female'){
          $gender='female';
        }

        $upd_arr_2 =  array('user_id' => $insert_id,
          'matrimony_id' =>$matr_id,
          'profile_for'  => "myself",
          'profile_name' => $data['name'],
          'gender' => $gender,
          'dob'    => $data['DOB'],
          'religion' => $data['religion'],
          'caste'    => $cast,
          'mother_language' => $data['mother_tongue'],
          'phone' => $data['phone'],
          'email' => $data['email'],
          'age' => $age,
          'maritial_status' => $data['maritial_status'],
          'willing_intercast'=>filter_var ($data['is_willing_for_intercaste'], FILTER_VALIDATE_BOOLEAN),
          'sub_caste'=> $subc,
          'country'=> $cntry,
          'state'=> $stat,
          'city'=> $city,
          'income' => $data['income'],
          'currency' =>$data['currency'],
          'height_id'=> $data['height'],
          'weight_id'=> 0,
          'body_type'=> 0,
          'complexion'=> 0,
          'physical_status'=> $data['physical_status'],
          'education_id'=> $data['education'],
          'occupation_id'=> $data['occupation'],
          'occupation_sector'=> $data['employed_in'],
          'eating'=> 0,
          'smoking'=> 0,
          'drinking'=> 0,
          'star_id'=> 0,
          'raasi_id'=> 0,
          'family_status'=> $data['family_status'],
          'family_type'=> $data['family_type'],
          'family_value'=> $data['family_value'],
          'about_you'=> $data['about_you'],
          'is_premium' => 0,
          'is_phone_verified' =>0,
          'profile_approval' => 1,
          'profile_status' => 1,
          'created_date' =>$td_date1,
                          'modified_date' =>$td_date1); // change verified and approval after admin

        if($this->db->insert('profiles',$upd_arr_2)) { 
          $insert_id = $this->db->insert_id();
          return $matr_id; 
        } else { return false; }
      }
      public function getMyCommunications($my_id,$from_field,$to_field,$table) {
        $res = array();
        $this->db->select("$to_field as exclude_matri");
        $this->db->distinct($to_field);
        $qry =$this->db->get_where($table,array($from_field => $my_id));
        if($qry->num_rows() > 0) {
           // return $qry->result();
         return array('status' =>'success');
       }else{
         return array('status' =>'failed');
       }
     }
     public function ChangeMobile($usr_id,$phone) {
      $upd_arr = array("phone" => $phone);
      $this->db->where('matrimony_id',$usr_id);
      $this->db->update('profiles',$upd_arr);
    }

    public function InsertOTP($usr_id,$mob,$otp){
      $phone = $mob;
      $td_date = date('Y-m-d H:i:s', time());
      $data['otp']=$otp;
      $data['otp_user']=$usr_id;
      $data['otp_mobile']=$phone;
      $data['otp_datetime']=$td_date;
      $result = $this->db->insert('otp_details', $data);
      return $result;
    }

    public function check_otp($auth,$mob,$otp){
     $phone = $mob;
     $usr_id = $this->getUser_from_Token($auth);
     $query = $this->db->where('otp_status','0');
     $query = $this->db->where('otp_user',$usr_id);
     $query = $this->db->where('otp',$otp);
     $query = $this->db->where('otp_mobile',$mob);
     $query = $this->db->get('otp_details');
     if ($query->num_rows() > 0){
       $query = $this->db->where('otp_status','0');
       $query = $this->db->where('otp_user',$usr_id);
       $query = $this->db->where('otp',$otp);
       $query = $this->db->where('otp_mobile',$mob);
       $data['otp_status'] = '1';
       $result = $this->db->update('otp_details',$data);
       $this->db->where('matrimony_id',$usr_id);
       $this->db->update('profiles',array('is_phone_verified' => 1));
       $status='1';
     } else {        
      $status='0';
    } 
    return $status;
  }



  public function checkAuthorization($tokn) {
    $qry_3 = $this->db->get_where('app_tokens', array('token_unique' => $tokn,'token_active' => 1));
    if($qry_3->num_rows() > 0) { return 1; } else { return false; }
  }

  public function insertAppsToken($usr_id,$uniqueId) {
   $ins_arr_2 = array("token_unique" => $uniqueId,"token_user" =>$usr_id,"token_active" =>1);
   $this->db->insert('app_tokens',$ins_arr_2);
 }

 public function insertShotlist($data,$usr_id) {
  $flgs = 0;
  foreach ($data['profiles'] as $each_usr) {
    $to_matr_id = $this->getMatrimonyId_from_ProfileID($each_usr);
    $qry_3 = $this->db->get_where('profile_shortlist', array('shot_lister' => $usr_id,
      'shot_listed' => $to_matr_id));
    if($qry_3->num_rows() == 0) {
      $ins_arr_3 = array('shot_lister' => $usr_id,'shot_listed' => $to_matr_id);
      $this->db->insert('profile_shortlist',$ins_arr_3);
      $flgs = 1;
    } else {
      if(count($data['profiles']) == 1) { return false; } else { $flgs = 1; }
    }
  }
  if($flgs == 1) { return true; }
}

public function insertPhotoRequest($data,$usr_id) {
  $flgsd = 0;
  foreach ($data['profiles'] as $each_usr) {
    $td_date = date('Y-m-d H:i:s', time());
    $to_matr_id = preg_replace("/[^0-9,.]/", "", $each_usr); 
           // $to_matr_id = $this->getMatrimonyId_from_ProfileID($each_usr);
    $qry_3 = $this->db->get_where('profile_photo_request', array('photo_request_from' => $usr_id,
      'photo_request_to' => $to_matr_id));
    if($qry_3->num_rows() == 0) {
      $ins_arr_4 = array('photo_request_from' => $usr_id,
       'photo_request_to' => $to_matr_id,
       'photo_request_datetime' => $td_date);
      $this->db->insert('profile_photo_request',$ins_arr_4);
      $insert_id = $this->db->insert_id();
      $this->insertHistory($insert_id,$usr_id,$to_matr_id,"PHOTO_REQUEST","");
      $flgsd = 1;
    } else { 
      if(count($data['profiles']) == 1) { return false; } else { $flgsd = 1; } 
    }
  }
  if($flgsd == 1) { return true; }
}

public function insertInterest($data,$usr_id) {
  $flg = 0;
  foreach ($data['profiles'] as $each_usr) {
    $td_date = date('Y-m-d H:i:s', time());
    $to_matr_id = $this->getMatrimonyId_from_ProfileID($each_usr);
    $qry_3 = $this->db->get_where('profile_interest', array('interest_from' => $usr_id,
      'interest_to' => $to_matr_id));
    if($qry_3->num_rows() == 0) {
      $ins_arr_4 = array('interest_from' => $usr_id,'interest_to' => $to_matr_id,'interest_datetime' => $td_date);
      $this->db->insert('profile_interest',$ins_arr_4);
      $insert_id = $this->db->insert_id();
      $this->insertHistory($insert_id,$usr_id,$to_matr_id,"INTEREST_SENT","");
      $flg = 1;
    } else { 
      if(count($data['profiles']) == 1) { return false; } else { $flg = 1; } 
    }
  }
  if($flg == 1) { return true; }
}

public function insertHistory($foreign,$usr_id,$int_to,$type,$msg) {
  $td_date = date('Y-m-d H:i:s', time());
  $ins_arr_3 = array("history_type"=>$type,
    "history_foreign" => $foreign,
    "history_from"=>$usr_id,
    "history_to"=>$int_to,
    "history_status"=> 0,
    "history_message"=>$msg,
    "history_datetime"=>$td_date);
  $insert_ids = $this->db->insert('history',$ins_arr_3);
  return true;
}

public function get_membership_details($usr) {
 $this->db->select('membership_details.*, packages.package_name,packages.month');
 $this->db->from('membership_details' );
 $this->db->join('packages', 'membership_details.membership_package = packages.id','left');     
 $query = $this->db->where('packages.package_status','1');
 $query = $this->db->where('membership_details.matrimony_id',$usr);     
 $query = $this->db->get();      
 $result = $query->row();
 return $result; 
}

public function AlterHistory($usr,$data) {
        if($data['type'] == 1) {           // INTEREST ACCEPT/DECLINE
          $this->db->where('history_type','INTEREST_SENT');
        } else {                          // PHOTO REQUEST ACCEPT/DECLINE
          $this->db->where('history_type','PHOTO_REQUEST');
        }
        $this->db->where('history_from', preg_replace("/[^0-9,.]/", "", $data['matrimony_id']));
        $this->db->where('history_to',$usr);
        $this->db->where('history_status',0);
        //print_r($data);
        $this->db->update('history', array('history_status'=>$data['status']));
      }

      public function get_settings_preferences($matr_id) {
        $qry=$this->db->get_where('settings_preferences',array('matrimony_id' => $matr_id));
        if($qry->num_rows() > 0) { return $qry->row(); } else { return false; }
      }

      public function updateSettingsPreferences($user,$arr) {
        $this->db->where('matrimony_id',$user);
        $this->db->update('settings_preferences',$arr);
      }

      public function delete_profile($delete_prof,$tokn) {
        $usr  = $this->getUserId_from_Token($tokn);
        $td_date = date('Y-m-d H:i:s', time());
        $ins_arr = array('user_id' => $usr,
         'delete_reason' =>$delete_prof['reason'],
         'delete_datetime' => $td_date);
        $this->db->insert('profile_delete',$ins_arr);
        $this->db->where('user_id', $usr);
        if($this->db->update("profiles",array("profile_status"=>2,"modified_date"=>$td_date)))
          return true;
      }

      public function deactivate_profile($data,$tokn) {
        $usr  = $this->getUserId_from_Token($tokn);
        $duration = $data['days'];
        $td_date = date('Y-m-d H:i:s', time());
        $expiry = date('Y-m-d', strtotime('+'.$duration.' days'));
        $ins_arr = array('user_id' => $usr,
         'duration' =>$data['days'],
         'deactvated_date' => $td_date,
         'expiry_date' => $expiry);
        $this->db->insert('profile_deactivate',$ins_arr);
        $this->db->where('user_id', $usr);
        if($this->db->update("profiles",array("profile_status"=>4,"modified_date"=>$td_date)))
          return true;
      }

    /*public function getUser($usr_id) {
    	$qry_2 = $this->db->where('id',$usr_id)->get('registration');
    	if($qry_2->num_rows() > 0) { return $qry_2->result(); } else { return false; }	
    }*/
    public function getUser($id,$whr){
      $this->db->select('*');
      $this->db->join('height', 'profiles.height_id = height.height_id','left');
      $this->db->join('weight', 'profiles.weight_id = weight.weight_id','left');
      $this->db->join('religions', 'profiles.religion = religions.religion_id','left');
      $this->db->join('castes', 'profiles.caste = castes.caste_id','left');
      $this->db->join('sub_castes', 'profiles.sub_caste = sub_castes.sub_caste_id','left');
      $this->db->join('stars', 'profiles.star_id = stars.star_id','left');
      $this->db->join('raasi', 'profiles.raasi_id = raasi.raasi_id','left');
      $this->db->join('country', 'profiles.country = country.country_id','left');
      $this->db->join('states', 'profiles.state = states.state_id','left');
      $this->db->join('cities', 'profiles.city = cities.city_id','left');
      $this->db->join('educations', 'profiles.education_id = educations.education_id','left');
      $this->db->join('occupations', 'profiles.occupation_id = occupations.occupation_id','left');
      $this->db->join('mother_tongues', 'profiles.mother_language = mother_tongues.mother_tongue_id','left');
      $this->db->join('hobbies', 'profiles.matrimony_id = hobbies.user_id','left');
        //$this->db->join('membership_details', 'profiles.matrimony_id = membership_details.matrimony_id','left');
      if(!empty($whr)) {
        foreach($whr as $row) {
          $this->db->where($row);          
        }
      }
      $this->db->where('profiles.matrimony_id', $id);
      $query = $this->db->get('profiles');
      $result = $query->result();         
      return $result;
    }
    public function getUser1($id,$whr){
      $this->db->select('profiles.*,height.*,weight.*,religions.*,castes.*,sub_castes.*,stars.*,
        raasi.*,country.*,gcountry.country_name as citizenship_name,states.*,cities.*,educations.*,
        occupations.*,mother_tongues.*,hobbies.hobbies,music,sports,languages as spoken_language,
        preferences.age_from as p_age_from,preferences.age_to as p_age_to,preferences.height_from_id as p_height_from_id,
        preferences.height_to_id as p_height_to_id,preferences.maritial_status as p_maritial_status,
        preferences.physical_status as p_physical_status,preferences.eating_habit as p_eating_habit,preferences.smoking_habit as p_smoking_habit,preferences.drinking_habit as p_drinking_habit,
        preferences.religion as p_religion,preferences.caste as p_caste,preferences.mother_language as p_mother_language,preferences.star as p_star,
        preferences.country as p_country,preferences.state as p_state,preferences.city as p_city,preferences.education as p_education,
        preferences.occupation as p_occupation,preferences.max_income as p_m_income,preferences.min_income as p_income,preferences.about_partner as p_about_partner,preferences.preference_date,
        preferences.subcaste as p_subcaste,preferences.body_type as p_body_type,preferences.complexion as p_complexion,preferences.raasi as p_raasi,preferences.dosham as p_dosham,
        preferences.weight_from as p_weight_from,preferences.weight_to as p_weight_to,minheight.height as min_height,
        maxheight.height as max_height,minweight.weight as min_weight,maxweight.weight as max_weight,p_tongues.mother_tongue_name as p_mtongue,
        p_religions.religion_name as p_religion_name,p_castes.caste_name as p_caste_name,p_sub_castes.sub_caste_name as p_sub_caste_name,
        p_stars.star_name as p_star_name,p_raasi.raasi_name as p_raasi_name,p_educations.education as p_education,
        p_occupations.occupation as p_occupation,p_citizenship.country_name as citizenship,p_country.country_name as p_country_name,
        p_states.state_name as p_state_name,p_cities.city_name as p_city_name
        ');
      $this->db->join('preferences', 'profiles.matrimony_id = preferences.profile_id','left');
      $this->db->join('height', 'profiles.height_id = height.height_id','left');
      $this->db->join('height as minheight', 'preferences.height_from_id = minheight.height_id','left');
      $this->db->join('height as maxheight', 'preferences.height_to_id = maxheight.height_id','left');
      $this->db->join('weight as minweight', 'preferences.weight_from = minweight.weight_id','left');
      $this->db->join('weight as maxweight', 'preferences.weight_to = maxweight.weight_id','left');
      $this->db->join('weight', 'profiles.weight_id = weight.weight_id','left');
      $this->db->join('religions', 'profiles.religion = religions.religion_id','left');
      $this->db->join('religions as p_religions', 'preferences.religion = p_religions.religion_id','left');
      $this->db->join('castes', 'profiles.caste = castes.caste_id','left');
      $this->db->join('castes p_castes', 'preferences.caste = p_castes.caste_id','left');
      $this->db->join('sub_castes', 'profiles.sub_caste = sub_castes.sub_caste_id','left');
      $this->db->join('sub_castes as p_sub_castes', 'preferences.subcaste = p_sub_castes.sub_caste_id','left');
      $this->db->join('stars', 'profiles.star_id = stars.star_id','left');
      $this->db->join('stars as p_stars', 'preferences.star = p_stars.star_id','left');
      $this->db->join('raasi', 'profiles.raasi_id = raasi.raasi_id','left');
      $this->db->join('raasi as p_raasi', 'preferences.raasi = p_raasi.raasi_id','left');
      $this->db->join('country', 'profiles.country = country.country_id','left');
      $this->db->join('country as p_country', 'preferences.country = p_country.country_id','left');
      $this->db->join('country as p_citizenship', 'preferences.citizenship = p_citizenship.country_id','left');
      $this->db->join('country as gcountry', 'profiles.citizenship = gcountry.country_id','left');
      $this->db->join('states', 'profiles.state = states.state_id','left');
      $this->db->join('states as p_states', 'preferences.state = p_states.state_id','left');
      $this->db->join('cities', 'profiles.city = cities.city_id','left');
      $this->db->join('cities as p_cities', 'preferences.city = p_cities.city_id','left');
      $this->db->join('educations', 'profiles.education_id = educations.education_id','left');
      $this->db->join('educations as p_educations', 'preferences.education = p_educations.education_id','left');
      $this->db->join('occupations', 'profiles.occupation_id = occupations.occupation_id','left');
      $this->db->join('occupations as p_occupations', 'preferences.occupation = p_occupations.occupation_id','left');
      $this->db->join('mother_tongues', 'profiles.mother_language = mother_tongues.mother_tongue_id','left');
      $this->db->join('mother_tongues as p_tongues', 'preferences.mother_language = p_tongues.mother_tongue_id','left');
      $this->db->join('hobbies', 'profiles.matrimony_id = hobbies.user_id','left');
      
      if(!empty($whr)) {
        foreach($whr as $row) {
          $this->db->where($row);          
        }
      }
      $this->db->where('matrimony_id', $id);
      $query = $this->db->get('profiles');
      $result = $query->result();         
      return $result;
    }


    public function getUser_from_Token($tokn) {
      $qry_7 = $this->db->get_where('app_tokens', array('token_unique' => $tokn,'token_active' => 1));
      if($qry_7->num_rows() > 0) { return $qry_7->result()[0]->token_user; } else { return false; }
    }

    public function getGender_from_Matri($matr_id) {
     $qry_7 = $this->db->get_where('profiles', array('matrimony_id' => $matr_id));
     if($qry_7->num_rows() > 0) { return $qry_7->row()->gender; } else { return false; }
   }

   public function getUserId_from_Token($tokn) {
    $this->db->join('profiles','app_tokens.token_user = profiles.matrimony_id','left');
    $qry_7 = $this->db->get_where('app_tokens', array('token_unique' => $tokn,'token_active' => 1));
    if($qry_7->num_rows() > 0) { return $qry_7->row()->user_id; } else { return false; }
  }

  public function getMatrimonyId_from_ProfileID($prof_id) {
    $qry_7 = $this->db->get_where('profiles', array('profile_id' => $prof_id));
    if($qry_7->num_rows() > 0) { return $qry_7->row()->matrimony_id; } else { return false; }
  }

  public function getUser_from_MatrimonyId($matr_id) {
    $qry_8 = $this->db->get_where('profiles', array('matrimony_id' => $matr_id));
    if($qry_8->num_rows() > 0) { return $qry_8->result()[0]; } else { return false; }
  }

  public function getMatches($auth,$qry) {
    if($qry != "") {
      
    }
    $matr_id = $this->getUser_from_Token($auth);
    $profile = $this->getUser_from_MatrimonyId($matr_id);
    $where = "";

    if($profile->gender == "male") { $where.= "profiles.gender = 'female' AND "; } 
    else { $where.= "gender = 'male' AND "; }
    $where.= "religion = '".$profile->religion."' AND ";
    $where.= "caste = '".$profile->caste."' AND "; 
    $where.= "profile_status = '1'";                

    $qry_4 = $this->db->query("SELECT * FROM profiles 
      LEFT JOIN height ON profiles.height_id = height.height
      LEFT JOIN country ON profiles.country = country.country_id
      LEFT JOIN states ON profiles.state = states.state_id
      LEFT JOIN cities ON profiles.city = cities.city_id
      LEFT JOIN educations ON profiles.education_id = educations.education_id
      LEFT JOIN occupations ON profiles.occupation_id = occupations.occupation_id
      WHERE ".$where.""." AND profile_status ='1' AND is_phone_verified ='1' AND profile_approval='1' ");
    if($qry_4->num_rows() > 0) { return $qry_4->result(); } else { return false; }
  }

  public function getShortList($auth_tokn,$qry,$im,$whom) {
    $arr_1 = array();
    $arr_2 = array();
    $whr = "";
    $mat_id = $this->getUser_from_Token($auth_tokn);
    if($qry != "") {
      $whr = "(profile_name LIKE '%".$qry."%' OR email LIKE '%".$qry."%') AND profile_status ='1' AND is_phone_verified ='1' AND profile_approval='1'";
               /* $whr[] = "profiles.is_phone_verified = '1'";
                $whr[] = "profiles.profile_approval = '1'";
                $whr[] = "profiles.profile_status = '1'";*/
              }
              $qry_6 = $this->db->query("SELECT * FROM profile_shortlist 
                LEFT JOIN profiles ON profile_shortlist.".$whom." = profiles.matrimony_id 
                LEFT JOIN height ON profiles.height_id = height.height
                LEFT JOIN country ON profiles.country = country.country_id
                LEFT JOIN states ON profiles.state = states.state_id
                LEFT JOIN cities ON profiles.city = cities.city_id
                LEFT JOIN educations ON profiles.education_id = educations.education_id
                LEFT JOIN occupations ON profiles.occupation_id = occupations.occupation_id
                WHERE ".$whr." profile_shortlist.".$im." = ".$mat_id." AND profile_status ='1' AND is_phone_verified ='1' AND profile_approval='1' ");

              if($qry_6->num_rows() > 0) { $arr_2[] = $qry_6->result(); } else { return false; }  
              return $arr_2[0];
            }

            public function getRecentView($auth_tokn,$qry,$im,$whom) {
              $arr_1 = array();
              $arr_2 = array();
              $whr = "";
              $mat_id = $this->getUser_from_Token($auth_tokn);

              if($qry != "") {
                $whr = "(profile_name LIKE '%".$qry."%' OR email LIKE '%".$qry."%') AND profile_status ='1' AND is_phone_verified ='1' AND profile_approval='1'" ;
              }
              $qry_6 = $this->db->query("SELECT * FROM profile_recent 
                LEFT JOIN profiles ON profile_recent.".$whom." = profiles.matrimony_id 
                LEFT JOIN height ON profiles.height_id = height.height
                LEFT JOIN country ON profiles.country = country.country_id
                LEFT JOIN states ON profiles.state = states.state_id
                LEFT JOIN cities ON profiles.city = cities.city_id
                LEFT JOIN educations ON profiles.education_id = educations.education_id
                LEFT JOIN occupations ON profiles.occupation_id = occupations.occupation_id
                WHERE ".$whr." profile_recent.".$im." = ".$mat_id ." AND profile_status ='1' AND is_phone_verified ='1' AND profile_approval='1'");

              if($qry_6->num_rows() > 0) { $arr_2[] = $qry_6->result(); } else { return false; }  
              return $arr_2[0];
            }

            public function getProfile($auth,$usr_id) {
              if($usr_id == "") { 
                $usr_id = $this->getUser_from_Token($auth); 
              } else {
                $my_id = $this->getUser_from_Token($auth);
                $qry = $this->db->get_where('profile_recent',array('viewer' => $my_id,'viewed' =>$usr_id));

                $num_results = $qry->num_rows();
                if($num_results == 0) {
                  if($my_id != $usr_id) {
                    $ins_arr_4 = array('viewer'=> $my_id, 'viewed'=>$usr_id);
                    $this->db->insert('profile_recent',$ins_arr_4);
                  }
                }
              }
              $qry_9 = $this->getUser($usr_id,"");
              return $qry_9;
            }

            public function getNearByMatches($auth_tokn,$qry) {
              $arr_2 = array();
              $whr = "";
              $mat_id = $this->getUser_from_Token($auth_tokn);
              $details = $this->getUser_from_MatrimonyId($mat_id);
              if($details->gender == "male") { $gndr= "female"; } else { $gndr= "male"; }
              $whr.= "profiles.gender ='".$gndr."' AND profiles.profile_status='1' AND profiles.religion =".$details->religion." AND profiles.city =".$details->city."";

              if($qry != "") { $whr.= "(profile_name LIKE '%".$qry."%' OR email LIKE '%".$qry."%') AND"; }
              $qry_6 = $this->db->query("SELECT * FROM profiles 
                LEFT JOIN height ON profiles.height_id = height.height
                LEFT JOIN country ON profiles.country = country.country_id
                LEFT JOIN states ON profiles.state = states.state_id
                LEFT JOIN cities ON profiles.city = cities.city_id
                LEFT JOIN educations ON profiles.education_id = educations.education_id
                LEFT JOIN occupations ON profiles.occupation_id = occupations.occupation_id
                WHERE ".$whr.""." AND profile_status ='1' AND is_phone_verified ='1' AND profile_approval='1' ");

              if($qry_6->num_rows() > 0) { $arr_2[] = $qry_6->result(); } else { return false; }  
              return $arr_2[0];
            }

            public function getPackages() {
              $qry_19 = $this->db->get_where('packages', array('id !=' => 1,'package_status' => 1));
     // echo $this->db->last_query();//$qry_19->num_rows();
              if($qry_19->num_rows() > 0) { return $qry_19->result(); } else { return false; }
            }

            public function getParish($city_id) {
              $qry_9 = $this->db->get_where('parish', array('city_id'=> $city_id,'parish_status' => 1));
              if($qry_9->num_rows() > 0) { return $qry_9->result(); } else { return false; }
            }

            public function updateProfilePic($auth,$data) {
              $result = $this->db->insert('profile_pic_verification', $data);  
              return $result;
            }

            public function insertGalleryPics($data) {
              $result = $this->db->insert('pic_gallery', $data);  
              return $result;
            }

            public function getGallery($matr_id) {
              $qry_9 = $this->db->get_where('pic_gallery', array('user_id' => $matr_id,'pic_approval' => 1));
              if($qry_9->num_rows() > 0) { return $qry_9->result(); } else { return false; }
            }

            public function insertVerified($auth) {
              $usr_id = $this->getUser_from_Token($auth);
              $upd_arr = array("is_phone_verified" => 1);
              $this->db->where('id',$usr_id);
              $this->db->update('registration',$upd_arr);
            }

            public function getLastMatrimonyId() {
              $qry_9 = $this->db->select('profile_id')
              ->order_by('id','desc')
              ->limit(1)
              ->get('registration');
              if($qry_9->num_rows() > 0) { return $qry_9->result(); } else { return false; }
            }

            public function getMyProfileViews($auth) {
              $usr_id = $this->getUser_from_Token($auth);
              $qry_9 = $this->db->join('profiles', 'profile_recent.viewed = profiles.matrimony_id')
              ->where('profile_recent.viewed', $usr_id)
              ->get('profile_recent');
              if($qry_9->num_rows() > 0) { return $qry_9->result(); } else { return false; }
            }

            public function getShortListedMe($auth) {
              $usr_id = $this->getUser_from_Token($auth);
              $qry_9 = $this->db->join('profiles', 'profile_shortlist.shot_listed = profiles.matrimony_id')
              ->where('profile_shortlist.shot_listed', $usr_id)
              ->get('profile_shortlist');
              if($qry_9->num_rows() > 0) { return $qry_9->result(); } else { return false; }
            }

            public function getTable($select,$where,$tbl_name) {
              if($select != "") { $this->db->select($select); }
              if($where != "") { foreach($where as $row) {
                $this->db->where($row);
              }}
              $qry_5 = $this->db->get($tbl_name);
              if($qry_5->num_rows() > 0){ return $qry_5->result(); } else { return false; }
            }

            public function CalcAge($dob) {
              $now = new DateTime();
              $age = $now->diff(new DateTime($dob));
              return $age->format('%Y');
            }
            /* Employee Id: TW-130 :::::::Start::::::::   */
            public function profile_update($data,$usr_id){
             
              $this->db->where('matrimony_id',$usr_id);
              $result = $this->db->update('profiles',$data);
              if($result){
               return "success";
             }
           }
           public function hobby_update($data,$usr_id){
            
            if(isset($data['hobbies']) and !empty($data['hobbies'])) {
              $array = $data['hobbies'];
              $comma_separated = implode(",", $array);
              $data['hobbies'] = $comma_separated;
            }else{
              $data['hobbies'] = "";
            }
            if(isset($data['music']) and !empty($data['music'])) {
              $array = $data['music'];
              $comma_separated = implode(",", $array);
              $data['music'] = $comma_separated;
            }else{
              $data['music'] = "";
            }
            if(isset($data['sports']) and !empty($data['sports'])) {
              $array = $data['sports'];
              $comma_separated = implode(",", $array);
              $data['sports'] = $comma_separated;
            }else{
              $data['sports'] = "";
            }
            if(isset($data['languages']) and !empty($data['languages'])) {
              $array = $data['languages'];
              $comma_separated = implode(",", $array);
              $data['languages'] = $comma_separated;
            }else{
              $data['languages'] = "";
            }
            
            $data['user_id'] = $usr_id;			
            $this->db->where('user_id',$data['user_id']);
            $query = $this->db->get('hobbies');
            $result = $query->result();
            if($result){
              if($this->db->where('user_id',$data['user_id'])){		
               $result = $this->db->update('hobbies',$data);
               if($result){
                return "success";
              }       
            }
          }else{		
            $result = $this->db->insert('hobbies',$data);
            if($result){
             return "success";
           }			
         } 
       }
       public function preferences($data,$user_id){
        $inside_data = $data['preferences'];
		//print_r($inside_data['maritial_status'] );die;
        $inside_data['profile_id'] = $user_id;
		//$array =array();
        if(isset($inside_data['maritial_status']) and !empty($inside_data['maritial_status'])) {	
          $array1[] = $inside_data['maritial_status'];
          $comma_separated = implode(",", $array1);
          $inside_data['maritial_status'] = $comma_separated;
        }
        if(isset($inside_data['eating_habit']) and !empty($inside_data['eating_habit'])) {
          $array2[] = $inside_data['eating_habit'];
          $comma_separated = implode(",", $array2);
          $inside_data['eating_habit'] = $comma_separated;
        }
        if(isset($inside_data['smoking_habit']) and !empty($inside_data['smoking_habit'])) {
          $array3[] = $inside_data['smoking_habit'];
          $comma_separated = implode(",", $array3);
          $inside_data['smoking_habit'] = $comma_separated;
        }
        if(isset($inside_data['drinking_habit']) and !empty($inside_data['drinking_habit'])) {
          $array4[] = $inside_data['drinking_habit'];
          $comma_separated = implode(",", $array4);
          $inside_data['drinking_habit'] = $comma_separated;
        }
        if(isset($inside_data['country']) and !empty($inside_data['country'])) {
          $array5[] = $inside_data['country'];
          $comma_separated = implode(",", $array5);
          $inside_data['country'] = $comma_separated;
        }
        if(isset($inside_data['state']) and !empty($inside_data['state'])) {
          $array6[] = $inside_data['state'];
          $comma_separated = implode(",", $array6);
          $inside_data['state'] = $comma_separated;
        }
        if(isset($inside_data['city']) and !empty($inside_data['city'])) {
          $array7[] = $inside_data['city'];
          $comma_separated = implode(",", $array7);
          $inside_data['city'] = $comma_separated;
        }
        if(isset($inside_data['education']) and !empty($inside_data['education'])) {
          $array8[] = $inside_data['education'];
          $comma_separated = implode(",", $array8);
          $inside_data['education'] = $comma_separated;
        }
        if(isset($inside_data['occupation']) and !empty($inside_data['occupation'])) {
          $array9[] = $inside_data['occupation'];
          $comma_separated = implode(",", $array9);
          $inside_data['occupation'] = $comma_separated;
        }
        if(isset($inside_data['religion']) and !empty($inside_data['religion'])) {
          $array10[] = $inside_data['religion'];
          $comma_separated = implode(",", $array10);
          $inside_data['religion'] = $comma_separated;
        }
        if(isset($inside_data['caste']) and !empty($inside_data['caste'])) {
          $array11[] = $inside_data['caste'];
          $comma_separated = implode(",", $array11);
          $inside_data['caste'] = $comma_separated;
        }
        if(isset($inside_data['subcaste']) and !empty($inside_data['subcaste'])) {
          $array12[] = $inside_data['subcaste'];
          $comma_separated = implode(",", $array12);
          $inside_data['subcaste'] = $comma_separated;
        }
        if(isset($inside_data['star']) and !empty($inside_data['star'])) {
          $array13[] = $inside_data['star'];
          $comma_separated = implode(",", $array13);
          $inside_data['star'] = $comma_separated;
        }
        if(isset($inside_data['rasi']) and !empty($inside_data['rasi'])) {
          $array14[] = $inside_data['rasi'];
          $comma_separated = implode(",", $array14);
          $inside_data['rasi'] = $comma_separated;
        }
        if(isset($inside_data['dosham']) and !empty($inside_data['dosham'])) {
          $array15[] = $inside_data['dosham'];
          $comma_separated = implode(",", $array15);
          $inside_data['dosham'] = $comma_separated;
        }
//	print_r($inside_data );die;
        $this->db->where('profile_id',$user_id);
        $query = $this->db->get('preferences');
        $result = $query->result();
        if($result){
          $this->db->where('profile_id',$user_id);
          if($this->db->update('preferences',$inside_data)){
            return "success";
          }
        }else{
         if($this->db->insert('preferences',$inside_data)){
          return "success";
        }
      }
      
    }
    public function success_stories_list($data){
      $date = new DateTime();
      $data['date'] = $date->getTimestamp();		
      $this->db->where("success_id",$data['id']);
      $this->db->where("matrimony_id",$data['matrimony_id']);
      $query = $this->db->get("success_story");
      $result = $query->result();
      if($result){
       unset($data['id']);
       if($this->db->update("success_story",$data)){
        return "success";
      }
    }else{
     
     unset($data['id']);
     if($this->db->insert("success_story",$data)){
      return "success";
    }
  }
  
}

public function get_all_success_stories(){
  $query = $this->db->get("success_story");
  $result = $query->result();
  return $result;
}
public function get_single_success_stories($data){
	
  $this->db->where("success_id",$data);
  $query = $this->db->get("success_story");
  $result = $query->row();
  return $result;
}
public function send_mail($data){
  $td_date = date('Y-m-d H:i:s', time());
  $data1['mail_from']=$data['mail_from'];
  $data1['mail_to']= preg_replace("/[^0-9,.]/", "", $data['matrimony_id']);
  $data1['mail_content']=$data['message'];
  $data1['mail_datetime']= $td_date;
  if($this->db->insert('profile_mails',$data1)){
    $insert_id = $this->db->insert_id();
    $this->insertHistory($insert_id,$data1['mail_from'],$data1['mail_to'],"MESSAGE_SENT",$data1['mail_content']);
    return "success";
  }
}
public function edit_email($data,$id){
  
  $this->db->where('matrimony_id',$id);
  $result = $this->db->update('profiles',$data);		
  if($result){
   $this->db->where('matrimony_id',$id);
   $query = $this->db->get('profiles');
   $result2 =$query ->row();
   
   if($result2){
     $this->db->where('user_id',$result2->user_id);
     $result3 = $this->db->update('users',$data);
     if($result3){
       return "success";
     }
   }
 }
}
public function  save_search($data,$usr_id){
        //var_dump($data);die();
             //$sess=$this->session->userdata('logged_in');
  $data1['matrimony_id']=$usr_id;
  if(isset($data['education'])){
    $education =  $data['education'];
    $data1['educs'] =$education;
  } if(isset($data['state'])){
    $state =  $data['state'];
    $data1['state'] =$state;
  } if(isset($data['country'])){
    $country =  $data['country'];
    $data1['country'] =$country;
  }if(isset($data['caste'])){
    $caste =  $data['caste'];
    $data1['caste'] = $caste;
  }if(isset($data['city'])){
    $city =  $data['city'];
    $data1['city'] = $city;
  }if(isset($data['min_age'])){
    $min_age =  $data['min_age'];
    $data1['age_from'] = $min_age;
  }if(isset($data['max_age'])){
    $max_age =  $data['max_age'];
    $data1['age_to'] = $max_age;
  }if(isset($data['min_height'])){
    $min_height =  $data['min_height'];
    $data1['height_from'] = $min_height;
  }if(isset($data['max_height'])){
    $max_height =  $data['max_height'];
    $data1['height_to'] = $max_height;
  }
  if(isset($data['mother_tongue'])){
    $mother =  $data['mother_tongue'];
    $data1['mother'] =$mother;
  }if(isset($data['religion'])){
    $religion =  $data['religion'];
    $data1['religion'] =$religion;
  }if(isset($data['maritial_status'])){
    $mart =  $data['maritial_status'];
    $data1['mart'] =$mart;
  }if(isset($data['occupation'])){
    $occupa =  $data['occupation'];
    $data1['occupa'] =$occupa;
  }if(isset($data['query'])){
    $query =  $data['query'];
    $data1['query'] =$query;
  }if(isset($data['save_search_name'])){
    $save_search_name =  $data['save_search_name'];
    $data1['save_search_name'] =$save_search_name;
  }
  $result = $this->db->insert('save_search', $data1);
  return $result;
}
public function save_search_list($usr_id){
 $this->db->where('matrimony_id',$usr_id);
 $query = $this->db->get('save_search');
 $save_search = $query->result();
 $ret_arr=array();
 foreach($save_search as $search) {  
  $ret_arr[] = array("save_search_name"=> $search->save_search_name,
   "maritial_status" => $search->mart,
   "religion" => $search->religion,
   "mother_tongue" => $search->mother,
   "caste" => $search->caste,
   "country"=> $search->country,
   "state"=> $search->state,
   "city"=> $search->city,
   "education"=> $search->educs,
   "occupation"=> $search->occupa,
   "query"=> $search->query,
   "min_age"=> $search->age_from,
   "max_age"=> $search->age_to,
   "min_height"=> $search->height_from,
   "max_height"=> $search->height_to);
}
return $ret_arr;
}

public function change_password($data,$id){
  $data['password'] =$this->encrypt->encode($data['new_password']);
  if($data['new_password'] == $data['confirm_new_password']) {
    $check_password = $this->encrypt->encode($data['current_password']);
    $this->db->where('password',$check_password);
    unset($data['new_password']);
    unset($data['confirm_new_password']);	
    unset($data['current_password']);		
    $result = $this->db->update('users',$data);
    if($result){
     return "success";
   }			
 }
}
/*  :::::::End::::::::  Employee Id: TW-130 */
}
?>