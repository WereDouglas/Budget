<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Initiative extends CI_Controller {

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
        $objectiveID = $this->uri->segment(4);
        $objectiveName = urldecode($this->uri->segment(3));
        if ($objectiveID == "") {
            $objectiveID = $this->session->userdata('objectiveID');
        }
        if ($objectiveName == "") {
            $objectiveName = $this->session->userdata('objectiveName');
        }


        $initiativedata = array('objectiveID' => $objectiveID, 'objectiveName' => $objectiveName);
        $this->session->set_userdata($initiativedata);

        $data['initiatives'] = array();

        $query = $this->Md->query("SELECT * FROM initiative WHERE objectiveID='" . $objectiveID . "'");

        if ($query) {
            $data['initiatives'] = $query;
        }
        $data['objectiveName'] = $objectiveName;
        $data['objectiveID'] = $objectiveID;
        $this->load->view('view-initiative', $data);
    }

    public function create() {
        $this->load->helper(array('form', 'url'));

        $objectiveID = $this->input->post('objectiveID');
        $objectiveName = $this->input->post('objectiveName');
        $values = $this->input->post('values');
        $details = $this->input->post('details');
        $created = date('Y-m-d');

        $init = array('objectiveID' => $objectiveID, 'values' => $values, 'details' => $details, 'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($init, 'initiative');
        if ($id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information submitted	</strong>									
						</div>');

            redirect('initiative/', 'refresh');
            return;
        } else {

            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               Error submitting	</strong>									
						</div>');
            redirect('initiative/', 'refresh');
            return;
        }


        redirect('initiative/', 'refresh');
        return;
    }

    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $values = $this->input->post('values');
        $details = $this->input->post('details');

        $init = array('values' => $values, 'details' => $details, 'created' => date('Y-m-d H:i:s'));
        $this->Md->update($id, $init, 'initiative');
    }

    public function where() {
        $code = $this->input->post('name');
        // $department="TECHNOLOGY AND NETWORK SERVICES";
        $id = $this->Md->query_single("SELECT * FROM objective WHERE code='" . $code . "'");

        $table = 'initiative';
        $where = array('objectiveID' => $id);
        $data['details'] = $this->Md->get_where_data($table, $where);
        $sc = json_encode($data['details']);
        echo $sc;
    }

    public function delete() {
        $this->load->helper(array('form', 'url'));


        $id = $this->uri->segment(5);

        $query = $this->Md->delete($id, 'initiative');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
            redirect('initiative/', 'refresh');
        } else {
            $msg = '<span style="color:red">action failed</span>';
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                               action failed	</strong>									
						</div>');
            redirect('initiative/', 'refresh');
        }
    }

}
