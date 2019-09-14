<?php
class Profile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_profile_details($id,$whr){
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
        $this->db->join('employed_in', 'profiles.employed_in = employed_in.id','left');
        $this->db->join('cities', 'profiles.city = cities.city_id','left');
        $this->db->join('educations', 'profiles.education_id = educations.education_id','left');
        $this->db->join('occupations', 'profiles.occupation_id = occupations.occupation_id','left');
        $this->db->join('mother_tongues', 'profiles.mother_language = mother_tongues.mother_tongue_id','left');
        $this->db->join('active_members', 'active_members.user_id = profiles.matrimony_id','left');
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

    public function get_membership_details($matr_id) {
        $qry=$this->db->get_where('membership_details',array('matrimony_id' => $matr_id));
        if($qry->num_rows() > 0) { return $qry->row(); } else { return false; }
    }

    public function get_settings_preferences($matr_id) {
      $qry=$this->db->get_where('settings_preferences',array('matrimony_id' => $matr_id));
      if($qry->num_rows() > 0) { return $qry->row(); } else { return false; }
    }

    public function update_age() {
      $result =array();
      $td_date = date('Y-m-d');
      $qry=$this->db->query("SELECT profile_id,dob FROM profiles WHERE MONTH(dob) = MONTH(NOW()) AND DAY(dob) = DAY(NOW())");
      if($qry->num_rows() > 0) { $result = $qry->result(); } else { return false; }
      if(!empty($result)) {
        foreach($result as $profiles) {
          $now = new DateTime();
          $age = $now->diff(new DateTime($profiles->dob));
          $my_age = $age->format('%Y');
          $this->db->where('profile_id',$profiles->profile_id);
          $this->db->update('profiles',array("age" => $my_age));
        }
      }
    }
   public function employed_in(){
     $query = $this->db->where('employed_status','1');
     $query = $this->db->get('employed_in');
     $result = $query->result();
     return $result;
  }
    public function get_gallery_details($matr_id) {
        $this->db->where('pict_status',1);
        $this->db->where('pic_approval',1);
        $this->db->where('user_id',$matr_id);
        $query=$this->db->get('pic_gallery');
        $result = $query->result();         
        return $result;
    }
        public function get_photo_request($my_matr_id,$matr_id) {
        $this->db->where('photo_request_from',$my_matr_id);
        $this->db->where('photo_request_to',$matr_id);  
        $this->db->where('photo_request_status','1');      
        $query=$this->db->get('profile_photo_request');
        $result = $query->row();         
        return $result;
    }
    public function get_gallery_details1($matr_id) {
        $this->db->select('pic_gallery.*, profiles.profile_preference');
        $this->db->from('pic_gallery' );
        $this->db->join('profiles', 'profiles.matrimony_id= pic_gallery.user_id','left');
        $this->db->where('pic_gallery.pict_status',1);
        $this->db->where('pic_gallery.pic_approval',1);
        $this->db->where('pic_gallery.user_id',$matr_id);
        $this->db->order_by('pic_gallery.date_time','desc');
        $query=$this->db->get();
        $result = $query->result();         
        return $result;
       
    }
        public function get_settings_details($matr_id) {
        $this->db->where('profilevisibility_preference',1);
       // $this->db->where('matrimony_id',$matr_id);
        $query=$this->db->get('settings_preferences');
        $result = $query->result();         
        return $result;      
    }
        public function get_photo_privacy($mat_id) {
        $this->db->where('matrimony_id',$mat_id);
        $query=$this->db->get('profiles');
        $result = $query->row();         
        return $result;      
    }
    public function get_partner_preference($id,$whr) {
        $this->db->select('*');
        $this->db->join('mother_tongues', 'preferences.mother_language = mother_tongues.mother_tongue_id','left');
        $this->db->join('religions', 'preferences.religion = religions.religion_id','left');
        if(!empty($whr)) {
            foreach($whr as $row) {
                $this->db->where($row);          
            }
        }
        $this->db->where('profile_id', $id);
        $query = $this->db->get('preferences');
        $result = $query->row();         
        return $result;
    }
  public function get_partner_preference1($id,$whr) {
        $this->db->select('*');   
        $this->db->join('mother_tongues', 'preferences.mother_language = mother_tongues.mother_tongue_id','left');
        $this->db->join('religions', 'preferences.religion = religions.religion_id','left');
        if(!empty($whr)) {
            foreach($whr as $row) {
                $this->db->where($row);          
            }
        }
        $this->db->where('profile_id', $id);
        $query = $this->db->get('preferences');
        $result = $query->row();         
        return $result;
    }
    public function getDailyRecommendation($matr_id) {
        $qry_7 = $this->db->get_where('profiles', array('matrimony_id' => $matr_id));
        if($qry_7->num_rows() > 0) { $basic = $qry_7->row(); } else { return false; }

        if($basic->gender== "male") { 
          $where[]= "profiles.gender = 'female'";
        } else { 
          $where[]= "gender = 'male'"; 
        }

        if($basic->willing_intercast != 1) { 
          $where[] = "profiles.caste = '".$basic->caste."'";
        }
          $where[]  = "profiles.religion = '".$basic->religion."'";

        if(!empty($where)) {
            foreach($where as $row) {
                $this->db->where($row);          
            }
        }

        $qry_8 = $this->db->select('matrimony_id')->limit(1)->order_by('rand()')->get('profiles');
        if($qry_8->num_rows() > 0) { return $qry_8->row(); } else { return false; }
    }

