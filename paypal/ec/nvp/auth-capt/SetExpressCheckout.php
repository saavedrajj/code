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

  $request_params = array (
    'USER' => $api_username,
    'PWD' => $api_password,
    'SIGNATURE' => $api_signature,
    'VERSION' => $api_version,
    'METHOD' => 'SetExpressCheckout',
  # 'MAXAMT' => '', Only for orders
    'RETURNURL' => $webserver .'code/paypal/ec/nvp/auth-capt/GetExpressCheckoutDetails.php',
    'CANCELURL' => $webserver .'code/paypal/ec/nvp/auth-capt/SetExpressCheckout.php',

  ## CALLBACK / CALLBACKTIMEOUT / CALLBACKVERSION
    'EMAIL' => 'es_personal@saavedrajj.com',
    /* Type */
  'PAYMENTREQUEST_0_PAYMENTACTION' => 'Authorization', #Authorization ¦ Order
  'SOLUTIONTYPE' => 'Sole', # Mark (Create PayPal account)
  'LANDINGPAGE' => 'Login', # Billing (Credit Card form)
  'CHANNELTYPE' => 'Merchant',
  'TOTALTYPE' => 'Total',
  'PAYMENTREQUEST_0_PAYMENTREASON'=>'None',
  /* Style*/
  'LOGOIMG' => 'https://static.e-junkie.com/sslpic/147765.37c17ffbfb6649864c5a844bc0e579ff.jpg', // 190x60;
  #'HDRIMG' => 'https://static.e-junkie.com/sslpic/147945.632f13acbaf3b089cfccca3367c9ee84.jpg', // 750x90
  #'PAGESTYLE' => 'Style 1'
  'BRANDNAME' => 'Business name',
  'LOCALECODE' => 'en_GB', # es_ES
  /* Custom Values */
  'PAYMENTREQUEST_0_INVNUM' => 'INV-'.rand(100000,999999),
  'PAYMENTREQUEST_0_CUSTOM' => 'Custom field',
  ## item01
  'L_PAYMENTREQUEST_0_NAME0' => 'Name item 01',
  'L_PAYMENTREQUEST_0_DESC0' => 'Description item 01',
  'L_PAYMENTREQUEST_0_AMT0' => '2',
  'L_PAYMENTREQUEST_0_NUMBER0' => '1',
  'L_PAYMENTREQUEST_0_QTY0' => '1',
  'L_PAYMENTREQUEST_0_TAXAMT0'=>'0',
  'L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0' => '10',
  'L_PAYMENTREQUEST_0_ITEMWEIGHTUNIT0' => 'kg',
  'L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0' => '10',
  'L_PAYMENTREQUEST_0_ITEMLENGTHUNIT0' => 'cm',
  'L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0' => '10',
  'L_PAYMENTREQUEST_0_ITEMWIDTHUNIT0' => 'cm',
  'L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0' => '10',
  'L_PAYMENTREQUEST_0_ITEMHEIGHTUNIT0' => 'cm',
  'L_PAYMENTREQUEST_0_ITEMURL0' => 'http://www.item01.com',
  'L_PAYMENTREQUEST_0_ITEMCATEGORY0' => 'Physical',
  /* item02 */
  'L_PAYMENTREQUEST_0_NAME1' => 'Name item 02',
  'L_PAYMENTREQUEST_0_DESC1' => 'Description item 02',
  'L_PAYMENTREQUEST_0_AMT1' => '4',
  'L_PAYMENTREQUEST_0_NUMBER1' => '1',
  'L_PAYMENTREQUEST_0_QTY1' => '1',
  'L_PAYMENTREQUEST_0_TAXAMT1'=>'0',
  'L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE1' => '10',
  'L_PAYMENTREQUEST_0_ITEMWEIGHTUNIT1' => 'kg',
  'L_PAYMENTREQUEST_0_ITEMLENGTHVALUE1' => '10',
  'L_PAYMENTREQUEST_0_ITEMLENGTHUNIT1' => 'cm',
  'L_PAYMENTREQUEST_0_ITEMWIDTHVALUE1' => '10',
  'L_PAYMENTREQUEST_0_ITEMWIDTHUNIT1' => 'cm',
  'L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE1' => '10',
  'L_PAYMENTREQUEST_0_ITEMHEIGHTUNIT1' => 'cm',
  'L_PAYMENTREQUEST_0_ITEMURL1' => 'http://www.item02.com',
  'L_PAYMENTREQUEST_0_ITEMCATEGORY1' => 'Physical',
  /* item03 */
  'L_PAYMENTREQUEST_0_NAME2' => 'Name item 03',
  'L_PAYMENTREQUEST_0_DESC2' => 'Description item 03',
  'L_PAYMENTREQUEST_0_AMT2' => '6',
  'L_PAYMENTREQUEST_0_NUMBER2' => '1',
  'L_PAYMENTREQUEST_0_QTY2' => '1',
  'L_PAYMENTREQUEST_0_TAXAMT2'=>'0',
  'L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE2' => '10',
  'L_PAYMENTREQUEST_0_ITEMWEIGHTUNIT2' => 'kg',
  'L_PAYMENTREQUEST_0_ITEMLENGTHVALUE2' => '10',
  'L_PAYMENTREQUEST_0_ITEMLENGTHUNIT2' => 'cm',
  'L_PAYMENTREQUEST_0_ITEMWIDTHVALUE2' => '10',
  'L_PAYMENTREQUEST_0_ITEMWIDTHUNIT2' => 'cm',
  'L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE2' => '10',
  'L_PAYMENTREQUEST_0_ITEMHEIGHTUNIT2' => 'cm',
  'L_PAYMENTREQUEST_0_ITEMURL2' => 'http://www.item03.com',
  'L_PAYMENTREQUEST_0_ITEMCATEGORY2' => 'Physical',
  /* Shipping */
  'REQCONFIRMSHIPPING' => '0', 
  'NOSHIPPING' => 0,  
  'ADDROVERRIDE' => '0',
  'PAYMENTREQUEST_0_SHIPTONAME' => 'Jordi García',
  'PAYMENTREQUEST_0_SHIPTOSTREET' => 'Calle Leiva 50',
  'PAYMENTREQUEST_0_SHIPTOSTREET2' => '3ero 5ta',
  'PAYMENTREQUEST_0_SHIPTOCITY' => 'Barcelona',
  'PAYMENTREQUEST_0_SHIPTOSTATE' => 'Barcelona',
  'PAYMENTREQUEST_0_SHIPTOZIP' => '08010',
  'PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE' => 'ES',
  'PAYMENTREQUEST_0_SHIPTOPHONENUM' => '932345678',
  /* Totals */
  'PAYMENTREQUEST_0_AMT' => '20',
  'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',
  'PAYMENTREQUEST_0_ITEMAMT' => '12', 
  'PAYMENTREQUEST_0_SHIPPINGAMT' => '5', 
  'PAYMENTREQUEST_0_TAXAMT' => '3',
  /* IPN */
  'PAYMENTREQUEST_0_NOTIFYURL' => $ipn_listener 
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

/*Parse the API response*/
$result_array = NVPToArray($result);
?>
<h1>Authorization & Capture</h1>
<h3 class="panel-title">SetExpressCheckout API</h3>
<ul>
  <li><a href="https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/" target="_blank">SetExpressCheckout</a></li>
  <li><a href="https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/" target="_blank">GetExpressCheckoutDetails</a></li>
  <li><a href="https://developer.paypal.com/docs/classic/api/merchant/DoExpressCheckoutPayment_API_Operation_NVP/" target="_blank">DoExpressCheckoutPayment</a></li>
  <li><a href="https://developer.paypal.com/docs/classic/api/merchant/DoCapture_API_Operation_NVP/" target="_blank">DoCapture </a></li>
</ul>

<?php
if ("SUCCESS" == strtoupper($result_array["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($result_array["ACK"])) {
  ?>
  <pre><?php print_r($result_array); ?></pre>
  <?php
  $token = urldecode($result_array["TOKEN"]);
  $paypal_url = "https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=$token";
  ?>
  <?php require_once('../../../includes/items.html'); ?>

  <p><a href="<?php echo $paypal_url; ?>" target="_blank">
    <button type="button">Pay with PayPal</button></a></p>
    <p>API response: <a href="<?php echo $paypal_url ?>" target="_blank"><?php echo $paypal_url ?></a></p>

    <?php
  } else {
    exit('SetExpressCheckout failed: ' .'<pre />'. print_r($result_array, true));
  }
  ?>

</body>
</html>
