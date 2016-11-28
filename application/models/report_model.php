<?php

class Report_Model extends CI_Model {

        public $data;
        public $report_id;
        public $test;
        public $result;


      public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }


    /*-----------------------------reports---------------*/

     public function select_report_count(){
                $this->db->select('report_id');
        $this->db->from('tbl_reports');
        $this->db->where('status', 0);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;

    }

  public function save_report_info($data) {
        $this->db->insert('tbl_reports',$data);
        $report_id=$this->db->insert_id();
        return $report_id;
    }
     public function select_all_reports($num=10,$start=0) {
        $this->db->select('*');
        $this->db->from('tbl_reports');
        $this->db->where('status', 0);
        $this->db->order_by('created_date_time','desc');
        $this->db->limit($num,$start);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_reports_by_user_id($user_id,$num=10,$start=0) {
        $this->db->select('*');
        $this->db->from('tbl_reports');
        $this->db->join('tbl_relation', 'tbl_relation.report_id = tbl_reports.report_id');
        $this->db->where('tbl_relation.user_id',$user_id);
        $this->db->limit($num,$start);
        $query_result=  $this->db->get();
        $result=$query_result->result();
        return $result;
    }

     public function select_last_report($num=1,$start=0) {
        $this->db->select('*');
        $this->db->from('tbl_reports');
        $this->db->where('status', 0);
        $this->db->order_by('created_date_time','asc');
        $this->db->limit($num,$start);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
     public function delete_report($report_id){
        $this->db->where('report_id',$report_id);
        $this->db->delete('tbl_reports');

        $this->db->where('report_id',$report_id);
        $this->db->delete('tbl_relation');
    }
   
    public function select_report_by_report_id($report_id){
        $this->db->select('*');
        $this->db->from('tbl_reports');
        $this->db->where('report_id',$report_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
   
     public function update_report_info($data,$report_id){
        $this->db->where('report_id',$report_id);
        $this->db->update('tbl_reports',$data);
    }
/*-----------------------------reports---------------*/

}

?>
