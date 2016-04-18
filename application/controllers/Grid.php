<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Grid extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set("Africa/Nairobi");
    }

    public function index() {

        $this->load->view('add-budget', $data);
    }

    public function account() {
        $query = $this->Md->query("SELECT DISTINCT(account) AS account FROM budgets ORDER BY account DESC");
        echo json_encode($query);
    }
     public function department() {
        $query = $this->Md->query("SELECT DISTINCT(department) AS department FROM budgets ORDER BY department DESC");
        echo json_encode($query);
    }
       public function unit() {
        $query = $this->Md->query("SELECT DISTINCT(unit) AS unit FROM budgets ORDER BY unit DESC");
        echo json_encode($query);
    }

    public function grid() {

        $this->load->view('add-grid', $data);
    }

    public function summary() {
        $this->load->view('summary-page', $data);
    }
     public function view() {
        $query = $this->Md->query("SELECT * FROM budgets ");

        echo json_encode($query);
    }

    public function summaries() {

        $page = ($this->input->post('page')) ? intval($this->input->post('page')) : 1;
        $rows = ($this->input->post('rows')) ? intval($this->input->post('rows')) : 50;

        $items = array();
        date_default_timezone_set('UTC');
        for ($i = 1; $i <= $rows; $i++) {
            $index = $i + ($page - 1) * $rows;
            $query = $this->Md->query("SELECT * FROM budgets");
            foreach ($query as $loop) {

                $items[] = array('id' => $loop->id,
                    'account' => $loop->account,
                    'totalForeign' => $loop->totalForeign,
                    'unit' => $loop->unit,
                    'department' => $loop->department,
                    'period' => $loop->period,                   
                    'objectives' => $loop->account,                   
                    'category ' => $loop->category,
                    'line' => $loop->line,
                    'subline' => $loop->subline,                   
                    'priceForeign' => $loop->priceForeign,
                    'qty' => $loop->qty,
                    'persons' => $loop->persons,
                    'freq' => $loop->freq,
                    'priceLocal' => $loop->priceLocal,
                    'totalForeign' =>$loop->totalForeign,                   
                    'totalLocal' => $loop->totalLocal,
                 
                );
            }
        }
        $result = array();
        $result['total'] = count($query);
        $result['rows'] = $items;
        echo json_encode($result);
    }

    public function save() {

        $this->load->helper(array('form', 'url'));
        $instance = array('id' => $this->GUID(),
            'account' => $this->input->post('account'),
            'totalForeign' => $this->input->post('totalForeign'),
            'unit' => $this->input->post('unit'),
            'department' => str_replace("_", " ", $this->input->post('department')),
            'period' => $this->input->post('period'),
            'submitted' => $this->session->userdata('email'),
            'created' => date('Y-m-d H:i:s'),
            'activity ' => $this->input->post('activity'),
            'output' => $this->input->post('output'),
            'outcome' => $this->input->post('outcome'),
            'objectives' => $this->input->post('objectives'),
            'initiatives' => $this->input->post('initiatives'),
            'performance' => $this->input->post('performance'),
            'starts' => $this->input->post('starts'),
            'procurement' => $this->input->post('procurement'),
            'category ' => $this->input->post('category'),
            'line' => $this->input->post('line'),
            'subline' => $this->input->post('subline'),
            'funding ' => $this->input->post('funding'),
            'description' => $this->input->post('description'),
            //**isssue
            'currency' => $this->input->post('currency'),
            'rate' => $this->input->post('rate'),
            'priceForeign' => $this->input->post('priceForeign'),
            'qty' => $this->input->post('qty'),
            'persons' => $this->input->post('persons'),
            'freq' => $this->input->post('freq'),
            'priceLocal' => $this->input->post('priceLocal'),
            'totalForeign' => $this->input->post('totalForeign'),
            //**issue
            'flow' => $this->input->post('flow'),
            'totalLocal' => $this->input->post('totalLocal'),
            'variance' => $this->input->post('variance'),
            //**isssue
            'generation' => $this->input->post('generation'),
            'Jan' => $this->input->post('Jan'),
            'Feb' => $this->input->post('Feb'),
            'Mar' => $this->input->post('Mar'),
            'Apr' => $this->input->post('Apr'),
            'May' => $this->input->post('May'),
            'Jun' => $this->input->post('Jun'),
            'Jul' => $this->input->post('Jul'),
            'Aug' => $this->input->post('Aug'),
            'Sep' => $this->input->post('Sep'),
            'Oct' => $this->input->post('Oct'),
            'Nov' => $this->input->post('Nov'),
            'Dec' => $this->input->post('Dec'),
            'Q1' => $this->input->post('Q1'),
            'Q2' => $this->input->post('Q2'),
            'Q3' => $this->input->post('Q3'),
            'Q4' => $this->input->post('Q4'),
            'other' => "",
            ///***issue
            'details ' => $this->input->post('details'),
            'Year ' => $this->input->post('year'),
        );

        //  $budget = json_encode($budget);
        //  $instance = array('account' => $rowData[$d][13], 'total' => $rowData[$d][24], 'enddate' => "", 'startdate' => "", 'initiative' => $rowData[$d][7], 'unit' => $rowData[$d][2], 'department' => str_replace("_", " ", $rowData[$d][1]), 'period' => $rowData[$d][55], 'orgID' => '', 'content' => $budget, 'by' => $this->session->userdata('email'), 'created' => date('Y-m-d H:i:s'));
        $id = $this->Md->save($instance, 'budgets');
    }

   

    public function update() {

        $this->load->helper(array('form', 'url'));

        $id = $this->input->post('id');
        $instance = array('id' => $this->GUID(),
            'account' => $this->input->post('account'),
            'totalForeign' => $this->input->post('totalForeign'),
            'unit' => $this->input->post('unit'),
            'department' => str_replace("_", " ", $this->input->post('department')),
            'period' => $this->input->post('period'),
            'submitted' => $this->session->userdata('email'),
            'created' => date('Y-m-d H:i:s'),
            'activity ' => $this->input->post('activity'),
            'output' => $this->input->post('output'),
            'outcome' => $this->input->post('outcome'),
            'objectives' => $this->input->post('objectives'),
            'initiatives' => $this->input->post('initiatives'),
            'performance' => $this->input->post('performance'),
            'starts' => $this->input->post('starts'),
            'procurement' => $this->input->post('procurement'),
            'category ' => $this->input->post('category'),
            'line' => $this->input->post('line'),
            'subline' => $this->input->post('subline'),
            'funding ' => $this->input->post('funding'),
            'description' => $this->input->post('description'),
            //**isssue
            'currency' => $this->input->post('currency'),
            'rate' => $this->input->post('rate'),
            'priceForeign' => $this->input->post('priceForeign'),
            'qty' => $this->input->post('qty'),
            'persons' => $this->input->post('persons'),
            'freq' => $this->input->post('freq'),
            'priceLocal' => $this->input->post('priceLocal'),
            'totalForeign' => $this->input->post('totalForeign'),
            //**issue
            'flow' => $this->input->post('flow'),
            'totalLocal' => $this->input->post('totalLocal'),
            'variance' => $this->input->post('variance'),
            //**isssue
            'generation' => $this->input->post('generation'),
            'Jan' => $this->input->post('Jan'),
            'Feb' => $this->input->post('Feb'),
            'Mar' => $this->input->post('Mar'),
            'Apr' => $this->input->post('Apr'),
            'May' => $this->input->post('May'),
            'Jun' => $this->input->post('Jun'),
            'Jul' => $this->input->post('Jul'),
            'Aug' => $this->input->post('Aug'),
            'Sep' => $this->input->post('Sep'),
            'Oct' => $this->input->post('Oct'),
            'Nov' => $this->input->post('Nov'),
            'Dec' => $this->input->post('Dec'),
            'Q1' => $this->input->post('Q1'),
            'Q2' => $this->input->post('Q2'),
            'Q3' => $this->input->post('Q3'),
            'Q4' => $this->input->post('Q4'),
            'other' => "",
            ///***issue
            'details ' => $this->input->post('details'),
            'Year ' => $this->input->post('year'),
        );
        $this->Md->update($id, $instance, 'budgets');
        echo json_encode($instance);
    }

    public function delete() {
        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('id');

        $query = $this->Md->delete($id, 'budgets');

        if ($this->db->affected_rows() > 0) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => FALSE));
        }
    }

    public function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
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

                        $instance = array('id' => $this->GUID(),
                            'account' => $rowData[$d][13],
                            'totalForeign' => $rowData[$d][24],
                            'unit' => $rowData[$d][2],
                            'department' => str_replace("_", " ", $rowData[$d][1]),
                            'period' => $rowData[$d][55],
                            'submitted' => $this->session->userdata('email'),
                            'created' => date('Y-m-d H:i:s'),
                            'activity ' => $rowData[$d][3],
                            'output' => $rowData[$d][4],
                            'outcome' => $rowData[$d][5],
                            'objectives' => $rowData[$d][6],
                            'initiatives' => $rowData[$d][7],
                            'performance' => $rowData[$d][8],
                            'starts' => $rowData[$d][27],
                            'starts' => $rowData[$d][28],
                            'Procurement' => $rowData[$d][9],
                            'category ' => $rowData[$d][10],
                            'line' => $rowData[$d][11],
                            'subline' => $rowData[$d][12],
                            'funding ' => $rowData[$d][15],
                            'description' => $rowData[$d][14],
                            //**isssue
                            'currency' => $rowData[$d][17],
                            'rate' => $rowData[$d][18],
                            'priceForeign' => $rowData[$d][19],
                            'qty' => $rowData[$d][20],
                            'persons' => $rowData[$d][21],
                            'freq' => $rowData[$d][22],
                            'priceLocal' => $rowData[$d][23],
                            'totalForeign' => $rowData[$d][24],
                            //**issue
                            'flow' => $rowData[$d][10],
                            'totalLocal' => $rowData[$d][23],
                            'variance' => $rowData[$d][25],
                            //**isssue
                            'generation' => $rowData[$d][10],
                            'Jan' => $rowData[$d][31],
                            'Feb' => $rowData[$d][32],
                            'Mar' => $rowData[$d][33],
                            'Apr' => $rowData[$d][34],
                            'May' => $rowData[$d][35],
                            'Jun' => $rowData[$d][36],
                            'Jul' => $rowData[$d][37],
                            'Aug' => $rowData[$d][38],
                            'Sep' => $rowData[$d][39],
                            'Oct' => $rowData[$d][40],
                            'Nov' => $rowData[$d][41],
                            'Dec' => $rowData[$d][42],
                            'Q1' => $rowData[$d][45],
                            'Q2' => $rowData[$d][46],
                            'Q3' => $rowData[$d][47],
                            'Q4' => $rowData[$d][48],
                            'other' => "",
                            ///***issue
                            'details ' => $rowData[$d][54],
                            'Year ' => $rowData[$d][55],
                        );

                        //  $budget = json_encode($budget);
                        //  $instance = array('account' => $rowData[$d][13], 'total' => $rowData[$d][24], 'enddate' => "", 'startdate' => "", 'initiative' => $rowData[$d][7], 'unit' => $rowData[$d][2], 'department' => str_replace("_", " ", $rowData[$d][1]), 'period' => $rowData[$d][55], 'orgID' => '', 'content' => $budget, 'by' => $this->session->userdata('email'), 'created' => date('Y-m-d H:i:s'));
                        $id = $this->Md->save($instance, 'budgets');
                    }
                }
                //  Insert row data array into your database of choice here
            }
//send the data in an array format

            fclose($file);
            // redirect('/all');
        }

        echo '<div class="alert alert-info">   <strong>Information uploaded!  </strong>	</div>';
        redirect('grid/grid', 'refresh');
    }

}
