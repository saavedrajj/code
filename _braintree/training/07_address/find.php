<?php 
require_once "../braintree-php/lib/Braintree.php";
$customerid = $_POST["customer_id"];
$addressid = $_POST["address_id"];
$result = Braintree_Address::find($customerid,$addressid);
echo "<pre>";
print_r($result);
echo "</pre>";
?>