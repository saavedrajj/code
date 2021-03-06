<?php
// #Execute Payment Sample
// This is the second step required to complete
// PayPal checkout. Once user completes the payment, paypal
// redirects the browser to "redirectUrl" provided in the request.
// This sample will show you how to execute the payment
// that has been approved by
// the buyer by logging into paypal site.
// You can optionally update transaction
// information by passing in one or more transactions.
// API used: POST '/v1/payments/payment/<payment-id>/execute'.


use PayPal\Api\ExecutePayment;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

// ### Approval Status
// Determine if the user approved the payment or not
if ((isset($_GET['success']) && $_GET['success'] == 'true') && isset($_GET['paymentId'])) {

    // Get the payment Object by passing paymentId
    // payment id was previously stored in session 
   
    $paymentId = $_SESSION['paymentId'];
    $payment = Payment::get($paymentId, $apiContext);

    // ### Payment Execute
    // PaymentExecution object includes information necessary
    // to execute a PayPal account payment.
    // The payer_id is added to the request query parameters
    // when the user is redirected from paypal back to your site
    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);

    try {
        // Execute the payment
        // (See bootstrap.php for more on `ApiContext`)
        $result = $payment->execute($execution, $apiContext);
        
        
        $_SESSION['result'] = $result;
        
        
       

        
        
        
        
    } catch (Exception $ex) {
        ResultPrinter::printError("Executed Payment", "Payment", null, null, $ex);
        exit(1);
    }

    // if no errors redirect
        header("Location:".$startPageUrl."?success=true");


} else {
    ResultPrinter::printResult("User Cancelled the Approval", null);
    return "notSuccessful";
}
