<?php
// Autoload SDK package for composer based installations
require '../../../../vendor/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
		'AaGflQ_tNcIkKNrZo5jIT5Qj0CDaf7SzcqJUq4SttGfzEYYF06qdvgVP5uNLP5QyiefQsfqzADXY4-gQ',
		'EEl2NDT2jYlrYwpWRAz99IBp_D_7b2UGjejJv-lIrOUEuaaITcoUcmyTuAWuLo50jXUCMGF0BHWPMoif'
		)
	);

$apiContext->setConfig(
	array(
		'mode' => 'sandbox'

		)
	);