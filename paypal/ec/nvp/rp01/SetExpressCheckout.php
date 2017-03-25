<!-- https://developer.paypal.com/docs/classic/express-checkout/ht_ec-recurringPaymentProfile-curl-etc/ -->
<?php require_once('../../../includes/config-uk-custom.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PayPal - Recurring Payments</title>
  <link rel="icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico">
</head>

<body>
  <?php
  $request_params = array
  (
    'METHOD' => 'SetExpressCheckout',
    'USER' => $api_username,
    'PWD' => $api_password,
    'SIGNATURE' => $api_signature,
    'VERSION' => $api_version,
    'L_BILLINGTYPE0' => 'RecurringPayments', 
    'L_BILLINGAGREEMENTDESCRIPTION0' => 'AnualMembership', 
    'LOGOIMG' => 'https://static.e-junkie.com/sslpic/147765.37c17ffbfb6649864c5a844bc0e579ff.jpg',
    'LOCALECODE' => 'en_GB',
    /*
    'CURRENCYCODE' => 'GBP', */  
    'BRANDNAME' => 'Business name',
    'RETURNURL' => $webserver .'code/paypal/ec/nvp/rp01/GetExpressCheckoutDetails.php',
    'CANCELURL' => $webserver .'code/paypal/ec/nvp/rp01/SetExpressCheckout.php'
    );

  $nvp_string = '';
  foreach ($request_params as $var => $val) {
    $nvp_string .= '&' . $var . '=' . urlencode($val);
  }

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

  $result_array = NVPToArray($result);
  ?>
  <h1>Recurring Payments <small>Recurring Payments Profile</h1>
  <h3 class="panel-title">SetExpressCheckout API</h3>
  <ul>
   <li><a href="https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/" target="_blank">SetExpressCheckout</a></li>
   <li><a href="https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/" target="_blank">GetExpressCheckoutDetails</a></li>
   <li><a href="https://developer.paypal.com/docs/classic/api/merchant/CreateRecurringPaymentsProfile_API_Operation_NVP/" target="_blank">CreateRecurringPaymentsProfile</a></li>
 </ul>

 <?php
 if ("SUCCESS" == strtoupper($result_array["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($result_array["ACK"])) {
  ?>
  <pre><?php print_r($result_array); ?></pre>
  <?php 
  $token = urldecode($result_array["TOKEN"]);

  if ($sandbox == true) {
    $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=$token"; 
  } else {
    $paypal_url = "https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=$token";
  }

  ?>
  <p><?php require_once('../../../includes/rp01.html'); ?><a href="<?php echo $paypal_url; ?>" target="_blank"><button type="button" class="btn btn-primary btn-lg">Pay with PayPal</button></a></p>
  <ul>
    <li>API response: <a href="<?php echo $paypal_url ?>" target="_blank"><?php echo $paypal_url ?></a></li>
  </ul>
  <?php
} else {
  exit('SetExpressCheckout failed: ' . '<pre />' . print_r($result_array, true));
}
?>
</body>
</html>