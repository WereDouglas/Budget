<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subline extends CI_Controller {

    function __construct() {

        parent::__construct();
       // error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
         $this->load->helper(array('form', 'url'));
         $reportingID = $this->uri->segment(4);
         $reportingName = urldecode( $this->uri->segment(3));
         if($reportingID==""){ $reportingID=$this->session->userdata('reportingID'); }
         if($reportingName==""){$reportingName=$this->session->userdata('reportingName'); }   
       
          $reportingdata = array('reportingID' =>  $reportingID, 'reportingName' =>  $reportingName);
          $this->session->set_userdata($reportingdata);    
         
          $data['sublines'] = array();
    
        $query = $this->Md->query("SELECT * FROM subline WHERE reportingID='".$reportingID."'");

        if ($query) { $data['sublines'] = $query;}       
         $data['reportingName'] = $reportingName;
         $data['reportingID'] = $reportingID;
        $this->load->view('view-subline',$data);
    }

    public function create() {
        
        $this->load->helper(array('form', 'url'));    
        $reportingID = $this->input->post('reportingID');
        $reportingName = $this->input->post('reportingName');
        $name = $this->input->post('name');
        $description = $this->input->post('description');           
        $created = date('Y-m-d');
    
        $subline = array('reportingID'=>$reportingID, 'name' => $name,'description' => $description,'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($subline, 'subline');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

            redirect('subline/', 'refresh');
            return;
        } else {
          
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
             redirect('subline/', 'refresh');
            return;
        }

       
           redirect('subline/', 'refresh');
        return;
    }
    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $name = $this->input->post('name'); 
        $description = $this->input->post('description');       
      
        $subline = array( 'description' => $description,'name' => $name,'created' => date('Y-m-d H:i:s'));
        $this->Md->update($id, $subline, 'subline');
       

    }
      public function where()
{
        $line=$this->input->post('name');
       //$category="REVENUE";
         $id = $this->Md->query_single("SELECT * FROM reporting WHERE name='".$line."'");
                
        $table='subline';
        $where=array('reportingID' => $id);
       $data['name']=$this->Md->get_where_data($table,$where);
        $sc=json_encode($data['name']);
        echo $sc;
}

    public function delete() {
        $this->load->helper(array('form', 'url'));                                    
        
        $id = $this->uri->segment(5);
        $query = $this->Md->delete($id, 'subline');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
            redirect('subline/', 'refresh');
        } else {
            $msg = '<span style="color:red">action failed</span>';
           $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               action failed	</strong>									
						</div>');
            redirect('subline/', 'refresh');
            
        }
    }
  
  
}
