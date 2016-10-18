<?php 
#require_once '../includes/config.php'; 
require_once "../braintree-php/lib/Braintree.php";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Braintree_Transaction::submitForSettlement()</title>
	<meta name="description" content="Dropin Integration">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<!--https://developers.braintreepayments.com/javascript+php/reference/request/transaction/sale -->
	<h1>Transaction</h1>
	<h2>Braintree_Transaction::submitForSettlement()</h2>
	<form id="checkout-capture" method="post" action="checkout_capture.php">
		<input type="text" name="transaction_id">
		<input type="submit" value="Submit">
	</form>
</body>
</html>