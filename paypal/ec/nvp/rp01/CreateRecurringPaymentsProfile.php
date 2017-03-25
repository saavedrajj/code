<?php require_once('../../../includes/config-uk-custom.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PayPal - Recurring Payments - First payment with Express Checkout</title>
  <link rel="icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico">
</head>

<body>
  <h1>Recurring Payments <small>Recurring Payments Profile</h1>
  <h3>CreateRecurringPaymentsProfile API</h3>
  <ul>
   <li><a href="https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/" target="_blank">SetExpressCheckout</a></li>
   <li><a href="https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/" target="_blank">GetExpressCheckoutDetails</a></li>
   <li><a href="https://developer.paypal.com/docs/classic/api/merchant/CreateRecurringPaymentsProfile_API_Operation_NVP/" target="_blank">CreateRecurringPaymentsProfile</a></li>
 </ul>
 <h3>Review page</h3>
 <?php
 $token = $_GET['token'];
 $payerid = $_GET['payerid'];
 $profile_start_time = timeInXMonths(1);

 $request_params = array
 (
  'METHOD' => 'CreateRecurringPaymentsProfile',
  'USER' => $api_username,
  'PWD' => $api_password,
  'SIGNATURE' => $api_signature,
  'VERSION' => $api_version,
  'TOKEN' => $token,
  'PAYERID' => $payerid, /* Identifies the customer's account */
  'PROFILESTARTDATE' => $profile_start_time, /* Billing date start, in UTC/GMT format */
  'DESC' => 'AnualMembership', /* Profile description - same as billing agreement description */
  'BILLINGPERIOD' => 'Month', /* Period of time between billings */
  'BILLINGFREQUENCY' => '1', /* Frequency of charges */
  'AMT' => '10', /* The amount the buyer will pay in a payment period */
  'CURRENCYCODE' => 'GBP', /* The currency, e.g. US dollars */
  'COUNTRYCODE' => 'UK', /* The country code, e.g. US */
  'MAXFAILEDPAYMENTS' => '3', /* Maximum failed payments before suspension of the profile */
  'TOTALBILLINGCYCLES' => '12',
  'PAYMENTREQUEST_0_NOTIFYURL' => '' 
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

if ("SUCCESS" == strtoupper($result_array["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($result_array["ACK"])) {
  ?>
  <p>Success</p>
  <pre><?php print_r($result_array); ?></pre>
  <?php
} else {
  ?>
  <p>Failure</p>
  <pre><?php print_r($result_array);?></pre>
  <?php
}
?>
</body>
</html>