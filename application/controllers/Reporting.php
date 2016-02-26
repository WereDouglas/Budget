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
        $categoryName = urldecode($this->uri->segment(3));
        if ($categoryID == "") {
            $categoryID = $this->session->userdata('categoryID');
        }
        if ($categoryName == "") {
            $categoryName = $this->session->userdata('categoryName');
        }

        $categorydata = array('categoryID' => $categoryID, 'categoryName' => $categoryName);
        $this->session->set_userdata($categorydata);

        $data['reportings'] = array();

        $query = $this->Md->query("SELECT * FROM reporting WHERE categoryID='" . $categoryID . "'");

        if ($query) {
            $data['reportings'] = $query;
        }
        $data['categoryName'] = $categoryName;
        $data['categoryID'] = $categoryID;
        $this->load->view('view-report', $data);
    }

    public function create() {

        $this->load->helper(array('form', 'url'));
        $categoryID = $this->input->post('categoryID');
        $categoryName = $this->input->post('categoryName');
        $name = $this->input->post('name');

        $created = date('Y-m-d');

        $report = array('categoryID' => $categoryID, 'name' => $name, 'created' => date('Y-m-d H:i:s'));
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

    public function sync() {

        $this->load->helper(array('form', 'url'));
        $categoryID = $this->input->post('categoryID');
        $categoryName = $this->input->post('categoryName');
        $name = $this->input->post('name');
        $created = date('Y-m-d');

        if ($_POST["parent_id"] == "") {
            echo 'F';
            return;
        }
        if ($_POST["action"] == 'create') {

            $result = $this->Md->get('name', $name, 'reporting');
            if (count($result) > 0) {
                echo 'F';
                return;
            } else {
                $report = array('categoryID' => $categoryID, 'name' => $name, 'created' => date('Y-m-d H:i:s'), 'parent_id' => $_POST["parent_id"], 'sync' => 'T', 'action' => $_POST["action"]);
                $id = $this->Md->save($report, 'reporting');
                echo 'T';
                return;
            }
        }
        if ($_POST["action"] == 'update') {
            $report = array('categoryID' => $categoryID, 'name' => $name, 'created' => date('Y-m-d H:i:s'), 'parent_id' => $_POST["parent_id"], 'sync' => 'T', 'action' => $_POST["action"]);
            $id = $this->Md->update_sync($_POST["parent_id"], $report, 'reporting');
            echo 'T';
            return;
        }
        if ($_POST["action"] == 'delete') {
            $query = $this->Md->delete_sync($_POST["parent_id"], 'reporting');
            echo 'd';
            return;
        }
    }

    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $name = $this->input->post('values');


        $reporting = array('name' => $name, 'created' => date('Y-m-d H:i:s'));
        $this->Md->update($id, $reporting, 'reporting');
    }

    public function where() {
        $category = $this->input->post('name');
        //$category="REVENUE";
        $id = $this->Md->query_single("SELECT * FROM category WHERE name='" . $category . "'");

        $table = 'reporting';
        $where = array('categoryID' => $id);
        $data['name'] = $this->Md->get_where_data($table, $where);
        $sc = json_encode($data['name']);
        echo $sc;
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
