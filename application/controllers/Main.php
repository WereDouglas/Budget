<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	 function __construct() {

        parent::__construct();
        //  error_reporting(E_PARSE);     
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
    }
	public function index()
	{
		$this->load->view('login');
	}
        public function login()
	{
		$this->load->view('main');
	}
         public function start()
	{
             
                  $data['departments'] = array();
        $data['objectives'] = array();
        $data['categories'] = array();
        $data['rates'] = array();
        $data['users'] = array();
        $data['roles'] = array();
        $data['budgets'] = array();
        $data['periods'] = array();

        $query = $this->Md->query("SELECT * FROM department");
        if ($query) {
            $data['departments'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM objective");
        if ($query) {
            $data['objectives'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM category");
        if ($query) {
            $data['categories'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM rate");
        if ($query) {
            $data['rates'] = $query;
        }
        $query = $this->Md->show('user');
        if ($query) {
            $data['users'] = $query;
        }
        $query = $this->Md->show('role');
        if ($query) {
            $data['roles'] = $query;
        }
        $query = $this->Md->show('instance');
        if ($query) {
            $data['budgets'] = $query;
        }
        $query = $this->Md->show('period');
        if ($query) {
            $data['periods'] = $query;
        }
		$this->load->view('view-graph', $data);
	}
}
