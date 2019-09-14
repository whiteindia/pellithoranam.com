
<?php
class App extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('App_model');
        $this->load->model('Home_model');
        $this->load->model('Profile_model');
        $this->load->model('Search_model');
        $this->load->library('encrypt');
    }

    public function basic_data() {
      $ret_basic = array("");
      $gender = array("Male","Female");
      $mother_tongue = $this->App_model->getTable("","","mother_tongues");
      $heights = $this->App_model->getTable("","","height");
      $weights = $this->App_model->getTable("","","weight");
      $where1[] = "occupation_status = '1'";
      $occupations  = $this->App_model->getTable("",$where1,"occupations");
      $where2[] = "education_status = '1'";
      $educations = $this->App_model->getTable("",$where2,"educations");
      $where3[] = "country_status = '1'";
      $countries = $this->App_model->getTable("",$where3,"country");
      $where4[] = "religion_status = '1'";
      $religion = $this->App_model->getTable("",$where4,"religions");
      $ret_basic = array('status'    =>"success",
                         'data'      => array("version" =>1,"gender" => $gender,
                         'languages' => $mother_tongue,
                         'maritial_status' => array("Never Married",
                                                    "Divorced","Widowed",
                                                    "Awaiting for Divorce"),
                         'height' => $heights,
                         'physical_status'=> array("Normal","Physically Challenged"),
                         'family_status'  => array("Middle Class","Upper Middile Class","Rich","Affluent"),
                         'family_type'    => array("Joint","Nuclear"),
                         'family_value'   => array("Orthodox","Traditional","Moderate","Liberal"),
                         'eating_habit'   => array("Vegetarian","Non Vegitarian","Eggetarian"),
                         'smoking_habit'  => array("No","Occasionaly","Yes"),
                         'drinking_habit' => array("No","Drinks Socialy","Yes"),
                         'complexion'  => array("Very Fair","Fair","Wheatish","Wheatish Brown","Dark"),
                         'profile_for' => array("myself","son","daughter","brother","sister","relative"),
                         'body_type' => array("Slim","Average","Athletic","Heavy"),
                         'weight'   => $weights,
                         'stars'   => array("Ashwini","Pushya","Swati","Sravana","Bharani","Ashlesha","Vishakha",
                                            "Dhanishtha","Krittika","Magha","Anuradha","Satabisha","Rohini",
                                            "Poorvaphalguni","Jyeshta","Poorvabhadrapada","Mrigashirsa",
                                            "Uttaraphalguni","Moola","Uttarabhadrapada","Ardra","Hasta",
                                            "Poorvashada","Revati","Punarvasu","Chitra","Uttarashadha"),
                         'raasi'   => array("Aries / Mesh","Taurus / Vrishab","Gemini / Mithun","Cancer / Karka",
                                            "Leo / Simha","Virgo / Kanya","Libra / Tula",
                                            "Scorpio / Vritchik","Sagittarius / Dhanus","Capricorn / Makar",
                                            "Anuradha","Aquarius / Kumbh","Pisces / Meen"),
                         'hobbies' => array("Badmintion","Reading","Writing","Painting","Learning"),
                         'music'   => array("Blues","Ghazals","Rock","Pop","Hip Hop"),
                         'sports'  => array("Cricket","Badminton","Tennis","Football","Hockey"),
                         'movie'   => array("Comedy","Romance","Horror","Action","Classic","Art"),
                         'cuisine' => array("Asian","Indian","Continental","Arabian","Italian"),
                         'reads'   => array("Romance","Comedy","Horror","Humor","Drama","Action","Mystery","Thriller"                ,"Adventure"),
                         'dress_style'   => array("Modern","Conservative"),
                         'interest'      => array("Gaming","Gadgets","Science","Books","Entertainment"),
                         'annual_income' => array("Unspecified","Below 1 Lakh","1 - 5 Lakh","5 - 10 Lakh",
                                                  "Above 10 Lakh"),
                         'employed_in'   => array("Government","Private","Business","Self Employed"),
                         'occupation_category' => $occupations,
                         'education_category'  => $educations,
                         'country'  => $countries,
                         'religion' => $religion)
      );
      header('Content-type: application/json');
      echo json_encode($ret_basic);
    }

    public function get_state() {
      $whr = array(); $states= array();
      if(isset($_GET['id'])) { $whr[] = "country_id = '".$_GET['id']."' "; }
      $whr[] = "state_status = '1'";
      $states = $this->App_model->getTable("",$whr,"states");
      if($states) {
        $ret_msg = array('status'=>"success","data" => array("country_id" => $states[0]->country_id, 
                                                             "states"=>$states));
      } else {
        $ret_msg = array('status'=>"success","data" => array("states"=>[]));
      }
      $this->simple_data_return($ret_msg);
    }

    public function forgot_password() {

      $data = json_decode(file_get_contents('php://input'), true);
      if($data) {
        $email = $data['email'];
        $result=$this->Home_model->forgetpassword($email);
        if($result=="EmailSend") {
          $ret_msg = array('status'=>"success");
        } else {
          $ret_msg = array('status'=>"error",'error'=>"Email Doesn't Exist",'message'=>"Email Doesn't Exist");
        }
      }
      $this->simple_data_return($ret_msg);
    }

    public function save_search() {
     if(isset(apache_request_headers()['Authorization'])) {
      $data = json_decode(file_get_contents('php://input'), true);
      $headers = apache_request_headers();    

        $usr_id  = $this->App_model->getUser_from_Token($headers['Authorization']);
      if($data) {
        $result=$this->App_model->save_search($data,$usr_id);
        if($result) {
          $ret_msg = array('status'=>"success");
        } else {
          $ret_msg = array('status'=>"error",'error'=>"Save failed",'message'=>"Saving of search preference failed, Please try again!");
        }
      }
      $this->simple_data_return($ret_msg);
    } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
  }
    public function save_search_list() {
      if(isset(apache_request_headers()['Authorization'])) {
          $save_search_list= array();
          $headers = apache_request_headers();    
          $usr_id  = $this->App_model->getUser_from_Token($headers['Authorization']);
          $save_search_list = $this->App_model->save_search_list($usr_id);
          if($save_search_list) {
            $ret_msg = array('status'=>"success","data" => array("save_search_list"=>$save_search_list));
          } else {
            $ret_msg = array('status'=>"success","data" => array("save_search_list"=>[]));
          }
          $this->simple_data_return($ret_msg);
    } else {
          $ret_msg = array('status'=>"error",'error'=>"Something Went Wrong",'message'=>"Something Went Wrong, Please try again");
        }
  }
    public function get_city() {
      $whr = array(); $cities= array();
      if(isset($_GET['id'])) { $whr[] = "state_id = '".$_GET['id']."' "; }
      $whr[] = "city_status = '1'";
      $cities = $this->App_model->getTable("",$whr,"cities");
      if($cities) {
        $ret_msg = array('status'=>"success","data" => array("country_id" => $cities[0]->country_id,
                                                             "state_id" => $cities[0]->state_id,
                                                             "cities"=>$cities));
      } else {
        $ret_msg = array('status'=>"success","data" => array("cities"=>[]));
      }
      $this->simple_data_return($ret_msg);
    }

    public function get_caste() {
      $whr = array(); $castes= array();
      if(isset($_GET['id'])) { $whr[] = "religion_id = '".$_GET['id']."' "; }
      $whr[] = "caste_status = '1'";
      $castes = $this->App_model->getTable("",$whr,"castes");
      if($castes) {
        $ret_msg = array('status'=>"success","data" => array("religion_id"=>$castes[0]->religion_id,
                                                             "castes"=>$castes));
      } else {
        $ret_msg = array('status'=>"success","data" => array("castes"=>[]));
      }
      $this->simple_data_return($ret_msg);
    }

    public function get_sub_caste() {
      $whr = array(); $sub_castes= array();
      if(isset($_GET['id'])) { $whr[] = "caste_id = '".$_GET['id']."' "; }
      $whr[] = "sub_caste_status = '1'";
      $sub_castes = $this->App_model->getTable("",$whr,"sub_castes");
      if($sub_castes) {
        $ret_msg = array('status'=>"success","data" => array("religion_id"=>$sub_castes[0]->religion_id,
                                                             "caste_id"=>$sub_castes[0]->caste_id,
                                                             "sub_castes"=>$sub_castes)); 
      } else {
        $ret_msg = array('status'=>"success","data" => array("sub_castes"=>[]));
      }
      $this->simple_data_return($ret_msg);
    }

    public function check_login() {
        $data = json_decode(file_get_contents('php://input'), true);
        if($data) {
      	$email = $data['email']; //"jai@gmail.com";
      	$pass = $data['password']; // "123456";
      	$logn_data = $this->App_model->checkLogin($email,$pass);
       // print_r($logn_data); die();
      	if($logn_data) { 
            if($logn_data['status'] == 1) {
                $user_details = $logn_data['data']->matrimony_id;
                $ret_1 = $this->success_return($user_details);
            }
            else if($logn_data['status'] == 2) {
                 $ret_1 = $this->error_return("Profile not approved yet","Profile not approved");
            }
            else if($logn_data['status'] == 3) { 
                  $ret_1 = $this->error_return("Invalid username or password","Invalid Username or Password");
            }
            else if($logn_data['status'] == 4) { 
                  $ret_1 = $this->error_return("Email not exists","Invalid Email id");
            }
            else if($logn_data['status'] == 5) { 
                  $ret_1 = $this->error_return("Profile deleted or banned","Profile deleted or banned");
            }
            else if($logn_data['status'] == 6) { 
                  $ret_1 = $this->error_return("No Accounts Found","No Accounts Found");
            }
            else { $ret_1 = $this->error_return("Profile Deactivated","Profile Deactivated"); }
      	} else { 
      		    $ret_1 = $this->error_return("No Accounts","Empty records users table"); 
      	}
      	header('Content-type: application/json');
      	echo json_encode($ret_1);
      }
    }

    public function register() {
        $data = json_decode(file_get_contents('php://input'), true);
        $is_insrt = $this->App_model->insertRegistration($data);
        if($is_insrt) {
          $this->Home_model->InsertMembershipDetails($is_insrt);
          $this->Home_model->InsertSettingsPreferences($is_insrt);
        	$ret_1 = $this->success_return($is_insrt); 
          $this->send_otp($is_insrt,$data['phone']);
        } else { 
        	$ret_1 = $this->error_return("Data mismatch error","Registration Failed"); 
        }
        header('Content-type: application/json');
    	  echo json_encode($ret_1);
    }

    public function search() {
      if(isset(apache_request_headers()['Authorization'])) {
        $headers = apache_request_headers();
        $qry = "";
        $where = array(); $or_where= array(); $like = array();

        $usr_id  = $this->App_model->getUser_from_Token($headers['Authorization']);
        $gender  = $this->App_model->getGender_from_Matri($usr_id);

        if($gender == "male") { 
          $where[]= "profiles.gender = 'female'";
        } else { 
          $where[]= "profiles.gender = 'male'";
        }

        if(isset($_GET['query'])) {
            if(strpos($_GET['query'], 'T') !== false) { 
              $matri = preg_replace("/[^0-9,.]/", "", $_GET['query']);
              $like[] = "profiles.matrimony_id like '%".$matri."%'";
            } else if(strpos($_GET['query'], '@') !== false) { 
              $like[] = "profiles.email like '%".$_GET['query']."%'";
            } else { 
              $like[] = "profiles.profile_name like '%".$_GET['query']."%'";  
            }
        }

        if((isset($_GET['min_age'])) && ($_GET['min_age']!=0)) { 
          $where[]= "profiles.age >= '".$_GET['min_age']."'"; 
        } if((isset($_GET['max_age'])) && ($_GET['max_age']!=0)) { 
          $where[]= "profiles.age <= '".$_GET['max_age']."'"; 
        } if((isset($_GET['min_height'])) && ($_GET['min_height']!=0)) { 
          $where[]= "profiles.height_id >= '".$_GET['min_height']."'"; 
        } if((isset($_GET['max_height'])) && ($_GET['max_height']!=0)) { 
          $where[]= "profiles.height_id <= '".$_GET['max_height']."'"; 
        }

        if((isset($_GET['city'])) && ($_GET['city']!=0)) {
          $city = explode(",", $_GET['city']);  
          foreach($city as $check) {
            $or_where[]= "profiles.city = ".$check."";
          }
        } 
        if((isset($_GET['occupation'])) && ($_GET['occupation']!=0)) {
          $occupation = explode(",", $_GET['occupation']);  
          foreach($occupation as $check) {
            $or_where[]= "profiles.occupation_id = ".$check."";
          }
        } 
        if((isset($_GET['state'])) && ($_GET['state']!=0)) {
          $state = explode(",", $_GET['state']);  
          foreach($state as $check) {
            $or_where[]= "profiles.state = ".$check."";
          }
        } 
        if((isset($_GET['caste'])) && ($_GET['caste']!=0)) {
          $caste = explode(",", $_GET['caste']);  
          foreach($caste as $check) {
            $or_where[]= "profiles.caste = ".$check."";
          }
        } 
        if((isset($_GET['mother_tongue'])) && ($_GET['mother_tongue']!=0)) {
          $mother_tongue = explode(",", $_GET['mother_tongue']);  
          foreach($mother_tongue as $check) {
            $or_where[]= "profiles.mother_language = ".$check."";
          }
        } 
        if((isset($_GET['country'])) && ($_GET['country']!=0)) {
          $country = explode(",", $_GET['country']);  
          foreach($country as $check) {
            $or_where[]= "profiles.country = ".$check."";
          }
        } 
        if((isset($_GET['religion'])) && ($_GET['religion']!=0)) {
          $religion = explode(",", $_GET['religion']);  
          foreach($religion as $check) {
            $or_where[]= "profiles.religion = ".$check."";
          }
        } 
        if((isset($_GET['education'])) && ($_GET['education']!=0)) {
          $education = explode(",", $_GET['education']);  
          foreach($education as $check) {
            $or_where[]= "profiles.education_id = ".$check."";
          }
        } 
        if((isset($_GET['maritial_status'])) && ($_GET['maritial_status']!=0)) {
          $maritial_status = explode(",", $_GET['maritial_status']);  
          foreach($maritial_status as $check) {
            $or_where[]= "profiles.maritial_status = ".$check."";
          }
        }
        $where[] = "profiles.is_phone_verified = '1'";
        $where[] = "profiles.profile_approval = '1'";
        $where[] = "profiles.profile_status = '1'";

        $datas = $this->Search_model->search_user_details(10,0, $where,$or_where,$like);

       /* if(isset($_GET['query'])) { $qry = $_GET['query']; }

        $ret_users = $this->App_model->getMatches($headers['Authorization'],$qry);*/

        $ret_usrs  = $this->match_return($datas); 
        header('Content-type: application/json');
        echo json_encode($ret_usrs);
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function insert_shortlist() {
      if(isset(apache_request_headers()['Authorization'])) {
          $data = json_decode(file_get_contents('php://input'), true);
          $headers = apache_request_headers();
          $usr_id  = $this->App_model->getUser_from_Token($headers['Authorization']);
         /* $intrst_count = $this->App_model->getMyCommunications($usr_id,"shot_lister","shot_listed","profile_shortlist");
        
          if($intrst_count['status'] == "success") {*/
            $is_insrt = $this->App_model->insertShotlist($data,$usr_id);
            if($is_insrt) { 
                $ret_val = $this->simple_return("success","",""); 
              }
              else { 
                $ret_val = $this->simple_return("error","Duplicate Data","Profile is Already in Shortlisted"); 
              }
             return $ret_val;
         /* }else{
            $ret_val = $this->simple_return("error","Duplicate Data","Profile is Already in Shortlistefgbgfd"); 
          //return $ret_val;
        } return $ret_val;*/
          //$is_insrt = $this->App_model->insertShotlist($data,$usr_id);
          //$ret_val = $this->simple_return("success","","");
          
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function photo_request() {
      if(isset(apache_request_headers()['Authorization'])) {
          $data = json_decode(file_get_contents('php://input'), true);
          $headers = apache_request_headers();
          $usr_id  = $this->App_model->getUser_from_Token($headers['Authorization']);

          $is_insrt = $this->App_model->insertPhotoRequest($data,$usr_id);
          $ret_val = $this->simple_return("success","","");
          return $ret_val;
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function insert_interest() {
      if(isset(apache_request_headers()['Authorization'])) {
          $data = json_decode(file_get_contents('php://input'), true);
          $headers = apache_request_headers();
          $usr_id  = $this->App_model->getUser_from_Token($headers['Authorization']);

      $intrst_count = $this->Profile_model->CheckCount($usr_id,"interest_from","profile_interest","total_interest");
          if($intrst_count['status'] == "success") {
              $is_insrt = $this->App_model->insertInterest($data,$usr_id);
              if($is_insrt) { 
                $ret_val = $this->simple_return("success","",""); 
              }
              else { 
                $ret_val = $this->simple_return("error","Duplicate Data","Profile is Already in Interested List"); 
              }
          } else { 
                $ret_val = $this->simple_return("error","Interest limit over","Sorry, Your Interest Limit Exceeded");
          }
          return $ret_val;
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function request_accept_decline() {  // INTREST, PHOTO REQUEST ACCEPT/DECLINE
        if(isset(apache_request_headers()['Authorization'])) {
            $auth = apache_request_headers()['Authorization'];
            $data = json_decode(file_get_contents('php://input'), true);
            $user = $this->App_model->getUser_from_Token($auth);
            $ret_users = $this->App_model->AlterHistory($user,$data);
            $ret_otp = $this->simple_return("success","","");
        } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function get_matches() {
      if(isset(apache_request_headers()['Authorization'])) {
        $headers = apache_request_headers();
        $qry = "";
        if(isset($_GET['query'])) { $qry = $_GET['query']; }
        $ret_users = $this->App_model->getMatches($headers['Authorization'],$qry);
        $ret_usrs  = $this->match_return($ret_users); 
        header('Content-type: application/json');
        echo json_encode($ret_usrs);
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function get_shortlist() {
      if(isset(apache_request_headers()['Authorization'])) {
        $qry = "";
        if(isset($_GET['query'])) { $qry = $_GET['query']; }
        $headers = apache_request_headers();
        $im="shot_lister"; $whom="shot_listed";
        $ret_users = $this->App_model->getShortList($headers['Authorization'],$qry,$im,$whom);
        $ret_usrs  = $this->match_return($ret_users); 
        header('Content-type: application/json');
        echo json_encode($ret_usrs);
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function get_shortlisted_me() {
      if(isset(apache_request_headers()['Authorization'])) {
        $qry = "";
        if(isset($_GET['query'])) { $qry = $_GET['query']; }
        $headers = apache_request_headers();
        $im="shot_listed"; $whom="shot_lister";
        $ret_users = $this->App_model->getShortList($headers['Authorization'],$qry,$im,$whom);
        $ret_usrs  = $this->match_return($ret_users); 
        header('Content-type: application/json');
        echo json_encode($ret_usrs);
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function get_recentview() {
      if(isset(apache_request_headers()['Authorization'])) {
        $qry = "";
        if(isset($_GET['query'])) { $qry = $_GET['query']; }
        $headers = apache_request_headers();
        $im="viewer"; $whom = "viewed";
        $ret_users = $this->App_model->getRecentView($headers['Authorization'],$qry,$im,$whom);
        $ret_usrs  = $this->match_return($ret_users); 
        header('Content-type: application/json');
        echo json_encode($ret_usrs);
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function get_viewed_me() {
      if(isset(apache_request_headers()['Authorization'])) {
        $qry = "";
        if(isset($_GET['query'])) { $qry = $_GET['query']; }
        $headers = apache_request_headers();
        $im="viewed"; $whom = "viewer";
        $ret_users = $this->App_model->getRecentView($headers['Authorization'],$qry,$im,$whom);
        $ret_usrs  = $this->match_return($ret_users); 
        header('Content-type: application/json');
        echo json_encode($ret_usrs);
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function get_profile() {

      if(isset(apache_request_headers()['Authorization'])) {
         $id = "";
         if(isset($_GET['id'])) { $id = preg_replace("/[^0-9,.]/", "", $_GET['id']); }
         $headers = apache_request_headers();
         $ret_users = $this->App_model->getProfile($headers['Authorization'],$id);
         if($ret_users) {
              $ret_arr = $this->profile_return($ret_users);
              $ret = array('status'=>"success",
                           'data' => $ret_arr);
              header('Content-type: application/json');
              echo json_encode($ret);
         } else {
              $ret = $this->simple_return("error","User not found in database","Sorry, we can't find any profiles");
         }
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }
    

    public function get_nearby() {
      if(isset(apache_request_headers()['Authorization'])) {
        $qry = "";
        if(isset($_GET['query'])) { $qry = $_GET['query']; }
        $headers = apache_request_headers();
        $ret_users = $this->App_model->getNearByMatches($headers['Authorization'],$qry);
        $ret_usrs  = $this->match_return($ret_users); 
        header('Content-type: application/json');
        echo json_encode($ret_usrs);
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function get_parishes() {
      if(isset(apache_request_headers()['Authorization'])) {
        if(isset($_GET['id'])) { $city_id = $_GET['id']; } else { $city_id = 0; }
        $parishes = $this->App_model->getParish($city_id);
        if(!empty($parishes)) { 
            foreach($parishes as $parish) {
            $paris[] =  array("parish_id" => $parish->id,
                                "parish_name" => $parish->parish_name,
                                "city_id" => $parish->city_id,
                                "state_id" => $parish->state_id,
                                "country_id" => $parish->country_id,
                                "parish_status" => $parish->parish_status);
            }
         
            $pars = array("status" => 'success',
                          "data" => array("city_id" => $city_id,
                                          "parishes" => $paris));
            header('Content-type: application/json');
            echo json_encode($pars);
        }
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function get_packages() {
      if(isset(apache_request_headers()['Authorization'])) {
        $rets = $this->App_model->getPackages();
        //print_r($rets); die();
        foreach($rets as $package) {
          $str=array();
          if($package->personalized_msg== '1') { $str[]="Send Unlimited Personalized Messages"; }
          if($package->verified_mob== '1')     { 
            $str[]="View mobile numbers of ".$package->verified_mob_permonth." members to contact them directly"; }
          if($package->send_sms== '1')         { $str[]="Send SMS"; }
          if($package->chat_instantly== '1')   { $str[]="Chat with Prospects Directly"; }
          if($package->profile_highligher== '1') { $str[]="Makes your profile Stand Out"; }
          if($package->personal_relationship_manager== '1') { $str[]="Personal Relationship Manager"; }
          if($package->profile_tagged== '1')     { $str[]="Profile tagged as paid member for more responses"; }
          if($package->prominent_display== '1')  { $str[]="Prominent display in search results"; }
          if($package->sms_alert== '1')          { $str[]="Get instant notificationson your mobile"; }
          if($package->enhanced_privacy== '1')   { $str[]="Enhanced Privacy"; }
          if($package->view_social_profiles== '1'){ $str[]="View Social and Professional profile of members"; }

          $pack[] = array("id" => $package->id,
                        "name" => $package->package_name,
                        "cost_per_month" => "",
                        "total_cost" => $package->price,
                        "duration" => $package->month,
                        "features" => $str);
        }
        $all_pack = array("status" => 'success',"data" => $pack);
        header('Content-type: application/json');
        echo json_encode($all_pack);
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function membership_details() {
      if(isset(apache_request_headers()['Authorization'])) {
        $auth = apache_request_headers()['Authorization'];
        $user = $this->App_model->getUser_from_Token($auth);
        $data= $this->App_model->get_membership_details($user);
        if($data->membership_package == 1) {
             $membership = array("status" => "success",
                                 "data" => array(
                                      "matrimony_id" => "TCM".$user,
                                      "membership_type" => "Free",
                                      "membership_status" => "Active",
                                      "validity" => "Unlimited",
                                      "renewal_due_date"=> "Unlimited",
                                      "last_renewed"=> "Unlimited"));
        } else {
            $membership = array("status" => "success",
                                 "data" => array("matrimony_id" => "TCM".$user,
                                      "membership_type" => $data->package_name,
                                      "membership_status" => "Active",
                                      "validity" => $data->package_name,
                                      "renewal_due_date"=> $data->membership_expiry,
                                      "last_renewed"=> $data->membership_purchase));
        }
        header('Content-type: application/json');
        echo json_encode($membership);
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

  /*  public function fetch_contact_preference() {
      if(isset(apache_request_headers()['Authorization'])) {
          $auth = apache_request_headers()['Authorization'];
          $user = $this->App_model->getUser_from_Token($auth);
          $data = $this->App_model->get_settings_preferences($user);
          $arr =  array("status" => "success",
                        "data" => array("can_anyone_contact_me" => (($data->contact_preference == 1) ? true : false )));
          header('Content-type: application/json');
          echo json_encode($arr);
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }*/

    public function fetch_settings_preferences() {
      if(isset(apache_request_headers()['Authorization'])) {
          $auth = apache_request_headers()['Authorization'];
          $user = $this->App_model->getUser_from_Token($auth);
          $data = $this->App_model->get_settings_preferences($user);
          if(isset($_GET['type'])) {
              if($_GET['type'] == 1) {                                                    // Manage MAil Alert
                $arr =  array(
                    "status" => "success",
                    "data" => array("is_auto_login_enabled" => (($data->autologin_preference == 1) ? true : false ),
                    "is_weekly_photos_enabled"      => (($data->weeklyphotos_preference == 1) ? true : false ),
                    "is_weekly_match_watch_enabled" => (($data->weeklymatch_preference == 1) ? true : false ),
                    "is_promotions_enabled"         => (($data->promotions_preference == 1) ? true : false )));
              } else if($_GET['type'] == 2) {                                             // Contact Filter API
                $arr =  array(
                    "status" => "success",
                    "data" => array("can_anyone_contact_me" => (($data->contact_preference == 1) ? true : false )));
              } else if($_GET['type'] == 3) {                                             //  Profile Settings API
                $arr =  array(
                    "status" => "success",
                    "data" => array("can_anyone_see_my_profile" => (($data->profilevisibility_preference == 1) ? true : false ),
                    "can_others_know_i_shortlisted_them" => (($data->shortlist_preference == 1) ? true : false )));
              } else if($_GET['type'] == 4) {                                             // Notifications Settings
                $arr =  array(
                    "status" => "success",
                    "data" => array("is_all_notifications_enabled" => (($data->notifications_preference == 1) ? true : false ),
                      "is_daily_recommendations_enabled" => (($data->dailyrecommendations_preference == 1) ? true : false ),
                      "is_new_matching_profiles_enabled" => (($data->matchingprofiles_preference == 1) ? true : false ),
                      "is_shortlisted_me_enabled" => (($data->shortlistedme_preference == 1) ? true : false ),
                      "is_sms_alerts_enabled" => (($data->smsalerts_preference == 1) ? true : false ),
                      "is_who_viewed_my_profile_enabled" => (($data->whoviewedmyprofile_preference == 1) ? true : false )));
              } else {                                                                    // Call Preference API
                $arr =  array("status" => "success",
                        "data" => array("call_preference" => (($data->call_preference == 1) ? true : false )));
              }
          }
          header('Content-type: application/json');
          echo json_encode($arr);
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function update_settings_preferences() {
      if(isset(apache_request_headers()['Authorization'])) {
          $auth = apache_request_headers()['Authorization'];
          $data = json_decode(file_get_contents('php://input'), true);
          $user = $this->App_model->getUser_from_Token($auth);
          
          if(isset($data['type'])) {
              if($data['type'] == 1) {                                                    // Manage MAil Alert
                $arr = array("autologin_preference" => $data['is_auto_login_enabled'],
                    "weeklyphotos_preference"      => $data['is_weekly_photos_enabled'],
                    "weeklymatch_preference" => $data['is_weekly_match_watch_enabled'],
                    "promotions_preference"         => $data['is_promotions_enabled']);
              } else if($data['type'] == 2) {                                             // Contact Filter API
                $arr = array("contact_preference" => $data['can_anyone_contact_me']);
              } else if($data['type'] == 3) {                                             //  Profile Settings API
                $arr = array("profilevisibility_preference" => $data['can_everyone_see_my_profile'],
                    "shortlist_preference" => $data['let_others_know_i_shortlisted']);
              } else if($data['type'] == 4) {                                             // Notifications Settings
                $arr = array("notifications_preference" => $data['all_notifications'],
                    "dailyrecommendations_preference"   => $data['daily_recommendations'],
                    "matchingprofiles_preference"       => $data['new_matching_profiles'],
                    "shortlistedme_preference"          => $data['who_shortlisted_me'],
                    "smsalerts_preference"              => $data['sms_alerts'],
                    "whoviewedmyprofile_preference"     => $data['who_viewed_my_profile']);
              } else {                                                                    // Call Preference API
                $arr = array("call_preference" => $data['call_preference']);
              }
          }
          $this->App_model->updateSettingsPreferences($user,$arr);
          $ret_otp = $this->simple_return("success","","");
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function delete_profile() {
      if(isset(apache_request_headers()['Authorization'])) {
        $auth = apache_request_headers()['Authorization'];
        $data = json_decode(file_get_contents('php://input'), true);
        $delete = $this->App_model->delete_profile($data,$auth);
        if($delete) $ret_otp = $this->simple_return("success","","");
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

     public function deactivate_profile() {
      if(isset(apache_request_headers()['Authorization'])) {
        $auth = apache_request_headers()['Authorization'];
        $data = json_decode(file_get_contents('php://input'), true);
        $deactivate = $this->App_model->deactivate_profile($data,$auth);
        if($deactivate) $ret_otp = $this->simple_return("success","","");
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function get_daily_recommendation() {
      if(isset(apache_request_headers()['Authorization'])) {
        $auth = apache_request_headers()['Authorization'];
        $user = $this->App_model->getUser_from_Token($auth);
        $daily = $this->Profile_model->getDailyRecommendation($user);
        if($daily) { $users = $this->App_model->getUser($daily->matrimony_id,""); 
        if(!empty($users)) {
              $ret_arr = $this->profile_return($users);
              $ret = array('status'=>"success",
                           'data' => $ret_arr);
              header('Content-type: application/json');
              echo json_encode($ret);
         }} else {
              $ret = $this->simple_return("error","User not found in database","Sorry, we can't find any profiles");
         }
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }


    public function user_info() {
        $headers = apache_request_headers();
        $ret_users = $this->App_model->getProfile($headers['Authorization'],"");
        $ret_match = $this->App_model->getMatches($headers['Authorization'],"");
        $my_matr_id = $this->App_model->getUser_from_Token($headers['Authorization']);
        $ret_pending  = $this->get_inbox_pending($my_matr_id);  
        $im="shot_lister"; $whom="shot_listed";
        $ret_shrtlst = $this->App_model->getShortList($headers['Authorization'],"",$im,$whom);
        $ret_pro_vw_me = $this->App_model->getMyProfileViews($headers['Authorization']);
        $ret_short_me = $this->App_model->getShortListedMe($headers['Authorization']);
        $ret_nearby = $this->App_model->getNearByMatches($headers['Authorization'],"");

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
                                'data' => array("no_of_my_matches" => count($ret_match),
                                                "no_of_shortlisted" => count($ret_shrtlst),
                                                "no_of_near_you" => count($ret_nearby),
                                                "no_of_mail_box" => count($ret_pending),
                                                "no_of_viewed_my_profile" => count($ret_pro_vw_me), 
                                                "no_of_shortlisted_me" => count($ret_short_me),
                                                "user" =>array("id" => $ret_users[0]->matrimony_id,
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

    public function fetch_user($usr_id,$uniqueId) {
    	$data_ret = $this->App_model->getUser($usr_id,"");
      if($data_ret[0]->is_phone_verified == 0) { $bools = false; } else { $bools= true; }

      if($data_ret[0]->maritial_status == 1) { $m_stat = "Never Married"; } 
      else if($data_ret[0]->maritial_status == 2) { $m_stat = "Divorced"; } 
      else if($data_ret[0]->maritial_status == 3) { $m_stat = "Widowed"; } 
      else { $m_stat = "Awaiting for Divorce"; }

      if($data_ret[0]->physical_status == 1) { $physical_status = "Normal"; } 
      else { $physical_status = "Physically Challenged"; }

      if($data_ret[0]->family_status == 1) { $family_status = "Middle Class"; } 
      else if($data_ret[0]->family_status == 2) { $family_status = "Upper Middile Class"; } 
      else if($data_ret[0]->family_status== 3) { $family_status = "Rich"; } 
      else { $family_status = "Affluent"; }

      if($data_ret[0]->family_type == 1) { $family_type = "Joint"; } 
      else { $family_type = "Nuclear"; }

      if($data_ret[0]->family_value == 1) { $family_value = "Orthodox"; } 
      else if($data_ret[0]->family_value == 2) { $family_value = "Traditional"; } 
      else if($data_ret[0]->family_value == 3) { $family_value = "Moderate"; } 
      else { $family_value = "Liberal"; }

    	$data_res = array("id" => $usr_id,
    					    "auth_token" => $uniqueId,
                  "matrimony_id" => "TCM".$data_ret[0]->matrimony_id,
    					    "name" => $data_ret[0]->profile_name,
        				  "gender"=> $data_ret[0]->gender,
        				  "DOB"=> $data_ret[0]->dob,
        				  "religion"=> $data_ret[0]->religion,
        				  "mother_tongue"=> $data_ret[0]->mother_tongue_name,
        				  "phone" =>  $data_ret[0]->phone,
        				  "email" => $data_ret[0]->email,
        				  "caste"=> $data_ret[0]->caste_name,
        				  "sub_caste"=> $data_ret[0]->sub_caste_name,
        				  "maritial_status" => $m_stat,
        				  "is_willing_for_intercaste" => (($data_ret[0]->willing_intercast == 1) ? true : false ),
        				  "country"=> $data_ret[0]->country_name,
        				  "state"=> $data_ret[0]->state_name,
        				  "city" => $data_ret[0]->city_name,
        				  "height" => $data_ret[0]->height,
        				  "physical_status" => $physical_status,
        				  "education"=> $data_ret[0]->education,
        				  "occupation" => $data_ret[0]->occupation,
        				  "employed_in" => $data_ret[0]->employed_in,
        				  "country_living_in" => $data_ret[0]->country_name,
        				  "currency"=> $data_ret[0]->currency,
        				  "income" => $data_ret[0]->income,
        				  "is_having_dosham" => (($data_ret[0]->have_dosham == 1) ? true : false ),
        				  "family_status" => $family_status,
        				  "family_type"=> $family_type,
        				  "family_value" => $family_value,
        				  "about_you" => $data_ret[0]->about_you,
                  "is_phone_verified" => (($data_ret[0]->is_phone_verified == 1) ? true : false ));
    	return $data_res;
    }

    public function profile_photo_upload() {
        $headers = apache_request_headers();
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            $uploads_dir = 'assets/uploads/profile_pics/';
            $tmp_name = $_FILES['image']['tmp_name'];
            $pic_name = $_FILES['image']['name'];
            $pic_name = mt_rand().$pic_name;
            move_uploaded_file($tmp_name, $uploads_dir.$pic_name);

            $user = $this->App_model->getUserId_from_Token($headers['Authorization']);

            $data['user_id'] = $user;
            $data['pic_name'] = $pic_name;
            $data['pic_location'] = $uploads_dir."/".$pic_name;
            $data['pic_datetime'] = date('Y-m-d H:i:s', time());
            $this->App_model->updateProfilePic($user,$data,$pic_name);
            $ret_otp = $this->simple_return("success","","");
        } else{
            $ret_otp = $this->simple_return("error","Upload Faied","Upload Failed");
        }
        return $ret_otp;
    }

    public function profile_gallery_upload() {
      $headers = apache_request_headers();
      if ($_FILES['photos']['tmp_name']) {
          $count_photos = count($_FILES['photos']['tmp_name']);
          for($i=0;$i<$count_photos;$i++) {
              $uploads_dir = 'assets/uploads/gallery/';
              $tmp_name = $_FILES['photos']['tmp_name'][$i];
              $pic_name = $_FILES['photos']['name'][$i];
              $pic_name = mt_rand().$pic_name;
              move_uploaded_file($tmp_name, $uploads_dir.$pic_name);

              $user = $this->App_model->getUser_from_Token($headers['Authorization']);

              $data['user_id'] = $user;
              $data['image_path'] = $uploads_dir."/".$pic_name;
              $data['date_time'] = date('Y-m-d H:i:s', time());
              $data['pic_approval'] = 0;
              $this->App_model->insertGalleryPics($data);
          }
          $ret_otp = $this->simple_return("success","","");
      } else{
          $ret_otp = $this->simple_return("error","Upload Faied","Upload Failed");
      }
      return $ret_otp;
    }

    public function match_return($ret_users) {
        $headers = apache_request_headers();
        $my_matr_id = $this->App_model->getUser_from_Token($headers['Authorization']);
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
                  "profile_photo" => (isset($users->profile_photo) ? base_url().$users->profile_photo : ""),
                  "phone" => $users->phone,
                  "email" => $users->email,
                  //"is_photo_protected" => (($users->profile_preference == 1) ? true : false ),
                  "is_photo_protected" => $this->get_photo_protected($users->matrimony_id),
                  "is_photo_request_granted" =>  $this->get_photo_request($my_matr_id,$users->matrimony_id) );
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
    public function profile_return($data_ret) {

      $headers = apache_request_headers();
      $my_matr_id = $this->App_model->getUser_from_Token($headers['Authorization']);

      $gallery = array();
      $datad = $this->Profile_model->get_partner_preference($data_ret[0]->matrimony_id,"");
      if(!empty($datad)){
         $pref = $this->getDataPreference($datad); 
      }
     

//print_r($data_ret); die();
      if($data_ret[0]->is_phone_verified == 0) { $bools = false; } else { $bools= true; }

      if($data_ret[0]->maritial_status == 1) { $m_stat = "Never Married"; } 
      else if($data_ret[0]->maritial_status == 2) { $m_stat = "Divorced"; } 
      else if($data_ret[0]->maritial_status == 3) { $m_stat = "Widowed"; } 
      else { $m_stat = "Awaiting for Divorce"; }

      if($data_ret[0]->physical_status == 1) { $physical_status = "Normal"; } 
      else if($data_ret[0]->physical_status == 2) { $physical_status = "Physically Challenged"; }
      else { $physical_status = "Not Specified"; }
	   /* if($datad[0]->physical_status == 1) { $physical_status = "Normal"; } 
      else if($datad[0]->physical_status == 2) { $physical_status = "Physically Challenged"; }
      else { $physical_status = "Not Specified"; }*/
	  
      if($data_ret[0]->family_status == 1) { $family_status = "Middle Class"; } 
      else if($data_ret[0]->family_status == 2) { $family_status = "Upper Middile Class"; } 
      else if($data_ret[0]->family_status== 3) { $family_status = "Rich"; } 
      else if($data_ret[0]->family_status== 4) { $family_status = "Affluent"; }
      else { $family_status = "Not Specified"; }

      if($data_ret[0]->family_type == 1) { $family_type = "Joint"; } 
      else if($data_ret[0]->family_type == 2){ $family_type = "Nuclear"; }
       else{ $family_type = "Not Specified"; }

      if($data_ret[0]->family_value == 1) { $family_value = "Orthodox"; } 
      else if($data_ret[0]->family_value == 2) { $family_value = "Traditional"; } 
      else if($data_ret[0]->family_value == 3) { $family_value = "Moderate"; } 
      else if($data_ret[0]->family_value == 4) { $family_value = "Liberal"; } 
      else { $family_value = "Not Specified"; }

      if($data_ret[0]->eating == 1) { $eating = "Vegetarian"; } 
      else if($data_ret[0]->eating == 2) { $eating = "Non Vegitarian"; } 
      else if($data_ret[0]->eating == 3) { $eating = "Eggetarian"; } 
      else { $eating = "Not Specified"; }

      if($data_ret[0]->smoking == 1) { $smoking = "No"; } 
      else if($data_ret[0]->smoking == 2) { $smoking = "Occasionaly"; }
      else if($data_ret[0]->smoking == 3) { $smoking = "Yes"; } 
      else { $smoking = "Not Specified"; }

      if($data_ret[0]->drinking == 1) { $drinking = "No"; } 
      else if($data_ret[0]->drinking == 2) { $drinking = "Drinks Socialy"; } 
      else if($data_ret[0]->drinking == 3) { $drinking = "Yes"; } 
      else { $drinking = "Not Specified"; }
  
      if($data_ret[0]->body_type == 1) { $bt = "Slim"; }
      else if($data_ret[0]->body_type == 2) { $bt = "Average"; }
      else if($data_ret[0]->body_type == 3) { $bt = "Athletic"; }
      else if($data_ret[0]->body_type == 4) { $bt = "Heavy"; }
      else { $bt = "Not Specified"; }

	  /*if($datad[0]->body_type == 1) { $p_bt[] = "Slim"; }
      else if($datad[0]->body_type == 2) { $p_bt[] = "Average"; }
      else if($datad[0]->body_type == 3) { $p_bt[] = "Athletic"; }
      else if($datad[0]->body_type == 4){ $p_bt[] = "Heavy"; }
	  else{ $p_bt[] = "Not Specified"; }*/

     if($data_ret[0]->complexion == 1) { $cm = "Very Fair"; }
     else if($data_ret[0]->complexion == 2) { $cm = "Fair"; }
     else if($data_ret[0]->complexion == 3) { $cm = "Wheatish"; }
     else if($data_ret[0]->complexion == 4) { $cm = "Wheatish Brown"; }
     else if($data_ret[0]->complexion == 5){ $cm = "Dark"; }
	 else{ $cm = "Not Specified"; }
	 
	 /* if($datad[0]->complexion == 1) { $p_cm[] = "Very Fair"; }
     else if($datad[0]->complexion == 2) { $p_cm[] = "Fair"; }
     else if($datad[0]->complexion == 3) { $p_cm[] = "Wheatish"; }
     else if($datad[0]->complexion == 4) { $p_cm[] = "Wheatish Brown"; }
     else if($datad[0]->complexion == 5) { $p_cm[] = "Dark"; }
     else { $p_cm[] = "Not Specified"; }*/
	 
	if(!empty($data_ret[0]->profile_photo)){
		 array_push($gallery,base_url().$data_ret[0]->profile_photo);
	}
     $gallery_pics = $this->App_model->getGallery($data_ret[0]->matrimony_id);
	 /* empty case checking start  */
		if(empty($data_ret[0]->hobbies )){
		 $data_ret[0]->hobbies = array();	
		}
		if(empty($data_ret[0]->music )){
		 $data_ret[0]->music = array();	
		}
		if(empty($data_ret[0]->sports )){
		 $data_ret[0]->sports = array();	
		}
		if(empty($data_ret[0]->spoken_language )){
		 $data_ret[0]->spoken_language = array();	
		}
		if(empty($data_ret[0]->father_status )){
		 $data_ret[0]->father_status = "Not Specified";
		}
		if(empty($data_ret[0]->mother_status )){
		 $data_ret[0]->mother_status = "Not Specified";
		}
		if(empty($data_ret[0]->brothers )){
		 $data_ret[0]->brothers = "Not Specified";
		}	
		if(empty($data_ret[0]->sisters )){
		 $data_ret[0]->sisters = "Not Specified";
		}
		if(empty($data_ret[0]->family_about )){
		 $data_ret[0]->family_about = "Not Specified";
		}
		if(empty($data_ret[0]->family_location )){
		 $data_ret[0]->family_location = "Not Specified";
		}
		if(empty($data_ret[0]->family_origin )){
		 $data_ret[0]->family_origin = "Not Specified";
		}		
		/*if(empty($datad[0]->age_from )){
		 $datad[0]->age_from = "Not Specified";
		}
		if(empty($datad[0]->age_to )){
		 $datad[0]->age_to  = "Not Specified";
		}
		if(empty($datad[0]->height_from_id )){
		 $datad[0]->height_from_id = "Not Specified";
		}
		if(empty($datad[0]->height_to_id )){
		 $datad[0]->height_to_id  = "Not Specified";
		}
		if(empty($datad[0]->weight_from)){
		 $datad[0]->weight_from = "Not Specified";
		}
		if(empty($datad[0]->weight_to )){
		 $datad[0]->weight_to = "Not Specified";
		}
		if(empty($datad[0]->mother_language )){
		 $datad[0]->mother_language = "Not Specified";
		}
		if(empty($datad[0]->physical_status )){
		 $datad[0]->physical_status = "Not Specified";
		}


    if(empty($datad[0]->mother_language )){
     $datad[0]->mother_language = "Not Specified";
    }
    if(empty($datad[0]->religion_name )){
     $datad[0]->religion_name = "Not Specified";
    }*/
    if(empty($data_ret[0]->p_caste_name )){
     $data_ret[0]->p_caste_name = "Not Specified";
    }
    if(empty($data_ret[0]->p_sub_caste_name )){
     $data_ret[0]->p_sub_caste_name = "Not Specified";
    }


    if(empty($data_ret[0]->p_star_name )){
     $data_ret[0]->p_star_name = "Not Specified";
    }

    if(empty($data_ret[0]->p_raasi_name)){
     $data_ret[0]->p_raasi_name = "Not Specified";
    }
    if(empty($data_ret[0]->p_education )){
     $data_ret[0]->p_education = "Not Specified";
    }
    if(empty($data_ret[0]->p_occupation )){
     $data_ret[0]->p_occupation = "Not Specified";
    }
    if(empty($data_ret[0]->citizenship )){
     $data_ret[0]->citizenship = "Not Specified";
    }
    if(empty($data_ret[0]->p_country_name )){
     $data_ret[0]->p_country_name = "Not Specified";
    }
    if(empty($data_ret[0]->p_state_name )){
     $data_ret[0]->p_state_name = "Not Specified";
    }
    if(empty($data_ret[0]->p_city_name )){
     $data_ret[0]->p_city_name = "Not Specified";
   } 
   if(empty($data_ret[0]->citizenship_name)){
     $data_ret[0]->citizenship_name = "Not Specified";
   }
	/* End empty case checking   */
	/* explode case checking start  */
		if(!empty($data_ret[0]->languages)) {
				$array = $data_ret[0]->languages;				
		$comma_separated = explode(",", $array);		
		$data_ret[0]->languages = $comma_separated;
			}
			if(!empty($data_ret[0]->sports)) {
				$array = $data_ret[0]->sports;				
		$comma_separated = explode(",", $array);		
		$data_ret[0]->sports = $comma_separated;
			}
			if(!empty($data_ret[0]->hobbies)) {
				$array = $data_ret[0]->hobbies;				
		$comma_separated = explode(",", $array);		
		$data_ret[0]->hobbies = $comma_separated;
			}
			if(!empty($data_ret[0]->music)) {
				$array = $data_ret[0]->music;				
		$comma_separated = explode(",", $array);		
		$data_ret[0]->music = $comma_separated;
			}
			
/*
      $mtng = $this->Profile_model->getDetails('mother_tongues','mother_tongue_id',$data_ret[0]->mother_language);
  foreach($mtng as $mtn) { echo $mtn->mother_tongue_name; }
print_r($arr1);*/
			/*End explode case checking  */
	 if($gallery_pics){
     foreach($gallery_pics as $pic) { array_push($gallery,base_url().$pic->image_path); } 
	 }

   if(!empty($datad)){
    $pref_arr = array("min_age" => $pref['min_age'],
                      "max_age" => $pref['max_age'],
                      "min_height" => $pref['min_height'],
                      "max_height" => $pref['max_height'],
                      "min_weight" => $pref['min_weight'],
                      "max_weight" => $pref['max_weight'], 
                      "mother_tongue" => get_mother($pref['mother']),
                      "physical_status" =>preferncecallback('physical',$datad[0]->physical_status),
                      "dosham" => preferncecallback('dosham',$datad[0]->dosham),
                      "min_income" => $pref['min_income'],
                      "max_income" => $pref['max_income'],
                      "partner_description" => $datad[0]->about_partner,
                      "maritial_status" => preferncecallback('maritial',$datad[0]->maritial_status),
                      "body_type" => preferncecallback('body_type',$datad[0]->body_type),
                      "complexion" => preferncecallback('complexion',$datad[0]->complexion),
                      "eating_habit" => preferncecallback('eating',$datad[0]->eating_habit),
                      "drinking_habit" => preferncecallback('drinking',$datad[0]->drinking_habit),
                      "smoking_habit" => preferncecallback('smoking',$datad[0]->smoking_habit),
                      "language" => array($datad[0]->mother_tongue_name),
                      "religion" => get_religion($pref['religion']),
                      "caste" => get_caste($pref['caste']),
                      "subcaste" => $pref['subcaste'],
                      "star" => array($datad[0]->star),
                      "raasi" => array($datad[0]->raasi),
                      "education" => $pref['education'],
                      "occupation" =>$pref['occupation'],
                      "citizenship" => $pref['citizenship'],
                      "countries" =>$pref['country'],
                      "states" =>$pref['state'],
                      "cities" => $pref['city']);
   } else {
    $pref_arr = array("min_age" => "Any",
                      "max_age" => "Any",
                      "min_height" => "Any",
                      "max_height" => "Any",
                      "min_weight" => "Any",
                      "max_weight" => "Any", 
                      "mother_tongue" =>"Any",
                      "physical_status" => "Any",
                      "dosham" => "Any",
                      "min_income" => "Any",
                      "max_income" => "Any",
                      "partner_description" => "Any",
                      "maritial_status" => array("Any"),
                      "body_type" => array("Any"),
                      "complexion" => array("Any"),
                      "eating_habit" => array("Any"),
                      "drinking_habit" => array("Any"),
                      "smoking_habit" => array("Any"),
                      "language" => array("Any"),
                      "religion" =>array("Any"),
                      "caste" =>array("Any"),
                      "sub_caste" =>array("Any"),
                      "star" => array("Any"),
                      "raasi" =>array("Any"),
                      "education" =>array("Any"),
                      "occupation" =>array("Any"),
                      "citizenship" => array("Any"),
                      "countries" =>array("Any"),
                      "states" => array("Any"),
                      "cities" => array("Any"));
   }


        $data_res = array("id" => $data_ret[0]->profile_id,
                          "matrimony_id" => "TCM".$data_ret[0]->matrimony_id,
                          "is_premium_member" => false,
                          "phone" =>  $data_ret[0]->phone,
                          "profile_photo" => isset($data_ret[0]->profile_photo) ? base_url().$data_ret[0]->profile_photo : "",
                          "name" => $data_ret[0]->profile_name,
                          "age"  => $data_ret[0]->age,
						              "dob"  => $data_ret[0]->dob,
                          "height" => $data_ret[0]->height,
                          "eating_habit" => $eating,
                          "smoking_habit" => $smoking,
                          "profile_created_for" => $data_ret[0]->profile_for,
                          "body_type" => $bt,
                          "complexion" => $cm,
                          "physical_status" => $physical_status,
                          "mother_tongue" => $data_ret[0]->mother_tongue_name,
                          "weight" => $data_ret[0]->weight,
                          "maritial_status" => $m_stat,
                          "drinking_habit" => $drinking,
                          "religion"=> $data_ret[0]->religion_name,
                          "caste"=> $data_ret[0]->caste_name,
                          "sub_caste"=> $data_ret[0]->sub_caste_name,
                          "star" => $data_ret[0]->star_name,
                          "raasi" => $data_ret[0]->raasi_name,
                          "dosham" => $data_ret[0]->dosham_details,
                          "country"=> $data_ret[0]->country_name,
						              "currency"=> $data_ret[0]->currency,
                          "state"=> $data_ret[0]->state_name,
                          "city" => $data_ret[0]->city_name,
                          "citizenship" => $this->get_citizen($data_ret[0]->citizenship),
                          "education" => $data_ret[0]->education,
                          "college" => $data_ret[0]->college,
                          "education_in_detail" => $data_ret[0]->education_detail,
                          "occupation" => $data_ret[0]->occupation,
                          "occupation_in_detail" => $data_ret[0]->occupation_detail,
                          "company" => $data_ret[0]->occupation_sector,
                          "employed_in" => $data_ret[0]->employed_in,
                          "annual_income" => $data_ret[0]->income,
                          "family_value" => $family_value,
                          "family_type"=> $family_type,
                          "family_status" => $family_status,
                          "family_origin" => $data_ret[0]->family_origin,
                          "family_location" => $data_ret[0]->family_location,
                          "fathers_occupation" => $data_ret[0]->father_status,
                          "mothers_occupation" => $data_ret[0]->mother_status,
                          "no_of_brothers" => $data_ret[0]->brothers,
                          "no_of_sisters" => $data_ret[0]->sisters,
                          "about_family" => $data_ret[0]->family_about,
                          "about" => $data_ret[0]->about_you,
                          "photos" => $gallery,
                          "hobbies" => $data_ret[0]->hobbies,
                          "music" => $data_ret[0]->music,
                          "sports_and_fitness" => $data_ret[0]->sports,
                          "cuisine" => array("Not Specified"),
                          "reads" => array("Not Specified"),
                          "movies" => array("Not Specified"),
                          "spoken_languages" => $data_ret[0]->languages,
                          "is_photo_protected" => $this->get_photo_protected($data_ret[0]->matrimony_id),
                          "is_photo_request_granted" =>  $this->get_photo_request($my_matr_id,$data_ret[0]->matrimony_id),
                          "partner_preference" =>$pref_arr) 
														;
//print_r( $data_res); die();
        return $data_res;
    }
    public function hello1($arr){
      print_r($arr); die();
    }
public function get_citizen($citizenship){
 // var_dump($citizenship); 
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
    public function getDataPreference($prefs) {
    $country = array(); $state=array(); $educs=array(); $occus=array();$city=array();
    $country_ids = array(); $state_ids=array(); $educs_ids=array(); $occus_ids=array();$subcaste=array(); $citizenship=array();
    if(!empty($prefs[0]->country)) {    
      $ctry = explode(",", $prefs[0]->country);   //print_r($ctry);
      for($i=0;$i<count($ctry);$i++) {
       //echo $ctry[$i];
        if(!empty($ctry[$i])){
         $country_ids[]= $ctry[$i];
        $country[]=$this->Profile_model->getDetails('country','country_id',$ctry[$i])[0]->country_name; 
        }
        
      }
    }else{$country[]='Any';}
    if(!empty($prefs[0]->citizenship)) {    
      $ctry = explode(",", $prefs[0]->citizenship);   //print_r($ctry);
      for($i=0;$i<count($ctry);$i++) {
      if(!empty($ctry[$i])){ //echo $ctry[$i];
        $citizenship_ids[]= $ctry[$i];
        $citizenship[]=$this->Profile_model->getDetails('country','country_id',$ctry[$i])[0]->country_name;
      }
    }
    }else{$citizenship[]='Any';}
    if(!empty($prefs[0]->state)) {    
      $ctry = explode(",", $prefs[0]->state); //  print_r($ctry);
      for($i=0;$i<count($ctry);$i++) { 
        if(!empty($ctry[$i])){
        $state_ids[]= $ctry[$i];
        $state[]=$this->Profile_model->getDetails('states','state_id',$ctry[$i])[0]->state_name;
      }
      }
    }else{$state[]='Any';}
    if(!empty($prefs[0]->education)) {    
      $ctry = explode(",", $prefs[0]->education); //  print_r($ctry);
      for($i=0;$i<count($ctry);$i++) { 
        if(!empty($ctry[$i])){
        $educs_ids[]= $ctry[$i];
        $educs[]=$this->Profile_model->getDetails('educations','education_id',$ctry[$i])[0]->education;
      }
      }
    }else{$educs[]='Any';}
    if(!empty($prefs[0]->occupation)) {   
      $ctry = explode(",", $prefs[0]->occupation);  //  print_r($ctry);
      for($i=0;$i<count($ctry);$i++) {
      if(!empty($ctry[$i])){ 
        $occus_ids[]= $ctry[$i];
        $occus[]=$this->Profile_model->getDetails('occupations','occupation_id',$ctry[$i])[0]->occupation;
      }
      }
    }else{$occus[]='Any';}
    if(!empty($prefs[0]->city)) {   
      $ctry = explode(",", $prefs[0]->city);  //  print_r($ctry);
      for($i=0;$i<count($ctry);$i++) { 
        if(!empty($ctry[$i])){
        $city_ids[]= $ctry[$i];
        $city[]=$this->Profile_model->getDetails('cities','city_id',$ctry[$i])[0]->city_name;
      }
      }
    }else{$city[]='Any';}
    if(!empty($prefs[0]->subcaste)) {   
      $ctry = explode(",", $prefs[0]->subcaste);  //  print_r($ctry);
      for($i=0;$i<count($ctry);$i++) {
      if(!empty($ctry[$i])){ 
        $sub_caste_ids[]= $ctry[$i];
        $subcaste[]=$this->Profile_model->getDetails('sub_castes','sub_caste_id',$ctry[$i])[0]->sub_caste_name;
      }
      }
    }else{$subcaste[]='Any';}
    $min_height = $this->Profile_model->getDetails('height','height_id',$prefs[0]->height_from_id);
    if($min_height) { 
      if($min_height[0] == "Not Specified") { 
        $d_height = $min_height[0]; 
      } else {
        $d_height = $min_height[0]->height;
      }
    } else { 
      $d_height =""; 
    }

    $max_height = $this->Profile_model->getDetails('height','height_id',$prefs[0]->height_to_id);
    if($max_height) { 
      if($max_height[0] == "Not Specified") { 
        $l_height = $max_height[0]; 
      } else {
        $l_height = $max_height[0]->height;
      }
    } else { $l_height =""; }


 $min_weight = $this->Profile_model->getDetails('weight','weight_id',$prefs[0]->weight_from);
    if($min_weight) { 
      if($min_weight[0] == "Not Specified") { 
        $d_weight = $min_weight[0]; 
      } else {
        $d_weight = $min_weight[0]->weight;
      }
    } else { 
      $d_weight =""; 
    }

     $max_weight = $this->Profile_model->getDetails('weight','weight_id',$prefs[0]->weight_to);
    if($max_weight) { 
      if($max_weight[0] == "Not Specified") { 
        $l_weight = $max_weight[0]; 
      } else {
        $l_weight = $max_weight[0]->weight;
      }
    } else { $l_weight =""; }
    //print_r($prefs); die();if()
    $data['maritial'] = preferncecallback('maritial',$prefs[0]->maritial_status);
    $data['maritial_id'] = $prefs[0]->maritial_status;
    $data['physical'] = preferncecallback('physical',$prefs[0]->physical_status);
    $data['physical_id'] =$prefs[0]->physical_status;
    $data['eating'] = preferncecallback('eating',$prefs[0]->eating_habit);
    $data['eating_id'] = $prefs[0]->eating_habit;
    $data['smoking'] = preferncecallback('smoking',$prefs[0]->smoking_habit);
    $data['smoking_id'] =$prefs[0]->smoking_habit;
    $data['drinking'] = preferncecallback('drinking',$prefs[0]->drinking_habit);
    $data['drinking_id'] =$prefs[0]->drinking_habit;
    $data['religion'] =$this->Profile_model->getDetails('religions','religion_id',$prefs[0]->religion);
    $data['religion_id'] = $prefs[0]->religion_id;
    $data['caste'] = $this->Profile_model->getDetails('castes','caste_id',$prefs[0]->caste);
    //$data['country_id'] =$this->Profile_model->getDetails('country','country_id',$prefs[0]->country_id);
    $data['mother'] = $this->Profile_model->getDetails('mother_tongues','mother_tongue_id',$prefs[0]->mother_language);
    //$data['star']   = $this->Profile_model->getDetails('stars','star_id',$prefs[0]->star);
    
    $data['country'] = $country;
    $data['country_ids'] = $country_ids;
    $data['state']   = $state;
    $data['state_ids']   = $state_ids;
    $data['city']   = $city;
    $data['subcaste']   = $subcaste;
    $data['citizenship'] = $citizenship;
   // $data['city_ids']   = $city_ids;
    //$data['city']     = $this->Profile_model->getDetails('cities','city_id',$prefs[0]->city);
    $data['education'] = $educs;
    $data['education_ids'] = $educs_ids;
    $data['occupation'] = $occus;
    $data['occupation_ids'] = $occus_ids;
    //$data['sub_castes'] = $this->Profile_model->getDetails('sub_castes','sub_caste_id',$prefs[0]->subcaste);
    //$data['raasi'] = $this->Profile_model->getDetails('raasi','raasi_id',$prefs[0]->raasi);
    //$data['dosham'] = preferncecallback('dosham',$prefs[0]->dosham);
    $data['citizen'] = $this->Profile_model->getDetails('country','country_id',$prefs[0]->citizenship);
    $data['min_height'] = $d_height;
    $data['max_height'] = $l_height;
    $data['min_weight'] = $d_weight;
    $data['max_weight'] = $l_weight;
    $data['min_age'] = $prefs[0]->age_from;
    $data['max_age'] = $prefs[0]->age_to;
    $data['min_income'] =$prefs[0]->min_income;
    $data['max_income'] = $prefs[0]->max_income;
    $data['body_type'] = preferncecallback('body_type',$prefs[0]->body_type);
    $data['body_type_id'] =$prefs[0]->body_type;
    $data['complexion'] = preferncecallback('complexion',$prefs[0]->complexion);
    $data['complexion_id'] =$prefs[0]->complexion;
    $data['abt_part'] = $prefs[0]->about_partner;
    return $data;
  }

    public function change_mobile() {
      if(isset(apache_request_headers()['Authorization'])) {
          $data = json_decode(file_get_contents('php://input'), true);
          $auth = apache_request_headers()['Authorization'];
          
          $usr_id = $this->App_model->getUser_from_Token($auth);
          $this->App_model->ChangeMobile($usr_id,$data['phone']);

          $otp = $this->generate_otp();
          $this->App_model->InsertOTP($usr_id,$data['phone'],$otp);
          $msg = "Hello, Your one time password for www.Pellithoranam.com/ is ".$otp." . Do not share the password with anyone for security reasons.";
          $this->send_sms($data['phone'],$msg);
          $this->simple_return("success","",""); 

        } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function send_otp($user,$mob) {
          $otp = $this->generate_otp();
          $this->App_model->InsertOTP($user,$mob,$otp);
          $msg = "Hello, Your one time password for www.Pellithoranam.com/ is ".$otp." . Do not share the password with anyone for security reasons.";
          $this->send_sms($mob,$msg);
    }

    public function resend_otp() {
       if(isset(apache_request_headers()['Authorization'])) {

          $data = json_decode(file_get_contents('php://input'), true);
          $auth = apache_request_headers()['Authorization'];
          $otp = $this->generate_otp();
          $usr_id = $this->App_model->getUser_from_Token($auth);

          $this->App_model->InsertOTP($usr_id,$data['phone'],$otp);
          $msg = "Hello, Your one time password for www.Pellithoranam.com/ is ".$otp." . Do not share the password with anyone for security reasons.";

          $this->send_sms($data['phone'],$msg);
          $this->simple_return("success","",""); 

        } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function verify_otp() {
      if(isset(apache_request_headers()['Authorization'])) {
          $data = json_decode(file_get_contents('php://input'), true);
          $auth = apache_request_headers()['Authorization'];
          $otp_suc = $this->App_model->check_otp($auth,$data['phone'],$data['code']);
              if($otp_suc == 1) {

                  $ret_otp = $this->simple_return("success","","");
              } else {
                  $ret_otp = $this->simple_return("error","Invalid otp","Invalid OTP");
              }
              return $ret_otp;
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
    }

    public function check_authorization() {
        $token = null;
        $headers = apache_request_headers();
        if(isset($headers['Authorization'])){
            $auth_msg = $this->App_model->checkAuthorization($headers['Authorization']);
            if($auth_msg) { 
                return 1;
            } else { 
                $ret_msg = $this->simple_return("error","Token to found in database","Un-Authorized Activity");
                return $ret_msg;
            }
        } else {
            $ret_msg = $this->simple_return("error","Token not present in header","Un-Authorized Activity");
            return $ret_msg;
        }
    }

    public function inbox() {
      if(isset(apache_request_headers()['Authorization'])) {
         if(isset($_GET['id'])) {
            //$my_matr_id = 6539442;
            $auth = apache_request_headers()['Authorization'];
            $my_matr_id = $this->App_model->getUser_from_Token($auth);
            if($_GET['id'] ==1) {      $data = $this->get_inbox_pending($my_matr_id); }  // inbox_pending
            else if($_GET['id'] ==2) { $data = $this->get_inbox_accepted($my_matr_id); } // inbox_accepted
            else if($_GET['id'] ==3) { $data = $this->get_inbox_declined($my_matr_id); } // inbox_declined
            else if($_GET['id'] ==4) { $data = $this->get_sent_all($my_matr_id); }       // sent_all
            else if($_GET['id'] ==5) { $data = $this->get_sent_awaiting($my_matr_id); }  // sent_awaiting
            else { $this->simple_return("error","Invalid Request","Invalid Request"); }
            $datas = $this->generate_message_arr($data,$_GET['id']); 
            header('Content-type: application/json');
            echo json_encode($datas);
        } else { $this->simple_return("error","Invalid Request","Invalid Request"); }
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
  }

  public function get_inbox_pending($my_matr_id) {
    $result = array();
    $where[] = "history.history_to = '".$my_matr_id."'";
    $group_by = "history.history_from";
    $member = "from";
    $data = $this->Profile_model->get_inbox($where,$group_by,0,$member,"",""); // where, group by, condition | pending
    foreach($data as $profile) {
      $count  = $this->total_conversations($my_matr_id,$profile->matrimony_id);
      $profile->history  = $count; // die();
    }
    return $data;
  }

  public function get_inbox_accepted($my_matr_id) {
    $result = array();
    $where[] = "history.history_to = '".$my_matr_id."'";
    $group_by = "history.history_from";
    $member = "from";
    $data = $this->Profile_model->get_inbox($where,$group_by,1,$member,"","");
    foreach($data as $profile) {
      $count  = $this->total_conversations($my_matr_id,$profile->matrimony_id);
      $profile->history  = $count; // die();
    }
    return $data;
  }

  public function get_inbox_declined($my_matr_id) {
    $result = array();
    $where[] = "history.history_to = '".$my_matr_id."'";
    $group_by = "history.history_from";
    $member = "from";
    $data = $this->Profile_model->get_inbox($where,$group_by,2,$member,"","");
    foreach($data as $profile) {
      $count  = $this->total_conversations($my_matr_id,$profile->matrimony_id);
      $profile->history  = $count; // die();
    }
    return $data;
  }

  public function get_sent_all($my_matr_id) {
    $result = array();
    $where[] = "history.history_from = '".$my_matr_id."'";
    $group_by = "history.history_to";
    $member = "to";
    $data = $this->Profile_model->get_inbox($where,$group_by,20,$member,"","");
    foreach($data as $profile) {
      $count  = $this->total_conversations($my_matr_id,$profile->matrimony_id);
      $profile->history  = $count; // die();
    }
    return $data;
  }

  public function get_sent_awaiting($my_matr_id) {
    $result = array();
    $where[] = "history.history_from = '".$my_matr_id."'";
    $group_by = "history.history_to";
    $member = "to";
    $data = $this->Profile_model->get_inbox($where,$group_by,0,$member,"","");
    foreach($data as $profile) {
      $count  = $this->total_conversations($my_matr_id,$profile->matrimony_id);
      $profile->history  = $count; // die();
    }
    return $data;
  }

  public function total_conversations($my_matr_id,$to_matr_id) {
    $data = $this->Profile_model->get_inbox_count($my_matr_id,$to_matr_id);
    return $data;
  }

  public function load_messages() {
    $messages = array();
    if(isset(apache_request_headers()['Authorization'])) {

      if(isset($_GET['matrimony_id'])) { $uid = preg_replace("/[^0-9,.]/", "", $_GET['matrimony_id']); }
      $auth = apache_request_headers()['Authorization'];
      $mat_id = $this->App_model->getUser_from_Token($auth);

      $hist  = $this->total_conversations($mat_id,$uid); 
        foreach($hist as $msgs) { 
          if(($uid == $msgs->history_from) && ($mat_id == $msgs->history_to)) {
            if($msgs->history_type == "INTEREST_SENT") {
              $short = "INTEREST_RECEIVED";
              $message = "TCM".$uid." is interested in your profile.";
            } else if($msgs->history_type == "MESSAGE_SENT") {
              $short = "MESSAGE_RECEIVED";
              $message = $msgs->history_message;
            } else if($msgs->history_type == "PHOTO_REQUEST") {
              $short = "PHOTO_REQUEST";
              $message = "You have received Photo Request.";
            } else {}
          } else if(($mat_id == $msgs->history_from) && ($uid == $msgs->history_to)) {
            if($msgs->history_type == "INTEREST_SENT") {
              $short = "INTEREST_SENT";
              $message = "You have sent a interest.";
            } else if($msgs->history_type == "MESSAGE_SENT") {
              $short = "MESSAGE_SENT";
              $message = "You have sent a Message.";
            } else if($msgs->history_type == "PHOTO_REQUEST") {
              $short = "PHOTO_REQUEST";
              $message = "You have sent a Photo Request.";
            } else {}
          } else { 
            $short = "";
            $message = ""; 
          }
          $messages[] = array("id" => $msgs->history_id,
                           "type" => $short,
                           "message" => $message,
                           "mail" => $msgs->history_message,
                           "date" => strtotime($msgs->history_datetime),
                           "is_sent" => "");
        }
        $ret_arr = array('status'=>'success',
                           'data' => array('inbox' => $messages));
        header('Content-type: application/json');
        echo json_encode($ret_arr);

      /*$data = $this->Profile_model->get_inbox("","","","common",$mat_id,$uid);
      foreach($data as $result) {
        $hist  = $this->total_conversations($mat_id,$uid);
        if($result->matrimony_id == $uid) { // history_datetime
          foreach($hist as $msgs) {// echo "<pre>"; print_r($msgs);
            if(($uid == $msgs->history_from) && ($mat_id == $msgs->history_to)) {
              if($msgs->history_type == "INTEREST_SENT") {
                $short = "INTEREST_RECEIVED";
                $message = "T".$result->matrimony_id." is interested in your profile.";
              } else if($msgs->history_type == "MESSAGE_SENT") {
                $short = "MESSAGE_RECEIVED";
                $message = "You have received a message.";
              } else {}
            } else if(($mat_id == $msgs->history_from) && ($uid == $msgs->history_to)) {
              if($msgs->history_type == "INTEREST_SENT") {
                $short = "INTEREST_SENT";
                $message = "You have sent a interest.";
              } else if($msgs->history_type == "MESSAGE_SENT") {
                $short = "MESSAGE_SENT";
                $message = "You have sent a Message.";
              } else {}
            } else { 
              $short = "";
              $message = ""; 
            }
             $messages[] = array("id" => $msgs->history_id,
                           "type" => $short,
                           "message" => $message,
                           "mail" => $msgs->history_message,
                           "date" => strtotime($msgs->history_datetime),
                           "is_sent" => "");
          }
          $ret_arr = array('status'=>'success',
                           'data' => array('inbox' => $messages));
          header('Content-type: application/json');
          echo json_encode($ret_arr);
        }
      }*/
    } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
  }

  public function generate_message_arr($data,$flag) {
       $auth = apache_request_headers()['Authorization'];         
       $my_matr_id = $this->App_model->getUser_from_Token($auth);
      foreach($data as $profiles) { //print_r($profiles);
        $profile = $profiles;
        $msgss   = $profiles->history;
        $messages = array();
        foreach($msgss as $message) {
          if((($flag == 1) || ($flag == 2) || ($flag == 3)) && ($message->history_type == "INTEREST_SENT"))
          $message->history_type = "INTEREST_RECEIVED";
          $messages[] = array("id" => $message->history_id,
                           "type" => $message->history_type,
                           "message" => "",
                           "mail" => $message->history_message,
                           "date" => strtotime($message->history_datetime),
                           "is_sent" => "");
        }

        $prof[] = array( "id"           => $profile->profile_id,
                       "matrimony_id" => "TCM".$profile->matrimony_id,
                       "user_id"      => $profile->user_id,
                       "name"         => $profile->profile_name,
                       "profile_photo" => base_url().$profile->profile_photo,
                       "gender"        => $profile->gender,
                       "phone"         => $profile->phone,
                       "is_interest_sent" => false, 
                       "is_photo_protected" => $this->get_photo_protected($profile->matrimony_id),
                       "is_photo_request_granted" =>  $this->get_photo_request($my_matr_id,$profile->matrimony_id),
                       "inbox" => $messages);
    } 
    if(empty($prof)) { $prof =array(); }

    $ret_arr = array('status'=>'success',
                     'data' => array('count' => count($data),
                                     'mailbox' => $prof));
    return $ret_arr;
  }

    public function send_sms($mobilenumbers,$message) {  
        $user="Pellithoranam"; //your username
        $password="25122016"; //your password
        $senderid="tcmweb"; //Your senderid
        $type=1; //Type Of Your Message
        $dnd_check=0; //Delivery Reports
        $url="http://login.bulksms4u.in/API/sms.php?";
        $message = urlencode($message);
        $ch = curl_init();
        if (!$ch){die("Couldn't initialize a cURL handle");}
        $ret = curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt ($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt ($ch, CURLOPT_POSTFIELDS,  "username=$user&password=$password&from=$senderid&to=$mobilenumbers&msg=$message&type=$type&dnd_check=$dnd_check");
        $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $curlresponse = curl_exec($ch); // execute
        if(curl_errno($ch))
            echo 'curl error : '. curl_error($ch);
        if (empty($ret)) {
            curl_close($ch);
        } else {
            $info = curl_getinfo($ch);
            curl_close($ch);
        }
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

    public function success_return($usr_id) {
    	$uniqueId = $this->generate_unique();
    	$usr_arr = $this->fetch_user($usr_id,$uniqueId);
    	$this->App_model->insertAppsToken($usr_id,$uniqueId);
        $ret = array('status'=>"success",
        			 'data' => array("auth_token" =>$uniqueId,
        			 'user' => $usr_arr));
        return $ret;
    }

    public function error_return($err,$msg) {
    	$ret = array('status'=>"error",
    				 'error' => $err,
    				 'message' => $msg);
    	return $ret;
    }

    public function simple_data_return($ret_arr) {
      header('Content-type: application/json');
      echo json_encode($ret_arr);
    }

    public function generate_unique() {
    	$unqe = md5(uniqid(time().mt_rand(), true));
    	return $unqe;
    }

    public function generate_otp() {
      $uniq = mt_rand(100000, 999999);
      return $uniq;
    }

    public function age() {
		  $from = new DateTime('30-11-1991');
		  $to   = new DateTime('today');
		  $age = $from->diff($to)->y."<br/>"; // ->y return age in year format eg: 24 years
		  echo $age;
    }
	/* Employee Id: TW-130 :::::::Start::::::::   */
	public function profile_update(){
		if(isset(apache_request_headers()['Authorization'])) {
		//$data = $_POST;
        $data = json_decode(file_get_contents('php://input'), true);
		$auth = apache_request_headers()['Authorization'];          
          $usr_id = $this->App_model->getUser_from_Token($auth);
		  if(isset($data['preferences']) && !empty($data['preferences'])){
			$result = $this->preferences($data,$usr_id);
			 if($result == "success") {
					  $final_message = $this->simple_return("success","","");
				  } else {
					  $final_message = $this->simple_return("error","Invalid data","Invalid data");
				  }
				  return $final_message;  
		  }else{
			$result = $this->App_model->profile_update($data,$usr_id);
        if($result == "success") {
                  $final_message = $this->simple_return("success","","");
              } else {
                  $final_message = $this->simple_return("error","Invalid data","Invalid data");
              }
              return $final_message;  
		  }
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
	}
	
	public function hobby_update(){
		if(isset(apache_request_headers()['Authorization'])) {
		//$data = $_POST;
        $data = json_decode(file_get_contents('php://input'), true);
		$auth = apache_request_headers()['Authorization'];          
          $usr_id = $this->App_model->getUser_from_Token($auth);
        $result = $this->App_model->hobby_update($data,$usr_id);
        if($result == "success") {
                  $final_message = $this->simple_return("success","","");
              } else {
                  $final_message = $this->simple_return("error","Invalid data","Invalid data");
              }
              return $final_message;
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
	}
	public function preferences($data,$usr_id){	
        $result = $this->App_model->preferences($data,$usr_id);
        return $result;
	}
	public function update_success_stories(){
		if(isset(apache_request_headers()['Authorization'])) {
		//$data = $_POST;
        $data = json_decode(file_get_contents('php://input'), true);
		$auth = apache_request_headers()['Authorization'];          
          $usr_id = $this->App_model->getUser_from_Token($auth);
        $result = $this->App_model->success_stories_list($data);
        if($result == "success") {
                  $final_message = $this->simple_return("success","","");
              } else {
                  $final_message = $this->simple_return("error","Invalid data","Invalid data");
              }
              return $final_message;
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
	}

	public function get_all_success_stories(){
		if(isset(apache_request_headers()['Authorization'])) {
		//$data = $_POST;
    $data = json_decode(file_get_contents('php://input'), true);
		$auth = apache_request_headers()['Authorization'];          
    $usr_id = $this->App_model->getUser_from_Token($auth);
    $result = $this->App_model->get_all_success_stories();

    foreach ($result as $res) {
      $res->date  = strtotime($res->date);
      $res->photo = base_url().$res->photo;
    }
        if($result) {            
            $ret = array('status'=>"success",
                         'data' => $result);
            header('Content-type: application/json');
            echo json_encode($ret);
       } else {
                  $final_message = $this->simple_return("error","Invalid data","Invalid data");
				  return $final_message;
              }
              
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
	}

	public function get_single_success_stories(){
		if(isset(apache_request_headers()['Authorization'])) {
      if(isset($_GET['id'])) {
    		$auth = apache_request_headers()['Authorization'];          
        $usr_id = $this->App_model->getUser_from_Token($auth);
        $result = $this->App_model->get_single_success_stories($_GET['id']);
        $result->date  = strtotime($result->date);
        $result->photo = base_url().$result->photo;
            if($result) {            
                $ret = array('status'=>"success",
                             'data' => $result);
                header('Content-type: application/json');
                echo json_encode($ret);
           } else {
                $final_message = $this->simple_return("error","Invalid data","Invalid data");
    				    return $final_message;
          } 
      } else { 
        $final_message = $this->simple_return("error","Invalid data","Invalid data");
        return $final_message; 
      }
    } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
	}

	public function send_mail(){
		if(isset(apache_request_headers()['Authorization'])) {
		//$data = $_POST;
    $data = json_decode(file_get_contents('php://input'), true);
		$auth = apache_request_headers()['Authorization'];          
        $data['mail_from']= $this->App_model->getUser_from_Token($auth);
        $result = $this->App_model->send_mail($data);
        if($result == "success") {
                  $final_message = $this->simple_return("success","","");
              } else {
                  $final_message = $this->simple_return("error","Invalid data","Invalid data");
              }
              return $final_message;
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
	}
	public function change_email(){
		if(isset(apache_request_headers()['Authorization'])) {
		//$data = $_POST;
        $data = json_decode(file_get_contents('php://input'), true);
		$auth = apache_request_headers()['Authorization'];          
          $usr_id= $this->App_model->getUser_from_Token($auth);
        $result = $this->App_model->edit_email($data,$usr_id);
        if($result == "success") {
                  $final_message = $this->simple_return("success","","");
              } else {
                  $final_message = $this->simple_return("error","Invalid data","Invalid data");
              }
              return $final_message;
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
	}
	public function change_password(){
		if(isset(apache_request_headers()['Authorization'])) {
		//$data = $_POST;
        $data = json_decode(file_get_contents('php://input'), true);
		$auth = apache_request_headers()['Authorization'];          
          $result= $this->App_model->change_password($data,$auth);      
        if($result == "success") {
                  $final_message = $this->simple_return("success","","");
              } else {
                  $final_message = $this->simple_return("error","Invalid data","Invalid data");
              }
              return $final_message;
      } else { $this->simple_return("error","Un Authorized Access","Un Authorized Access");  }
	}
	/*  :::::::End::::::::  Employee Id: TW-130 */
	
	
	
	
	
	
	
	
	
}
?>