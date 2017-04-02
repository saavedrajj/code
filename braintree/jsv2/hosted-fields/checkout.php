<?php require_once("../../includes/braintree_init_ie.php"); ?>
<?php $nonceFromTheClient = $_POST["payment_method_nonce"]; ?>
<?php $cardholderName = $_POST["cardholder_name"]; ?>
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
		'phone' => '012345678',
		'fax' => '087654321',
		'website' => 'http://www.johndoe.com',
		'email' => 'john@doe.com'
		],
		'creditCard' => [
		'cardholderName' => $cardholderName
		],
		'billing' => [
		'firstName' => 'John',
		'lastName' => 'Doe',
		'company' => 'Acme Ltd',
		'streetAddress' => '123 Oxford St',
		'extendedAddress' => 'Soho',
		'locality' => 'London',
		'region' => 'London',
		/*'postalCode' => '',*/
		'countryCodeAlpha2' => 'GB'
		],
		'shipping' => [
		'firstName' => 'John',
		'lastName' => 'Doe',
		'company' => 'Acme Ltd',
		'streetAddress' => '123 Abbey Road',
		'extendedAddress' => 'St. John Wood',
		'locality' => 'London',
		'region' => 'London',
		'postalCode' => 'SW0456SD',
		'countryCodeAlpha2' => 'GB'
		],
		'options' => [
		'submitForSettlement' => True
		]
		]);
		?>
		<pre><?php print_r($result); ?></pre>	
	</body>
	</html>