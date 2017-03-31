<?php 
#require_once '../includes/config.php'; 
require_once "../braintree-php/lib/Braintree.php";
$clientToken = Braintree_ClientToken::generate();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Braintree - DropIn</title>
	<meta name="description" content="Dropin Integration">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<form id="checkout" method="post" action="checkout.php">
		<div id="payment-form"></div>
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