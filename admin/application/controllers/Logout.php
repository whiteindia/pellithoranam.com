<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		if(!$this->session->userdata('rgv_admin')) {
			redirect(base_url());
		}
 	}
	function index() {
		//$this->session->unset_userdata('rgv_admin');
	session_destroy();
		redirect(base_url());
	}
}
