<?php
/*--- Set up the payment information object ---*/
require __DIR__ . '/bootstrap.php';
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

// Create new payer and method
$payer = new Payer();
$payer->setPaymentMethod("paypal");

// Set redirect urls
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl('http://127.0.0.1/code/paypal/ec/rest/ecm/review.php')
  ->setCancelUrl('http://127.0.0.1/code/paypal/ec/rest/ecm/cancel.php');

// Set payment amount
$amount = new Amount();
$amount->setCurrency("GBP")
  ->setTotal(10);

// Set transaction object
$transaction = new Transaction();
$transaction->setAmount($amount)
  ->setDescription("Payment description");

// Create the full payment object
$payment = new Payment();
$payment->setIntent('sale')
  ->setPayer($payer)
  ->setRedirectUrls($redirectUrls)
  ->setTransactions(array($transaction));

  // Create payment with valid API context
try {
  $payment->create($apiContext);

  // Get PayPal redirect URL and redirect user
  $approvalUrl = $payment->getApprovalLink();

  // REDIRECT USER TO $approvalUrl
} catch (PayPal\Exception\PayPalConnectionException $ex) {
  echo $ex->getCode();
  echo $ex->getData();
  die($ex);
} catch (Exception $ex) {
  die($ex);
}

echo "<a href=$approvalUrl target=_blank>".$approvalUrl."</a>";