<?php
function set_upload_profilepic($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}

function set_upload_userprofilepic($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}


function set_upload_logo($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}




function set_upload_shoperfilepic($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}



function set_upload_edituser($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}



function set_upload_agent($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}

function set_upload_favicono($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}


function set_upload_optionscategory($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'jpg|png|jpeg';
	$config['max_size']      = '5000';
	$config['overwrite']     = FALSE;

	return $config;
}
function set_upload_optionscategory1($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}
function set_upload_options_subcategory($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}

function set_upload_options_product($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}

function set_upload_user($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}

function set_upload_editagent($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}

function set_upload_profile($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}





/* User Capabilities */
function user_capabilities() {

	$capabilities = array(
						"shopper"		         => "Shopper Details",

                        "store_products"		 => "Store Products Details",
						
						"customer"   		     => "Customer Details",
						
                        "city"			         => "City",
						
						"store_user"   	         => "Store User Details",
						
						"order"      	         => "Order Details",				
						
						"category"               => "Category Details",
						
						"sub_category"           => "Sub Category",
						
						"product"                => "product Details",						
						
						"promocode"              => "Promocodes Details",
						
						"settings"              => "Settind Details",

					);

	return $capabilities;

}

/* User Capabilities - Pages */
function user_page_capabilities() {

	$capability_pages= array(

							"Shopper_ctrl-view_shopper_details"            	          => "shopper",
							"Shopper_ctrl-send_mail"                                  => "shopper",
							"Shopper_ctrl-shopper_active"                             => "shopper",
							"Shopper_ctrl-delete_shopper"                             => "shopper",
							

                            "Shopper_ctrl-view_store_products"           	          => "store_products",
							"Shopper_ctrl-add_store_products"                         => "store_products",
						    "Shopper_ctrl-store_product_update"                       => "store_products",
							"Shopper_ctrl-delete_store_product"                       => "store_products",
							
							
							"Customer_ctrl/view_customer_details"                     => "customer",
							"Customer_ctrl/view_customerpopup"                        => "customer",
							"Customer_ctrl/delete_customer"                           => "customer",
							
							"Store_ctrl/view_city"                                    => "city",
							"Store_ctrl-citydetails_view"                             => "city",
							"Store_ctrl/add_city"                                     => "city",
							"Store_ctrl/edit_city"                                    => "city",
							"Store_ctrl/delete_city"                                  => "city",

                            "User_ctrl/view_user_details"                             => "store_user",
                            "User_ctrl/add_user_details"                              => "store_user",
                            "User_ctrl/view_userpopup"                                => "store_user",
                            "User_ctrl/edit_user_details"                             => "store_user",
                            "User_ctrl/user_delete"                                   => "store_user",
							
							
							
							
                            "Customer_ctrl/view_order_details"                        => "order",
                            "Customer_ctrl/view_orderpopup"                           => "order",
                            "Customer_ctrl/delete_order"                              => "order",
							
							
                            "Home_ctrl/view_category"       	                      => "category",
                            "Home_ctrl/add_category"       	                          => "category",
                            "Home_ctrl/edit_cat"       	                              => "category",
                            "Home_ctrl/catdetails_view"       	                      => "category",
                            "Home_ctrl/delete_cat"       	                          => "category",
							
							"Home_ctrl/view_subcategory"       	                      => "sub_category",
                            "Home_ctrl/add_sub_category"       	                      => "sub_category",
                            "Home_ctrl/edit_subcat"       	                          => "sub_category",
                            "Home_ctrl/delete_subcat"       	                      => "sub_category",
							
							
							
                            "Home_ctrl/view_product"                                  => "product",
                            "Home_ctrl/add_products"                                  => "product",
                            "Home_ctrl/edit_pro"                                      => "product",
                            "Home_ctrl/prodetails_view"                               => "product",
                            "Home_ctrl/delete_pro"                                    => "product",
							
							
							"Promocode_ctrl/view_promocode"                           => "promocode",
							"Promocode_ctrl/add_promocode"                            => "promocode",
                            "Promocode_ctrl/edit_promocode"                           => "promocode",
                            "Promocode_ctrl/promodetails_view"                        => "promocode",
                            "Promocode_ctrl/delete_promocode"                         => "promocode",
							
                            "Settings_ctrl/view_settings"                             => "settings",
                         
						);

	return $capability_pages;
}

