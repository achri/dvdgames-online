<?php //echo $headerContent;?>
<script language="javascript">
$(document).ready(function() {
	pagina();
});
</script>
<input type="hidden" id="tot_page" value="<?php echo (isset($tot_page))?($tot_page):('');?>">
<input type="hidden" id="page" value="<?php echo (isset($page))?($page):('');?>">

<div id="dvd-box">
	<ul id="dvd-box-list" class="dvd-box-list ui-helper-reset ui-helper-clearfix" style="height=100%">
  <?php 
  if (isset($data_dvd)):
    if ($data_dvd->num_rows() > 0):
    foreach ($data_dvd->result() as $row_dvd):
    ?>
    <li id="<?php echo $row_dvd->dvd_id?>" kat_id="<?php echo $row_dvd->kat_id?>" class="ui-widget-content dvd-box-list-corner">
			<h5 class="ui-widget-header"><?php echo character_limiter($row_dvd->dvd_nama,10,' ...')?></h5>
			<table width="100%" border=0 cellpadding=0 cellspacing=0>
			<tr>
				<td align="center">
					<img src="uploaded/thumb/<?php echo ($row_dvd->dvd_gambar)?($row_dvd->dvd_gambar):('na.png')?>" alt="<?php echo $row_dvd->dvd_nama?>" judul="<?php echo $row_dvd->dvd_nama?>"/>
				</td>
			</tr>
			</table>
			<a href="uploaded/thumb/<?php echo $row_dvd->dvd_gambar?>" title="Spesifikasi" class="ui-icon ui-icon-zoomin">View larger</a>
			<span style="position:absolute;margin-left:-25px"><img src="<?php echo "asset/images/stars/".$row_dvd->dvd_rating.".png";?>" width="50"/></span>
			<a href="#" title="Order" class="ui-icon ui-icon-cart">Delete image</a>
		</li>
    <?php
    endforeach;
    endif;
  endif;
  ?>
  </ul>
</div>