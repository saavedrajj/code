<?php
require_once('functions.php');
$sandbox = true;
$api_version = '122.0';
$ipn_listener = "http://saavedrajj.com/code/paypal/ipn/ipn-listener.php";
$footer_text = "&copy; ".date('Y')." <a href='http://saavedrajj.com' target='_blank'>Juan Saavedra</a> <a href='http://twitter.com/saavedrajj' target=_blank>@saavedrajj</a>";
if ($_SERVER['REMOTE_ADDR']=='127.0.0.1') 
{ $webserver = "http://127.0.0.1/"; } else { $webserver = "http://saavedrajj.com/"; }
$api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
/*
	$api_username 	= urlencode('uk_pro2_api1.saavedrajj.com'); 
	$api_password	= urlencode('PZM2V7J27VF84MT6'); 
	$api_signature 	= urlencode('AB8A.PWhf6.zcGodF7MJ7SOIIf1cAZJZlcO2piQVeGC9kYvJy7GZeJ-b'); 
*/


$api_username = $sandbox ? 'uk_merchant_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
$api_password = $sandbox ? 'LKNLUNZ3USTHQBU4' : 'LIVE_PASSWORD_GOES_HERE';
$api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31AYIzFJxn8b.gOizb1wSGL-8sE9tu' : 'LIVE_SIGNATURE_GOES_HERE';


/*
    $api_username = $sandbox ? '' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? '' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? '' 


    $api_username 	= urlencode('es_custom_api1.saavedrajj.com'); 
	$api_password	= urlencode('UMEXLVWX37Y83JKZ'); 
	$api_signature 	= urlencode('AFcWxV21C7fd0v3bYYYRCpSSRl31ApkzoMMUVFlOXP39M403AsYefKoc'); 

	*/