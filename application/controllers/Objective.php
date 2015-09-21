<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Objective extends CI_Controller {

    function __construct() {

        parent::__construct();
       // error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
          $data['objectives'] = array();
    
          $query = $this->Md->query("SELECT * FROM objective");

        if ($query) { $data['objectives'] = $query;}       
    
        $this->load->view('view-objective',$data);
    }

    public function create() {
        
        $this->load->helper(array('form', 'url'));    
        $code = $this->input->post('code');
        $title = $this->input->post('title');        
        $created = date('Y-m-d');
    
        $objective = array( 'code' => $code, 'title' => $title,'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($objective, 'objective');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

              redirect('objective/', 'refresh');
            return;
        } else {
           
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
               redirect('objective/', 'refresh');
            return;
        }

     
         redirect('objective/', 'refresh');
        return;
    }
    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $code = $this->input->post('code');       
        $title = $this->input->post('title');
      
         $objective = array( 'code' => $code, 'title' => $title,'created' => date('Y-m-d H:i:s'));
        $this->Md->update($id, $objective, 'objective');
       

    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(3);           
        $query = $this->Md->delete($id, 'objective');

        if ($this->db->affected_rows() > 0) {
             $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
            redirect('objective', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
             redirect('objective', 'refresh');
            
        }
    }
  
  
}
