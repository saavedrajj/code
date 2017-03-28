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
$redirectUrls->setReturnUrl('http://127.0.0.1/code/paypal/ec/sdk/ecm/review.php')
->setCancelUrl('http://127.0.0.1/code/paypal/ec/sdk/ecm/cancel.php');


// ### Itemized information
// (Optional) Lets you specify item wise
// information
$item1 = new Item();
$item1->setName('Ground Coffee 40 oz')
    ->setDescription('Ground Coffee 40 oz')
    ->setCurrency('GBP')
    ->setQuantity(1)
    ->setTax(0.3)
    ->setPrice(7.50);
$item2 = new Item();
$item2->setName('Granola bars')
    ->setDescription('Granola Bars with Peanuts')
    ->setCurrency('GBP')
    ->setQuantity(5)
    ->setTax(0.2)
    ->setPrice(2);

$itemList = new ItemList();
$itemList->setItems(array($item1, $item2));

// ### Additional payment details
// Use this optional field to set additional
// payment information such as tax, shipping
// charges etc.
$details = new Details();
$details->setShipping(1.2)
    ->setTax(1.3)
    ->setSubtotal(17.5);

// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
$amount = new Amount();
$amount->setCurrency("GBP")
    ->setTotal(20)
    ->setDetails($details);

// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it.
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Payment description")
    ->setInvoiceNumber(uniqid());


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
  echo "<a href=$approvalUrl target=_blank>".$approvalUrl."</a>";
  // REDIRECT USER TO $approvalUrl
} catch (PayPal\Exception\PayPalConnectionException $ex) {
  echo $ex->getCode();
  echo $ex->getData();
  die($ex);
} catch (Exception $ex) {
  die($ex);  
}