/* User menu */
function user_menu() {

	$mainmenu = array(

		/*array(
			"slug" => "dashboard",
			"name" => "Dashboard",
			"url" => "dashboard",
			"icon" => "dashboard",
			"submenu" => false,
			"super_admin" => false,
			"capabilities" => array("basic_cap")
		),*/
		
		array(
            "slug" => "Shopper",
            "name" => "Shopper",
            "url" => "Shopper_ctrl/view_shopper_details",
            "icon" => "fa fa-users",
            "submenu" => false,
			"super_admin" => true,
            "capabilities" => array("shopper")
        ),
		
		
		array(
			"slug" => "Store Products",
			"name" => "Store Products",
			"url" => "#",
			"icon" => "fa fa-desktop",
			"submenu" => true,
			"super_admin" => true,
			"capabilities" => array("store_products"),
			"submenu_items" => '[
									{"name":"View Store Products","cap":"store_products","url":"Shopper_ctrl/view_store_products"},
									{"name":"Add Store Products","cap":"store_products","url":"Shopper_ctrl/add_store_products"}
									
								]'
		),
		
		
		
		array(
            "slug" => "Customers",
            "name" => "Customers",
            "url" => "Customer_ctrl/view_customer_details",
            "icon" => "fa fa-users",
            "submenu" => false,
			"super_admin" => true,
            "capabilities" => array("customer")
        ),

		array(
			"slug" => "City",
			"name" => "City",
			"url" => "#",
			"icon" => "fa fa-map-marker",
			"submenu" => true,
			"super_admin" => true,
			"capabilities" => array("city"),
			"submenu_items" => '[
											{"name":"View City","cap":"city","url":"Store_ctrl/view_city"},
											{"name":"Add City","cap":"city","url":"Store_ctrl/add_city"}
											]'
		),
		
		array(
			"slug" => "Store User",
			"name" => "Store User",
			"url" => "#",
			"icon" => "fa fa-user",
			"submenu" => true,
			"super_admin" => true,
			"capabilities" => array("City"),
			"submenu_items" => '[
											{"name":"View Store User","cap":"store_user","url":"User_ctrl/view_user_details"},
											{"name":"Add Store User","cap":"store_user","url":"User_ctrl/add_user_details"}
											]'
		),
		
		
        array(
            "slug" => "Order",
            "name" => "Order",
            "url" => "Customer_ctrl/view_order_details",
            "icon" => "fa fa-shopping-cart",
            "submenu" => false,
			"super_admin" => true,
            "capabilities" => array("order")
        ),

		array(
			"slug" => "Category",
			"name" => "Category",
			"url" => "#",
			"icon" => "fa fa-bars",
			"submenu" => true,
			"super_admin" => true,
			"capabilities" => array("category"),
			"submenu_items" => '[
									{"name":"View Category","cap":"category","url":"Home_ctrl/view_category"},
									{"name":"Add  Category","cap":"category","url":"Home_ctrl/add_category"}
								]'
		),
		
		array(
			"slug" => "Sub Category",
			"name" => "Sub Category",
			"url" => "#",
			"icon" => "fa fa-bars",
			"submenu" => true,
			"super_admin" => true,
			"capabilities" => array("sub_category"),
			"submenu_items" => '[
									{"name":"View SubCategory","cap":"sub_category","url":"Home_ctrl/view_subcategory"},
									{"name":"Add SubCategory","cap":"sub_category","url":"Home_ctrl/add_sub_category"}
								]'
		),

		array(
			"slug" => "Products",
			"name" => "Products",
			"url" => "#",
			"icon" => "fa fa-fw fa-barcode",
			"submenu" => true,
			"super_admin" => true,
			"capabilities" => array("product"),
			"submenu_items" => '[
									{"name":"View Product","cap":"product","url":"Home_ctrl/view_product"},
									{"name":"Add Product","cap":"product","url":"Home_ctrl/add_products"}
								]'
		),
		
		
		array(
			"slug" => "Promocodes",
			"name" => "Promocodes",
			"url" => "#",
			"icon" => "fa fa-product-hunt",
			"submenu" => true,
			"super_admin" => true,
			"capabilities" => array("promocode"),
			"submenu_items" => '[
									{"name":"View Promocode","cap":"promocode","url":"Promocode_ctrl/view_promocode"},
									{"name":"Add Promocode","cap":"promocode","url":"Promocode_ctrl/add_promocode"}
								]'
		),
		
		
		array(
            "slug" => "Settings",
            "name" => "Settings",
            "url" => "Settings_ctrl/view_settings",
            "icon" => "fa fa-users",
            "submenu" => false,
			"super_admin" => true,
            "capabilities" => array("settings")
        ),
		
		
		
		
	);
	return $mainmenu;

}


