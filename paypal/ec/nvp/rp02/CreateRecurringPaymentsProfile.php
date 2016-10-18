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
  <div class="page-header"><h1>Recurring Payments <small>Subscription with a Free Trial</small></h1></div>
  <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">CreateRecurringPaymentsProfile API</h3></div>
    <div class="panel-body">
      <div class="list-group">
        <a href="https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/" target="_blank" class="list-group-item">SetExpressCheckout <i class="glyphicon glyphicon-minus pull-right"></i></a>
        <a href="https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/" target="_blank" class="list-group-item">GetExpressCheckoutDetails <i class="glyphicon glyphicon-minus pull-right"></i></a>
        <a href="https://developer.paypal.com/docs/classic/api/merchant/CreateRecurringPaymentsProfile_API_Operation_NVP/" target="_blank" class="list-group-item active">CreateRecurringPaymentsProfile <i class="glyphicon glyphicon-ok pull-right"></i></a>
        <a href="https://developer.paypal.com/docs/classic/api/merchant/DoExpressCheckoutPayment_API_Operation_NVP/" target="_blank" class="list-group-item">DoExpressCheckoutPayment <i class="glyphicon glyphicon-minus pull-right"></i></a>
      </div>
      <h3>Review page</h3>
      <?php
      $token = $_GET['token'];
      $payerid = $_GET['payerid'];
      $profile_start_time = timeInXMonths(1);
      // Store request params in an array
      $request_params = array
      (
      'METHOD' => 'CreateRecurringPaymentsProfile',
      'USER' => $api_username,
      'PWD' => $api_password,
      'SIGNATURE' => $api_signature,
      'VERSION' => $api_version,
      'TOKEN' => $token,
      'PAYERID' => $payerid, #Identifies the customer's account
      'PROFILESTARTDATE' =>  $profile_start_time, #Billing date start, in UTC/GMT format
      'DESC' => 'AnualMembership', #Profile description - same as billing agreement description
      'BILLINGPERIOD' => 'Month', #Period of time between billings
      'BILLINGFREQUENCY' => '1', #Frequency of charges
      'AMT' => '20', #The amount the buyer will pay in a payment period
      'CURRENCYCODE' => 'EUR', #The currency, e.g. US dollars
      'COUNTRYCODE' => 'ES', #The country code, e.g. US
      'MAXFAILEDPAYMENTS' => '3', #Maximum failed payments before suspension of the profile
      'TOTALBILLINGCYCLES' => '11',


      /* Trial*/

      'TRIALBILLINGPERIOD' => 'Month' #Period of time in one trial period. For example, a month.
      'TRIALBILLINGFREQUENCY' => '1'# Frequency of charges, if any, in a period.
      'TRIALTOTALBILLINGCYCLES' => '1'# Trial period's length. That is, the number of periods in the trial.
      'TRIALAMT' => '0' #Payment amount during the trial period. For example, zero.




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

    if ("SUCCESS" == strtoupper($result_array["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($result_array["ACK"])) {
      ?>
      <div class="alert alert-success" role="alert">Success</div>
      <pre><?php print_r($result_array); ?></pre>

      <ul class="list-group">
        <li class="list-group-item"><a href="<?php echo $webserver; ?>code/paypal/ec/nvp/rp01/DoExpressCheckoutPayment.php?&token=<?php echo $token; ?>&payerid=<?php echo $payerid; ?>"><button type="button" class="btn btn-primary btn-lg">Do First payment</button></a></li>
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
