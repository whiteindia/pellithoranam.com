<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        date_default_timezone_set("Asia/Kolkata");
        
        $this->load->model('Reports_model');
        $this->load->model('Customer_model');
        if (!$this->session->userdata('logged_in_admin')) {
            redirect(base_url());
        }
    }
    function view_reports()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | View Report";
        $this->load->view('Templates/header', $header);
        $data['countries'] = $this->Reports_model->getTable("", "", "country");
        $data['religions'] = $this->Reports_model->getTable("", "", "religions");
        $data['members']   = $this->Customer_model->get_profile_details("");
        $this->load->view('reports/view_reports', $data);
        $this->load->view('Templates/footer');
    }

   
    function view_graph()
    {
        $data['graph']   = $this->Reports_model->get_graph_details();
        $settings        = get_settings();
        $header['title'] = $settings->title . " | View Graph";
        $this->load->view('Templates/header', $header);
        $this->load->view('reports/view_graph', $data);
        $this->load->view('Templates/footer');
    }
    function view_signup_graph()
    {
        $data['graph']   = $this->Reports_model->get_graph_details();
       // echo "<pre>";print_r($data['graph']);exit;
        $settings        = get_settings();
        $header['title'] = $settings->title . " | View Graph";
        $this->load->view('Templates/header', $header);
        $this->load->view('reports/view_signup_graph', $data);
        $this->load->view('Templates/footer');
    }

    function view_earning_graph()
    {
        $data['graph']   = $this->Reports_model->get_earn_graph_details();
       // echo "<pre>";print_r($data['graph']);exit;
        $settings        = get_settings();
        $header['title'] = $settings->title . " | View Graph";
        $this->load->view('Templates/header', $header);
        $this->load->view('reports/view_earning_graph', $data);
        $this->load->view('Templates/footer');
    }
    
    function load_graph()
    {
        $data = $this->Reports_model->get_graph_details();
        echo json_encode($data);
    }
    function view_result()
    {
        $postedData =$this->input->post(NULL);
        // for datatable
        if(array_key_exists("start", $postedData)){
            $this->_get_users_tbl();
            return false;
        }
        else{
            $settings        = get_settings();
            $header['title'] = $settings->title . " | View Report";
            $this->load->view('Templates/header', $header);
            // if ($_POST) {
            //     $data              = $_POST;
            //     $data['countries'] = $this->Reports_model->getTable("", "", "country");
            //     $data['religions'] = $this->Reports_model->getTable("", "", "religions");
            //     $data['members']   = $this->Reports_model->search($data);
    			
            //     //$data['packages'] = $this->Reports_model->get_packages();         
            // } else {
            //     $data['countries'] = $this->Reports_model->getTable("", "", "country");
            //     $data['religions'] = $this->Reports_model->getTable("", "", "religions");
            //     $data['members']   = $this->Customer_model->get_profile_details("");
            //     //$data['packages'] = $this->Reports_model->get_packages();
            // }
            $data['countries'] = $this->Reports_model->getTable("", "", "country");
            $data['religions'] = $this->Reports_model->getTable("", "", "religions");
            $this->load->view('reports/view_reports', $data);
            $this->load->view('Templates/footer');
            $this->load->view('reports/view_reports_js');
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

    private function _get_users_tbl()
    {
        $postedData =$this->input->post(NULL, true);

         
        $params =array(
            'offset' =>$postedData['start'],
            'length' =>$postedData['length'],
            'search' =>$postedData['search']['value'],
            'sortings' =>isset($postedData['order'])? $postedData['order'] : array(),
            'sortings_columns' =>array(
                "1" =>"prf.profile_name",
                "2" =>"prf.dob",
                "3" =>"prf.gender",
                "4" =>"prf.email",
                "5" =>"prf.phone",
                "6" =>"prf.matrimony_id",
                "8" =>"prf.profile_status",
                ),
            'advance_searches' =>isset($postedData['advance_searches'])? $postedData['advance_searches'] : array(),
        ); 
        
        $resultForDatatable = $this->Reports_model->get_users_list_datatable($params);
         //print_r($resultForDatatable);
        // return false;
        $data = array();
        $serial_no = $postedData['start'];
        foreach ($resultForDatatable['data'] as $allData) {
    
            $row = array();
            $row['0'] = ++$serial_no;
            $row['1'] = $allData->profile_name;
            $row['2'] = $allData->dob;
            $row['3'] = $allData->gender;
            $row['4'] = $allData->email;
            $row['5'] = $allData->phone;
            $row['6'] = base_url().'../profile/profile_details/'.$allData->matrimony_id;
            $row['7'] = '<a class="btn btn-sm btn-success" href="'.base_url().'../profile/profile_details/'.$allData->matrimony_id.'" target="_blank">View Profile</a>';
            switch ($allData->profile_status) {
                case '0':
                $profile_status ="Rejected";
                break;
                case '1':
                $profile_status ="Activated";
                break;
                case '2':
                $profile_status ="Deleted";
                break;
                case '3':
                $profile_status ="Banned";
                break;
                case '4':
                $profile_status ="Deactivated";
                break;
                
                default:
                 $profile_status ="Deactivated";
                break;
            }
            $row['8'] = $profile_status;
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


    function view_new_user()
    {
        $postedData =$this->input->post(NULL);
        // for datatable
        if(array_key_exists("start", $postedData)){
            $this->_get_new_users_tbl();
            return false;
        }
        else{
            $settings        = get_settings();
            $header['title'] = $settings->title . " | View Report";
            $this->load->view('Templates/header', $header);
           
            $data['countries'] = $this->Reports_model->getTable("", "", "country");
            $data['religions'] = $this->Reports_model->getTable("", "", "religions");
            $this->load->view('reports/view_new_user', $data);
            $this->load->view('Templates/footer');
            $this->load->view('reports/new_user_reports_js');
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

    private function _get_new_users_tbl()
    {
        $postedData =$this->input->post(NULL, true);

         
        $params =array(
            'offset' =>$postedData['start'],
            'length' =>$postedData['length'],
            'search' =>$postedData['search']['value'],
            'sortings' =>isset($postedData['order'])? $postedData['order'] : array(),
            'sortings_columns' =>array(
                "1" =>"prf.profile_name",
                "2" =>"prf.dob",
                "3" =>"prf.gender",
                "4" =>"prf.email",
                "5" =>"prf.phone",
                "6" =>"prf.matrimony_id",
                "9" =>"prf.profile_status",
                "8" =>"prf.created_date",
                ),
            'advance_searches' =>isset($postedData['advance_searches'])? $postedData['advance_searches'] : array(),
        ); 
        
        $resultForDatatable = $this->Reports_model->get_new_users_list_datatable($params);
         //print_r($resultForDatatable);
        // return false;
        $data = array();
        $serial_no = $postedData['start'];
        foreach ($resultForDatatable['data'] as $allData) {
    
            $row = array();
            $row['0'] = ++$serial_no;
            $row['1'] = $allData->profile_name;
            $row['2'] = $allData->dob;
            $row['3'] = $allData->gender;
            $row['4'] = $allData->email;
            $row['5'] = $allData->phone;
            $row['6'] = base_url().'../profile/profile_details/'.$allData->matrimony_id;
            $row['7'] = '<a class="btn btn-sm btn-success" href="'.base_url().'../profile/profile_details/'.$allData->matrimony_id.'" target="_blank">View Profile</a>';
            $row['8'] = $allData->created_date;
            switch ($allData->profile_status) {
                case '0':
                $profile_status ="Rejected";
                break;
                case '1':
                $profile_status ="Activated";
                break;
                case '2':
                $profile_status ="Deleted";
                break;
                case '3':
                $profile_status ="Banned";
                break;
                case '4':
                $profile_status ="Deactivated";
                break;
                
                default:
                 $profile_status ="Deactivated";
                break;
            }
            $row['9'] = $profile_status;
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





    function view_inactive_user()
    {
        $postedData =$this->input->post(NULL);
        // for datatable
        if(array_key_exists("start", $postedData)){
            $this->_get_inactive_users_tbl();
            return false;
        }
        else{
            $settings        = get_settings();
            $header['title'] = $settings->title . " | View Report";
            $this->load->view('Templates/header', $header);
           
            $data['countries'] = $this->Reports_model->getTable("", "", "country");
            $data['religions'] = $this->Reports_model->getTable("", "", "religions");
            $this->load->view('reports/view_inactive_user', $data);
            $this->load->view('Templates/footer');
            $this->load->view('reports/inactive_user_reports_js');
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

    private function _get_inactive_users_tbl()
    {
        $postedData =$this->input->post(NULL, true);

         
        $params =array(
            'offset' =>$postedData['start'],
            'length' =>$postedData['length'],
            'search' =>$postedData['search']['value'],
            'sortings' =>isset($postedData['order'])? $postedData['order'] : array(),
            'sortings_columns' =>array(
                "1" =>"prf.profile_name",
                "2" =>"prf.dob",
                "3" =>"prf.gender",
                "4" =>"prf.email",
                "5" =>"prf.phone",
                "6" =>"prf.matrimony_id",
                "11" =>"prf.profile_status",
                "10" =>"prf.created_date",
                ),
            'advance_searches' =>isset($postedData['advance_searches'])? $postedData['advance_searches'] : array(),
        ); 
        
        $resultForDatatable = $this->Reports_model->get_inactive_users_list_datatable($params);
         //print_r($resultForDatatable);
        // return false;
        $data = array();
        $serial_no = $postedData['start'];
        foreach ($resultForDatatable['data'] as $allData) {
    
            $row = array();
            $row['0'] = ++$serial_no;
            $row['1'] = $allData->profile_name;
            $row['2'] = $allData->dob;
            $row['3'] = $allData->gender;
            $row['4'] = $allData->email;
            $row['5'] = $allData->phone;
            $row['6'] = $allData->phone;
            $time = strtotime($allData->membership_expiry);
            $row['7'] = date("d-F-y", $time);
            $row['8'] = base_url().'../profile/profile_details/'.$allData->matrimony_id;
            $row['9'] = '<a class="btn btn-sm btn-success" href="'.base_url().'../profile/profile_details/'.$allData->matrimony_id.'" target="_blank">View Profile</a>';
            $row['10'] = $allData->created_date;
            switch ($allData->profile_status) {
                case '0':
                $profile_status ="Rejected";
                break;
                case '1':
                $profile_status ="Activated";
                break;
                case '2':
                $profile_status ="Deleted";
                break;
                case '3':
                $profile_status ="Banned";
                break;
                case '4':
                $profile_status ="Deactivated";
                break;
                
                default:
                 $profile_status ="Deactivated";
                break;
            }
            $row['11'] = $profile_status;
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

    function view_amount_report()
    {
        $postedData =$this->input->post(NULL);
        // for datatable
        if(array_key_exists("start", $postedData)){
            $this->_get_amount_report_tbl();
            return false;
        }
        else{
            $settings        = get_settings();
            $header['title'] = $settings->title . " | View Report";
            $this->load->view('Templates/header', $header);
           
            $data['countries'] = $this->Reports_model->getTable("", "", "country");
            $data['religions'] = $this->Reports_model->getTable("", "", "religions");
            $this->load->view('reports/view_amount_report', $data);
            $this->load->view('Templates/footer');
            $this->load->view('reports/view_amount_reports_js');
        }
    }

    function view_mobile()
    {
        ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
        $postedData =$this->input->post(NULL);
        // for datatable
        if(array_key_exists("start", $postedData)){
            $this->_get_amount_report_tbl();
            return false;
        }
        else{
            $settings        = get_settings();
            $header['title'] = $settings->title . " | View Report";
            $this->load->view('Templates/header', $header);
           
         //   $data['countries'] = $this->Reports_model->getTable("", "", "country");
            $data['mobilecount'] = $this->Reports_model->view_mobile();
            $this->load->view('reports/view_mobile', $data);
            $this->load->view('Templates/footer');
           // $this->load->view('reports/view_amount_reports_js');
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

    private function _get_amount_report_tbl()
    {
        $postedData =$this->input->post(NULL, true);

         
        $params =array(
            'offset' =>$postedData['start'],
            'length' =>$postedData['length'],
            'search' =>$postedData['search']['value'],
            'sortings' =>isset($postedData['order'])? $postedData['order'] : array(),
            'sortings_columns' =>array(
                "1" =>"prf.profile_name",
                "2" =>"payments.package_id",
                "3" =>"payments.purchase_amount",
                "4" =>"payments.purchase_date",
                ),
            'advance_searches' =>isset($postedData['advance_searches'])? $postedData['advance_searches'] : array(),
        ); 
        
        $resultForDatatable = $this->Reports_model->get_amount_report_datatable($params);
         //print_r($resultForDatatable);
        // return false;
        $data = array();
        $serial_no = $postedData['start'];
        foreach ($resultForDatatable['data'] as $allData) {
    
            $row = array();
            $row['0'] = ++$serial_no;
            $row['1'] = $allData->profile_name;
            $row['2'] = $allData->package_name;
            $row['3'] = $allData->purchase_amount;
            $time = strtotime($allData->purchase_date);
            $row['4'] = date("d-F, y", $time);
            $time2 = strtotime($allData->membership_expiry);
            $row['5'] = date("d-F, y", $time2);
            $row['6'] = $allData->payment_method;
            
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
    function add_packages()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Add Packages";
        $this->load->view('Templates/header', $header);
        $this->load->view('Packages/add_packages');
        $this->load->view('Templates/footer');
        if ($_POST) {
            $data = $_POST;
            // $data['created_by']=$sessid['created_user']; 
            $result = $this->Packages_model->add_packages($data);
            if ($result) {
                $this->session->set_flashdata('message', array(
                    'message' => 'Add Package successfully',
                    'class' => 'success'
                ));
            } else {
                $this->session->set_flashdata('message', array(
                    'message' => 'Error',
                    'class' => 'error'
                ));
            }
            redirect(base_url() . 'Packages/view_packages');
        }
        //$this->load->view('template',$template);
    }
    // edit Package
    
    function edit_packages()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Edit Members";
        $this->load->view('Templates/header', $header);
        $id               = $this->uri->segment(3);
        $template['data'] = $this->Packages_model->editget_package_id($id);
        $this->load->view('Packages/edit_packages', $template);
        $this->load->view('Templates/footer');
        if (!empty($template['data'])) {
            
            if ($_POST) {
                $data   = $_POST;
                $result = $this->Packages_model->edit_package($data, $id);
                redirect(base_url() . 'Packages/view_packages');
                
            }
        } else {
            $this->session->set_flashdata('message', array(
                'message' => "You don't have permission to access.",
                'class' => 'danger'
            ));
            redirect(base_url() . 'Packages/view_packages');
        }
    }
       // delete package
    function delete_package()
    {
        $data1  = array(
            "package_status" => '0'
        );
        $id     = $this->uri->segment(3);
        $result = $this->Packages_model->delete_package($id, $data1);
        $this->session->set_flashdata('message', array(
            'message' => 'Deleted Successfully',
            'class' => 'success'
        ));
        redirect(base_url() . 'Packages/view_packages');
    }
    
    // manage packages
    function manage_packages()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Manage Packages";
        $this->load->view('Templates/header', $header);
        $template['result'] = $this->Packages_model->view_packages();
        $this->load->view('Packages/manage_packages', $template);
        $this->load->view('Templates/footer');
        if ($_POST) {
            $data   = $_POST;
            $result = $this->Packages_model->manage_package($data);
            // redirect(base_url().'Packages/view_packages');
            
            if ($result) {
                $this->session->set_flashdata('message', array(
                    'message' => 'Success',
                    'class' => 'success'
                ));
            } else {
                $this->session->set_flashdata('message', array(
                    'message' => 'Error',
                    'class' => 'error'
                ));
            }
            
            redirect(base_url() . 'Packages/view_packages');
        }
    }
    
    function view_manage_packages()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Manage Packages";
        $this->load->view('Templates/header', $header);
        $template['data'] = $this->Packages_model->view_manage_packages();
        $this->load->view('Packages/view_manage_packages', $template);
        $this->load->view('Templates/footer');
    }
    
    // delete package
    function delete_manage_package()
    {
        
        $data1  = array(
            "package_manage_status" => '0'
        );
        $id     = $this->uri->segment(3);
        $result = $this->Packages_model->delete_manage_package($id, $data1);
        $this->session->set_flashdata('message', array(
            'message' => 'Deleted Successfully',
            'class' => 'success'
        ));
        redirect(base_url() . 'Packages/view_manage_packages');
    }
    
    
    function edit_manage_packages()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " |  Edit Packages";
        $this->load->view('Templates/header', $header);
        $id                 = $this->uri->segment(3);
        $template['data']   = $this->Packages_model->editget_package_id($id);
        $template['result'] = $this->Packages_model->view_manage_packages();
        $this->load->view('Packages/edit_manage_packages', $template);
        $this->load->view('Templates/footer');
        // if(!empty($template['data'])){
        
        if ($_POST) {
            $data   = $_POST;
            $result = $this->Packages_model->edit_manage_package($data, $id);
            redirect(base_url() . 'Packages/view_manage_packages');
            
        }
        // }
        /*else{
        $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));    
        redirect(base_url().'Packages/view_manage_packages');
        }*/
        
    }
    public function get_drop_data()
    {
        $sel_val = $this->input->post('sel_val');
        $sel_typ = $this->input->post('sel_typ');
        $where   = array();
        $tbl     = "";
        if ($sel_typ == "country") {
            $tbl      = "cities";
            $fld_name = "City";
            $where[]  = "country_id = '" . $sel_val . "'";
        } else if ($sel_typ == "state") {
            $tbl      = "cities";
            $fld_name = "City";
            $where[]  = "state_id = '" . $sel_val . "'";
        } else {
            return false;
        }
        
        $drop_vals = $this->Reports_model->getTable("", $where, $tbl);
        $html = "";
        $html .= "<option value=''>Select " . $fld_name . "</option>";
        if ($fld_name == "State") {
            foreach ($drop_vals as $drop_val) {
                $html .= "<option value='" . $drop_val->state_id . "'>" . $drop_val->state_name . "</option>";
            }
        } else {
            foreach ($drop_vals as $drop_val) {
                $html .= "<option value='" . $drop_val->city_id . "'>" . $drop_val->city_name . "</option>";
            }
        }
        echo $html;
    }
    public function getCaste() {
        $html = "";
        $sel_rlg = $this->input->post('rlgn_sel');
        $castes = $this->Reports_model->getCastes($sel_rlg);
        $html.= "<option value=''>- Select Caste -</option>";
        if(!empty($castes)) {
            foreach($castes as $caste) {
                $html.= "<option value='$caste->caste_id'>".$caste->caste_name."</option>";
            }
        }
        echo $html;
    }
}
?>