<?php 
require_once "../braintree-php/lib/Braintree.php";
#$nonce = $_POST["payment_method_nonce"];
$customer_id = $_POST["customer_id"];
$result = Braintree_Customer::find($customer_id);
echo "<pre>";
print_r($result);
echo "</pre>";
?>