<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    function __construct() {

        parent::__construct();
       // error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
          $data['categories'] = array();
    
          $query = $this->Md->query("SELECT * FROM category");

        if ($query) { $data['categories'] = $query;}       
    
        $this->load->view('view-category',$data);
    }

    public function create() {
        
        $this->load->helper(array('form', 'url'));    
        $name = $this->input->post('name');
        $variation = $this->input->post('variation');        
        $created = date('Y-m-d');
    
        $category = array( 'name' => $name, 'variation' => $variation,'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($category, 'category');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

              redirect('category/', 'refresh');
            return;
        } else {
           
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
               redirect('category/', 'refresh');
            return;
        }

     
         redirect('category/', 'refresh');
        return;
    }
    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $name = $this->input->post('name');       
        $varation = $this->input->post('variation');
      
        $category = array( 'name' => $name, 'variation' => $variation,'created' => date('Y-m-d H:i:s'));
         $this->Md->update($id, $category, 'category');
       

    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(3);           
        $query = $this->Md->delete($id, 'category');

        if ($this->db->affected_rows() > 0) {
             $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
            redirect('category', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
             redirect('category', 'refresh');
            
        }
    }
  
  
}