/* Get role capabilities */
function get_capabilities($role_id) {
	if($role_id != 1) {
		$CI = & get_instance();
		$CI->db->where('id', $role_id);
		$CI->db->where("status",1);
		$query = $CI->db->get('roles');
		$roles = $query->row();
		//$roles = $CI->settings_model->get_single_role($role_id);
		$user_roles = explode(",", $roles->role_pages);
		return $user_roles;
	}
}


/* Check the page is accessible */
function can_access_page() {
	$CI = & get_instance();

	if($CI->session->userdata('admin') == 1) {
		return true;
	}
	else {
	$exclude_pages = array("dashboard-index", "profile-index", 'leads-view_single_lead');
	$user_caps = array();
	$all_caps = user_page_capabilities();

	$controller_name = $CI->uri->segment(1);

	$method_name = $CI->uri->segment(2);

	if(!$method_name) {
		$method_name = "index";
	}
	$page = $controller_name."-".$method_name;
	if(in_array($page, $exclude_pages)) {
		return true;
	}
	else {
		$current_page_cap = $all_caps[$page];

		$role = $CI->session->userdata('admin');
		$user_caps = get_capabilities($role);
		if($user_caps) {
			if(in_array($current_page_cap, $user_caps)) {
				return true;
			}
			else {
				return false;
			}
		}
	}
	//exit;
	}
}


function get_setting(){
	$ci = & get_instance();
	$rs = $ci->db->get('settings')->row();
	return $rs;
}

function get_profile($id){
	$ci = & get_instance();
	$ci->db->where("profile_id",$id);
	$rs = $ci->db->get('profiles')->row();
	return $rs;
}

function get_days_count($id){
	$ci = & get_instance();
	$rs = $ci->db->where('user_id',$id)->get('active_members')->row();
	if(count($rs)>0){
		$now = time();
		$your_date = strtotime($rs->date_time);
		$datediff = $now - $your_date;
		$days = floor($datediff / (60 * 60 * 24));
		if($days>1){
			$days = $days.'days ago';
		} else {
			$days = $days.'day ago';
		}
	} else {
		$days = "Never logged yet";
	}
	return $days;
	
}

function remove_html(&$item, $key)
{
    $item = strip_tags($item);
}





function mail_otp(){
          $ci = & get_instance();
		$ci->db->limit(1);
		$query=$ci->db->get('settings');
		$result=$query->row();
		 
		return $result;
   }


function get_notificationcount($matrimony_id){
		
	  $ci = & get_instance();
	    $ci->db->from('history');
		$ci->db->where("history_to",$matrimony_id);
		$ci->db->where("status",0);
		$query=$ci->db->get();
		$s=$query->num_rows();//echo $ci->db->last_query();die;
		 
		return $s;	}
?>