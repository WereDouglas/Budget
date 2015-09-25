<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rate extends CI_Controller {

    function __construct() {

        parent::__construct();
       // error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
          $data['rates'] = array();
    
          $query = $this->Md->query("SELECT * FROM rate");

        if ($query) { $data['rates'] = $query;}       
    
        $this->load->view('view-rate',$data);
    }

    public function create() {
        $this->load->helper(array('form', 'url'));
    
        $currency = $this->input->post('currency');
        $rate = $this->input->post('rate');        
        $created = date('Y-m-d');
    
        $rated = array( 'currency' => $currency, 'rate' => $rate,'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($rated, 'rate');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

              redirect('rate/', 'refresh');
            return;
        } else {
         
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
               redirect('rate/', 'refresh');
            return;
        }        
         redirect('rate/', 'refresh');
        return;
    }
    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $currency = $this->input->post('currency');       
        $rate = $this->input->post('rate');
      
         $rated = array( 'currency' => $currency, 'rate' => $rate,'created' => date('Y-m-d H:i:s'));
        $this->Md->update($id, $rated, 'rate');
       

    }
    public function where()
{
        $currency=$this->input->post('name'); 
        $currency="USD"; 
                
        $table='rate';
        $where=array('currency' => $currency);
       $data['name']=$this->Md->get_where_data($table,$where);
        $sc=json_encode($data['name']);
        echo $sc;
}

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(3);           
        $query = $this->Md->delete($id, 'rate');

        if ($this->db->affected_rows() > 0) {
             $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
            redirect('rate', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
             redirect('rate', 'refresh');
            
        }
    }
  
  
}
