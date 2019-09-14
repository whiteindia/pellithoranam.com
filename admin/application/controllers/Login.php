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