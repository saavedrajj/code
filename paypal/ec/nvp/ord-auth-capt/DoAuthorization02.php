<?php require_once('../../../includes/config-es-custom.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PayPal Order + Authorization + Capture</title>
  <link href="../../../../vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <?php

  $transactionid = $_GET['transactionid'];
  /* Store request params in an array */
  $request_params = array (
    'METHOD' => 'DoAuthorization',
    'USER' => $api_username,
    'PWD' => $api_password,
    'SIGNATURE' => $api_signature,
    'VERSION' => $api_version,
    'TRANSACTIONID' => $transactionid,
  'AMT' => '10', # transaction amount
  /*'MSGSUBID' => '123123',*/ // Unique ID passed for each API request to help prevent duplicate payments*/

  'CURRENCYCODE' => 'EUR' # transaction currency, e.g. US dollars
  );
  /* Loop through $request_params array to generate the NVP string. */
  $nvp_string = '';
  foreach ($request_params as $var => $val) {
    $nvp_string .= '&' . $var . '=' . urlencode($val);
  }
  /* Send NVP string to PayPal and store response */
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_VERBOSE, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($curl, CURLOPT_TIMEOUT, 30);
  curl_setopt($curl, CURLOPT_URL, $api_endpoint);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);
  $result = curl_exec($curl);
  curl_close($curl);
  /* Parse the API response */
  $result_array = NVPToArray($result);
  ?>
<div class="page-header"><h1>Order + Authorization + Capture<small></small></h1></div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">DoAuthorization API</h3>
    </div>
    <div class="panel-body">
      <div class="list-group">
        <a href="https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/" target="_blank" class="list-group-item">SetExpressCheckout <i class="glyphicon glyphicon-minus pull-right"></i></a>
        <a href="https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/" target="_blank" class="list-group-item">GetExpressCheckoutDetails <i class="glyphicon glyphicon-minus pull-right"></i></a>
        <a href="https://developer.paypal.com/docs/classic/api/merchant/DoExpressCheckoutPayment_API_Operation_NVP/" target="_blank" class="list-group-item">DoExpressCheckoutPayment <i class="glyphicon glyphicon-minus pull-right"></i></a>
        <a href="https://developer.paypal.com/docs/classic/api/merchant/DoAuthorization_API_Operation_NVP/" target="_blank" class="list-group-item">DoAuthorization 1<i class="glyphicon glyphicon-minus pull-right"></i></a>
        <a href="https://developer.paypal.com/docs/classic/api/merchant/DoCapture_API_Operation_NVP/" target="_blank" class="list-group-item">DoCapture 1<i class="glyphicon glyphicon-minus pull-right"></i></a>
        <a href="https://developer.paypal.com/docs/classic/api/merchant/DoAuthorization_API_Operation_NVP/" target="_blank" class="list-group-item active">DoAuthorization 2<i class="glyphicon glyphicon-ok pull-right"></i></a>
        <a href="https://developer.paypal.com/docs/classic/api/merchant/DoCapture_API_Operation_NVP/" target="_blank" class="list-group-item">DoCapture 2<i class="glyphicon glyphicon-minus pull-right"></i></a>   
      </div>
      <?php
      if ("SUCCESS" == strtoupper($result_array["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($result_array["ACK"])) {
        ?>
        <div class="alert alert-success" role="alert">Success</div>
        <pre><?php print_r($result_array);?></pre>
        <?php
        $transactionid = urldecode($result_array["TRANSACTIONID"]);
        ?>
        <ul class="list-group">
          <li class="list-group-item"><a href="<?php echo $webserver; ?>code/paypal/ec/nvp/ord-auth-capt/DoCapture02.php?&transactionid=<?php echo $transactionid; ?>"><button type="button" class="btn btn-primary btn-lg">Do Capture 1</button></a></li>
        </ul>
        <?php
      } else {
        ?>
        <div class="alert alert-danger" role="alert">Failure</div>
        <pre><?php print_r($result_array);?></pre>
        <?php
      }
      ?>
    </div>
    <div class="panel-footer"><?php echo $footer_text ?></div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="../../../../vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
