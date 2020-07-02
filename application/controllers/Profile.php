<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->model('Search_model');
        $this->load->model('Home_model');
        $this->load->model('App_model');
        $this->load->library('upload');
        date_default_timezone_set('Asia/Kolkata');
    }

	/*public function index($matr_id)
	{
		$template['page_title'] = "Profiledetail";  
		$template['page'] = "profiledetail";
		$this->load->view('template', $template);                    
	}*/

	public function profile_details($matr_id = 0) {
	if(($this->session->userdata('logged_in')) || ($this->session->userdata('logged_in_admin'))) {
		if($matr_id) {
			// var_dump($matr_id);
			// die();
			$whr = array();
			$my_matr_id = $this->session->userdata('logged_in');
			$header['title'] = "Profile Details | TCM".$matr_id;
			$data['profile'] = $this->Profile_model->get_profile_details($matr_id,$whr);
			$data['gallery'] = $this->Profile_model->get_gallery_details($matr_id);
			$data['data']=$this->Profile_model->hobbies_details($matr_id);
			$data['logintime']=$this->Profile_model->get_logintime($matr_id);


			if($this->session->userdata('logged_in')) {
				$datad = $this->Profile_model->get_partner_preference($matr_id,"");
				
				if(isset($datad)) 
					{ $data['preference'] =  $datad; 
				}
				$data['similar'] = $this->similar_profiles($matr_id);
				$data['membership'] = $this->Profile_model->get_membership_details($my_matr_id->matrimony_id);
				$data['profile'][0]->shortlisted = $this->Profile_model->checkShortlisted($my_matr_id->matrimony_id,$matr_id);
				// echo "<pre>";print_r($k);echo "</pre>";exit;
				$data['profile'][0]->interested  = $this->Profile_model->checkInterested($my_matr_id->matrimony_id,$matr_id);
				//$prefs = $this->Profile_model->get_partner_preference($my_matr_id->matrimony_id,"");
			    $prefs1 = $this->Profile_model->get_partner_preference1($matr_id,"");
			    $data['photo_request'] = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$matr_id);
			    $data['data']=$this->Profile_model->hobbies_details($matr_id);
			    //var_dump($data['photo_request']);die();
			    $session=$this->session->userdata('logged_in');
			    $hgt=$session->height_id;
			    $where[] = "height_id = '$hgt'";
			    $data['heights'] = $this->Home_model->getTable("",$where,"height");
			    
				if(!empty($prefs1)){
					$data['prefernce'] = $this->getDataPreference($prefs1);	
				}/*if(!empty($prefs1)){
					$data['prefernce1'] = $this->getDataPreference($prefs1);	
				}*/
				$this->Profile_model->insertRecents($my_matr_id->matrimony_id,$matr_id);
			}
			//echo "<pre>"; print_r($data);
			$data['matr_id']=$matr_id;
			$this->load->view('header', $header);
			$this->load->view('profiledetail',$data);
			$this->load->view('footer');
		} else { echo "Profile Not Found"; }
	} else { redirect(base_url()); }
	}
public function get_drop_data2() {
		$sel_val = $this->input->post('sel_val');
		$sel_typ = $this->input->post('sel_typ');
		$where = array(); 
		$tbl = "";

		if($sel_typ == "country") { 
			$tbl = "states";
			$fld_name = "State";
			$where[] = "country_id = '".$sel_val."'"; 
			$where[] = "state_status = '1'";
		} else if($sel_typ == "state") {
			$tbl = "cities";
			$fld_name = "City";
			$where[] = "state_id = '".$sel_val."'"; 
			$where[] = "city_status = '1'";
		} else { return false; }

		$drop_vals = $this->Profile_model->getTable("",$where,$tbl);

		echo $this->db->last_query();

		$html = "";
		$html.= "<option value='0'>Select ".$fld_name."</option>";

		if($fld_name == "State") {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->state_id."'>".$drop_val->state_name."</option>";
			}
		} else {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->city_id."'>".$drop_val->city_name."</option>";
			}
		}
		echo $html;
	}
