<?php
$config = include('../config.php');

// GetEC Params
$params = array (
  'METHOD' => 'GetExpressCheckoutDetails',
  'VERSION' => '204.0',
  'USER' => $config['user'],
  'PWD' => $config['password'],
  'SIGNATURE' => $config['signature'],
  'TOKEN' => $_POST['paymentToken'],
);

// GetEC Request
$request = curl_init();
curl_setopt($request, CURLOPT_URL, $config['nvp_url']);
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($request);
curl_close($request);

// GetEC Response -not printed-
parse_str($result, $output);

// DoEC Params
$params = array (
  'METHOD' => 'DoExpressCheckoutPayment',
  'VERSION' => '204.0',
  'USER' => $config['user'],
  'PWD' => $config['password'],
  'SIGNATURE' => $config['signature'],
  'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
  'PAYMENTREQUEST_0_AMT' => '59.95',
  'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',
  'PAYMENTREQUEST_0_DESC' => 'PayPal Test',
  'TOKEN' => $_POST['paymentToken'],
  'PAYERID' => $_POST['payerID'],
);

// DoEC Request
$request = curl_init();
curl_setopt($request, CURLOPT_URL, $config['nvp_url']);
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($request);
curl_close($request);

// DoEC Response to JSON
parse_str($result, $output);
echo json_encode($output);

?>
