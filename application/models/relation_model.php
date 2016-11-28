
<?php

class Relation_Model extends CI_Model {


        public $data;
        public $report_id;
        public $test;
        public $result;


      public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

/*-----------------------------relation---------------*/
 public function save_relation_info($data) {
        $this->db->insert('tbl_relation',$data);
    }
      public function delete_relation_by_report($report_id){
        $this->db->where('report_id',$report_id);
        $this->db->delete('tbl_relation');

    }
        public function delete_relation_by_test($test){
        $this->db->where('test_id',$test);
        $this->db->delete('tbl_relation');

    }
       public function delete_relation_by_result($result){
        $this->db->where('result_id',$result);
        $this->db->delete('tbl_relation');

    }
      public function select_relation_by_report_id($report_id){
       $this->db->select('*');
        $this->db->from('tbl_relation');
        $this->db->where('report_id', $report_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

/*-----------------------------relation---------------*/



}?>