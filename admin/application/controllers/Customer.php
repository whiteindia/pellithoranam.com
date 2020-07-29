<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller {
	public function __construct() {
	parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Customer_model');
		$this->load->model('Settings_model');
		$this->load->model('Reports_model');
    }
	// view customer details	  
	public function view_members(){

		ini_set('display_errors', 1);
		if($this->session->userdata('logged_in_admin')) {
			$postedData =$this->input->post(NULL);
			// for datatable
			if(array_key_exists("start", $postedData)){
			    $this->_get_customers_tbl();
			    return false;
			}
			else{
				$settings        = get_settings();
	        	$header['title'] = $settings->title . " | View Members";
				$data['members'] = $this->Customer_model->get_profile_details("");
				//$data['logintime']=$this->Customer_model->get_logintime($matr_id);
				$this->load->view('Templates/header',$header);
				$this->load->view('customer/view-members',$data);
				$this->load->view('Templates/footer');
				$this->load->view('customer/view_customer_js');
			}
		} else { redirect(base_url()); }
	  }

	  /**
	  * This Function is for Getting Data Table For User Rule 
	  *
	  * @param  
	  * @param 
	  * @return Success Result True/False
	  * @author Tj Thouhid
	  * @version 2019-06-14
	  */

	  private function _get_customers_tbl()
	  {
	      $postedData =$this->input->post(NULL, true);

	       
	      $params =array(
	          'offset' =>$postedData['start'],
	          'length' =>$postedData['length'],
	          'search' =>$postedData['search']['value'],
	          'sortings' =>isset($postedData['order'])? $postedData['order'] : array(),
	          'sortings_columns' =>array(
	              "1" =>"prf.matrimony_id",
	              "2" =>"prf.profile_name",
	              "3" =>"prf.dob",
	              "4" =>"rl.religion_name",
	              "5" =>"mt.mother_tongue_name",
	              "6" =>"prf.email",
	              "7" =>"prf.phone",
	              "8" =>"prf.profile_status",
	              "9" =>"packages.package_name",
	              //"10" =>"not need",
	              "11" =>"prf.is_premium",
	              ),
	          'advance_searches' =>isset($postedData['advance_searches'])? $postedData['advance_searches'] : array(),
	      ); 
	      
	      $resultForDatatable = $this->Customer_model->get_customer_list_datatable($params);
	       //print_r($resultForDatatable);
	      // return false;
	      $data = array();
	      $serial_no = $postedData['start'];
	      foreach ($resultForDatatable['data'] as $allData) {
	  
	          $row = array();
	          $row['0'] = ++$serial_no;
	          $row['1'] = $allData->matrimony_id;
	          $row['2'] = $allData->profile_name;
	          $row['3'] = $allData->dob;
	          $row['4'] = $allData->religion_name;
	          $row['5'] = $allData->mother_tongue_name;
	          $row['6'] = $allData->email;
	          $row['7'] = $allData->phone;
	          $profile_status = "";
	          if($allData->profile_status=='0'){
					$profile_status = "Rejected";
				}
				else if($allData->profile_status=='1'){
					$profile_status = "Activated";
				}
				else if($allData->profile_status=='2'){
					$profile_status = "Deleted";
				}
				else if($allData->profile_status=='3'){
					$profile_status = "Banned";
				}
				else if($allData->profile_status=='4'){
					$profile_status = "Deactivated";
				}
	          $row['8'] = $profile_status;
	          $row['9'] = $allData->package_name;

	          if($allData->matrimony_id!=null){
	          $row['10'] = '<a class="btn btn-sm btn-success" href="'.base_url().'../profile/profile_details/'.$allData->matrimony_id.'" target="_blank">View Profile</a>';
	      		}else{ 
	      	  $row['10'] = '<a href="#" style="color:red;">incomplete profile</a>';
	      	}

	      	if($allData->is_premium==1){
	      		$row['11'] = '<a class="btn btn-sm bg-orange custom-btn" href="'.base_url().'customer/upgrade_members/'.$allData->matrimony_id.'">Downgrade</a>';
	      	} else if($allData->is_premium==0){
	      		$row['11'] = '<a class="btn btn-sm btn-success" href="'.base_url().'customer/upgrade_members/'.$allData->matrimony_id.'">Upgrade</a>';
	      	} else if($allData->is_premium==2) {
	      		$row['11'] = '<a class="btn btn-sm btn-primary" href="'.base_url().'customer/upgrade_members/'.$allData->matrimony_id.'">Waiting for upgrade</a>';
	      	}

	      	if($allData->profile_approval=='0' || $allData->profile_status=='2'){
	      	$row['12'] = '<a class="btn btn-sm bg-olive custom-btn" href="'.site_url('customer/approve_member/'.$allData->profile_id).'" onClick="return doapprove()" title="Approve Member">
	      	 	<i class="fa fa-check"></i></a> <!-- approve -->';
	      	 
	      	 } else {
	      	$row['12'] = '<a class="btn btn-sm bg-orange custom-btn" href="'.site_url('customer/reject_member/'.$allData->profile_id).'" onClick="return doapprove()" title="Reject Member">
	      	 <i class="fa fa-close"></i></a>  <!-- reject -->';
	      	}
	      	$row['12'] .= '<a class="btn btn-sm btn-primary custom-btn" href="'.site_url('customer/edit_member/'.$allData->profile_id).'" title="Edit Member Profile">
	      	 <i class="fa fa-fw fa-edit"></i></a> <!-- edit -->';

	      	if($allData->profile_status!='3') {
	      	 $row['12'] .= '<a class="btn btn-sm btn-danger custom-btn" href="'.site_url('customer/ban_member/'.$allData->profile_id).'" onClick="return doconfirmban()" title="Ban Member">
	      	 <i class="fa fa-ban"></i></a> <!-- ban -->'; 
	      	 }
	      	if($allData->profile_status!='2') { 
	      	 $row['12'] .= '<a class="btn btn-sm btn-danger custom-btn" href="'.site_url('customer/delete_member/'.$allData->profile_id).'" onClick="return doconfirm()" title="Delete Member">
	      	 <i class="fa fa-fw fa-trash"></i></a> <!-- delete -->';
	      	}
	      	if($allData->profile_highlight=='1'){
	      		$row['13'] = '<a class="btn btn-sm bg-orange custom-btn" href="'.site_url('Customer/highlight_members/'.$allData->matrimony_id).'"  title="HighLight Member ">
              <i class="fa-exclamation-triangle"></i></a>';
          	} else if($allData->profile_highlight=='0') {
	      		$row['13'] = '<a class="btn btn-sm btn-primary custom-btn" href="'.site_url('Customer/disable/'.$allData->matrimony_id).'"  title="HighLight Disable">
              <i class="fa-lightbulb-o"></i></a>';
          	}
	          $data[] = $row;
	      }
	  
	      $output = array(
	                      "draw" => $postedData['draw'],
	                      "recordsFiltered" => $resultForDatatable['recordsFiltered'],
	                      "recordsTotal" => $resultForDatatable['recordsTotal'],
	                      "data" => $data,
	              );
	      //output to json format
	      echo json_encode($output); 
	  }
	public function upgrade_members(){
		if($this->session->userdata('logged_in_admin')) {
			$settings        = get_settings();
        	$header['title'] = $settings->title . " | Upgrade Members";		
			$this->load->view('Templates/header',$header);
			$mat_id = $this->uri->segment(3);
			$data['package'] = $this->Customer_model->view_packages($mat_id);
			$data['package1'] = $this->Customer_model->view_packages1();
			$this->load->view('customer/upgrade_members',$data);
			$this->load->view('Templates/footer');
			 if($_POST) {
					  
				  $data = $_POST;
				//  var_dump($data);
				 // die();
				   $result = $this->Customer_model->upgrade_members($data,$mat_id);
				 
				}
		} else { redirect(base_url()); }
	  }

	  public function edit_package(){
		if($this->session->userdata('logged_in_admin')) {
			$settings        = get_settings();
        	$header['title'] = $settings->title . " | Edit Package";		
			$this->load->view('Templates/header',$header);
			$mat_id = $this->uri->segment(3);
			$data['package'] = $this->Customer_model->edit_package($mat_id);
			//membership_details
		//	var_dump($data);
		//	exit();
		//	$data['package1'] = $this->Customer_model->view_packages1();
			$this->load->view('customer/edit-package',$data);
			$this->load->view('Templates/footer');
			 if($_POST) {
					  
			  $data1 = $_POST;
				//  var_dump($data);
				 // die();
				   $result = $this->Customer_model->save_edited_package($data1,$mat_id);
				   if($result){
					echo "<script type='text/javascript'>".
					"alert('edit package Success .');window.location.href='https://pellithoranam.com/admin/Customer/view_members'".
				   "</script>";
				  //https://pellithoranam.com/admin/Customer/view_members
				   }
				   else{
					echo "<script type='text/javascript'>".
					"alert('edit package failed .Try again');
					 location.reload;".
				   "</script>";
				   }
				}
		} else { redirect(base_url()); }
	  }
	public function get_drop_data() {
		$sel_val = $this->input->post('sel_val');
		$sel_typ = $this->input->post('sel_typ');
		$where = array(); $tbl = "";

		if($sel_typ == "package") { 
			$tbl = "packages";
			$fld_name = "package_name";
			$where[] = "package_type = '".$sel_val."'"; 
		}  else { return false; }

		$drop_vals = $this->Reports_model->getTable("",$where,$tbl);

		$html = "";
		$html.= "<option value='0'>Select Package</option>";

		if($fld_name == "package_name") {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->id."'>".$drop_val->package_name."/Rs-".$drop_val->price."</option>";
			}
		} else {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->id."'>".$drop_val->package_name."/Rs-".$drop_val->price."</option>";
			}
		}
		echo $html;
	}
