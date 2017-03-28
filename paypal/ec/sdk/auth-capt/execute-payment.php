<?php
/*
SDK
https://developer.paypal.com/docs/api/quickstart/payments/

https://developer.paypal.com/docs/integration/direct/make-your-first-call/

https://developer.paypal.com/docs/api/payments/

https://developer.paypal.com/docs/integration/direct/make-your-first-call/#make-an-api-call

https://developer.paypal.com/docs/integration/direct/express-checkout/integration-jsv4/

https://developer.paypal.com/docs/integration/direct/payments/paypal-payments/
*/
require __DIR__ . '/bootstrap.php';
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\ExecutePayment;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

// Get payment object by passing paymentId
$paymentId = $_GET['paymentId'];
$payment = Payment::get($paymentId, $apiContext);
$payerId = $_GET['PayerID'];

// Execute payment with payer id
$execution = new PaymentExecution();
$execution->setPayerId($payerId);

try {
  // Execute payment
  $result = $payment->execute($execution, $apiContext);
  var_dump($result);
} catch (PayPal\Exception\PayPalConnectionException $ex) {
  echo $ex->getCode();
  echo $ex->getData();
  die($ex);
} catch (Exception $ex) {
  die($ex);
}