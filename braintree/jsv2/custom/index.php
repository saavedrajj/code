<?php require_once("../../includes/braintree_init_ie.php"); ?>
<?php $clientToken = Braintree_ClientToken::generate(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Custom Payment</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<form id="checkout" action="checkout.php" method="post">
		<label>Cardholder name</label><input data-braintree-name="cardholder_name" value="John Doe">
		<label>Number</label><input data-braintree-name="number" value="4111111111111111">
		<label>CVV</label><input data-braintree-name="cvv" value="100">
		<label>Expiration Month</label><input data-braintree-name="expiration_month" value="10">
		<label>Expiration Year</label><input data-braintree-name="expiration_year" value="2020">
		<label>Postal Code</label><input data-braintree-name="postal_code" value="94107">
		<input type="submit" id="submit" value="Pay">
	</form>

	<script src="https://js.braintreegateway.com/js/braintree-2.31.0.min.js"></script>

	<script>
		braintree.setup("<?php echo $clientToken ?>", "custom", {
			id: "checkout"
		});
	</script>
</body>
</html>