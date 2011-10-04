<?php if ( ! defined('BASEPATH')) exit($this->lang->line('basepath'));
/*
 @author		Achri
 @date creation	04/10/2011
 @model
	- 
 @view
	- 
 @library
		- JS
		- PHP
 @comment
	- Class First Loader
*/

class List_dvd extends DVD_Controller
{
  // PUBLIC STATIC VARIABLE
  public static $link_controller, $link_view;
  // CONSTRUCTOR
  function __construct() 
  {
    parent::__construct();
    $class = get_class($this);
    $this->_loader();
    $output = array();
    $output += $this->_headerContent();
    $output += $this->_publicStatic($class);
    //$output += $this->_variable();

    $this->load->vars($output);

    log_message('debug', "Controller $class init success");
  }
  // LOADER 
  function _loader()
  {
  
  }
  // LOADER JS AND CSS
  function _headerContent()
  {
    $content = '';
    $arrayCSS = array(
    
    );
    $arrayJS = array(
    
    );

    if (is_array($arrayCSS))
    foreach ($arrayCSS as $css):
      $content .= "<link type=\"text/css\" rel=\"stylesheet\" href=\"".base_url().$css."\"/>\n";
    endforeach;

    if (is_array($arrayJS))
    foreach ($arrayJS as $js):
      $content .= "<script type=\"text/javascript\" src=\"".base_url().$js."\"/></script>\n";
    endforeach;

    $output['headerContent'] = $content;

    return $output;
  }
  // INITIALING PUBLIC STATIC VARIABLE
  function _publicStatic($class)
  {
    // public variable
    self::$link_controller = 'mod_list/'.$class;
    self::$link_view = 'mod_list/'.$class;
    $output['link_view'] = self::$link_view;
    $output['link_controller'] = self::$link_controller;
    return $output;
  }
  // INDEX
  function index()
  {
    $this->load->view(self::$link_view.'/dvd_index');
  }
}

/* End of file dvdgames_online.php */
/* Location: ./application/controllers/dvdgames_online.php */