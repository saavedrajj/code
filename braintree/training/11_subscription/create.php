<?php 
require_once "../braintree-php/lib/Braintree.php";
$tokenid =$_POST["token_id"];
$planid = $_POST["plan_id"];
$result = Braintree_Subscription::create([
  'paymentMethodToken'        => $tokenid,
   'planId'        => $planid 
]);
echo "<pre>";
print_r($result);
echo "</pre>";
?>