public function get_drop_data3() {
		$sel_val = $this->input->post('sel_val');
		$sel_typ = $this->input->post('sel_typ');
		$where = array(); 
		$tbl = "";

		if($sel_typ == "religion") { 
			$tbl = "castes";
			$fld_name = "Caste";
			$where[] = "religion_id = '".$sel_val."'"; 
		}  else { return false; }

		$drop_vals = $this->Profile_model->getTable("",$where,$tbl);

		$html = "";
		$html.= "<option value='0'>Select ".$fld_name."</option>";

		if($fld_name == "Caste") {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->caste_id."'>".$drop_val->caste_name."</option>";
			}
		} 
		echo $html;
	}
	public function my_profile() {
		if($this->session->userdata('logged_in')) {
			$my_matr_id = $this->session->userdata('logged_in');
			if($my_matr_id) {
				$whr = array();
				$whr1= array();
				$whr1[]  = "religion_id = '".$my_matr_id->religion."'";
				$header['title'] = "Profile Details | TCM".$my_matr_id->matrimony_id;
				$data['profile'] = $this->Profile_model->get_profile_details($my_matr_id->matrimony_id,$whr)[0];
				//print_r($data['profile']); die;
				/*$prefs = $this->Profile_model->get_partner_preference($my_matr_id->matrimony_id,"");
				if(!empty($prefs)){
					$data['prefernce'] = $this->getDataPreference($prefs);	
				}*/
				$prefs = $this->Profile_model->get_partner_preference($my_matr_id->matrimony_id,"");
			    //$prefs1 = $this->Profile_model->get_partner_preference1($matr_id,"");
			   /* var_dump($prefs1);
			    die();*/
				if(!empty($prefs)){
					$data['prefernce'] = $this->getDataPreference($prefs);	
				}/*if(!empty($prefs1)){
					$data['prefernce1'] = $this->getDataPreference($prefs);	
				}*/
				$data['horroscope_info'] = $this->Profile_model->getHorroscope_info($my_matr_id->matrimony_id)[0];
				// echo "<pre>";
				// print_r($data['horroscope_info']);
				// echo "</pre>";
				// exit;
				$whr_r[]  = "religion_status = '1'";
				$data['religions'] = $this->Home_model->getTable("",$whr_r,"religions");
				//$data['castes'] = $this->Home_model->getTable("","","castes");
				$data['mother_tongue'] = $this->Home_model->getMotherTongues();
            	$data['stars'] = $this->Home_model->getTable("","","stars");
            	$data['raasi'] = $this->Home_model->getTable("","","raasi");
            	$whr_e[]  = "education_status = '1'";
            	$data['educations'] = $this->Home_model->getTable("",$whr_e,"educations");
            	$whr_c[]  = "country_status = '1'";
            	$data['country'] = $this->Home_model->getTable("",$whr_c,"country");
            	$whr_o[]  = "occupation_status = '1'";
            	$data['occupations'] = $this->Home_model->getTable("",$whr_o,"occupations");
            	$data['heights'] = $this->Home_model->getTable("","","height");
            	$data['weights'] = $this->Home_model->getTable("","","weight");
				$this->load->view('header', $header);
				$data['data']=$this->Profile_model->hobbies_details($my_matr_id->matrimony_id);//print_r($data['data']);die;
				$data['profile_complete']=$this->Profile_model->profile_complete();
				$data['employed_in']=$this->Profile_model->employed_in();
				/*var_dump($data['employed_in']);
				die();*/
				$data['membershipinfo']=$this->Profile_model->membershipinfo();
				$this->load->view('my_profile',$data);
				$this->load->view('footer');
			} else { echo "Profile Not Found"; }
		} else { redirect(base_url()); }
	}

	public function getDataPreference($prefs) {



		$country = ""; $state=""; $educs=""; $occus="";
		$country_ids = array(); $state_ids=array(); $educs_ids=array(); $occus_ids=array();
		
		if($prefs->country!=''){
			$country = $this->Profile_model->get_details('country_name','country','country_id',$prefs->country);
		} else {
			$country = 'Any';
		}

		if($prefs->state!=''){
			$state = $this->Profile_model->get_details('state_name','states','state_id',$prefs->state);
		} else {
			$state = 'Any';
		}

		if($prefs->education!=''){
			$educs = $this->Profile_model->get_details('education','educations','education_id',$prefs->education);
		} else {
			$educs = 'Any';
		}

		if($prefs->occupation!=''){
			$occus = $this->Profile_model->get_details('occupation','occupations','occupation_id',$prefs->occupation);
		} else {
			$occus = 'Any';
		}

		if($prefs->height_from_id!=''){
			$d_height = $this->Profile_model->get_details('height','height','height_id',$prefs->height_from_id);
		} else {
			$d_height = 'Not Specified';
		}

		if($prefs->height_to_id!=''){
			$l_height = $this->Profile_model->get_details('height','height','height_id',$prefs->height_to_id);
		} else {
			$l_height = 'Not Specified';
		}

		if($prefs->caste!=''){
			$data['caste'] = $this->Profile_model->get_details('caste_name','castes','caste_id',$prefs->caste);
		} else {
			$data['caste'] = 'Any';
		}

		$data['caste_id'] = explode(',',$prefs->caste);

		if($prefs->mother_language!=''){
			$data['mother'] = $this->Profile_model->get_details('mother_tongue_name','mother_tongues','mother_tongue_id',$prefs->mother_language);
		} else {
			$data['mother'] = 'Any';
		}
		/*echo '<pre>';
		print_r($prefs);
		die();*/

		$data['mother_language'] = $prefs->mother_language;
		//$data['physical_status'] = explode(',', $prefs->physical_status);
		//$data['eating_habit'] = explode(',', $prefs->eating_habit);
		
		$data['maritial'] = preferncecallback('maritial',$prefs->maritial_status);
		$data['maritial_id'] = explode(',',$prefs->maritial_status);
		$data['physical'] = preferncecallback('physical',$prefs->physical_status);
		$data['physical_id'] = explode(',',$prefs->physical_status);
		$data['eating'] = preferncecallback('eating',$prefs->eating_habit);
		$data['eating_id'] = explode(',',$prefs->eating_habit);
		$data['smoking'] = preferncecallback('smoking',$prefs->smoking_habit);
		$data['smoking_id'] = explode(',',$prefs->smoking_habit);
		$data['drinking'] = preferncecallback('drinking',$prefs->drinking_habit);
		$data['drinking_id'] = explode(',',$prefs->drinking_habit);
		$data['religion'] = $prefs->religion_name;
		$data['religion_id'] = $prefs->religion_id;
		
		
		$data['country'] = $country;
		$data['country_ids'] = explode(',', $prefs->country);
		$data['state']   = $state;
		$data['state_ids']   = explode(',', $prefs->state);
		//$data['city']     = $this->Profile_model->getDetails('cities','city_id',$prefs[0]->city);
		$data['education'] = $educs;
		$data['education_ids'] = explode(',', $prefs->education);
		$data['occupation'] = $occus;
		$data['occupation_ids'] = explode(',', $prefs->occupation);
		//$data['sub_castes'] = $this->Profile_model->getDetails('sub_castes','sub_caste_id',$prefs[0]->subcaste);
		//$data['raasi'] = $this->Profile_model->getDetails('raasi','raasi_id',$prefs[0]->raasi);
		//$data['dosham'] = preferncecallback('dosham',$prefs[0]->dosham);
		$data['citizen'] = '';
		$data['min_height'] = $d_height;
		$data['max_height'] = $l_height;
		$data['min_age'] = $prefs->age_from;
		$data['max_age'] = $prefs->age_to;
		$data['min_income'] =$prefs->min_income;
		$data['max_income'] = $prefs->max_income;
		$data['income_currency'] = $prefs->income_currency;
		$data['body_type'] = preferncecallback('body_type',$prefs->body_type);
		$data['body_type_id'] =$prefs->body_type;
		$data['complexion'] = preferncecallback('complexion',$prefs->complexion);
		$data['complexion_id'] =$prefs->complexion;
		$data['abt_part'] = $prefs->about_partner;
		return $data;
	}

	public function similar_profiles($matr_id) {
		$or_where = array(); $like = array();
		$my_user = $this->session->userdata;
        $my_user = json_decode(json_encode($my_user),true);

        $where = array(); $tbl ="profiles";
       // print_r($my_user['logged_in']);

        if($my_user['logged_in']['gender']== "male") { 
        	$where[]= "profiles.gender = 'female'"; } else { $where[]= "gender = 'male'"; }
        if($my_user['logged_in']['willing_intercast'] != 1) { 
        	$where[] = "profiles.religion = '".$my_user['logged_in']['religion']."'";
        	$where[] = "profiles.caste = '".$my_user['logged_in']['caste']."'"; 
        }
        $where[] = "profiles.is_phone_verified = '1'";
        $where[] = "profiles.profile_approval = '1'";
        $where[] = "profiles.profile_status = '1'";
        $where[] = "profiles.matrimony_id != '".$matr_id."'";
        $simlr_cands = $this->Search_model->search_user_details(10, 0, $where,$or_where,$like);
        return $simlr_cands;
	}

	public function update_age() { // daily cron job
		$result = $this->Profile_model->update_age();
	}

	public function partner_preference() {
		if($this->session->userdata('logged_in')) {
			$my_matr_id = $this->session->userdata('logged_in');
			$data['religions'] = $this->Home_model->getReligions();
	        $data['mother_tongue'] = $this->Home_model->getMotherTongues();
	        $data['stars'] = $this->Home_model->getTable("","","stars");
	        $where1[] = "education_status = '1'";
	        $data['educations'] = $this->Home_model->getTable("",$where1,"educations");
	        $where2[] = "country_status = '1'";
	        $data['country'] = $this->Home_model->getTable("",$where2,"country");
	        $where3[] = "state_status = '1'";
	        $data['states'] = $this->Home_model->getTable("",$where3,"states");
			//$where5[] = "city_status = '1'";
	        //$data['city'] = $this->Home_model->getTable("",$where5,"cities");
			//print_r($data['city']);die;
	        $where4[] = "occupation_status = '1'";
	        $data['occupations'] = $this->Home_model->getTable("",$where4,"occupations");
	        $data['currencies'] = $this->Home_model->getCurrency();
	        $data['heights'] = $this->Home_model->getTable("","","height");
	        $whr[]= "profile_id = '".$my_matr_id->matrimony_id."'";
	        //$data['preferences'] = $this->Home_model->getTable("",$whr,"preferences");
	        //echo '<pre>';
	      
	        $data['preferences'] = $this->db->where('profile_id',$my_matr_id->matrimony_id)->get('preferences')->row();
	        $data['horroscope_info'] = $this->db->where('matrimony_id',$my_matr_id->matrimony_id)->get('profiles')->row();
	         // echo "<pre>";
	         // print_r($data['horroscope_info']);
	         // exit;
	       	$data['preferences'] = $this->get_prefernces($data['preferences']);
 //print_r($data['preferences']);die;
	       	if($data['preferences']->religion!=''){
	        	$castes = $this->Home_model->getCastes($data['preferences']->religion);
	        } else {
	        	$castes =array();
	        }



	        if(count($data['preferences']->country)>0){
	        	$where3[] = "state_status = '1'";
	        	$cnty = implode(',', $data["preferences"]->country);
	        	if(!empty($cnty)) 
	        	$where3[] = "country_id IN($cnty)";
	        	$data['states'] = $this->Home_model->getTable("",$where3,"states");
	        } 
	        $data['castes'] = $castes;
			$header['title'] = "My Partner Preference | SM".$my_matr_id->matrimony_id;

			$this->load->view('header', $header);
			$this->load->view('preference',$data);
			$this->load->view('footer');
		} else { redirect(base_url()); }
	}

	public function get_prefernces($data){
		
		if(!empty($data)){

            $data->maritial_status = explode(',', $data->maritial_status);
            $data->physical_status = explode(',', $data->physical_status);
            $data->eating_habit = explode(',', $data->eating_habit);
            $data->smoking_habit = explode(',', $data->smoking_habit);
            $data->drinking_habit = explode(',', $data->drinking_habit);
            $data->country = explode(',', $data->country);
            $data->caste = explode(',', $data->caste);
            $data->state = explode(',', $data->state);
            $data->education = explode(',', $data->education);
            $data->occupation = explode(',', $data->occupation);
            

		} else {
			$data = (object) array('age_from'=>'',
            'age_to' => '',
            'height_from_id' => '',
            'height_to_id' => '',
            'maritial_status' => array(),
            'physical_status' => array(),
            'eating_habit' => array(),
            'smoking_habit' => array(),
            'drinking_habit' => array(),
            'religion' =>'',
            'caste' => '',
            'mother_language' => '',
            'star' => '',
            'country' => array(),
            'state' => array(),
            'city' => '',
            'education' => array(),
            'occupation' => array(),
            'min_income' => 0,
            'about_partner' => '',
            'preference_date' => '',
            'subcaste' => '',
            'raasi' => '',
            'dosham' => '',
            'weight_from' => '',
            'weight_to' => '',
            'max_income' => 0,
            'body_type' => '',
            'complexion' => '',
            'citizenship' => '');
		}
		return $data;
	}


	public function get_state(){		
		$where3[] = "state_status = '1'";
        $cnty =  $_POST['country'];
        $where3[] = "country_id IN($cnty)";
        $state = $this->Home_model->getTable("",$where3,"states");
        //echo $this->db->last_query();
        print json_encode($state);
	}

	public function save_partner_preference() {
		if($this->session->userdata('logged_in')) {
			if($_POST) { 
				$i = 0; $educations =""; $occupations=""; $states=""; $countries="";
				$my_matr_id = $this->session->userdata('logged_in');
				$td_date = date('Y-m-d H:i:s', time());
				$_POST['profile_id'] = $my_matr_id->matrimony_id;
				$_POST['preference_date'] = $td_date;
				if(isset($_POST['education'])) {
				 	$_POST['education'] = implode(',', $_POST['education']);
				}
				if(isset($_POST['occupation'])) {
					$_POST['occupation'] = implode(',', $_POST['occupation']);
				}
				if(isset($_POST['state'])) {
					$_POST['state'] = implode(',', $_POST['state']);
				}
				
				if(isset($_POST['country'])) {
					$_POST['country'] = implode(',', $_POST['country']);
				}

				if(isset($_POST['caste'])) {
					$_POST['caste'] = implode(',', $_POST['caste']);
				}
				
				/*$_POST['education'] = $educations;
				$_POST['occupation'] = $occupations;
				$_POST['state'] = $states;
				$_POST['country'] = $countries;
				unset($_POST['cnty']);
				unset($_POST['stat']);
				unset($_POST['edu']);
				unset($_POST['ocu']);*/
				$_POST['maritial_status'] = implode(',', $_POST['maritial_status']);
				$_POST['physical_status'] = implode(',', $_POST['physical_status']);
				$_POST['eating_habit'] = implode(',', $_POST['eating_habit']);
				$_POST['drinking_habit'] = implode(',', $_POST['drinking_habit']);
				$_POST['smoking_habit'] = implode(',', $_POST['smoking_habit']);

				$files = $_FILES;
				$horrscope_array = array(
					'gothram' => $_POST['gothram'], 
					'star_id' => $_POST['star'], 
					'padam' => $_POST['padam'], 
					'dosham' => $_POST['dosham']
				);
				if($files['horo_img']['name']==""){
					//$horrscope_array['horo_img']="";
				}else{
					$upload_image=$this->_do_upload($files);
					if (array_key_exists('error', $upload_image)) {
						echo $upload_image['error'];exit;
					}else{
						//print_r($upload_image);
						 $horrscope_array['horo_img']=$upload_image['upload_data']['file_name'];
					}
				}
				unset($_POST['gothram']);
				unset($_POST['star']);
				unset($_POST['dosham']);
				unset($_POST['padam']);
				//echo "<pre>";print_r($_POST); die();
				$update_horscope = $this->Profile_model->update_horscope($horrscope_array,$my_matr_id->matrimony_id);

				$result = $this->Profile_model->insert_update_preference($_POST,$my_matr_id->matrimony_id);
				redirect(base_url('/profile/my_profile'));
			} else { redirect(base_url('/profile/my_profile')); }
		} else { redirect(base_url()); }
	}

		/**
		* This Function is for uploading images 
		*
		* @param array $post_image
		* @return Success erro/upload success data
		* @author Tj Thouhid
		* @version 2017-01-24
		*/

		private function _do_upload($post_image)
	    {
	    	
	        $config['upload_path']          = './assets/uploads/horoscope/';
	        $config['allowed_types']        = 'jpg|png|pdf';
	        $config['max_size']             = 10000;
	       // $config['max_width']            = 1024;
	       // $config['max_height']           = 768;

	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);

	        if ( ! $this->upload->do_upload('horo_img'))
	        {
	             return   $error = array('error' => $this->upload->display_errors());

	               // $this->load->view('upload_form', $error);
	        }
	        else
	        {
	               return $data = array('upload_data' => $this->upload->data());

	               // $this->load->view('upload_success', $data);
	        }
	    }

	public function recent_profiles($param) {
		if($this->session->userdata('logged_in')) {
			$m = 0; $flg=0;
			$my_matr_id = $this->session->userdata('logged_in');

			if((isset($param)) && ($param != "")) {
				if($param == "my") { 
					$flg=1;
					$where[] = "viewer = '".$my_matr_id->matrimony_id."'";
				} else { 
					$flg=2;
					$where[] = "viewed = '".$my_matr_id->matrimony_id."'";
				}	
			}

			$data['recents'] = $this->Home_model->getTable("",$where,"profile_recent");

			if(!empty($data['recents'])) {

				
				foreach($data['recents'] as $profiles) {
					$whr = array();
					if($flg==1) {
						$data['profiles'][$m] = $this->Profile_model->get_profile_details($profiles->viewed,$whr)[0];
						$data['profiles'][$m]->shortlisted = $this->Profile_model->checkShortlisted($my_matr_id->matrimony_id,$profiles->viewed);
						$data['profiles'][$m]->interested  = $this->Profile_model->checkInterested($my_matr_id->matrimony_id,$profiles->viewed);
					} else {
						$data['profiles'][$m] = $this->Profile_model->get_profile_details($profiles->viewer,$whr)[0];
						$data['profiles'][$m]->shortlisted = $this->Profile_model->checkShortlisted($my_matr_id->matrimony_id,$profiles->viewer);
						$data['profiles'][$m]->interested  = $this->Profile_model->checkInterested($my_matr_id->matrimony_id,$profiles->viewer);
					}
					
					
					if($flg==1) {
					$data['profiles'][$m]->photo_request  = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profiles->viewed);
				    }else{
				    $data['profiles'][$m]->photo_request  = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profiles->viewer);	
				    }
					$m = $m + 1;
				}
			}
