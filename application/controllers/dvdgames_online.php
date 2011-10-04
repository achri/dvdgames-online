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
class Dvdgames_online extends DVD_Controller 
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
    $this->load->helper(array(
      "text",
    ));
  }
  // LOADER JS AND CSS
  function _headerContent()
  {
    $content = '';
    $arrayCSS = array(
    // default
    'asset/css/default.css',
    'asset/css/menu.css',
    'asset/css/category.css',
    'asset/css/cart.css',
    'asset/css/best_seller.css',
    );
    $arrayJS = array(
    // jQuery
    'asset/src/jquery/core/jquery-1.6.4.js',
    'asset/src/jquery/ui/jquery-ui-1.8.12.custom.js',
    // menu
    'asset/src/jquery/plugins/other/jquery.lavalamp.js',
    'asset/src/jquery/plugins/other/jquery.easing.js',
    // 
    'asset/js/default.js',
    'asset/js/footer.js',
    'asset/js/menu.js',
    'asset/js/menu_lava.js',
    );

    if (is_array($arrayCSS))
    foreach ($arrayCSS as $css):
      $content .= "<link type=\"text/css\" rel=\"stylesheet\" href=\"".base_url().$css."\"/>\n";
    endforeach;

    if (is_array($arrayJS))
    foreach ($arrayJS as $js):
      $content .= "<script type=\"text/javascript\" src=\"".base_url().$js."\"/></script>\n";
    endforeach;

    $output['loaderContent'] = $content;

    return $output;
  }
  // INITIALING PUBLIC STATIC VARIABLE
  function _publicStatic($class)
  {
    // public variable
    self::$link_controller = $class;
    self::$link_view = 'mod_home';
    $output['link_view'] = self::$link_view;
    $output['link_controller'] = self::$link_controller;
    return $output;
  }
  // INDEX
  function index()
  {
    $this->load->view('index');
  }
  // HOME
  function home()
  {
    echo 'HOME';
  }
}

/* End of file dvdgames_online.php */
/* Location: ./application/controllers/dvdgames_online.php */