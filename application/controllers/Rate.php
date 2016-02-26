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

        if ($query) {
            $data['rates'] = $query;
        }

        $this->load->view('view-rate', $data);
    }

    public function create() {

        $this->load->helper(array('form', 'url'));

        $currency = $this->input->post('currency');
        $rate = $this->input->post('rate');
        $created = date('Y-m-d');

        $rated = array('currency' => $currency, 'rate' => $rate, 'created' => date('Y-m-d H:i:s'));
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

    public function sync() {

        $this->load->helper(array('form', 'url'));

        $currency = $this->input->post('currency');
        $rate = $this->input->post('rate');
        $details = $this->input->post('details');
        $created = date('Y-m-d');
        if ($_POST["parent_id"] == "") {
            echo 'F';
            return;
        }
        if ($_POST["action"] == 'create') {
            $result = $this->Md->get('currency', $currency, 'rate');
            if (count($result) > 0) {
                echo 'F';
                return;
            } else {
                $rated = array('currency' => $currency, 'rate' => $rate, 'created' => date('Y-m-d H:i:s'), 'parent_id' => $_POST["parent_id"], 'sync' => 'T', 'action' => $_POST["action"]);
                $id = $this->Md->save($rated, 'rate');
                echo 'T';
                return;
            }
        }
        if ($_POST["action"] == 'update') {
            $rated = array('currency' => $currency, 'rate' => $rate, 'created' => date('Y-m-d H:i:s'), 'parent_id' => $_POST["parent_id"], 'sync' => 'T', 'action' => $_POST["action"]);
            $id = $this->Md->update_sync($_POST["parent_id"], $rate, 'rate');
            echo 'T';
            return;
        }
        if ($_POST["action"] == 'delete') {
            $query = $this->Md->delete_sync($_POST["parent_id"], 'rate');
            echo 'd';
            return;
        }
    }

    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $currency = $this->input->post('currency');
        $rate = $this->input->post('rate');

        $rated = array('currency' => $currency, 'rate' => $rate, 'created' => date('Y-m-d H:i:s'));
        $this->Md->update($id, $rated, 'rate');
    }

    public function where() {
        $currency = $this->input->post('name');
        // $currency="USD"; 

        $table = 'rate';
        $where = array('currency' => $currency);
        $data['name'] = $this->Md->get_where_data($table, $where);
        $sc = json_encode($data['name']);
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
