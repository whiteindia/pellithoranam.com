<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bridal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        date_default_timezone_set("Asia/Kolkata");
        
        $this->load->model('bridalnew_model');
     /*   if (!$this->session->userdata('logged_in_admin')) {
            redirect(base_url());
        } */
   /*     ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
    }
    function index(){
        $postedData =$this->input->post(NULL);
        // for datatable
        if(array_key_exists("start", $postedData)){
            $this->_get_bridal_tbl();
            return false;
        }
        else{
            $settings        = get_settings();
            $header['title'] = $settings->title . " | View Brdal Collection";
            $this->load->view('Templates/header', $header);
            //$data['countries'] = $this->Reports_model->getTable("", "", "country");
            //$data['religions'] = $this->Reports_model->getTable("", "", "religions");
           // $data = array();
           // $this->load->view('bridal/index', $data);
           // $this->load->view('Templates/footer');
            $this->load->view('bridal/login');
        }
    }

public function logout() {
    $data=array();
   // unset($_SESSION["id"]);
unset($_SESSION);
header("Location:login.php");
    $this->load->view('bridal/login', $data);
}
    public function upload() {
        $data=array();
        $this->load->view('bridal/upload', $data);
    }
	public function login() {
   // if(isset($_SESSION['bridaluser']))  { $data=array(); $this->load->view('bridal/upload', $data);}
        if($_POST){
$username=$_POST['username'];
$password=md5($_POST['password']);
//bridalcode( `bridalcode`, `bridaluser`, `contact`);
$this->db->where('bridaluser', $username);
$query = $this->db->get('bridalusers'); 
$count=$query->num_rows();
$row=$query->row();
//
//$result =(int) (isset($row)? $row->totalRows : 0); 
//$result=json_decode(json_encode($result),true);
if($count>0){
if($row->password==$password){

$_SESSION['bridaluser']=$row->bridaluser;
$_SESSION['bridalcode']=$row->bridalcode;
$_SESSION['contact']=$row->contact;
//$this->load->view('bridal/upload', $data);
redirect(base_url() . 'bridal/upload/');
}else{
    echo 'Password Wrong';
}

}else{
    echo 'user doesnot exists';
}
        }else {
            $data=array();
            $this->load->view('bridal/login', $data);
        }  
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

    private function _get_bridal_tbl()
    {
        $postedData =$this->input->post(NULL, true);

         
        $params =array(
            'offset' =>$postedData['start'],
            'length' =>$postedData['length'],
            'search' =>$postedData['search']['value'],
            'sortings' =>isset($postedData['order'])? $postedData['order'] : array(),
            'sortings_columns' =>array(
                "0" =>"bc.id",
                "1" =>"bc.title"
                ),
            'advance_searches' =>isset($postedData['advance_searches'])? $postedData['advance_searches'] : array(),
        ); 
        
        $resultForDatatable = $this->bridal_model->get_bridal_list_datatable($params);
         //print_r($resultForDatatable);
        // return false;
        $data = array();
        $serial_no = $postedData['start'];
        foreach ($resultForDatatable['data'] as $allData) {
    
            $row = array();
            $row['0'] = ++$serial_no;
            $row['1'] = $allData->title;
            $row['2'] = $allData->short_desc;
            $img_url = str_replace('admin/', '', base_url());
            $row['3'] = "<img width='160px' src='".$img_url."assets/uploads/bridal/".$allData->img."'/>";
            $row['4'] = "<a href='".base_url()."bridal/edit_collection/".$allData->id."' class='btn btn-warning'><i class='fa fa-pencil'></i></a>&nbsp;<a href='".base_url()."bridal/delete_collection/".$allData->id."' class='btn btn-danger delete_btn'><i class='fa fa-trash-o'></i></a>.";
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


  








    //to add Package
    function add_collection()
    {
      //  $settings        = get_settings();
        //$header['title'] = $settings->title . " | Add Collection";
        if ($_POST) {
            $data = $_POST;
            $files = $_FILES;
            $upload_image=$this->_do_upload($files);
            if (array_key_exists('error', $upload_image)) {
                echo $upload_image['error'];
                $this->session->set_flashdata('message', array(
                    'message' => $upload_image['error'],
                    'class' => 'error'
                ));
//echo 'image error';exit();
                redirect(base_url() . 'bridal/add_collection');
                exit;
            }else{
                //print_r($upload_image);
                 $data['img']=$upload_image['upload_data']['file_name'];
            }
            $data['bridalcode']=$_SESSION['bridalcode'];
           // $data['img']=;
            //echo "<pre>";print_r($data);echo "</pre>";exit;
          //  $result = $this->bridal_model->add_collection($data);
          $result = $this->db->insert('bridal_collection', $data);
            if($result) {
                $this->session->set_flashdata('message', array(
                    'message' => 'Add Collection successfully',
                    'class' => 'success'
                ));
                echo 'success';
            } else {
                $this->session->set_flashdata('message', array(
                    'message' => 'Error',
                    'class' => 'error'
                ));
                echo 'failed';
            }
         //   redirect(base_url() . 'bridal');
        }
      //  $this->load->view('Templates/header', $header);
      //  $this->load->view('bridal/upload');
        //$this->load->view('Templates/footer');
        redirect(base_url() . 'bridal/upload');
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
        $this->load->library('upload');
        
        $config['upload_path']          = dirname($_SERVER["SCRIPT_FILENAME"]).'/assets/uploads/bridal/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 10000;
       // $config['max_width']            = 1024;
       // $config['max_height']           = 768;
        $config['encrypt_name'] = TRUE;
        echo $config['upload_path'] ;
       // exit();
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('bc_img'))
        {
         //   echo 'upload failed'; 
            return   $error = array('error' => $this->upload->display_errors());
        }
        else
        {
       //     echo 'uploaded';
               return $data = array('upload_data' => $this->upload->data());
        }
      //  exit();
    }
    // edit Package
    
    function edit_collection()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Edit Collection";
        $this->load->view('Templates/header', $header);
        $id               = $this->uri->segment(3);
        $template['data'] = $this->bridal_model->editget_collection_id($id);
        if (!empty($template['data'])) {
            
            if ($_POST) {
                $data   = $_POST;
                $files = $_FILES;
                if($files['bc_img']['name']==""){
                   // $data['bc_img']="";
                }else{
                    $upload_image=$this->_do_upload($files);
                    if (array_key_exists('error', $upload_image)) {
                        echo $upload_image['error'];
                        $this->session->set_flashdata('message', array(
                            'message' => $upload_image['error'],
                            'class' => 'error'
                        ));

                        redirect(base_url() . 'bridal/edit_collection/'.$id);
                        exit;
                    }else{
                        //print_r($upload_image);
                         $data['img']=$upload_image['upload_data']['file_name'];
                    }
                }
                $result = $this->bridal_model->edit_collection($data, $id);
                redirect(base_url() . 'bridal');
                
            }
        } else {
            $this->session->set_flashdata('message', array(
                'message' => "You don't have permission to access.",
                'class' => 'danger'
            ));
            redirect(base_url() . 'bridal');
        }
        $this->load->view('bridal/edit_collection', $template);
        $this->load->view('Templates/footer');
        
    }
       // delete package
    function delete_collection()
    {
        
        $id     = $this->uri->segment(3);
        $result = $this->bridal_model->delete_collection($id);
        $this->session->set_flashdata('message', array(
            'message' => 'Deleted Successfully',
            'class' => 'success'
        ));
        redirect(base_url() . 'bridal');
    }
    


    //to add Package
    function add_uploader()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Add Uploader";
        if ($_POST) {
            $data = $_POST;
          //  $files = $_FILES;
            //$upload_image=$this->_do_upload($files);
         /*   if (array_key_exists('error', $upload_image)) {
                echo $upload_image['error'];
                $this->session->set_flashdata('message', array(
                    'message' => $upload_image['error'],
                    'class' => 'error'
                ));

                redirect(base_url() . 'bridal/add_collection');
                exit;
            }else{
                //print_r($upload_image);
                 $data['img']=$upload_image['upload_data']['file_name'];
            }  */
            //echo "<pre>";print_r($data);echo "</pre>";exit;
            $result = $this->bridal_model->add_uploader($data);
            if ($result) {
                $this->session->set_flashdata('message', array(
                    'message' => 'Add uploader successfully',
                    'class' => 'success'
                ));
            } else {
                $this->session->set_flashdata('message', array(
                    'message' => 'Error',
                    'class' => 'error'
                ));
            }
            redirect(base_url() . 'bridal');
        }
        $this->load->view('Templates/header', $header);
        $this->load->view('bridal/add_uploader');
        $this->load->view('Templates/footer');
    }

}
?>