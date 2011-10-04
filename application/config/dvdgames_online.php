<?php if (!defined('BASEPATH')) exit('PERINGATAN !!! TIDAK BISA DIAKSES SECARA LANGSUNG ...'); 

// BASE DIRECT OPENSSL OR NATIVE SERVER PROTOCOL @AHRIE
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$wwwp = 'https://';
} else {
	$wwwp = 'http://';
}
$config['base_url'] = $wwwp.$_SERVER['SERVER_NAME'].'/dvdgames-online';

// CONFIG HARGA
$config['harga_dvd'] = 30000;
$config['harga_cd'] = 15000;

// EMAIL
$config['email_admin'] = "administrator@localhost";
$config['email_selles'] = "selles@localhost";

// DEBUG
$config['debug'] = true;

// UNDERCONTRACTION
$config['uc'] = false;

// DEFAULT SKIN
$config['themes_default'] = 'dark-hive';