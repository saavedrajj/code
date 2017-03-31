<?php 
#require_once '../includes/config.php'; 
require_once "../braintree-php/lib/Braintree.php";
$clientToken = Braintree_ClientToken::generate();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Basic Credit Card Fraud Tools</title>
	<meta name="description" content="Dropin Integration">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<h1>Basic Credit Card Fraud Tools</h1>
	<h2>AVS/CVV</h2>
	<form id="checkout" method="post" action="checkout.php">
		<div id="payment-form"></div>
		<input type="submit" value="Pay 10€">
	</form>
	<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
	<script>
		braintree.setup("<?php echo $clientToken ?>", "dropin", {
			container: "payment-form"
		});
	</script>
</body>
</html>