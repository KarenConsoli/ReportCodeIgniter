<?php

class Super_Admin_Model extends CI_Model {
        public $admin_email_address;
        public $admin_password;
        public $user_id;


      public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
    public function check_admin_login_info($admin_email_address, $admin_password) {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email_address', $admin_email_address);
        $this->db->where('admin_password', md5($admin_password));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

      public function select_user_by_user_id($user_id){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_all_inactive_user(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('admin_status',0);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
        public function select_all_user(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('admin_status',1);
       
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    public function active_admin_status($user_id){
            $this->db->set('admin_status',1);
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user');
    }



    public function block_admin_status($user_id){
        $this->db->set('admin_status',0);
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_user');
    }
    //put your code here
}

?>
