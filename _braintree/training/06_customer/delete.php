<?php 
require_once "../braintree-php/lib/Braintree.php";
$customer_id = $_POST["customer_id"];
$result = Braintree_Customer::delete($customer_id);
echo "<pre>";
print_r($result);
echo "</pre>";
?>