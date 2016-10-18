<?php
// +----------------------------------------------------------------------+
// | Copyright (c) 2004-2010 Advisto SAS, service PEEL - contact@peel.fr  |
// +----------------------------------------------------------------------+
// | This file is part of PEEL Premium 5.71, which is subject to an       |
// | opensource commercial license: you are allowed to customize the code |
// | for your own needs, but you are NOT entitled to distribute this file |
// | More information: http://www.peel.fr/lire/licence-commerciale-71.html|
// +----------------------------------------------------------------------+
// | Author: Advisto SAS, RCS 479 205 452, France, http://www.peel.fr/    |
// +----------------------------------------------------------------------+
// $Id: ipn.php 38368 2013-10-04 09:40:27Z sdelaporte $
//

mail('jusaavedra@paypal.com','IPN validif _POST', print_r($_POST, true));
//include("../../configuration.inc.php");
define("USE_SANDBOX",1);

            $paypal_url;
           
            if(USE_SANDBOX == true) 
            {
                            $paypal_url = "ssl://www.sandbox.paypal.com";
            } 
            else 
            {
                            $paypal_url = "ssl://www.paypal.com";
            }


$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
	$req .= "&$key=".urlencode($value);
}
// post back to PayPal system to validate
$paypal_domain = 'ipnpb.paypal.com';
// post back to PayPal system to validate
$header = "POST /cgi-bin/webscr HTTP/1.1\r\n";
$header .= "Host: " . $paypal_url . ":443\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . String::strlen($req) . "\r\n";
$header .= "Connection: close\r\n\r\n";
$fp = fsockopen ('ssl://' . $paypal_url, 443, $errno, $errstr, 30);
if (!$fp) {
	$header = "POST /cgi-bin/webscr HTTP/1.1\r\n";
	$header .= "Host: " . str_replace('ipnpb', 'www', $paypal_url) . "\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . String::strlen($req) . "\r\n";
	$header .= "Connection: close\r\n\r\n";
	// On essaie sans SSL si l'h�bergement ne le permet pas
	$fp = fsockopen (str_replace('ipnpb', 'www', $paypal_url), 80, $errno, $errstr, 30);
}/*
if(!empty($_POST['item_number'])) {
	$item_number = intval($_POST['item_number']);
} elseif(!empty($_POST['custom'])) {
	$item_number = intval($_POST['custom']);
}*/
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
//$txn_id = $_POST['txn_id'];
//$receiver_email = $_POST['receiver_email'];
//$payer_email = $_POST['payer_email'];
//$pending_reason = $_POST['pending_reason'];
//$txn_type = $_POST['txn_type'];

if (!$fp) {
	// HTTP ERROR
} else {
	mail('jusaavedra@paypal.com','IPN vali req', print_r($req, true));
	fputs ($fp, $header . $req);
	$outputres = "";
	/*while (!feof($fp)) {
		$res = fgets ($fp, 1024);*/
		if (strcmp(trim(strip_tags($res)), "VERIFIED") == 0) {
                    file_put_contents("toto.txt",print_r($outputres, true));
//                        if ($payment_status == "Completed") {
//                                query("UPDATE peel_commandes SET id_statut_paiement = '3' WHERE id = '" . intval($item_number) . "'");
//                        }
//                        if ($payment_status == "Pending") {
//                                query("UPDATE peel_commandes SET id_statut_paiement = '2' WHERE id = '" . intval($item_number) . "'");
//                        }
//                        if ($payment_status == "Failed") {
//                                query("UPDATE peel_commandes SET id_statut_paiement = '6' WHERE id = '" . intval($item_number) . "'");
//                        }
//                        if ($payment_status == "Denied") {
//                                query("UPDATE peel_commandes SET id_statut_paiement = '6' WHERE id = '" . intval($item_number) . "'");
//                        }
//                        if ($payment_status == "Refunded") {
//                                query("UPDATE peel_commandes SET id_statut_paiement = '9' WHERE id = '" . intval($item_number) . "'");
//                        }
		} elseif (strcmp(trim(strip_tags($res)), "INVALID") == 0) {
			//query("UPDATE peel_commandes SET id_statut_paiement = '6' WHERE id = '" . intval($item_number) . "'");
		}
		$outputres .= $res;
	//}
	//file_put_contents("toto.txt",print_r($outputres, true));
	//fclose ($fp);
}

?>