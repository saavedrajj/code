<?php

/*

/////////////////// DISCLAIMER ///////////////////////////
THIS EXAMPLE CODE IS PROVIDED TO YOU ONLY ON AN "AS IS"
BASIS WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
EITHER EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION
ANY WARRANTIES OR CONDITIONS OF TITLE, NON-INFRINGEMENT,
MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE.
PAYPAL MAKES NO WARRANTY THAT THE SOFTWARE OR
DOCUMENTATION WILL BE ERROR-FREE. IN NO EVENT SHALL THE
COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF
USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT,
STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF
ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
////////////////////////////////////////////////////////////

*/

function Request2Paypal($method,$API_Endpoint,$API_Version,$API_Username,$API_Password,$API_Signature,$nvpStr){
	
	$nvpreq = "METHOD=$method&VERSION=$API_Version&USER=$API_Username&PWD=$API_Password&SIGNATURE=$API_Signature$nvpStr";
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	
	$httpResponse = curl_exec($ch);
	curl_close($ch);
		
	
	if(!$httpResponse){	
		exit("$method failed: ".curl_error($ch).'('.curl_errno($ch).')');
	}else{
		
		$httpResponseAr = explode("&", $httpResponse);
		
		$httpParsedResponseAr = array();
		foreach ($httpResponseAr as $i => $value) {
			$tmpAr = explode("=", $value);
			if(sizeof($tmpAr) > 1) {
				$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
			}
		}
		
		if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)){
			exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
		}
		//echo '<pre>';
		//print_r($httpParsedResponseAr);
		//echo '</pre>';
		
		return $httpParsedResponseAr;
	}
	
}

	    $API_Endpoint 	= "https://api-3t.sandbox.paypal.com/nvp";
	    $API_Version 	= urlencode('109.0');
        $API_Username 	= urlencode('craig.dennis_api1.burdamagazines.co.uk'); 
	    $API_Password 	= urlencode('XGHJE83ZA4AFQ3M9'); 
	    $API_Signature 	= urlencode('Ay7lcyZYI8bmoidfF6yvtIFMGWexAlC24DA..auda.re7jeZx-Y5sAAI'); 

        $nvpStr =   "&PAYMENTACTION=SALE".
                    "&CURRENCYCODE=GBP".
                    "&ACCT=4137352680410449".
                    "&CREDITCARDTYPE=Visa".
                    "&CVV2=123".
                    "&FIRSTNAME=Adam".
                    "&LASTNAME=Sadler".
                    "&STREET=10+Warne+Avenue".
                    "&CITY=Braintree".
                    "&STATE=Essex".
                    "&ZIP=CM75FE".
                    "&EXPDATE=082020".
                    "&METHOD=DoDirectPayment".
                    "&IPADDRESS=10.195.136.34".
                    "&AMT=10.00".
                    "&DESC=EventsDaily+-+Upgrade+account";
		
        $PaypalResponse=Request2Paypal("DoDirectPayment",$API_Endpoint,$API_Version,$API_Username,$API_Password,$API_Signature, $nvpStr);
		
		if(strtoupper($PaypalResponse["ACK"]) == "SUCCESS" || strtoupper($PaypalResponse["ACK"]) == "SUCCESSWITHWARNING"){
			//header('Location: '.$paypalurl);
			echo "Payment done!!!<br><br>";
			echo '<pre style=" font-size:10px; border:1px solid #ccc; padding:10px;">';
			print_r($PaypalResponse);
			echo '</pre>';
		}else{
			echo 'Error: '.urldecode($PaypalResponse["L_LONGMESSAGE0"]);
			echo '<pre>';
			print_r($PaypalResponse);
			echo '</pre>';
		}	
?>