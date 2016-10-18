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


<?php require_once('../../../includes/config-uk-custom.php'); ?>

		$UserIP = $_SERVER['REMOTE_ADDR'];
		$cardtype="Visa";
		
		$nvpStr =	'&METHOD=DoDirectPayment'.
					'&PAYMENTACTION='.$PaymentMode.			
					'&IPADDRESS='.$UserIP.
					'&AMT='.urlencode("8.88").
					'&CREDITCARDTYPE='.$cardtype.// Visa|MasterCard|Discover|Amex|Maestro.
					'&ACCT='.urlencode("4485398431677230"). // www.getcreditcardnumbers.com
					'&EXPDATE='.urlencode("022016").
					'&CVV2='.urlencode("123").
					//'&FIRSTNAME='.urlencode("Maria").
					//'&LASTNAME='.urlencode("Garcia").
					'&STREET='.urlencode("1 Main St.").
					'&CITY='.urlencode("San Jose").
					'&STATE='.urlencode("CA").
					'&ZIP='.urlencode("95131").
					'&CURRENCYCODE='.urlencode("GBP").
					'&COUNTRYCODE='.urlencode("UK");
					
					if($cardtype=='Maestro') $nvpStr.='&STARTDATE=MMYYYY&ISSUENUMBER=xxxxxxxxxx';	

                    /*
                    &VERSION=100.0
                    &PWD=9N56PJKG83ABVZHU
                    &USER=accounts_api1.stretchcomms.com
                    &SIGNATURE=AFcWxV21C7fd0v3bYYYRCpSSRl31A80j1S7cM67OIYwAQb4d1WH1CeiE                    
                    METHOD=DoDirectPayment
                    &PAYMENTACTION=Sale
                    &AMT=1
                    &CREDITCARDTYPE=visa
                    &ACCT=4532036984377088
                    &EXPDATE=072016
                    &CVV2=123
                    &FIRSTNAME=Web
                    &LASTNAME=Team
                    &CURRENCYCODE=GBP
                    */

        $nvpStr = "&PAYMENTACTION=SALE&CURRENCYCODE=GBP&ACCT=4137352680410449&CREDITCARDTYPE=Visa&CVV2=123&FIRSTNAME=Adam&LASTNAME=Sadler&STREET=10+Warne+Avenue&CITY=Braintree&STATE=Essex&ZIP=CM75FE&EXPDATE=082020&METHOD=DoDirectPayment&IPADDRESS=10.195.136.34&AMT=10.00&DESC=EventsDaily+-+Upgrade+account";
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