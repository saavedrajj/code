<?php require_once("../../includes/braintree_init_ie.php"); ?>
<?php $nonceFromTheClient = $_POST["payment_method_nonce"]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Checkout</title>
</head>
<body>
	<?php	
	$result = Braintree_Transaction::sale([
		'amount' => '1.00',
		'paymentMethodNonce' => $nonceFromTheClient,
		'options' => [
		'submitForSettlement' => True
		]
		]);
	?>
	<pre><?php print_r($result); ?></pre>	
</body>
</html>