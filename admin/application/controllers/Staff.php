<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        date_default_timezone_set("Asia/Kolkata");
        
        $this->load->model('Staff_model');
        if (!$this->session->userdata('logged_in_admin')) {
            redirect(base_url());
        }
    }
    
    function view_staff()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | View Staff";
        $this->load->view('Templates/header', $header);
        $template['data']  = $this->Staff_model->view_staff();
        $template['data1'] = $this->Staff_model->view_adminstaff();
        $this->load->view('staff/view_staff', $template);
        $this->load->view('Templates/footer');
    }
    
    
    //to add Package
    function add_staff()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Add Staff";
        $this->load->view('Templates/header', $header);
        $this->load->view('staff/add_staff');
        $this->load->view('Templates/footer');
        
        if ($_POST) {
            
            $data = $_POST;
            
            
            /*    var_dump($data);
            die();*/
            
            // $data['created_by']=$sessid['created_user']; 
            $result = $this->Staff_model->add_staff($data);
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
            
            redirect(base_url() . 'Staff/view_staff');
            
        }
        //$this->load->view('template',$template);
        
    }
    // edit Package
    
    function edit_staff()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Edit Staff";
        $this->load->view('Templates/header', $header);
        
        
        
        $id                = $this->uri->segment(3);
        $template['data']  = $this->Staff_model->editget_staff_id($id);
        $template['data1'] = $this->Staff_model->editget_staff_role_id($id);
        $this->load->view('staff/edit_staff', $template);
        $this->load->view('Templates/footer');
        if (!empty($template['data'])) {
            
            if ($_POST) {
                $data = $_POST;
                
                // print_r($data);
                // die();
                
                $result = $this->Staff_model->edit_staff($data, $id);
                if ($result) {
                    $this->session->set_flashdata('message', array(
                        'message' => "Staff details updated successfully.",
                        'class' => 'success'
                    ));
                }
                redirect(base_url() . 'Staff/view_staff');
                
            }
        } else {
            $this->session->set_flashdata('message', array(
                'message' => "You don't have permission to access.",
                'class' => 'danger'
            ));
            redirect(base_url() . 'Staff/view_staff');
        }  
        
    }
    
    // delete package
    function delete_staff()
    {
        
        $data1  = array(
            "staff_status" => '0'
        );
        $id     = $this->uri->segment(3);
        $result = $this->Staff_model->delete_staff($id, $data1);
        $this->session->set_flashdata('message', array(
            'message' => 'Deleted Successfully',
            'class' => 'success'
        ));
        redirect(base_url() . 'Staff/view_staff');
    }
    function view_super_admin()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | View Super Admin";
        $this->load->view('Templates/header', $header);
        $template['data'] = $this->Staff_model->view_super_admin();
        //$template['data1'] = $this->Staff_model->view_adminstaff();
        $this->load->view('staff/view_super_admin', $template);
        $this->load->view('Templates/footer');
    }
    
    function add_super_admin()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Add Super Admin";
        $this->load->view('Templates/header', $header);
        $this->load->view('staff/add_super_admin');
        $this->load->view('Templates/footer');
        
        if ($_POST) {
            
            $data = $_POST;
            
            
            /*    var_dump($data);
            die();*/
            
            // $data['created_by']=$sessid['created_user']; 
            $result = $this->Staff_model->add_super_admin($data);
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
            
            redirect(base_url() . 'Staff/view_super_admin');
            
        }
    
        //$this->load->view('template',$template);
        
    }
    
    function edit_super_admin()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Edit Super Admin";
        $this->load->view('Templates/header', $header);
        
        
        
        $id               = $this->uri->segment(3);
        $template['data'] = $this->Staff_model->editget_admin_id($id);
        $this->load->view('staff/edit_super_admin', $template);
        $this->load->view('Templates/footer');
        if (!empty($template['data'])) {
            
            if ($_POST) {
                $data = $_POST;
                
                /*var_dump($data);
                die();
                */
                $result = $this->Staff_model->edit_super_admin($data, $id);
                redirect(base_url() . 'Staff/view_super_admin');
                
            }
        } else {
            $this->session->set_flashdata('message', array(
                'message' => "You don't have permission to access.",
                'class' => 'danger'
            ));
            redirect(base_url() . 'Staff/view_super_admin');
        }    
    }
    
    function delete_super_admin()
    {
        
        $data1  = array(
            "user_status" => '0'
        );
        $id     = $this->uri->segment(3);
        $result = $this->Staff_model->delete_super_admin($id, $data1);
        $this->session->set_flashdata('message', array(
            'message' => 'Deleted Successfully',
            'class' => 'success'
        ));
        redirect(base_url() . 'Staff/view_super_admin');
    }
}
?>