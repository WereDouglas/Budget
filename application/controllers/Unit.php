<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

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
         $departmentID = $this->uri->segment(4);
         $departmentName = urldecode( $this->uri->segment(3));
         if($departmentID==""){ $departmentID=$this->session->userdata('departmentID'); }
         if($departmentName==""){$departmentName=$this->session->userdata('departmentName'); }
   
       
          $unitdata = array('departmentID' =>  $departmentID, 'departmentName' =>  $departmentName);
          $this->session->set_userdata($unitdata);       
         
          $data['units'] = array();
    
        $query = $this->Md->query("SELECT * FROM unit WHERE departmentID='".$departmentID."'");

        if ($query) { $data['units'] = $query;}       
         $data['departmentName'] = $departmentName;
         $data['departmentID'] = $departmentID;
        $this->load->view('view-unit',$data);
    }

    public function create() {
        $this->load->helper(array('form', 'url'));
    
        $departmentID = $this->input->post('departmentID');
        $departmentName = $this->input->post('departmentName');
        $name = $this->input->post('name');
        $details = $this->input->post('details');        
        $created = date('Y-m-d');
    
        $unit = array('departmentID'=>$departmentID, 'name' => $name, 'details' => $details,'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($unit, 'unit');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

            redirect('unit/', 'refresh');
            return;
        } else {
          
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
             redirect('unit/', 'refresh');
            return;
        }

       
         redirect('unit/', 'refresh');
        return;
    }
    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $name = $this->input->post('name');       
        $details = $this->input->post('details');
      
         $unit = array( 'name' => $name, 'details' => $details,'created' => date('Y-m-d H:i:s'));
        $this->Md->update($id, $unit, 'unit');
       

    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
                                    
        
        $id = $this->uri->segment(5);    
         
        $query = $this->Md->delete($id, 'unit');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
            redirect('unit/', 'refresh');
        } else {
            $msg = '<span style="color:red">action failed</span>';
           $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               action failed	</strong>									
						</div>');
              redirect('unit/', 'refresh');
            
        }
    }
  
  
}
