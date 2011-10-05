$('#kat_id').change(function() {
	$('#dvd_nama').val('').focus();
	$('#dvd_page').val(1);
	get_dvd();
	return false;
});

var tOut;
$('#dvd_nama, #dvd_page').keyup(function(event) {
	clearTimeout(tOut);
	tOut = window.setTimeout(get_dvd,1000);
	return false;
});

