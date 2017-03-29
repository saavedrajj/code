<?php require_once('../../../includes/config-uk-custom.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Express Checkout - Authorization & Capture</title>
  <link rel="icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico">
</head>
<body>
<body>
  <?php
  $token = $_GET['token'];
  $payerid = $_GET['payerid'];

  /* Store request params in an array */
  $request_params = array (
    'METHOD' => 'DoExpressCheckoutPayment',
    'USER' => $api_username,
    'PWD' => $api_password,
    'SIGNATURE' => $api_signature,
    'VERSION' => $api_version,
    'TOKEN' => $token,
    'PAYERID' => $payerid, /* customer's unique PayPal ID */
  /*'MSGSUBID' => '123123',*/ // Unique ID passed for each API request to help prevent duplicate payments*/
  'PAYMENTREQUEST_0_PAYMENTACTION' => 'Authorization', // Authorization ¦ Order
  'PAYMENTREQUEST_0_AMT' => '20', # transaction amount
  'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR' # transaction currency, e.g. US dollars
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

  <h3 class="panel-title">DoExpressCheckoutPayment API</h3>
  <ul>
    <li><a href="https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/" target="_blank">SetExpressCheckout</a></li>
    <li><a href="https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/" target="_blank">GetExpressCheckoutDetails</a></li>
    <li><a href="https://developer.paypal.com/docs/classic/api/merchant/DoExpressCheckoutPayment_API_Operation_NVP/" target="_blank">DoExpressCheckoutPayment</a></li>
    <li><a href="https://developer.paypal.com/docs/classic/api/merchant/DoCapture_API_Operation_NVP/" target="_blank">DoCapture </a></li>
  </ul>

  <?php
  if ("SUCCESS" == strtoupper($result_array["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($result_array["ACK"])) {
    ?>
    <div>Success</div>
    <pre><?php print_r($result_array);?></pre>
    <?php
    $transactionid = urldecode($result_array["PAYMENTINFO_0_TRANSACTIONID"]);
    ?>
    <ul>
      <li><a href="<?php echo $webserver; ?>code/paypal/ec/nvp/auth-capt/DoCapture.php?&transactionid=<?php echo $transactionid; ?>"><button type="button">Do Capture</button></a></li>
    </ul>
    <?php
  } else {
    ?>
    <div>Failure</div>
    <pre><?php print_r($result_array);?></pre>
    <?php
  }
  ?>
</body>
</html>
