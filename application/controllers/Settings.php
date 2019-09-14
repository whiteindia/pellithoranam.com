<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Settings_model');
        $this->load->library('encrypt');
        date_default_timezone_set('Asia/Kolkata');
       // $this->load->library("pagination");           
    }
	
	public function index(){
        $header['title'] = "Profile Settings";
        $this->load->view('header', $header);
        $my_matr_id = $this->session->userdata('logged_in');
        $mat_id=$my_matr_id->matrimony_id;
        $data['get_profiles']= $this->Settings_model->get_profiles($mat_id);
        $data['mail_alerts']= $this->Settings_model->get_mail_alerts($mat_id);
        $data['settings_preferences']= $this->Settings_model->get_settings_preferences($mat_id);
        $this->load->view('settings',$data);
        $this->load->view('footer');                 
	}
    public function success_story1(){
        $header['title'] = "Profile Settings";
        $this->load->view('header', $header);
        $this->load->view('settings');
        $this->load->view('footer');   
       }     
     public function success_story(){
        if($_POST) 
                          {
                              
                              $data = $_POST;                   
                              $config = set_upload_options('assets/uploads/success_story');
                              $this->load->library('upload');                        
                              $new_name = time()."_".$_FILES["photo"]['name'];
                             /* $config['min_width'] = '160'; 
                              $config['min_height'] = '600';
                              $config['max_width'] = '160'; 
                              $config['max_height'] = '600';*/
                              $config['file_name'] = $new_name;                         
                              $this->upload->initialize($config);
                                if ( ! $this->upload->do_upload('photo')) 
                                  { 
                                    
                                    $this->session->set_flashdata('message', array('message' => "Display Picture : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
                                    
                                  }
                  else 
                  { 
                    
                   $upload_data = $this->upload->data();
                   $data['photo'] = $config['upload_path']."/".$upload_data['file_name'];       
                   $result = $this->Settings_model->add_success_story($data);
                   echo "<meta http-equiv='refresh' content='3;url=".base_url()."home/logout' />";
                          if($result) 
                          {
                        /* Set success message */
                                        
                          $this->delete_profile('marriage fixed');
                          //echo "Your Profile Has been Deleted...., Yore logging out now...";
                          $this->session->set_flashdata('message',array('message' => 'Success','class' => 'success'));
                          }
                          else 
                          {
                        /* Set error message */
                           echo "Sorry, Something went wrong";
                          }
                  }         
             }             
    }
      public function other_source(){
        if($_POST) 
                          {
                              
                              $data = $_POST;                   
                            
                                        
                   $result = $this->Settings_model->add_success_story($data);
                   echo "<meta http-equiv='refresh' content='3;url=".base_url()."home/logout' />";
                          if($result) 
                          {
                        /* Set success message */
                                        
                          $this->delete_profile('marriage fixed');
                          //echo "Your Profile Has been Deleted...., Yore logging out now...";
                          $this->session->set_flashdata('message',array('message' => 'Success','class' => 'success'));
                          }
                          else 
                          {
                        /* Set error message */
                           echo "Sorry, Something went wrong";
                          }
                  }         
                        
    }   
    public function change_email() {
        if($_POST && $this->session->userdata('logged_in')) {
            //$data=$_POST;
           /* var_dump($_POST);
            die();*/
            $res = $this->Settings_model->update_email($_POST);
            echo json_encode($res);
        }
    }

    public function change_user_password() {
       if($_POST && $this->session->userdata('logged_in')) {
            $res = $this->Settings_model->update_password($_POST);
            echo json_encode($res);
        } 
    }

    public function delete_profile($reason=null) {

        if($_POST && $this->session->userdata('logged_in') && $reason==null) {
            $res = $this->Settings_model->delete_profile($_POST);
            echo json_encode($res);
            echo "<meta http-equiv='refresh' content='3;url=".base_url()."home/logout' />";
            if($res){
              //echo "Your Profile Has been Deleted, Yore logging out now...";
            } else {
             echo "Sorry, Something went wrong";
            }
            } else {
            if($reason) {
                 $delete_prof['delete_reason'] = $reason;
                $res = $this->Settings_model->delete_profile($delete_prof);
                echo json_encode($res);
        
            }
        }
    }
  public function activate_dnd() {
        $res = $this->Settings_model->activate_dnd();
        if($res){
			$rs = array('status'=>'success');
        }
	   print json_encode($rs);		

   }  
public function contact_filters() {
if($_POST){
        $data=$_POST;
        $res = $this->Settings_model->contact_filters($data);
        redirect(base_url().'Settings#contact');   
        
}
}  
public function contact_filters1() {
if($_POST){
        $data=$_POST;
        $data['shortlist_preference']=$this->input->post("shortlist_preference");
        $res = $this->Settings_model->contact_filters($data);
        redirect(base_url().'Settings#settings');   
        
}
}  
public function mail_alerts() {

        $data=$_POST;
      /*  var_dump($data);
        die();*/
        $res = $this->Settings_model->mail_alerts($data);
  
        
redirect(base_url().'Settings#alert');  
}   
   public function deactivate_profile() {

    if($_POST){
        $data=$_POST;
        $res = $this->Settings_model->deactivate_profile($data);
         echo "<meta http-equiv='refresh' content='3;url=".base_url()."home/logout' />";
            if($res){
              echo "Your Profile Has been Deactivated Yore logging out now...";
			 // $this->load->view('deactivate');     
            } else {
             echo "Sorry, Something went wrong";
            }
    }
   }
  public function deactivate_profile1() {

    if($_POST){
        $data=$_POST;
        $res = $this->Settings_model->deactivate_profile($data);
         //echo "<meta http-equiv='refresh' content='3;url=".base_url()."home/logout' />";
			  //redirect(base_url().'Settings#deactivate');  
    }
   }

   
    public function send_sms($mobilenumbers,$message) {  
        $user="solmate"; //your username
        $password="25122016"; //your password
        //$mobilenumbers= '9567783111' ; //enter Mobile numbers comma seperated
        //$message = 'bobys'; //enter Your Message
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
        //If you are behind proxy then please uncomment below line and provide your proxy ip with port.
        // $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");
        $curlresponse = curl_exec($ch); // execute
        if(curl_errno($ch))
            echo 'curl error : '. curl_error($ch);
        if (empty($ret)) {
            // some kind of an error happened
            //die(curl_error($ch));
            curl_close($ch); // close cURL handler
        } else {
            $info = curl_getinfo($ch);
            curl_close($ch); // close cURL handler
        
            //echo $curlresponse; //echo "Message Sent Succesfully" ;
        }
    }

function sending_mail($from,$name,$mail,$sub, $msg) {  
 /*$config['protocol'] = 'smtp';
 $config['smtp_host'] = 'smtp.techlabz.in'; 
 $config['smtp_user'] = 'no-reply@techlabz.in'; 
 $config['smtp_pass'] = 'baAEanx7'; 
 $config['smtp_port'] = 25; */
 
 // 	$settings        = get_settings();
	// $config['protocol'] = "smtp";
	// $config['smtp_host'] = $settings->smtp_host;
	// $config['smtp_port'] = "587";
	// $config['smtp_user'] = $settings->smtp_username; 
	// $config['smtp_pass'] =  $settings->smtp_password; 
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
  public function reg_success_mail($email,$user_id,$name) {

   $random = substr(number_format(time() * mt_rand(),0,'',''),0,10);
   $ran=md5($random);
   $data['unique_id']=$ran;
   $data['user_id']=$user_id;
   $this->Settings_model->deactivate_checking($data);
   $from= 'no-reply@techlabz.in'; 
   $name1='telugumatrimony'; 
   $sub="Fwd: Pellithoranam";
   $ma=base64_encode($email);

      
     $mailTemplate=' <div class="email-temp-wrapper" style="width:800px;margin:0 auto;border:1px solid #c02c48;border-radius:5px;    padding: 10px;">
      <div class="email-temp-logo-div">
       	<img src="http://ooimatrimonial.tk/assets/logo/pellithoranam_logo.png" style="width:120px;">
      </div>
      
      <div class="email-temp-content" style="border:1px solid #c02c48;border-radius:3px;border-top-left-radius:20px;border-top-right-radius:5px;
border-bottom-left-radius:5px;border-bottom-right-radius:20px;font-family: "Roboto", sans-serif;padding: 25px;">
        <strong style="font-style:italic;">Hi '.$name.'</strong><br>
        <p style="color: #4d4d4d;"> </p>
        <p style="color: #4d4d4d;"></p>
        <br>
<div>your deactivation period ends today. please click here to re-activate. www.solmate.com</br><a href="182.74.149.58/Akhil/Wedding_web_akhil/Settings/activate_account/'.$ran.'/'.$ma.'">Click  here to re-activate your account >></a>
          <div style="clear:both;"></div></div>
          <div style="clear:both;"></div>
        </div>
      
   
        </div>
 ';
    $this->sending_mail($from,$name1,$email,$sub,$mailTemplate);

      $this->session->set_flashdata('message',array('message' => 'Mail Sent Successfully','class' => 'success'));
               
} 
  public function package_expiry_mail($email,$name) {

   $from= 'no-reply@techlabz.in'; 
   $name1='Pellithoranam Matrimony'; 
   $sub="Fwd: Pellithoranam";

     $mailTemplate=' <div class="email-temp-wrapper" style="width:800px;margin:0 auto;border:1px solid #c02c48;border-radius:5px;    padding: 10px;">
      <div class="email-temp-logo-div">
      	<img src="http://ooimatrimonial.tk/assets/logo/pellithoranam_logo.png" style="width:120px;">
      </div>
      
      <div class="email-temp-content" style="border:1px solid #c02c48;border-radius:3px;border-top-left-radius:20px;border-top-right-radius:5px;
border-bottom-left-radius:5px;border-bottom-right-radius:20px;font-family: "Roboto", sans-serif;padding: 25px;">
        <strong style="font-style:italic;">Hi '.$name.'</strong><br>
        <p style="color: #4d4d4d;"> </p>
        <p style="color: #4d4d4d;"></p>
        <br>
<div>Your Package will be expired within 10 days..visit www.telugumatrimony.com to upgrade package</div>
          <div style="clear:both;"></div>
        </div>
      
   
        </div>
 ';

    $this->sending_mail($from,$name1,$email,$sub,$mailTemplate);

    $this->session->set_flashdata('message',array('message' => 'Mail Sent Successfully','class' => 'success'));


} 
  public function photo_reminder_mail($email,$name) {

   $from= 'no-reply@techlabz.in'; 
   $name1='telugumatrimony'; 
   $sub="Fwd: Pellithoranam";

     $mailTemplate=' <div class="email-temp-wrapper" style="width:800px;margin:0 auto;border:1px solid #c02c48;border-radius:5px;    padding: 10px;">
      <div class="email-temp-logo-div">
       	<img src="http://ooimatrimonial.tk/assets/logo/pellithoranam_logo.png" style="width:120px;">
      </div>
      
      <div class="email-temp-content" style="border:1px solid #c02c48;border-radius:3px;border-top-left-radius:20px;border-top-right-radius:5px;
border-bottom-left-radius:5px;border-bottom-right-radius:20px;font-family: "Roboto", sans-serif;padding: 25px;">
        <strong style="font-style:italic;">Hi '.$name.'</strong><br>
        <p style="color: #4d4d4d;"> </p>
        <p style="color: #4d4d4d;"></p>
        <br>
<div>It seems You have not uploaded your profile photo,please upload your profile photo to get more mathches.www.telugumatrimony.com</div>
          <div style="clear:both;"></div>
        </div>
      
   
        </div>
 ';

    $this->sending_mail($from,$name1,$email,$sub,$mailTemplate);

    $this->session->set_flashdata('message',array('message' => 'Mail Sent Successfully','class' => 'success'));


} 
 public function activate_account() {
  $unique=$this->uri->segment(3);
 $result1 = $this->Settings_model->activate_account($unique); 
 if($result1){
   redirect(base_url()); 
 }
  }
   public function check_deactivation() {

    $result = $this->Settings_model->check_deactivation();
    foreach ($result as $results) { 
    $user_id=$results->user_id;

     $result1 = $this->Settings_model->get_deactivation_details($user_id); 
     $mob=$result1->phone;
     $name=$result1->profile_name;
     $email=$result1->email;
     $user_id=$result1->user_id;
     $msg = "Hello ".$name.", your deactivation period ends today. please check your email to re-activate. www.Pellithoranam.com"; 
     $this->send_sms($mob,$msg);
     $this->reg_success_mail($email,$user_id,$name);
     
    }
   
   } 


   public function check_package_expiry() {

    $result = $this->Settings_model->check_package_expiry();
    foreach ($result as $results) { 
    $matrimony_id=$results->matrimony_id;

     $result2 = $this->Settings_model->get_package_expiry_details($matrimony_id);     
     $mob=$result2->phone;
     $name=$result2->profile_name;
     $email=$result2->email;
     $user_id=$result2->user_id;
     $this->package_expiry_mail($email,$name);
     
    }
   
   } 
   public function photo_reminder() {

    $result = $this->Settings_model->photo_reminder();
/*    var_dump($result);
    die();*/
    foreach ($result as $results) { 
    $matrimony_id=$results->matrimony_id;

     $result2 = $this->Settings_model->get_package_expiry_details($matrimony_id);     
     $mob=$result2->phone;
     $name=$result2->profile_name;
     $email=$result2->email;
     $user_id=$result2->user_id;
     $this->photo_reminder_mail($email,$name);
     
    }
   
   } 
   public function individual_mail_alerts() {
    $content = "";
    $result = $this->Settings_model->individual_mail_alerts();
    foreach ($result as $results) { 
     $matrimony_id=$results->matrimony_id;
     $result2 = $this->Settings_model->get_package_expiry_details($matrimony_id);
     $result3 = $this->Settings_model->get_individual_details($matrimony_id);       
     $name=$result2->profile_name;
     $email=$result2->email;
     foreach($result3 as $profile) {
        $content.= '<div class="email-temp-wrapper" style="width:800px;margin:0 auto;border:1px solid #c02c48;border-radius:5px;    padding: 10px;">
                      <div class="email-temp-logo-div">
                       	<img src="http://ooimatrimonial.tk/assets/logo/pellithoranam_logo.png" style="width:120px;">
                      </div>
                    <div class="email-temp-content" style="border:1px solid #c02c48;border-radius:3px;border-top-left-radius:20px;border-top-right-radius:5px;
border-bottom-left-radius:5px;border-bottom-right-radius:20px;font-family: "Roboto", sans-serif;padding: 25px;">
                      <strong style="font-style:italic;">Hi '.$name.'</strong><br>
                      <p style="color: #4d4d4d;"> </p>
                      <p style="color: #4d4d4d;"></p>
                    <br>
                    <div class="email-profile" style="margin-top:10px;">
          <div class="email-profile-pic" style="width:120px;height:120px;float:left;">
          <img src="http://techlabz.in/solmatenew/solmate/'.$profile->profile_photo.'" style="width:100%;height:100%;object-fit:cover;">
          
          </div>
          <div class="email-profile-details" style="float: left;width: 80%;padding: 10px;">
          <p style="font-family: "Roboto", sans-serif;font-weight:500;color:#c02c48;margin:0px;font-size: 18px;
"><b>'.$profile->profile_name.'</b></p><p style="margin:0px">'.$profile->age.'Yrs </p><br/>
          <a href="http://techlabz.in/solmatenew/solmate/Profile/profile_instant_view/'.$profile->matrimony_id.'">Full Profile>></a>
          </div>
          <div style="clear:both;"></div>
        </div>
                    </div>
              </div>';
     }
     $this->match_alert($email,$name,$content);
     
    }
   
   }

   public function match_alert($email,$name,$content) {
     $from= 'no-reply@techlabz.in'; 
     $name1='Pellithoranammatrimony'; 
     $sub="Fwd: Pellithoranam-Your matching profiles,";
     $mailTemplate= $content;
     $this->sending_mail($from,$name,$email,$sub,$mailTemplate);
     $this->session->set_flashdata('message',array('message' => 'Mail Sent Successfully','class' => 'success'));
   } 

} ?>
