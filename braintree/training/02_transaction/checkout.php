<?php 
require_once "../braintree-php/lib/Braintree.php";
$nonce = $_POST["payment_method_nonce"];
$result = Braintree_Transaction::sale([
	'amount' => '10.00',
	'paymentMethodNonce' => $nonce/*,
	'options' => [
	'submitForSettlement' => True
	]*/
	]);
echo "<pre>";
print_r($result);
echo "</pre>";
?>