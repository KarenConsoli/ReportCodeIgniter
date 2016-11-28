<?php
session_start();

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('super_admin_model','sa_model',true);
        $this->load->model('report_model', 'r_model', true);
        $this->load->model('relation_model', 'rel_model', true);
        $this->load->model('test_model', 't_model', true);
        $this->load->model('result_model', 'res_model', true);
        $this->load->model('blogger_model','b_model',true);
        $this->load->model('mailer_model','m_model',true);
        $admin_id=  $this->session->userdata('admin_id');
       
        $this->load->helper('ckeditor');
       
    }

    public function index() {
        $data=array();
        
        $data['admin_maincontent']=  $this->load->view('admin/welcome','',true);
        $this->load->view('admin/admin_home',$data);
    }

/******************* Start report******************/

    public function my_reports() {
        
        $data['result'] = $this->r_model->select_all_reports();
        $data['admin_maincontent'] = $this->load->view('reports/my_reports', $data, true);
        $data['title'] = "MY Reports";
        $this->load->view('admin/admin_home', $data);
    }
    

    public function delete_report($report_id) {
        $this->r_model->delete_report($report_id);
        $this->rel_model->delete_relation_by_report($report_id);
        redirect("reports/my_reports");
    }

    public function edit_report($report_id) {

        $var=0;
        $user=0;
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
        $data = array();


        $data['result'] = $this->rel_model->select_relation_by_report_id($report_id);

      
        foreach ($data['result'][0] as $key) {
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
        $data['admin_maincontent'] = $this->load->view('reports/edit_report', $data, true);
        $data['title'] = "Report";
        $this->load->view('admin/admin_home', $data);
    }

    public function update_report() {
         $data = array();
        $data['report_id'] = $this->input->post('report_id', true);
        $data['report_title'] = $this->input->post('report_title', true);
        $data['report_desc'] = $this->input->post('report_desc', true);
        $data['status'] = $this->input->post('status', true);
        $data['created_date_time'] = date('Y-m-d H:m:s');
        $this->r_model->update_report_info($data, $data['report_id']);

        $this->rel_model->delete_relation($data['report_id']);

        $relation = array();
        $relation['report_id']=$data['report_id'];
        $relation['user_id'] = $this->input->post('user_id', true);
        $test['test_id'] = $this->input->post('test_id', true);
        $result['result_id']= $this->input->post('result_id', true);
        $num=0;
       
        $this->r_model-> select_last_report();

        foreach ($test['test_id'] as $test) {
            $relation['test_id'] =$test;
       
            $restest=$this->res_model-> select_result_by_test_id($test);
           foreach ($result['result_id'] as $key => $value) {
            foreach ($restest as $res => $val) {
                                            if(($val->result_id)==$value)
                                            {
                                                $relation['result_id'] = $value;
                                                $this->rel_model->save_relation_info($relation);
                                                $num=1;
                                            }
                                     }
               
                          }

            if($num==0){
            $relation['result_id'] = null;
            $this->rel_model->save_relation_info($relation);

            }
            
          $num=0;
        }
         redirect("reports/my_reports");
        //echo '<pre>';
        // print_r($blog_id);
        // exit();
        
       
    }

    public function add_report() {
        $data=array();
        $data['user_id'] = $this->input->post('user_id', true);
       
        
   
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
        
        $data['check_editor'] = $this->data;
        $user=$this->sa_model->select_user_by_user_id($data['user_id']);
        $data['user'] =$user[0];
        $data['all_test'] = $this->t_model->select_test_by_user_id($data['user_id']);
        $data['all_result'] = $this->res_model->select_test_by_user_id($data['user_id']);


        $data['admin_maincontent'] = $this->load->view('reports/add_report', $data, true);
        $data['title'] = 'add_test';
        $this->load->view('admin/admin_home', $data);
    }

    public function add_user() {
        
        $data = array();
       
        $data['all_user'] = $this->sa_model->select_all_user();

        $data['admin_maincontent'] = $this->load->view('reports/select_user', $data, true);
        $data['title'] = 'add_report';
        $this->load->view('admin/admin_home', $data);
    }



    public function save_report() {

        
        $data = array();
        
        $data['report_title'] = $this->input->post('report_title', true);
        $data['report_desc'] = $this->input->post('report_desc', true);
        $data['status'] = $this->input->post('status', true);
        $data['created_date_time'] = date('Y-m-d H:m:s');
      
        $relation = array();
        
        $relation['report_id']=$this->r_model->save_report_info($data);
        var_dump($relation['report_id']);
        $relation['user_id'] = $this->input->post('user_id', true);
        $test['test_id'] = $this->input->post('test_id', true);
        $result['result_id']= $this->input->post('result_id', true);
        $num=0;
       
       

        foreach ($test['test_id'] as $test) {
            $relation['test_id'] =$test;
       
            $restest=$this->res_model-> select_result_by_test_id($test);
           foreach ($result['result_id'] as $key => $value) {
            foreach ($restest as $res => $val) {
                                            if(($val->result_id)==$value)
                                            {
                                                $relation['result_id'] = $value;
                                                $this->rel_model->save_relation_info($relation);
                                                $num=1;
                                            }
                                     }
               
                          }

            if($num==0){
            $relation['result_id'] = null;
            $this->rel_model->save_relation_info($relation);

            }
            
          $num=0;
        }
         redirect("reports/my_reports");
       
        }
    
        
    
         
            //redirect('upload_file/view');
        
       
     public function single_report($report_id=null){
        if ($report_id==NULL) {
            $report_id=$this->session->userdata('report_id');
            
        }
        $data=array();
        $data['result']=  $this->r_model->select_report_by_report_id($report_id);
        $relation=array();
        $test=array();
        $result=array();
        $relation=  $this->rel_model->select_relation_by_report_id($report_id);
        foreach ($relation as $key => $value) {
           $user=$this->b_model->select_user_by_user_id($value->user_id);
           array_push($test,$this->t_model->select_test_by_test_id($value->test_id));
           array_push($result,$this->res_model->select_result_by_result_id($value->result_id));
        }

        $data['tests']= $test;
        
        $data['results']= $result;
        
       
      $data['maincontent']=  $this->load->view('reports/single_report',$data,true);
        
        $data['title']="Report";
        $data['archives']="h";
        $this->load->view('welcome_logged',$data);
        
    }

      public function export_pdf(){

        $report_title = $this->input->post('report_title',true);
        $report_desc = $this->input->post('report_desc',true);
        $report_id = $this->input->post('report_id',true);
        $report_date = $this->input->post('report_date',true);
        $btn= $this->input->post('btn',true);
        $mail= $this->input->post('mail',true);
      
        $relation=array();
        $test=array();
        $result=array();
        $relation=  $this->rel_model->select_relation_by_report_id($report_id);
        foreach ($relation as $key => $value) {
           $user=$this->b_model->select_user_by_user_id($value->user_id);
           array_push($test,$this->t_model->select_test_by_test_id($value->test_id));
           array_push($result,$this->res_model->select_result_by_result_id($value->result_id));
        }

        


        $this->load->library('Pdf');

                // create new PDF document

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     
        // set document information
       

        
        $pdf->SetAuthor($user->first_name." ".$user->last_name);
        $pdf->SetTitle($report_title);
        
        // set default header data
        $user_name=$user->last_name . " " . $user->first_name  ;
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,"Report:".$report_title, "Patient: ". $user->first_name. " " .$user->last_name ,  array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();
        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
      
        // set JPEG quality
        

        // Image method signature:
        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

        
       
        // set text shadow effect
       // $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

        $html ='<h2 style="text-align: center;font-size: 24px;"><strong><a href="http://localhost/blog_s/reports/single_report/'.$report_id .'">'.$report_title.'</a></strong></h2>
        <div class="story">
        <p style="text-align: justify;font-size: 14px;"><p>
        </p>'.$report_desc.'</p>';

        foreach ($test as $atests) {
            $val=0;
                
            
           $html .='<p>.......................................................................................................................................................</p><h4>Test :'.$atests->test_title.'</h4>';
           $html .='<p>'.$atests->test_desc.'</p>';
               

            
            foreach ($result as $aresult) {
             
                    if (empty($aresult)===true){
                        if($val==0)
                        {$html .='<h4>Without Result</h4>';}
                
                    
                $val++;
                                                }
                else{
                if ($atests->test_id==$aresult->test_id){

                    $html .='<h4>Result :'.$aresult->result_title.'</h4>';
            
                    $html .='<p>'.$aresult->result_desc.'</p>';
                    break;
                }


                }


                    }
                

                 }

        $html .='<p style="text-align: right"><strong>'.$user->first_name." ". $user->last_name.'</strong>
        <br/>'.$user->email_address.' <br/>'.$report_date.'</p></hr></div>';
        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);




        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
      
        ob_clean();
        if($btn=='Download PDF'){
            
            $pdf->Output('Reports.pdf', 'I');
            $pdf->Output('Reports.pdf', 'FI');

        }
        else
        {

            $pdf->Output('Reports'.$report_id.'.pdf', 'F');
            $dir= base_url().'Reports'.$report_id.'.pdf';
            
            
            /*---------start PDF Email----- */
            
            $mdata=array();
            $mdata['from_address']="kbc_95@hotmail.com";
            $mdata['admin_full_name']="Metge";
            $mdata['to_address']=$mail;
            $mdata['subject']="Metge Pdf Report";
            $mdata['last_name']=$user->last_name;
           
            $this->m_model->sendPDF($mdata,$dir);

            
            
           /*---------end PDF Email----- */ 
     redirect('reports/single_report/'.$report_id);
        }
        
    }


      /******************* End report******************/



}

//put your code here
?>