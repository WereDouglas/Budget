<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Period extends CI_Controller {

    function __construct() {

        parent::__construct();
        // error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
        $this->load->library('helper');
    }

    public function index() {
        $data['periods'] = array();

        $query = $this->Md->query("SELECT * FROM period");

        if ($query) {
            $data['periods'] = $query;
        }

        $this->load->view('view-period', $data);
    }

    public function create() {

        $sessdata = $this->session->userdata('actions');
        if (!$this->helper->allowed($sessdata, 'Create')) {

            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               You do not have permission to execute this task	</strong>									
						</div>');

            redirect('period/', 'refresh');
        }


        $this->load->helper(array('form', 'url'));
        $year = $this->input->post('year');
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $details = $this->input->post('details');
        $created = date('Y-m-d');
        $by = $this->input->post('by');

        $period = array('year' => $year, 'start' => $start, 'end' => $end, 'details' => $details, 'created' => date('Y-m-d H:i:s'), 'by' => $this->session->userdata('email'));
        $id = $this->Md->save($period, 'period');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

            redirect('period/', 'refresh');
            return;
        } else {

            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
            redirect('period/', 'refresh');
            return;
        }


        redirect('period/', 'refresh');
        return;
    }

    public function sync() {

        $year = $this->input->post('year');
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $details = $this->input->post('details');

        $created = date('Y-m-d');


        if ($_POST["parent_id"] == "") {
            echo 'F';
            return;
        }
        if ($_POST["action"] == 'create') {

            $result = $this->Md->get('year', $year, 'period');
            if (count($result) > 0) {
                echo 'F';
                return;
            } else {
                $period = array('year' => $year, 'start' => $start, 'end' => $end, 'details' => $details, 'created' => date('Y-m-d H:i:s'), 'by' => 'application', 'parent_id' => $_POST["parent_id"], 'sync' => 'T', 'action' => $_POST["action"]);
                $id = $this->Md->save($period, 'period');
                echo 'T';
                return;
            }
        }
        if ($_POST["action"] == 'update') {
            $period = array('year' => $year, 'start' => $start, 'end' => $end, 'details' => $details, 'created' => date('Y-m-d H:i:s'), 'by' => 'application', 'parent_id' => $_POST["parent_id"], 'sync' => 'T', 'action' => $_POST["action"]);
            $id = $this->Md->update_sync($_POST["parent_id"], $period, 'period');
            echo 'T';
            return;
        }
        if ($_POST["action"] == 'delete') {
            $query = $this->Md->delete_sync($_POST["parent_id"], 'period');
            echo 'd';
            return;
        }
    }

    public function update() {

        $this->load->helper(array('form', 'url'));
        $year = $this->input->post('year');
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $details = $this->input->post('details');
        $created = date('Y-m-d');
        $id = $this->input->post('id');

        $period = array('year' => $year, 'start' => $start, 'end' => $end, 'details' => $details, 'created' => date('Y-m-d H:i:s'), 'by' => $this->session->userdata('email'));
        $this->Md->update($id, $period, 'period');
    }

    public function where() {
        $period = $this->input->post('period');
        // $currency="USD"; 

        $table = 'period';
        $where = array('year' => $period);
        $data['name'] = $this->Md->get_where_data($table, $where);
        $sc = json_encode($data['name']);
        echo $sc;
    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(3);
        $query = $this->Md->delete($id, 'period');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
            redirect('period', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
            redirect('period', 'refresh');
        }
    }

}