    public function insertRecents($my_matr_id,$matr_id) {
        $td_date = date('Y-m-d H:i:s', time());
        $qry = $this->db->get_where('profile_recent',array('viewer' => $my_matr_id,'viewed' =>$matr_id));
            if($qry->num_rows() == 0) {
                if($my_matr_id != $matr_id) {
                    $ins_arr1 = array('viewer'=> $my_matr_id, 'viewed'=>$matr_id,'view_datetime'=>$td_date);
                    if($matr_id != 0) { $this->db->insert('profile_recent',$ins_arr1); }
                }
            }
    }

    public function checkShortlisted($my_matr_id,$matr_id) {
        $qry=$this->db->get_where('profile_shortlist',array('shot_lister' => $my_matr_id,'shot_listed' =>$matr_id));
        //echo $this->db->last_query();
        if($qry->num_rows() == 0) { return 0; } else { return 1; }
    }

    public function mycheckShortlisted($my_matr_id) {
        $qry=$this->db->get_where('profile_shortlist',array('shot_lister' => $my_matr_id));
        //echo $this->db->last_query();
        if($qry->num_rows() == 0) { return 0; } else { return $qry->result(); }
    }

    public function checkInterested($my_matr_id,$matr_id) {
        $qry=$this->db->get_where('profile_interest',array('interest_from' => $my_matr_id,'interest_to' =>$matr_id));
        if($qry->num_rows() == 0) { return 0; } else { return 1; }
    }

    public function insert_profile_pic($data) {
       
        //$data['user_id']=$userid;
         $result = $this->db->insert('profile_pic_verification', $data); 
         //$this->db->where('user_id',$usr_id);
       /*  $this->db->update('profiles',array("profile_photo" => $data['pic_location'])); */    
         return $result;
    }

    public function update_profile_pic($data,$mat_id) {
         $this->db->where('matrimony_id',$mat_id);
         $this->db->update('profiles',array("profile_photo" => $data));     
         return $result;
    }
   public function set_privacy($data, $mat_id){
     
     $this->db->where('matrimony_id',$mat_id);
     $result = $this->db->update('profiles',$data);
     return $result;     
   }
  public function save_gallery($data) {
     $result = $this->db->insert('pic_gallery', $data); 
     
     if($result) {
         return "Success";
     }
     else {
         return "Error";
     }
}

