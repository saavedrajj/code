<?php require_once('../../../includes/config-es-custom.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PayPal - Reference Transactions - First payment with Express Checkout</title>
  <link href="../../../../vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <?php
  #$token = $_GET['token'];
  $referenceid = $_GET['referenceid'];
  /* Store request params in an array */
  $request_params = array (
  'METHOD' => 'BillAgreementUpdate',
  'USER' => $api_username,
  'PWD' => $api_password,
  'SIGNATURE' => $api_signature,
  'VERSION' => $api_version,
  'REFERENCEID' => $referenceid, //customer's unique PayPal ID
  'BILLINGAGREEMENTSTATUS' => 'Canceled' //customer's unique PayPal ID
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
<div class="page-header"><h1>Reference Transtractions <small>First payment with Express Checkout</small></h1></div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">BillingAgreementUpdate API</h3>
  </div>
  <div class="panel-body">
    <div class="list-group">
      <a href="https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/" target="_blank" class="list-group-item">SetExpressCheckout <i class="glyphicon glyphicon-minus pull-right"></i></a>
      <a href="https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/" target="_blank" class="list-group-item">GetExpressCheckoutDetails <i class="glyphicon glyphicon-minus pull-right"></i></a>
      <a href="https://developer.paypal.com/docs/classic/api/merchant/CreateBillingAgreement_API_Operation_NVP/" target="_blank" class="list-group-item">CreateBillingAgreement <i class="glyphicon glyphicon-minus pull-right"></i></a>
      <a href="https://developer.paypal.com/docs/classic/api/merchant/DoExpressCheckoutPayment_API_Operation_NVP/" target="_blank" class="list-group-item">DoExpressCheckoutPayment <i class="glyphicon glyphicon-minus pull-right"></i></a>
      <a href="https://developer.paypal.com/docs/classic/api/merchant/DoReferenceTransaction_API_Operation_NVP/" target="_blank" class="list-group-item">DoReferenceTransactions <i class="glyphicon glyphicon-minus pull-right"></i></a>
      <a href="https://developer.paypal.com/docs/classic/api/merchant/BAUpdate_API_Operation_NVP/" target="_blank" class="list-group-item active">BillAgreementUpdate <i class="glyphicon glyphicon-ok pull-right"></i></a>
    </div>
    <?php
    if ("SUCCESS" == strtoupper($result_array["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($result_array["ACK"])) {
      ?>
      <div class="alert alert-success" role="alert">Success</div>
      <pre><?php print_r($result_array);?></pre>
      <?php
      $referenceid = urldecode($result_array["BILLINGAGREEMENTID"]);
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
