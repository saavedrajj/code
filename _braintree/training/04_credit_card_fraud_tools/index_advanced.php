<?php 
#require_once '../includes/config.php'; 
require_once "../braintree-php/lib/Braintree.php";
$clientToken =  Braintree_ClientToken::generate();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Advanced Credit Card Fraud Tools</title>
	<meta name="description" content="Dropin Integration">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<h1>Advanced Credit Card Fraud Tools</h1>
	<h2>Device data</h2>
	<form id="checkout" method="post" action="checkout_advanced.php">
		<div id="payment-form"></div>
		<input type="submit" value="Pay 10€">
	</form>
	<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
	<script>
		braintree.setup("<?php echo $clientToken ?>", "dropin", {
			container: "payment-form"
		});
	</script>
	<script src="https://js.braintreegateway.com/v1/braintree-data.js"></script>
	<script>
		BraintreeData.setup("m7347kqdk4gbxr45", 'checkout', BraintreeData.environments.sandbox);
	</script>
</body>
</html>