  public function save_badge($data) {
     $result = $this->db->insert('badge', $data); 
     
     if($result) {
         return "Success";
     }
     else {
         return "Error";
     }
}

    public function  add_hobbies($data){
              $my_matr_id = $this->session->userdata('logged_in');
             
                $query = $this->db->where('user_id',$my_matr_id->matrimony_id);
                $query = $this->db->get('hobbies');
                 if ($query->num_rows() > 0){

              $data['user_id']=$my_matr_id->matrimony_id;  
              $hobbies =  isset($data['hobbies'])?$data['hobbies']:array();
              $data['hobbies'] = implode(", ", $hobbies);
              $music =  isset($data['music'])?$data['music']:array();
              $data['music'] = implode(", ", $music);
              $sports =  isset($data['sports'])?$data['sports']:array();
              $data['sports'] = implode(", ", $sports);
              $languages =  isset($data['languages'])?$data['languages']:array();
              $data['languages'] = implode(", ", $languages);   
                  $this->db->where('user_id',$my_matr_id->matrimony_id);
                 $this->db->update('hobbies',$data); 
                 }else{

                  //print_r($data);

              $data['user_id']=$my_matr_id->matrimony_id;  
              $hobbies =  isset($data['hobbies'])?$data['hobbies']:array();
              $data['hobbies'] = implode(", ", $hobbies);
              $music =  isset($data['music'])?$data['music']:array();
              $data['music'] = implode(", ", $music);
              $sports =  isset($data['sports'])?$data['sports']:array();
              $data['sports'] = implode(", ", $sports);
              $languages =  isset($data['languages'])?$data['languages']:array();
              $data['languages'] = implode(", ", $languages);
              $result = $this->db->insert('hobbies', $data);
          }
            //  return $result;
     }

