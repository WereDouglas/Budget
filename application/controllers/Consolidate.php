<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consolidate extends CI_Controller {

    function __construct() {

        parent::__construct();
       // error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
    }

    public function index() {
        // $this->session->sess_destroy();

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
        $this->load->view('main-report', $data);
    }

    public function account() {
        $query = $this->Md->query("SELECT DISTINCT(account) AS account FROM budgets ORDER BY account DESC");
        // $query = $this->Md->query("SELECT accounts FROM budgets ");
        echo json_encode($query);
    }

    public function department() {
        $query = $this->Md->query("SELECT DISTINCT(department) AS department FROM budgets ORDER BY department DESC");
        echo json_encode($query);
    }

    public function period() {
        $query = $this->Md->query("SELECT DISTINCT(period) AS period FROM budgets ORDER BY period DESC");
        echo json_encode($query);
    }

    public function unit() {
        $query = $this->Md->query("SELECT DISTINCT(unit) AS unit FROM budgets ORDER BY unit DESC");
        echo json_encode($query);
    }

    public function obj() {
        $query = $this->Md->query("SELECT title  FROM objective ORDER BY id DESC");
        echo json_encode($query);
    }

    public function inits() {
        $query = $this->Md->query("SELECT details FROM initiative ORDER BY id DESC");
        echo json_encode($query);
    }

    public function perf() {
        $query = $this->Md->query("SELECT * FROM initiative ORDER BY id DESC");
        echo json_encode($query);
    }

    public function category() {
        $query = $this->Md->query("SELECT * FROM category ORDER BY id DESC");
        echo json_encode($query);
    }

    public function line() {
        $query = $this->Md->query("SELECT * FROM reporting ORDER BY id DESC");
        echo json_encode($query);
    }

    public function subline() {
        $query = $this->Md->query("SELECT * FROM subline ORDER BY id DESC");
        echo json_encode($query);
    }

    public function months() {

        $months = array();

        for ($x = 1; $x < 13; $x++) {
            $obj = new stdClass();
            $obj->id = $x;
            $obj->name = date('F', mktime(0, 0, 0, $x, 1));
            array_push($months, $obj);
        }

        echo json_encode($months);
    }

    public function fund() {

        $months = array();
        $obj = new stdClass();

        $obj->name = "INTERNAL";
        array_push($months, $obj);

        $objs = new stdClass();
        $objs->name = "EXTERNAL";
        array_push($months, $objs);

        echo json_encode($months);
    }

    public function graphs() {

        //   $this->session->sess_destroy();

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

    public function budgets() {

        $this->load->helper(array('form', 'url'));
        $get_result = $this->Md->show('instance');
        // var_dump($get_result);
        if ($get_result) {

            echo '<div class="scroll">  
                <table class="scroll table jobs table-striped table-bordered bootstrap-datatable datatable" name="datatable" id="datatable" style=" width: auto;">
      <thead>
                <tr>  
                <th>Period</th>
                    <th>Department</th>
                    <th>Unit</th>
                    <th>Strategy/initiatives</th> 
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Account</th>
                    <th>Total</th>
                      <th>created by</th>                
                                                                                              
                </tr>
            </thead>     
                
                      ';

            if (is_array($get_result) && count($get_result)) {
                foreach ($get_result as $loop) {
                    $period = $loop->period;
                    $department = $loop->department;
                    $unit = $loop->unit;
                    $initiative = $loop->initiative;
                    $startdate = $loop->startdate;
                    $enddate = $loop->enddate;
                    $account = $loop->account;
                    $total = $loop->total;
                    $by = $loop->by;
                    $id = $loop->id;
                    $created = $loop->created;

                    echo ' <tbody><tr>';
                    echo ' <td>' . $period . '</td>';
                    echo ' <td>' . $department . '</td>';
                    echo ' <td>' . $unit . '</td>';
                    echo ' <td>' . $initiative . '</td>';
                    echo '<td>' . $startdate . '</td>';
                    echo ' <td>' . $enddate . '</td>';
                    echo ' <td>' . $account . '</td>';
                    echo ' <td>' . number_format($total) . '</td>';
                    echo '<td>' . $by . '</td>';

                    echo '</tr></tbody>';
                }
                echo '   </table></div>';
            } else {

                echo $date . ' no values ';
            }
        }
    }

    public function generate() {


        $this->load->helper(array('form', 'url'));
        echo $period = $this->input->post('period');
        echo $department = $this->input->post('department');
        echo $unit = $this->input->post('unit');
        echo $by = urldecode($this->input->post('by'));
        echo $account = $this->input->post('account');
      
        if ($this->session->userdata('department') != "") {
         echo  $department = $this->session->userdata('department');
        }
        if ($this->session->userdata('unit') != "") {
         echo  $unit = $this->session->userdata('unit');
        }
        if ($this->session->userdata('period') != "") {
         echo  $period = $this->session->userdata('period');
        }
  
        $sql[] = NULL;
        unset($sql);

        if ($period) {
            $sql[] = "period = '$period' ";
        }
        if ($department) {
            $sql[] = " department = '$department' ";
        }
        if ($unit) {
            $sql[] = " unit = '$unit' ";
        }
        if ($account) {
            $sql[] = " account = '$account' ";
        }
        if ($by) {
            $sql[] = "by = '$by' ";
        }

        $query = "SELECT * FROM budgets";

        if (!empty($sql)) {
            $query .= ' WHERE ' . implode(' AND ', $sql);
        }

//echo $query;
        //get_where_data($table,$where)
        $get_result = $this->Md->query($query);
        // var_dump($get_result);
        if ($get_result) {

            echo '<div class="scroll">  
                <table class="scroll table jobs table-striped table-bordered bootstrap-datatable datatable" name="datatable" id="datatable" style=" width: auto;">
             <thead>
                <tr>  
                <th>Period</th>
                    <th>Department</th>
                    <th>Unit</th>
                    <th>Strategy/initiatives</th> 
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Account</th>
                    <th>Total</th>
                    <th>created by</th>                                                       
                </tr>
            </thead>  <tbody>';

            if (is_array($get_result) && count($get_result)) {
                foreach ($get_result as $loop) {
                    $period = $loop->period;
                    $department = $loop->department;
                    $unit = $loop->unit;
                    $initiative = $loop->initiatives;
                    $startdate = $loop->starts;
                    $enddate = $loop->starts;
                    $account = $loop->account;
                    $total = $loop->totalLocal;
                    $by = $loop->submitted;
                    $id = $loop->id;
                    $created = $loop->created;

                    echo '<tr><td>' . $period . '</td>
                     <td>' . $department . '</td>
                    <td>' . $unit . '</td>
                   <td>' . $initiative . '</td>
                    <td>' . $startdate . '</td>
                    <td>' . $enddate . '</td>
                   <td>' . $account . '</td>
                   <td>' . number_format($total) . '</td>
                   <td>' . $by . '</td> <td> </td></tr>
                  ';
                }
                echo ' </tbody>   </table></div>';
            } else {

                echo ' no values ';
            }
        }
    }

}
