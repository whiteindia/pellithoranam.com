 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller {
	public function __construct() {
	parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		//$this->load->model('Settings_model');
    }
    public function admin_profile() {	
    }
	public function change_admin_password() {
	}
}	 
?>