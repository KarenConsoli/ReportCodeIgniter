<?php
session_start();

class Super_Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('super_admin_model','sa_model',true);
        $this->load->model('report_model', 'r_model', true);
        $this->load->model('relation_model', 'rel_model', true);
        $this->load->model('test_model', 't_model', true);
        $this->load->model('result_model', 'res_model', true);
        $this->load->model('blogger_model','b_model',true);
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
 public function show_user(){
         $data=array();
        $data['user']=$this->sa_model->select_all_user();
        $data['admin_maincontent']=  $this->load->view('admin/show_user',$data,true);
        $this->load->view('admin/admin_home',$data);
    }
    public function index() {
        $data=array();
        
        $data['admin_maincontent']=  $this->load->view('admin/welcome','',true);
        $this->load->view('admin/admin_home',$data);
    }
 public function add_new(){
        $data=array();
        $data['user']=$this->sa_model->select_all_inactive_user();
        $data['admin_maincontent']=  $this->load->view('admin/add_new',$data,true);
        $this->load->view('admin/admin_home',$data);
    }
    public function add_new_user($user_id){
        
        $this->sa_model->active_admin_status($user_id);
         $data=array();
        $data['user']=$this->sa_model->select_all_inactive_user();
        $data['admin_maincontent']=  $this->load->view('admin/add_new',$data,true);
        $this->load->view('admin/admin_home',$data);
    }
    
     
   
    
    public function logout(){
        $this->session->unset_userdata('admin_id');
        
        
        
        redirect("admin_login/index","refresh");
        
    }
      public function all_reports() {
        
        $data['result'] = $this->r_model->select_all_reports();
        $data['admin_maincontent'] = $this->load->view('reports/all_reports', $data, true);
        $data['title'] = "All Reports";
        $this->load->view('admin/admin_home', $data);
    }
    
     public function block_user($user_id){
        
        $this->sa_model->block_admin_status($user_id);
         $data=array();
        $data['user']=$this->sa_model->select_all_inactive_user();
        redirect('super_admin/show_user');
    }
     
    

        


    
        
}

//put your code here
?>