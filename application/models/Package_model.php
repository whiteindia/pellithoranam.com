<?php
class Package_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

/*to get profile details of user*/


    // view Package 
function view_packages(){
         $query = $this->db->where('package_status','1');
         $query = $this->db->where('package_type','1');
         $query = $this->db->where('id !=','1');
         $query = $this->db->get('packages');
         $result = $query->result();
         return $result;
 }

function profile(){
               
				$session=$this->session->userdata('user_values');
                $query = $this->db->where('id',$session['id']);
                $query = $this->db->get('registration');
                $result = $query->row();
                return $result;

} 
public function view_package($data){ 
            $query = $this->db->where('package_status','1');
            $query = $this->db->where('id',$data['id']);
            $query = $this->db->get('packages');
            $result = $query->row();          
            return $result;

}
function get_account(){

                $session=$this->session->userdata('logged_in');  
				//print_r($session->matrimony_id);die;
                $query = $this->db->where('matrimony_id',$session->matrimony_id);
                $query = $this->db->get('profiles');
                $result = $query->row();
                return $result;

}
function get_amount($packageid){

                
                $query = $this->db->where('id',$packageid);
                $query = $this->db->get('packages');
                $result = $query->row();
                return $result;

}
public function upgrade_prem() {
        $session=$this->session->userdata('logged_in');  
		$mat_id = $session->matrimony_id;
	    $this->db->where('matrimony_id',$mat_id);				
		$this->db->set('is_premium',2);
		$result =  $this->db->update('profiles');
    }

	function upgrade_members($packageid){
		$session=$this->session->userdata('logged_in');  
		$mat_id = $session->matrimony_id;
	    $this->db->where('matrimony_id',$mat_id);				
		$this->db->set('is_premium',1);
		$result =  $this->db->update('profiles');

		$this->db->where('id',$packageid);
		$query = $this->db->get('packages');
		$result = $query->row();
		$month=$result->month;
		$amount=$result->price;
		$date=date('Y-m-d H:i:s', time());
		$interest = $this->getCount($mat_id,"interest_from","profile_interest");
		$mails = $this->getCount($mat_id,"mail_from","profile_mails");
		$views = $this->getCount($mat_id,"mobileview_from","mobile_view");
		$sms = $this->getCount($mat_id,"send_sms_from","send_sms");
		$data1['total_interest']=$result->intrest_permonth + $interest;
		$data1['total_sendmail']=$result->personalized_msg_permonth + $mails;
		$data1['total_mobileview']=$result->verified_mob_permonth + $views;
		$data1['total_sms']=$result->send_sms_permonth + $sms;
		$data1['membership_package']=$packageid;
		$data1['membership_purchase']= date('Y-m-d H:i:s', time());
		$data1['membership_expiry']= date('Y-m-d H:i:s', strtotime('+'.$month.' months'));
		$this->db->where('matrimony_id',$mat_id);
		$result = $this->db->update('membership_details',$data1);
	}
	
	public function getCount($matr_id,$field,$table) {
        $qry=$this->db->get_where($table,array($field => $matr_id));
        $count = $qry->num_rows();
        return $count;
    }

}