$(document).ready(function() {
	$('#login-pane').toggle(
		function(){
			$('#footer-left').animate({width:'421px'},1000,function(){
				$('#login').show();
				$('.lrow1').removeClass('ui-icon-circle-arrow-w').addClass('ui-icon-circle-arrow-e').css('float','right');
				$('.lrow2').css('float','right');
			});
		},
		function(){
			$('#login').hide();
			$('#footer-left').animate({width:'85px'},1500,function(){
				$('.lrow1').removeClass('ui-icon-circle-arrow-e').addClass('ui-icon-circle-arrow-w').css('float','left').text('LOGIN');
				$('.lrow2').css('float','left');
			});
		}
	);
});