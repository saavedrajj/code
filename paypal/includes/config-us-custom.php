<?php
require_once('functions.php');
$sandbox = true;
$api_version = '122.0';
$ipn_listener = "http://saavedrajj.com/code/paypal/ipn/ipn-listener.php";
$footer_text = "&copy; ".date('Y')." <a href='http://saavedrajj.com' target='_blank'>Juan Saavedra</a> <a href='http://twitter.com/saavedrajj' target=_blank>@saavedrajj</a>";
if ($_SERVER['REMOTE_ADDR']=='127.0.0.1') 
	{ $webserver = "http://127.0.0.1/"; } else { $webserver = "http://saavedrajj.com/"; }
$api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';


	$api_username = $sandbox ? 'seller2_api1.sandbox2.dav' : 'LIVE_USERNAME_GOES_HERE';
	$api_password = $sandbox ? '1368626715' : 'LIVE_PASSWORD_GOES_HERE';
	$api_signature = $sandbox ? 'Aouf9KzajKFXKHAdcbit6VEj9oTsAm1.gEEC-DVj5x-y41iJldIJSXpZ' : 'LIVE_SIGNATURE_GOES_HERE';


