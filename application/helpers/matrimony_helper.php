<?php
function set_upload_options($path) {   
	//upload an image options
	$config = array();
	$config['upload_path'] = $path;
	$config['allowed_types'] =  'gif|jpg|png|jpeg';
	$config['max_size']      = '0';
	$config['overwrite']     = FALSE;

	return $config;
}
function get_mother($array){
	$res_array=array();
	if($array[0]!='Not Specified'){
		foreach ($array as $value) {
			$res_array[]=$value->mother_tongue_name;
		}
		return $res_array;
	}else{
		return $array;
	}
}
 function get_photo_request($my_matr_id,$matr_id) {

        $this->db->where('photo_request_from',$my_matr_id);
        $this->db->where('photo_request_to',$matr_id);  
        $this->db->where('photo_request_status','1');      
        $query=$this->db->get('profile_photo_request');
        $result = $query->row();
        if($result){
        	return true;
        }else{
        	return false;
        }         
       
    }
function get_caste($array){
	//print_r($array); die();
	$res_array=array();
	if($array[0]!='Not Specified'){
		foreach ($array as $value) {
			$res_array[]=$value->caste_name;
		}
		return $res_array;
	}else{
		return $array;
	}
}
function get_religion($array){
	//print_r($array); die();
	$res_array=array();
	if($array[0]!='Not Specified'){
		foreach ($array as $value) {
			$res_array[]=$value->religion_name;
		}
		return $res_array;
	}else{
		return $array;
	}
}
function preferncecallback($name,$value) {
	if($value==0){
		return array("Doesn't Matter");
	}
	$maritial_status= array(
							"1"  => "Never Married",
							"2"  => "Divorced",
							"3"  => "Widowed",
							"4"  => "Awaiting for Divorce",                      
						);
	if($name == "maritial"){			
			if(!empty($value)){					
				$all_maritial = array();
				$maritial = explode(',',$value);
			foreach($maritial as $sub_maritial){
				$all_maritial[] = $maritial_status[$sub_maritial];
			}			
		}else{
			$all_maritial =array("Any");			
	}
	return $all_maritial;
	}	
                  
	$smoking_status= array(
							"1"  => "No",
							"2"  => "Occasionaly",
							"3"  => "Yes",							                    
						);
	if($name == "smoking"){			
			if(!empty($value)){							
				$all_smoking = array();
				$smoking = explode(',',$value);
			foreach($smoking as $sub_smoking){
				$all_smoking[] = $smoking_status[$sub_smoking];
			}			
		}else{
			$all_smoking =array("Any");			
	}
	return $all_smoking;
	}
	
	$eating_status= array(
							"1"  => "Vegetarian",
							"2"  => "Non Vegitarian",
							"3"  => "Eggetarian",							                    
						);
	if($name == "eating"){			
			if(!empty($value)){						
				$all_eating = array();
				$eating = explode(',',$value);
			foreach($eating as $sub_eating){
				$all_eating[] = $eating_status[$sub_eating];
			}			
		}else{
			$all_eating =array("Any");			
	}
	return $all_eating;
	}
	       
	$drinking_status= array(
							"1"  => "No",
							"2"  => "Drinks Socialy",
							"3"  => "Yes",							                    
						);
	if($name == "drinking"){			
			if(!empty($value)){						
				$all_drinking = array();
				$drinking = explode(',',$value);
			foreach($drinking as $sub_drinking){
				$all_drinking[] = $drinking_status[$sub_drinking];
			}			
		}else{
			$all_drinking =array("Any");			
	}
	return $all_drinking;
	}
	
	$dosham_status= array(
							"1"  => "No",
							"2"  => "Yes",
							"3"  => "Don't Know",							                    
						);
	if($name == "dosham"){			
			if(!empty($value)){						
				$all_dosham = array();
				$dosham = explode(',',$value);
			foreach($dosham as $sub_dosham){
				$all_dosham[] = $dosham_status[$sub_dosham];
			}			
		}else{
			$all_dosham =array("Any");			
	}
	return $all_dosham;
	}

	$physical_status= array(
							"1"  => "Normal",
							"2"  => "Physically Challenged"							                    
						);
	if($name == "physical"){			
			if(!empty($value)){						
				$all_physical = array();
				$dosham = explode(',',$value);
			foreach($dosham as $sub_dosham){
				$all_physical[] = $physical_status[$sub_dosham];
			}			
		}else{
			$all_physical =array("Any");			
	}
	return $all_physical;
	}

	$body_status= array(
							"1"  => "Slim",
							"2"  => "Average",
							"3"  => "Athletic",
							"4"  => "Heavy"							                    
						);
	if($name == "body_type"){			
			if(!empty($value)){						
				$all_body = array();
				$dosham = explode(',',$value);
			foreach($dosham as $sub_dosham){
				$all_body[] = $body_status[$sub_dosham];
			}			
		}else{
			$all_body =array("Any");			
	}
	return $all_body;
	}

	$complexion_status= array(
							"1"  => "Very Fair",
							"2"  => "Fair",
							"3"  => "Wheatish",		
							"4"  => "Wheatish Brown",		
							"5"  => "Dark",					                    
						);
	if($name == "complexion"){			
			if(!empty($value)){						
				$all_complexion = array();
				$dosham = explode(',',$value);
			foreach($dosham as $sub_dosham){
				$all_complexion[] = $complexion_status[$sub_dosham];
			}			
		}else{
			$all_complexion =array("Any");			
	}
	return $all_complexion;
	}
}

function check_installer(){
  
  $file = "INSTALLER_TRUE.php";
    if(file_exists($file)){
       redirect(base_url().'Installer/installer.php');
   } 
   
}
?>