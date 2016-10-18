<?php 
require_once "../braintree-php/lib/Braintree.php";
$token = $_POST["token"];
$result = Braintree_PaymentMethod::find($token);
echo "<pre>";
print_r($result);
echo "</pre>";
?>