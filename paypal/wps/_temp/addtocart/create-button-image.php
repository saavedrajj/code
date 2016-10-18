<?php

$environment = 'sandbox';          // or 'beta-sandbox' or 'live'

function PPHttpPost($methodName_, $nvpStr_) {
                global $environment;

                // Set up your API credentials, PayPal end point, and API version.
                $API_UserName = urlencode('spain_api1.saavedrajj.com');
                $API_Password = urlencode('J5WBMPYY6KF7TJT4');
                $API_Signature = urlencode('An5ns1Kso7MWUdW4ErQKJJJ4qi4-AecPt9j1MA7w59gLklqtw95ZVOp1');

                $API_Endpoint = "https://api-3t.paypal.com/nvp";
                if("sandbox" === $environment || "beta-sandbox" === $environment) {
                                $API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
                }
                $version = urlencode('108.0');

                // Set the curl parameters.
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
                curl_setopt($ch, CURLOPT_VERBOSE, 1);

                // Turn off the server and peer verification (TrustManager Concept).
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);

                // Set the API operation, version, and API signature in the request.
                $nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";

                // Set the request as a POST FIELD for curl.
                curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

                // Get response from the server.
                $httpResponse = curl_exec($ch);

                if(!$httpResponse) {
                                exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
                }

                // Extract the response details.
                $httpResponseAr = explode("&", $httpResponse);

                $httpParsedResponseAr = array();
                foreach ($httpResponseAr as $i => $value) {
                                $tmpAr = explode("=", $value);
                                if(sizeof($tmpAr) > 1) {
                                                $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
                                }
                }

                if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
                                exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
                }

                return $httpParsedResponseAr;
}


// Add request-specific fields to the request string.
$nvpStr = "&BUTTONCODE=TOKEN".
        "&BUTTONTYPE=PAYMENT".
        "&L_BUTTONVAR0=subtotal=10.00".
        "&L_BUTTONVAR1=template=TemplateD&L_BUTTONVAR2=return=https://yourwebsite.com/receipt_page.html";

// Execute the API operation; see the PPHttpPost function above.
$httpParsedResponseAr = PPHttpPost('BMCreateButton', $nvpStr);

if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                echo "<pre>";
                print_r($httpParsedResponseAr);
                echo "</pre>";
				
				$emaillink=urldecode($httpParsedResponseAr['EMAILLINK']);
				
echo <<<EOT
<a href="$emaillink">
<img src="https://www.paypalobjects.com/fr_FR/i/btn/btn_buynowCC_LG.gif" alt="null"></a>
EOT;
				
                exit;


} else  {
                exit('BMCreateButton failed: ' . print_r($httpParsedResponseAr, true));
}
?>
