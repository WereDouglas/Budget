<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Helper {
    
public function __construct()
  {
    $CI =& get_instance();
    $CI->load->helper('url');
    
  }
   public function allowed ($sessdata,$action){
    
        return (strpos($sessdata,$action) != true);    
  }
}