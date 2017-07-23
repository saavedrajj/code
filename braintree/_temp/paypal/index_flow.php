<?php
#require_once '../includes/config.php'; 
require_once "../braintree-php/lib/Braintree.php";
$clientToken = Braintree_ClientToken::generate();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PayPal Checkout Flow</title>
	<meta name="description" content="Dropin Integration">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<h1>PayPal</h1>
	<h2>Checkout Flow</h2>
	<form  method="post" action="checkout_flow.php">
		<div id="paypal-container"></div>
		<input type="submit" value="Pay 10€">
	</form>
	<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
	<script>
		braintree.setup("<?php echo $clientToken ?>", "paypal", {
			container: "paypal-container",
			singleUse:true,
			amount: 10.00,
			currency: 'EUR',
			locale: "es_ES",
			onPaymentMethodReceived: function (obj) {
				alert(obj.nonce);
			}
		});
	</script>
</body>
</html>