<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consolidate extends CI_Controller {

    function __construct() {

        parent::__construct();
        //  error_reporting(E_PARSE);     
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
    }

    public function index() {
        $this->session->sess_destroy();

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

    public function budgets() {

        $this->load->helper(array('form', 'url'));
        $get_result = $this->Md->show('instance');
        // var_dump($get_result);
        if ($get_result) {

            echo '   <table class="table jobs table-striped table-bordered bootstrap-datatable datatable" name="datatable" id="datatable" style=" width: auto;">
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
                
                       <tbody>';

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

                    echo '<tr>';
                    echo ' <td>' . $period . '</td>';
                    echo ' <td>' . $department . '</td>';
                    echo ' <td>' . $unit . '</td>';
                    echo ' <td>' . $initiative . '</td>';
                    echo '<td>' . $startdate . '</td>';
                    echo ' <td>' . $enddate . '</td>';
                    echo ' <td>' . $account . '</td>';
                    echo ' <td>' . number_format($total) . '</td>';
                    echo '<td>' . $by . '</td>';
                  
                    echo '</tr>';

                    echo '</tbody>   </table>';
                }
            } else {

                echo $date . ' no values ';
            }
        }
    }

    public function generate() {
        
        /**
         *   var period = $("#period").val();
        var department = $("#department").val();
        var unit = $("#unit").val();
        var initiative = $("#initiative").val();      
        var account = $("#account").val();
         * **/
        
        $this->load->helper(array('form', 'url'));
        
        $period = $this->input->post('period');
        $department = $this->input->post('department');
        $unit = $this->input->post('unit');
        $account = $this->input->post('account');
       $by = urldecode( $this->input->post('by'));
        
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

$query = "SELECT * FROM instance";

if (!empty($sql)) {
    $query .= ' WHERE ' . implode(' AND ', $sql);
}

//echo $query;
        
        

       //get_where_data($table,$where)
        $get_result = $this->Md->query($query);
        // var_dump($get_result);
        if ($get_result) {

            echo '<table class="table jobs table-striped table-bordered bootstrap-datatable datatable" name="datatable" id="datatable" style=" width: auto;">
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
                
                       <tbody>';

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

                    echo '<tr>';
                    echo ' <td>' . $period . '</td>';
                    echo ' <td>' . $department . '</td>';
                    echo ' <td>' . $unit . '</td>';
                    echo ' <td>' . $initiative . '</td>';
                    echo '<td>' . $startdate . '</td>';
                    echo ' <td>' . $enddate . '</td>';
                    echo ' <td>' . $account . '</td>';
                    echo ' <td>' . number_format($total) . '</td>';
                    echo '<td>' . $by . '</td>';
                   
                    echo '</tr>';

                    echo '</tbody>   </table>';
                }
            } else {

                echo ' no values ';
            }
        }
    }
    
}