/*echo '<pre>';
				print_r($data['profiles']);
				die();*/
			// echo '<pre>';
			// print_r($data['profiles']);
			// die();
			$settings = get_setting();
			$id_prefix = $settings->id_prefix;
			$header['title'] = "Recent Profiles | TCM".$my_matr_id->matrimony_id;
			$this->load->view('header', $header);
			$this->load->view('recent_profiles',$data);
			$this->load->view('footer');
		}
	}

	public function interested_profiles($param) {
		if($this->session->userdata('logged_in')) {
			$n = 0; $flg1=0;
			$my_matr_id = $this->session->userdata('logged_in');

			if((isset($param)) && ($param != "")) {
				if($param == "my") { 
					$flg1=1;
					$where[] = "interest_from = '".$my_matr_id->matrimony_id."'";
				} else { 
					$flg1=2;
					$where[] = "interest_to = '".$my_matr_id->matrimony_id."'";
				}	
			}

			$data['interested'] = $this->Home_model->getTable("",$where,"profile_interest");
			if(!empty($data['interested'])) {
				foreach($data['interested'] as $profiles) {
					$whr = array();
					if($flg1==1) {
						$data['profiles'][$n] = $this->Profile_model->get_profile_details($profiles->interest_to,$whr)[0];
						$data['profiles'][$n]->shortlisted = $this->Profile_model->checkShortlisted($my_matr_id->matrimony_id,$profiles->interest_to);
						$data['profiles'][$n]->interested  = $this->Profile_model->checkInterested($my_matr_id->matrimony_id,$profiles->interest_to);
					} else {
						$data['profiles'][$n] = $this->Profile_model->get_profile_details($profiles->interest_from,$whr)[0];
						$data['profiles'][$n]->shortlisted = $this->Profile_model->checkShortlisted($my_matr_id->matrimony_id,$profiles->interest_from);
						$data['profiles'][$n]->interested  = $this->Profile_model->checkInterested($my_matr_id->matrimony_id,$profiles->interest_from);
					}
					
					
					if($flg1==1) {
					$data['profiles'][$n]->photo_request  = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profiles->interest_to);
					}else{
					$data['profiles'][$n]->photo_request  = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profiles->interest_from);
					}
					$n = $n + 1;
				}
			}
			$header['title'] = "Interested Profiles | TCM".$my_matr_id->matrimony_id;
			$this->load->view('header', $header);
			$this->load->view('interested_profiles',$data);
			$this->load->view('footer');
		}
	}

	public function shortlisted_profiles($param) {
		if($this->session->userdata('logged_in')) {
			$p = 0; $flg2=0;
			$my_matr_id = $this->session->userdata('logged_in');

			if((isset($param)) && ($param != "")) {
				if($param == "my") { 
					$flg2=1;
					$where[] = "shot_lister = '".$my_matr_id->matrimony_id."'";
				} else { 
					$flg2=2;
					$where[] = "shot_listed = '".$my_matr_id->matrimony_id."'";
				}	
			}

			$data['recents'] = $this->Home_model->getTable("",$where,"profile_shortlist");
			if(!empty($data['recents'])) {
				foreach($data['recents'] as $profiles) {
					$whr = array();
					if($flg2==1) {
						$data['profiles'][$p] = $this->Profile_model->get_profile_details($profiles->shot_listed,$whr)[0];
						$data['profiles'][$p]->shortlisted = $this->Profile_model->checkShortlisted($my_matr_id->matrimony_id,$profiles->shot_listed);
						$data['profiles'][$p]->interested  = $this->Profile_model->checkInterested($my_matr_id->matrimony_id,$profiles->shot_listed);
					} else {
						$data['profiles'][$p] = $this->Profile_model->get_profile_details($profiles->shot_lister,$whr)[0];
						$data['profiles'][$p]->shortlisted = $this->Profile_model->checkShortlisted($my_matr_id->matrimony_id,$profiles->shot_lister);
						$data['profiles'][$p]->interested  = $this->Profile_model->checkInterested($my_matr_id->matrimony_id,$profiles->shot_lister);
					}
					
					
					if($flg2==1) {
					$data['profiles'][$p]->photo_request  = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profiles->shot_listed);
					}else{
						$data['profiles'][$p]->photo_request  = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profiles->shot_lister);
					}
					$p = $p + 1;
				}
			}
			$header['title'] = "Shortlisted Profiles | TCM".$my_matr_id->matrimony_id;
			$this->load->view('header', $header);
			$this->load->view('shortlisted_profiles',$data);
			$this->load->view('footer');
		}
	}
	public function my_shortlisted_profiles() {
		if($this->session->userdata('logged_in')) {
			$p = 0; $flg2=1;
			$my_matr_id = $this->session->userdata('logged_in');

			// if((isset($param)) && ($param != "")) {
			// 	if($param == "my") { 
			// 		$flg2=1;
			// 		$where[] = "shot_lister = '".$my_matr_id->matrimony_id."'";
			// 	} else { 
			// 		$flg2=2;
			// 		$where[] = "shot_listed = '".$my_matr_id->matrimony_id."'";
			// 	}	
			// }

			// $data['recents'] = $this->Home_model->getTable("",$where,"profile_shortlist");
			$data['recents']=$this->Profile_model->mycheckShortlisted($my_matr_id->matrimony_id);
			 //echo "<pre>";print_r($data['recents']);echo "</pre>";exit;
			if(!empty($data['recents'])) {
				foreach($data['recents'] as $profiles) {
					$whr = array();
					if($flg2==1) {
						$data['profiles'][$p] = $this->Profile_model->get_profile_details($profiles->shot_listed,$whr)[0];
						$data['profiles'][$p]->shortlisted = $this->Profile_model->checkShortlisted($my_matr_id->matrimony_id,$profiles->shot_listed);
						$data['profiles'][$p]->interested  = $this->Profile_model->checkInterested($my_matr_id->matrimony_id,$profiles->shot_listed);
					} else {
						$data['profiles'][$p] = $this->Profile_model->get_profile_details($profiles->shot_lister,$whr)[0];
						$data['profiles'][$p]->shortlisted = $this->Profile_model->checkShortlisted($my_matr_id->matrimony_id,$profiles->shot_lister);
						$data['profiles'][$p]->interested  = $this->Profile_model->checkInterested($my_matr_id->matrimony_id,$profiles->shot_lister);
					}
					
					
					if($flg2==1) {
					$data['profiles'][$p]->photo_request  = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profiles->shot_listed);
					}else{
						$data['profiles'][$p]->photo_request  = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profiles->shot_lister);
					}

					$p = $p + 1;
				}
			}
			// echo $my_matr_id->matrimony_id;
			// $data['profiles']=$this->Profile_model->mycheckShortlisted($my_matr_id->matrimony_id);
			// echo "<pre>";print_r($data['profiles']);echo "</pre>";exit;
			$header['title'] = "Shortlisted Profiles | TCM".$my_matr_id->matrimony_id;
			$this->load->view('header', $header);
			$this->load->view('my_shortlisted_profiles',$data);
			$this->load->view('footer');
		}
	}

	public function send_interest() {
		if($this->session->userdata('logged_in')) {
			$td_date = date('Y-m-d H:i:s', time());
			$my_matr_id = $this->session->userdata('logged_in');
			$to_matr_id = $this->input->post('matr_id');
			$intrst_count = $this->Profile_model->CheckCount($my_matr_id->matrimony_id,"interest_from","profile_interest","total_interest");
			if($intrst_count>0) {
				$ins_arr_2  = array("interest_from"=>$my_matr_id->matrimony_id,
									"interest_to"=>$to_matr_id,
									"interest_datetime"=>$td_date);
				$rets = $this->Home_model->insertTable($ins_arr_2,"profile_interest");
				if($rets) {
					$do_delete_sent_mail = $this->Profile_model->do_delete_sent_int($my_matr_id->matrimony_id,$intrst_count);
				 	$ins_arr_3 = array("history_type"=>"INTEREST_SENT",
				 					"history_foreign" => $rets,
									"history_from"=>$my_matr_id->matrimony_id,
									"history_to"=>$to_matr_id,
									"history_status"=> 0,
									"history_message"=>"",
									"history_datetime"=>$td_date);
					$this->Profile_model->insertHistory($ins_arr_3);
				}
				echo json_encode("success");
			} else { echo json_encode("failed"); }
		} else { redirect(base_url()); }
	}

	public function shortlist() {
		if($this->session->userdata('logged_in')) {
			$td_date = date('Y-m-d H:i:s', time());
			$my_matr_id = $this->session->userdata('logged_in');
			$to_matr_id = $this->input->post('matr_id');
			$ins_arr_2  = array("shot_lister"=>$my_matr_id->matrimony_id,
								"shot_listed"=>$to_matr_id,
								"short_list_datetime"=>$td_date);
			$this->Home_model->insertTable($ins_arr_2,"profile_shortlist");
		} else { redirect(base_url()); }
	}
	public function remove_shortlist() {
		if($this->session->userdata('logged_in')) {
			$td_date = date('Y-m-d H:i:s', time());
			$my_matr_id = $this->session->userdata('logged_in');
			$to_matr_id = $this->input->post('matr_id');
			$ins_arr_2  = array("shot_lister"=>$my_matr_id->matrimony_id,
								"shot_listed"=>$to_matr_id);
			$this->db->where($ins_arr_2);
			$this->db->delete('profile_shortlist');
			//$this->Home_model->insertTable($ins_arr_2,"profile_shortlist");
		} else { redirect(base_url()); }
	}

