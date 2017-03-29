<?php
// Autoload SDK package for composer based installations
require '../../../../vendor/autoload.php';
require 'common.php';

$apiContext = new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
		'AaGflQ_tNcIkKNrZo5jIT5Qj0CDaf7SzcqJUq4SttGfzEYYF06qdvgVP5uNLP5QyiefQsfqzADXY4-gQ',
		'EEl2NDT2jYlrYwpWRAz99IBp_D_7b2UGjejJv-lIrOUEuaaITcoUcmyTuAWuLo50jXUCMGF0BHWPMoif'
		)
	);

$apiContext->setConfig(
	array(
		'mode' => 'sandbox',
		'log.LogEnabled' => true,
		'log.FileName' => '../PayPal.log',
            'log.LogLevel' => 'DEBUG', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
            'cache.enabled' => true,
            // 'http.CURLOPT_CONNECTTIMEOUT' => 30
            // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
            //'log.AdapterFactory' => '\PayPal\Log\DefaultLogFactory' // Factory class implementing \PayPal\Log\PayPalLogFactory
            )
	);