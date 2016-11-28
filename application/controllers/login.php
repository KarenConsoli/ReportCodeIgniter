<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();
class login extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        
        $this->load->model('login_model');
        $this->load->model('blogger_model','b_model',true);
        $this->load->model('welcome_model','w_model',true);
        $this->load->model('mailer_model','m_model',true);
        $user_id=$this->session->userdata('user_id');
        if ($user_id!=NULL) {
            redirect("blogger","refresh");
        }
        
    }

    public function sign_up() {
        $data = array();
        $data['admin_maincontent'] = $this->load->view('sign_up', '', true);
        $data['title'] = "sign up";
    
        $this->load->view('admin/admin_home', $data);
    }


    public function save_user() {
        // echo '<pre>';
        //print_r($_POST);
        //exit();
        $data = array();
        // $data['first_name']=$_POST['first_name'];
       /*---------start Pass Generator----- */
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
        /*---------end Pass Generator----- */
        
        $data['first_name'] = $this->input->post('first_name', true);
        $data['last_name'] = $this->input->post('last_name', true);
        $data['email_address'] = $this->input->post('email_address', true);
        $data['password'] =  implode($pass);
        $data['password'] = md5($data['password']);
        $data['address'] = $this->input->post('address', true);
        $data['mobile_no'] = $this->input->post('mobile_no', true);
        $data['gender'] = $this->input->post('gender', true);
        $data['city'] = $this->input->post('city', true);
        $data['country'] = $this->input->post('country', true);
        $data['zip_code'] = $this->input->post('zip_code', true);
        $result = $this->login_model->select_user_by_email_address($data['email_address']);
        /*echo '<pre>';
          print_r($result);
          exit();*/ 
        if ($result) {
            $sdata = array();
            $sdata['message'] = "user already registerd";
            $this->session->set_userdata($sdata);
            redirect("index.php/login/sign_up");
        } else {
            $user_id=$this->login_model->save_user_info($data);
          

            /*---------start Activation Email----- */
            $mdata=array();
            $mdata['user_id']=$user_id; 
            $mdata['from_address']="kbc_95@hotmail.com";
            $mdata['admin_full_name']="Metge";
            $mdata['to_address']=$data['email_address'];
            $mdata['subject']="Activation Email";
            $mdata['last_name']=$data['last_name'];
            $mdata['password']=implode($pass);
            $this->m_model->sendEmail($mdata,'activation_email');
            
            
           /*---------end Activation Email----- */ 

            redirect("index.php/login/save_successfully");
        }
    }

    public function save_successfully() {
        $data = array();
        $data['title'] = "sign_up";
        $data['admin_maincontent'] = '<div class="login-form"><h1>The Patient will Receive<br/> an Email!</h1></div>';
        
        $this->load->view('admin/admin_home', $data);
    }

    public function user_login() {
        $data = array();
        $data['maincontent'] = $this->load->view('login','', true);
        $data['title'] = "Login";
        
        $this->load->view('welcome_index', $data);
    }

public function reset_password($start=0)
{
    
        $user = $this->input->post('user_id',true);
        $password = $this->input->post('password',true);
        
        $result = $this->login_model->reset_password($user, $password);
       
        $data['result'] = $this->b_model->select_blogs_by_user_id($user);
        
        $data['maincontent'] = $this->load->view('activation_ok', $data, true);
        $data['title'] = "Activation OK";
        $this->load->view('home', $data);
    


}
    public function check_login() {
        $first_name = $this->input->post('first_name',true);
        $last_name=$this->input->post('last_name',true);
        $password = $this->input->post('password',true);
        $result = $this->login_model->check_login_info($first_name, $last_name, $password);
       /* echo '<pre>';
        print_r($result);
        exit();*/
        $sdata=array();
        if($result){
            if ($result->admin_status==1) {
                
            
            $sdata['full_name']=$result->first_name.' '.$result->last_name;
            $sdata['user_id']=$result->user_id; 
             $sdata['login_status']=TRUE;
             $this->session->set_userdata($sdata);
            redirect("blogger");
            }
 else {
     $sdata['exception']='<script> alert("User is Inactive")</script>;';
            $this->session->set_userdata($sdata);
            redirect("login/user_login");
}
    }else{
            
            $sdata['exception']="<script> alert(Name and Password is invalid</script>";
            $this->session->set_userdata($sdata);
            redirect("login/user_login");
        }
       
    }
  
}

?>
