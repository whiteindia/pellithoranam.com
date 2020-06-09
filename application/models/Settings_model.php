<?php
class Settings_model extends CI_Model {

  public function __construct() {
     parent::__construct();
     date_default_timezone_set('Asia/Kolkata');
  }

  public function update_email($email_data) {
	    $usr  = $this->session->userdata('logged_in');
	    $this->db->where('email', $email_data['email']);
		$this->db->where('user_id<>', $usr->user_id);
		$query = $this->db->get('profiles');
		if( $query->num_rows() > 0 ){ 
			return array('msg' => "Email Already Exist");   
		} 
		else{
			  $td_date = date('Y-m-d H:i:s', time());
			  $this->db->where("user_id",$usr->user_id);
			  $this->db->update("users",array("email" => $email_data['email'],"modified_date" => $td_date));
		   
			  if( $this->db->where("user_id",$usr->user_id) &&
				$this->db->update("profiles",array("email" => $email_data['email'],"modified_date" => $td_date)))
				return array('status' => 4,'msg' => "Email Updated Successfully");         
		}
		
		
  }

  public function update_password($pass_data) {
    $usr  = $this->session->userdata('logged_in');

    $td_date = date('Y-m-d H:i:s', time());
    if($pass_data['new_password'] == $pass_data['conf_password']) { // checking new & confirm pass are same
    //print_r($pass_data['new_password']); 
    //print_r($pass_data['conf_password']);           
      $qry_1 = $this->db->get_where('users', array('user_id'=>$usr->user_id)); // getting password of that user
      $exist_pass = $this->encrypt->decode($qry_1->result()[0]->password); // decoding pass
          echo '<pre>';
    print_r($exist_pass);
    echo '</pre>';
    exit();
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

  public function delete_profile($delete_prof) {
    $usr  = $this->session->userdata('logged_in');
    $td_date = date('Y-m-d H:i:s', time());
    $ins_arr = array('user_id' => $usr->user_id,
                     'delete_reason' =>$delete_prof['delete_reason'],
                     'delete_datetime' => $td_date);
    $this->db->insert('profile_delete',$ins_arr);
    $this->db->where('user_id', $usr->user_id);
    if($this->db->update("profiles",array("profile_status"=>2,"modified_date"=>$td_date)))
    return array("Your Profile Has been Deleted, Yore logging out now...");
  }
  public function activate_dnd() {
    $usr  = $this->session->userdata('logged_in');  
    $this->db->where('user_id', $usr->user_id);
    $data1['dnd']=1;
    $result = $this->db->update('profiles',$data1);
    return $result;
  }
 public function contact_filters($data) {
    $usr  = $this->session->userdata('logged_in');  
    $query = $this->db->where('matrimony_id',$usr->matrimony_id); 
    $query = $this->db->get('settings_preferences'); 
    if ($query->num_rows() > 0){
    $query = $this->db->where('matrimony_id',$usr->matrimony_id);  
    $result = $this->db->update('settings_preferences',$data);
    }else{
    $data['matrimony_id']=$usr->matrimony_id;
    $result = $this->db->insert('settings_preferences', $data);
    return $result;
  }
  }
  public function mail_alerts($data) {
    $usr  = $this->session->userdata('logged_in');  
    $query = $this->db->where('matrimony_id',$usr->matrimony_id); 
    $query = $this->db->get('mail_alerts'); 
    if ($query->num_rows() > 0){
    $query = $this->db->where('matrimony_id',$usr->matrimony_id); 
    if($data['newsletter_alert']==null) {
     $data['newsletter_alert']=0; 
    }if($data['membership_expiry']==null) {
     $data['membership_expiry']=0; 
    }if($data['photo_reminder']==null) {
     $data['photo_reminder']=0; 
    }if($data['individual_match_alert']==null) {
     $data['individual_match_alert']=0; 
    }
    $result = $this->db->update('mail_alerts',$data);
    }else{
    $data['matrimony_id']=$usr->matrimony_id;
    $result = $this->db->insert('mail_alerts', $data);
    return $result;
  }
  } 
  public function deactivate_profile($data) {
    $usr  = $this->session->userdata('logged_in');
    $duration=$data['duration'];
    $td_date = date('Y-m-d H:i:s', time());
    $expiry = date('Y-m-d', strtotime('+'.$duration.' days'));
    $ins_arr = array('user_id' => $usr->user_id,
                     'duration' =>$data['duration'],
                     'deactvated_date' => $td_date,
                     'expiry_date' => $expiry);
    $this->db->insert('profile_deactivate',$ins_arr);
    $this->db->where('user_id', $usr->user_id);
    if($this->db->update("profiles",array("profile_status"=>4,"modified_date"=>$td_date)))
    return array("Your Profile Has been Deleted, Yore logging out now...");
  }
   public function check_deactivation() {
    $expiry = date('Y-m-d', time());
    $this->db->where('expiry_date',$expiry);
    $query = $this->db->get('profile_deactivate');
    $result = $query->result();
    return $result;
   } 
 public function check_package_expiry() {
    $expiry = date('Y-m-d', strtotime('- 10days'));
    $this->db->where('membership_expiry',$expiry);
    $query = $this->db->get('membership_details');
    $result = $query->result();
    return $result;
   } 

 public function photo_reminder() {
    $this->db->where('profile_photo',NULL);
    $query = $this->db->get('profiles');
    $result = $query->result();
    return $result;
   }
 public function individual_mail_alerts() {
    $this->db->where('individual_match_alert','1');
    $query = $this->db->get('mail_alerts');
    $result = $query->result();
    return $result;
   }
 public function get_deactivation_details($user_id) {
    $this->db->where('user_id',$user_id);
    $query = $this->db->get('profiles');
    $result = $query->row();
    return $result;
   } 
 public function get_package_expiry_details($matrimony_id) {
    $this->db->where('matrimony_id',$matrimony_id);
    $query = $this->db->get('profiles');
    $result = $query->row();
    return $result;
   } 

 public function get_individual_details($matrimony_id) {
    $this->db->where('matrimony_id',$matrimony_id);
    $query = $this->db->get('profiles');
    $result = $query->row();
    if($result->gender=='male')
    {
      $gender='female';
    }else{
      $gender='male';
    }

    $this->db->where('religion',$result->religion);
    $this->db->where('caste',$result->caste);
    $this->db->where('country',$result->country);
    $this->db->where('state',$result->state);
    $this->db->where('profile_status','1');
    $this->db->where('profile_approval','1');
    $this->db->where('is_phone_verified','1');
    $this->db->where('gender',$gender);
    $query1 = $this->db->get('profiles');
    $result1 = $query1->result();
    return $result1;

   } 

     public function deactivate_checking($data){
     
    $result = $this->db->insert('deactivation_check', $data);
    $data1['email_unique_id']=$data['unique_id'];
    $this->db->where('user_id',$data['user_id']);
    $result = $this->db->update('profiles',$data1);
    return $result;
     
     
   } 

    public function activate_account($unique){
     $this->db->where('unique_id', $unique);
     $data1['activate_status']='1';
     $result = $this->db->update('deactivation_check',$data1);
     $data2['profile_status']='1';
     $this->db->where('email_unique_id',$unique);
     $result = $this->db->update('profiles',$data2);
     return $result;
     
     
   }  
 //update account password
  function update_account_password($data) {
       
        $session=$this->session->userdata('user_values');
        $id=$session['id'];
        $this->db->select("count(*) as count");
        $this->db->where("password",md5($data['password']));
        $this->db->where("id",$id);
        $this->db->from("registration");
        $count = $this->db->get()->row();
        /*var_dump($data);
            die();*/
        if($count->count == 0) {
          echo 3;
        }
        else {
          
          $update_data['password'] =md5($data['n_password']);
          $this->db->where("id",$id);
          $result = $this->db->update('registration', $update_data); 
         
          if($result) {
           echo 1;
          }
          else {
            echo 2;
          }
        }
      }
  public function  add_success_story($data){

           $result = $this->db->insert('success_story', $data);
          return $result;
     }
        public function get_mail_alerts($mat_id) {
        $this->db->where('matrimony_id',$mat_id);
        $query=$this->db->get('mail_alerts');
        $result = $query->row();         
        return $result;      
    }
    public function get_settings_preferences($mat_id) {
        $this->db->where('matrimony_id',$mat_id);
        $query=$this->db->get('settings_preferences');
        $result = $query->row();         
        return $result;      
    }

    public function get_profiles($mat_id) {
        $this->db->where('matrimony_id',$mat_id);
        $query=$this->db->get('profiles');
        $result = $query->row();         
        return $result;
    }
}