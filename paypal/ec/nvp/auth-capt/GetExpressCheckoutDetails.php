<?php require_once('../../../includes/config-es-custom.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PayPal Authorization & Capture</title>
  <link href="../../../../vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
  <div class="page-header"><h1>Authorization & Capture<small></small></h1></div>
  <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">GetExpressCheckoutDetails API</h3></div>
    <div class="panel-body">
      <div class="list-group">
        <a href="https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/" target="_blank" class="list-group-item">SetExpressCheckout <i class="glyphicon glyphicon-minus pull-right"></i></a>
        <a href="https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/" target="_blank" class="list-group-item active">GetExpressCheckoutDetails <i class="glyphicon glyphicon-ok pull-right"></i></a>
        <a href="https://developer.paypal.com/docs/classic/api/merchant/DoExpressCheckoutPayment_API_Operation_NVP/" target="_blank" class="list-group-item">DoExpressCheckoutPayment <i class="glyphicon glyphicon-minus pull-right"></i></a>
        <a href="https://developer.paypal.com/docs/classic/api/merchant/DoCapture_API_Operation_NVP/" target="_blank" class="list-group-item">DoCapture <i class="glyphicon glyphicon-minus pull-right"></i></a>
      </div>
      <h3>Review page</h3>
      <?php
      if ("SUCCESS" == strtoupper($result_array["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($result_array["ACK"])) {
        ?>
        <pre><?php print_r($result_array); ?></pre>
        <?php
        $payerid = urldecode($result_array["PAYERID"]);
        ?>
        <ul class="list-group">
          <li class="list-group-item"><a href="<?php echo $webserver; ?>code/paypal/ec/nvp/auth-capt/DoExpressCheckoutPayment.php?&token=<?php echo $token; ?>&payerid=<?php echo $payerid; ?>"><button type="button" class="btn btn-primary btn-lg">Do Payment</button></a></li>
        </ul>
        <?php
      } else {
        exit('GetExpressCheckoutDetails failed: ' .'<pre />'. print_r($result_array, true));
      }
      ?>
    </div>
    <div class="panel-footer"><?php echo $footer_text ?></div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="../../../../vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
