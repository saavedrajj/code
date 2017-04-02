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
		'customer' => [
		'firstName' => 'John',
		'lastName' => 'Doe',
		'company' => 'Acme Ltd',
		'phone' => '312-555-1234',
		'fax' => '312-555-1235',
		'website' => 'http://www.example.com',
		'email' => 'john@smith.com'
		],
		'billing' => [
		'firstName' => 'John',
		'lastName' => 'Doe',
		'company' => 'Acme Ltd',
		'streetAddress' => '1 E Main St',
		'extendedAddress' => 'Suite 403',
		'locality' => 'Chicago',
		'region' => 'IL',
		'postalCode' => '60622',
		'countryCodeAlpha2' => 'US'
		],
		'shipping' => [
		'firstName' => 'John',
		'lastName' => 'Doe',
		'company' => 'Acme Ltd',
		'streetAddress' => '1 E 1st St',
		'extendedAddress' => 'Suite 403',
		'locality' => 'Bartlett',
		'region' => 'IL',
		'postalCode' => '60103',
		'countryCodeAlpha2' => 'US'
		],
		'options' => [
		'submitForSettlement' => True
		]
		]);
		?>
		<pre><?php print_r($result); ?></pre>	
	</body>
	</html>