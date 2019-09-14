<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index_management extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        date_default_timezone_set("Asia/Kolkata");
        
        $this->load->model('Management_model');
        if (!$this->session->userdata('logged_in_admin')) {
            redirect(base_url());
        }
    }
    function view_content()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | View Content";
        $this->load->view('Templates/header', $header);
        $template['data'] = $this->Management_model->view_content();
        $this->load->view('Index_management/view_content', $template);
        $this->load->view('Templates/footer');
    }
    function add_content()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Add Content";
        $this->load->view('Templates/header', $header);
        $this->load->view('Index_management/add_content');
        $this->load->view('Templates/footer');
        if ($_POST) {
            $data = $_POST;
            // $data['created_by']=$sessid['created_user']; 
            $result = $this->Management_model->add_content($data);
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
            redirect(base_url() . 'Index_management/view_content');
        }
        //$this->load->view('template',$template);
    }
    function edit_content()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Edit Content";
        $this->load->view('Templates/header', $header);
        $id               = $this->uri->segment(3);
        $template['data'] = $this->Management_model->editget_content_id($id);
        $this->load->view('Index_management/edit_content', $template);
        $this->load->view('Templates/footer');
        if (!empty($template['data'])) {
            
            if ($_POST) {
                $data = $_POST;
                
                /*    var_dump($data);
                die();*/
                
                $result = $this->Management_model->edit_content($data, $id);
                redirect(base_url() . 'Index_management/view_content');
            }
        } else {
            $this->session->set_flashdata('message', array(
                'message' => "You don't have permission to access.",
                'class' => 'danger'
            ));
            redirect(base_url() . 'Index_management/view_content');
        }
    }
    function delete_content()
    {
        
        
        $id     = $this->uri->segment(3);
        $result = $this->Management_model->delete_content($id);
        $this->session->set_flashdata('message', array(
            'message' => 'Deleted Successfully',
            'class' => 'success'
        ));
        redirect(base_url() . 'Index_management/view_content');
    }
    function view_banner()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | View Banner";
        $this->load->view('Templates/header', $header);
        $template['data'] = $this->Management_model->view_banner();
        $this->load->view('Index_management/view_banner', $template);
        $this->load->view('Templates/footer');
    }
    function add_banner()
    {
        if ($_FILES) {
            $data = $_POST;
            $config = set_upload_options('assets/uploads/banner');
            $this->load->library('upload');
            $new_name            = time() . "_" . $_FILES["banner_image"]['name'];
            /*$config['min_width'] = '1920'; 
            $config['min_height'] = '905';*/
            $config['file_name'] = $new_name;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('banner_image')) {
                /*echo $this->upload->display_errors();
                die();*/
                
                $this->session->set_flashdata('message', array(
                    'message' => "Display Picture : " . $this->upload->display_errors(),
                    'title' => 'Error !',
                    'class' => 'danger'
                ));
                
            } else {
                
                /* */
                
                $upload_data          = $this->upload->data();
                $data['banner_image'] = $config['upload_path'] . "/" . $upload_data['file_name'];
                
                // $data['created_by']=$sessid['created_user'];
                $result = $this->Management_model->add_banner($data);
                
                if ($result) {
                    /* Set success message */
                    $this->session->set_flashdata('message', array(
                        'message' => 'Banner Successfully Added',
                        'class' => 'success'
                    ));
                } else {
                    /* Set error message */
                    $this->session->set_flashdata('message', array(
                        'message' => 'Error',
                        'class' => 'error'
                    ));
                }
            }
            redirect(base_url() . 'Index_management/view_banner');
        }
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Add Banner";
        $this->load->view('Templates/header', $header);
        $this->load->view('Index_management/add_banner');
        $this->load->view('Templates/footer');

    }
    
    function edit_banner()
    {
        $id               = $this->uri->segment(3);
        $template['data'] = $this->Management_model->editget_banner_id($id);
        if ($_FILES) {
            $data = $_POST;
            
            
            
            //upload image              
            
            $config = set_upload_options('assets/uploads/banner');
            $this->load->library('upload');
            
            $new_name             = time() . "_" . $_FILES["banner_image"]['name'];
            $config['min_width']  = '1920';
            $config['min_height'] = '905';
            $config['file_name']  = $new_name;
            
            
            $this->upload->initialize($config);
            
            if (!$this->upload->do_upload('banner_image')) {
                
                $this->session->set_flashdata('message', array(
                    'message' => "Display Picture : " . $this->upload->display_errors(),
                    'title' => 'Error !',
                    'class' => 'danger'
                ));
                
            } else {
                
                $upload_data          = $this->upload->data();
                $data['banner_image'] = $config['upload_path'] . "/" . $upload_data['file_name'];
            }
            
            
            $result = $this->Management_model->edit_banner($data, $id);
            redirect(base_url() . 'Index_management/view_banner');
        }
        //  }
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Edit Banner";
        $this->load->view('Templates/header', $header);
        $this->load->view('Index_management/edit_banner', $template);
        $this->load->view('Templates/footer');
        
    }
    function delete_banner()
    {
        
        
        $id     = $this->uri->segment(3);
        $result = $this->Management_model->delete_banner($id);
        $this->session->set_flashdata('message', array(
            'message' => 'Deleted Successfully',
            'class' => 'success'
        ));
        redirect(base_url() . 'Index_management/view_banner');
    }
    
    function view_footer()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | View Footer Image";
        $this->load->view('Templates/header', $header);
        $template['data'] = $this->Management_model->view_footer();
        $this->load->view('Index_management/view_footer', $template);
        $this->load->view('Templates/footer');
    }
    function add_footer()
    {
        if ($_FILES) {
            $data = $_POST;
            $config = set_upload_options('assets/uploads/footer_image');
            $this->load->library('upload');
            $new_name            = time() . "_" . $_FILES["footer_image"]['name'];
            $config['file_name'] = $new_name;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('footer_image')) {
                /*echo $this->upload->display_errors();
                die();*/
                
                $this->session->set_flashdata('message', array(
                    'message' => "Display Picture : " . $this->upload->display_errors(),
                    'title' => 'Error !',
                    'class' => 'danger'
                ));
                
            } else {
                
                /* */
                
                $upload_data          = $this->upload->data();
                $data['footer_image'] = $config['upload_path'] . "/" . $upload_data['file_name'];
                
                // $data['created_by']=$sessid['created_user'];
                $result = $this->Management_model->add_banner($data);
                
                if ($result) {
                    /* Set success message */
                    $this->session->set_flashdata('message', array(
                        'message' => 'Success',
                        'class' => 'success'
                    ));
                } else {
                    /* Set error message */
                    $this->session->set_flashdata('message', array(
                        'message' => 'Error',
                        'class' => 'error'
                    ));
                }
            }
            redirect(base_url() . 'Index_management/view_footer');
        }
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Add Footer Image";
        $this->load->view('Templates/header', $header);
        $this->load->view('Index_management/add_footer');
        $this->load->view('Templates/footer');
    }
    function edit_footer()
    {
        $id               = $this->uri->segment(3);
        $template['data'] = $this->Management_model->editget_footer_id($id);
        if ($_FILES) {
            $data = $_POST;
            //upload image              
            
            $config = set_upload_options('assets/uploads/banner');
            $new_name            = time() . "_" . $_FILES["footer_image"]['name'];
            $config['file_name'] = $new_name;
            
            $this->upload->initialize($config);
            
            if (!$this->upload->do_upload('footer_image')) {
                
                $this->session->set_flashdata('message', array(
                    'message' => "Display Picture : " . $this->upload->display_errors(),
                    'title' => 'Error !',
                    'class' => 'danger'
                ));
                
            } else {
                
                $upload_data          = $this->upload->data();
                $data['footer_image'] = $config['upload_path'] . "/" . $upload_data['file_name'];
            }
            
            
            $result = $this->Management_model->edit_footer($data, $id);
            redirect(base_url() . 'Index_management/view_footer');
        }
        //  }
        
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Edit Footer Image";
        $this->load->view('Templates/header', $header);
        $this->load->view('Index_management/edit_footer', $template);
        $this->load->view('Templates/footer');
        
    }
    function delete_footer()
    {
        $id     = $this->uri->segment(3);
        $result = $this->Management_model->delete_content($id);
        $this->session->set_flashdata('message', array(
            'message' => 'Deleted Successfully',
            'class' => 'success'
        ));
        redirect(base_url() . 'Index_management/view_footer');
    }
    
    public function view_success_story()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Success Story";
        $this->load->view('Templates/header', $header);
        $template['data'] = $this->Management_model->view_success_story();
        $this->load->view('Index_management/view_success_story', $template);
        $this->load->view('Templates/footer');
    }
    public function success_story_approve()
    {
        $data1  = array(
            "success_approval" => '1'
        );
        $id     = $this->uri->segment(3);
        $result = $this->Management_model->success_story_approve($id, $data1);
        $this->session->set_flashdata('message', array(
            'message' => 'Approved Successfully',
            'class' => 'success'
        ));
        redirect(base_url() . 'Index_management/view_success_story');
    }
    public function success_story_reject()
    {
        $data1  = array(
            "success_approval" => '0'
        );
        $id     = $this->uri->segment(3);
        $result = $this->Management_model->success_story_reject($id, $data1);
        $this->session->set_flashdata('message', array(
            'message' => 'Rejected Successfully',
            'class' => 'error'
        ));
        redirect(base_url() . 'Index_management/view_success_story');
    }
    public function view_other_source()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Other Source";
        $this->load->view('Templates/header', $header);
        $template['data'] = $this->Management_model->view_other_source();
        $this->load->view('Index_management/view_other_source', $template);
        $this->load->view('Templates/footer');
    }
    public function delete_member()
    {
       if($this->session->userdata('logged_in_admin')) {
		  $user_id = $this->uri->segment(3);		   
		  $result = $this->Management_model->delete_deletedmember($user_id);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Index_management/view_other_source');
		} else { redirect(base_url()); }
    }
}
?>