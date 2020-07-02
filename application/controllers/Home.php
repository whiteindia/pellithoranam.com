<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
	  
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library(array('session','form_validation','encryption','email'));
        $this->load->helper(array('form', 'url'));
        date_default_timezone_set('Asia/Kolkata');
        check_installer();
      //  ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
    }

	public function index($err = NULL)	{ 
		/*if($this->session->userdata('logged_in')) {
			redirect('../search');
		} else {*/
			$data['religions'] = $this->Home_model->getReligions();
			$data['mother_tongue'] = $this->Home_model->getMotherTongues();
			$data['content'] = $this->Home_model->view_content();
			$data['footer'] = $this->Home_model->view_footer();
			$data['banner'] = $this->Home_model->view_banner();
			$data['left'] = $this->Home_model->view_leftad();
			$data['right'] = $this->Home_model->view_rightad();
			$data['success'] = $this->Home_model->view_success_story();
			$data['profile_highlight'] = $this->Home_model->get_highlighted_profiles();			
			$header['logn_err'] = $err;
			$settings        = get_setting();
        	$header['title'] = $settings->title;
			$this->load->view('header', $header); 
			$this->load->view('index',$data);
			$this->load->view('footer');     
		//}                
	}
	public function index_bulk($err = NULL)	{ 
		/*if($this->session->userdata('logged_in')) {
			redirect('../search');
		} else {*/
			$data['religions'] = $this->Home_model->getReligions();
			$data['mother_tongue'] = $this->Home_model->getMotherTongues();
			$data['content'] = $this->Home_model->view_content();
			$data['footer'] = $this->Home_model->view_footer();
			$data['banner'] = $this->Home_model->view_banner();
			$data['left'] = $this->Home_model->view_leftad();
			$data['right'] = $this->Home_model->view_rightad();
			$data['success'] = $this->Home_model->view_success_story();
			$data['profile_highlight'] = $this->Home_model->get_highlighted_profiles();			
			$header['logn_err'] = $err;
			$settings        = get_setting();
        	$header['title'] = $settings->title;
			$this->load->view('header', $header); 
			$this->load->view('index_bulk',$data);
			$this->load->view('footer');     
		//}                
	}
		function do_send_expiry_mail($key=""){
		if($key=="iNAa2CIz60F8qAsdMuKDGvWOKFqUVbfC"){
			
			$sql = "SELECT `membership_package`,DATE(`membership_expiry`),DATE_ADD(DATE(now()), INTERVAL 7 DAY),profiles.profile_name,profiles.phone_countrycode,profiles.phone,profiles.email 
FROM 
`membership_details`
LEFT JOIN
profiles on profiles.matrimony_id=membership_details.matrimony_id
WHERE 
membership_package!='1' 
&& DATE(`membership_expiry`) = DATE_ADD(DATE(now()), INTERVAL 7 DAY) ";

			$query = $this->db->query($sql);
			$results = $query->result();
			foreach ($results as $result) {
				$email = $result->email;
				$phone_countrycode = $result->phone_countrycode;
				$phone = $result->phone;
				$mobile_no = $phone_countrycode.$phone;
				$msg="Your Package of www.Pellithoranam.com is going to Expire in 7 days.";
				$this->sent_mobile_msg($mobile_no,$msg);
			}
		}else{
			echo $key;
			echo "<br>Who the hell are you";
		}
		
	}

	public function sent_mobile_msg($mob,$msg){
	  // Account details
	    $apiKey = urlencode('0fiLk8sAj50-F810SajAQVGv9RmBPrmYcapheCx2vT');
	    // Message details
	    $numbers = array($mob);
	    //$sender = urlencode('TXTLCL');
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
	    //echo $response;
	    //test
	    //exit;
	}

	public function getCaste() {
		$html = "";
		$sel_rlg = $this->input->post('rlgn_sel');
		$castes = $this->Home_model->getCastes($sel_rlg);
		$html.= "<option value='-1'>- Select Caste -</option>";
		if(!empty($castes)) {
			foreach($castes as $caste) {
				$html.= "<option value='$caste->caste_id'>".$caste->caste_name."</option>";
			}
		}
		echo $html;
	}

	public function getSubCaste() {
		$html = "";
		$cast_rlg = $this->input->post('cast_sel');
		$castes = $this->Home_model->getSubCastes($cast_rlg);
		$html.= "<option value='0'>- Select Subcaste -</option>";
		if(!empty($castes)) {
			foreach($castes as $caste) {
				$html.= "<option value='$caste->sub_caste_id'>".$caste->sub_caste_name."</option>";
			}
		}
		echo $html;
	}

	public function login() {
	if($_POST){
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		if ($this->form_validation->run() == FALSE) {
            $this->index(validation_errors());
        } else {
           $result = $this->Home_model->login($_POST);
           if($result == 1) {
			   $res = $this->Home_model->check_verification($_POST);
			   if($res)
			   {
           		redirect('../search');
			   }
			   else{
				   $this->load->view('header'); 
				   $this->load->view('verify');
				   $this->load->view('footer');
			   }
           } else {
           		if($result == 2) $msg = "Your Profile is not yet Approved";
           	    else if($result == 3) $msg = "Invalid Email/ Password";
           	    else if($result == 4) $msg = "Email not exists";
           	    else if($result == 5) $msg = "This Account does not exist anymore.";
           	    else if($result == 7) $msg = "This Account has been deactivated.";
           	   	else $msg = "No Accounts Found.";
           		$this->index($msg);
           }
        }
	}  
	}

	public function loginhighlight() {
	if($_POST){ 
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		if ($this->form_validation->run() == FALSE) {
            $this->index(validation_errors());
        } else {
           $result = $this->Home_model->login($_POST);
           if($result == 1) { 
			   $res = $this->Home_model->check_verification($_POST);
			   if($res)
			   {
				    $rs = array('status'  => 'success');
			   }
			   else{
				  $this->load->view('header'); 
				  $this->load->view('verify');
				   $this->load->view('footer');
			   }
           } else {
           	//	if($result == 2) $msg = "Your Profile is not yet Approved";
           	   // else if($result == 3) $msg = "Invalid Email/ Password";
           	   // else if($result == 4) $msg = "Email not exists";
           	   // else if($result == 5) $msg = "This Account does not exist anymore.";
           	    //else if($result == 7) $msg = "This Account has been deactivated.";
           	   	//else $msg = "No Accounts Found.";
           		//$this->index($msg);
				$rs = array('status'  => 'invalid');
           }
        }
		print json_encode($rs);		
		
	}  
	}
	public function customer_registration() {
 		if($_POST){
			$data = $_POST;
			$result = $this->Home_model->InsertRegistration($data);
			echo $result;
		}  
	}

	public function Forget_Password() {

		if (isset($_POST)) {
			$data = $_POST;
	     	$email = $this->input->post('email');
	      	$res=$this->Home_model->forgetpassword($email);
	      	// print_r($res);die;
				if($res=="EmailNotExist"){
					 $result = array('status'  => 'No','message'  => 'Sorry. Please Enter Your Correct Email.');
				}
				else{
					$this->db->select('*');
					$this->db->from('profiles');
					$this->db->where('email', $email);
					$query12 = $this->db->get();
					//$query11= $query12->row();
					$my_matr_id =  $query12->result();
					$mob=$my_matr_id[0]->phone;
				//	echo $mob;
				//	echo $_SESSION['pwd'];
					$this->sent_mobile_msg($mob,$_SESSION['pwd']);	


unset($_SESSION['pwd']);


					$result = array('status'  => 'loggedIn','message'  => 'Successfully Sent. Please Check Your Email.');
				}
			print json_encode($result);		
		}
	
	}

	function check_email(){
		$email = $_GET['email'];
		$result = $this->Home_model->check_email($email);
		//echo(json_encode(true)); // if there's nothing matching
		echo(json_encode($result));
		exit;
 
	}
	function check_phone(){
		$phone = $_GET['phone'];
		$result = $this->Home_model->check_phone($phone);
		//echo(json_encode(true)); // if there's nothing matching
		echo(json_encode($result));
		exit;
 
	}

 
	public function registration_details() {
		if($this->session->userdata('ins_id')) {
			$caste_id = $this->session->userdata('cast_id');
			$religion_id = $this->session->userdata('religion');
			$where = array();

			$where[] = "caste_id = '".$caste_id."'";

			$data['caste'] = $this->Home_model->getSingleFieldById("caste_name",$where,"castes");
			$whr1[]= "country_status = '1'";
			$data['countries'] = $this->Home_model->getTable("",$whr1,"country");
			$data['sub_castes'] = $this->Home_model->getTable("",$where,"sub_castes");
			$whr_c[]=  "religion_id = '".$religion_id."'";
			$whr_c[]=  "caste_status = '1'";
			$data['castes'] = $this->Home_model->getTable("",$whr_c,"castes");
			$data['heights'] = $this->Home_model->getTable("","","height");
			$data['weights'] = $this->Home_model->getTable("","","weight");
			$whr2[]= "education_status = '1'";
			$data['educations'] = $this->Home_model->getTable2("",$whr2,"educations","education");
			$whr3[]= "occupation_status = '1'";
			$data['occupations'] = $this->Home_model->getTable2("",$whr3,"occupations","occupation");
			$data['stars'] = $this->Home_model->getTable("","","stars");
			$data['raasi'] = $this->Home_model->getTable("","","raasi");

			$data['currencies'] = $this->Home_model->getCurrency();

			$settings        = get_setting();
        	$header['title'] = $settings->title . " | Registration";
			//$this->load->view('header', $header); 
			$this->load->view('registration',$data);
			$this->load->view('footer');
		} else { redirect('../home/index'); }
	}

	public function submit_registration_details() {
		if($this->session->userdata('ins_id')) {
			if($_POST){
				$data = $_POST;
				$files = $_FILES;
				
				//$this->_save_horoscope_image($postedData,$_FILES); This for image save 
				
				if($files['horo_img']['name']==""){
					$data['horo_img']="";
				}else{
					$upload_image=$this->_do_upload($files);
					if (array_key_exists('error', $upload_image)) {
						echo $upload_image['error'];exit;
					}else{
						//print_r($upload_image);
						 $data['horo_img']=$upload_image['upload_data']['file_name'];
					}
				}
//if($data['income_per']==2){
//	$data['income']	=
//}
//////new photo upload option in registration
//$user = $this->session->userdata('logged_in');
//if($user->user_id!='') { $user1 = $user->user_id; } else { $user1 = $this->session->userdata('ins_id'); }
//$user1 = $this->session->userdata('ins_id');
$datap['user_id'] = $_SESSION['user_id'];
$config = set_upload_optionscategory('assets/uploads/profile_pics');
$new_name = time()."_".$_FILES["image"]['name'];
$config['file_name'] = $new_name;
$this->load->library('upload');
$this->upload->initialize($config);
if (!$this->upload->do_upload('image'))	{
	//print_r($this->upload->display_errors());die();
$this->session->set_flashdata('message', array('message' => 'Error Occured While Uploading Files','class' => 'danger'));
redirect(base_url().'home/registration_details');
}
else 
{
	$upload_data = $this->upload->data();
	$datap['pic_name'] = $new_name;
	$datap['pic_location'] = $config['upload_path']."/".$upload_data['file_name'];
	$datap['pic_datetime'] = date('Y-m-d H:i:s', time());
	$result = $this->db->insert('profile_pic_verification', $datap); 
}

//////new photo upload option in registration






//[income_per] => 2
	////			 echo "<pre>";
		//		 print_r($data);
		//		 echo "</pre>";
			//	 exit();
				$result = $this->Home_model->InsertRegistrationDetails($data);
				if($result==1){
					$email = $this->session->userdata('email');
					//Verify/send_otp
					redirect(base_url().'verify/send_otp_after_reg?email='.$email);
				} else { 
					redirect(base_url().'home/index'); 
				}
				//echo $result;
				
			}
		} else { redirect(base_url().'home/index'); 
		}
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

	public function contact() {
		$settings = get_setting();
		$header['title'] = "<?php echo $settings->title;?> | Contact Us";
		$this->load->view('header', $header); 
		$this->load->view('contact');
		$this->load->view('footer');
	}

	public function get_drop_data() {
		$sel_val = $this->input->post('sel_val');
		$sel_typ = $this->input->post('sel_typ');
		$where = array(); $tbl = "";

		if($sel_typ == "country") { 
			$tbl = "states";
			$fld_name = "State";
			$where[] = "country_id = '".$sel_val."'"; 
			$where[] = "state_status = '1'";
		} else if($sel_typ == "country") {
            $tbl = "country";
            $fld_name = "country_currency";
            $where[] = "country_id = '".$sel_val."'"; 
            $where[] = "country_status = '1'";
        }
		else if($sel_typ == "state") {
			$tbl = "cities";
			$fld_name = "City";
			$where[] = "state_id = '".$sel_val."'"; 
			$where[] = "city_status = '1'";
		} else { return false; }

		$drop_vals = $this->Home_model->getTable("",$where,$tbl);

		$html = "";
		$html.= "<option value='0'> - Select  A ".$fld_name." - </option>";

		if($fld_name == "State") {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->state_id."'>".$drop_val->state_name."</option>";
			}
		} 
	    if($fld_name == "country_currency") {
            foreach($drop_vals as $drop_val) {
                $html.= "<option value='".$drop_val->country_id."'>".$drop_val->country_currency.".".$drop_val->country_name."</option>";
            }
        }  
		else {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->city_id."'>".$drop_val->city_name."</option>";
			}
		}
		echo $html;
	}

	function get_city_by_country(){
		$country = $this->input->post('country');
		$cities = $this->Home_model->getCityByCountry($country);
		$html = "";
		$html.= "<option value='-1' data-city-id='-1' data-state-id='-1'> - Select  A City - </option>";
		if($cities):
			foreach($cities as $city):
				$html.= "<option value='".$city->state_id."' data-city-id='".$city->city_id."'  data-state-id='".$city->state_id."'>".$city->city_name.' - '.$city->state_name."</option>";
			endforeach;
		endif;
		echo $html;
	}
