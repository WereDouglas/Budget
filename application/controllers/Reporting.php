<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller {

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
         $categoryID = $this->uri->segment(4);
         $categoryName = urldecode( $this->uri->segment(3));
         if($categoryID==""){ $categoryID=$this->session->userdata('categoryID'); }
         if($categoryName==""){$categoryName=$this->session->userdata('categoryName'); }   
       
          $categorydata = array('categoryID' =>  $categoryID, 'categoryName' =>  $categoryName);
          $this->session->set_userdata($categorydata);       
         
          $data['reportings'] = array();
    
        $query = $this->Md->query("SELECT * FROM reporting WHERE categoryID='".$categoryID."'");

        if ($query) { $data['reportings'] = $query;}       
         $data['categoryName'] = $categoryName;
         $data['categoryID'] = $categoryID;
        $this->load->view('view-report',$data);
    }

    public function create() {
        
        $this->load->helper(array('form', 'url'));    
        $categoryID = $this->input->post('categoryID');
        $categoryName = $this->input->post('categoryName');
        $name = $this->input->post('name');
           
        $created = date('Y-m-d');
    
        $report = array('categoryID'=>$categoryID, 'name' => $name,'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($report, 'reporting');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

            redirect('reporting/', 'refresh');
            return;
        } else {
          
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
             redirect('reporting/', 'refresh');
            return;
        }

       
           redirect('reporting/', 'refresh');
        return;
    }
    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $name = $this->input->post('values');       
       
      
         $reporting = array( 'name' => $name,'created' => date('Y-m-d H:i:s'));
        $this->Md->update($id, $reporting, 'reporting');
       

    }

    public function delete() {
        $this->load->helper(array('form', 'url'));                                    
        
        $id = $this->uri->segment(5);
        $query = $this->Md->delete($id, 'reporting');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
            redirect('reporting/', 'refresh');
        } else {
            $msg = '<span style="color:red">action failed</span>';
           $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               action failed	</strong>									
						</div>');
            redirect('reporting/', 'refresh');
            
        }
    }
  
  
}
