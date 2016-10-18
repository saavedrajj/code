<?php 
#require_once '../includes/config.php'; 
require_once "../braintree-php/lib/Braintree.php";
$clientToken = Braintree_ClientToken::generate();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Braintree_PaymentMethod::create()</title>
	<meta name="description" content="Payment Method - Create">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<h1>Payment Method</h1>
	<h2>Braintree_PaymentMethod::create()</h2>
	<form id="checkout" method="post" action="create.php">
		<div id="payment-form"></div>
		<label>Holder Name</label><input type="text" name="cardholdername" value="Gustavo López">
		<label>Customer ID</label><input type="text" name="customer_id" value="">
		<input type="submit" value="Submit">
	</form>
	<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
	<script>
		braintree.setup("<?php echo $clientToken ?>", "dropin", {
			container: "payment-form"
		});
	</script>
</body>
</html>