public function get_drop_data1() {
		$sel_val = $this->input->post('sel_val');
		$sel_typ = $this->input->post('sel_typ');
		$where = array(); $tbl = "";

		if($sel_typ == "country") { 
			$tbl = "country";
            $fld_name = "country_currency";
            $where[] = "country_id = '".$sel_val."'"; 
            $where[] = "country_status = '1'";
		} else { return false; }

		$drop_vals = $this->Home_model->getTable("",$where,$tbl);				
	    if($fld_name == "country_currency") {
            foreach($drop_vals as $drop_val) {
                $html.= "<option value='".$drop_val->country_currency."'>".$drop_val->country_name."-".$drop_val->country_currency."</option>";
            }
        }  
		
		echo $html;
	}
	public function update_mobile() {
		if($this->session->userdata('logged_in')) {
		$user = $this->session->userdata('logged_in');
		if($_POST){
			$data = $_POST;
			$result = $this->Home_model->UpdateMobile($data,$user->user_id);
			echo $result;
		} else { redirect('../home/index'); }
		}
	}

	public function update_about() {
		if($this->session->userdata('logged_in')) {
			$user = $this->session->userdata('logged_in');
			if($_POST){
				$data = $_POST;
				$result = $this->Home_model->UpdateAbout($data,$user->user_id);
				echo $result;
			} else { redirect('../home/index'); }
		}
	}

	public function update_profile() {
		
		if($this->session->userdata('logged_in')) {
			$user = $this->session->userdata('logged_in');
			if($_POST){
				$data = $_POST;
				$result = $this->Home_model->UpdateProfile($data,$user->user_id);
				echo $result;
			} else { /*redirect('../home/index');*/ echo "dsf"; }
		}
	}
	public function load_parish() {
		if($_GET['term']!="") { $like = $_GET['term']; }
		$sess=$this->session->userdata('logged_in');
		/*var_dump($sess);
		die();*/
		$where1[] = "country_id= '$sess->country'";
		$where1[] = "state_id= '$sess->state'";
		$where1[] = "city_id= '$sess->city'";
		$data = $this->Home_model->getTable1("id as id,parish_name as label,parish_name as value",$where1,$like,"","parish");
		echo json_encode($data);
	}
	public function check() {
		$msg = "RDGPYRqBzOkdnKNEX5TXmpiDtsoy/AoCPhIb7J/pa3nZO5AF8NvXUPGsmnlW6aHS1sMsne20lgrkgZrdFts8g==";
		echo $msg."<br/>";
		//$msg = $this->encrypt->encode($msg);
		//echo $msg."<br/>";
		$msg = $this->encrypt->decode($msg);
		echo $msg;
		echo "<pre>"; print_r($this->session->userdata());
		//echo "0004"+"1";
	}

	public function logout() {
		$this->session->sess_destroy();
		session_destroy();
		redirect(base_url());
	}


	/*customer registration*/

   public function customer_registration1(){	
 	if($_POST){
					
		$data = $_POST;
	    $result = $this->Home_model->customer_registration($data);
        echo ($result) ;
      
	}  
	

}


