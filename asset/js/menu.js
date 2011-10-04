var modul;
// ROUTINE - AJAX LOAD MODULE
function menu_ajax(module,kat_id,dvd_nama)
{
	modul = module;
	
	if (kat_id == null)
		kat_id = 0;
		
	if (dvd_nama == null)
		dvd_nama = 0;
		
	var controller,
		mod_class = module.split('_');
	
	switch (module) {
		case 'home':
			controller = 'index.php/dvdgames_online/home';
		break;
		case 'about':
			controller = '#';
		break;
		default:
			controller = 'index.php/mod_'+mod_class[0]+'/'+module+'/index/'+kat_id+'/'+dvd_nama;
		break;
	}
  
  $("#content-ajax").load(controller,function(data){

  });
  
	return controller;
}

$(document).ready(function(){
	// ROUTINE - LAVALAMP CALLBACK
	var lava = $("ol.lavalamp");
	lava.lavaLamp({ 
		fx: "easeOutBack", 
		speed: 1000,
		click: function(event, menuItem) {
			var module = $('a',menuItem).attr('module');
			// CALL FUNC MENU AJAX
			if (module != '')
				menu_ajax(module);
			return false; 
		},
		startItem: 1, 
		autoReturn: true,
		returnDelay: 0,
		setOnClick: true,
		homeTop:146,
		homeLeft:220,
		homeWidth:0,
		homeHeight:0,
		returnHome:false
	});
	
	menu_ajax('home');

  // MOVE LAVALAMP
  $('#footer-right a').click(function() {
    var move_to = $(this).attr('module');
    $('ol.lavalamp a[module='+move_to+']').parent().trigger('mouseover').trigger('click');
    return false;
  });
  
});