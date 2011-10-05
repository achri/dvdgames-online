<?php if ( ! defined('BASEPATH')) exit($this->lang->line('basepath'));

class Dvd_controller extends CI_Controller 
{
  function __construct() 
  {
    parent::__construct();
    // LANG BASEPATH
    $this->lang->load('info_page', 'indonesia');
  }
}