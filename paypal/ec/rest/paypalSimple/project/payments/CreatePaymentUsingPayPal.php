<?php

// # Create Payment using PayPal as payment method
// This sample code demonstrates how you can process a 
// PayPal Account based Payment.
// API used: /v1/payments/payment


use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

use PayPal\Api\BaseAddress;
use PayPal\Api\Address;
use PayPal\Api\ShippingAddress;

use PayPal\Api\PayerInfo;

//allowed payment optins
use PayPal\Api\PaymentOptions;

// ### Payer
// A resource representing a Payer that funds a payment
// For paypal account payments, set payment method
// to 'paypal'.





$payer = new Payer();






$payer->setPaymentMethod("paypal");





// ### Itemized information
// (Optional) Lets you specify item wise
// information
$item1 = new Item();
$item1->setName('Ground Coffee 40 oz')
    ->setCurrency('EUR')
    ->setQuantity(1)
    ->setPrice(8.00);
$item2 = new Item();
$item2->setName('Granola bars')
    ->setCurrency('EUR')
    ->setQuantity(5)
    ->setPrice(2);

// set shipping address




$itemList = new ItemList();
$itemList->setItems(array($item1, $item2));




// ### Additional payment details
// Use this optional field to set additional
// payment information such as tax, shipping
// charges etc.
$details = new Details();
$details->setShipping(1.00);
//$details ->setTax(1.3);
$details ->setSubtotal(18.00);

// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
$amount = new Amount();
$amount->setCurrency("EUR")
    ->setTotal(19.00)
    ->setDetails($details);
    
    

// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it. 
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Payment description")
    ->setInvoiceNumber(uniqid());

//IPN
$transaction->setNotifyUrl("https://paypal.cfriends.xon.pl/ipn/paypal_ipn.php");

//$transaction->setCustom("this is custom field");
    
//allowed payment options
if ($instantPaymentOnly == true){
    $paymentOptions = new PaymentOptions();
   
    $paymentOptions->setAllowedPaymentMethod("INSTANT_FUNDING_SOURCE");
    
    $transaction->setPaymentOptions($paymentOptions);
}
    
// ### Redirect urls
// Set the urls that the buyer must be redirected to after 
// payment approval/ cancellation.
$baseUrl = getBaseUrl();
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("$baseUrl/$startPageUrl?success=true")
    ->setCancelUrl("$baseUrl/$startPageUrl?success=false");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to 'sale'
$payment = new Payment();
$payment->setIntent("sale")
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));
    
if(isset($_SESSION['profileId']))
    {
        $payment ->setExperienceProfileId($_SESSION['profileId']);
    }



// For Sample Purposes Only.
$request = clone $payment;

// ### Create Payment
// Create a payment by calling the 'create' method
// passing it a valid apiContext.
// (See bootstrap.php for more on `ApiContext`)
// The return object contains the state and the
// url to which the buyer must be redirected to
// for payment approval
try {
    $payment->create($apiContext);
} catch (Exception $ex) {
    ResultPrinter::printError("Created Payment", "Create Payment", null, $request, $ex);
    exit(1);
}

// ### Get redirect url
// The API response provides the url that you must redirect
// the buyer to. Retrieve the url from the $payment->getApprovalLink()
// method
$approvalUrl = $payment->getApprovalLink();



return $payment;


        
      
        
?>
        