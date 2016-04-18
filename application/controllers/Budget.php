<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Budget extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
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
     public function grid() {
         
          $this->load->view('add-grid', $data);
         
         
     }

    public function import() {

        if (isset($_POST["Import"])) {
            $filename = $_FILES["file"]["tmp_name"];
            // echo $filename;
            if ($_FILES["file"]["size"] > 0) {
                $file = fopen($filename, "r");

                $file = $filename;
                // $file = $filename;
//load the excel library
                $this->load->library('excel');

//read file from path
                $objPHPExcel = PHPExcel_IOFactory::load($file);

                //      Get worksheet dimensions
                $sheet = $objPHPExcel->getSheet(0);
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
                // Loop through each row of the worksheet in turn
                $budget = new stdClass();

                for ($row = 1; $row < 2; $row++) {
                    //  Read a row of data into an array
                    // echo $row;
                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

                    // var_dump($rowData[0]);
                    // echo count($rowData[0]);
                    for ($m = 0; $m < count($rowData[0]); $m++) {

                        // echo $rowData[0][$m]."<br> ";
                    }
                }


                for ($row = 2; $row <= $highestRow; $row++) {
                    //  Read a row of data into an array
                    // echo $row;
                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

                    // var_dump($rowData[0]);



                    for ($d = 0; $d < count($rowData); $d++) {
                        // var_dump($rowData[$d]);
                        // echo $rowData[$d][13] . "<br>";
                        //  echo $rowData[$d][1] . "<br>";
                        //  echo $rowData[$d][2] . "<br>";
                        //  echo $rowData[$d][3] . "<br>";
                        $budget = new stdClass();
                        $budget->period = $rowData[$d][55];
                        //  str_replace("world","Peter","Hello world!");

                        $budget->department = str_replace("_", " ", $rowData[$d][1]);
                        $budget->unit = $rowData[$d][2];
                        $budget->activity = $rowData[$d][3];
                        $budget->output = $rowData[$d][4];
                        $budget->outcome = $rowData[$d][5];
                        $budget->objective = $rowData[$d][6];
                        $budget->initiative = $rowData[$d][7];
                        $budget->performance = $rowData[$d][8];
                        $budget->starts = $rowData[$d][27];
                        $budget->starts = $rowData[$d][28];
                        $budget->Procurement_type = $rowData[$d][9];
                        $budget->category = $rowData[$d][10];
                        $budget->line = $rowData[$d][11];
                        $budget->subline = $rowData[$d][12];
                        $budget->account = $rowData[$d][13];
                        $budget->funding = $rowData[$d][15];
                        $budget->account_description = $rowData[$d][14];
                        //**isssue 
                        $budget->unit = $rowData[$d][16];
                        $budget->currency = $rowData[$d][17];
                        $budget->rate = $rowData[$d][18];
                        $budget->price = $rowData[$d][19];
                        $budget->qty = $rowData[$d][20];
                        $budget->persons = $rowData[$d][21];
                        $budget->freq = $rowData[$d][22];
                        $budget->priceL = $rowData[$d][23];
                        $budget->total = $rowData[$d][24];
                        //**issue
                        $budget->flow = $rowData[$d][10];
                        $budget->totalL = $rowData[$d][23];
                        $budget->radio = $rowData[$d][24];
                        $budget->variance = $rowData[$d][25];
                        //**isssue
                        $budget->generation = $rowData[$d][10];
                        $budget->January = $rowData[$d][31];
                        $budget->February = $rowData[$d][32];
                        $budget->March = $rowData[$d][33];
                        $budget->April = $rowData[$d][34];
                        $budget->May = $rowData[$d][35];
                        $budget->June = $rowData[$d][36];
                        $budget->July = $rowData[$d][37];
                        $budget->August = $rowData[$d][38];
                        $budget->September = $rowData[$d][39];
                        $budget->October = $rowData[$d][40];
                        $budget->November = $rowData[$d][41];
                        $budget->December = $rowData[$d][42];
                        $budget->Quarter1 = $rowData[$d][45];
                        $budget->Quarter2 = $rowData[$d][46];
                        $budget->Quarter3 = $rowData[$d][47];
                        $budget->Quarter4 = $rowData[$d][48];
                        $budget->services = $rowData[$d][54];
                        ///***issue
                        $budget->details = $rowData[$d][54];
                        $budget->Year = $rowData[$d][55];


                        $budget = json_encode($budget);

                        $instance = array('account' => $rowData[$d][13], 'total' => $rowData[$d][24], 'enddate' => "", 'startdate' => "", 'initiative' => $rowData[$d][7], 'unit' => $rowData[$d][2], 'department' => str_replace("_", " ", $rowData[$d][1]), 'period' => $rowData[$d][55], 'orgID' => '', 'content' => $budget, 'by' => $this->session->userdata('email'), 'created' => date('Y-m-d H:i:s'));
                        $id = $this->Md->save($instance, 'instance');
                    }
                }
                //  Insert row data array into your database of choice here
            }
//send the data in an array format

            fclose($file);
            // redirect('/all');
        }

        echo '<div class="alert alert-info">   <strong>Information uploaded!  </strong>	</div>';
        // $this->load->view('add-budget', $data);
    }

    public function sync() {



        $budget = new stdClass();
        $budget->period = $_POST["period"];
        $budget->department = $_POST["department"];
        $budget->parent_id = $_POST["parent_id"];
        $budget->unit = $_POST["unit"];
        $budget->activity = $_POST["activity"];
        $budget->output = $_POST["output"];
        $budget->outcome = $_POST["outcome"];
        $budget->objective = $_POST["objective"];
        $budget->initiative = $_POST["initiative"];
        $budget->performance = $_POST["performance"];
        $budget->starts = $_POST["starts"];

        $budget->Procurement_type = $_POST["procurement_type"];
        $budget->category = $_POST["category"];
        $budget->line = $_POST["line"];
        $budget->subline = $_POST["subline"];
        $budget->account = $_POST["account"];
        $budget->funding = $_POST["funding"];
        $budget->account_description = $_POST["account_description"];

        $budget->unit = $_POST["unit"];
        $budget->currency = $_POST["currency"];
        $budget->rate = $_POST["rate"];
        $budget->price = $_POST["price"];
        $budget->qty = $_POST["qty"];
        $budget->persons = $_POST["persone"];
        $budget->freq = $_POST["freq"];
        $budget->priceL = $_POST["priceL"];
        $budget->total = $_POST["total"];

        $budget->flow = $_POST["flow"];
        $budget->totalL = $_POST["totalL"];
        $budget->radio = " ";
        $budget->variance = $_POST["variance"];

        $budget->generation = $_POST["generation"];
        $budget->January = $_POST["January"];
        $budget->February = $_POST["February"];
        $budget->March = $_POST["March"];
        $budget->April = $_POST["April"];
        $budget->May = $_POST["May"];
        $budget->June = $_POST["June"];
        $budget->July = $_POST["July"];
        $budget->August = $_POST["August"];
        $budget->September = $_POST["September"];
        $budget->October = $_POST["October"];
        $budget->November = $_POST["November"];
        $budget->December = $_POST["December"];
        $budget->Quarter1 = $_POST["Quarter1"];
        $budget->Quarter2 = $_POST["Quarter2"];
        $budget->Quarter3 = $_POST["Quarter3"];
        $budget->Quarter4 = $_POST["Quarter4"];
        $budget->services = $_POST["services"];
        $budget->details = $_POST["details"];
        $budget->Year = $_POST["Year"];
        $budget = json_encode($budget);


       
        if ($_POST["action"] == 'create') {
            $instance = array('account' => $_POST["account"], 'parent_id' => $_POST["parent_id"], 'sync' => $_POST["sync"], 'action' => $_POST["action"], 'total' => $_POST["total"], 'enddate' => "", 'startdate' => "", 'initiative' => $_POST["initiative"], 'unit' => $_POST["unit"], 'department' => str_replace("_", " ", $_POST["department"]), 'period' => $_POST["period"], 'orgID' => '', 'content' => $budget, 'by' => $this->session->userdata('email'), 'created' => date('Y-m-d H:i:s'));
            $id = $this->Md->save($instance, 'instance');
            echo 'T';
        }
        if ($_POST["action"] == 'update') {
            $instance = array('account' => $_POST["account"], 'parent_id' => $_POST["parent_id"], 'sync' => $_POST["sync"], 'action' => $_POST["action"], 'total' => $_POST["total"], 'enddate' => "", 'startdate' => "", 'initiative' => $_POST["initiative"], 'unit' => $_POST["unit"], 'department' => str_replace("_", " ", $_POST["department"]), 'period' => $_POST["period"], 'orgID' => '', 'content' => $budget, 'by' => $this->session->userdata('email'), 'created' => date('Y-m-d H:i:s'));
            $id = $this->Md->update_sync($_POST["parent_id"], $instance, 'instance');
            echo 'T';
        }
        if ($_POST["action"] == 'delete') {
            $query = $this->Md->delete_sync($_POST["parent_id"], 'instance');
            echo 'd';
        }
        if ($_POST["down"] != "") {
            $get_result = $this->Md->show('instance');
            $all = array();
            if ($get_result) {
                foreach ($get_result as $loop) {
                    
                    $budget = new stdClass();
                    $budget->oid = $loop->id;
                    $details = $loop->content;
                    $details = json_decode($details);
                    foreach ($details as $key => $value) {
                          $budget->$key = $value;
                    }
                    array_push($all, $budget);
                    $budget = array('sync' => 'T', 'created' => date('Y-m-d'));
                    $this->Md->update($loop->id, $budget, 'instance');
                }
            }
            echo json_encode($all);
            return;
        }
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


        if ($account == "")
            $errors = " account ";
        if ($total == "")
            $errors.= " total ";
        if ($posts == "")
            $errors.= " multiple fields ";



        if ($posts != "" && $total != "" && $account != "") {
            $budget = new stdClass();

            foreach ($posts as $key => $value) {

                $budget->$value['name'] = $rowData[$d][10];
            }
            $budget = json_encode($budget);

            $instance = array('account' => $account, 'total' => $total, 'enddate' => $enddate, 'startdate' => $startdate, 'initiative' => $initiative, 'unit' => $unit, 'department' => $department, 'period' => $period, 'orgID' => '', 'content' => $budget, 'by' => $this->session->userdata('email'), 'created' => date('Y-m-d H:i:s'));
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
        } else {


            echo '<div class="alert alert-error">                                                  
                                                <strong>Missing field(s): <b>' . $errors . '</b> </strong>									
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
                            echo ' <td>' . number_format($value) . '</td>';
                        } else {
                            echo ' <td>' . $value . '</td>';
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
