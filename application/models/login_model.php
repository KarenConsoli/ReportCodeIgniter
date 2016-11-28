<?php

class Login_Model extends CI_Model {
    
        public $email_address;
        public $data;
        public $user_id;
        public $pass;
        public $first_name;
        public $last_name;
        public $password;


      public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
    //put your code here
    public function save_user_info($data) {
        $this->db->insert('tbl_user', $data);
        $user_id=$this->db->insert_id();
        return $user_id;
    }

    public function select_user_by_email_address($email_address) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email_address', $email_address);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
 public function reset_password($user_id, $pass){
     $this->db->set('password', md5($pass));
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user');
 }

    public function check_login_info($first_name, $last_name, $password) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('first_name', $first_name);
        $this->db->where('last_name', $last_name);
        $this->db->where('password', md5($password));
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }

   
}

?>