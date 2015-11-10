<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Budget extends CI_Controller {

    function __construct() {

        parent::__construct();
        // error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {
        $data['departments'] = array();
        $data['units'] = array();
        $data['categories'] = array();
        $data['objectives'] = array();
        $data['inits'] = array();
        $data['reports'] = array();
        $data['subs'] = array();
        $data['accounts'] = array();
        $data['rates'] = array();
        $query = $this->Md->query("SELECT * FROM department");
        if ($query) {
            $data['departments'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM unit");
        if ($query) {
            $data['units'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM category");
        if ($query) {
            $data['categories'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM objective");
        if ($query) {
            $data['objectives'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM rate");
        if ($query) {
            $data['rates'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM initiative");
        if ($query) {
            $data['inits'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM reporting");
        if ($query) {
            $data['reports'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM subline");
        if ($query) {
            $data['subs'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM account");
        if ($query) {
            $data['accounts'] = $query;
        }
         $query = $this->Md->query("SELECT * FROM period");
        if ($query) {
            $data['periods'] = $query;
        }

        $this->load->view('add-budget', $data);
    }

    public function tabular() {
        
        $data['departments'] = array();
        $data['units'] = array();
        $data['categories'] = array();
        $data['objectives'] = array();
        $data['inits'] = array();
        $data['reports'] = array();
        $data['subs'] = array();
        $data['accounts'] = array();
        $data['rates'] = array();
        $query = $this->Md->query("SELECT * FROM department");
        if ($query) {
            $data['departments'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM unit");
        if ($query) {
            $data['units'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM category");
        if ($query) {
            $data['categories'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM objective");
        if ($query) {
            $data['objectives'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM rate");
        if ($query) {
            $data['rates'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM initiative");
        if ($query) {
            $data['inits'] = $query;
        }
       
        $query = $this->Md->query("SELECT * FROM reporting");
        if ($query) {
            $data['reports'] = $query;
        }
      
        $query = $this->Md->query("SELECT * FROM subline");
        if ($query) {
            $data['subs'] = $query;
        }
        
        $query = $this->Md->query("SELECT * FROM account");
        if ($query) {
            $data['accounts'] = $query;
        }
         $query = $this->Md->query("SELECT * FROM period");
        if ($query) {
            $data['periods'] = $query;
        }
        
        $this->load->view('table-budget', $data);
    }

    public function all() {
        $data['budgets'] = array();

        $query = $this->Md->query("SELECT * FROM instance");

        if ($query) {
            $data['budgets'] = $query;
        }
        $this->load->view('view-all', $data);
    }
    public function summary() {
        $data['budgets'] = array();

        $query = $this->Md->query("SELECT * FROM instance");

        if ($query) {
            $data['budgets'] = $query;
        }
        $this->load->view('view-summary', $data);
    }

    public function create() {
       
       
        $this->load->helper(array('form', 'url'));
        
        $posts = $this->input->post('posts');
        $period = $this->input->post('period');
        $department = $this->input->post('department');
        $unit = $this->input->post('unit');
        $initiative = $this->input->post('initiative');
        $startdate = $this->input->post('startdate');
        $enddate = $this->input->post('enddate');
        $account = $this->input->post('account');
        $budget = $this->input->post('budget');
        $total = $this->input->post('total');
   // {posts: posts,period:period,department:department,unit:unit,initiative:initiative,startdate:startdate,enddate:enddate,account:account}
     
        
        if ($account=="") $errors = " account ";
         if ($total=="") $errors.= " total ";
          if ($posts=="") $errors.= " multiple fields ";
           
      
        
        if ($posts!="" && $total!="" && $account!=""){
        $budget = new stdClass();

        foreach ($posts as $key => $value) {

            $budget->$value['name'] = $value['value'];
        }
        $budget = json_encode($budget);
        
        $instance = array('account' =>$account,'total' =>$total,'enddate' =>$enddate,'startdate' => $startdate,'initiative' => $initiative,'unit' => $unit,'department' => $department,'period' => $period,'orgID' => '', 'content' => $budget, 'by' => $this->session -> userdata('email'), 'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($instance, 'instance');
        if ($id) {
            if (!$this->session->userdata('session')) {

                echo '<div class="alert alert-info">   <strong>Information submitted  </strong>	</div>';

             // $this->budgets();

                return;
            } else {

                echo '<div class="alert alert-error"> <strong>Information already submitted continue to next section </strong></div>';
            }
        }
    }else{
        
        
                echo '<div class="alert alert-error">                                                  
                                                <strong>Missing field(s): <b>'.$errors.'</b> </strong>									
						</div>';
        
    }
    }

    public function budgets() {

        $this->load->helper(array('form', 'url'));
        $get_result = $this->Md->show('instance');
        // var_dump($get_result);
        if ($get_result) {

            echo '
                                         
     <table class="table table-striped table-bordered bootstrap-datatable datatabled" id="datatabled" style=" width: auto;">
                                    <thead>
                                        <tr> 
                                         <th>period</th>   
                                            <th>Department</th>
                                             <th>Unit</th>                                          
                                            <th>Activity</th>
                                            <th>Output</th>
                                             <th>Outcome</th>
                                              <th>Objective</th>
                                               <th>Strategy/initiatives</th>
                                                <th>Performance measure</th>
                                                 <th>Procurement type</th>
                                                    <th>Budget Categories</th>
                                                       <th>Reporting line</th>
                                                          <th>Sub line</th>
                                                             <th>Account</th>
                                                               <th>Account description</th>
                                                                 <th>Funding</th>
                                                                   <th>Unit of measure</th>
                                                                     <th>Currency</th>
                                                                       <th>Ex.rate</th>
                                                                         <th>Unit price</th>
                                                                           <th>Units/Qty</th>
                                                                             <th>Persons</th>
                                                                               <th>Freq</th>
                                                                                 <th>Price(Local)</th>
                                                                                   <th>Total</th>
                                                                                     <th>Cash flow</th>
                                                                                       <th>Unit price</th>
                                                                                         <th>Start date</th>
                                                                                           <th>End date</th>
                                                                                         
                                                                                             <th>Variance</th>
                                                                                              <th>Cost generation</th>
                                                                                               <th>Auto Fill</th>
                                                                                               <th>January</th>
                                                                                                 <th>February</th>  <th>March</th>
                                                                                                   <th>April</th>
                                                                                                     <th>May</th>  <th>June</th>
                                                                                                       <th>July</th>  <th>August</th>
                                                                                                         <th>September</th>  <th>October</th>
                                                                                                           <th>November</th>  <th>December</th>
                                                                                                   <th>QUARTER 1</th>
                                                                                                    <th>QUARTER 2</th>
                                                                                                     <th>QUARTER 3</th>
                                                                                                      <th>QUARTER 4</th>
                                                                                                       <th>Description of goods/service or works</th>
                                        <th>DETAILED DESCRIPTION OF THE ACTIVITY TO BE UNDERTAKEN</th>
                                         <th>Year</th>  
                                         
                                        </tr>
                                    </thead>   
                                    <tbody>';
            if (is_array($get_result) && count($get_result)) {
                foreach ($get_result as $loop) {

                    $details = $loop->content;
                    $details = json_decode($details);

             echo '<tr>';
                    foreach ($details as $key => $value) {
                     //   echo "$key:$value\n";
                         if (is_numeric($value)) {
         echo ' <td>'.number_format($value).'</td>';
    } else {
         echo ' <td>'.$value.'</td>';
    }
                      
                    }
                    echo '</tr>';
                }
            }
            echo '</tbody>   </table>';
        } else {

            echo $date . ' no values ';
        }
    }

    public function update() {

        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $details = $this->input->post('details');

        $department = array('name' => $name, 'details' => $details, 'created' => date('Y-m-d H:i:s'));
        $this->Md->update($id, $department, 'department');
    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(3);
        $query = $this->Md->delete($id, 'instance');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
            redirect('budget/summary', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-error">
                                                   
                                                <strong>
                                                information deleted	</strong>									
						</div>');
            redirect('budget/summary', 'refresh');
        }
    }

}