    public function  add_mobileview($data){
              $my_matr_id = $this->session->userdata('logged_in');
             
                $query = $this->db->where('mobileview_from',$data['mobileview_from']);
                $query = $this->db->where('mobileview_to',$data['mobileview_to']); 
                $query = $this->db->get('mobile_view'); 
                 if ($query->num_rows() > 0){

             return true;
                 }else{
              $data['mobileview_from']=$data['mobileview_from'];
              $data['mobileview_to']=$data['mobileview_to'];
              $data['mobileview_datetime'] = date('Y-m-d H:i:s', time());
              $result = $this->db->insert('mobile_view', $data);
          }
            //  return $result;
     }

function hobbies_details($user_id){
               
                $my_matr_id = $this->session->userdata('logged_in');
                $query = $this->db->where('user_id',$user_id);
                $query = $this->db->get('hobbies');
                $result = $query->row();
                return $result;

} 

function profile_complete(){
               
                $my_matr_id = $this->session->userdata('logged_in');
                $mat_id=$my_matr_id->matrimony_id;
                //$query = $this->db->where('user_id',$my_matr_id->matrimony_id);
                //$count=0;
                $query = $this->db->query("SELECT (count(`income`)+count(`education_detail`)+count(`college`)+count(`education_id`)+count(`occupation_id`)+count(`occupation_detail`)+count(`occupation_sector`)+count(`employed_in`)+count(`family_type`)+count(`family_status`)+count(`family_origin`)+count(`family_value`)+count(`family_location`)+count(`family_about`)+count(`mother_status`)+count(`father_status`)) as tots FROM `profiles` WHERE `matrimony_id`='$mat_id' " );           
                $result=$query->row();                        
                $count=$result;          
               // $result = $query->row();
                $count_result=(($result->tots)/16)*100;
                return $count_result;
/*var_dump($count);
die();*/
} 
    public function insert_mail($ins_arr_3) {
        $result = $this->db->insert('profile_mails', $ins_arr_3);         
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function insert_photo_request($ins_arr_3) {
        $result = $this->db->insert('profile_photo_request', $ins_arr_3);         
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function get_inbox($where,$group_by,$status,$member,$from,$to) {
        //echo $member."=".$from."=".$to;
        $membs = array(); $all_membs = array(); $k=0;
        if($member == "from") { $this->db->select('DISTINCT(history.history_from)'); }
       //else if($member == "common") { $this->db->select('history.history_from,history.history_to'); }
        else { $this->db->select('DISTINCT(history.history_to)'); }
        if(!empty($where)) {
            foreach($where as $row) {
                $this->db->where($row);          
            }
        }
        if($status == 0 || $status == 1 || $status == 2 || $status == 3) { $this->db->where('history_status',$status);
		$this->db->where('trash',0);
		}
        $query = $this->db->get('history');
        if($query->num_rows() > 0) {
            $membs = $query->result();         
        }

        foreach($membs as $memb) {
            $this->db->select('*'); 
            $this->db->distinct('history.history_from');
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
           
            if($member == "from") {
                $this->db->where('profiles.matrimony_id',$memb->history_from);
            } 
            else if($member == "common") {
               // $this->db->where('profiles.matrimony_id',$memb->history_from);
                $this->db->where('profiles.matrimony_id',$memb->history_to);
            }
            else {
                $this->db->where('profiles.matrimony_id',$memb->history_to);
            }
            $query = $this->db->get('profiles');
            if($query->num_rows() > 0) {
                $all_membs[$k] = $query->row();     
            }
            $k = $k+1;
        }
return $all_membs;
    }

    public function get_inbox_count($from,$to) {
      $this->db->select('*');
	  
      $this->db->where("(history.history_from = $from and history.history_to = $to)");
      $this->db->or_where("(history.history_from = $to and history.history_to = $from)");
      $query1 = $this->db->get('history');//echo $this->db->last_query();die;
      if($query1->num_rows() > 0) { 
          return $query1->result();       
      }
    } 

    public function trash_conversations($mat_id,$to_mat_id) {
      $this->db->where("(history.history_from = $mat_id and history.history_to = $to_mat_id)");
      $this->db->or_where("(history.history_from = $to_mat_id and history.history_to = $mat_id)");
      //if($this->db->update('history',array("history_status" =>3))) {
		  if($this->db->update('history',array("trash" =>1))) {
        return true;
      }
    }
    public function restore_conversations($mat_id,$to_mat_id) {
      $this->db->where("(history.history_from = $mat_id and history.history_to = $to_mat_id)");
      $this->db->or_where("(history.history_from = $to_mat_id and history.history_to = $mat_id)");
      //if($this->db->update('history',array("history_status" =>3))) {
		  if($this->db->update('history',array("trash" =>0))) {
        return true;
      }
    }
	public function restoreall_conversations($mat_id,$to_mat_id) {
		foreach($to_mat_id as $mat){
			$count = count($mat);
			for($i=0;$i<$count;$i++){ 
			  $this->db->where("(history.history_from = $mat_id and history.history_to = $mat[$i] and history.trash=1)");
			  $this->db->or_where("(history.history_from = $mat[$i] and history.history_to = $mat_id and history.trash=1)");
			  $this->db->update('history',array("trash" =>0));
			}
		}
	}
	public function deleteall_conversations($mat_id,$to_mat_id) {
		$count = count($to_mat_id); 
		for($i=0;$i<$count;$i++){ 
			$this->db->where("(history.history_from = $mat_id and history.history_to = $to_mat_id[$i] and history.trash=0)");
			$this->db->or_where("(history.history_from = $to_mat_id[$i] and history.history_to = $mat_id and history.trash=0)");
			$this->db->update('history',array("trash" =>1));
		}
	}
    public function insert_update_preference($data,$matr_id) {
        $qry=$this->db->get_where('preferences',array('profile_id' => $matr_id));
        if($qry->num_rows() > 0) {
            $this->db->where('profile_id',$matr_id);
            $this->db->update('preferences',$data); 
        } else {
            $this->db->insert('preferences',$data);

            $data1['partner_preference']=1;
            $this->db->where('matrimony_id',$matr_id);
            $this->db->update('profiles',$data1); 
        }
    }
    public function update_horscope($data,$matr_id) {
        
      
            $this->db->where('matrimony_id',$matr_id);
            $this->db->update('profiles',$data); 
       
        
    }

    function getHorroscope_info($matr_id){
      $sql="SELECT pf.gothram,pf.padam,pf.dosham,pf.horo_img,st.star_name FROM profiles pf left join stars st on st.star_id=pf.star_id  WHERE pf.matrimony_id='".$matr_id."'";
      $result= $this->db->query($sql);
      if ($result->num_rows()) {
          return $result->result();
      } else{
         return false;
      }
    }

    public function CheckCount($matr_id,$field,$table,$main_field) {
        $qry=$this->db->get_where($table,array($field => $matr_id));
        $count = $qry->num_rows();
        $qry1 = $this->db->select("$main_field as counts")
                       ->get_where('membership_details',array('matrimony_id' => $matr_id));
         return $base_count = $qry1->row()->counts;
        if($count < $base_count) {
            $remaining = $base_count-$count;
            return array('status' =>'success', 'remaining'=> $remaining);
        }else {
            return array('status' =>'failed','remaining'=> '0');
        }
    }
    function do_delete_sent_mail($matr_id,$intrst_count){
      $intrst_count = $intrst_count-1;
      $this->db->where('matrimony_id',$matr_id);
      $this->db->set('total_sendmail', $intrst_count);
      $this->db->update('membership_details');
    }
    function do_delete_sent_int($matr_id,$intrst_count){
      $intrst_count = $intrst_count-1;
      $this->db->where('matrimony_id',$matr_id);
      $this->db->set('total_interest', $intrst_count);
      $this->db->update('membership_details');
    }
    function do_delete_sent_sms($matr_id){
      $qry1 = $this->db->select("total_sms as counts")
                     ->get_where('membership_details',array('matrimony_id' => $matr_id));
      $base_count = $qry1->row()->counts;
      $base_count = $base_count-1;

      $this->db->where('matrimony_id',$matr_id);
      $this->db->set('total_sms', $base_count);
      $this->db->update('membership_details');
    }
 public function CheckMobile($mat_id) {
       $this->db->select('packages.*,membership_details.membership_package,membership_details.matrimony_id');
       $this->db->from('packages');
       $this->db->join('membership_details', 'packages.id = membership_details.membership_package','left');
       $query = $this->db->where('packages.package_status','1');
       $query = $this->db->where('membership_details.matrimony_id',$mat_id);
       $query = $this->db->get();
       $result = $query->row();
       //return $result;
       $verified_mob=$result->verified_mob;
       $verified_mob_permonth=$result->verified_mob_permonth;
       if($verified_mob=='1' && $verified_mob_permonth=='0'){
        return array('status' =>'success');

       }else{
        return array('status' =>'false');
       }
 }
    /*public function getCustomList($select,$where,$field,$tbl) {
        if($select != "") { $this->db->select($select); }
        if($where != "") {
            foreach($where as $row) { $this->db->where($row); }
        }
        $qry_5 = $this->db->get($tbl);
        if($qry_5->num_rows() > 0){ return $qry_5->result(); } else { return false; }  
    }*/

    public function profile_pic($id){ 
        $query = $this->db->where('status','1');
        $query = $this->db->where('profilepic_status','1');
        $query = $this->db->where('user_id',$id);
        $query = $this->db->get('photo_gallery');
        $result = $query->result();          
        return $result;
    }

    public function getMyHistory() {
      $my_matr_id = $this->session->userdata('logged_in');
      $mat_id = $my_matr_id->matrimony_id;
      $this->db->select('profiles.profile_name,history.*');
      $this->db->join('profiles', 'history.history_from= profiles.matrimony_id','left');
	   //$this->db->where('history.status','0');
      $this->db->order_by('history_datetime','desc');
      $this->db->limit(5);
	 
      $qry=$this->db->get_where('history',array('history_to' => $mat_id));
        if($qry->num_rows() > 0) { return $qry->result(); } else { return false; }
    }
    
    
    public function getMyHistory1() {
      $my_matr_id = $this->session->userdata('ins_id');
	  $sess = get_profile($my_matr_id);
      $mat_id = $sess->matrimony_id;
      $this->db->select('profiles.profile_name,history.*');
      $this->db->join('profiles', 'history.history_from= profiles.matrimony_id','left');
	   //$this->db->where('history.status','0');
      $this->db->order_by('history_datetime','desc');
      $this->db->limit(5);
      $qry=$this->db->get_where('history',array('history_to' => $mat_id));
        if($qry->num_rows() > 0) { return $qry->result(); } else { return false; }
    }
    
    public function get_helpline() {
     $query = $this->db->where('status','1');
     $query = $this->db->get('helpline_numbers');
     $result = $query->result();
     return $result;
    }
    public function insertHistory($ins_arr_3) {
        $result = $this->db->insert('history', $ins_arr_3);
        return $result;
    }

    public function updateHistory($hist_type,$hist_id,$forgn_id,$flag) {
       if($hist_type == "interest") {
          $this->db->where('interest_id',$forgn_id);
          $result = $this->db->update('profile_interest', array('interest_status' => $flag));
       } else if($hist_type == "message") {
          $this->db->where('mail_id',$forgn_id);
          $result = $this->db->update('profile_mails', array('mail_received' => $flag));
       } else if($hist_type == "photo") {
          $this->db->where('photo_request_id',$forgn_id);
          $result = $this->db->update('profile_photo_request', array('photo_request_status' => $flag));
       } else { }
       $this->db->where('history_id',$hist_id);
       $result = $this->db->update('history', array('history_status' => $flag));
    }

public function add_new_photo($data){ 
            $session=$this->session->userdata('user_values');
            $data['user_id']=$session['id'];
	 		$result = $this->db->insert('photo_gallery', $data);         
            return $result;
}


function membershipinfo1(){
               
                $my_matr_id = $this->session->userdata('logged_in');
                $query = $this->db->where('matrimony_id',$my_matr_id->matrimony_id);
                $query = $this->db->get('membership_details');
                $result = $query->row();
                return $result;

} 
function membershipinfo(){
     $my_matr_id = $this->session->userdata('logged_in');
     $this->db->select('membership_details.*, packages.package_name,packages.month,packages.alt_mobile');
     $this->db->from('membership_details' );
     $this->db->join('packages', 'membership_details.membership_package = packages.id','left');     
     $query = $this->db->where('packages.package_status','1');
     $query = $this->db->where('membership_details.matrimony_id',$my_matr_id->matrimony_id);     
     $query = $this->db->get();      
     $result = $query->row();
     return $result; 
} 

function membershipaddoninfo(){
     $my_matr_id = $this->session->userdata('logged_in');
     $this->db->select('membership_details.*, packages.package_name,packages.month');
     $this->db->from('membership_details' );
     $this->db->join('packages', 'membership_details.addon_package = packages.id','left');
     $query = $this->db->where('packages.package_status','1');
     $query = $this->db->where('membership_details.matrimony_id',$my_matr_id->matrimony_id);     
     $query = $this->db->get();     
     $result = $query->row();
     return $result; 
}

function get_details($field,$table,$where,$value){
  $rs = $this->db->query("SELECT $field AS name FROM $table WHERE $where IN($value)")->result();

 if(count($rs)>0){
  $result = array();
    foreach ($rs as $row) {
      $result[] = $row->name;
    }
    $rs = implode(', ', $result);
 } else {
  $rs = 'Any';
 }
 return $rs;
  
    //$rs = $this->db->select($field)->where_in($where,$value)->get($table)->result();
}

function getDetails($table,$field,$value) {     
      if(!empty($value)){         
          $arrs = array();
          $input = explode(',',$value);
          foreach($input as $sub_maritial){
            $qry = $this->db->get_where($table,array($field => $sub_maritial));
            if($qry->num_rows() > 0) { 
                $arrs[] = $qry->row(); 
            } else { 
                $arrs =array("Not Specified");
            }
          }     
      } else {
          $arrs =array("Not Specified");      
      }
  return $arrs;
} 
  public function getTable($select,$where,$tbl_name) {
      if($select != "") { $this->db->select($select); }
      if($where != "") { foreach($where as $row) {
              $this->db->where($row);
        }}
      $qry_5 = $this->db->get($tbl_name);
      if($qry_5->num_rows() > 0){ return $qry_5->result(); } else { return false; }
    }

 public function getUser_from_MatrimonyId($matr_id) {
        $qry_8 = $this->db->get_where('profiles', array('matrimony_id' => $matr_id));
        if($qry_8->num_rows() > 0) { return $qry_8->result()[0]; } else { return false; }
    }  
    public function getMatches($matr_id,$qry) {
        if($qry != "") {
            
        }
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

    public function getShortList($mat_id,$qry,$im,$whom) {
        $arr_1 = array();
        $arr_2 = array();
        $whr = "";
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

    function user_details($uid) {
      $this->db->where('id', $uid);
      $user=$this->db->get('user');
      return $user->result();

    }

    function get_prof_pic($uid) {
      $this->db->where('user_id',$uid);
      $this->db->where('pic_status',1);
      $this->db->order_by('pic_verification_id', 'desc'); 
      $query1 = $this->db->get('profile_pic_verification');
      $pic_approve = $query1->row();
    }
	  function get_logintime($uid) {
	  $this->db->select('date_time');
      $this->db->where('user_id',$uid);
      $query1 = $this->db->get('active_members');
      return $query1->row();
    }
	
	  public function notification_count() {
		  $my_matr_id = $this->session->userdata('logged_in');
          $mat_id=$my_matr_id->matrimony_id;
		 $this->db->set('status',1);
		 $this->db->where('history_to',$mat_id);
         $this->db->update('history');     
         return $result;
		
	}
	
	public function get_inbox1($where,$group_by,$status,$member,$from,$to) {
        //echo $member."=".$from."=".$to;
        $membs = array(); $all_membs = array(); $k=0; $membs1 = array();
        if($member == "from") { $this->db->select('DISTINCT(history.history_from)'); }
       //else if($member == "common") { $this->db->select('history.history_from,history.history_to'); }
        else { $this->db->select('*'); }
        if(!empty($where)) {
            foreach($where as $row) {
                $this->db->where($row);          
            }
        }
        if($status == 1) { $this->db->where('trash',1); }
        $query = $this->db->get('history');
        if($query->num_rows() > 0) {
            $membs = $query->result();         
        }
		
		if($member == "common"){
			$this->db->where('trash',1);
			$membs = $this->db->where('history_to',$to)->get('history')->result();
		}
		

        foreach($membs as $memb) {
            $this->db->select('*'); 
            $this->db->distinct('history.history_from');
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
           
           if($member == "from") {
                $this->db->where('profiles.matrimony_id',$memb->history_from);
            } 
            else if($member == "common") {
               // $this->db->where('profiles.matrimony_id',$memb->history_from);
                $this->db->where_in('profiles.matrimony_id',$memb->history_from);
            }
            else {
                $this->db->where('profiles.matrimony_id',$memb->history_to);
				$this->db->or_where('profiles.matrimony_id',$memb->history_from);
            }
            $query = $this->db->get('profiles');
            if($query->num_rows() > 0) {
                $all_membs[$k] = $query->row();    
            }
            $k = $k+1;
        } 
		return $all_membs;
    }
	
 public function conversations($mat_id) {
		  $this->db->where("(history.status = '0' and history.history_to = $mat_id)");
		  $this->db->from('history');
		  $query = $this->db->get('profiles');
		 {
        return true;
      }
    }
	
} 
?>