<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        date_default_timezone_set("Asia/Kolkata");
        
        $this->load->model('pages_model');
        if (!$this->session->userdata('logged_in_admin')) {
            redirect(base_url());
        }
    }
    function index(){
        $postedData =$this->input->post(NULL);
        // for datatable
        if(array_key_exists("start", $postedData)){
            $this->_get_pages_tbl();
            return false;
        }
        else{
            $settings        = get_settings();
            $header['title'] = $settings->title . " | View Pages";
            $this->load->view('Templates/header', $header);
            //$data['countries'] = $this->Reports_model->getTable("", "", "country");
            //$data['religions'] = $this->Reports_model->getTable("", "", "religions");
            $data = array();
            $this->load->view('pages/index', $data);
            $this->load->view('Templates/footer');
            $this->load->view('pages/index_js.php');
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

    private function _get_pages_tbl()
    {
        $postedData =$this->input->post(NULL, true);

         
        $params =array(
            'offset' =>$postedData['start'],
            'length' =>$postedData['length'],
            'search' =>$postedData['search']['value'],
            'sortings' =>isset($postedData['order'])? $postedData['order'] : array(),
            'sortings_columns' =>array(
                "0" =>"pg.id",
                "1" =>"pg.title"
                ),
            'advance_searches' =>isset($postedData['advance_searches'])? $postedData['advance_searches'] : array(),
        ); 
        
        $resultForDatatable = $this->pages_model->get_page_list_datatable($params);
         //print_r($resultForDatatable);
        // return false;
        $data = array();
        $serial_no = $postedData['start'];
        foreach ($resultForDatatable['data'] as $allData) {
    
            $row = array();
            $row['0'] = ++$serial_no;
            $row['1'] = $allData->title;
            $row['2'] = $allData->slug;
            $row['3'] = "<a href='".base_url()."pages/edit_page/".$allData->id."' class='btn btn-warning'><i class='fa fa-pencil'></i></a>&nbsp;<a href='".base_url()."pages/delete_page/".$allData->id."' class='btn btn-danger delete_btn'><i class='fa fa-trash-o'></i></a>.";
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
    function add_page()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Add Page";
        if ($_POST) {
            $data = $_POST;

            //echo "<pre>";print_r($data);echo "</pre>";exit;
            $result = $this->pages_model->add_page($data);
            if ($result) {
                $this->session->set_flashdata('message', array(
                    'message' => 'Add Page successfully',
                    'class' => 'success'
                ));
            } else {
                $this->session->set_flashdata('message', array(
                    'message' => 'Error',
                    'class' => 'error'
                ));
            }
            redirect(base_url() . 'pages');
        }
        $this->load->view('Templates/header', $header);
        $this->load->view('pages/add_page');
        $this->load->view('Templates/footer');
        $this->load->view('pages/add_page_js');
    }

    
    /**
    * This Function is Checking SEO name for Restaurant 
    *
    * @param array $_POST 
    * @return Result True/False
    * @author Tj Thouhid
    * @version 2017-01-21
    */


    function check_slug(){
        $slug=$this->input->post('pslug');
        
        
        $datas=$this->pages_model->get_pages_slug($slug);
        if($datas){
            echo "true";
        }else{
            echo "false";
        }
        
    }

    function check_slug_edit(){
        $slug=$this->input->post('pslug');
        $id=$this->input->post('pid');
        
        
        $datas=$this->pages_model->get_pages_slug_edit($slug,$id);
        if($datas){
            echo "true";
        }else{
            echo "false";
        }
        
    }
    // edit Package
    
    function edit_page()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Edit Page";
        $this->load->view('Templates/header', $header);
        $id               = $this->uri->segment(3);
        $template['data'] = $this->pages_model->editget_page_id($id);
        if (!empty($template['data'])) {
            
            if ($_POST) {
                $data   = $_POST;
                //echo "<pre>";print_r($data);echo "</pre>";exit;
                $result = $this->pages_model->edit_page($data, $id);
                $this->session->set_flashdata('message', array(
                    'message' => 'Edit Page successfully',
                    'class' => 'success'
                ));
                redirect(base_url() . 'pages');
                
            }
        } else {
            $this->session->set_flashdata('message', array(
                'message' => "You don't have permission to access.",
                'class' => 'danger'
            ));
            redirect(base_url() . 'pages');
        }
        $this->load->view('pages/edit_page', $template);
        $this->load->view('Templates/footer');
        $this->load->view('pages/add_page_js');
        
    }
       // delete package
    function delete_page()
    {
        
        $id     = $this->uri->segment(3);
        $result = $this->pages_model->delete_pages($id);
        $this->session->set_flashdata('message', array(
            'message' => 'Deleted Successfully',
            'class' => 'success'
        ));
        redirect(base_url() . 'pages');
    }
    

}
?>