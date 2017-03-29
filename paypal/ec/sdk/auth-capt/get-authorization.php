<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Express Checkout - Authorization + Capture</title>
</head>
<body>
	<h1>Get Authorization</h1>
	<?php
	require __DIR__ . '/bootstrap.php';
	$paymentId = $_GET['paymentId'];
	$payerId = $_GET['PayerID'];
	$token = $_GET['token'];
	echo "paymentId: ". $paymentId."<br>";
	echo "PayerID: " . $payerId."<br>";
	echo "token: " . $token."<br><br>";

	$authorization = require 'create-authorization';
	$authorizationId = $authorization->getId();
	use PayPal\Api\Authorization;

// ### Retrieve payment
// Retrieve the payment object by calling the
// static `get` method
// on the Payment class by passing a valid
// Payment ID
// (See bootstrap.php for more on `ApiContext`)
	$payment = Payment::get($paymentId, $apiContext);
	echo "<pre>".$payment."</pre>";
	






try {
    // Retrieve the authorization
    $result = Authorization::get($authorizationId, $apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Get Authorization", "Authorization", null, null, $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
 ResultPrinter::printResult("Get Authorization", "Authorization", $authorizationId, null, $result);

return $result;
?>



	<p><a href="execute-authorization.php?paymentId=<?php echo $paymentId;?>&PayerID=<?php echo $payerId;?>" target=_blank>Execute Authorization<a></p>
</body>
</html>