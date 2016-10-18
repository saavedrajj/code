<?php 
#require_once '../includes/config.php'; 
require_once "../braintree-php/lib/Braintree.php";
$nonce = $_POST["payment_method_nonce"];
echo $_POST["device_data"];
echo "<br>";
//echo $nonce;
$result = Braintree_Transaction::sale([
  "amount" => "10.00",
  "paymentMethodNonce" => $nonce,
  "options" => [
      "submitForSettlement" => true
  ],
  "deviceData" => $_POST["device_data"]
]);
echo "<pre>";
print_r($result);
echo "</pre>";
?>