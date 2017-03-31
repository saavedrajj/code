<?php
/*session_start();*/
require_once("../../vendor/autoload.php");
/*
if(file_exists(__DIR__ . "/../.env")) {
    $dotenv = new Dotenv\Dotenv(__DIR__ . "/../");
    $dotenv->load();
}
*/
Braintree\Configuration::environment(getenv('sandbox'));
Braintree\Configuration::merchantId(getenv('3wx4f4txnk9qkgn8'));
Braintree\Configuration::publicKey(getenv('w83p6zzv73x2q9gm'));
Braintree\Configuration::privateKey(getenv('e33abefde4810f923963824fb3889ca1'));



/*

BraintreeGateway gateway = new BraintreeGateway(
  Environment.SANDBOX,
  "3wx4f4txnk9qkgn8",
  "w83p6zzv73x2q9gm",
  "e33abefde4810f923963824fb3889ca1"
);

Public Key	
w83p6zzv73x2q9gm

Private Key	
e33abefde4810f923963824fb3889ca1

Environment	
sandbox

Merchant ID
3wx4f4txnk9qkgn8
	
Merchant Account ID
irmerchant

CSE Key
MIIBCgKCAQEA+5T+RahhOU4fxqXnY4tLaqnCMn9OCAGOnBoEQJmY/Y+/qWmwGzg7WF5GS+a0NoIxTQ+Sejgc0sQEXS6v749UlGDEypFrnQVSmjuVqR/4f4xrqADAyvDUDn1kZFTFZXMn9Wzq+E9Se1BHhjxkkCZxHHLF4UbiMiLEuRtE//+K8GgimpzPPrXwY6DB2HnEATre/+jFf5mbyxiljD/BqL6nQRO6FrOWz4VS5rjFlkzsobz3Z5GT2rufF0aDSsfdnfQ68G30KplDjLCl290nlmbbUIGLsp1nVpckzGgZxV2pU7pEXH5Xflq5h/nL1nrwLRUxGdwpD+pZUDoBx8kU610Z6QIDAQAB
*/