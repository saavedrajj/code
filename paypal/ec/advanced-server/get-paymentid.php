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
$clientID = "AdkGb9OhVi3BQJiW1jsKf4S-U-Qnoq7WpMMFVlI-supez6rpADs3TnRgH_znJglWBG4_6O0Mg8ruijg6"; 
$clientSecret = "EMxoh20roY1BQwdgwLBfQ3087nbahKPhn9A-27DEFlvJ7yH-5vMbqg5TD8xuNBw4zFrnFT3WzGeqxVhw"; 

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
      "return_url":"http://127.0.0.1/code/paypal/ec/advanced-server/executePayment.php?access_token='.$_SESSION['access_token'].'",
      "cancel_url":"http://www.yahoo.com/"
    },
    "payer":{
      "payment_method":"paypal"
    },
    "transactions":[
    {
     "amount":{
      "total":"1",
      "currency":"GBP"
    },
    "description":"This is the payment transaction description.",
    "custom": "This is my custom field",
    "invoice_number": "48787589673' . time() . '"
  }
  ]
}   
';

$apicall = REST_make_post_call($endpointPayment, $postdata, $OAuthresponse["access_token"]);
echo '{"paymentID": "'.$apicall["id"].'"}';       
?>