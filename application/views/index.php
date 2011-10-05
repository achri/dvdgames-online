<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<HEAD>
  <TITLE>
  <?php 
    if (isset($title)): 
      echo $title;
    else:
      echo "DVDGames-Online.COM";
    endif;
  ?>
  </TITLE>
  <?php 
  $meta = array(
    array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
    array('name' => 'description', 'content' => 'Penjualan DVD Games Online'),
    array('name' => 'keywords', 'content' => 'penjualan, dvd, games, online'),
    array('name' => 'author', 'content' => 'Achri Kurniadi'),
    array('name' => 'copyright', 'content' => '2011 by Achri Kurniadi'),
  );

  echo meta($meta); 
  echo link_tag('asset/images/layout/dvd1.png', 'shortcut icon', 'image/ico');
  echo link_tag('feed', 'alternate', 'application/rss+xml', 'My RSS Feed');

  $link = array(
    'id' => 'ui-themes',
    'href' => 'asset/src/jquery/themes/'.$this->config->item('themes_default').'/jquery.ui.all.css',
    'rel' => 'stylesheet',
    'type' => 'text/css',
    'media' => 'screen'
  );
  echo link_tag($link);

  if (isset($loaderContent)):
    echo $loaderContent;
  endif;
  ?>
  <base href="<?php echo base_url()?>"/>
</HEAD>
<BODY>
<div class="dialog-content"></div>
<div class="dialog-validasi"></div>
<div id="review-dialog">
	<div id="review-content"></div>
</div>

<div id="glare" class="">
  <div id="glare-image"></div>
</div>
<?php
if (!$this->config->item('uc')):
?>
<DIV id=wrap>
  <DIV id="header" class="ui-widget-header">
    <div id="banner-warp">
      <div id="logo"><H1>DVDGames-Online.COM</H1></div>
      <div id="slogan"><a>Pembelian DVD Games Online</a></div>
    </div>
    <div id="themes">themes 
      <select onChange="ui_switch(this.value);" class="ui-widget-select ui-widget-content">
        <?php
          $url_themes = directory_map('./asset/src/jquery/themes/', TRUE);
          $no = 1;
          foreach ($url_themes as $themes): 
        ?>
            <option value="<?php echo $themes?>" <?php echo ($themes==$this->config->item('themes_default'))?('SELECTED'):('')?>>skin <?php echo $no?></option>
        <?php
          $no++;
          endforeach;
        ?>
      </select>
    </div>
  </DIV>
  
  <DIV id="menu" class="ui-state-hover">
    <DIV>
      <ol id="menu_lava" class="lavalamp">
        <li><a href="#" module="home">Halaman Utama</a></li> 
        <li><a href="#" module="list_dvd">Daftar DVD</a></li> 
        <li><a href="#" module="list_belanja">Rincian Pemesanan</a></li>
        <li><a href="#" module="list_tracking">Tracking</a></li> 
        <li><a href="#" module="about">Hubungi Kami</a></li>  
      </ol>
    </DIV>
  </DIV>
  <DIV id="submenu" class="ui-widget-header">THIS SUB MENU</DIV>
  
  <DIV id="content-wrap" class="content-wrap ui-widget-content" style="width:100%">
    <DIV id="content">
      <DIV id="content-ajax" class="box ui-state-highlight ui-corner-all">
      <!-- THIS CONTENT AJAX -->
      </DIV>
      <DIV class="content-footer ui-state-hover ui-corner-all">
        <div class="jc-prev"><span class="ui-icon ui-icon-circle-arrow-w"></span><!--img src="<?php base_url()?>asset/images/left.png"--></div>
        <div class="jc-next"><span class="ui-icon ui-icon-circle-arrow-e"></span><!--img src="<?php base_url()?>asset/images/right.png"--></div>
        <div class="content-best-dvd"> 
          <!-- THIS CONTENT AJAX -->
        </div>
      </DIV>
      <DIV class="category-sel ui-widget-content ui-corner-all">
        <!-- THIS CONTENT AJAX -->
      </DIV>
    </DIV>
    
    <DIV id="sidebar">
      <DIV id="cart-box" class="ui-state-highlight ui-corner-all mfont">
      <h4><span class="ui-icon ui-icon-cart">CART</span>Rincian Pemesanan</h4>
        <DIV id="cart-list">
                
        </DIV>
      </DIV>
              
      <DIV class="category ui-corner-all mfont">
        
      </DIV>
    </DIV>
  </DIV>
  <DIV id="content-wrap-full" class="content-wrap ui-widget-content" style="width:100%">
  </DIV>

  <DIV id="footer-right" class="ui-widget ui-widget-header">
    <p>
        <A href="#" module="home">home</A>
        | <A href="#" module="list_dvd">dvd</A> 
        | <A href="#" module="list_belanja">rincian</A> 
        | <A href="#" module="list_tracking">tracking</A> 
        | <A href="#" module="list_checklist">info list</A> 
    </p>
    <p id="owner"><a>&copy; 2011 dvdgames-online.com&trade; All Right Reserved</a></p>
  </DIV>

  <DIV id="footer-left" class="ui-widget ui-widget-content">
    <div class="footer-login">
      <button id="login-pane" class="login ui-widget-header ui-corner-all">
        <span style="float:left" class="lrow1 ui-icon ui-icon-circle-arrow-w"></span> SLIDE 
      </button>
      <button class="login ui-widget-header ui-corner-all">
        <span id="signup" style="float:left" class="lrow2 ui-icon ui-icon-person"></span> CS 
      </button>
    </div>
    <DIV id="login">
    
    </DIV>
  </DIV>
</DIV>
<?php 
else:
  $this->load->view('mod_info/info_uc_view');
endif;
?>
<div id="glare-foot" class="">
  <div id="glare-foot-image"></div>
</div>
</BODY>
</HTML>
