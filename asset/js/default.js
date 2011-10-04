function ui_switch(themes) {
	$('#ui-themes').attr('href','asset/src/jquery/themes/'+themes+'/jquery.ui.all.css');
}

$(document).ready(function(){
	//AJAX LOADING
	var loader = $('<span style="position:relative; margin-left:10px; z-index:10; color:white; text-align:center;"><img src="asset/images/layout/progressbar_microsoft.gif" height="10"></span>')
		.appendTo("#slogan")
		.hide();
	var error = $('<span style="position:absolute; margin-left:10px; z-index:10; color:white; text-align:center;"><h4>halaman tidak tersedia</h4></span>')
		.appendTo("#slogan")
		.hide();
	
	// AJAX HANDLING
	$('*').ajaxStart(function() {
		error.hide();
		loader.show();
		//$('#content-wrap').block(block_opt);
	}).ajaxStop(function() {
		loader.hide();
	}).ajaxSend(function(evt, request, settings) {
		loader.show();
	}).ajaxComplete(function(request, settings){
		//$('#content-wrap').unblock();
	}).ajaxSuccess(function(evt, request, settings){
		error.hide();
		loader.hide();
	}).ajaxError(function(event, request, settings) {
		error.show();
		loader.show();
		//throw settings;
	});
	
	// ALL BUTTON MUST CURSORED POINTER
	$(':button').css('cursor','pointer');
	
	/* DISABLE FUNCTION BROWSER BACK BUTTON */
	window.history.forward(1);
});
