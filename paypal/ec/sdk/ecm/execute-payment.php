<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <title>Express Checkout</title>
</head>
<body>
	<h1>Execute Payment</h1>
  <?php
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
  //var_dump($result);
    echo "<pre>".$result."</pre>";
  } catch (PayPal\Exception\PayPalConnectionException $ex) {
    echo $ex->getCode();
    echo $ex->getData();
    die($ex);
  } catch (Exception $ex) {
    die($ex);
  }