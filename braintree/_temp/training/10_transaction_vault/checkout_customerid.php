<?php 
require_once "../braintree-php/lib/Braintree.php";
//$nonce = $_POST["payment_method_nonce"];
$customerid = $_POST["customer_id"];
$result = Braintree_Transaction::sale([
	'amount' => '10.00',
	'customerId' => $customerid
	]);
echo "<pre>";
print_r($result);
echo "</pre>";
?>