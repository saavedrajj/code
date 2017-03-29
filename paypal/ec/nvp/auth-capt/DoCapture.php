<?php require_once('../../../includes/config-uk-custom.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Express Checkout - Authorization & Capture</title>
  <link rel="icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico">
</head>
<body>
  <?php

  $transactionid = $_GET['transactionid'];

  $request_params = array (
    'METHOD' => 'DoCapture',
    'USER' => $api_username,
    'PWD' => $api_password,
    'SIGNATURE' => $api_signature,
    'VERSION' => $api_version,
    'AUTHORIZATIONID' => $transactionid,
    'AMT' => '20', 
    'COMPLETETYPE' => 'Complete', 
    'CURRENCYCODE' => 'EUR' /* transaction currency, e.g. US dollars*/
    );
  /* Loop through $request_params array to generate the NVP string. */
  $nvp_string = '';
  foreach ($request_params as $var => $val) {
    $nvp_string .= '&' . $var . '=' . urlencode($val);
  }
  /* Send NVP string to PayPal and store response */
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_VERBOSE, 1);
  curl_setopt($curl, CURLOPT_URL, $api_endpoint);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);
  $result = curl_exec($curl);
  curl_close($curl);

  /* Parse the API response */
  $result_array = NVPToArray($result);
  ?>
  <h1>Authorization & Capture</h1>
  <h3>DoExpressCheckoutPayment API</h3>
  <ul>
    <li><a href="https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/" target="_blank">SetExpressCheckout</a></li>
    <li><a href="https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/" target="_blank">GetExpressCheckoutDetails</a></li>
    <li><a href="https://developer.paypal.com/docs/classic/api/merchant/DoExpressCheckoutPayment_API_Operation_NVP/" target="_blank">DoExpressCheckoutPayment</a></li>
    <li><a href="https://developer.paypal.com/docs/classic/api/merchant/DoCapture_API_Operation_NVP/" target="_blank">DoCapture </a></li>
  </ul>

  <?php
  if ("SUCCESS" == strtoupper($result_array["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($result_array["ACK"])) {
    ?>
    <div class="alert alert-success" role="alert">Success</div>
    <pre><?php print_r($result_array);?></pre>
    <?php
  } else {
    ?>
    <div class="alert alert-danger" role="alert">Failure</div>
    <pre><?php print_r($result_array);?></pre>
    <?php
  }
  ?>

</body>
</html>
