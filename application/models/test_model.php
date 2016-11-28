<?php

class Test_Model extends CI_Model {
        public $data;
        public $test_id;
        public $user_id;
        public $result_id;


      public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
/*-----------------------------tests---------------*/
  public function save_test_info($data) {
        $this->db->insert('tbl_tests',$data);
    }

     public function delete_test($test_id){
        $this->db->where('test_id',$test_id);
       
        $this->db->delete('tbl_tests');
    }
   
      public function select_all_tests($num=10,$start=0) {
        $this->db->select('*');
        $this->db->from('tbl_tests');
        $this->db->where('status', 0);
        $this->db->order_by('created_date_time','desc');
        $this->db->limit($num,$start);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_all_tests_null($num=10,$start=0) {
        $this->db->select('*');
        $this->db->from('tbl_tests');
        $this->db->where('result_id', null);
        $this->db->order_by('created_date_time','desc');
        $this->db->limit($num,$start);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

     public function select_test_by_test_id($test_id){
        $this->db->select('*');
        $this->db->from('tbl_tests');
        $this->db->where('test_id',$test_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
     public function select_test_by_user_id($user_id){
        $this->db->select('*');
        $this->db->from('tbl_tests');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    
     public function update_test_info($data,$test_id){
       
        $this->db->where('test_id',$test_id);
        $this->db->update('tbl_tests',$data);

    }

     public function update_test_result($test_id,$result_id){
        $this->db->set('result_id',$result_id);
        $this->db->where('test_id',$test_id);
        $this->db->update('tbl_tests');
    }
/*-----------------------------tests---------------*/



}?>