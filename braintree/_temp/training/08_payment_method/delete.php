<?php 
require_once "../braintree-php/lib/Braintree.php";
$token = $_POST["token_id"];
$result = Braintree_PaymentMethod::delete($token);
echo "<pre>";
print_r($result);
echo "</pre>";
?>