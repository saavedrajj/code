<?php require_once('../../../includes/config-es-custom.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PayPal - Express Checkout Shorcut</title>
  <link href="../../../../vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
  'RETURNURL' => $webserver .'code/paypal/ec/nvp/ecs/GetExpressCheckoutDetails.php',
  'CANCELURL' => $webserver .'code/paypal/ec/nvp/ecs/SetExpressCheckout.php',
  ## CALLBACK / CALLBACKTIMEOUT / CALLBACKVERSION
  'EMAIL' => 'es_personal@saavedrajj.com',
  /* Type */
  'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale', #Authorization ¦ Order
  'SOLUTIONTYPE' => 'Sole', # Mark (Create PayPal account)
  'LANDINGPAGE' => 'Billing', # Billing (Credit Card form)
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
  'REQCONFIRMSHIPPING' => '0', # No require confirmed address
  'NOSHIPPING' => 2,  # Display shipping address

  /*'ADDROVERRIDE' => '1',
  'PAYMENTREQUEST_0_SHIPTONAME' => 'John Doe',
  'PAYMENTREQUEST_0_SHIPTOSTREET' => 'Calle Alcala 123',
  'PAYMENTREQUEST_0_SHIPTOSTREET2' => '3ero 5ta',
  'PAYMENTREQUEST_0_SHIPTOCITY' => 'Madrid',
  'PAYMENTREQUEST_0_SHIPTOSTATE' => 'Madrid',
  'PAYMENTREQUEST_0_SHIPTOZIP' => '28010',
  'PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE' => 'ES',
  'PAYMENTREQUEST_0_SHIPTOPHONENUM' => '912345678', */
  /* Totals */
  'PAYMENTREQUEST_0_AMT' => '20',
  'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',
  'PAYMENTREQUEST_0_ITEMAMT' => '12', // Total Item Amount
  'PAYMENTREQUEST_0_SHIPPINGAMT' => '5', // Shipping Amount
  'PAYMENTREQUEST_0_TAXAMT' => '3', // Tax Amount
  /* IPN */
  'PAYMENTREQUEST_0_NOTIFYURL' => $ipn_listener
  /*
  ## Only for Classic interface
  'PAYFLOWCOLOR' => '00ADF0',
  'CARTBORDERCOLOR' => '0000CD',
  'ALLOWNOTE' => 1,  # 0 1
  'CUSTOMERSERVICENUMBER' => '+34 123 456 789',
  'GIFTMESSAGEENABLE' => '1',
  'GIFTRECEIPTENABLE'=>'1',
  'GIFTWRAPENABLE'=>'0',
  'GIFTWRAPNAME' => 'Box with ribbon',
  'GIFTWRAPAMOUNT'=>'0',
  'BUYEREMAILOPTINENABLE'=>'1',
  'SURVEYQUESTION'=>'Question?',
  'SURVEYENABLE'=>'1',
  'L_SURVEYCHOICE0'=>'1st option',
  'L_SURVEYCHOICE1'=>'2d option',
  'L_SURVEYCHOICE2'=>'3rd option',
  ## Only for Germany: GIROPAYSUCCESSURL / GIROPAYCANCELURL / BANKTXNPENDINGURL /
  */
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
curl_setopt($curl, CURLOPT_SSLVERSION, 4);
curl_setopt($curl, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
$result = curl_exec($curl);
curl_close($curl);

// Parse the API response
$result_array = NVPToArray($result);
?>
<div class="page-header"><h1>Express Checkout Shortcut</h1></div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">SetExpressCheckout API</h3>
  </div>
  <div class="panel-body">
    <div class="list-group">
      <a href="https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/" target="_blank" class="list-group-item active">SetExpressCheckout <i class="glyphicon glyphicon-ok pull-right"></i></a>
      <a href="https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/" target="_blank" class="list-group-item">GetExpressCheckoutDetails <i class="glyphicon glyphicon-minus pull-right"></i></a>
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

      <p><?php require_once('../../../includes/items.html'); ?></p>

      <div class="row">
        <div class="col-md-4"><h5>English</h5><a href="<?php echo $paypal_url; ?>" target="_blank"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_xpressCheckout.gif"></a></div>
        <div class="col-md-4"><h5>Spanish</h5><a href="<?php echo $paypal_url; ?>" target="_blank"><img src="https://www.paypal.com/es_ES/i/btn/btn_xpressCheckout.gif"></a></div>
        <div class="col-md-4"><h5>Portuguese</h5><a href="<?php echo $paypal_url; ?>" target="_blank"><img src="https://www.paypal.com/pt_BR/i/btn/btn_xpressCheckout.gif"></a></div>
      </div>


      <ul class="list-group">
        <li class="list-group-item">API response: <a href="<?php echo $paypal_url ?>" target="_blank"><?php echo $paypal_url ?></a></li>
        <li class="list-group-item">Classic Interface: <a href="<?php echo $paypal_url."&force_sa=true" ?>" target="_blank"><?php echo $paypal_url."&force_sa=true" ?></a></li>
      </ul>




      <?php
    } else {
      exit('SetExpressCheckout failed: ' .'<pre />'. print_r($result_array, true));
    }
    ?>
  </div>
  <div class="panel-footer"><?php echo $footer_text ?></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../../../../vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
