<?php 
require_once "../braintree-php/lib/Braintree.php";
$customerid = $_POST["customer_id"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$company = $_POST["company"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$fax = $_POST["fax"];
$website = $_POST["website"];
$result = Braintree_Customer::update(
	$customerid,
	[
	'firstName' => $firstname,
	'lastName' => $lastname,
	'company' => $company,
	'email' => $email,
	'phone' => $phone,
	'fax' => $fax,
	'website' => $website
	]
	);
echo "<pre>";
print_r($result);
echo "</pre>";
?>