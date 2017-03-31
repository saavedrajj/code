<?php 
require_once "../braintree-php/lib/Braintree.php";
$customerid =$_POST["customer_id"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$company = $_POST["company"];
$streetaddress = $_POST["streetaddress"];
$extendedaddress = $_POST["extendedaddress"];
$locality = $_POST["locality"];
$region = $_POST["region"];
$postalcode = $_POST["postalcode"];
$countrycode = $_POST["countrycode"];
$result = Braintree_Address::create([
  'customerId'        => $customerid,
  'firstName'         => $firstname,
  'lastName'          => $lastname,
  'company'           => $company,
  'streetAddress'     => $streetaddress,
  'extendedAddress'   => $extendedaddress,
  'locality'          => $locality,
  'region'            => $region,
  'postalCode'        => $postalcode,
  'countryCodeAlpha2' => $countrycode
]);
echo "<pre>";
print_r($result);
echo "</pre>";
?>