<?php
session_start();

class Results extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('super_admin_model','sa_model',true);
        $this->load->model('test_model', 't_model', true);
        $this->load->model('result_model', 'res_model', true);
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

/*******************Start Result******************/
          
    public function my_results() {
        $user_id = $this->input->post('test_id', true);
        $data['result'] = $this->res_model->select_all_results();
        $data['admin_maincontent'] = $this->load->view('results/my_results', $data, true);
        $data['title'] = "MY Results";
        $this->load->view('admin/admin_home', $data);
    }

    public function delete_result($result_id) {
        $user_id = $this->session->userdata('user_id');
        $this->res_model->delete_result($result_id);
        $this->rel_model->delete_relation_by_result($result_id);
        redirect("results/my_results");
    }

    public function edit_result($result_id) {
        $data = array();
        $data['result']= $this->res_model->select_result_by_result_id($result_id);
        $var=0;
        $user=0;
        foreach ($data['result'] as $key) {
            $var++;
            if($var==3)
            {
                $user= $key;

            }
            
        }
        $data['user']=$this->sa_model->select_user_by_user_id($user);


        $data['check_editor'] = $this->data;
        $data['all_test'] = $this->t_model->select_test_by_user_id($data['user'][0]->user_id);
        $data['all_result'] = $this->res_model->select_test_by_user_id($data['user'][0]->user_id);
        $data['admin_maincontent'] = $this->load->view('results/edit_result', $data, true);
        $data['title'] = "Result";
        $this->load->view('admin/admin_home', $data);
    }

    public function update_result() {
        $test_id = $this->input->post('result_id', true);
        $data['result_title'] = $this->input->post('result_title', true);
        $data['user_id'] = $this->input->post('user_id', true);
        $data['test_id'] = $this->input->post('test_id', true);
        $data['result_desc'] = $this->input->post('result_desc', true);
        $data['status'] = $this->input->post('status', true);
        //echo '<pre>';
        // print_r($blog_id);
        // exit();
        $this->res_model->update_result_info($data, $test_id);
        redirect("results/my_results");
    }

  public function add_result() {
        $data=array();
        $data['user_id'] = $this->input->post('user_id', true);

        
        $data['check_editor'] = $this->data;
        $user=$this->sa_model->select_user_by_user_id($data['user_id']);
        $data['user'] =$user[0];
        $data['all_test'] = $this->t_model->select_test_by_user_id($data['user_id']);
        $data['admin_maincontent'] = $this->load->view('results/add_result', $data, true);
        $data['title'] = 'add_result';
        $this->load->view('admin/admin_home', $data);
    }

    public function add_user() {
        
        $data = array();
       
        $data['all_user'] = $this->sa_model->select_all_user();

        $data['admin_maincontent'] = $this->load->view('results/select_user', $data, true);
        $data['title'] = 'add_report';
        $this->load->view('admin/admin_home', $data);
    }


    public function save_result() {

        
        $data = array();
        
        $data['result_title'] = $this->input->post('result_title', true);
        $data['user_id'] = $this->input->post('user_id', true);
        $data['test_id'] = $this->input->post('test_id', true);
        $data['result_desc'] = $this->input->post('result_desc', true);
        $data['status'] = $this->input->post('status', true);
        $data['created_date_time'] = date('Y-m-d H:m:s');
        $this->res_model->save_result_info($data);
        $result= $this->res_model->select_last_result();
    
         $this->t_model->update_test_result($data['test_id'], $result[0]->result_id);

            //redirect('upload_file/view');
        
       
       redirect("results/my_results");
    }

          /*******************End Result******************/


}

//put your code here
?>