<?php

// # Create Payment using PayPal as payment method
// This sample code demonstrates how you can process a 
// PayPal Account based Payment.
// API used: /v1/payments/payment

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/common.php';
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


$baseUrl = getBaseUrl();

// Set redirect urls
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("$baseUrl/process.php")
->setCancelUrl("$baseUrl/cancel.php");

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
$payment->setIntent('authorization')
->setPayer($payer)
->setRedirectUrls($redirectUrls)
->setTransactions(array($transaction));


// Create payment with valid API context
try {
  $payment->create($apiContext);

  // Get PayPal redirect URL and redirect user
  $approvalUrl = $payment->getApprovalLink();
  echo "$approvalUrl";
  // REDIRECT USER TO $approvalUrl
} catch (PayPal\Exception\PayPalConnectionException $ex) {
  echo $ex->getCode();
  echo $ex->getData();
  die($ex);
} catch (Exception $ex) {
  die($ex);
}