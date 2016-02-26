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

        if ($query) {
            $data['categories'] = $query;
        }

        $this->load->view('view-category', $data);
    }

    public function create() {

        $this->load->helper(array('form', 'url'));
        $name = $this->input->post('name');
        $variation = $this->input->post('variation');
        $created = date('Y-m-d');

        $category = array('name' => $name, 'variation' => $variation, 'created' => date('Y-m-d H:i:s'));
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

    public function sync() {

        $this->load->helper(array('form', 'url'));
        $name = $this->input->post('name');
        $variation = $this->input->post('variation');
        $created = date('Y-m-d');

        if ($_POST["parent_id"] == "") {
            echo 'F';
            return;
        }
        if ($_POST["action"] == 'create') {

            $result = $this->Md->get('name', $name, 'category');
            if (count($result) > 0) {
                echo 'F';
                return;
            } else {
                $category = array('name' => $name, 'variation' => $variation, 'created' => date('Y-m-d H:i:s'), 'parent_id' => $_POST["parent_id"], 'sync' => 'T', 'action' => $_POST["action"]);
                $id = $this->Md->save($category, 'category');
                echo 'T';
                return;
            }
        }
        if ($_POST["action"] == 'update') {
            $category = array('name' => $name, 'variation' => $variation, 'created' => date('Y-m-d H:i:s'), 'parent_id' => $_POST["parent_id"], 'sync' => 'T', 'action' => $_POST["action"]);
            $id = $this->Md->update_sync($_POST["parent_id"], $category, 'category');
            echo 'T';
            return;
        }
        if ($_POST["action"] == 'delete') {
            $query = $this->Md->delete_sync($_POST["parent_id"], 'category');
            echo 'd';
            return;
        }
    }

    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $varation = $this->input->post('variation');

        $category = array('name' => $name, 'variation' => $variation, 'created' => date('Y-m-d H:i:s'));
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
