<?php 
#require_once '../includes/config.php'; 
require_once "../braintree-php/lib/Braintree.php";
$nonce = $_POST["payment_method_nonce"];
echo $nonce;
$result = Braintree_Transaction::sale([
  'amount' => '100.00',
  'paymentMethodNonce' => $nonce
]);

echo "<pre>";
print_r($result);
echo "</pre>";

?>