<?php

class Result_Model extends CI_Model {
        public $data;
        public $test_id;
        public $result_id;
        public $user_id;


      public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }


/*-----------------------------results---------------*/

public function select_last_result($num=1,$start=0) {
        $this->db->select('*');
        $this->db->from('tbl_results');
        $this->db->where('status', 0);
        $this->db->order_by('created_date_time','desc');
        $this->db->limit($num,$start);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

  public function save_result_info($data) {
        $this->db->insert('tbl_results',$data);
    }
     public function select_all_results($num=10,$start=0) {
        $this->db->select('*');
        $this->db->from('tbl_results');
        $this->db->where('status', 0);
        $this->db->order_by('created_date_time','desc');
        $this->db->limit($num,$start);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
     public function delete_result($result_id){
        $this->db->where('result_id',$result_id);
        $this->db->delete('tbl_results');
    }

    public function select_result_by_result_id($result_id){
        $this->db->select('*');
        $this->db->from('tbl_results');
        $this->db->where('result_id',$result_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    public function select_result_by_test_id($test_id){
       
        $this->db->select('*');
        $this->db->from('tbl_results');
        $this->db->where('test_id',$test_id);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

 public function select_test_by_user_id($user_id){
        $this->db->select('*');
        $this->db->from('tbl_results');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

     public function update_result_info($data,$result_id){
        $this->db->where('result_id',$result_id);
        $this->db->update('tbl_results',$data);
    }
   
/*-----------------------------results---------------*/



}?>