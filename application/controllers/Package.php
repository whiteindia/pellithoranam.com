<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('paypal_lib');
        $this->load->model('Package_model');
		
        date_default_timezone_set('Asia/Kolkata');
        $session=$this->session->userdata('logged_in');  
	       if (!isset($session)&& empty($session) )  { 
				redirect(base_url());
			}
    }

	
	public function index()
	{          $my_matr_id = $this->session->userdata('logged_in');
	    		$header['title'] = "Packages | TCM";
	            $this->load->view('header', $header);
	            $template['data'] = $this->Package_model->view_packages();
				$this->load->view('packages',$template);
				$this->load->view('footer');                  
	}
	public function pkg1()
	{          $my_matr_id = $this->session->userdata('logged_in');
	    		$header['title'] = "Packages | TCM";
	            $this->load->view('header', $header);
	            $template['data'] = $this->Package_model->view_packages();
				$this->load->view('packages1',$template);
				$this->load->view('footer');                  
	}
	public function view_package()
	{          $my_matr_id = $this->session->userdata('logged_in');
	    	   $data = $_POST;
	    	   $result = $this->Package_model->view_package($data);
	    	   print json_encode($result);                
	}
	
	public function razorpay(){
		$data = http_build_query($_GET);
		$session=$this->session->userdata('logged_in');  
		$id=$this->input->get('amount');
		$amt = $this->Package_model->get_amount($id);
		$amount = $amt->price>0?$amt->price:0;
		$amount1 =$amount *100;
		$amount2 =100;
		$_SESSION['packageid']=$id;
		$_SESSION['purchase_amount1']=$amount;
		$_SESSION['purchase_amount']=$amount2/100;
		$booking_id = 'SM'.strtotime(date('m/d/Y H:i:s'));
		// if ($_POST) {
		// 	$razorpay_payment_id = $_POST['razorpay_payment_id'];
			
		// 	echo "Razorpay success ID: ". $razorpay_payment_id;
		// }
		$this->load->view('header');
echo '
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<br><br><br><br><br><br>

<div class="card text-center">
  <div class="card-header">
    Pellithoranam.com
  </div>
  <div class="card-body">
 <img src=" https://www.pellithoranam.com/assets/logo/pellithoranam_logo.png" alt="logo" width="150px"  height="100px">
    <h5 class="card-title">please,proceed to pay</h5>
    <p class="card-text"></p>
	
	<form action="/../package/rsuccess" method="POST">
	<script
		src="https://checkout.razorpay.com/v1/checkout.js"
		data-key="rzp_live_IvB41B9WM4ptCj" // Enter the Key ID generated from the Dashboard
		data-amount="'.$amount1.'" // Amount is in currency subunits. Default currency is INR. Hence, 29935 refers to 29935 paise or INR 299.35.
		data-currency="INR"
		data-buttontext="Pay with Razorpay"
		data-name="Pellithoranam"
		data-description="package'.$amount.'"
		data-image="https://www.pellithoranam.com/assets/logo/pellithoranam_logo.png"
		data-prefill.name="Gaurav Kumar"
		data-prefill.email=""
		data-theme.color="#F37254"
	></script>
	<input type="hidden"  class="btn btn-primary" custom="Hidden Element" name="hidden">
	</form>
  </div>
  <div class="card-footer text-muted">
    
  </div>
</div>

';

$this->load->view('footer');



	}
	public function rsuccess(){

	if ($_POST) {
			$razorpay_payment_id = $_POST['razorpay_payment_id'];
			
			echo "Razorpay success ID: ". $razorpay_payment_id;

			$user = $this->Package_model->get_account();
		
			$booking_id = 'SM'.strtotime(date('m/d/Y H:i:s'));
				$booking_array = array('user_id'=>$user->matrimony_id,
									   'booking_id'=>$booking_id,
									   'package_id'=>$_SESSION['packageid'],
									   'status'=>'Completed',
									   'purchase_amount'=>$_SESSION['purchase_amount1'],
									   'payment_method'=>'Razorpay',
									   'txnid'=>$razorpay_payment_id,
									   'purchase_date'=>date('Y-m-d H:i:s')
									   );
				$this->db->insert('payments',$booking_array);
				$this->Package_model->upgrade_members($_SESSION['packageid']);
				$amt = $this->Package_model->get_amount($_SESSION['packageid']);
				$payment['package'] = $package = $amt;
				$payment['user'] = $user;
				$payment['booked'] = $booking_array;
	
				//Senging Sms
				$mob=$user->phone;
				  $mob_cc = str_replace(' ', '', $user->phone_countrycode);
				  $mobile_no = $mob_cc.$mob;
				  $time = strtotime($booking_array["purchase_date"]);
				  $newformat = date('Y-m-d',$time);
				$msg = "You Successfully Purchased Package For www.Pellithoranam.com.Package Name : ".$package->package_name.".Price : ".$paypalInfo["payment_gross"].".Purchase Date : ".$newformat.".";
				$this->sent_mobile_msg($mobile_no,$msg);
				$this->load->view('header');
				$this->load->view('paypal_payment1',$payment);
				$this->load->view('footer');

		}
		else{
echo "<script>alert('failed, please try again')</script>";
			cancel();


		}

	}
	
	public function rsuccess1(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$payment=array();
		$user = $this->Package_model->get_account();
	$this->load->view('header');
	$this->load->view('new_paypal_payment',$payment);
	$this->load->view('footer'); }

	public function paypal(){
		$data = http_build_query($_GET);
		$session=$this->session->userdata('logged_in');  
		$id=$this->input->get('amount');
		$amt = $this->Package_model->get_amount($id);
		$amount = $amt->price>0?$amt->price:250;
		$booking_id = 'SM'.strtotime(date('m/d/Y H:i:s'));
		$returnURL = base_url().'Package/success/?'.$id;
		//$cancelURL = base_url().'Package/success/?'.$id;
        $cancelURL = base_url().'Package/cancel';
        $notifyURL = base_url().'Package/success';
        $paypalID = $this->config->item('business');
        $this->paypal_lib->add_field('business', $paypalID);
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', "Pellithoranam");
        $this->paypal_lib->add_field('custom', "BookedId");
        $this->paypal_lib->add_field('item_number',$id);
        $this->paypal_lib->add_field('amount',$amount);
        //$this->paypal_lib->add_field('currency_code','USD');
		$this->paypal_lib->add_field('booking_id',$booking_id);
        $this->paypal_lib->paypal_auto_form();
	}
	function success(){
		
		$paypalInfo	= $this->input->post();
		$paypalURL = $this->paypal_lib->paypal_url;		
		$result	= $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
		$user = $this->Package_model->get_account();
		
		$booking_id = 'SM'.strtotime(date('m/d/Y H:i:s'));
			$booking_array = array('user_id'=>$user->matrimony_id,
								   'booking_id'=>$booking_id,
								   'package_id'=>$paypalInfo["item_number"],
								   'status'=>'Completed',
								   'purchase_amount'=>$paypalInfo["payment_gross"],
								   'payment_method'=>'Paypal',
								   'txnid'=>$paypalInfo["txn_id"],
								   'purchase_date'=>date('Y-m-d H:i:s')
								   );
			$this->db->insert('payments',$booking_array);
			$this->Package_model->upgrade_members($paypalInfo["item_number"]);
			$amt = $this->Package_model->get_amount($paypalInfo["item_number"]);
			$payment['package'] = $package = $amt;
			$payment['user'] = $user;
			$payment['booked'] = $booking_array;

			//Senging Sms
			$mob=$user->phone;
	      	$mob_cc = str_replace(' ', '', $user->phone_countrycode);
	      	$mobile_no = $mob_cc.$mob;
	      	$time = strtotime($booking_array["purchase_date"]);
	      	$newformat = date('Y-m-d',$time);
			$msg = "You Successfully Purchased Package For www.Pellithoranam.com.Package Name : ".$package->package_name.".Price : ".$paypalInfo["payment_gross"].".Purchase Date : ".$newformat.".";
			$this->sent_mobile_msg($mobile_no,$msg);
			$this->load->view('header');
			$this->load->view('paypal_payment',$payment);
			$this->load->view('footer');
    }

    public function sent_mobile_msg($mob,$msg){
      // Account details
        $apiKey = urlencode('0fiLk8sAj50-F810SajAQVGv9RmBPrmYcapheCx2vT');
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
        //echo $response;

    }
	
	 function cancel(){
    	redirect(base_url());
    }
	
	   public function payment_success($id=null){
		
		if($this->session->userdata('user_values')){ 	
	 	
		 	$uname=$this->session->userdata('user_values');
	    	$template['page_title'] = "Payment Success";
			$template['page_name'] = "success";
			$template['book_info'] = $this->db->where('id',$id)->get('payments')->row();
			$query1 = $this->db->query("select * from profiles where email ='$uname'");
				if ($query1->num_rows() =='1'){
					$row3 = $query1->row('profiles');
					$name=$row3->username;
					$from=$row3->username;
					$email=$row3->email;
					$sub='Booking Confirmation';
					$sms='Booking has been successful';
					$this->send_mail();
				}
		$this->load->view('template', $template);
		}else{
			redirect('/', 'refresh');
		}
    }
	function send_mail(){
        $ci = get_instance();
        $this->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.googlemail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "mail.abcd@gmail.com"; 
        $config['smtp_pass'] = "Golden_123";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $this->email->initialize($config);

        $this->email->from('mail.abcd@gmail.com', 'abcd');
        $list = array('adarsh.abcd@gmail.com');
        $this->email->to($list);
        $this->email->reply_to('mail.abcd@gmail.com', 'abcd');
        $this->email->subject('This is an email test');
        $this->email->message('It is working. Great!');
        $this->email->send();
    }
	
	function cash()
	{
		$result = $this->Package_model->upgrade_prem();
		if($result){
			$result1 = array('status'  => 'success','message'  => 'success');
		}
		//redirect(base_url('Package')); 
		print json_encode($result1);
	}
	
	
	
	
	
	
	
	
}
