<?php
require("../../../vendor/autoload.php");
/*
Braintree\Configuration::environment(getenv('sandbox'));
Braintree\Configuration::merchantId(getenv('3wx4f4txnk9qkgn8'));
Braintree\Configuration::publicKey(getenv('w83p6zzv73x2q9gm'));
Braintree\Configuration::privateKey(getenv('e33abefde4810f923963824fb3889ca1'));
*/

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('3wx4f4txnk9qkgn8');
Braintree_Configuration::publicKey('w83p6zzv73x2q9gm');
Braintree_Configuration::privateKey('e33abefde4810f923963824fb3889ca1');
