<?php 
require_once "../braintree-php/lib/Braintree.php";
$nonce = $_POST["payment_method_nonce"];
$customerid =$_POST["customer_id"];
$cardholdername =$_POST["cardholdername"];

$result = Braintree_PaymentMethod::create([
    'customerId' => $customerid,
    'paymentMethodNonce' => $nonce,
    'cardholderName' => $cardholdername
]);
echo "<pre>";
print_r($result);
echo "</pre>";
?>