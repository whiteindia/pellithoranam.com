<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library(array('session','form_validation'));
		if($this->session->userdata('logged_in_admin')) { 
			redirect(base_url().'Dashboard_ctrl/dashboard');
		}
		$this->load->helper(array('form'));
		$this->load->model('login_model', 'login');
		$this->load->model('login_model');
		
	}
	public function index(){
	
		$settings        = get_settings();
        $header['title'] = $settings->title . " | Admin Login";
		if(isset($_POST)) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

			if($this->form_validation->run() == TRUE) {
				redirect(base_url().'Dashboard_ctrl/dashboard');
			}
		}
		$this->load->view('login-form', $header);
	}
	function check_database($password) {
		
		$username = $this->input->post('username');
		//echo $password;
		$result = $this->login->login($username, $password);
		// echo "<pre>";
		// print_r($result);die;

		if($result) {
			$result->profile_picture = base_url()."/assets/images/user_avatar.jpg";
			$sess_array = array(
				'id' => $result->user_id,
				'username' => $result->email,
				'user_type' => $result->user_type,
				'user_id' => $result->user_id
				);
		
			$this->session->set_userdata('logged_in_admin',$sess_array);
			$this->session->set_userdata('profile_pic',$result->profile_picture);
			// echo "<pre>";
			// print_r($sess_array);print_r($_SESSION);die;
			return TRUE;
		}
		else {
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}		
	}
	// public function check() {
	// 	$msg = "RDGPYRqBzOkdnKNEX5TXmpiDtsoy/AoCPhIb7J/pa3nZO5AF8NvXUPGsmnlW6aHS1sMsne20lgrkgZrdFts8g==";
	// 	echo $msg."<br/>";
	// 	//$msg = $this->encrypt->encode($msg);
	// 	//echo $msg."<br/>";
	// 	$msg = $this->encrypt->decode($msg);
	// 	echo $msg;
	// 	echo "<pre>"; print_r($this->session->userdata());
	// 	//echo "0004"+"1";
	// }
	public function logout() {
		//$this->session->sess_destroy();
	//	session_destroy();
		$this->session->unset_userdata('logged_in_admin');
		redirect(base_url());
	}

	public function Forget_Password() {
		error_reporting(E_ALL);
		error_reporting(-1);
		ini_set('error_reporting', E_ALL);
		if (isset($_POST)) {
			$data = $_POST;
	     	$email = $this->input->post('email');
	      	$res=$this->Login_model->forgetpassword($email);
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
  

	// function testmail(){
	// 	$this->load->library('Mailgun_lib');
	// 	$mgClient = new Mailgun_lib();
	// 	$to = "tjthouhid@gmail.com";
	// 	$from_name = "Pellithoranam";
	// 	$from = "admin@pellithoranam.com";
	// 	$subject = "This Is For Development purpose testing.";
	// 	$message = "<p>Hi Bro,<p><p>Testing Done.</p>";
	// 	$mgClient->to($to);
	// 	$mgClient->from($from,$from_name);
	// 	$mgClient->subject($subject);
	// 	$mgClient->message($message);
	// 	$mgClient->send();
	// }
} 
?>