<?php 
require_once "../braintree-php/lib/Braintree.php";
//$nonce = $_POST["payment_method_nonce"];
$tokenid = $_POST["token_id"];
$result = Braintree_Transaction::sale([
	'amount' => '10.00',
	'paymentMethodToken' => $tokenid
	]);
echo "<pre>";
print_r($result);
echo "</pre>";
?>