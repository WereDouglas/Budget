<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Budget extends CI_Controller {

    function __construct() {

        parent::__construct();
       // error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
      $data['departments'] = array();
        $data['units'] = array();
      $data['categories'] = array();
      $data['objectives'] = array();
       $data['inits'] = array();
        $data['reports'] = array();
         $data['subs'] = array();
         $data['accounts'] = array();
      $data['rates'] = array();
       $query = $this->Md->query("SELECT * FROM department");
       if ($query) { $data['departments'] = $query;}
        $query = $this->Md->query("SELECT * FROM unit");
       if ($query) { $data['units'] = $query;}
       $query = $this->Md->query("SELECT * FROM category");
       if ($query) { $data['categories'] = $query;}
       $query = $this->Md->query("SELECT * FROM objective");
       if ($query) { $data['objectives'] = $query;}
       $query = $this->Md->query("SELECT * FROM rate");
       if ($query) { $data['rates'] = $query;}
        $query = $this->Md->query("SELECT * FROM initiative");
       if ($query) { $data['inits'] = $query;}
        $query = $this->Md->query("SELECT * FROM reporting");
       if ($query) { $data['reports'] = $query;}
        $query = $this->Md->query("SELECT * FROM subline");
       if ($query) { $data['subs'] = $query;}
        $query = $this->Md->query("SELECT * FROM account");
       if ($query) { $data['accounts'] = $query;}
                
        $this->load->view('add-budget',$data);
    }
    
      public function tabular() {
      $data['departments'] = array();
        $data['units'] = array();
      $data['categories'] = array();
      $data['objectives'] = array();
       $data['inits'] = array();
        $data['reports'] = array();
         $data['subs'] = array();
         $data['accounts'] = array();
      $data['rates'] = array();
       $query = $this->Md->query("SELECT * FROM department");
       if ($query) { $data['departments'] = $query;}
        $query = $this->Md->query("SELECT * FROM unit");
       if ($query) { $data['units'] = $query;}
       $query = $this->Md->query("SELECT * FROM category");
       if ($query) { $data['categories'] = $query;}
       $query = $this->Md->query("SELECT * FROM objective");
       if ($query) { $data['objectives'] = $query;}
       $query = $this->Md->query("SELECT * FROM rate");
       if ($query) { $data['rates'] = $query;}
        $query = $this->Md->query("SELECT * FROM initiative");
       if ($query) { $data['inits'] = $query;}
        $query = $this->Md->query("SELECT * FROM reporting");
       if ($query) { $data['reports'] = $query;}
        $query = $this->Md->query("SELECT * FROM subline");
       if ($query) { $data['subs'] = $query;}
        $query = $this->Md->query("SELECT * FROM account");
       if ($query) { $data['accounts'] = $query;}
                
        $this->load->view('table-budget',$data);
    }
     public function listings() {
          $data['departments'] = array();
    
          $query = $this->Md->query("SELECT * FROM department");

        if ($query) { $data['departments'] = $query;}
        $this->load->view('view-budget',$data);
    }

    public function create() {
        $this->load->helper(array('form', 'url'));
    
        $name = $this->input->post('name');
        $details = $this->input->post('details');        
        $created = date('Y-m-d');
    
        $department = array( 'name' => $name, 'details' => $details,'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($department, 'department');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

              redirect('department/', 'refresh');
            return;
        } else {
            unlink($data['full_path']);
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
               redirect('department/', 'refresh');
            return;
        }

        @unlink($_FILES[$file_element_name]);
         redirect('department/', 'refresh');
        return;
    }
    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $name = $this->input->post('name');       
        $details = $this->input->post('details');
      
         $department = array( 'name' => $name, 'details' => $details,'created' => date('Y-m-d H:i:s'));
        $this->Md->update($id, $department, 'department');
       

    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(3);           
        $query = $this->Md->delete($id, 'department');

        if ($this->db->affected_rows() > 0) {
             $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
            redirect('department', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
             redirect('department', 'refresh');
            
        }
    }
  
  
}