public function get_drop_data2() {
		$sel_val = $this->input->post('sel_val');
		$sel_typ = $this->input->post('sel_typ');
		$where = array(); 
		$tbl = "";

		if($sel_typ == "country") { 
			$tbl = "states";
			$fld_name = "State";
			$where[] = "country_id = '".$sel_val."'"; 
		} else if($sel_typ == "state") {
			$tbl = "cities";
			$fld_name = "City";
			$where[] = "state_id = '".$sel_val."'"; 
		} else { return false; }

		$drop_vals = $this->Reports_model->getTable("",$where,$tbl);

		$html = "";
		$html.= "<option value='0'>Select ".$fld_name."</option>";

		if($fld_name == "State") {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->state_id."'>".$drop_val->state_name."</option>";
			}
		} else {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->city_id."'>".$drop_val->city_name."</option>";
			}
		}
		echo $html;
	}
public function get_drop_data3() {
		$sel_val = $this->input->post('sel_val');
		$sel_typ = $this->input->post('sel_typ');
		$where = array(); 
		$tbl = "";

		if($sel_typ == "religion") { 
			$tbl = "castes";
			$fld_name = "Caste";
			$where[] = "religion_id = '".$sel_val."'"; 
		}  else { return false; }

		$drop_vals = $this->Reports_model->getTable("",$where,$tbl);

		$html = "";
		$html.= "<option value='0'>Select ".$fld_name."</option>";

		if($fld_name == "Caste") {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->caste_id."'>".$drop_val->caste_name."</option>";
			}
		} 
		echo $html;
	}
	public function approve_member() {		
		if($this->session->userdata('logged_in_admin')) {							// Approve Customer
		  $prof_id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->approve_member($prof_id);
		  $this->session->set_flashdata('message', array('message' => 'Membership Approved','class' => 'success'));
		  redirect(base_url().'customer/view_members');
		} else { redirect(base_url()); }
	}
		public function highlight_members() {		
		if($this->session->userdata('logged_in_admin')) {							// Approve Customer
		  $prof_id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->updatehighlight_members($prof_id);
		  $this->session->set_flashdata('message', array('message' => 'Highlight Disabled ','class' => 'success'));
		  redirect(base_url().'customer/view_members');
		} else { redirect(base_url()); }
	}
		public function disable() {		
		if($this->session->userdata('logged_in_admin')) {							// Approve Customer
		  $prof_id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->disablehighlight_members($prof_id);
		  $this->session->set_flashdata('message', array('message' => ' Membership Highlighted','class' => 'success'));
		  redirect(base_url().'customer/view_members');
		} else { redirect(base_url()); }
	}
	
	
	
	public function reject_member() {													// Reject Customer
		if($this->session->userdata('logged_in_admin')) {	
		  $prof_id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->reject_member($prof_id);
		  $this->session->set_flashdata('message', array('message' => 'Membership Rejected','class' => 'success'));
		  redirect(base_url().'customer/view_members');
		} else { redirect(base_url()); } 
	}
	public function delete_member() {
		if($this->session->userdata('logged_in_admin')) {
		  $prof_id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->delete_member($prof_id);
		  $this->session->set_flashdata('message', array('message' => 'Membership Deleted','class' => 'success'));
		  redirect(base_url().'customer/view_members');
		} else { redirect(base_url()); } 
	}
	public function remove_member() {
		if($this->session->userdata('logged_in_admin')) {
		  $id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->remove_member($id);
		  $this->session->set_flashdata('message', array('message' => 'profile  Deleted completely','class' => 'success'));
		  redirect(base_url().'customer/view_members');
		} else { redirect(base_url()); } 
	}
	public function ban_member() {
		if($this->session->userdata('logged_in_admin')) {
		  $prof_id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->ban_member($prof_id);
		  $this->session->set_flashdata('message', array('message' => 'Membership Banned','class' => 'success'));
		  redirect(base_url().'customer/view_members');
		} else { redirect(base_url()); } 
	}
	public function edit_member() {
		if($this->session->userdata('logged_in_admin')) {
			$prof_id = $this->uri->segment(3);
			$whr[] = "profiles.profile_id = '".$prof_id."'";
			$data['prof_id'] = $prof_id;
			$data['profile'] = $this->Customer_model->get_profile_details($whr);
			$data['religions'] = $this->Customer_model->getReligions();
	        $data['mother_tongue'] = $this->Customer_model->getMotherTongues();
	        $settings        = get_settings();
        	$header['title'] = $settings->title . " | Edit Members";
			$this->load->view('Templates/header',$header);
			$data['religions'] = $this->Customer_model->getTable("","","religions");
				//$data['castes'] = $this->Home_model->getTable("","","castes");
				$data['mother_tongue'] = $this->Customer_model->getMotherTongues();
            	$data['stars'] = $this->Customer_model->getTable("","","stars");
            	$data['raasi'] = $this->Customer_model->getTable("","","raasi");
            	$data['educations'] = $this->Customer_model->getTable("","","educations");
            	$data['countries'] = $this->Customer_model->getTable("","","country");
            	$data['occupations'] = $this->Customer_model->getTable("","","occupations");
            	$data['heights'] = $this->Customer_model->getTable("","","height");
            	$data['weights'] = $this->Customer_model->getTable("","","weight");
			$this->load->view('customer/edit-customer',$data);
			$this->load->view('Templates/footer');
			if($_POST) {
					  
				$data1 = $_POST;
				  //  var_dump($data);
				   // die();
					 $result = $this->Customer_model->edit_member($data1,$mat_id);
					 if($result){
					  echo "<script type='text/javascript'>".
					  "alert('edit customer Success .');window.location.href='https://pellithoranam.com/admin/Customer/view_members'".
					 "</script>";
					//https://pellithoranam.com/admin/Customer/view_members
					 }
					 else{
					  echo "<script type='text/javascript'>".
					  "alert('edit customer failed .Try again');
					   location.reload;".
					 "</script>";
					 }
				  }



		} else { redirect(base_url()); } 
	}
	public function save_edited_details() {
		if($_POST) {
			$prof_id = $this->uri->segment(3);
			$result = $this->Customer_model->edit_member($_POST, $prof_id);
			if($result) {
				$this->session->set_flashdata('message',array('message' => ' Updated Successfully','class' => 'success'));
				redirect(base_url().'customer/view_members');
			} else {
				$this->session->set_flashdata('message', array('message' => "Something Went wrong.",'class' => 'danger'));	
				redirect(base_url().'customer/view_members');
			}
		}
	}
	public function view_profilepics() {
		if($this->session->userdata('logged_in_admin')) {
			$data['prof_pics'] = $this->Customer_model->getProfilePics();
			//print_r($data['prof_pics']);die;
			$settings        = get_settings();
        	$header['title'] = $settings->title . " | View Profile";
			$this->load->view('Templates/header',$header);
			$this->load->view('customer/view-profilepic',$data);
			$this->load->view('Templates/footer');
		} else { redirect(base_url()); } 
	}
	public function view_gallerypics() {
		if($this->session->userdata('logged_in_admin')) {
			$data['gallery_pics'] = $this->Customer_model->getGalleryPics();
			
			$settings        = get_settings();
        	$header['title'] = $settings->title . " | View Gallerypics";
			$this->load->view('Templates/header',$header);
			$this->load->view('customer/view-gallerypic',$data);
			$this->load->view('Templates/footer');
		} else { redirect(base_url()); } 
	}
  public function view_idproof() {
		if($this->session->userdata('logged_in_admin')) {
			$data['proof'] = $this->Customer_model->getIdproofs();
			$settings        = get_settings();
        	$header['title'] = $settings->title . " | View Id Proof";
			$this->load->view('Templates/header',$header);
			$this->load->view('customer/view-idproofs',$data);
			$this->load->view('Templates/footer');
		} else { redirect(base_url()); } 
	}
	public function crop_profilepic() {
		if($this->session->userdata('logged_in_admin')) {
			if($_POST){
/*var_dump($_POST);
die();*/
				$data['prof_pic'] = $_POST['image-loc'];
				$data['prof_user'] = $_POST['image-user'];
				$data['prof_preference'] = $_POST['profile_preference'];
				$data['picid'] = $_POST['picid'];
				$settings        = get_settings();
        		$header['title'] = $settings->title . " | Crop Profile Pics";
				$this->load->view('Templates/header',$header);
				$this->load->view('customer/crop-profilepic',$data);
				$this->load->view('Templates/footer');
			}
		} else { redirect(base_url()); } 
	}

	public function save_croped() {
		ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
		if($this->session->userdata('logged_in_admin')) {
			if($_POST){
				$pic_id = $_POST['picid'];
				$new_name = $_POST['photo'];
				$prof_preference = $_POST['prof_preference'];

				$image_config["image_library"] = "gd2";
				$image_config["source_image"] = '../'.$_POST['photo'];

				$image_config['wm_text'] = 'Pellithoranam.com';
				$image_config['wm_type'] = 'text';
				$image_config['wm_font_path'] = './system/fonts/texb.ttf';
				$image_config['wm_font_size'] = '12';
				$image_config['wm_font_color'] = 'ffffff';
				$image_config['wm_vrt_alignment'] = 'bottom';
				$image_config['wm_hor_alignment'] = 'right';
				$image_config['wm_padding'] = '0';
				$image_config['wm_opacity']   = '48';

				$image_config['create_thumb'] = FALSE;
				$image_config['maintain_ratio'] = false;
				$image_config['new_image'] = '../'.$new_name;
				$image_config['width'] =$_POST['w'];
				$image_config['height'] =$_POST['h'];
				$image_config['x_axis'] = $_POST['x'];
				$image_config['y_axis'] = $_POST['y'];
				$dim = (intval($_POST["org_w"]) / intval($_POST["org_h"])) - ($_POST['w'] / $_POST['h']);
				$image_config['master_dim'] = ($dim > 0)? "height" : "width";
				/*var_dump($image_config);
				die();*/
                
				$this->load->library('image_lib');
				$this->image_lib->clear();
				$this->image_lib->initialize($image_config);
				
				if(!($this->image_lib->crop() && $this->image_lib->watermark())) { //Resize image
					
				    echo $this->image_lib->display_errors();
				    $this->session->set_flashdata('message', array('message' => "Something Went wrong.",'class' => 'danger'));
					redirect(base_url().'customer/view_profilepics');
				} else { 
					$ext = pathinfo($new_name, PATHINFO_EXTENSION);	
					if($ext=='jpg'||$ext=='jpeg')	{			
					$img = imagecreatefromjpeg(base_url().'../'.$new_name); 
					for ($x=1; $x<=35; $x++) { 
					imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR); 
					imagefilter($img, IMG_FILTER_SELECTIVE_BLUR); 
					} 
				//	$image_name= time()."_".'blur'.'.jpg';	
					if($ext=='jpg'){
						$image_name= time()."_".'blur'.'.jpg';	
						} else if($ext=='jpeg'){
							$image_name= time()."_".'blur'.'.jpeg';
						}
					$image_name1='assets/uploads/profile_pics/'.$image_name;			
					imagejpeg($img,'../assets/uploads/profile_pics/'.$image_name); 
					imagedestroy($img); 
				    }else if($ext=='png'){

				    $img = imagecreatefrompng(base_url().'../'.$new_name); 
				   // $image_name= time()."_".'blur'.'.png';			    
				 /*  if($ext=='jpg'){
					$image_name= time()."_".'blur'.'.jpg';	
					} else if($ext=='jpeg'){
						$image_name= time()."_".'blur'.'.jpeg';
					}   */
					$image_name= time()."_".'blur'.'.png';
					$image_name1='assets/uploads/profile_pics/'.$image_name;
					for ($x=1; $x<=35; $x++) { 
					imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR); 
					imagefilter($img, IMG_FILTER_SELECTIVE_BLUR); 
					} 
					imagepng($img,'../assets/uploads/profile_pics/'.$image_name); 
					imagedestroy($img); 	
					}/*if($prof_preference=='1'){*/
						
					//	0echo 'image name--'.$image_name.'--';
						//exit();
				    $this->Customer_model->update_profile_pic_blur($image_name1,$_POST['user_matr'],$pic_id);
				   /* }*/
					$this->Customer_model->update_profile_pic($new_name,$_POST['user_matr'],$pic_id);
					$this->session->set_flashdata('message',array('message' => ' Profile Picture Successfully Croped and Approved','class' => 'success'));
					redirect(base_url().'customer/view_profilepics');
				}
			}
		} else { redirect(base_url()); } 
	}

	public function save_approved() {
		ini_set('display_errors', 1);
error_reporting(E_ALL);
		if($this->session->userdata('logged_in_admin')) {
			if($_POST){
				$pic_id = $_POST['picid'];
				$new_name = $_POST['photo'];
			//	$prof_preference = $_POST['prof_preference'];

				$image_config["image_library"] = "gd2";
				$image_config["source_image"] = '../'.$_POST['photo'];

				$image_config['wm_text'] = 'Pellithoranam.com';
				$image_config['wm_type'] = 'text';
				$image_config['wm_font_path'] = './system/fonts/texb.ttf';
				$image_config['wm_font_size'] = '12';
				$image_config['wm_font_color'] = 'ffffff';
				$image_config['wm_vrt_alignment'] = 'bottom';
				$image_config['wm_hor_alignment'] = 'right';
				$image_config['wm_padding'] = '0';
				$image_config['wm_opacity']   = '48';

				$image_config['create_thumb'] = FALSE;
				$image_config['maintain_ratio'] = true;
				$image_config['new_image'] = '../'.$new_name;
			/*	$image_config['width'] =$_POST['w'];
				$image_config['height'] =$_POST['h'];
				$image_config['x_axis'] = $_POST['x'];
				$image_config['y_axis'] = $_POST['y'];
				$dim = (intval($_POST["org_w"]) / intval($_POST["org_h"])) - ($_POST['w'] / $_POST['h']);
				$image_config['master_dim'] = ($dim > 0)? "height" : "width";   */
				/*var_dump($image_config);
				die();
                */
				$this->load->library('image_lib');
				$this->image_lib->clear();
				$this->image_lib->initialize($image_config);
				
		/*	if(!($this->image_lib->watermark())) { //Resize image
					
				    echo $this->image_lib->display_errors();
				    $this->session->set_flashdata('message', array('message' => "Something Went wrong.",'class' => 'danger'));
					redirect(base_url().'customer/view_profilepics');
				}  */

			//	if(!($this->image_lib->crop() && $this->image_lib->watermark())) 
				
				
			//	else { 
					$ext = pathinfo($new_name, PATHINFO_EXTENSION);	
					if($ext=='jpg'||$ext=='jpeg')	{			
					$img = imagecreatefromjpeg(base_url().'../'.$new_name); 
					for ($x=1; $x<=35; $x++) { 
				//	imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR); 
				//	imagefilter($img, IMG_FILTER_SELECTIVE_BLUR); 
					} 
					if($ext=='jpg'){
					$image_name= time()."_".'blur'.'.jpg';	
					} else if($ext=='jpeg'){
						$image_name= time()."_".'blur'.'.jpeg';
					}
					$image_name1='assets/uploads/profile_pics/'.$image_name;			
					imagejpeg($img,'../assets/uploads/profile_pics/'.$image_name); 
					imagedestroy($img); 
				    }else if($ext=='png'){

				    $img = imagecreatefrompng(base_url().'../'.$new_name); 
				    $image_name= time()."_".'blur'.'.png';			    
					$image_name1='assets/uploads/profile_pics/'.$image_name;
					for ($x=1; $x<=35; $x++) { 
					imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR); 
					imagefilter($img, IMG_FILTER_SELECTIVE_BLUR); 
					} 
					imagepng($img,'../assets/uploads/profile_pics/'.$image_name); 
					imagedestroy($img); 	
				    }/*if($prof_preference=='1'){*/
		 $this->Customer_model->update_profile_pic_blur($image_name1,$_POST['user_matr'],$pic_id);
				   /* }*/
			//	{
					$this->Customer_model->update_profile_pic($_POST['photo'],$_POST['user_matr'],$pic_id);
					$this->session->set_flashdata('message',array('message' => ' Profile Picture Successfully Approved'.$_POST['user_matr'].'','class' => 'success'));
			//	}else{
			//		$this->session->set_flashdata('message',array('message' => ' Profile Picture failed to Approve','class' => 'failure'));
			//	}
			//	}
					redirect(base_url().'customer/view_profilepics');
				//}
			}
		} else { redirect(base_url()); } 
	}






