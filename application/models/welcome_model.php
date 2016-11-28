<?php


class welcome_model extends CI_Model {
        public $data;
        public $user_id;
        public $pass;


      public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
    public function save_comments_info($data) {
        $this->db->insert('tbl_comments',$data);
    }
 public function reset_password($user_id, $pass){
     $this->db->set('password',$password);
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user');
 }
    public function active_user_account_status($user_id){
        $this->db->set('activation_status',1);
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user');
        $this->db->set('admin_status',1);
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user');
       
    }
   
   
}?>
