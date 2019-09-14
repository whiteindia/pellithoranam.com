<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Packages extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        
        $this->load->model('Packages_model');
        if (!$this->session->userdata('logged_in_admin')) {
            redirect(base_url());
        }
    }
    function view_packages()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | View Packages";
        $this->load->view('Templates/header', $header);
        $template['data'] = $this->Packages_model->view_packages();
        $this->load->view('Packages/view_packages', $template);
        $this->load->view('Templates/footer');
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
                    'message' => 'Package name already exist',
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
        $header['title'] = $settings->title . " | Edit Packages";
        $this->load->view('Templates/header', $header);
        $id               = $this->uri->segment(3);
        $template['data'] = $this->Packages_model->editget_package_id($id);
        $this->load->view('Packages/edit_packages', $template);
        $this->load->view('Templates/footer');
        if (!empty($template['data'])) {
            
            if ($_POST) {
                $data = $_POST;
                
                /*    var_dump($data);
                die();*/
                
                $result = $this->Packages_model->edit_package($data, $id);
                if ($result) {
                    $this->session->set_flashdata('message', array(
                        'message' => "Packages updated successfully.",
                        'class' => 'success'
                    ));
					 redirect(base_url() . 'Packages/view_packages');
                }
				else
				{
					$this->session->set_flashdata('message', array(
                        'message' => "Package name already exist.",
                        'class' => 'Error'
                    ));
                redirect(base_url() . 'Packages/view_packages');
				}
                
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
            $data = $_POST;
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
        $header['title'] = $settings->title . " | View Packages";
        $this->load->view('Templates/header', $header);
        $template['data'] = $this->Packages_model->view_manage_packages();
        $this->load->view('Packages/view_manage_packages', $template);
        $this->load->view('Templates/footer');
    }
    
    // delete package
    function delete_manage_package()
    {
        $data1  = array(
            "package_manage_status" => '0',
            "package_status" => '0',
        );
        $id     = $this->uri->segment(3);
        $result = $this->Packages_model->delete_manage_package($id, $data1);
        $this->session->set_flashdata('message', array(
            'message' => 'Deleted Successfully',
            'class' => 'success'
        ));
        //exit;
        redirect(base_url() . 'Packages/view_manage_packages');
    }
    function edit_manage_packages()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Edit Packages";
        $this->load->view('Templates/header', $header);
        
        $id                 = $this->uri->segment(3);
        $template['data']   = $this->Packages_model->editget_package_id($id);
        $template['result'] = $this->Packages_model->view_manage_packages();
        $this->load->view('Packages/edit_manage_packages', $template);
        $this->load->view('Templates/footer');
        // if(!empty($template['data'])){
        
        if ($_POST) {
            $data = $_POST;
            $result = $this->Packages_model->edit_manage_package($data, $id);
            if($result){
				  $this->session->set_flashdata('message',array('message' =>  "Package details updated successfully.",'class' => 'success'));
			 }
            redirect(base_url() . 'Packages/view_manage_packages');
        }
        // }
        /*else{
        $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));    
        redirect(base_url().'Packages/view_manage_packages');
        }*/
    }
}
?>