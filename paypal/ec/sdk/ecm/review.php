<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <title>Express Checkout</title>
</head>
<body>
	<h1>Review Payment</h1>
	<?php
	require __DIR__ . '/bootstrap.php';
	$paymentId = $_GET['paymentId'];
	$payerId = $_GET['PayerID'];
	$token = $_GET['token'];
	echo "paymentId: ". $paymentId."<br>";
	echo "PayerID: " . $payerId."<br>";
	echo "token: " . $token."<br><br>";

	use PayPal\Api\Payment;

//$paymentId = $createdPayment->getId();

// ### Retrieve payment
// Retrieve the payment object by calling the
// static `get` method
// on the Payment class by passing a valid
// Payment ID
// (See bootstrap.php for more on `ApiContext`)
	$payment = Payment::get($paymentId, $apiContext);
	echo "<pre>".$payment."</pre>";

	?>
	<p><a href="execute-payment.php?paymentId=<?php echo $paymentId;?>&PayerID=<?php echo $payerId;?>" target=_blank>Make Payment<a></p>
</body>
</html>