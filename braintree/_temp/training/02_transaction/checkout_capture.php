<?php 
#require_once '../includes/config.php';
require_once "../braintree-php/lib/Braintree.php";
$transaction_id = $_POST["transaction_id"];
$result = Braintree_Transaction::submitForSettlement($transaction_id);
echo "<pre>";
print_r($result);
echo "</pre>";
?>