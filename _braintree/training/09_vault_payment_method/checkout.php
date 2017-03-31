<?php 
require_once "../braintree-php/lib/Braintree.php";
$nonce = $_POST["payment_method_nonce"];
$customerid = $_POST["customer_id"];
//echo $customerid;
$result = Braintree_Transaction::sale([
	'amount' => '10.00',
	'paymentMethodNonce' => $nonce,
	'customerId' => $customerid,
	'options' => [
		'storeInVault' => true
	]
]);
echo "<pre>";
print_r($result);
echo "</pre>";
?>