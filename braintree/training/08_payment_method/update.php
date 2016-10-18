<?php 
require_once "../braintree-php/lib/Braintree.php";
$token = $_POST["token_id"];
$cardholdername = $_POST["cardholdername"];
$streetaddress = $_POST["streetaddress"];

$result = Braintree_PaymentMethod::update($token,[
	'cardholderName' => $cardholdername,
	'billingAddress' => [
	'streetAddress' => $streetaddress,
	'options' => [
	'updateExisting' => true
	],
	],
	'options' => [
	'makeDefault' => true
	]
	]);



echo "<pre>";
print_r($result);
echo "</pre>";
?>