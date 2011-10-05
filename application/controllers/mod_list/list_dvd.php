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
    $class = strtolower(get_class($this));
    $this->_loader();
    $output = array();
    $output += $this->_headerContent();
    $output += $this->_publicStatic($class);
    $output += $this->_dataRecords();
    //$output += $this->_variable();

    $this->load->vars($output);

    log_message('debug', "Controller $class init success");
  }
  // LOADER 
  function _loader()
  {
    $this->load->library(array(
      "pagination",
    ));
    $this->load->helper(array(
      "text",
    ));
    $this->load->model(array(
      'tbl_category','tbl_dvd'
    ));
  }
  // LOADER JS AND CSS
  function _headerContent()
  {
    $content = '';
    $arrayCSS = array(
    'asset/css/dvd.css',
    );
    $arrayJS = array(
    'asset/src/jQuery/plugins/other/jquery.mousewheel.js',
    'asset/js/list_dvd.js',
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
  // GET DATA RECORDS
  function _dataRecords()
  {
    $output['data_categories'] = $this->tbl_category->get_data_categories();
    return $output;
  }
  // INDEX
  function index()
  {
    $data[''] = '';
    $this->load->view(self::$link_view.'/dvd_index',$data);
  }
  // LIST DVD
  function get_list_dvds()
  {
    $page = $this->input->post('page');
    $kat_id = $this->input->post('kat_id');
    $dvd_nama = $this->input->post('dvd_nama');

    $data['page'] = $page;
    $data['kat_id'] = $kat_id;
    $data['dvd_nama'] = $dvd_nama;
    
    // GET ROW COUNT OF SEARCHING RECORD
    $count = $this->tbl_dvd->get_peritem_dvds($kat_id,$dvd_nama,0,FALSE)->num_rows();
    $tot_page = ceil($count / $this->config->item('dvd_limit'));
    $data['tot_page'] = $tot_page;
    
    // CALCULATION POSITION RECORD OF PAGE
    $pos = $this->config->item('dvd_limit');
    if( $count > 0 )
      $total_pages = ceil($count/$pos);
    else
      $total_pages = 0;
    if ($page > $total_pages)
      $page=$total_pages;
    $limitstart = $pos*$page - $pos; 
    $limitstart = ($limitstart < 0)?0:$limitstart;
    if( !isset($limitstart) || $limitstart == '' )
      $limitstart = 0;
    if( isset($limitstart) && !empty($pos) )
      $pos = $limitstart;
    // END
    
    $data['data_dvd'] = $this->tbl_dvd->get_peritem_dvds($kat_id,$dvd_nama,$pos,TRUE);
    $this->load->view(self::$link_view.'/dvd_items',$data);
  }
}

/* End of file dvdgames_online.php */
/* Location: ./application/controllers/dvdgames_online.php */