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
//////////////////////////////////////////////////////////

*/



// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';

foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
}

// post back to PayPal system to validate
$header .= "POST /cgi-bin/webscr HTTP/1.1\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Host: www.sandbox.paypal.com\r\n"; //sandbox
//$header .= "Host: www.paypal.com\r\n"; //live
$header .= "Connection: close\r\n\r\n";

$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30); // sandbox
//$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30); // live


// if you want to assign posted variables to local variables, do it here (like below)
// please remember to include all variables that are important to your implementation
$custom = $_POST['custom'];
$invoice = $_POST['invoice'];



if (!$fp) {
// HTTP ERROR
} else {
    fputs ($fp, $header . $req);
    while (!feof($fp)) {
        $res = fgets ($fp, 1024);
        if (strcmp (trim($res), "VERIFIED") == 0) {
            // check the payment_status is Completed
            // check that txn_id has not been previously processed
            // check that receiver_email is your Primary PayPal email
            // check that payment_amount/payment_currency are correct
            // process payment

            $mail_From = "From: fromemail@email.com";
            $mail_To = "toemail@paypal.com";
            $mail_Subject = "VERIFIED IPN";
            $mail_Body = $req;

            foreach ($_POST as $key => $value){
                $emailtext .= $key . " = " .$value ."\n\n";
            }

            mail($mail_To, $mail_Subject, $emailtext . "\n\n" . $mail_Body, $mail_From);

        }
        else if (strcmp (trim($res), "INVALID") == 0) {
            // log for manual investigation

            $mail_From = "From: fromemail@saavedrajj.com";
            $mail_To = "toemail@email.com";
            $mail_Subject = "INVALID IPN";
            $mail_Body = $req;

            foreach ($_POST as $key => $value){
                $emailtext .= $key . " = " .$value ."\n\n";
            }

            mail($mail_To, $mail_Subject, $emailtext . "\n\n" . $mail_Body, $mail_From);
        }
    }
    fclose ($fp);
}
?>