<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

    function __construct() {

        parent::__construct();
       error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
    }

    public function index() {
        $query = $this->Md->show('role');
      //  var_dump($query);
        if ($query) {
             $data['roles'] = $query;
        } else {
            $data['roles'] = array();
        }

        $this->load->view('roles', $data);
    }

    public function save() {
        $this->load->helper(array('form', 'url'));
        $role = $this->input->post('role');
        $actions = $this->input->post('actions');
        $views = $this->input->post('views');
       
       
        $get_result = $this->Md->check($role,'name','role');
        if($get_result){
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                  Role name already in use	</strong>									
						</div>');
              redirect('/Role', 'refresh');
        }
        if ($role!=""){
        $role = array('name' => $role, 'actions' => $actions,'views'=>$views, 'status'=>'true','created'=>  date('Y-m-d'));
        $this->Md->save($role, 'role');
       //   $log = array('user' => $this->session -> userdata('name'),'userid'=>$this->session -> userdata('id'),'action' => 'save','details'=> 'role information  ', 'date' => date('Y-m-d H:i:s'),'ip' => $this->input->ip_address(), 'url' =>'');
        //$this->Md->save($log, 'logs'); 
        
        
        redirect('/Role', 'refresh');
        return;
        }
        else{
              $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                 Please input the name of the role</strong>									
						</div>');
              redirect('/Role', 'refresh');            
        }
    }
    public  function edit(){
        
        $this->load->helper(array('form', 'url'));
         $id = $this->uri->segment(3);
         $query = $this->Md->show('role');
 
        if ($query) {
             $data['roles'] = $query;
        } else {
            $data['roles'] = array();
        }
        //get($field,$value,$table)
          $query = $this->Md->get('id',$id,'role');
    
        if ($query) {
             $data['roleID'] = $query;
        } else {
            $data['roleID'] = array();
        }

        $this->load->view('roles', $data);
        
    }
     public  function update(){
        
        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('roleID');
        $role = $this->input->post('edit_role');
        $actions = $this->input->post('edit_actions');
        $views = $this->input->post('edit_views');
        $roles = array('name' => $role, 'actions' => $actions, 'views'=>$views,'status'=>'true','created'=>  date('Y-m-d'));
        $this->Md->update($id,$roles, 'role');
       // $log = array('user' => $this->session -> userdata('name'),'userid'=>$this->session -> userdata('id'),'action' => 'update','details'=> 'role information update ', 'date' => date('Y-m-d H:i:s'),'ip' => $this->input->ip_address(), 'url' =>'');
        //$this->Md->save($log, 'logs'); 
         $this->session->set_flashdata('msg', '<div class="alert alert-info">
                                                   
                                                <strong>
                                                  This role '.$role.' has been updated	</strong>									
						</div>');        
       redirect('/Role', 'refresh');
                   return;
        
    }
    public function delete(){
        
                    $id = $this->uri->segment(3);
                 
                    $query = $this->Md->delete($id,'role');
                 //   $log = array('user' => $this->session -> userdata('name'),'userid'=>$this->session -> userdata('id'),'action' => 'delete','details'=> 'role information delete ', 'date' => date('Y-m-d H:i:s'),'ip' => $this->input->ip_address(), 'url' =>'');
                   // $this->Md->save($log, 'logs'); 
                 
                    if ($this->db->affected_rows() > 0) {
                        $msg='<div class="alert alert-info">
                                                   
                                                <strong>
                                                  Information deleted	</strong>									
						</div>';
                         $this->session->set_flashdata('msg', $msg); 
                             redirect('/Role', 'refresh');
                    } else {
                       $msg='<div class="alert alert-error">
                                                   
                                                <strong>
                                                  Action failed</strong>									
						</div>';
                        $this->session->set_flashdata('msg', $msg); 
                             redirect('/Role', 'refresh');
                    }              
        
         }

      public function check($role) {
          
        $this->load->helper(array('form', 'url'));
     
        $role = ($role == "") ? $this->input->post('role') :$role;
        //check($value,$field,$table)
        $get_result = $this->Md->check($role,'name','role');

        if ($get_result)
            echo '<div class="alert alert-error">
                                                   
                                                <strong>
                                                  Role name already registered	</strong>									
						</div>';
        else
            echo '';
    }
}
