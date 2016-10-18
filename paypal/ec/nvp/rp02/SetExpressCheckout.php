<?php require_once('../../../includes/config-es-custom.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PayPal - Recurring Payments - Subscription with a Free Trial</title>
  <link href="../../../../vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <?php
  // Store request params in an array
  $request_params = array
  (
  'METHOD' => 'SetExpressCheckout',
  'USER' => $api_username,
  'PWD' => $api_password,
  'SIGNATURE' => $api_signature,
  'VERSION' => $api_version,
  'RETURNURL' => $webserver .'code/paypal/ec/nvp/rp01/GetExpressCheckoutDetails.php',
  'CANCELURL' => $webserver .'code/paypal/ec/nvp/rp01/SetExpressCheckout.php',
  'L_BILLINGTYPE0' => 'RecurringPayments', #The type of billing agreement
  'L_BILLINGAGREEMENTDESCRIPTION0' => 'AnualMembership', #The description of the billing agreement
  'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',
  /*'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale' // Authorization ¦ Order*/
  /* Style*/
  'LOGOIMG' => 'https://static.e-junkie.com/sslpic/147765.37c17ffbfb6649864c5a844bc0e579ff.jpg', // 190x60;
  #'HDRIMG' => 'https://static.e-junkie.com/sslpic/147945.632f13acbaf3b089cfccca3367c9ee84.jpg', // 750x90
  #'PAGESTYLE' => 'Style 1'
  'BRANDNAME' => 'Business name',
  'LOCALECODE' => 'en_GB', # es_ES
  /* Custom Values */
  'PAYMENTREQUEST_0_INVNUM' => 'INV-'.rand(100000,999999),
  'PAYMENTREQUEST_0_CUSTOM' => 'Custom field',
  /* Shipping */
  'NOSHIPPING' => 0,  # Display shipping address
  #'CUSTOMERSERVICENUMBER' => '+34 123 456 789'
  /* IPN */
  'PAYMENTREQUEST_0_NOTIFYURL' => $ipn_listener
);

// Loop through $request_params array to generate the NVP string.
$nvp_string = '';
foreach ($request_params as $var => $val) {
  $nvp_string .= '&' . $var . '=' . urlencode($val);
}

// Send NVP string to PayPal and store response
$curl = curl_init();
curl_setopt($curl, CURLOPT_VERBOSE, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($curl, CURLOPT_TIMEOUT, 30);
curl_setopt($curl, CURLOPT_URL, $api_endpoint);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);
curl_setopt($curl, CURLOPT_SSLVERSION, 6);
curl_setopt($curl, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');

$result = curl_exec($curl);
curl_close($curl);

// Parse the API response
$result_array = NVPToArray($result);
?>
<div class="page-header"><h1>Recurring Payments <small>Subscription with a Free Trial</small></h1></div>
<div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title">SetExpressCheckout API</h3></div>
  <div class="panel-body">
    <div class="list-group">
      <a href="https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/" target="_blank" class="list-group-item active">SetExpressCheckout <i class="glyphicon glyphicon-ok pull-right"></i></a>
      <a href="https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/" target="_blank" class="list-group-item">GetExpressCheckoutDetails <i class="glyphicon glyphicon-minus pull-right"></i></a>
      <a href="https://developer.paypal.com/docs/classic/api/merchant/CreateRecurringPaymentsProfile_API_Operation_NVP/" target="_blank" class="list-group-item">CreateRecurringPaymentsProfile <i class="glyphicon glyphicon-minus pull-right"></i></a>
      <a href="https://developer.paypal.com/docs/classic/api/merchant/DoExpressCheckoutPayment_API_Operation_NVP/" target="_blank" class="list-group-item">DoExpressCheckoutPayment <i class="glyphicon glyphicon-minus pull-right"></i></a>
    </div>
    <?php
    if ("SUCCESS" == strtoupper($result_array["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($result_array["ACK"])) {
      ?>
      <pre><?php print_r($result_array); ?></pre>
      <?php
      $token = urldecode($result_array["TOKEN"]);
      $paypal_url = "https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=$token";
      ?>
      <p><?php require_once('../../../includes/rp02.html'); ?><a href="<?php echo $paypal_url; ?>" target="_blank"><button type="button" class="btn btn-primary btn-lg">Pay with PayPal</button></a></p>
      <ul class="list-group">
        <li class="list-group-item">API response: <a href="<?php echo $paypal_url ?>" target="_blank"><?php echo $paypal_url ?></a></li>
      </ul>
      <?php
    } else {
      exit('SetExpressCheckout failed: ' . '<pre />' . print_r($result_array, true));
    }
    ?>
  </div>
  <div class="panel-footer"><?php echo $footer_text ?></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../../../../vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