/*customer registration more details*/
 public function registration_details1(){	

 	    $template['page_title'] = "Registration Details";  
		$template['page'] = "registration"; 
		$this->load->view('template', $template);  

}

/*add customer registration*/
public function add_registratrion_detail(){
		/*			
		$data = $_POST;
	    $result = $this->Home_model->registration_update($data);
        print json_encode($result);
*/
}

/*customer registration*/
public function customer_login1(){


	if($_POST){
					
		$data = $_POST;
	    $result = $this->Home_model->customer_login($data);
        print json_encode($result) ;

       
	}  
}

public function recaptcha($str='')
  {
    $google_url="https://www.google.com/recaptcha/api/siteverify";
    $secret='6LcvrhUUAAAAAE-O15Nbdq4q_Ycjvxm55N_I4s-t';
    $ip=$_SERVER['REMOTE_ADDR'];
    $url=$google_url."?secret=".$secret."&response=".$str."&remoteip=".$ip;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
    $res = curl_exec($curl);
    curl_close($curl);
    $res= json_decode($res, true);
    //reCaptcha success check
    if($res['success'])
    {
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('recaptcha', 'The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?');
      return FALSE;
    }
  }


public function logs() {
	$this->session->sess_destroy();
}

public function send_enqmail(){
	if($_POST){
	$settings   	= get_setting();
    $title 			= $settings->title;
    $name   		= $this->input->post('name');
    $mobile 		= $this->input->post('mobile_no'); 
    $from 			= $this->input->post('email_id'); 
    $enquiry 		= $this->input->post('enquiry');
   
    $to   			= "mail.abcd@gmail.com";
    $sub 			= $title." Enquiry:".$name;
	$mailTemplate	= '<div style="width:100%; font-size:16px;" font-weight: bold;>You have received a new enquiry message</div>
						<div style="style="width:100%; font-size:16px;">The enquiry details are:<br><br>
						Name: '.$name.'<br><br>Email: '.$from.'<br><br>Mobile: '.$mobile.'<br><br>Enquiry: '.$enquiry.'</div>';	        

	//$email          = 'reshma.abcd@gmail.com';
	//$from           = 'no-reply@techlabz.in'; 
	$data = $this->sending_mail($from,$name,$to,$sub,$mailTemplate);
	if($data){
		echo json_encode($data);
		}
	
	}
}

function sending_mail($from,$name,$mail,$sub, $msg) {  
	// $settings        = get_settings();
	// $config['protocol'] = "smtp";
	// $config['smtp_host'] = $settings->smtp_host;
	// $config['smtp_port'] = "587";
	// $config['smtp_user'] = $settings->smtp_username; 
	// $config['smtp_pass'] =  $settings->smtp_password; ;
	// $config['charset'] = "utf-8";
	// $config['mailtype'] = "html";
	// $config['newline'] = "\r\n";
	// $this->email->initialize($config); 
	// $this->email->from($from, $name); 
	// $this->email->to($mail); 
	// $this->email->subject($sub);
	// $this->email->message($msg); 
	// $this->email->send();

	$this->load->library('Mailgun_lib');
	$mgClient = new Mailgun_lib();
	$mgClient->to($mail);
	$mgClient->from($from, $name);
	$mgClient->subject($sub);
	$mgClient->message($msg);
	$mgClient->send(); 
	return "success";
} 



}
?>