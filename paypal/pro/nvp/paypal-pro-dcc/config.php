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


    $mode			= "sandbox.";
	$API_Endpoint 	= "https://api-3t.".$mode."paypal.com/nvp";
	$API_Version 	= urlencode('109.0');
	##$API_Username 	= urlencode('hi_api1.tapaspro.com'); 
	##$API_Password 	= urlencode('PBEUGLP3SGTRE8LF'); 
	##$API_Signature 	= urlencode('AFcWxV21C7fd0v3bYYYRCpSSRl31AemqZn0aL6Lzbi-rKqE.kqLDUFbq'); 

	$API_Username 	= urlencode('uk_pro2_api1.saavedrajj.com'); 
	$API_Password 	= urlencode('PZM2V7J27VF84MT6'); 
	$API_Signature 	= urlencode('AB8A.PWhf6.zcGodF7MJ7SOIIf1cAZJZlcO2piQVeGC9kYvJy7GZeJ-b'); 
/*
        $API_Endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
        $API_Username= $sandbox ? 'uk_pro2_api1.saavedrajj.com' : 'LIVE_USERNAME_GOES_HERE';
        $API_Password = $sandbox ? 'PZM2V7J27VF84MT6' : 'LIVE_PASSWORD_GOES_HERE';
        $API_Signature = $sandbox ? 'AB8A.PWhf6.zcGodF7MJ7SOIIf1cAZJZlcO2piQVeGC9kYvJy7GZeJ-b' : 'LIVE_SIGNATURE_GOES_HERE';
*/
	//$API_Username 	= urlencode('accounts_api1.stretchcomms.com'); 
	//$API_Password 	= urlencode('9N56PJKG83ABVZHU'); 
	//$API_Signature 	= urlencode('AFcWxV21C7fd0v3bYYYRCpSSRl31A80j1S7cM67OIYwAQb4d1WH1CeiE'); 
    //$API_Username 	= urlencode('craig.dennis_api1.burdamagazines.co.uk'); 
	//$API_Password 	= urlencode('XGHJE83ZA4AFQ3M9'); 
	//$API_Signature 	= urlencode('Ay7lcyZYI8bmoidfF6yvtIFMGWexAlC24DA..auda.re7jeZx-Y5sAAI'); 
	$CurrencyCode 	= urlencode('EUR'); 
	$PaymentMode 	= urlencode('SALE');
	$ReturnURL 		= urlencode('http://127.0.0.1:8080/projects/scripts/Paypal_codes/paypal-pro-dcc/GetExpressCheckout.php'); 
	$CancelURL 		= urlencode('http://127.0.0.1:8080/projects/scripts/Paypal_codes/paypal-pro-dcc/ko.php');

    
?>