public function set_privacy() {
	    $my_matr_id = $this->session->userdata('logged_in');
		$mat_id = $my_matr_id->matrimony_id;
		$data['privacy']= $this->Profile_model->get_photo_privacy($mat_id);
		$header['title'] = "upload Profile Picture";
		$this->load->view('header', $header);
		$this->load->view('addphoto',$data);
		$this->load->view('footer');
		 if($_POST){ 
			  $data = $_POST;
			 $result = $this->Profile_model->set_privacy($data, $mat_id);
			}
	}

	public function upload_profile_pic() {
		$my_matr_id = $this->session->userdata('logged_in');
	    $mat_id=$my_matr_id->matrimony_id;
		$data['privacy']= $this->Profile_model->get_photo_privacy($mat_id);
		$header['title'] = "upload Profile Picture";
		$this->load->view('header', $header);
		$this->load->view('addphoto',$data);
		$this->load->view('footer');
	}

public function upload_photo() {
		if($this->session->userdata('logged_in')) {
			$data = $_POST;
 
			//$user = $this->session->userdata('user_id');//print_r($user);die;
			//$data['user_id'] = $user->user_id;
			$user = $this->session->userdata('logged_in');
			if($user->user_id!='') { $user1 = $user->user_id; } else { $user1 = $this->session->userdata('ins_id'); }
			$data['user_id'] = $user1;
			$config = set_upload_optionscategory('assets/uploads/profile_pics');
			$new_name = time()."_".$_FILES["image"]['name'];
			$config['file_name'] = $new_name;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image'))	{
			    //print_r($this->upload->display_errors());die();
			$this->session->set_flashdata('message', array('message' => 'Error Occured While Uploading Files','class' => 'danger'));
			redirect(base_url().'Profile/upload_profile_pic');
			}
			else 
			{
				$upload_data = $this->upload->data();
				$data['pic_name'] = $new_name;
				$data['pic_location'] = $config['upload_path']."/".$upload_data['file_name'];
				$data['pic_datetime'] = date('Y-m-d H:i:s', time());
				$result = $this->Profile_model->insert_profile_pic($data);
				if($result) {
					//echo "<script>alert('Photo Uploaded Successfully.Your photo will appear only after admin approval..Thank you...')</script>";
					/*$logg = $this->session->userdata('logged_in');
					$logg->profile_photo = $data['pic_location'];
					$this->session->set_userdata('logged_in',$logg);*/

					header("refresh:0;url=../profile/my_profile");
				}
				else 
				{
				    echo $data;
				    echo "Somthing went wrong..."; 
				    echo $data;
				}
			}
		} else { redirect(base_url()); }
	}
	public function upload_photo_dummy() {
	//	if($this->session->userdata('logged_in')) {
	//		$data = $_POST;
 
			//$user = $this->session->userdata('user_id');//print_r($user);die;
			//$data['user_id'] = $user->user_id;
			$user = $this->session->userdata('logged_in');
			if($user->user_id!='') { $user1 = $user->user_id; } else { $user1 = $this->session->userdata('ins_id'); }
			$data['user_id'] = $user1;
			$config = set_upload_optionscategory('assets/uploads/profile_pics');
			$new_name = time()."_".$_FILES["image"]['name'];
			$config['file_name'] = $new_name;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image'))	{
			    //print_r($this->upload->display_errors());die();
			$this->session->set_flashdata('message', array('message' => 'Error Occured While Uploading Files','class' => 'danger'));
			redirect(base_url().'home/registration_details');
			}
			else 
			{
				$upload_data = $this->upload->data();
				$data['pic_name'] = $new_name;
				$data['pic_location'] = $config['upload_path']."/".$upload_data['file_name'];
				$data['pic_datetime'] = date('Y-m-d H:i:s', time());
				$result = $this->db->insert('profile_pic_verification', $data); 
			}
			//	$result = $this->Profile_model->insert_profile_pic($data);
		/*		if($result) {
					//echo "<script>alert('Photo Uploaded Successfully.Your photo will appear only after admin approval..Thank you...')</script>";
					//*$logg = $this->session->userdata('logged_in');
				//	$logg->profile_photo = $data['pic_location'];
				//	$this->session->set_userdata('logged_in',$logg);

					header("refresh:0;url=../profile/my_profile");
				}
				else 
				{
				    echo $data;
				    echo "Somthing went wrong..."; 
				    echo $data;
				}  */
			
	//	} else { redirect(base_url()); }
	}








 private function set_upload_options() {   
		//upload an image options
		$config = array();
		$config['upload_path'] = 'assets/uploads/gallery';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '5000';
		$config['overwrite']     = FALSE;
	
		return $config;
	}	
	public function upload_multi_image() {

		$header['title'] = "upload Multiple Picture";
		$this->load->view('header', $header);
		$my_matr_id = $this->session->userdata('logged_in');
	    $matr_id=$my_matr_id->matrimony_id;
		$data['gallery'] = $this->Profile_model->get_gallery_details($matr_id);
		$whr = array();
		$data['profile'] = $this->Profile_model->get_profile_details($matr_id,$whr)[0];
		$this->load->view('multiple_image',$data);
		$this->load->view('footer');
	}

	public function upload_multi_photo() {
		if($this->session->userdata('logged_in')) {
			$my_matr_id = $this->session->userdata('logged_in');
			$data['user_id'] = $my_matr_id->matrimony_id;
			$files = $_FILES;
			$cpt = count($_FILES['shopimage']['name']);
			
			for($i=0; $i<$cpt; $i++) {           
				
				$_FILES['shopimage']['name']=$data['user_id']."-".$files['shopimage']['name'][$i];
				$_FILES['shopimage']['type']= $files['shopimage']['type'][$i];
				$_FILES['shopimage']['tmp_name']= $files['shopimage']['tmp_name'][$i];
				$_FILES['shopimage']['error']= $files['shopimage']['error'][$i];
				$_FILES['shopimage']['size']= $files['shopimage']['size'][$i];  
				
				$config = $this->set_upload_options();
				
				//$data['image_path'] = base_url().$config['upload_path']."/".$_FILES['shopimage']['name'];
				
				$this->load->library('upload');
				$this->upload->initialize($config);
				
				if ( ! $this->upload->do_upload('shopimage')) {
					//$result = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message', array('message' => 'Error Occured While Uploading Files','class' => 'danger'));
				}
				else {

				    
					$upload_data = $this->upload->data();
					$data['image_path'] = $config['upload_path']."/".$upload_data['file_name'];
					$data['date_time'] = date('Y-m-d H:i:s', time());
					array_walk($data, "remove_html");									
					$this->session->set_flashdata('message', array('message' => 'Images Uploaded Successfully.Images Will Be Displayed After Approval','class' => 'success'));
					$result = $this->Profile_model->save_gallery($data);
					
					//$result = array('upload_data' => $this->upload->data());
				}
			}
			redirect(base_url().'Profile/upload_multi_image');
	}
}
 private function set_upload_badge() {   
		//upload an image options
		$config = array();
		$config['upload_path']   = 'assets/uploads/proofs';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|txt|pdf|docx|doc';
		$config['max_size']      = '5000';
		$config['overwrite']     = FALSE;
	
		return $config;
	}
  public function upload_badge() {
		$header['title'] = "upload Badge";
		$this->load->view('header', $header);
		$this->load->view('add_badge');
		$this->load->view('footer');
	}
	public function upload_multi_badge() {
		if($this->session->userdata('logged_in')) {
			$my_matr_id = $this->session->userdata('logged_in');
			$name = $my_matr_id->profile_name;
			$data = $_POST;
			$data['user_id'] = $my_matr_id->matrimony_id;
			$files = $_FILES;
			$cpt = count($_FILES['badge']['name']);
			$settings = get_setting();
			$id_prefix = $settings->id_prefix;
			for($i=0; $i<$cpt; $i++) {           
				
				$_FILES['badge']['name']=$id_prefix.$data['user_id']."-".$name."-".$files['badge']['name'][$i];
				$_FILES['badge']['type']= $files['badge']['type'][$i];
				$_FILES['badge']['tmp_name']= $files['badge']['tmp_name'][$i];
				$_FILES['badge']['error']= $files['badge']['error'][$i];
				$_FILES['badge']['size']= $files['badge']['size'][$i];  
				
				$config = $this->set_upload_badge();
				
				//$data['image_path'] = base_url().$config['upload_path']."/".$_FILES['shopimage']['name'];
				
				$this->load->library('upload');
				$this->upload->initialize($config);
				
				if ( ! $this->upload->do_upload('badge')) {
					//$result = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message', array('message' => 'Error Occured While Uploading Files','class' => 'danger'));
				}
				else {
					$upload_data = $this->upload->data();
					$data['proof_path'] = $config['upload_path']."/".$upload_data['file_name'];
					$data['date_time'] = date('Y-m-d H:i:s', time());
					$data['idproof']=$_POST['idproof'];
					array_walk($data, "remove_html");
					$this->session->set_flashdata('message', array('message' => 'Images Uploaded Successfully','class' => 'success'));
					$result = $this->Profile_model->save_badge($data);
					
					//$result = array('upload_data' => $this->upload->data());
				}
			}
			redirect(base_url().'Profile/upload_badge');
	}
}

	public function request_photo() {
		if($this->session->userdata('logged_in')) {
			if($_POST) {
				$my_matr_id = $this->session->userdata('logged_in');
				$td_date = date('Y-m-d H:i:s', time());
				$ins_arr_3 = array("photo_request_from" => $my_matr_id->matrimony_id,
								   "photo_request_to" => $_POST['request_to'],
								   "photo_request_datetime" => $td_date);			
				$result = $this->Profile_model->insert_photo_request($ins_arr_3);
				if($result) {
				 $ins_arr_4 = array("history_type"=>"PHOTO_REQUEST",
				 					"history_foreign" => $result,
									"history_from"=>$my_matr_id->matrimony_id,
									"history_to"=> $_POST['request_to'],
									"history_status"=> 0,
									"history_message"=> "",
									"history_datetime"=>$td_date);
					$this->Profile_model->insertHistory($ins_arr_4); 
				}
				echo json_encode("success");
			} else { redirect(base_url()); }
		} else { redirect(base_url()); }
	}


	public function send_mail() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		if($this->session->userdata('logged_in')) {
			if($_POST) {
			$my_matr_id = $this->session->userdata('logged_in');
			$td_date = date('Y-m-d H:i:s', time());

			$intrst_count = $this->Profile_model->CheckCount($my_matr_id->matrimony_id,"mail_from","profile_mails","total_sendmail");
			if($intrst_count>0) {

				$ins_arr_3 = array("mail_from" => $my_matr_id->matrimony_id,
								   "mail_to" => $_POST['mail_to'],
								   "mail_content" => $_POST['mail_content'],
								   "mail_datetime" => $td_date);			
				$result = $this->Profile_model->insert_mail($ins_arr_3);
				if($result) {
					$do_delete_sent_mail = $this->Profile_model->do_delete_sent_mail($my_matr_id->matrimony_id,$intrst_count);
				 $ins_arr_4 = array("history_type"=>"MESSAGE_SENT",
				 					"history_foreign" => $result,
									"history_from"=>$my_matr_id->matrimony_id,
									"history_to"=>$_POST['mail_to'],
									"history_status"=> 1,
									"history_message"=> $_POST['mail_content'],
									"history_datetime"=>$td_date);
					$this->Profile_model->insertHistory($ins_arr_4); 
				}
				echo json_encode("success");
			} else { echo json_encode("failed"); }
		} else { redirect(base_url()); }
		} else { redirect(base_url()); }
	}

	public function inbox() {
		if($this->session->userdata('logged_in')) {
			$my_matr_id = $this->session->userdata('logged_in');

			$data['inbox_pending'] = $this->get_inbox_pending($my_matr_id);
			$data['inbox_accepted'] = $this->get_inbox_accepted($my_matr_id);
			$data['inbox_declined'] = $this->get_inbox_declined($my_matr_id);
			$data['sent_all'] = $this->get_sent_all($my_matr_id);
			
			$data['sent_awaiting'] = $this->get_sent_awaiting($my_matr_id);

			$data['trash'] = $this->get_trash($my_matr_id);
		
			$header['title'] = "Messages | Pending | TCM".$my_matr_id->matrimony_id;
			$this->load->view('header', $header);
			$this->load->view('messages',$data);
			$this->load->view('footer');
		} else { redirect(base_url()); }
	}

	public function get_inbox_pending($my_matr_id) {
		$result = array();
		$where[] = "history.trash='0' && history.history_to = '".$my_matr_id->matrimony_id."'";
		$group_by = "history.history_from";
		$member = "from";
		$data = $this->Profile_model->get_inbox($where,$group_by,0,$member,"",""); // where, group by, condition | pending
		//print_r($data);
		foreach($data as $profile) {
			$count  = $this->total_conversations($profile->matrimony_id);
			$profile->photo_request = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profile->matrimony_id);
			//var_dump($profile->photo_request); die();
			$profile->history  = $count; // die();
		}
		
		return $data;
	}

	public function get_inbox_accepted($my_matr_id) {
		$result = array();
		$where[] = "history.trash='0' && history.history_to = '".$my_matr_id->matrimony_id."'";
		$group_by = "history.history_from";
		$member = "from";
		$data = $this->Profile_model->get_inbox($where,$group_by,1,$member,"","");
		foreach($data as $profile) {
			$count  = $this->total_conversations($profile->matrimony_id);
			$profile->photo_request = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profile->matrimony_id);
			$profile->history  = $count; // die();
		}
		return $data;
	}

	public function get_inbox_declined($my_matr_id) {
		$result = array();
		$where[] = "history.trash='0' && history.history_from = '".$my_matr_id->matrimony_id."'";
		$group_by = "history.history_to";
		$member = "to";
		$data = $this->Profile_model->get_inbox($where,$group_by,2,$member,"","");//print_r($data);die;
		foreach($data as $profile) {
			$count  = $this->total_conversations($profile->matrimony_id);
			$profile->photo_request = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profile->matrimony_id);
			$profile->history  = $count; // die();
		}
		return $data;
	}

	public function get_sent_all($my_matr_id) {
		$result = array();
		$where[] = "history.trash='0' && history.history_from = '".$my_matr_id->matrimony_id."'";
		$group_by = "history.history_to";
		$member = "to";
		$data = $this->Profile_model->get_inbox($where,$group_by,20,$member,"","");
		foreach($data as $profile) {
			$count  = $this->total_conversations($profile->matrimony_id);
			$profile->photo_request = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profile->matrimony_id);
			$profile->history  = $count; // die();
		}
		return $data;
	}

	public function get_sent_awaiting($my_matr_id) {
		$result = array();
		$where[] = "history.history_from = '".$my_matr_id->matrimony_id."'";
		$group_by = "history.history_to";
		$member = "to";
		$data = $this->Profile_model->get_inbox($where,$group_by,0,$member,"","");
		foreach($data as $profile) {
			$count  = $this->total_conversations($profile->matrimony_id);
			$profile->photo_request = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profile->matrimony_id);
			$profile->history  = $count; // die();
		}
		return $data;
	}

	public function get_trash($my_matr_id) {
		$result = array(); $where = array();
		$where[]="history.history_from = '".$my_matr_id->matrimony_id."' OR history.history_to = '".$my_matr_id->matrimony_id."' ";
		$group_by = "history.history_to";
		$member = "common";
		$data = $this->Profile_model->get_inbox1($where,$group_by,1,$member,"",$my_matr_id->matrimony_id);//zecho $this->db->last_query();die;
	
		foreach($data as $profile) {
			$count  = $this->total_conversations($profile->matrimony_id);//print_r($count);die;
			
			$profile->photo_request = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$profile->matrimony_id);
			$profile->history  = $count; // die();
			//print_r($profile->history);die;
		}
		
		return $data;
		
	}

	public function all_sent_messages($my_matr) {
		// $where[] = "profile_mails.mail_from = '".$my_matr."'";
		// $group_by = "profile_mails.mail_to";
		// $data['msgs']= $this->Profile_model->get_mails($where,$group_by);
		// /*foreach($data['msgs'] as $msgs) {
		// 	$data['profile'][] = $this->Profile_model->get_profile_details($msgs->mail_to,"");
		// }*/
		// ($data);
		//return $data;
	}

	public function total_conversations($to_matr_id) {
		
		$my_matr_id = $this->session->userdata('logged_in');
		$mat_id = $my_matr_id->matrimony_id;
		$data = $this->Profile_model->get_inbox_count($mat_id,$to_matr_id);
		return $data;
	}

	public function load_messages() {
		if($this->session->userdata('logged_in')) {
			$html = ""; $btn1 = ""; $btn2= "";

			$uid = $_GET['id']; $type = $_GET['type'];
			$my_matr_id = $this->session->userdata('logged_in');
			$mat_id = $my_matr_id->matrimony_id;

			$hist  = $this->total_conversations($uid); 
				foreach($hist as $msgs) { 
					if(($uid == $msgs->history_from) && ($mat_id == $msgs->history_to)) {
						if($msgs->history_type == "INTEREST_SENT") {
							$short = "INTEREST RECEIVED";
							$message = "TCM".$uid." is interested in your profile.";
							$btn1 = "<a href=".base_url()."profile/interest_decision/interest/".$msgs->history_id."/".$msgs->history_foreign."/1 class='wed-thread-btnbay'>Accept</a>";
							$btn2= "<a href=".base_url()."profile/interest_decision/interest/".$msgs->history_id."/".$msgs->history_foreign."/2 class='wed-thread-btnbay'>Not Interested</a>";
							$align= "sender";
						} else if($msgs->history_type == "MESSAGE_SENT") {
							$short = "MESSAGE RECEIVED";
							$message = $msgs->history_message."<br/><small>Would you like to accept it?</small>";
							$btn1 =  "<a href=".base_url()."profile/interest_decision/message/".$msgs->history_id."/".$msgs->history_foreign."/1 class='wed-thread-btnbay'>Accept</a>";
							$btn2= "<a href=".base_url()."profile/interest_decision/message/".$msgs->history_id."/".$msgs->history_foreign."/2 class='wed-thread-btnbay'>Not Interested</a>";
							$align= "sender";
						} else if($msgs->history_type == "PHOTO_REQUEST") {
							$short = "PHOTO REQUEST RECEIVED";
							$message = "TCM".$uid." Requested to view your photo. <br/><small>Would you like to accept it?</small>";
							$btn1 = "<a href=".base_url()."profile/interest_decision/photo/".$msgs->history_id."/".$msgs->history_foreign."/1 class='wed-thread-btnbay'>Accept</a>";
							$btn2= "<a href=".base_url()."profile/interest_decision/photo/".$msgs->history_id."/".$msgs->history_foreign."/2 class='wed-thread-btnbay'>Not Interested</a>";
							$align= "sender";
						} else {}
						
						if($msgs->history_status == 1) {
							$btn1 = "Accepted";
							$btn2= "";
						} else if($msgs->history_status == 2) {
							$btn1 = "Declined";
							$btn2= "";
						}
					} else if(($mat_id == $msgs->history_from) && ($uid == $msgs->history_to)) {
						if($msgs->history_type == "INTEREST_SENT") {
							$short = "INTEREST SENT";
							$message = "You have sent a interest.";
							$align= "receiver";
						} else if($msgs->history_type == "MESSAGE_SENT") {
							$short = "MESSAGE SENT";
							$message = "You have sent a Message.";
							$align= "receiver";
						} else if($msgs->history_type == "PHOTO_REQUEST") {
							$short = "PHOTO REQUEST SENT";
							$message = "You have sent a Photo Request.";
							$align= "receiver";
						} else {}

						if($msgs->history_status == 0) {
							$btn1 = "Pending";
							$btn2= "";
						} else if($msgs->history_status == 1) {
							$btn1 = "Accepted";
							$btn2= "";
						}
						else if($msgs->history_status == 2) {
							$btn1 = "Declined";
							$btn2= "";
						}
					} else { 
					 	$short = "";
						$message = ""; 
						$align= "sender";
					}


					$html.= "<div class='wed-thread-right ".$align."'>
								<div class='wed-thread-message'>".$short."<br/>"
								.$message."<span class='msg-date'>".$msgs->history_datetime."</span>
								<div class='buttons wed-thread-btn-bay'>".$btn1." ".$btn2."</div>
								</div>
								<br><div class='clearfix'></div></div>";
					$html.= "<br/><br/>";
				}
				echo $html;
		}
	}

	public function trash_messages() {
		$uid = $_POST;//print_r($uid);die;
		$my_matr_id = $this->session->userdata('logged_in');
		$mat_id = $my_matr_id->matrimony_id;
		$hist  = $this->Profile_model->trash_conversations($mat_id,$uid['id']);
		if($hist) { //return 1; 
		redirect(base_url()."profile/inbox?inbox");
		
		}
	}
	public function messages1() {
		$uid = $_POST;//print_r($uid);die;
		$my_matr_id = $this->session->userdata('logged_in');
		$mat_id = $my_matr_id->matrimony_id;
		$hist1  = $this->Profile_model->trash_conversations($mat_id,$uid['id']);
		
		if($hist1) { //return 1; 
		$template['res'] = $this->Profile_model->trash_conversations($mat_id,$uid['id']);
		$this->load->view('view-awaitingreply', $template);
		}
		
	}
	public function restore() {
		$uid = $_POST;//print_r($uid);die;
		$my_matr_id = $this->session->userdata('logged_in');
		$mat_id = $my_matr_id->matrimony_id;
		$hist  = $this->Profile_model->restore_conversations($mat_id,$uid['id']);
		if($hist) { //return 1;
			 redirect(base_url()."profile/inbox?trash");
				//return 1;

		}
	}
	public function allrestore() { 
		$uid = $_POST;
		$my_matr_id = $this->session->userdata('logged_in');
		$mat_id = $my_matr_id->matrimony_id;
		$hist  = $this->Profile_model->restoreall_conversations($mat_id,$uid);
		if($hist) { return 1;
			 //redirect(base_url()."profile/inbox?trash");
	

		}
	}
	public function alldelete() { 
		$uid = $_POST;
		//print_r($uid['matid']);die;
		$my_matr_id = $this->session->userdata('logged_in');
		$mat_id = $my_matr_id->matrimony_id;
		$hist  = $this->Profile_model->deleteall_conversations($mat_id,$uid['matid']);
		if($hist) { return 1;
		}
	}

	public function interest_decision($hist_type,$hist_id,$forgn_id,$flag) {
		if($flag == 1 || $flag == 2) {
			$this->Profile_model->updateHistory($hist_type,$hist_id,$forgn_id,$flag);
			redirect(base_url()."profile/inbox");
		}
	}

	public function communications() {
		$header['title'] = "Messages | Pending | TCM".$my_matr_id->matrimony_id;
		$this->load->view('header', $header);
		$this->load->view('communications');
		$this->load->view('footer');
	}

		public function photo_add()
	{
	    
		$template['page_title'] = "Profiledetail";  
		$template['page'] = "addphoto"; 		
		$this->load->view('template', $template);                     
	}


	public function add_hobbies() {
		$header['title'] = "upload Profile Picture";
		$this->load->view('header', $header);
		$my_matr_id = $this->session->userdata('logged_in');
		$result['data']=$this->Profile_model->hobbies_details($my_matr_id->matrimony_id);
		$this->load->view('hobbies',$result);
		$this->load->view('footer');
	}

		public function profile_instant_view($matr_id = 0) {
	//if(($this->session->userdata('logged_in')) || ($this->session->userdata('logged_in_admin'))) {
		if($matr_id) {
			$whr = array();
			$my_matr_id = $this->session->userdata('logged_in');
			$header['title'] = "Profile Details | TCM".$matr_id;
			$data['profile'] = $this->Profile_model->get_profile_details($matr_id,$whr);
			$data['gallery'] = $this->Profile_model->get_gallery_details($matr_id);

			if($this->session->userdata('logged_in')) {
				$data['similar'] = $this->similar_profiles($matr_id);
				$data['membership'] = $this->Profile_model->get_membership_details($my_matr_id->matrimony_id);
			$data['profile'][0]->shortlisted = $this->Profile_model->checkShortlisted($my_matr_id->matrimony_id,$matr_id);
			$data['profile'][0]->interested  = $this->Profile_model->checkInterested($my_matr_id->matrimony_id,$matr_id);
				$this->Profile_model->insertRecents($my_matr_id->matrimony_id,$matr_id);
			}
			$data['data']=$this->Profile_model->hobbies_details($matr_id);
			//echo "<pre>"; print_r($data);
			$this->load->view('header', $header);
			$this->load->view('profiledetail_instant',$data);
			$this->load->view('footer');
		} else { echo "Profile Not Found"; }
	//} else { redirect(base_url()); }
	}

 function sending_mail($from,$name,$mail,$sub, $msg) { 
// $ci =& get_instance(); 
// $finresult = get_settings_details(1); 
 // $config['protocol'] = 'smtp';
 // $config['smtp_host'] = 'smtp.techlabz.in'; 
 // $config['smtp_user'] = 'no-reply@techlabz.in'; 
 // $config['smtp_pass'] = 'baAEanx7'; 
 // $config['smtp_port'] = 465; 
 // $config['mailtype'] = 'html'; 
 // $this->email->initialize($config); 
 // $this->email->from($from, $name); 
 // $this->email->to($mail); 
 // $this->email->subject($sub);
 //  $this->email->message($msg); 
 //  $this->email->send(); //echo $this->email->print_debugger(); 

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

	public function mail_sending() {
	
	 $data=$_POST;  
	 $forward_id=$data['forward_id'];
	 $forward_name=$data['forward_name'];
	 $mail_from=$data['mail_from'];
	 $mail_content=$data['mail_content'];
	 $profile_photo=$data['profile_photo']; 
	 $from= 'no-reply@techlabz.in'; 
	 $name=$data['recipient_name']; 
	 $sub="Take a look at ".$forward_id." on Telugumatrimony. You might be interested";
	 $email=$data['recipient_mailid']; 
	// $template['data']=$data; 
		  $mailTemplate='	<div class="email-temp-wrapper" style="width:800px;margin:0 auto;border:1px solid #c02c48;border-radius:5px;    padding: 10px;">
			<div class="email-temp-logo-div">
				<img src="http://182.74.149.58/Akhil/Wedding_web_akhil/assets/img/wed-logo.jpg" style="width:120px;">
			</div>
			<div class="email-temp-head" style="background:#c02c48;border-top-left-radius:20px;border-top-right-radius:5px;
border-bottom-left-radius:5px;border-bottom-right-radius:20px;padding: 10px;margin-bottom:20px;">
				<h4 style="color:#fff;font-family: "Roboto", sans-serif;font-weight:400;margin: 0px;font-size: 28px;padding-left: 20px;">Forwarded Profile for you !</h4>
			</div>
			<div class="email-temp-content" style="border:1px solid #c02c48;border-radius:3px;border-top-left-radius:20px;border-top-right-radius:5px;
border-bottom-left-radius:5px;border-bottom-right-radius:20px;font-family: "Roboto", sans-serif;padding: 25px;">
				<strong style="font-style:italic;">Hi '.$name.'</strong><br>
				<p style="color: #4d4d4d;">'.$mail_from.' has forwarded the below profile from Pellithoranam.com thinking it might interest you.</p>
				<p style="color: #4d4d4d;">Click on the member ID to view the full details of a profile. Also if you would like to view similar profiles, visit <a href="#" style="text-decoration:none;color:#c02c48;font-style:italic;font-weight:500;">Pellithoranam.com</a> and access millions of profiles of eligible brides and grooms.</p>
				<br>
				
				<p style="color:#c02c48;font-style:italic;font-weight:500;">'.$mail_from.' Message</p>
				
				<div class="email-temp-message" style="border-radius:3px;border-top-left-radius:20px;border-top-right-radius:5px;
border-bottom-left-radius:5px;border-bottom-right-radius:20px;font-family: "Roboto", sans-serif;    background: rgba(199,44,74,0.4);color:#fff;padding:15px;">
				'.$mail_content.'
				</div>
				<div class="email-profile" style="margin-top:10px;">
					<div class="email-profile-pic" style="width:120px;height:120px;float:left;">
					<img src="http://182.74.149.58/Akhil/Wedding_web_akhil/'.$profile_photo.'" style="width:100%;height:100%;object-fit:cover;">
					
					</div>
					<div class="email-profile-details" style="float: left;width: 80%;padding: 10px;">
					<h4 style="font-family: "Roboto", sans-serif;font-weight:500;color:#c02c48;margin:0px;font-size: 18px;
">'.$forward_name.'</h4>
					<p style="color: #4d4d4d;">TCM'.$forward_id.' </p>
					<a href="182.74.149.58/Akhil/Wedding_web_akhil/profile/profile_instant_view/'.$forward_id.'">Full Profile>></a>
					</div>
					<div style="clear:both;"></div>
				</div>
				<div class="email-temp-matrimony-info" style="font-family: "Roboto", sans-serif;    background: rgba(199,44,74,0.4);color:#fff;padding:15px;text-align:justify;font-weight:400;font-size: 14px;margin-top:10px;">
				Pellithoranam.com is celebrated as the Most Trusted Matrimony Brand combining tradition and technology. A network of 15 regional portals and over 2 crore members, Catholicmatrimony has found a place in the Limca Book of Records for record number of documented marriages online.
				</div>
				<div class="email-temp-dwnload-app" style="margin-top:20px;text-align:center;">
				<p style="color:#c02c48;font-weight:600;font-style:italic;font-size:18px;">Finding you soulmate becomes easier with our app, Download for free</p>
				<li style="display:inline-block;">
					<img src="http://182.74.149.58/Akhil/Wedding_web_akhil/assets/img/googleplay.png">
				</li>
				<li style="display:inline-block;">
					<img src="http://182.74.149.58/Akhil/Wedding_web_akhil/assets/img/appstore.png">
				</li>
				</div>
			</div>
			
		</div>';

	  $this->sending_mail($from,$name,$email,$sub,$mailTemplate);

	  	$this->session->set_flashdata('message',array('message' => 'Mail Sent Successfully','class' => 'success'));
					     
	
	  //echo "<script type='text/javascript'>alert('success!')</script>";
	  redirect(base_url().'profile/profile_details/'.$forward_id.''); 

	 // header('Location: '.$url.'');	




}

	public function add_mobileview() 
	{        $my_matr_id = $this->session->userdata('logged_in');
	         $mat_id=$my_matr_id->matrimony_id;
	             if($_POST) {
	    	   $data = $_POST;
	    	   $to_id=$data['mobileview_to'];
	    	   $is_zero = $this->Profile_model->CheckMobile($mat_id);

	    	   if($is_zero) {
	    	   		$intrst_count['status'] = "success";
	    	   } else {
	    	   		$intrst_count = $this->Profile_model->CheckCount($my_matr_id->matrimony_id,"mobileview_from","mobile_view","total_mobileview");
	    	   }
	    	  /* print_r($is_zero);
			   die();*/
	    	   
			if($intrst_count['status'] == "success") {
	    	   $result = $this->Profile_model->add_mobileview($data);
	    	
               echo json_encode("success");
			} else { echo json_encode("failed"); }
		} else { redirect(base_url()); }
	    	        	
	}
		public function check_sms_count() 
	{       
		$my_matr_id = $this->session->userdata('logged_in');
	            
	    	 
	    	$intrst_count = $this->Profile_model->CheckCount($my_matr_id->matrimony_id,"send_sms_from","send_sms","total_sms");
		
			if($intrst_count>0) {
	    	   
	    	
               echo json_encode("success");
			} else { echo json_encode("failed"); }
	//	else { redirect(base_url()); }
	    	        	
	}
	function send_sms(){
		$sms_contnet = $_POST['mail_content'];
		$number = "+91".$_POST['mob_num'];
		//$number = "+919966337383";
		$result_array = array();

		$rcal=$this->sent_mobile_msg($number,$sms_contnet);
		$my_matr_id = $this->session->userdata('logged_in');
		$do_delete_sent_mail = $this->Profile_model->do_delete_sent_sms($my_matr_id->matrimony_id);
		$result_array['type'] = 'success';
		$result_array['msg'] = 'Sms Sent Successfully.';
		//$result_array['sms'] = $sms_contnet;
		echo json_encode($result_array);
		exit;

	}
	public function sent_mobile_msg($mob,$msg){
	  // Account details
	//  echo $mob;
	//  echo '**-'.$msg;
	    $apiKey = urlencode('0fiLk8sAj50-F810SajAQVGv9RmBPrmYcapheCx2vT');
	    //echo $msg;
	    // Message details
	    $numbers = array($mob);
	  //  $sender = urlencode('TXTLCL');
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
		//echo $response;
	    curl_close($ch);
	    
	    // Process your response here
	    //print_r($response);
	   // echo $response;
	    //exit;

	}
	public function get_hobbies()
	{         //  $my_matr_id = $this->session->userdata('logged_in');
		if($_POST) {
			$data = $_POST;
			//  var_dump($data);
			// die();
			$result = $this->Profile_model->add_hobbies($data);

			if($result) 
			{
				echo "<script>alert('Hobbies updated successfully');</script>";
				redirect(base_url().'Profile/my_profile'); exit;		
			}
			echo "<script>alert('Hobbies updation failed');</script>";
			redirect(base_url().'Profile/my_profile'); exit;

		} else {
			echo "<script>alert('No post data submitted');</script>";
			redirect(base_url().'Profile/my_profile'); exit;
		}   
		 	            
	}
	public function add_photo()
	{
	    $my_matr_id = $this->session->userdata('logged_in');
	    $mat_id=$my_matr_id->matrimony_id;
		$template['page_title'] = "Profiledetail";  
		$template['page'] = "addphoto"; 
		$template['privacy']= $this->Profile_model->get_photo_privacy($mat_id);
		//if($_POST){
		 $data = $_POST;
				              
				 	 
							  $config = set_upload_optionscategory('assets/uploads/img');
						      $this->load->library('upload');
						
						      $new_name = time()."_".$_FILES["image"]['name'];
						      $config['file_name'] = $new_name;

							  $this->upload->initialize($config);
								
								if ( ! $this->upload->do_upload('image')) 
								  {
									
									echo "error";
									
								  }
				  else 
				  {
					
				   $upload_data = $this->upload->data();
				   $data['image'] = $config['upload_path']."/".$upload_data['file_name']; 
			
				   $result = $this->Profile_model->add_new_photo($data);
				  
				          if($result) 
				          {
						/* Set success message */
						  $this->session->set_flashdata('message',array('message' => 'Add Category Details successfully','class' => 'success'));
					      }
					      else 
						  {
						/* Set error message */
						  //$this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));  
		                  echo "errorr";
		                  }
				 
				  }
				  //}	
		$this->load->view('template', $template);                     
	}
	public function membershipinfo()
	{
	    $header['title'] = "membershipinfo";
		$this->load->view('header', $header); 
		$result['data']=$this->Profile_model->membershipinfo();
		$result['data1']=$this->Profile_model->membershipaddoninfo();
		//echo "<pre>";print_r($result['data']);die;
		$my_matr_id = $this->session->userdata('logged_in');
		$result['mobileview_count'] = $this->Profile_model->CheckCount($my_matr_id->matrimony_id,"mobileview_from","mobile_view","total_mobileview")['remaining'];
		$result['sms_count'] = $sms_count = $this->Profile_model->CheckCount($my_matr_id->matrimony_id,"send_sms_from","send_sms","total_sms")['remaining'];
		$this->load->view('membershipinfo',$result);
		$this->load->view('footer');                    
	}	

	public function get_session() {
     if($this->session->userdata('logged_in')) {
     	$my_matr_id=$this->session->userdata('logged_in');
        header('Content-type: application/json');
        echo json_encode($my_matr_id->matrimony_id) ;
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }
	
    public function get_matches() {
     if($this->session->userdata('logged_in')) {
     	$my_matr_id=$this->session->userdata('logged_in');
        $qry = "";
        $ret_users = $this->Profile_model->getMatches($my_matr_id->matrimony_id,$qry);
        $ret_usrs  = $this->match_return($my_matr_id->matrimony_id,$ret_users); 
        header('Content-type: application/json');
        echo json_encode($ret_usrs);
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function get_shortlist() {
        if($this->session->userdata('logged_in')) {
        $qry = "";       
        $my_matr_id=$this->session->userdata('logged_in');
        $im="shot_lister"; $whom="shot_listed";
        $ret_users = $this->Profile_model->getShortList($my_matr_id->matrimony_id,$qry,$im,$whom);
        $ret_usrs  = $this->match_return($my_matr_id->matrimony_id,$ret_users); 
        header('Content-type: application/json');
        echo json_encode($ret_usrs);
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }
 

     public function match_return($matr_id,$ret_users) {

       $usr_arr = array();
        if(!empty($ret_users)) {
            foreach($ret_users as $users) {
                $usr_arr[] = array("id"   => $users->profile_id,
                  "matrimony_id" => "TCM".$users->matrimony_id,
                  "name" => $users->profile_name,
                  "age"  => $users->age,
                  "height" => $users->height,
                  "city" => $users->city_name,
                  "state" => $users->state_name,
                  "country" => $users->country_name,
                  "occupation" => $users->occupation,
                  "occupation_in_detail" => $users->occupation_detail,
                  "profile_photo" => isset($users->profile_photo) ? base_url().$users->profile_photo : "",
                  "phone" => $users->phone,
                  "email" => $users->email,
                  //"is_photo_protected" => (($users->profile_preference == 1) ? true : false ),
                  "is_photo_protected" => $this->get_photo_protected($users->matrimony_id),
                  "is_photo_request_granted" =>  $this->get_photo_request($matr_id,$users->matrimony_id) );
            }
        }
        $ret_usr_arr = array('status'=>"success",
                             'data' => $usr_arr,
                             'meta' => array('total_pages' => 0,
                                             'total'       => 0,
                                             'current_page'=> 0,
                                             'per_page'    => 0));
        return $ret_usr_arr;
    }	
    public function user_info() {
        //$headers = apache_request_headers();
        $my_matr_id=$this->session->userdata('logged_in');
        $ret_users = $this->Profile_model->get_profile_details($my_matr_id->matrimony_id,"");

        if($ret_users[0]->maritial_status == 1) { $m_stat = "Never Married"; } 
        else if($ret_users[0]->maritial_status == 2) { $m_stat = "Divorced"; } 
        else if($ret_users[0]->maritial_status == 3) { $m_stat = "Widowed"; } 
        else { $m_stat = "Awaiting for Divorce"; }

        if($ret_users[0]->physical_status == 1) { $physical_status = "Normal"; } 
        else { $physical_status = "Physically Challenged"; }

        if($ret_users[0]->family_status == 1) { $family_status = "Middle Class"; } 
        else if($ret_users[0]->family_status == 2) { $family_status = "Upper Middile Class"; } 
        else if($ret_users[0]->family_status== 3) { $family_status = "Rich"; } 
        else { $family_status = "Affluent"; }

        if($ret_users[0]->family_type == 1) { $family_type = "Joint"; } 
        else { $family_type = "Nuclear"; }

        if($ret_users[0]->family_value == 1) { $family_value = "Orthodox"; } 
        else if($ret_users[0]->family_value == 2) { $family_value = "Traditional"; } 
        else if($ret_users[0]->family_value == 3) { $family_value = "Moderate"; } 
        else { $family_value = "Liberal"; }

        $ret_user_info = array('status'=>"success",
                                'data' => array("user" =>array("id" => $ret_users[0]->matrimony_id,
                  "matrimony_id" => "TCM".$ret_users[0]->matrimony_id,
                  "name" => $ret_users[0]->profile_name,
                  "gender"=> $ret_users[0]->gender,
                  "DOB"=> $ret_users[0]->dob,
                  "religion"=> $ret_users[0]->religion_name,
                  "mother_tongue"=> $ret_users[0]->mother_tongue_name,
                  "phone" =>  $ret_users[0]->phone,
                  "email" => $ret_users[0]->email,
                  "caste"=> $ret_users[0]->caste_name,
                  "sub_caste"=> $ret_users[0]->sub_caste_name,
                  "maritial_status" => $m_stat,
                  "is_willing_for_intercaste" => (($ret_users[0]->willing_intercast == 1) ? true : false ),
                  "country"=> $ret_users[0]->country_name,
                  "state"=> $ret_users[0]->state_name,
                  "city" => $ret_users[0]->city_name,
                  "height" => $ret_users[0]->height,
                  "physical_status" => $physical_status,
                  "education"=> $ret_users[0]->education,
                  "occupation" => $ret_users[0]->occupation,
                  "employed_in" => $ret_users[0]->employed_in,
                  "country_living_in" => $ret_users[0]->country_name,
                  "currency"=> "INR",
                  "income" => $ret_users[0]->income,
                  "is_having_dosham" => $ret_users[0]->have_dosham,
                  "family_status" => $family_status,
                  "family_type"=> $family_type,
                  "family_value" => $family_value,
                  "about_you" => $ret_users[0]->about_you,
                  "profile_photo" => isset($ret_users[0]->profile_photo) ? base_url().$ret_users[0]->profile_photo : "",
                  "is_phone_verified" => (($ret_users[0]->is_phone_verified == 1) ? true : false ),
                  "is_premium_member" => (($ret_users[0]->is_premium == 1) ? true : false ))));
        header('Content-type: application/json');
        echo json_encode($ret_user_info);
    }
  function get_photo_request($my_matr_id,$matr_id) {
        /*$auth = apache_request_headers()['Authorization'];         
        $my_matr_id = $this->App_model->getUser_from_Token($auth);*/
        $this->db->where('photo_request_from',$my_matr_id);
        $this->db->where('photo_request_to',$matr_id);  
        $this->db->where('photo_request_status','1');      
        $query=$this->db->get('profile_photo_request');
        $result = $query->row();
        if($result){
          return true;
        }else{
          return false;
        }         
       
}
 function get_photo_protected($matr_id) {

        $this->db->where('matrimony_id',$matr_id);  
        $this->db->where('profile_preference','1');      
        $query=$this->db->get('profiles');
        $result = $query->row();
        if($result){
          return true;
        }else{
          return false;
        }         
       
}  

	function chat()
	{
	$settings        = get_setting();
    $header['title'] = $settings->title . " | Chat";
	$this->load->view('header', $header);
	$this->load->view('chat');
	//$this->load->view('footer');
}


    public function simple_return($status,$error,$message) {
        if($status == "success") {
            $ret_msg = array('status'=>"success");
        } else {
            $ret_msg = array('status'=>"error",'error' => $error,'message' => $message);    
        }
        header('Content-type: application/json');
        echo json_encode($ret_msg);
    }

    public function interest_all(){
    	if($this->session->userdata('logged_in')) {
			$td_date = date('Y-m-d H:i:s', time());
			$my_matr_id = $this->session->userdata('logged_in');
			$where[] = "viewed = '".$my_matr_id->matrimony_id."'";
			$recents = $this->Home_model->getTable("",$where,"profile_recent");
			foreach ($recents as $rs) {
				//print_r($rs);
			
				$intrst_count = $this->Profile_model->CheckCount($my_matr_id->matrimony_id,"interest_from","profile_interest","total_interest");
				if($intrst_count['status'] == "success") {
					$ins_arr_2  = array("interest_from"=>$my_matr_id->matrimony_id,
										"interest_to"=>$rs->viewer,
										"interest_datetime"=>$td_date);
					$rets = $this->Home_model->insertTable($ins_arr_2,"profile_interest");
					if($rets) {
					 	$ins_arr_3 = array("history_type"=>"INTEREST_SENT",
					 					"history_foreign" => $rets,
										"history_from"=>$my_matr_id->matrimony_id,
										"history_to"=>$rs->viewer,
										"history_status"=> 0,
										"history_message"=>"",
										"history_datetime"=>$td_date);
						$this->Profile_model->insertHistory($ins_arr_3);	
					}
					echo json_encode("success");
				} else { echo json_encode("failed"); }
			}
		} else { echo json_encode("logged"); }

    }
	
	 public function notification_count() {
		$result = $this->Profile_model->notification_count();
    }
                             
}
