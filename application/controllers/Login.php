<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
     function __construct() {

        parent::__construct();
      //  error_reporting(E_PARSE);     
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
      }
	public function index()
	{
                $this->session->sess_destroy();
		$this->load->view('login');
	}
       public function start()
	{
                if ($this -> session -> userdata('name')==""){
                  redirect('Login/', 'refresh');   
                    
                }
                
          $data['departments'] = array();
          $data['objectives'] = array();
          $data['categories'] = array();
          $data['rates'] = array();
          $data['users'] = array();
          $data['roles'] = array();
          
          $query = $this->Md->query("SELECT * FROM department");
          if ($query) { $data['departments'] = $query;}     
          $query = $this->Md->query("SELECT * FROM objective");
          if ($query) { $data['objectives'] = $query;}
          $query = $this->Md->query("SELECT * FROM category");
          if ($query) { $data['categories'] = $query;}
          $query = $this->Md->query("SELECT * FROM rate");
          if ($query) { $data['rates'] = $query;}  
          $query = $this->Md->show('user');
          if ($query) {  $data['users'] = $query;   }
          $query = $this->Md->show('role'); 
          if ($query) {  $data['roles'] = $query; } 
          $this->load->view('main',$data);          
          
	}
        
        public function authenticate()
	{
            
        $this->load->helper(array('form', 'url'));
        $email = $this->input->post('email');
        $password_now = $this->input->post('password');
        $key = $email;  
        $result = $this->Md->get('email', $email, 'user');
             
         
         if(count($result)==0){
             redirect('Login/', 'refresh'); 
             
         }
                foreach ($result as $res) {
                    $key = $email;
                    $password = $this->encrypt->decode($res->password, $key);

                    if ($password_now == $password) {

                        $newdata = array(
                            'id' => $res->id,
                            'name' => $res->name,
                            'email' => $res->email,
                            'image' => $res->image,
                             'role' => $res->role,
                             'department' => $res->department,
                             'active' => $res->active,
                            'contact' => $res->contact,                           
                            'logged_in' => TRUE
                        );
                 
                        $this->session->set_userdata($newdata);                        
                       
                        $infos = $this->Md->get('name',$res->role, 'role');                        
                       
                        $actions = "";
                                                
                                foreach ($infos as $info) {
                                    $actiondata = array('actions' => $info->actions,'views'=>$info->views);                                
                                } 
                         $this->session->set_userdata($actiondata);
                            
                        //echo $this->session->userdata('actions');
                       //  echo $this->session->userdata('email');
                         //echo $actions;
                        
             redirect('Login/start', 'refresh');

          
            } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">  <strong>  ! invalid login credentials</div>');
            //redirect('Login/', 'refresh');
        }
       
        
        
            }
        
}
}
