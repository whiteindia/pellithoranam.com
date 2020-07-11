<?php
class Search_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user_basic_details($my_user) {
        $this->db->select('gender,religion,caste,willing_intercast,partner_preference');
        $qry_7 = $this->db->get_where('profiles', array('profile_id' => $my_user['logged_in']['profile_id']));
        if($qry_7->num_rows() > 0) { return $qry_7->row(); } else { return false; }
    }
    public function get_user_basic_details2($my_user) {
     // echo $my_user['profile_id'];
        $this->db->select('gender,religion,caste,age,phone,willing_intercast,partner_preference');
        $qry_7 = $this->db->get_where('profiles', array('profile_id' => $my_user['profile_id']));
        if($qry_7->num_rows() > 0) { return $qry_7->row(); } else { return false; }
    }
   public function get_user_partner_preference($my_user) {
           $this->db->select('*');
       
        $this->db->join('mother_tongues', 'preferences.mother_language = mother_tongues.mother_tongue_id','left');
        $this->db->join('religions', 'preferences.religion = religions.religion_id','left');
        if(!empty($whr)) {
            foreach($whr as $row) {
                $this->db->where($row);          
            }
        }
        $this->db->where('profile_id', $my_user);
        $query = $this->db->get('preferences');
        $result = $query->row();         
        return $result;
    }

  
    public function record_count($tbl,$whr,$or_whr) {
        foreach($whr as $row) { $this->db->where($row); }
        foreach($or_whr as $row1) { $this->db->or_where_in($row1); }
        $qry = $this->db->get('profiles');
        //echo $this->db->last_query();
        if($qry->num_rows() > 0) {
            return count($qry->result());
        } else { return false; }
    }

  public function get_save_search_details($search_id) {
         $this->db->where('id', $search_id);
         $query = $this->db->get('save_search');
         $result = $query->row();       
         return $result;
 }    
    public function save_search($data){
      
      
       // print_r($data);die();
             $sess=$this->session->userdata('logged_in');
              $data['matrimony_id']=$sess->matrimony_id;
              if(isset($data['educs']) && !empty($data['educs'])){
                  $education =  $data['educs'];
                  $data['educs'] = implode(",", $education);
              } if(isset($data['state']) && !empty($data['state'])){
                  $state[] =  $data['state'];
                  $data['state'] = implode(",", $state);
              } if(isset($data['country']) && !empty($data['country'])){
                  $country[] =  $data['country'];
                  $data['country'] = implode(",", $country);
              }if(isset($data['caste']) && !empty($data['caste'])){
                  $caste[] =  $data['caste'];
                  $data['caste'] = implode(",", $caste);
              }if(isset($data['mother']) && !empty($data['mother'])){
                  $mother[] =  $data['mother'];
                  $data['mother'] = implode(",", $mother);
              }if(isset($data['religion']) && !empty($data['religion'])){
                  $religion[] =  $data['religion'];
                  $data['religion'] = implode(",", $religion);
              }if(isset($data['mart']) && !empty($data['mart'])){               
                  $mart[] =  $data['mart'];
                  $data['mart'] = implode(",", $mart);
              }if(isset($data['occupa']) && !empty($data['occupa'])){               
                  $occupa =  $data['occupa'];
                  $data['occupa'] = implode(",", $occupa);
              }if(isset($data['dont_show']) && !empty($data['dont_show'])){               
                  $dont_show =  $data['dont_show'];
                  $data['dont_show'] = implode(",", $dont_show);
              }if(isset($data['misc_type']) && !empty($data['misc_type'])){               
                  $misc_type =  $data['misc_type'];
                  $data['misc_type'] = implode(",", $misc_type);
              }if(isset($data['smoking']) && !empty($data['smoking'])){               
                  $smoking =  $data['smoking'];
                  $data['smoking'] = implode(",", $smoking);
              }if(isset($data['drinking']) && !empty($data['drinking'])){               
                  $drinking =  $data['drinking'];
                  $data['drinking'] = implode(",", $drinking);
              }if(isset($data['eating']) && !empty($data['eating'])){               
                  $eating =  $data['eating'];
                  $data['eating'] = implode(",", $eating);
              }
              $result = $this->db->insert('save_search', $data);
              //echo $this->db->last_query();
              //die();
              return $result;
     }

     function get_permission($request_to){
      $my_matr_id = $this->session->userdata('logged_in');
      $where = array(
        'photo_request_from' => $my_matr_id->matrimony_id,
        'photo_request_to' => $request_to
      );
      $this->db->where($where);
      $this->db->limit(1);
      $this->db->order_by('photo_request_id', 'DESC');
      $query = $this->db->get('profile_photo_request');
      $num = $query->num_rows();
      if($num>0){
        $result = $query->result();
        if($result[0]->photo_request_status==0){
          return 'requested';
        }else if($result[0]->photo_request_status==2){
          return 'canceled';
        }else{
          return 'success';
        }
        
      }else{
        return 'not_requested';
      }
     }

    public function search_user_details($limit,$start,$whr,$or_whr,$like){
        $whr_2 =array(); $whr_length = count($whr); $or_whr_length = count($or_whr); $like_length = count($like);
        $i=1; $j=1;
        $search_query ="";
        $search_query.= "SELECT * FROM profiles
                        LEFT JOIN height ON profiles.height_id = height.height_id 
                        LEFT JOIN weight ON profiles.weight_id = weight.weight_id 
                        LEFT JOIN religions ON profiles.religion = religions.religion_id 
                        LEFT JOIN castes ON profiles.caste = castes.caste_id 
                        LEFT JOIN sub_castes ON profiles.sub_caste = sub_castes.sub_caste_id 
                        LEFT JOIN stars ON profiles.star_id = stars.star_id 
                        LEFT JOIN raasi ON profiles.raasi_id = raasi.raasi_id 
                        LEFT JOIN country ON profiles.country = country.country_id 
                        LEFT JOIN states ON profiles.state = states.state_id 
                        LEFT JOIN cities ON profiles.city = cities.city_id 
                        LEFT JOIN educations ON profiles.education_id = educations.education_id 
                        LEFT JOIN occupations ON profiles.occupation_id = occupations.occupation_id
                        LEFT JOIN settings_preferences  ON profiles.matrimony_id = settings_preferences.matrimony_id";
        $search_query.=" WHERE ((";
            foreach($whr as $row) {
                $search_query.= $row;
                if($i < $whr_length) { $search_query.= " AND "; }
                $i= $i+1;
            }
        $search_query.=")";

            if(!empty($or_whr)) { 
                $search_query.=" AND ("; 
                foreach($or_whr as $row1) {
                    $search_query.= $row1;
                    if($j < $or_whr_length) { $search_query.= " AND "; }
                    $j= $j+1;
                }
                $search_query.=")";
            }

            if(!empty($like)) { 
                $search_query.=" AND ("; 
                foreach($like as $row2) {
                    $search_query.= $row2;
                    if($j < $like_length) { $search_query.= " OR "; }
                    $j= $j+1;
                }
                $search_query.=")";
            }

        $search_query.=") LIMIT ".$limit;
       //  echo $search_query;
       // exit;
        if($start!=0) { $search_query.= ",".$start; }
        //echo $search_query;
        $query = $this->db->query($search_query);
        if($query->num_rows() > 0) {
            $result = $query->result();        
            return $result;
        } else { return false; }
    } 

    public function getValueFromId($query) {
        $query1 = $this->db->query($query);
        if($query1->num_rows() > 0) {
            return $query1->row();         
        } else { return 0; }
    }

    public function getMyCommunications($my_id,$from_field,$to_field,$table) {
        $res = array();
        $this->db->select("$to_field as exclude_matri");
        $this->db->distinct($to_field);
        $qry =$this->db->get_where($table,array($from_field => $my_id));
        if($qry->num_rows() > 0) {
            return $qry->result();
        }
    }



 /*get Search Results*/
function search_user_details2($data){

                $this->db->select('registration.*, photo_gallery.image,photo_gallery.status,photo_gallery.profilepic_status');
                $this->db->from('registration' );
                $this->db->join('photo_gallery', 'registration.id = photo_gallery.user_id','left');
                $query = $this->db->where('registration.gender',$data['gender']);
                $query = $this->db->where('registration.religion',$data['religion']); 
                $query= $this->db->where('registration.age >=',$data['age']);
                $query= $this->db->where('registration.age <=',$data['age1']);
                $query = $this->db->where('registration.approval','1');
                $query = $this->db->get();
                $result = $query->result();          
                return $result;
} 

public function photo_count($result){
  $i = 0;
  if(!empty($result)){
    foreach($result as $rs) {
      if($rs->profile_photo!=''){
        ++$i;
      }
    }
  }
  
  return $i;
}



}