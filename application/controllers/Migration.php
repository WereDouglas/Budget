<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration extends CI_Controller {

    function __construct() {

        parent::__construct();
        // error_reporting(E_PARSE);
        //$this->load->model('Md');
        //  $this->load->library('session');
        //$this->load->library('encrypt');
    }

    public function index() {
        $this->load->view('file');
    }

    public function execute() {

        $file_element_name = 'userfile';

        $config['upload_path'] = 'uploads/';
        // $config['upload_path'] = '/uploads/';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = FALSE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_element_name)) {
            $status = 'error';
            echo $msg = $this->upload->display_errors('', '');
        } else {
            $data = $this->upload->data();

            $file = $data['file_name'];

            // Name of the file
            $filename = 'uploads/' . $file;
// MySQL host
            $mysql_host = 'localhost';
// MySQL username
            $mysql_username = 'root';
            //novaris2_source
// MySQL password
            $mysql_password = '';
            
            //Out.2015
// Database name
            $mysql_database = 'outsource';
// //novaris2_outsource
// Connect to MySQL server
            mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
            mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

// Temporary variable, used to store current query
            $templine = '';
// Read in entire file
            $lines = file($filename);
// Loop through each line
            foreach ($lines as $line) {
// Skip it if it's a comment
                if (substr($line, 0, 2) == '--' || $line == '')
                    continue;

// Add this line to the current segment
                $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
                if (substr(trim($line), -1, 1) == ';') {
                    // Perform the query
                    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                    // Reset temp variable to empty
                    $templine = '';
                }
            }
            echo "Tables imported successfully";
              $this->load->view('file');
        }
    }

    public function drop() {
        $mysqli = new mysqli("localhost", "root", "", "outsource");
        $mysqli->query('SET foreign_key_checks = 0');
        if ($result = $mysqli->query("SHOW TABLES")) {
            while ($row = $result->fetch_array(MYSQLI_NUM)) {
                $mysqli->query('DROP TABLE IF EXISTS ' . $row[0]);
            }
        }

        $mysqli->query('SET foreign_key_checks = 1');
        $mysqli->close();
          echo "Tables Dropped";
         $this->load->view('file');
    }

}
