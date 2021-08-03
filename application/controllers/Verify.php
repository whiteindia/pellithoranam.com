<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verify extends CI_Controller
{

  public function __construct()
  {

    parent::__construct();
    $this->load->model('Verify_model');
    date_default_timezone_set('Asia/Kolkata');

    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    $session = $this->session->userdata('logged_in');
    if (!isset($session) && empty($session)) {
      redirect(base_url());
    }
  }


  public function index($err = NULL)
  {
    $settings = get_setting();
    // echo "<pre>";
    // print_r($settings->id_prefix);
    // echo "</pre>";    
    $my_matr_id = $this->session->userdata('logged_in');
    $header['title'] = "Verify | " . $settings->id_prefix . $my_matr_id->matrimony_id;
    $this->load->view('header', $header);
    if ($err == NULL) {
      $data['error'] = "";
    } else {
      $data['error'] = "Incorrect OTP";
    }
    //$template['data'] = $this->Verify_model->view_packages();
    $this->load->view('verify', $data);
    $this->load->view('footer');
  }
  public function view_package()
  {         //  $my_matr_id = $this->session->userdata('logged_in');
    $data = $_POST;
    $result = $this->Package_model->view_package($data);
    print json_encode($result);
  }

  /*	public function send_sms($email_id,$message) {  
        $this->load->library('email');
        $settings = mail_otp();
        $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => $settings->smtp_host,
                'smtp_port' => 587,
                'smtp_user' => $settings->smtp_username, // change it to yours
                'smtp_pass' => $settings->smtp_password, // change it to yours
               );
        $this->email->initialize($config);// add this line
        $subject = 'OTP Verification';
        $name= 'Solmate';
        $mailTemplate=$message;
        $this->email->from($settings->admin_email, $name);
        $this->email->to($email_id);
        $this->email->subject($subject);
        $this->email->message($mailTemplate);  
        $this->email->send();
    }*/


  public function send_sms($email_id, $message)
  {
    // $data = '{"name":"Adarsh","email":"adarsh.abcd@gmail.com","message" :"Hi Team"}';

    //$data = json_decode($data);

    //$email_id = 'adarsh.abcd@gmail.com';
    //$message = 'Test mail';
    $settings = get_setting();
    // $this->load->library('email');

    // $config = Array(
    //               'protocol' => 'smtp',
    //               'smtp_host' => $settings->smtp_host,
    //               'smtp_port' => 587,
    //               'smtp_user' =>  $settings->smtp_username, // change it to yours
    //               'smtp_pass' => $settings->smtp_password, // change it to yours
    //               'smtp_timeout'=>20,
    //               'mailtype' => 'html',
    //               'charset' => 'iso-8859-1',
    //               'wordwrap' => TRUE
    //              );



    // $this->email->initialize($config);// add this line

    $subject = 'OTP Verification';
    $name = 'Pellithoranam';
    $mailTemplate = $message;

    //$this->email->set_newline("\r\n");
    // $this->email->from('no-reply@techlabz.in', $name);
    // $this->email->to($email_id);
    // $this->email->subject($subject);
    // $this->email->message($mailTemplate);  
    // echo $this->email->send();
    // $rs = $this->email->print_debugger();


    $this->load->library('Mailgun_lib');
    $mgClient = new Mailgun_lib();
    $from_name = "Pellithoranam";
    $from = "no-reply@pellithoranam.com";
    $bcc = "info@pellithoranam.com";
    $cc = "tejasree712@gmail.com";
    $mgClient->to($email_id);
    $mgClient->cc($cc);
    $mgClient->bcc($bcc);
    $mgClient->from($from, $from_name);
    $mgClient->subject($subject);
    $mgClient->message($mailTemplate);
    $mgClient->send();
  }


  public function send_otp()
  {
    if ($_POST['email_id']) {
      $email_id =  $_POST['email_id'];
    }
    $otp = $this->generate_otp();
    $result = $this->Verify_model->add_otpdetails($otp);
    $msg = "Hello, Your one time password for www.Pellithoranam.in is " . $otp . " . Do not share the password with anyone for security reasons.";
    $this->send_sms($email_id, $msg);
  }

  public function send_otp_after_reg()
  {
    //  ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
    $email_id = $_GET['email'];
    $phone = $_GET['phone'];
    // echo  $email_id;
    // exit;
    // if($_POST['email_id']) { $email_id =  $_POST['email_id']; }
    $otp = $this->generate_otp();
    //exit;
    $result = $this->Verify_model->add_otpdetails($otp);
    if ($result) {
      $msg = "Hello, Your one time password for www.Pellithoranam.in is " . $otp . ". Do not share the password with anyone for security reasons.";
      //$this->send_sms($phone, $msg);
      // $result=$this->Verify_model->get_mob_email($email_id);
      // $mobn=$result->phone;   
      $this->sent_mobile_msg($phone, $msg);
      //$this->resend_otp(); 
      //  redirect(base_url() . 'Verify');
      redirect('Verify', 'refresh');
    } else {
      redirect(base_url() . 'home/registration_details');
    }
  }

  public function resend_otp()
  {
    $my_matr_id = $this->session->userdata('logged_in');
    $mob = $my_matr_id->email;

    $result = $this->Verify_model->get_otpdetails();
    $otp = $result->otp;
    $msg = "Hello, Your one time password for www.Pellithoranam.com is " . $otp . ". Do not share the password with anyone for security reasons.";
    //$this->send_sms($mob, $msg);

    // $result = $this->Verify_model->get_mob_email($mob);
    // $mobn = $result->phone;
    $this->sent_mobile_msg($mobn, $msg);

    // redirect(base_url() . 'Verify');
    redirect('Verify', 'refresh');
  }
  public function reg_success()
  {
    $my_matr_id = $this->session->userdata('logged_in');
    $mob = $my_matr_id->phone;
    $mob_cc = str_replace(' ', '', $my_matr_id->phone_countrycode);
    $mobile_no = $mob_cc . $mob;
    //$mobile_no = "+919966337383";


    $msg = "You are Successfully registered with www.Pellithoranam.com";
    $this->sent_mobile_msg($mobile_no, $msg);
    // echo "<pre>";
    // print_r($my_matr_id);
    // exit;
    //$this->send_sms($mob,$msg);
    /*     redirect(base_url().'Verify/'); */
  }
  public function sent_mobile_msg($mob, $msg)
  {
    //   ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
    // Account details
    $apiKey = urlencode('0fiLk8sAj50-F810SajAQVGv9RmBPrmYcapheCx2vT');
    echo $mob;
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

    // Process your response here
    //    echo $response;

  }
  public function intrest_success()
  {
    $my_matr_id = $this->session->userdata('logged_in');
    $matri_id =  $_POST['matri_id'];
    $result = $this->Verify_model->get_mob($matri_id);
    $mobn = $result->phone;
    $mat_id = $my_matr_id->matrimony_id;
    $msg = "You Have Received An Intrest From TCM" . $mat_id . " login to www.Pellithoranam.com to see complete profile ";
    $this->send_sms($mobn, $msg);
    /*     redirect(base_url().'Verify/'); */
  }

  public function sms_send_success()
  {
    $my_matr_id = $this->session->userdata('logged_in');
    $phone = $my_matr_id->phone;
    $data = $_POST;
    //$matri_id =  $_POST['matri_id'];
    // $result=$this->Verify_model->get_mob($matri_id);
    // $result = $this->Verify_model->add_otpdetails($otp);
    $mobn = $data['mob_num'];
    $mail_from = $data['mail_from'];
    $msg = $data['mail_content'];
    $mat_id = $my_matr_id->matrimony_id;
    //$msg = "I am  ".$mail_from." TCM".$mat_id." from solmate.com ph: ".$phone." i would like to reach out to you.please share your contact details ";
    // 
    $result = $this->Verify_model->add_smsdetails($data);
    $send_sms_to = $data['to_id'];
    if ($this->send_sms($mobn, $msg))
      $this->session->set_flashdata('message', array('message' => 'SMS Sent Successfully', 'class' => 'success'));
    redirect(base_url() . 'Profile/profile_details/' . $send_sms_to . '');
  }
  public function generate_otp()
  {
    $uniq = mt_rand(100000, 999999);
    return $uniq;
  }
  public function check_otp1()
  {
    //  ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
    $data = $_POST;

    // $this->send_email_to_other_user();
    // echo "test";
    // exit;
    $result = $this->Verify_model->check_otp($data);
    if ($result == '1') {
      $this->reg_success();
      $this->reg_success_mail();
      // $this->send_email_to_other_user();
      $_SESSION['profileverified'] = 1;
      redirect(base_url() . 'search/mymatches');
      //  redirect(base_url().'Profile/upload_profile_pic');		
    } else if ($result == '2') {
      redirect(base_url() . 'search/mymatches');
    } else {
      redirect(base_url() . 'Verify/index/error');
    }
  }

  public function check_otp()
  {
    /*ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);  */
    $data = $_POST;

    //$this->send_email_to_other_user();
    // echo "test";
    // exit;
    $result = $this->Verify_model->check_otp($data);
    // echo $result;
    //  exit();
    if ($result == '1') {
      $this->reg_success();
      $this->reg_success_mail();

      $_SESSION['profileverified'] = 1;
      //  redirect(base_url().'search'); 
      echo json_encode(array('success' => 1));
      // $this->send_email_to_other_user();
      //  redirect(base_url().'Profile/upload_profile_pic');		
    } else if ($result == '2') {
      // redirect(base_url().'search');
      echo json_encode(array('success' => 1));
    } else {
      echo json_encode(array('success' => 0));
      //	redirect(base_url().'Verify/index/error'); 	
    }
  }


  function send_email_to_other_user()
  {
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);

    $this->load->model('Search_model');
    $this->load->model('Home_model');
    $my_matr_id = $this->session->userdata('logged_in');
    $my_matr_id = json_decode(json_encode($my_matr_id), true);
    $where = array();
    $where1 = array();
    $or_where = array();
    $like = array();
    $tbl = "profiles";
    $basic = $this->Search_model->get_user_basic_details2($my_matr_id);
    //  echo '<pre>';
    //  print_r($basic);
    // echo '</pre>';
    $age = $basic->age;
    $caste = $basic->caste;
    if ($basic->partner_preference == 0) {
      if ($basic->gender == "male") {
        $where[] = "profiles.gender = 'female'";
        //$this->session->set_userdata('gender',"female");
        $agef = $age - 3;
        // $where[]= "profiles.gender = 'female'";
        /**/
        $where[] = "profiles.age >= '" . $agef . "'";
        $where[] = "profiles.age <= '" . $age . "'";
        $where[] = "profiles.caste = '" . $caste . "'";
        //  $where[]= "profiles.sub_caste < '".$basic->sub_caste."'";
        $where[] = "profiles.profile_status = '1'";
      } else {
        $where[] = "profiles.gender = 'male'";
        //$this->session->set_userdata('gender',"male");
        $aget = $age + 3;
        // $where[]= "profiles.gender = 'male'";
        /*  */
        $where[] = "profiles.age >= '" . $age . "'";
        $where[] = "profiles.age <= '" . $aget . "'";
        $where[] = "profiles.caste = '" . $caste . "'";
        // $where[]= "profiles.sub_caste < '".$basic->sub_caste."'";
        $where[] = "profiles.profile_status = '1'";
      }
      if ($basic->willing_intercast != 1) {
        //  $where[] = "profiles.caste = '".$basic->caste."'";
        $where[]  = "profiles.religion = '" . $basic->religion . "'";
        $where1[] = "religion_id = '" . $basic->religion . "'";
      }
    }

    $srch_candidates = $this->Search_model->search_user_details(10000, 0, $where, $or_where, $like);

    //   $now = new DateTime();



    $msg = 'New User PT ' . $basic->matrimony_id . ' Has Registered to our site matching your preferences. You Can Check it out https://pellithoranam.com/profile/profile_details/' . $basic->matrimony_id;


    /**/
    if (is_array($srch_candidates)) {
      foreach ($srch_candidates as $candidate) {
        // echo $candidate->email;
        // echo $candidate->profile_name;
        // echo "<br>";
        $this->sendMailNow($candidate);
        $this->sent_mobile_msg($candidate->phone, rawurlencode($msg));
        echo "<script>console.log('" . $candidate->phone . "');</script>";
      }
    }
    $info = array();
    $info['email'] = 'info@pellithoranam.com';
    $info = json_decode(json_encode($info));
    //  ('email'=>'info@pellithoranam.com');
    $this->sendMailNow($info);
    echo 'mail sent';
    $age = $basic->age;
    $caste = $basic->caste;

    // if($basic->gender== "male") { 
    //   $agef=$age-3;
    //     $where[]= "profiles.gender = 'female'";
    //     $where[]= "profiles.age >= '".$agef."'"; 
    //     $where[]= "profiles.age <= '".$age."'";
    //     $where[]= "profiles.caste = '".$caste."'"; 
    //     //$this->session->set_userdata('gender',"female");
    // } else { 
    //   $aget=$age+3;
    //   $where[]= "profiles.gender = 'male'";
    //  $where[]= "profiles.age >= '".$age."'"; 
    //  $where[]= "profiles.age <= '".$aget."'";
    //   $where[]= "profiles.caste = '".$caste."'"; 
    // }
    $srch_candidates_sms = $this->Search_model->search_user_details(10000, 0, $where, $or_where, $like); /**/
    //$msg='New User PT '.$basic->matrimony_id.' Has Registered to our site maching your preferences. You Can Check it out https://pellithoranam.com/profile/profile_details/'.$basic->matrimony_id.'';
    if (is_array($srch_candidates)) {
      foreach ($srch_candidates as $candidate) {
        //  $this->sent_mobile_msg($candidate->phone,$msg);
        //  echo $candidate->phone.'--';
        //  echo $candidate->age.'<br>';

      }
    }
    echo 'msg sent';
    // echo $msg;
    // exit();
    // echo '<pre>';print_r($my_matr_id);
    // exit;

  }

  function sendMailNow($candidate)
  {
    $settings = get_setting();
    $my_matr_id = $this->session->userdata('logged_in');
    $mat_id = $my_matr_id->matrimony_id;
    //$user_id=$my_matr_id->user_id; 
    $user_name = $my_matr_id->profile_name;
    $email = $candidate->email;
    // $this->load->library('email');
    // $config = Array(
    //   'protocol' => 'smtp',
    //   'smtp_host' => $settings->smtp_host,
    //   'smtp_port' => 587,
    //   'smtp_user' =>  $settings->smtp_username, // change it to yours
    //   'smtp_pass' => $settings->smtp_password, // change it to yours
    //   'smtp_timeout'=>20,
    //   'mailtype' => 'html',
    //   'charset' => 'utf-8',
    //   'wordwrap' => TRUE
    //  );
    //$this->email->initialize($config);// add this line
    $subject = 'Fwd: New User Regstered Matching Your Preference!';
    $name = 'Pellithoranam';
    //<div class="email-temp-wrapper" style="width:800px;margin:0 auto;border:1px solid #c02c48;border-radius:5px;    padding: 10px;">
    // <div class="email-temp-logo-div">
    // <img src="http://ooimatrimonial.tk/assets/logo/pellithoranam_logo.png" style="width:120px;">
    // </div>
    $mailTemplate = ' 
            
            <div class="email-temp-content" style="border:1px solid #c02c48;border-radius:3px;border-top-left-radius:20px;border-top-right-radius:5px;
      border-bottom-left-radius:5px;border-bottom-right-radius:20px;font-family: "Roboto", sans-serif;padding: 25px;">
              <strong style="font-style:italic;">Hi ' . $candidate->profile_name . '</strong><br>
              New User <a href="' . base_url() . 'profile/profile_details/' . $mat_id . '">' . $user_name . '</a> PT' . $mat_id . ' Has Registered to our site maching your preferences. You Can Check it out

              <br>
                <div style="clear:both;"></div>
              </div>
            
         
              </div>
       ';

    //$this->email->set_newline("\r\n");
    //$this->email->from('info@ooimatrimonial.tk', $name);
    //$this->email->to($email);
    //$this->email->subject($subject);
    // $this->email->message($mailTemplate);  
    //echo $this->email->send();
    //$rs = $this->email->print_debugger();

    $this->load->library('Mailgun_lib');
    $mgClient = new Mailgun_lib();
    $from_name = "Pellithoranam";
    $from = "no-reply@pellithoranam.com";
    //  $bcc = "info@pellithoranam.com";
    $mgClient->to($email);
    //   $mgClient->bcc($bcc);
    $mgClient->from($from, $from_name);
    $mgClient->subject($subject);
    $mgClient->message($mailTemplate);
    $mgClient->send();
    //  echo '<pre>';print_r($my_matr_id);
    //  exit;
    // echo $email;
    // echo "<pre>";
    // print_r($rs);echo "</pre>";
    // exit;
    $this->session->set_flashdata('message', array('message' => 'Mail Sent Successfully', 'class' => 'success'));

    //     $settings        = get_setting();
    //     $title           = $settings->title;

    //    $my_matr_id = $this->session->userdata('logged_in');
    //    $mat_id=$my_matr_id->matrimony_id; 
    //    $user_id=$my_matr_id->user_id; 
    //    $user_name=$my_matr_id->profile_name; 
    //    //$random = substr(number_format(time() * mt_rand(),0,'',''),0,10);
    //   // $ran=md5($random);

    //    $from= 'no-reply@ooimatrimonial.tk'; 
    //    $name='Pellithoranammatrimony'; 
    //    $sub="Fwd: New User Regstered Matching Your Preference!";
    //    $email=$candidate->email; 
    //    $ma=base64_encode($email);
    //    $profile_name=$my_matr_id->profile_name;
    //    $mat_id=$my_matr_id->matrimony_id;
    //   // $template['data']=$data; 
    //       $mailTemplate=' <div class="email-temp-wrapper" style="width:800px;margin:0 auto;border:1px solid #c02c48;border-radius:5px;    padding: 10px;">
    //       <div class="email-temp-logo-div">
    //       <img src="http://ooimatrimonial.tk/assets/logo/pellithoranam_logo.png" style="width:120px;">
    //       </div>

    //       <div class="email-temp-content" style="border:1px solid #c02c48;border-radius:3px;border-top-left-radius:20px;border-top-right-radius:5px;
    // border-bottom-left-radius:5px;border-bottom-right-radius:20px;font-family: "Roboto", sans-serif;padding: 25px;">
    //         <strong style="font-style:italic;">Hi '.$candidate->profile_name.'</strong><br>
    //         New User <a href="'.base_url().'profile/profile_details/'.$user_id.'">'.$user_name.'</a> Has Registered to our site maching your preferences. You Can Check him out

    //         <br>
    //           <div style="clear:both;"></div>
    //         </div>


    //         </div>
    //  ';
    //<a href="182.74.149.58/Akhil/Wedding_web_akhil/Verify_mail/verify_account/'.$ran.'/'.$ma.'">Click  here to verify your account >></a>
    // $this->sending_mail($from,$name,$email,$sub,$mailTemplate);

    $this->session->set_flashdata('message', array('message' => 'Mail Sent Successfully', 'class' => 'success'));
    return "Data is updated successfully";
  }
  public function update_account($data)
  {

    $result = $this->Verify_model->update_account($data);
    /* var_dump($data);
  die();*/
  }
  /*public function verify_account(){


   $email_unique = $this->uri->segment(3);
   $email = $this->uri->segment(4);
   var_dump($email_unique);
   die();
}*/
  function sending_mail($from, $name, $mail, $sub, $msg)
  {
    // $ci =& get_instance(); 
    // $finresult = get_settings_details(1); 
    // $config['protocol'] = 'smtp';
    // $config['smtp_host'] = 'smtp.techlabz.in'; 
    // $config['smtp_user'] = 'no-reply@techlabz.in'; 
    // $config['smtp_pass'] = 'baAEanx7'; 
    // $config['smtp_port'] = 25; 
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
    $bcc = "info@pellithoranam.com";
    $mgClient->to($mail);
    $mgClient->bcc($bcc);
    $mgClient->from($from, $from_name);
    $mgClient->subject($sub);
    $mgClient->message($msg);
    $mgClient->send();
  }
  public function reg_success_mail()
  {

    $settings = get_setting();
    // echo "<pre>";
    // print_r($settings);
    // echo "</pre>";
    $my_matr_id = $this->session->userdata('logged_in');
    $mat_id = $my_matr_id->matrimony_id;
    $user_id = $my_matr_id->user_id;
    $user_name = $my_matr_id->profile_name;
    $email = $my_matr_id->email;
    //$this->load->library('email');

    // $config = Array(
    //     'protocol' => 'smtp',
    //     'smtp_host' => $settings->smtp_host,
    //     'smtp_port' => 587,
    //     'smtp_user' =>  $settings->smtp_username, // change it to yours
    //     'smtp_pass' => $settings->smtp_password, // change it to yours
    //     'smtp_timeout'=>20,
    //     'mailtype' => 'html',
    //     'charset' => 'utf-8',
    //     'wordwrap' => TRUE
    //    );
    //$this->email->initialize($config);// add this line
    $subject = 'Fwd: Your profile is successfully created on Pellithoranam Matrimony. Get started with your partner search!';
    $name = 'Pellithoranam';
    //<div class="email-temp-wrapper" style="width:800px;margin:0 auto;border:1px solid #c02c48;border-radius:5px;padding: 10px;"><div class="email-temp-logo-div">
    // <img src="http://ooimatrimonial.tk/assets/logo/pellithoranam_logo.png" style="width:120px;">
    // </div>
    $mailTemplate = '
          
          <div class="email-temp-content" style="border:1px solid #c02c48;border-radius:3px;border-top-left-radius:20px;border-top-right-radius:5px;
    border-bottom-left-radius:5px;border-bottom-right-radius:20px;font-family: "Roboto", sans-serif;padding: 25px;">
            <strong style="font-style:italic;">Hi ' . $my_matr_id->profile_name . '</strong><br>
            <p style="color: #4d4d4d;"> You have successfully completed registration on Pellithoranam.com, </p>
        <p style="color: #4d4d4d;">To start browsing through profiles, please log in with your Matri ID ' . $settings->id_prefix . $mat_id . '. Please note that you can also use the registered mobile number to log in to your account.</p>
        <br>
          <div style="clear:both;"></div>
        </div>
            <br>
              <div style="clear:both;"></div>
            </div>
            </div>
     ';
    //$mailTemplate="Hi tj u successfull done";

    //$this->email->set_newline("\r\n");
    // $this->email->from('info@ooimatrimonial.tk', $name);
    //$this->email->to($email);
    //$this->email->subject($subject);
    //$this->email->message($mailTemplate);  
    //$this->email->send();
    //$rs = $this->email->print_debugger();


    $this->load->library('Mailgun_lib');
    $mgClient = new Mailgun_lib();
    $from_name = "Pellithoranam";
    $from = "no-reply@pellithoranam.com";
    $bcc = "info@pellithoranam.com";
    $mgClient->to($email);
    $mgClient->bcc($bcc);
    $mgClient->from($from, $from_name);
    $mgClient->subject($subject);
    $mgClient->message($mailTemplate);
    $mgClient->send();
    $this->session->set_flashdata('message', array('message' => 'Mail Sent Successfully', 'class' => 'success'));



    //     $settings        = get_setting();
    //     $title           = $settings->title;

    //    $my_matr_id = $this->session->userdata('logged_in');
    //    $mat_id=$my_matr_id->matrimony_id; 
    //    $user_id=$my_matr_id->user_id; 
    //    $random = substr(number_format(time() * mt_rand(),0,'',''),0,10);
    //    $ran=md5($random);
    //    $data['email_unique']=$ran;
    //    $data['user_id']=$user_id;
    //    $this->update_account($data);
    //    $from= 'no-reply@ooimatrimonial.tk'; 
    //    $name='Pellithoranammatrimony'; 
    //    $sub="Fwd: Your profile is successfully created on Pellithoranam Matrimony. Get started with your partner search!";
    //    $email=$my_matr_id->email; 
    //    $ma=base64_encode($email);
    //    $profile_name=$my_matr_id->profile_name;
    //    $mat_id=$my_matr_id->matrimony_id;
    //   // $template['data']=$data; 
    //       $mailTemplate=' <div class="email-temp-wrapper" style="width:800px;margin:0 auto;border:1px solid #c02c48;border-radius:5px;    padding: 10px;">
    //       <div class="email-temp-logo-div">
    //       <img src="http://ooimatrimonial.tk/assets/logo/pellithoranam_logo.png" style="width:120px;">
    //       </div>

    //       <div class="email-temp-content" style="border:1px solid #c02c48;border-radius:3px;border-top-left-radius:20px;border-top-right-radius:5px;
    // border-bottom-left-radius:5px;border-bottom-right-radius:20px;font-family: "Roboto", sans-serif;padding: 25px;">
    //         <strong style="font-style:italic;">Hi '.$profile_name.'</strong><br>
    //         <p style="color: #4d4d4d;"> You have successfully completed registration on Pellithoranam.com, </p>
    //         <p style="color: #4d4d4d;">To start browsing through profiles, please log in with your Matri ID TCM'.$mat_id.'. Please note that you can also use the registered mobile number to log in to your account.</p>
    //         <br>
    //           <div style="clear:both;"></div>
    //         </div>


    //         </div>
    //  ';
    // //<a href="182.74.149.58/Akhil/Wedding_web_akhil/Verify_mail/verify_account/'.$ran.'/'.$ma.'">Click  here to verify your account >></a>
    //     $this->sending_mail($from,$name,$email,$sub,$mailTemplate);

    //       $this->session->set_flashdata('message',array('message' => 'Mail Sent Successfully','class' => 'success'));


    //echo "<script type='text/javascript'>alert('success!')</script>";
    // redirect(base_url().'profile/profile_details/'.$forward_id.''); 

    // header('Location: '.$url.''); 




  }
}
