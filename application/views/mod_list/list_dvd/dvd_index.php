<?php echo $headerContent;?>
<SCRIPT TYPE="text/javascript">
var set_page,tot_page,page;
function pagina() {
	tot_page  = $('#tot_page').val();
	page = $('#page').val();
	$('#dvd_page').val(page);
	$('.selpage').text('['+page+'/'+tot_page+']');
	$('.pagina ui-icon-seek-prev').show();
	$('.pagina ui-icon-seek-next').show();
	$('.pagina ui-icon-seek-start').show();
	$('.pagina ui-icon-seek-end').show();
	return false;
}

$('.pagina').click(function() {
	var type = $(this);
	if (type.hasClass('ui-icon-seek-start')) 
		set_page = 1;
	else if (type.hasClass('ui-icon-seek-next')) 
		set_page = Number(page) + 1;
	else if (type.hasClass('ui-icon-seek-prev')) 
		set_page = Number(page) - 1;
	else if (type.hasClass('ui-icon-seek-end')) 
		set_page = Number(tot_page);
	$('#dvd_page').val(set_page);
	get_dvd();
	return false;
});

// MOUSE WHELL
$('#list-dvd').mousewheel(function(obj,idx){
  var condition = false;
  if (Math.ceil(idx) <= 0) {
    if (Number(page) < Number(tot_page)) {
      set_page = Number(page) + 1;
      condition = true;
    }
  } 
  else {
    if (Number(page) > 1) {
      set_page = Number(page) - 1;
      condition = true;
    }
  }
  if (condition) {
    $('#dvd_page').val(set_page);
    get_dvd();
  }
	return false;
});

function get_dvd() {
	try {
		$.ajax({
			url: '<?php echo site_url($link_controller)?>/get_list_dvds',
			type: 'POST',
			data: $('#fcari').formSerialize(),
			success: function(data) {
				$('#list-dvd').html(data);
			},
      error: function(e) {
        
      }
		});
	} catch(e) {}
	return false;
}

get_dvd();
$('#dvd_nama').focus();
</SCRIPT>
<form id='fcari' onsubmit='return false;'>
  <DIV class="ui-widget-content ui-corner-tl ui-corner-tr">
    <table width="100%" cellpadding=0 cellspacing=0>
    <tr align="center">
      <td>
        Kategori :
        <select id="kat_id" name="kat_id" class="ui-state-hover ui-corner-tr ui-corner-tl" style="font-size:10px">
        <option value="0">[ SEMUA ]</option>
        <?php 
        if (isset($data_categories)):
          if ($data_categories->num_rows() > 0):
          foreach ($data_categories->result() as $rkat):
        ?>
          <option value="<?php echo $rkat->kat_id?>" <?php echo ($rkat->kat_id == (isset($kat_id)?($kat_id):('')))?('SELECTED'):('')?>>[ <?php echo $rkat->kat_nama?> ]</option>
        <?php
          endforeach;
          endif;
        endif;
        ?>
        </select>
      </td>
      <td>
        Judul :
        <input id="dvd_nama" name="dvd_nama" class="ui-state-hover" style="font-size:10px;height:16px;width:130px;" value="<?php echo (isset($dvd_nama))?($dvd_nama):('')?>"></td>
      </td>
      <td align="center" valign="top">
        <input type="hidden" id="dvd_page" name="page" value="1">
        <a class="pagina ui-icon ui-icon-seek-start"></a>
        <a class="pagina ui-icon ui-icon-seek-prev"></a>
        <a class="pagina selpage">[page]</a>
        <a class="pagina ui-icon ui-icon-seek-next"></a>
        <a class="pagina ui-icon ui-icon-seek-end"></a>
      </td>
    </tr>
    </table>
  </DIV>
</form>

<DIV id="list-dvd">

</DIV>
