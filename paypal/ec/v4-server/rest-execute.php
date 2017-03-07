<?php
$config = include('../config.php');
$access = include('rest-access-token.php');

// TODO : GET Payment Details

// Execute Parameters
$params = array(
  'payer_id' => $_POST['payerID']
);

// Request Execute Payment
$request = curl_init();
curl_setopt($request, CURLOPT_URL, $config['rest_url'] . '/v1/payments/payment/' . $_POST['paymentID'] . '/execute/');
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $access));
curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($params));
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($request);
curl_close($request);

// Response Execute Payment
if ($_GET['verb']) {
  echo "<pre>";
  print_r($params);
  echo "</pre>";
  echo "<pre>";
  print_r(json_decode($result));
  echo "</pre>";
}
else {
  echo $result;
}

?>
