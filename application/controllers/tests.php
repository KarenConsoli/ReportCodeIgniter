<?php
session_start();

class Tests extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('super_admin_model','sa_model',true);
        $this->load->model('test_model', 't_model', true);
        $this->load->model('relation_model', 'rel_model', true);
        $admin_id=  $this->session->userdata('admin_id');
       
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
        $data=array();
        
        $data['admin_maincontent']=  $this->load->view('admin/welcome','',true);
        $this->load->view('admin/admin_home',$data);
    }

    /******************* Start Test******************/

    public function my_tests() {
        $user_id = $this->input->post('user_id', true);
        $data['result'] = $this->t_model->select_all_tests();
        $data['admin_maincontent'] = $this->load->view('tests/my_tests', $data, true);
        $data['title'] = "MY TESTS";
        $this->load->view('admin/admin_home', $data);
    }

    public function delete_test($test_id) {
        $user_id = $this->session->userdata('user_id');
        $this->t_model->delete_test($test_id);
        $this->rel_model->delete_relation_by_test($test_id);
        redirect("tests/my_tests");
    }

    public function edit_test($test_id) {
        $data = array();
        $data['result'] = $this->t_model->select_test_by_test_id($test_id);
        $data['check_editor'] = $this->data;
        $data['all_user'] = $this->sa_model->select_all_user();
        $data['admin_maincontent'] = $this->load->view('tests/edit_test', $data, true);
        $data['title'] = "Test Blog";
        $this->load->view('admin/admin_home', $data);
    }

    public function update_test() {
        $test_id = $this->input->post('test_id', true);
        $data['test_title'] = $this->input->post('test_title', true);
        $data['result_id']=null;
        $data['user_id'] = $this->input->post('user_id', true);
        $data['test_desc'] = $this->input->post('test_desc', true);
        $data['status'] = $this->input->post('status', true);
        
        //echo '<pre>';
        // print_r($blog_id);
        // exit();
        $this->t_model->update_test_info($data, $test_id);

        redirect("tests/my_tests");
    }

    public function add_test() {
        $data = array();
        $data['check_editor'] = $this->data;
        $data['all_user'] = $this->sa_model->select_all_user();

        $data['admin_maincontent'] = $this->load->view('tests/add_test', $data, true);
        $data['title'] = 'add_test';
        $this->load->view('admin/admin_home', $data);
    }

    public function save_test() {

        
        $data = array();
        
        $data['test_title'] = $this->input->post('test_title', true);
        $data['user_id'] = $this->input->post('user_id', true);
        $data['test_desc'] = $this->input->post('test_desc', true);
        $data['status'] = $this->input->post('status', true);
        $data['created_date_time'] = date('Y-m-d H:m:s');
    
         $this->t_model->save_test_info($data);
            //redirect('upload_file/view');
        
       
       redirect("tests/my_tests");
    }


      /******************* End Test******************/

}

//put your code here
?>