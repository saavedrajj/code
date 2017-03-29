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
    session_start();
    include('functions.php');
    
	$endpointToken = "https://api.sandbox.paypal.com/v1/oauth2/token";
    $postData = "grant_type=client_credentials";

    $endpointPayment = "https://api.sandbox.paypal.com/v1/payments/payment/".$_POST['paymentID']."/execute/";
    $postData = json_encode(Array(
            'payer_id' => $_POST['payerID']
    ));
    //$postdata = '{ "payer_id" : "'.$_POST['payerID'].'" }';

    $apicall = ExecutePayment($endpointPayment, $_SESSION['access_token'], $postData);
    echo json_encode($apicall);

    //echo '<b>Response: '.$apicall['state'].'</b><br><pre style=" border:1px solid #ccc; padding:10px; font-size:10px;">';
    //print_r($apicall);
    //echo '</pre>';

?>