public function hello() { 
	$img = imagecreatefrompng('https://pbs.twimg.com/profile_images/616198230297214976/PeR519Mx.png'); 
	for ($x=1; $x<=35; $x++) { 
		imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR); 
		//imagefilter($img, IMG_FILTER_SELECTIVE_BLUR); 
	} 
		imagepng($img,'db-bw.png'); 
		imagedestroy($img); 
}
 // view profile pic	  
	public function view_profilepic(){
		  $template['page'] = 'customer/view-profilepic';
		  $template['title'] = 'View Customer';
		  $template['data'] = $this->Customer_model->view_profilepic();
		  $this->load->view('template',$template);
	  }
//approve profilepic  
	 function approve_profilepic(){
		  $data1 = array(
				  "profilepic_status" => '1'
							 );
		  $id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->approve_profilepic($id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Approved Successfully','class' => 'success'));
		  redirect(base_url().'Customer/view_profilepics');
	  }
//reject profilepic	//set pic_staus==2  
	 function reject_profilepic(){
		  $data1 = array(
				  "pic_status" => '2'
							 );
		  $user_id = $this->uri->segment(3);
		  $pic_id = $this->uri->segment(4);		   
		  $result = $this->Customer_model->reject_profilepic($user_id,$pic_id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Rejected Successfully ','class' => 'error'));
		  redirect(base_url().'Customer/view_profilepics');
	  }
//delete profilepic	  
	 function delete_profilepic(){
		  $data1 = array(
				  "pic_status" => '3'
							 );
		  $user_id = $this->uri->segment(3);
		  $pic_id = $this->uri->segment(4);
		  //print_r($user_id);  print_r( $pic_id); die;			   
		  $result = $this->Customer_model->delete_profilepic($user_id,$pic_id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Customer/view_profilepics');
	  }
//approve gallerypic  
	 function approve_gallerypic(){ 
		  $data1 = array(
				  "pic_approval" => '1'
							 );
		  /*$user_id = $this->uri->segment(3);
		  $id = $this->uri->segment(4);	*/
		  if($_POST){
		  $data=$_POST;
		  $user_id = $data['image-user'];
		  $id=$data['picid'];
		  $img_loc=$data['image-loc'];

				    $ext = pathinfo($img_loc, PATHINFO_EXTENSION);	
					/*var_dump($img_loc);
					die();*/
						if($ext=='jpg'||$ext=='jpeg')	{	
						$a=base_url().'../'.$img_loc;
						/*var_dump($a);
						die();		*/
					$img = imagecreatefromjpeg($a); 
					for ($x=1; $x<=35; $x++) { 
					imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR); 
					imagefilter($img, IMG_FILTER_SELECTIVE_BLUR); 
					} 
					$image_name= time()."_".'blur'.'.jpg';	
					$image_name1='assets/uploads/gallery/'.$image_name;			
				/*	imagejpeg($img,'../assets/uploads/gallery/'.$image_name); */
				     imagejpeg($img,'../assets/uploads/gallery/'.$image_name); 
					imagedestroy($img); 
				    }else if($ext=='png'){
						$a=base_url().'../'.$img_loc;
						/*var_dump($a);
						die();	*/
				    $img = imagecreatefrompng($a); 
				    $image_name= time()."_".'blur'.'.png';			    
					$image_name1='assets/uploads/gallery/'.$image_name;
					for ($x=1; $x<=35; $x++) { 
					imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR); 
					imagefilter($img, IMG_FILTER_SELECTIVE_BLUR); 
					} 
					/*imagepng($img,'assets/uploads/gallery/'.$image_name); */
					imagepng($img,'../assets/uploads/gallery/'.$image_name); 
					imagedestroy($img); 	
				    }
				// echo "<pre>";
				// print_r($image_name1);
				// echo "<pre>";
				// exit;
		  $result = $this->Customer_model->approve_gallerypic($user_id,$id,$data1,$image_name1);
		}
		  $this->session->set_flashdata('message', array('message' => 'Approved Successfully','class' => 'success'));
		  redirect(base_url().'Customer/view_gallerypics');
	  }
//reject gallerypic	  
	 function reject_gallerypic(){
		  
		  $data1 = array(
				  "pic_approval" => '0'
							 );
		  $user_id = $this->uri->segment(3);
		  $id = $this->uri->segment(4);	
		  // print_r($user_id);  print_r($user_id); die; 
		  $result = $this->Customer_model->reject_gallerypic($user_id,$id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Rejected Successfully','class' => 'error'));
		  redirect(base_url().'Customer/view_gallerypics');
	  }
//delete gallerypic	  
	 function delete_gallerypic(){
		  
		  $data1 = array(
				  "pict_status" => '0'
							 );
		  $user_id = $this->uri->segment(3);
		  $id = $this->uri->segment(4);			   
		  $result = $this->Customer_model->delete_gallerypic($user_id,$id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Customer/view_gallerypics');
	  }  
}	 
?>