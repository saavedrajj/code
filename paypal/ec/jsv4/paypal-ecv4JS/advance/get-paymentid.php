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

How to make your first call: https://developer.paypal.com/docs/integration/direct/make-your-first-call/
How to accept a payment: https://developer.paypal.com/webapps/developer/docs/integration/web/accept-paypal-payment/
REST API parameters/values: https://developer.paypal.com/webapps/developer/docs/api/#payments
REST API errors: https://developer.paypal.com/webapps/developer/docs/integration/direct/rest-payments-error-handling/

*/
    session_start();
    include('functions.php');
    
	$endpointToken = "https://api.sandbox.paypal.com/v1/oauth2/token";
    $endpointPayment = "https://api.sandbox.paypal.com/v1/payments/payment";
    $postData = "grant_type=client_credentials";
	$clientID = "AdWHqRCAia9T4-K6XygKSxW7YEeMvfVf4uexehmRl8RT13qaJwxVG9TaCu6P"; //hi@tapaspro.com
	$clientSecret = "EDJmyRA7bWd4KdKggVRaOkiBPo2WFuKCx7Jo1ai0CbNN_9PjzbF6z9kCvFqN"; 

    $OAuthresponse = OAuth_rest($endpointToken, $postData, $clientID, $clientSecret);

    //print_r($OAuthresponse);
    //echo "<hr>";
    /*
    echo "scope: ".$OAuthresponse["scope"]."<br>";
    echo "access_token: ".$OAuthresponse["access_token"]."<br>";
    echo "toke_type: ".$OAuthresponse["token_type"]."<br>";
    echo "app_id: ".$OAuthresponse["app_id"]."<br>";
    echo "expires_in: ".$OAuthresponse["expires_in"];
    echo "<hr>";
    */

    $_SESSION['access_token'] = $OAuthresponse["access_token"];

    $postdata = '
                 {
                   "intent":"sale",
                   "redirect_urls":{
                      "return_url":"http://localhost/projects/scripts/Paypal_codes/paypal-ecv4JS/advance/executePayment.php?access_token='.$_SESSION['access_token'].'",
                      "cancel_url":"http://www.yahoo.com/"
                   },
                   "payer":{
                      "payment_method":"paypal"
                   },
                   "transactions":[
                      {
                         "amount":{
                            "total":"7.47",
                            "currency":"GBP"
                         },
                         "description":"This is the payment transaction description.",
                         "custom": "EBAY_EMS_90048630024435",
                         "invoice_number": "48787589673' . time() . '"
                      }
                   ]
                }   
    ';

    $apicall = REST_make_post_call($endpointPayment, $postdata, $OAuthresponse["access_token"]);
    //echo '<b>Response:</b><br><pre style=" border:1px solid #ccc; padding:10px; font-size:10px;">';
    //print_r($apicall);
    //echo '</pre>';
	//header('Location: '.$apicall["links"]["1"]["href"]);
    
    echo '{"paymentID": "'.$apicall["id"].'"}';
       
?>