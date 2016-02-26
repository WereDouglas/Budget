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

        if ($query) {
            $data['objectives'] = $query;
        }

        $this->load->view('view-objective', $data);
    }

    public function create() {

        $this->load->helper(array('form', 'url'));
        $code = $this->input->post('code');
        $title = $this->input->post('title');
        $created = date('Y-m-d');

        $objective = array('code' => $code, 'title' => $title, 'created' => date('Y-m-d H:i:s'));
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

    public function sync() {

        $code = $this->input->post('code');
        $title = $this->input->post('title');
        $created = date('Y-m-d');

        if ($_POST["parent_id"] == "") {
            echo 'F';
            return;
        }
        if ($_POST["action"] == 'create') {

            $result = $this->Md->get('code', $code, 'objective');
            if (count($result) > 0) {
                echo 'F';
                return;
            } else {
                $objective = array('code' => $code, 'title' => $title, 'parent_id' => $_POST["parent_id"], 'sync' => "T", 'action' => $_POST["action"],'created' => date('Y-m-d H:i:s'));
                $id = $this->Md->save($objective, 'objective');
                echo 'T';
            }
        }
        if ($_POST["action"] == 'update') {
            $objective = array('code' => $code, 'title' => $title,'parent_id' => $_POST["parent_id"], 'sync' => 'T', 'action' => $_POST["action"], 'created' => date('Y-m-d H:i:s'));
            $id = $this->Md->update_sync($_POST["parent_id"], $objective, 'objective');
            echo 'T';
        }
        if ($_POST["action"] == 'delete') {
            $query = $this->Md->delete_sync($_POST["parent_id"], 'objective');
            echo 'd';
        }
    }

    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $code = $this->input->post('code');
        $title = $this->input->post('title');

        $objective = array('code' => $code, 'title' => $title, 'created' => date('Y-m-d H:i:s'));
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
