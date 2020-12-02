<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Search_model');
        $this->load->model('Home_model');
        $this->load->library("pagination"); 
        date_default_timezone_set('Asia/Kolkata');      
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);   
ini_set('memory_limit', '-1');  
    }

  public function sess() {
    print_r($this->session->userdata('filter'));
  }

	
	
  public function index() 
    { // woring search 
        $where = array(); $where1 = array(); $or_where = array(); $like = array(); $tbl ="profiles";


        if($this->session->userdata('logged_in')) { // if logged, then get from session
            $my_user = $this->session->userdata;
            $my_user = json_decode(json_encode($my_user),true);
            
            if((!(isset($_POST['search_type']))) ) {  // 
              $this->session->unset_userdata('filter');
                $basic = $this->Search_model->get_user_basic_details($my_user);

                if($basic->partner_preference == 0) { // check if she/he have set preference - not set
                    if((isset($_POST['matri_id'])) && (!empty($_POST['matri_id']))) { // checking matrimony id
                        $where[]= "profiles.matrimony_id = '". preg_replace("/[^0-9]/","",$_POST['matri_id'])."'";
                    } else if((isset($_POST['search_id'])) && (!empty($_POST['search_id']))) { // load from saved search
                        $search_id=$_POST['search_id'];
                        $basic2 = $this->Search_model->get_save_search_details($search_id); 

                        if($basic->gender== "male") { 
                            $where[]= "profiles.gender = 'female'";
                            $this->session->set_userdata('gender',"female");
                        } else { 
                            $where[]= "gender = 'male'"; 
                            $this->session->set_userdata('gender',"male");
                        }                 
                        if($basic2->mart!=0){
                            $where[]  = "profiles.maritial_status = '".$basic2->mart."'";
                        }
                        if($basic2->religion!=0) {
                            $where[]  = "profiles.religion = '".$basic2->religion."'";
                        }
                        if($basic2->mother!=0) {
                            $where[]  = "profiles.mother_language = '".$basic2->mother."'";
                        }
                        if($basic2->caste!=0) {
                            $where[]  = "profiles.caste = '".$basic2->caste."'";
                        }
                        if($basic2->country!=0) {
                            $where[]  = "profiles.country = '".$basic2->country."'";
                        }
                        if($basic2->city!=0){
                            $where[]  = "profiles.city = '".$basic2->city."'";
                        }
                        if($basic2->state!=0){
                            $where[]  = "profiles.state = '".$basic2->state."'";
                        }
                        if($basic2->age_from!=0) {
                            $where[]= "profiles.age >= '".$basic2->age_from."'"; 
                        }
                        if($basic2->age_to!=0) {
                            $where[]= "profiles.age <= '".$basic2->age_to."'";
                        }
                        if($basic2->height_from!=0) { 
                            $where[]= "profiles.height_id >= '".$basic2->height_from."'"; 
                        }
                        if($basic2->height_to!=0) { 
                            $where[]= "profiles.height_id <= '".$basic2->height_to."'"; 
                        }               
                        if($basic2->educs!=null) {
                            $educs1=$basic2->educs;
                            $edu=(explode(",",$educs1));                    
                            foreach($edu as $check1) {
                                $or_where[]= "profiles.education_id = ".$check1.""; 
                            }
                        }
                    } else { // eof saved search , if preference not set and matches
                        if($basic->gender== "male") { 
                            $where[]= "profiles.gender = 'female'";
                            $this->session->set_userdata('gender',"female");
                        } else { 
                            $where[]= "profiles.gender = 'male'"; 
                            $this->session->set_userdata('gender',"male");
                        }
                        if($basic->willing_intercast != 1) { 
                            //  $where[] = "profiles.caste = '".$basic->caste."'";
                            $where[]  = "profiles.religion = '".$basic->religion."'";
                            $where1[] = "religion_id = '".$basic->religion."'"; 
                        }   
                    }
                } else {  // if partner preference set
                    if((isset($_POST['matri_id'])) && (!empty($_POST['matri_id']))) { // checking matrimony id
                        $where[]= "profiles.matrimony_id = '". preg_replace("/[^0-9]/","",$_POST['matri_id'])."'";
                    } 

                    else if((isset($_POST['keyword'])) && (!empty($_POST['keyword']))) { // if, keyword search
                        $keywrd = explode(',', $_POST['keyword']);
                        $length = count($keywrd);
                        for($i=0;$i<$length;$i++) {
                           $like[] = "profiles.matrimony_id like '%".$keywrd[$i]."%'";
                           $like[] = "profiles.profile_name like '%".$keywrd[$i]."%'";
                           $like[] = "profiles.email like '%".$keywrd[$i]."%'";
                        }
                      } 

                    else if((isset($_POST['search_id'])) && (!empty($_POST['search_id']))) { // saved search
                        $search_id=$_POST['search_id'];
                        $basic2 = $this->Search_model->get_save_search_details($search_id); 
                        if($basic->gender== "male") { 
                            $where[]= "profiles.gender = 'female'";
                            $this->session->set_userdata('gender',"female");
                        } else { 
                            $where[]= "gender = 'male'"; 
                            $this->session->set_userdata('gender',"male");
                        }                 
                        if($basic2->mart!=0) {
                           $where[]  = "profiles.maritial_status = '".$basic2->mart."'";
                        }
                        if($basic2->religion!=0) {
                           $where[]  = "profiles.religion = '".$basic2->religion."'";
                        } 
                        if($basic2->mother!=0) {
                           $where[]  = "profiles.mother_language = '".$basic2->mother."'";
                        }
                        if($basic2->caste!=0) {
                           $where[]  = "profiles.caste = '".$basic2->caste."'";
                        }
                        if($basic2->country!=0) {
                          $where[]  = "profiles.country = '".$basic2->country."'";
                        }
                        if($basic2->city!=0) {
                          $where[]  = "profiles.city = '".$basic2->city."'";
                        }
                        if($basic2->state!=0) {
                          $where[]  = "profiles.state = '".$basic2->state."'";
                        }
                        if($basic2->age_from!=0) {
                          $where[]= "profiles.age >= '".$basic2->age_from."'"; 
                        }
                        if($basic2->age_to!=0) {
                          $where[]= "profiles.age <= '".$basic2->age_to."'";
                        }
                        if($basic2->height_from!=0) { 
                          $where[]= "profiles.height_id >= '".$basic2->height_from."'"; 
                        }
                        if($basic2->height_to!=0) { 
                          $where[]= "profiles.height_id <= '".$basic2->height_to."'"; 
                        } 
                        if($basic2->educs!=null) {
                            $educs1=$basic2->educs;
                            $edu=(explode(",",$educs1));                    
                            foreach($edu as $check1) {
                              $or_where[]= "profiles.education_id = ".$check1.""; 
                            }
                        }
                    } else { /*load partner preference*/
                     /*   $mat_id=$my_user['logged_in']['matrimony_id'];
                        $basic1 = $this->Search_model->get_user_partner_preference($mat_id);
                        if($basic->gender== "male") { 
                            $where[]= "profiles.gender = 'female'";
                            $this->session->set_userdata('gender',"female");
                        } else { 
                            $where[]= "gender = 'male'"; 
                            $this->session->set_userdata('gender',"male");
                        }
                        if($basic1->religion!=null && $basic1->religion != 0) {
                            $where[]  = "profiles.religion = '".$basic1->religion."'";
                        }
                        if($basic1->caste!=null && $basic1->caste!=0) {
                            $where[]  = "profiles.caste = '".$basic1->caste."'";
                        }
                          // $where[]  = "profiles.country = '".$basic1->country."'";
                        if($basic1->country!=null && $basic1->country!=0) {
                          //var_dump($basic1->country); die();
                            $cntry=$basic1->country;
                            $cntry1=(explode(",",$cntry));                    
                            foreach($cntry1 as $check1) {
                              $or_where[]= "profiles.country = '".$basic1->country."'";
                            }
                        }
                        /*elseif ($basic1->country==0) {
                           $cntry=$basic1->country;
                            $cntry1=(explode(",",$cntry));                    
                            foreach($cntry1 as $check1) {
                            // $or_where[]= "profiles.country = '".$basic1->country."'";
                            }
                          # code...
                        }*/
                    } 
                  } // eof from preference
            } // eof logged in
        } else {  
          redirect(base_url()); 
      //    exit();
          
          // not logged in , guest user, then  from post
    ///      if($_POST) { // all datas must be post
    ///          if((isset($_POST['matri_id'])) && (!empty($_POST['matri_id']))) { // matrimony id search
    ///            $where[]= "profiles.matrimony_id = '". preg_replace("/[^0-9]/","",$_POST['matri_id'])."'";
    ///          } else {
        ///         if((isset($_POST['keyword'])) && (!empty($_POST['keyword']))) { // if, keyword search
            ///        $keywrd = explode(',', $_POST['keyword']);
            ///        $length = count($keywrd);
            ///        for($i=0;$i<$length;$i++) {
           ////            $like[] = "profiles.matrimony_id like '%".$keywrd[$i]."%'";
         ///              $like[] = "profiles.profile_name like '%".$keywrd[$i]."%'";
          ///             $like[] = "profiles.email like '%".$keywrd[$i]."%'";
        ///            }

          ///        } else { // else, search from index page, basic
          ////            if((isset($_POST['gender'])) && (!empty($_POST['gender']))) { 
          ////                $this->session->set_userdata('gender',$_POST['gender']); 
             ////         }
                      /*if((isset($_POST['age_from'])) && ($_POST['age_from']!=0)) {
                          $where[]= "profiles.age >= '".$_POST['age_from']."'"; 
            ////          }
                      if((isset($_POST['age_to'])) && ($_POST['age_to']!=0)) {
                          $where[]= "profiles.age <= '".$_POST['age_to']."'";
          ////            }*/
                     /* if((isset($_POST['caste'])) && ($_POST['caste']!=0)) {
                          $where[] = "profiles.caste = '".$_POST['caste']."'"; 
                      }*/
                     /* if((isset($_POST['caste'])) && ($_POST['caste']!=0)) {
                        foreach($_POST['caste'] as $check) {
                          if($check !=0) $where[]= "profiles.caste = ".$check."";
                        }
                      }*/
                      /*if((isset($_POST['religion'])) && ($_POST['religion']!=0)) {
                          foreach($_POST['religion'] as $check) {
                            if($check !=0) {
                               $where[]= "profiles.religion = ".$check."";
                               $where1[] = "religion_id = ".$check."";
                             }
                          }
                      }
                      if((isset($_POST['educs'])) && ($_POST['educs']!=0)) {
                          $a = 1; $or_where_str =""; $educ_len = count($_POST['educs']);
                          $or_where_str.= "(";
                          foreach($_POST['educs'] as $check) {
                               $or_where_str.= "profiles.education_id = ".$check;
                               if($a < $educ_len) { $or_where_str.= " OR "; }
                                $a= $a+1;
                          } $or_where_str.= ")"; $or_where[]= $or_where_str;
                      }*/
                      /*if((isset($_POST['religion'])) && ($_POST['religion']!=0)) {
                          $where[] = "profiles.religion = '".$_POST['religion']."'";
                          $where1[] = "religion_id = '".$_POST['religion']."'"; 
                      }*/
          ////        } // eof index search
        /////      } // eof matri, keyword ,  indesx search
      /////      } // eof post
        } // eof else of logged in

        if($this->session->userdata('logged_in')) { // if logged, then get from session
            $my_user = $this->session->userdata; 
            $my_user = json_decode(json_encode($my_user),true);
            $basic = $this->Search_model->get_user_basic_details($my_user);
            if($basic->gender== "male") { 
                $where[]= "profiles.gender = 'female'";
                $this->session->set_userdata('gender',"female");
            } else { 
                $where[]= "profiles.gender = 'male'"; 
                $this->session->set_userdata('gender',"male");
            }
            if($basic->willing_intercast != 1) { 
                //  $where[] = "profiles.caste = '".$basic->caste."'";
                $where[]  = "profiles.religion = '".$basic->religion."'";
                $where1[] = "religion_id = '".$basic->religion."'"; 
            } 
        }

       // print_r($_POST);

        if(isset($_POST['search_type'])) { // common search w or w/o logging in  [advanced searches,filter]
          
            if(isset($_POST['save_search_name']) && ($_POST['save_search_name']!=null)){ // if save search name!= null, then save
              $result = $this->Search_model->save_search($_POST);
            }                             
            if((isset($_POST['gender'])) && (!empty($_POST['gender']))) { 
                $this->session->set_userdata('gender',$_POST['gender']); 
            }
            if((isset($_POST['age_from'])) && ($_POST['age_from']!=0)) { 
               $where[]= "profiles.age >= '".$_POST['age_from']."'"; 
            }
            if((isset($_POST['age_to'])) && ($_POST['age_to']!=0)) { 
                $where[]= "profiles.age <= '".$_POST['age_to']."'"; 
            }
            if((isset($_POST['height_from'])) && ($_POST['height_from']!=0)) { 
                $where[]= "profiles.height_id >= '".$_POST['height_from']."'"; 
            }
            if((isset($_POST['height_to'])) && ($_POST['height_to']!=0)) { 
                $where[]= "profiles.height_id <= '".$_POST['height_to']."'"; 
            }
            if((isset($_POST['weight_from'])) && ($_POST['weight_from']!=0)) { 
                $where[]= "profiles.weight_id >= '".$_POST['weight_from']."'"; 
            }
            if((isset($_POST['weight_to'])) && ($_POST['weight_to']!=0)) { 
                $where[]= "profiles.weight_id <= '".$_POST['weight_to']."'"; 
            }
            if((isset($_POST['min_income'])) && ($_POST['min_income']!=0)) { 
                $where[]= "profiles.income >= ".$_POST['min_income']; 
            }
            if((isset($_POST['max_income'])) && ($_POST['max_income']!=0)) { 
                $where[]= "profiles.income <= ".$_POST['max_income']; 
            } 


            if(isset($_POST['income'])){
              list($min_income,$max_income) = explode('-', $_POST['income']);
              $where[]= "profiles.income >= ".$min_income; 
              if($max_income!=0)
              $where[]= "profiles.income <= ".$max_income;
            }


            if(isset($_POST['mart']) && !empty($_POST['mart'])){
              /*$or_where_str[] = $_POST['mart'];
              $mart = implode(',', $or_where_str);
              $or_where[] = "FIND_IN_SET ($mart, profiles.maritial_status)";*/

              $mart = implode(',', $_POST['mart']);
                $where[]= "FIND_IN_SET (profiles.maritial_status, '$mart')";
            }

            if(isset($_POST['mother']) && !empty($_POST['mother'])) { //  multiple options
              if(is_array($_POST['mother'])){
                  $mother = implode(',', $_POST['mother']);
                 $where[]= "FIND_IN_SET (profiles.mother_language, '$mother')";
              } else {
                $or_where_mot[] = $_POST['mother'];
                $mother = implode(',', $or_where_mot);
                $or_where[] = "FIND_IN_SET ($mother, profiles.mother_language)";
              }
              
            }

            //profiles.mother_language FIND IN($mother)

            if(isset($_POST['caste']) && !empty($_POST['caste'])) { //  multiple options
              if($_POST['caste']!=='-1'){
                if(is_array($_POST['caste'])){
                    $castes = implode(',', $_POST['caste']);
                    $where[]= "FIND_IN_SET (profiles.caste, '$castes')";
                } else {
                  $or_where_cas[] = $_POST['caste'];
                  $castes = implode(',', $or_where_cas);
                  $or_where[] = "FIND_IN_SET ($castes, profiles.caste)";
                }
              }
              
            }
            if(isset($_POST['family_status']) && !empty($_POST['family_status'])) {
              $where[]= "profiles.family_status = ".$_POST['family_status'];
            }
            if(isset($_POST['family_type']) && !empty($_POST['family_type'])) {
              $where[]= "profiles.family_type = ".$_POST['family_type'];
            }
            if(isset($_POST['family_value']) && !empty($_POST['family_value'])) {
              $where[]= "profiles.family_value = ".$_POST['family_value'];
            }

            if(isset($_POST['body_type']) && !empty($_POST['body_type'])) {
              $where[]= "profiles.body_type = ".$_POST['body_type'];
            }
            if(isset($_POST['complexion']) && !empty($_POST['complexion'])) {
              $where[]= "profiles.complexion = ".$_POST['complexion'];
            }
            if(isset($_POST['physical_status']) && !empty($_POST['physical_status'])) {
              $where[]= "profiles.physical_status = ".$_POST['physical_status'];
            }
            if(isset($_POST['employed_in']) && !empty($_POST['employed_in'])) {
              $where[]= "profiles.employed_in = '".$_POST['employed_in']."'";
            }

            if(isset($_POST['country']) && !empty($_POST['country'])) { //  multiple options
              if(is_array($_POST['country'])){
                  $country = implode(',', $_POST['country']);
                  $where[]= "FIND_IN_SET (profiles.country, '$country')";
              } else {
                  $or_where_coun[] = $_POST['country'];
                  $country = implode(',', $or_where_coun);
                  $or_where[] = "FIND_IN_SET ($country, profiles.country)";
                }
            }

            if(isset($_POST['state']) && !empty($_POST['state'])) { //  multiple options
              if(is_array($_POST['state'])){
                  $state = implode(',', $_POST['state']);
                  $where[]= "FIND_IN_SET (profiles.state, '$state')";
              } else {
                $or_where_state[] = $_POST['state'];
                $state = implode(',', $or_where_state);
                $or_where[] = "FIND_IN_SET ($state, profiles.state)";
              }
            }

            if(isset($_POST['stars']) && !empty($_POST['stars'])) { //  multiple options
                  $stars = implode(',', $_POST['stars']);
                  $where[]= "FIND_IN_SET (profiles.star_id, '$stars')";
            }
            if(isset($_POST['padam']) && !empty($_POST['padam'])) { //  multiple options
                  $padam = implode(',', $_POST['padam']);
                  $where[]= "FIND_IN_SET (profiles.padam, '$padam')";
            }


            


            /*if(isset($_POST['mart']) && !empty($_POST['mart'])) { //  multiple options
                $b = 1; $or_where_str =""; $post_len = count($_POST['mart']);  $or_where_str.= "(";
                if($_POST['mart'][0] !=0) {
                    foreach($_POST['mart'] as $check) {
                        $or_where_str.= "profiles.maritial_status = ".$check;
                        if($b < $post_len) { $or_where_str.= " OR "; }
                        $b= $b+1;
                    } $or_where_str.= ")"; $or_where[]= $or_where_str;
                }
            }*/

            if(isset($_POST['religion'])) { //print_r($_POST['religion']);
                $religion[] = $_POST['religion'];
                foreach($religion as $check) {
                     if($check !=0) $or_where[]= "profiles.religion = ".$check."";
                }
            }
            /*if((isset($_POST['religion'])) && ($_POST['religion']!=0)) { 
                $where[]= "profiles.religion = '".$_POST['religion']."'"; 
            }*/
            /*if(isset($_POST['mother'])) { //  multiple options
              $c = 1; $or_where_str =""; $post_len = count($_POST['mother']);  $or_where_str.= "(";
                if($_POST['mother'][0] !=0) {
                    foreach($_POST['mother'] as $check) {
                        $or_where_str.= "profiles.mother_language = ".$check;
                        if($c < $post_len) { $or_where_str.= " OR "; }
                        $c= $c+1;
                    } $or_where_str.= ")"; $or_where[]= $or_where_str;
                }
            }*/

            /*if(isset($_POST['caste'])) { //  multiple options
              $d = 1; $or_where_str =""; $post_len = count($_POST['caste']);  $or_where_str.= "("; //print_r($_POST['caste'][0]);
              if($_POST['caste'][0] != 0) {
                foreach($_POST['caste'] as $check) {
                        $or_where_str.= "profiles.caste = ".$check;
                        if($d < $post_len) { $or_where_str.= " OR "; }
                        $d= $d+1;
                } $or_where_str.= ")"; $or_where[]= $or_where_str;
              } 
            }*/

            /*if(isset($_POST['country'])) { //  multiple options
              $e = 1; $or_where_str =""; $post_len = count($_POST['country']);  $or_where_str.= "(";
              if($_POST['country'][0] != 0) {
                foreach($_POST['country'] as $check) {
                        $or_where_str.= "profiles.country = ".$check;
                        if($e < $post_len) { $or_where_str.= " OR "; }
                        $e= $e+1;
                } $or_where_str.= ")"; $or_where[]= $or_where_str;
              }
            }*/

           /* if(isset($_POST['state'])) { //  multiple options
              $f = 1; $or_where_str =""; $post_len = count($_POST['state']);  $or_where_str.= "(";
              if($_POST['state'][0] != 0) {
                foreach($_POST['state'] as $check) {
                        $or_where_str.= "profiles.state = ".$check;
                        if($f < $post_len) { $or_where_str.= " OR "; }
                        $f= $f+1;
                } $or_where_str.= ")"; $or_where[]= $or_where_str;
              }
            }*/


            if(isset($_POST['photo'])){
              $where[]= "profiles.profile_photo != ''";
            }
            $where[]= "profiles.matrimony_id != ''";
          

            if((isset($_POST['city'])) && ($_POST['city']!=0)) { 
                $where[]= "profiles.city = '".$_POST['city']."'"; 
            }
            if((isset($_POST['eating'])) && ($_POST['eating'][0]!=0)) { 
                $eating = implode(',', $_POST['eating']);
                $where[]= "FIND_IN_SET (profiles.eating, '$eating')"; 
            }
            if((isset($_POST['drinking'])) && ($_POST['drinking'][0]!=0)) { 
                $drinking = implode(',', $_POST['drinking']);
                $where[]= "FIND_IN_SET (profiles.drinking, '$drinking')";
            }
            if((isset($_POST['smoking'])) && ($_POST['smoking'][0]!=0)) { 
                $smoking = implode(',', $_POST['smoking']);
                $where[]= "FIND_IN_SET (profiles.smoking, '$smoking')";
            }
            if((isset($_POST['educs'])) && ($_POST['educs']!=0)) { //  multiple options
                $a = 1; $or_where_str =""; $educ_len = count($_POST['educs']);
                $or_where_str.= "(";
                foreach($_POST['educs'] as $check) {
                     $or_where_str.= "profiles.education_id = ".$check;
                     if($a < $educ_len) { $or_where_str.= " OR "; }
                      $a= $a+1;
                } $or_where_str.= ")"; $or_where[]= $or_where_str;
            }

            if((isset($_POST['misc_type']))) {
                if(in_array("with_photo", $_POST['misc_type'])) { 
                    $where[]= "profiles.profile_photo IS NOT NULL AND profiles.profile_photo!=''"; 
                }
                 if(in_array("premium", $_POST['misc_type'])) { 
                    $where[]= "profiles.is_premium = '1'";
                }
            }


            if(isset($_POST['dont_show'])) {
              if($this->session->userdata('logged_in')) { // if logged, then get from session
                $my_id = $this->session->userdata('logged_in');
                foreach($_POST['dont_show'] as $check) {

                     if($check ==2) {
                        $result = $this->Search_model->getMyCommunications($my_id->matrimony_id,"history_from","history_to","history");
                     } else if($check ==3) {
                        $result = $this->Search_model->getMyCommunications($my_id->matrimony_id,"viewer","viewed","profile_recent");
                     } else {
                        $result = $this->Search_model->getMyCommunications($my_id->matrimony_id,"shot_lister","shot_listed","profile_shortlist");
                     }
                     

                     foreach($result as $exclude) {
                        $where[]= "profiles.matrimony_id != ".$exclude->exclude_matri."";
                     }
                }
              }
            }


            if((isset($_POST['create'])) && ($_POST['create']!=0)) {
                $g = 1; $post_len = count($_POST['create']); $or_where_str =""; $or_where_str.= "(";
                foreach($_POST['create'] as $check) {
                    if($check == 1) { 
                        $date1 = date('Y-m-d'); 
                        $or_where_str.= "profiles.created_date = '".$date1."'"; 
                    }
                    else if($check == 2) { 
                        $date2 = date("Y-m-d", strtotime("-1 week"));
                        $or_where_str.= "profiles.created_date >= '".$date2."'"; 
                    } 
                    else if($check == 3) {
                        $date3 = date("Y-m-d", strtotime("-1 month"));
                        $or_where_str.= "profiles.created_date >= '".$date3."'";
                    }
                    if($g < $post_len) { $or_where_str.= " OR "; }
                    $g= $g+1;
                } $or_where_str.= ")"; $or_where[]= $or_where_str;
            }


            $this->session->set_userdata('filter',$_POST);

            } // eof post


            /*echo '<pre>';
            print_r($this->session->userdata('filter'));*/
            
            if($this->session->userdata('filter')) {
                  $filtr = $this->session->userdata('filter');
                  
                  if((isset($filtr['age_from'])) && ($filtr['age_from']!=0)) { 
                     $where[]= "profiles.age >= '".$filtr['age_from']."'"; 
                  }
                  if((isset($filtr['age_to'])) && ($filtr['age_to']!=0)) { 
                      $where[]= "profiles.age <= '".$filtr['age_to']."'"; 
                  }
                  if((isset($filtr['height_from'])) && ($filtr['height_from']!=0)) { 
                      $where[]= "profiles.height_id >= '".$filtr['height_from']."'"; 
                  }
                  if((isset($filtr['height_to'])) && ($filtr['height_to']!=0)) { 
                      $where[]= "profiles.height_id <= '".$filtr['height_to']."'"; 
                  }
                  if((isset($filtr['weight_from'])) && ($filtr['weight_from']!=0)) { 
                      $where[]= "profiles.weight_id >= '".$filtr['weight_from']."'"; 
                  }
                  if((isset($filtr['weight_to'])) && ($filtr['weight_to']!=0)) { 
                      $where[]= "profiles.weight_id <= '".$filtr['weight_to']."'"; 
                  }
                  if((isset($filtr['min_income'])) && ($filtr['min_income']!=0)) { 
                      $where[]= "profiles.income >= ".$filtr['min_income']; 
                  }
                  if((isset($filtr['max_income'])) && ($filtr['max_income']!=0)) { 
                      $where[]= "profiles.income <= ".$filtr['max_income']; 
                  } 


            if(isset($filtr['mart']) && !empty($filtr['mart'])){
              /*$or_where_str = array();
              $or_where_str[] = $filtr['mart'];
              $mart = implode(',', $or_where_str);
              $or_where[] = "FIND_IN_SET ($mart, profiles.maritial_status)";*/
              $mart = implode(',', $_POST['mart']);
                $where[]= "FIND_IN_SET (profiles.maritial_status, '$mart')";
            }

            if(isset($filtr['income'])){
              list($min_income,$max_income) = explode('-', $filtr['income']);
              $where[]= "profiles.income >= ".$min_income;
              if($max_income!=0) 
              $where[]= "profiles.income <= ".$max_income;
            }

            if(isset($filtr['stars']) && !empty($filtr['stars'])) { //  multiple options
                  $stars = implode(',', $filtr['stars']);
                  $where[]= "FIND_IN_SET (profiles.star_id, '$stars')";
            }
            if(isset($filtr['padam']) && !empty($filtr['padam'])) { //  multiple options
                  $padam = implode(',', $filtr['padam']);
                  $where[]= "FIND_IN_SET (profiles.padam, '$padam')";
            }

            if(isset($filtr['mother']) && !empty($filtr['mother'])) { //  multiple options
              if(is_array($filtr['mother'])){
                  $mother = implode(',', $filtr['mother']);
                 $where[]= "FIND_IN_SET (profiles.mother_language, '$mother')";
              } else {
                $or_where_mot = array();
                $or_where_mot[] = $filtr['mother'];
                $mother = implode(',', $or_where_mot);
                $or_where[] = "FIND_IN_SET ($mother, profiles.mother_language)";
              }

            }

            //profiles.mother_language FIND IN($mother)

            if(isset($filtr['caste']) && !empty($filtr['caste'])) { //  multiple options
              if($filtr['caste']!=='-1'){
                if(is_array($filtr['caste'])){
                    $castes = implode(',', $filtr['caste']);
                    $where[]= "FIND_IN_SET (profiles.caste, '$castes')";
                } else {
                  $or_where_cas = array();
                  $or_where_cas[] = $filtr['caste'];
                  $castes = implode(',', $or_where_cas);
                  $or_where[] = "FIND_IN_SET ($castes, profiles.caste)";
                }
              }
            }

            if(isset($filtr['country']) && !empty($filtr['country'])) { //  multiple options
              if(is_array($filtr['country'])){
                  $country = implode(',', $filtr['country']);
                  $where[]= "FIND_IN_SET (profiles.country, '$country')";
              } else {
                $or_where_coun = array();
                $or_where_coun[] = $filtr['country'];
                $country = implode(',', $or_where_coun);
                $or_where[] = "FIND_IN_SET ($country, profiles.country)";
              }
            }

            if(isset($filtr['state']) && !empty($filtr['state'])) { //  multiple options
              if(is_array($filtr['state'])){
                  $state = implode(',', $filtr['state']);
                  $where[]= "FIND_IN_SET (profiles.state, '$state')";
              } else {
                $or_where_state = array();
                $or_where_state[] = $filtr['state'];
                $state = implode(',', $or_where_state);
                $or_where[] = "FIND_IN_SET ($state, profiles.state)";
              }
            }


                

                  /*if(isset($filtr['mart']) && !empty($filtr['mart'][0])) { //  multiple options
                      $b = 1; $or_where_str =""; $post_len = count($filtr['mart']);/*  $or_where_str.= "(";
                      if($filtr['mart'][0] !=0) {
                          foreach($filtr['mart'] as $check) {
                              $or_where_str.= "profiles.maritial_status = ".$check;
                              if($b < $post_len) { $or_where_str.= " OR "; }
                              $b= $b+1;
                          } $or_where_str.= ")"; $or_where[]= $or_where_str;
                      }
                        $mart = $filtr['mart'];
                        $or_where_str.= "profiles.maritial_status IN($mart)";

                  }

                  if(isset($filtr['mother'])) { //  multiple options
                    $c = 1; $or_where_str =""; $post_len = count($filtr['mother']);  $or_where_str.= "(";
                      if($filtr['mother'][0] !=0) {
                          foreach($filtr['mother'] as $check) {
                              $or_where_str.= "profiles.mother_language = ".$check;
                              if($c < $post_len) { $or_where_str.= " OR "; }
                              $c= $c+1;
                          } $or_where_str.= ")"; $or_where[]= $or_where_str;
                      }
                  }

                  if(isset($filtr['caste'])) { //  multiple options
                    $d = 1; $or_where_str =""; $post_len = count($filtr['caste']);  $or_where_str.= "("; //print_r($filtr['caste'][0]);
                    if($filtr['caste'][0] != 0) {
                      foreach($filtr['caste'] as $check) {
                              $or_where_str.= "profiles.caste = ".$check;
                              if($d < $post_len) { $or_where_str.= " OR "; }
                              $d= $d+1;
                      } $or_where_str.= ")"; $or_where[]= $or_where_str;
                    } 
                  }

                  if(isset($filtr['country'])) { //  multiple options
                    $e = 1; $or_where_str =""; $post_len = count($filtr['country']);  $or_where_str.= "(";
                    if($filtr['country'][0] != 0) {
                      foreach($filtr['country'] as $check) {
                              $or_where_str.= "profiles.country = ".$check;
                              if($e < $post_len) { $or_where_str.= " OR "; }
                              $e= $e+1;
                      } $or_where_str.= ")"; $or_where[]= $or_where_str;
                    }
                  }

                  if(isset($filtr['state'])) { //  multiple options
                    $f = 1; $or_where_str =""; $post_len = count($filtr['state']);  $or_where_str.= "(";
                    if($filtr['state'][0] != 0) {
                      foreach($filtr['state'] as $check) {
                              $or_where_str.= "profiles.state = ".$check;
                              if($f < $post_len) { $or_where_str.= " OR "; }
                              $f= $f+1;
                      } $or_where_str.= ")"; $or_where[]= $or_where_str;
                    }
                  }*/

                  if((isset($filtr['educs'])) && ($filtr['educs']!=0)) { //  multiple options
                      $a = 1; $or_where_str =""; $educ_len = count($filtr['educs']);
                      $or_where_str.= "(";
                      foreach($filtr['educs'] as $check) {
                           $or_where_str.= "profiles.education_id = ".$check;
                           if($a < $educ_len) { $or_where_str.= " OR "; }
                            $a= $a+1;
                      } $or_where_str.= ")"; $or_where[]= $or_where_str;
                  }

                       if((isset($filtr['occupa'])) && ($filtr['occupa']!=0)) { //  multiple options
                      $a = 1; $or_where_str =""; $educ_len = count($filtr['occupa']);
                      $or_where_str.= "(";
                      foreach($filtr['occupa'] as $check) {
                           $or_where_str.= "profiles.occupation_id = ".$check;
                           if($a < $educ_len) { $or_where_str.= " OR "; }
                            $a= $a+1;
                      } $or_where_str.= ")"; $or_where[]= $or_where_str;
                  }


                  if((isset($filtr['misc_type']))) {
                  //    if($filtr['misc_type']=="with_photo") { in_array("Glenn", $people)
                    if(in_array("with_photo", $filtr['misc_type'])){
                          $where[]= "profiles.profile_photo != ''"; 
                      } 
                  //    if($filtr['misc_type']=="with_premium") {
                        if(in_array("with_premium", $filtr['misc_type'])) {
                          $where[]= "profiles.is_premium = '1'";
                      }
                  }
                 

                  if((isset($filtr['create'])) && ($filtr['create']!=0)) {
                      $g = 1; $post_len = count($filtr['create']); $or_where_str =""; $or_where_str.= "(";
                      foreach($filtr['create'] as $check) {
                          if($check == 1) { 
                              $date1 = date('Y-m-d'); 
                              $or_where_str.= "profiles.created_date = '".$date1."'"; 
                          }
                          else if($check == 2) { 
                              $date2 = date("Y-m-d", strtotime("-1 week"));
                              $or_where_str.= "profiles.created_date >= '".$date2."'"; 
                          } 
                          else if($check == 3) {
                              $date3 = date("Y-m-d", strtotime("-1 month"));
                              $or_where_str.= "profiles.created_date >= '".$date3."'";
                          }
                          if($g < $post_len) { $or_where_str.= " OR "; }
                          $g= $g+1;
                      } $or_where_str.= ")"; $or_where[]= $or_where_str;
                  }


              }
          
            
            if($this->session->userdata('gender'))
            $where[]= "profiles.gender = '".$this->session->userdata('gender')."'";
       //     $where[] = "profiles.is_phone_verified = '1'";
        //    $where[] = "profiles.profile_approval = '1'";
            $where[] = "profiles.profile_status = '1'";

     //print_r($where); die();
 //print_r($or_where); die();

            $config = array();
            $config["base_url"] = base_url() . "search/index";
            $config["total_rows"] = count($this->Search_model->search_user_details(10000, 0, $where,$or_where,$like));
            $config["per_page"] = 200;
            $config["uri_segment"] =3;
           // $choice = $config["total_rows"] / $config["per_page"];
            //$config["num_links"] = round($choice);
            $config["num_links"] = $config["total_rows"];
            $config['use_page_numbers'] = TRUE;
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';

            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            if(!($this->session->userdata('logged_in')))  {
                $where[] = "settings_preferences.profilevisibility_preference = 1";    
            }
        //search_user_details_count    
        $data['srch_candidates'] = $this->Search_model->search_user_details($config["per_page"], $page, $where,$or_where,$like);
      
        $data['total_candidates'] = $this->Search_model->search_user_details_count($config["per_page"], $page, $where,$or_where,$like);
       var_dump($data['total_candidates']);
       exit();
        $data['photo_count'] = $this->Search_model->photo_count($data['srch_candidates']);
        $data['religions'] = $this->Home_model->getReligions();
        // echo "<pre>";
        // print_r($where);
        // echo "</pre>";

        // echo "<pre>";
        // print_r($or_where);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($like);
        // echo "</pre>";
        // exit;

        //echo $this->db->last_query();

            if($this->session->userdata('logged_in')) {               // check shortlist and intrested if logd in 
                $my_matr_id = $this->session->userdata('logged_in');
                $r = 0;
                if(!empty($data['srch_candidates'])) {
                    foreach($data['srch_candidates'] as $cands) {
                        $data['srch_candidates'][$r]->shortlisted = $this->Profile_model->checkShortlisted($my_matr_id->matrimony_id,$cands->matrimony_id);
                        $data['srch_candidates'][$r]->interested  = $this->Profile_model->checkInterested($my_matr_id->matrimony_id,$cands->matrimony_id);
                        $data['srch_candidates'][$r]->membership = $this->Profile_model->get_membership_details($my_matr_id->matrimony_id);
                        $data['srch_candidates'][$r]->settings = $this->Profile_model->get_settings_details($cands->matrimony_id);
                        $data['srch_candidates'][$r]->photo_request = $this->Profile_model->get_photo_request($my_matr_id->matrimony_id,$cands->matrimony_id);
                        $r = $r + 1;
                       /*

echo '<pre>';     
                  var_dump($data['srch_candidates']);
echo '</pre>';   
                        die();*/
                    }
                }
            }

            $data['mother_tongue'] = $this->Home_model->getMotherTongues();
            $where1[] = "caste_status = '1'";
            $data['caste'] = $this->Home_model->getTable("",$where1,"castes");
            $data['stars'] = $this->Home_model->getTable("","","stars");
            $data['educations'] = $this->Home_model->getTable2("",array("education_status != 0"),"educations","education");
            $data['country'] = $this->Home_model->getTable2("",array("country_status != 0"),"country","country_id");
            //echo "<pre>";print_r($data['country']);echo "</pre>";
            $data['state'] = $this->Home_model->getTable2("",array("state_status != 0"),"states","state_name");
            $data['heights'] = $this->Home_model->getTable("","","height");
            $data['weights'] = $this->Home_model->getTable("","","weight");

            $str_links = $this->pagination->create_links();
            $data["links"] = explode('&nbsp;',$str_links );

            $settings        = get_setting();
            $header['title'] = $settings->title . " | Search Result";
            $this->load->view('header', $header); 
            $this->load->view('searchresult',$data);
            $this->load->view('footer');                     
    }
    function searchbyid(){
      $where = array(); $where1 = array(); $or_where = array(); $like = array(); $tbl ="profiles";
      if((isset($_POST['matri_id'])) && (!empty($_POST['matri_id']))) { // checking matrimony id
        $where[]= "profiles.matrimony_id = '". preg_replace("/[^0-9]/","",$_POST['matri_id'])."'";
        $where[] = "profiles.profile_status = '1'";
    } else { redirect(base_url()); }
                  $config = array();
              $config["base_url"] = base_url() . "search/searchbyid";
              $config["total_rows"] = count($this->Search_model->search_user_details(10000, 0, $where,$or_where,$like));
              $config["per_page"] = 500;
              $config["uri_segment"] =3;
             // $choice = $config["total_rows"] / $config["per_page"];
              //$config["num_links"] = round($choice);
              $config["num_links"] = $config["total_rows"];
              $config['use_page_numbers'] = TRUE;
              $config['next_link'] = 'Next';
              $config['prev_link'] = 'Previous';
  
              $this->pagination->initialize($config);
              $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      
        $data['srch_candidates'] = $this->Search_model->search_user_details($config["per_page"], $page, $where,$or_where,$like);
          $this->load->view('header', $header); 
              $this->load->view('searchresult',$data);
              $this->load->view('footer');
    }









    function get_state_by_cntry(){
      $ct_id = $_POST['ct_id'];
      $state = $this->Home_model->getTable2("",array("state_status != 0","country_id=".$ct_id),"states","state_id");
      if($state):
      $p=100; foreach($state as $stat) { ?>
        <li><?php echo $stat->state_name; ?><div class="wed-custom3 floatr">
            <input class="state check_<?php echo $stat->state_id; ?>" id="stat<?php echo $p; ?>" type="checkbox" name="state[]"
            value="<?php echo $stat->state_id; ?>">
            <label for="stat<?php echo $p; ?>"></label>
          </div></li>

      <?php $p=$p+1; } 
      ?>
      <button class="wed-btn-view1" type="submit" my_attr="state">Submit</button>
      <?php
      else : ?>
        <li>No State Found!</li>
      <?php endif;
      exit;
    }

  public function matches(){
    if($this->session->userdata('filter')) {
        $this->session->unset_userdata('filter');
    }
    redirect(base_url('/search'));
  }

    public function advanced() {
        $data['religions'] = $this->Home_model->getReligions();
        $data['mother_tongue'] = $this->Home_model->getMotherTongues();
        $data['stars'] = $this->Home_model->getTable("","","stars");
        $data['occupations'] = $this->Home_model->getTable2("",array("occupation_status !=0"),"occupations","occupation");
        $data['educations'] = $this->Home_model->getTable2("",array("education_status != 0"),"educations","education");
        $data['country'] = $this->Home_model->getTable2("",array("country_status != 0"),"country","country_name");
        $data['state'] = $this->Home_model->getTable2("",array("state_status != 0"),"states","state_name");
        $data['heights'] = $this->Home_model->getTable("","","height");

        $settings        = get_setting();
        $header['title'] = $settings->title . " | Advance Search";
        $this->load->view('header', $header); 
        $this->load->view('regularsearch',$data);
        $this->load->view('footer');
    }

     public function list_search() { 
    	$data = $_POST;
    	$template['page_title'] = "Searchresult";  
		$template['page'] = "searchresult"; 
    	//$template['all_user'] = $this->Search_model->search_user_details($data);
    	$this->load->view('template', $template); 
    	} 

}
?>
