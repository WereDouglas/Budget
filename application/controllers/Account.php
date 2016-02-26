<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

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
        $sublineID = $this->uri->segment(4);
        $sublineName = urldecode($this->uri->segment(3));
        if ($sublineID == "") {
            $sublineID = $this->session->userdata('sublineID');
        }
        if ($sublineName == "") {
            $sublineName = $this->session->userdata('sublineName');
        }

        $sublinedata = array('sublineID' => $sublineID, 'sublineName' => $sublineName);
        $this->session->set_userdata($sublinedata);

        $data['accounts'] = array();

        $query = $this->Md->query("SELECT * FROM account WHERE sublineID='" . $sublineID . "'");

        if ($query) {
            $data['accounts'] = $query;
        }
        $data['sublineName'] = $sublineName;
        $data['sublineID'] = $sublineID;
        $this->load->view('view-account', $data);
    }

    public function create() {

        $this->load->helper(array('form', 'url'));
        $sublineID = $this->input->post('sublineID');
        $sublineName = $this->input->post('sublineName');
        $name = $this->input->post('name');
        $number = $this->input->post('number');
        $line = $this->input->post('line');
        $created = date('Y-m-d');

        $account = array('sublineID' => $sublineID, 'name' => $name, 'number' => $number, 'line' => $line, 'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($account, 'account');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

            redirect('account/', 'refresh');
            return;
        } else {

            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
            redirect('account/', 'refresh');
            return;
        }


        redirect('account/', 'refresh');
        return;
    }

    public function sync() {

        $this->load->helper(array('form', 'url'));

        $sublineID = $this->input->post('sublineID');
        $sublineName = $this->input->post('sublineName');
        $name = $this->input->post('name');
        $number = $this->input->post('number');
        $line = $this->input->post('line');
        $created = date('Y-m-d');

        if ($_POST["parent_id"] == "") {
            echo 'F';
            return;
        }
        if ($_POST["action"] == 'create') {

            $result = $this->Md->get('number', $number, 'account');
            if (count($result) > 0) {
                echo 'F';
                return;
            } else {
                $account = array('sublineID' => $sublineID, 'name' => $name, 'number' => $number, 'line' => $line, 'created' => date('Y-m-d H:i:s'), 'parent_id' => $_POST["parent_id"], 'sync' => 'T', 'action' => $_POST["action"]);
                $id = $this->Md->save($account, 'account');
                echo 'T';
                return;
            }
        }
        if ($_POST["action"] == 'update') {
            $account = array('sublineID' => $sublineID, 'name' => $name, 'number' => $number, 'line' => $line, 'created' => date('Y-m-d H:i:s'), 'parent_id' => $_POST["parent_id"], 'sync' => 'T', 'action' => $_POST["action"]);
            $id = $this->Md->update_sync($_POST["parent_id"], $account, 'account');
            echo 'T';
            return;
        }
        if ($_POST["action"] == 'delete') {
            $query = $this->Md->delete_sync($_POST["parent_id"], 'account');
            echo 'd';
            return;
        }
    }

    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $number = $this->input->post('number');
        $line = $this->input->post('line');

        $account = array('name' => $name, 'number' => $number, 'line' => $line, 'created' => date('Y-m-d H:i:s'));
        $this->Md->update($id, $account, 'account');
    }

    public function where() {
        $subline = $this->input->post('name');
        //$category="REVENUE";
        $id = $this->Md->query_single("SELECT * FROM subline WHERE name='" . $subline . "'");

        $table = 'account';
        $where = array('sublineID' => $id);
        $data['name'] = $this->Md->get_where_data($table, $where);
        $sc = json_encode($data['name']);
        echo $sc;
    }

    public function delete() {
        $this->load->helper(array('form', 'url'));

        $id = $this->uri->segment(3);
        $query = $this->Md->delete($id, 'account');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
            redirect('account/', 'refresh');
        } else {
            $msg = '<span style="color:red">action failed</span>';
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               action failed	</strong>									
						</div>');
            redirect('account/', 'refresh');
        }
    }

}
