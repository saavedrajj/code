<?php
date_default_timezone_set('Europe/Dublin');
require_once('functions.php');
$sandbox = true;
$api_version = '122.0';
$paypal_account = "esintegracion@paypal.com";
$paypal_account = "uk_custom@saavedrajj.com";



$ipn_listener = "http://saavedrajj.com/code/paypal/ipn/ipn-listener.php";
$footer_text = "&copy; ".date('Y')." <a href='http://saavedrajj.com' target='_blank'>Juan Saavedra</a> <a href='http://twitter.com/saavedrajj' target=_blank>@saavedrajj</a>";
if ($_SERVER['REMOTE_ADDR']=='127.0.0.1') { $webserver = "http://127.0.0.1/"; } else { $webserver = "http://saavedrajj.com/"; }

  switch ($paypal_account) {
    case "jusaavedra@paypal.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'jusaavedra_api1.paypal.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? 'ETZKJ8KC7EFKEQVK' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31A02v2IipNb2rQjp58DqPrRWE0uh6' : 'LIVE_SIGNATURE_GOES_HERE';
    break;
    case "es_business@saavedrajj.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'es_business_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? '23YK9AX4Z3ATE4NF' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31A3rmwfGZCpkIlj.CyiqUuLYp2-tQ' : 'LIVE_SIGNATURE_GOES_HERE';
    break;
    case "es_pro@saavedrajj.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'es_pro_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? 'UZ8C9ZTJ58MNKK3M' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31A9MZvJqeAQiB9ylH9q6qwUPkT4Er' : 'LIVE_SIGNATURE_GOES_HERE';
    break;
    case "us_business@saavedrajj.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'us_business_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? 'EMXHLXZLCCDJ9ECH' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'AxmadereawjG3cObM82RAZYmxRqVArRJxc2qFIyqLGXsjVxpmwQMUw8g' : 'LIVE_SIGNATURE_GOES_HERE';
    break;
    case "us_personal@saavedrajj.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'us_business_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? 'EMXHLXZLCCDJ9ECH' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'AxmadereawjG3cObM82RAZYmxRqVArRJxc2qFIyqLGXsjVxpmwQMUw8g' : 'LIVE_SIGNATURE_GOES_HERE';
    break;
    case "esintegracion@paypal.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'esintegracion_api1.paypal.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? 'N9RBQ66HZC2FAPUA' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'AydS4oase0tNkVM5L0C828ZsAriXAnqlS61Du6Q6Sp2XJXC9Q.dci.8b' : 'LIVE_SIGNATURE_GOES_HERE';
    $my_merchant_id = 'RDA3LHHQQ5GLL';
    break;
    case "de_personal@saavedrajj.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'de_business_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? 'GWXKDURPYPTNYRJM' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31Anq1J940EkXeyot7HhQc8gc40ZUG' : 'LIVE_SIGNATURE_GOES_HERE';
    break;
    case "de_business@saavedrajj.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'de_business_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? 'GWXKDURPYPTNYRJM' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31Anq1J940EkXeyot7HhQc8gc40ZUG' : 'LIVE_SIGNATURE_GOES_HERE';
    break;
    case "es_magento@saavedrajj.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'es_magento_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? 'RS38CQB8DBCS9RBZ' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31AWlMie5VEQaAq0M3GUutadqF8WGq' : 'LIVE_SIGNATURE_GOES_HERE';
    $my_merchant_id = 'RDA3LHHQQ5GLL';
    break;
    case "uk_magento@saavedrajj.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'uk_magento_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? 'NXA8DZDL3Z8J2ZES' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31AdX9yKNp4anxxECxacccDHD2W.HS' : 'LIVE_SIGNATURE_GOES_HERE';
    $my_merchant_id = 'RDA3LHHQQ5GLL';
    break;
    case "es_prestashop@saavedrajj.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'es_prestashop_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? '8PT55B748W5QU99Q' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'AVVDcG0qKqYFG8KW1dKviX6rNz60A3RqRflJsrsRPAlyjP-XiOBumYNg' : 'LIVE_SIGNATURE_GOES_HERE';
    $my_merchant_id = 'RDA3LHHQQ5GLL';
    break;
    case "uk_prestashop@saavedrajj.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'uk_prestashop_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? '5BZHX95SS9KL45DY' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31AkgA1bxfzaI37k3d7nTXvwHV08p.' : 'LIVE_SIGNATURE_GOES_HERE';
    $my_merchant_id = 'RDA3LHHQQ5GLL';
    break;
    case "es_custom@saavedrajj.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'es_custom_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? 'UMEXLVWX37Y83JKZ' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31ApkzoMMUVFlOXP39M403AsYefKoc' : 'LIVE_SIGNATURE_GOES_HERE';
    $my_merchant_id = 'FY2UX5FTQXYHU';
    break;

    case "uk_custom@saavedrajj.com":
    $api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
    $api_username = $sandbox ? 'uk_custom_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
    $api_password = $sandbox ? '4WHPJPYH489Q75WS' : 'LIVE_PASSWORD_GOES_HERE';
    $api_signature = $sandbox ? 'A36-1YqXkCPCZgrHigaud1VXAozyA91S5.n7AZ.rGJ05UB31oQybMDnR' : 'LIVE_SIGNATURE_GOES_HERE';
    $my_merchant_id = 'FY2UX5FTQXYHU';
    break;

  }

  /*
​
 
payments_api1.stockemporium.com   
STQ7Z3NP57A3GAM9
AFcWxV21C7fd0v3bYYYRCpSSRl31ADXGUIa-zWNtdC4FbJLi-Rc1VSbl
hi
im juan from PayPal Webdeveloper technical support
im making a follow up of this case and i just want to know if you have started the integretation process.


*/

