<?php require_once("../../includes/braintree_init_ie.php"); ?>
<?php $clientToken = Braintree_ClientToken::generate(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Drop-in Payment UI</title>
</head>

<body>
<form id="checkout" method="post" action="checkout.php">
		<div id="payment-form"></div>
		<input type="submit" value="Pay €1">
	</form>

	<script src="https://js.braintreegateway.com/js/braintree-2.31.0.min.js"></script>

	<script>
		braintree.setup("<?php echo $clientToken ?>", "custom", {
			container: "payment-form"
		});
	</script>
</body>
</html>