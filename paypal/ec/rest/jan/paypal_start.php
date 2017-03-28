<?php


$startPageUrl = "paypal_start.php";
//reset session



// import for further use
use PayPal\Api\Payment;


// Autoload the SDK Package. This will include all the files and classes to your autoloader
//         + configuration
include("bootstrap.php");

// session starts after all classes includded
session_start();


if (isset($_GET['reset'])){
    session_destroy();
    header("Location:".$startPageUrl);
}

// API calls
// Create profile
if(isset($_GET['createProfile'])){
    require_once ("./project/payments/CreateWebProfile.php");
    
    $profileId = $createProfileResponse->getId();
    $_SESSION['profileId']= $profileId;
   
}
// Create payment
if(isset($_GET['createPayment'])){
require_once("project/payments/CreatePaymentUsingPayPal.php");

$_SESSION['approvalUrl'] = $payment->getApprovalLink();
$_SESSION['paymentId'] = $payment->getId();

}

//update Payment (optional)

if(isset($_GET['updatePayment'])){
require_once("project/payments/UpdatePayment.php");

}

// execute Payment
if(isset($_GET['success']) and $_GET['success'] == "true"){
    
    if(isset($_GET['paymentId'])){
    require_once("./project/payments/ExecutePayment.php");
    }
    $result = $_SESSION['result'];
    
    
        if($result->{'id'} != null ){
            if($result->{'state'} == "approved"){
                
                echo "<br>State: " . $result->{'state'};
                
                if($result->transactions[0]->amount->total){// == same as in your shop order details
                    
                    echo "<br>Total: " . $result->transactions[0]->amount->total;
                    
                    if($result->transactions[0]->amount->currency){ // == same as in your order detials
                       
                        echo "<br>Currency: " . $result->transactions[0]->amount->currency;
                       
                            echo "<br>Payment is completed and successful";
                       
                    }
                }
            }
        }
    
    print "<pre>";
    print_r( $_SESSION );
    print "</pre>";
    
    
}
if(isset($_GET['success']) and $_GET['success'] == "false"){
   
    require_once("./project/payments/ExecutePayment.php");

}


if(!isset($_GET['success'])){
// Include JS library:
?>


<html>
<head>

</head>
<!--<button type="submit" id="continueButton"
onclick="PAYPAL.apps.PPP.doCheckout();"> Checkout Now </button> <?php
//ResultPrinter::printResult("code", "", "", $request, $payment); ?>
-->


<body>
   
    
    <?php // you need to create profile only once; save profile id and use it in future payments ?>
    <br><a href="./<?php echo $startPageUrl;?>?createProfile">1. Create Experience Profile</a>
        <br>Profile ID =
    <?php
    if(isset($_SESSION['profileId'])) {
        echo $_SESSION['profileId'];
    }
    else {
        echo "none";
    }
    ?>
    <br><a href="./<?php echo $startPageUrl;?>?createPayment">2. Create Payment</a>


    <br><a href="./<?php echo $startPageUrl;?>?updatePayment">3. Update Payment (optional)</a>  
    

<?php
// end of if success exist (payment is executed)
}




//remove this whole part  in live system

echo '<br>Start again: <a href="' . $startPageUrl . '">HOME</a> -> or <a href="./' . $startPageUrl . '?reset">RESET</a>';
    echo "<hr>";
        if(isset($_GET['createPayment'])){

        	echo "<a href='" . $approvalUrl . "'>" . $approvalUrl . "</a>";

            ResultPrinter::printResult("Created Payment", "Created Payment", $payment -> getId() , $request, $payment);
        }
        
        if(isset($_GET['updatePayment'])){
            ResultPrinter::printResult("Payment Updated", "Payment Updated", null , $patchRequest, $result);
        }
        
            
    echo "<hr>";
    ?>
    

</body>
</html>


