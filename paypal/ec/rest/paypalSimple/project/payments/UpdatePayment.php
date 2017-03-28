<?php
// # Update Payment Sample
// This sample code demonstrate how you can
// update a Payment resources
// you've created using the Payments API.
// ## NOTE
// Note that it can only be updated before the execute is done. Once, the payment is executed it is not
// possible to udpate that.
// Docs: https://developer.paypal.com/webapps/developer/docs/api/#update-a-payment-resource
// API used: PATCH /v1/payments/payment/<Payment-Id>

/** @var Payment $createdPayment */


// get user details
use PayPal\Api\Payment;
$paymentId = $_SESSION['paymentId'];
$createdPayment =  Payment::get($paymentId, $apiContext);
//current shipping address passed to PayPal

$invoiceNumber = $createdPayment->transactions[0]->invoice_number;




if(isset($_GET['updatePayment'])){
    
  
$subtotal = $createdPayment->transactions[0]->amount->details->subtotal;
$currency = $createdPayment->transactions[0]->amount->currency;
$shipping = "7.00";
$tax = "0";
$total = $shipping + $tax + $subtotal;






    
    
    $patchReplace = new \PayPal\Api\Patch();
    $patchReplace->setOp('replace')
        ->setPath('/transactions/0/amount')
        ->setValue(json_decode('{
                        "total": "' . $total . '",
                        "currency": "' . $currency . '",
                        "details": {
                            "subtotal": "' . $subtotal . '",
                            "shipping": "' . $shipping . '",
                            "tax":"' . $tax . '"
                        }
                    }'));
    
    $patchAdd = new \PayPal\Api\Patch();
    $patchAdd->setOp('add')
        ->setPath('/transactions/0/item_list/shipping_address')
        ->setValue(json_decode('{
                        "recipient_name": "Max Mustermann",
                        "line2":"",
                        "line1": "Königstr. 19",
                        "city": "Berlin",
                        "state": "",
                        "postal_code": "14109",
                        "country_code": "DE"
                    }'));
        
    $patchReplaceInvoice = new \PayPal\Api\Patch();
    $patchReplaceInvoice ->setOp('replace')
        ->setPath('/transactions/0/invoice_number')
        ->setValue($invoiceNumber);    
    
    $patchRequest = new \PayPal\Api\PatchRequest();
    //$patchRequest->setPatches(array($patchAdd, $patchReplace, $patchReplaceInvoice));
    $patchRequest->setPatches(array($patchAdd, $patchReplace));
    
    
    // ### Update payment
    // Update payment object by calling the
    // static `update` method
    // on the Payment class by passing a valid
    // Payment ID
    // (See bootstrap.php for more on `ApiContext`)
    try {
        $result = $createdPayment->update($patchRequest, $apiContext);
    
    } catch (Exception $ex) {
        ResultPrinter::printError("Update Payment", "PatchRequest", null, $patchRequest, $ex);
      
    }
    
    
    
    
    
    
}
