<?php 
require_once '../../includes/config.php'; 
$nonce = $_POST["payment_method_nonce"];
$result = Braintree_Transaction::sale([
	'amount' => '10.00',
	'paymentMethodNonce' => $nonce
	]);
echo "<pre>";
print_r($result);
echo "</pre>";
?>