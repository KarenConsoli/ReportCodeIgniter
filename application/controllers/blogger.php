<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Blogger extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('blogger_model', 'b_model', true);
        
        $this->load->model('welcome_model', 'w_model', true);
        $this->load->model('report_model', 'r_model', true);
        $this->load->library('upload');
		
        $user_id = $this->session->userdata('user_id');
       
        $this->load->helper('ckeditor');
        $this->data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ck_editor',
            'path' => 'scripts/ckeditor',
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "500px", //Setting a custom width
                'height' => '300px', //Setting a custom height
            ),
        );
    }

    public function index() {
        $data = array();
       
        $data['maincontent'] = $this->load->view('welcome', '', true);
        $data['title'] = $this->session->userdata('full_name');

        $this->load->view('welcome_index', $data);
    }
 
    public function logout() {

        $this->session->unset_userdata('user_id');
        session_destroy();

        // $this->session->unset_userdata('login_status');
        //$this->session->unset_userdata('full_name');
        
        
        redirect("login/user_login", "refresh");
    }

    public function profile() {
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $data['result'] = $this->b_model->select_user_by_user_id($user_id);
        
        $data['maincontent'] = $this->load->view('view_profile', $data, true);
        $data['title'] = $this->session->userdata('full_name');
        $this->load->view('home', $data);
    }

    public function edit_profile($user_id) {

        $data = array();
        $data['result'] = $this->b_model->select_user_by_user_id($user_id);
       
        $data['user']=$user_id;
        $data['admin_maincontent'] = $this->load->view('edit_profile', $data, true);
        $data['title'] = $data['result']->first_name . ' ' . $data['result']->last_name;
        $this->load->view('admin/admin_home', $data);
    }

    public function update_user() {
        $data = array();
        $user_id = $this->input->post('user_id');
        $data['first_name'] = $this->input->post('first_name', true);
        $data['last_name'] = $this->input->post('last_name', true);
        $data['email_address'] = $this->input->post('email_address', true);
        /* $data['password'] = $this->input->post('password', true);
          $data['password'] = md5($data['password']); */
        
        $this->b_model->update_user($data, $user_id);
        redirect("super_admin/show_user");
    }

      

}

?>
