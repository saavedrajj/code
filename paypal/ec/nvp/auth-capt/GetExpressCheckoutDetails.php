<?php require_once('../../../includes/config-es-custom.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PayPal Authorization & Capture</title>
  <link rel="icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico">
</head>

<body>
  <?php
  $token = $_GET['token'];
  /* Store request params in an array */
  $request_params = array (
    'METHOD' => 'GetExpressCheckoutDetails',
    'USER' => $api_username,
    'PWD' => $api_password,
    'SIGNATURE' => $api_signature,
    'VERSION' => $api_version,
    'TOKEN' => $token
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
  <h3 class="panel-title">GetExpressCheckoutDetails API</h3>
  <ul>
    <li><a href="https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/" target="_blank">SetExpressCheckout</a></li>
    <li><a href="https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/" target="_blank">GetExpressCheckoutDetails</a></li>
    <li><a href="https://developer.paypal.com/docs/classic/api/merchant/DoExpressCheckoutPayment_API_Operation_NVP/" target="_blank">DoExpressCheckoutPayment</a></li>
    <li><a href="https://developer.paypal.com/docs/classic/api/merchant/DoCapture_API_Operation_NVP/" target="_blank">DoCapture </a></li>
  </ul>

  <h3>Review page</h3>
  <?php
  if ("SUCCESS" == strtoupper($result_array["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($result_array["ACK"])) {
    ?>
    <pre><?php print_r($result_array); ?></pre>
    <?php
    $payerid = urldecode($result_array["PAYERID"]);
    ?>
    <ul>
      <li><a href="<?php echo $webserver; ?>code/paypal/ec/nvp/auth-capt/DoExpressCheckoutPayment.php?&token=<?php echo $token; ?>&payerid=<?php echo $payerid; ?>"><button type="button">Confirm the Payment Authorization</button></a></li>
    </ul>
    <?php
  } else {
    exit('GetExpressCheckoutDetails failed: ' .'<pre />'. print_r($result_array, true));
  }
  ?>

</body>
</html>
