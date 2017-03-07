<?php
$config = include('../config.php');

// SetEC Params
$params = array (
  'METHOD' => 'SetExpressCheckout',
  'VERSION' => '204.0',
  'USER' => $config['user'],
  'PWD' => $config['password'],
  'SIGNATURE' => $config['signature'],
  'RETURNURL' => $config['domain'].'/v4-server/nvp-execute',
  'CANCELURL' => $config['domain'].'/v4-server/nvp-execute',
  'PAYMENTREQUEST_0_AMT' => '59.95',
  'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',
  'PAYMENTREQUEST_0_DESC' => 'PayPal Test',
  'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
  'L_PAYMENTREQUEST_0_NAME0' => 'Producto A',
  'L_PAYMENTREQUEST_0_DESC0' => 'Esta es la descripcion del producto A',
  'L_PAYMENTREQUEST_0_AMT0' => '49.95',
  'L_PAYMENTREQUEST_0_NAME1' => 'Producto B',
  'L_PAYMENTREQUEST_0_DESC1' => 'Esta es la descripcion del producto B',
  'L_PAYMENTREQUEST_0_AMT1' => '10.00',
  'PAYMENTREQUEST_0_SHIPTONAME' => 'Pepe Arespacochaga',
  'PAYMENTREQUEST_0_SHIPTOSTREET' => 'Av. Europa 4',
  'PAYMENTREQUEST_0_SHIPTOSTREET2' => '1º C',
  'PAYMENTREQUEST_0_SHIPTOCITY' => 'Alcobendas',
  'PAYMENTREQUEST_0_SHIPTOSTATE' => 'Madrid',
  'PAYMENTREQUEST_0_SHIPTOZIP' => '28108',
  'PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE' => 'ES',
  'PAYMENTREQUEST_0_SHIPTOPHONE' => '666777888',
  'ADDROVERRIDE' => '1',
  'EMAIL' => 'pepe@paypal.com',
  'HDRIMG' => 'https://static.e-junkie.com/sslpic/162703.7d5916ed057d750ec9e6329f9daf5f5a.jpg',
  'BRANDNAME' => 'Mi Empresa',
  //'NOTETOBUYER' => 'A little note',
  // 'L_BILLINGTYPE0' => 'MerchantInitiatedBilling',
  // 'L_BILLINGAGREEMENTDESCRIPTION0' => 'Acuerdo de cobros para tus compras en ',
);

// SetEC Request
$request = curl_init();
curl_setopt($request, CURLOPT_URL, $config['nvp_url']);
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($request);
curl_close($request);

if ($_GET['verb']) {
  echo 'SetExpressCheckout Request<pre>';
  print_r($params);
  echo '</pre>';
}

// SetEC Response to JSON
parse_str($result, $output);
echo json_encode($output);
?>
