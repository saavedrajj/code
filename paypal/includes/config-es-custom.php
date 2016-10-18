<?php
require_once('functions.php');
$sandbox = true;
$api_version = '122.0';
$ipn_listener = "http://saavedrajj.com/code/paypal/ipn/ipn-listener.php";
//$footer_text = "&copy; ".date('Y')." <a href='http://saavedrajj.com' target='_blank'>Juan Saavedra</a> <a href='http://twitter.com/saavedrajj' target=_blank>@saavedrajj</a>";
$footer_text = "&copy; 2016 <a href='http://saavedrajj.com' target='_blank'>Juan Saavedra</a> <a href='http://twitter.com/saavedrajj' target=_blank>@saavedrajj</a>";
if ($_SERVER['REMOTE_ADDR']=='127.0.0.1') 
{ $webserver = "http://127.0.0.1/"; } else { $webserver = "http://saavedrajj.com/"; }
$api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
$api_username = $sandbox ? 'es_custom_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
$api_password = $sandbox ? 'UMEXLVWX37Y83JKZ' : 'LIVE_PASSWORD_GOES_HERE';
$api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31ApkzoMMUVFlOXP39M403AsYefKoc' : 'LIVE_SIGNATURE_GOES_HERE';
$my_merchant_id = 'FY2UX5FTQXYHU';
