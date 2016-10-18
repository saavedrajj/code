<?php require_once('../../../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PayPal - PayPal Hosted Solution (HSS) - mobile</title>
  <link href="../../../../vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
    <div class="page-header"><h1>PayPal Hosted Solution (HSS) <small>mobile</small></h1></div>
    <div class="panel panel-default">
      <div class="panel-heading"><h3 class="panel-title">BMCreateButton API</h3></div>
      <div class="panel-body">
        <div class="list-group">
          <a href="https://developer.paypal.com/docs/classic/api/button-manager/BMCreateButton_API_Operation_NVP/" target="_blank" class="list-group-item active">BMCreateButton <i class="glyphicon glyphicon-ok pull-right"></i></a>
          <a href="https://developer.paypal.com/docs/classic/api/merchant/GetTransactionDetails_API_Operation_NVP/" target="_blank" class="list-group-item">GetTransactionDetails <i class="glyphicon glyphicon-minus pull-right"></i></a>
      </div>
      <?php

      // Store request params in an array
      $request_params = array (
        'METHOD' => 'BMCreateButton',
        'USER' => $api_username,
        'PWD' => $api_password,
        'SIGNATURE' => $api_signature,
        'VERSION' => $api_version,
        'BUTTONCODE' => 'TOKEN',
        'BUTTONTYPE' => 'PAYMENT',
        'BUTTONIMAGEURL' => 'https://www.paypal.com/es_ES/ES/i/btn/btn_xpressCheckout.gif',
        'L_BUTTONVAR0' => 'subtotal=10', /* Amount charged for the transaction. If shipping, handling, and taxes are not specified, this is the total amount charged. */
        'L_BUTTONVAR1' => 'tax=3', /* Taxes charged. This amount is added to subtotal for the total amount. */
        'L_BUTTONVAR2' => 'shipping=3', /* Shipping charged. This amount is added to subtotal for the total amount. */
        'L_BUTTONVAR3' => 'handling=5', /* Handling charged. This amount is added to subtotal for the total amount. */
        'L_BUTTONVAR4' => 'first_name=José', /* First name of person the item is being shipped to. */
        'L_BUTTONVAR5' => 'last_name=Pérez', /* Last name of person the item is being shipped to. */
        'L_BUTTONVAR6' => 'address1=Calle Alcalá 123', /* Street name of shipping address. (1 of 2 fields). */
        'L_BUTTONVAR7' => 'address2=3C',  /* Street name of shipping address. (2 of 2 fields). */
        'L_BUTTONVAR8' => 'city=Madrid', /* City name of shipping address. */
        'L_BUTTONVAR9' => 'state=Madrid', /* State of the shipping address. */
        'L_BUTTONVAR10' => 'zip=28010', /* Postal code of the shipping address. */
        'L_BUTTONVAR11' => 'country=ES', /* Country name of shipping address. */
        'L_BUTTONVAR12' => 'billing_first_name=José',
        'L_BUTTONVAR13' => 'billing_last_name=Pérez',
        'L_BUTTONVAR14' => 'billing_address1=Calle Alcala 123 ', /* Street name of the billing address. (1 of 2 fields). */
        'L_BUTTONVAR15' => 'billing_address2=3ero 5ta', /* Street name of the billing address. (2 of 2 fields). */
        'L_BUTTONVAR16' => 'billing_city=Madrid', /* City name of the billing address. */
        'L_BUTTONVAR17' => 'billing_state=Madrid', /* State name of the billing address. */
        'L_BUTTONVAR18' => 'billing_zip=28000', /* Zip code of the billing address. */
        'L_BUTTONVAR19' => 'billing_country=ES', /* Country code of the billing address. */
        'L_BUTTONVAR20' => 'night_phone_a=912', /* The area code of the U.S. phone number, or the country code of the phone number outside the U.S. This pre-populates the buyer’s home phone number. */
        'L_BUTTONVAR21' => 'night_phone_b=345', /* The three-digit prefix for U.S. phone numbers, or the entire non-U.S. phone number for numbers outside the U.S., excluding the country code. This pre-populates the buyer’s home phone number. NOTE:Use this variable for non-US numbers. */
        'L_BUTTONVAR22' => 'night_phone_c=678', /* The four-digit phone number for U.S. phone numbers. This pre-populates the buyer’s home phone number. */
        'L_BUTTONVAR23' => 'notify_url='.$ipn_listener, /* The URL to which PayPal posts information about the transaction in the form of Instant Payment Notification. Be sure to enter the complete URL, including http:// or https://. */
        'L_BUTTONVAR24' => 'custom=', /* Pass through variable never presented to the payer. */
        'L_BUTTONVAR25' => 'cancel_return='.$webserver .'code/paypal/hss/api/mobile/cancel.php', /* The browser will be redirected to this URL if the buyer clicks “Return to Merchant” link. Be sure to enter the complete URL, including http:// or https://. */
        'L_BUTTONVAR26' => 'paymentaction=sale', /* Indicates whether the transaction is for payment on a final sale or an authorisation for a final sale (to be captured later). For account verification, you can also submit an authorization with a transaction amount of zero. Allowable Values: - authorization or sale. Default Value - sale */
        'L_BUTTONVAR27' => 'currency_code=EUR', /* The currency of the payment. The default is USD. */
        'L_BUTTONVAR28' => 'invoice=', /* Order number in the merchant’s ordering/invoice system. */
        'L_BUTTONVAR29' => 'lc=ES', /* The display language of the login or sign-up page. Possible values are: GB, FR */
        'L_BUTTONVAR30' => 'showBillingAddress=true', /* Display billing address information. Default Value: true. Allowable Value: true or false, where true = show and false = hide. */
        'L_BUTTONVAR31' => 'showShippingAddress=false', /*Display shipping address. Default Value: false. Allowable Value: true or false, where true = show and false = hide.*/
        'L_BUTTONVAR32' => 'showBillingEmail=false', /* Display email address for billing purposes. Default Value: false. Allowable Value: true or false, where true = show and false = hide. */
        'L_BUTTONVAR33' => 'showBillingPhone=true', /* Display billing phone number. Default Value: true. Allowable Value: true or false, where true = show and false = hide. */
        'L_BUTTONVAR34' => 'showCustomerName=true', /* Display customer name (first name and last name). Default Value: true. Allowable Value: true or false, where true = show and false = hide. */
        'L_BUTTONVAR35' => 'showCardInfo=true',
        'L_BUTTONVAR36' => 'showHostedThankyouPage=true', /* Display PayPal’s confirmation page. Default Value: true. Allowable Value: true or false, where true = show and false = hide. */
        'L_BUTTONVAR37' => 'bn=', /* Identifies the source that built the code for the button. Format - <Company>_<Service>_<Product>_<Country> */
        'L_BUTTONVAR38' => 'cbt=', /* Footer text. Optional. default: Name of the account */
        'L_BUTTONVAR39' => 'address_override=true',  /* The payer is shown the passed-in address but cannot edit it. This variable is overridden if there are errors in the address. The allowable values are true/false. Default is false. */
        'L_BUTTONVAR40' => 'cpp_header_image=',
        'L_BUTTONVAR41' => 'logoText=', /* Business name displayed on your profile page. This field is editable and text specified here is displayed on the header if logoImage is not specified. */
        'L_BUTTONVAR42' => 'logoImage=https://static.e-junkie.com/sslpic/147765.37c17ffbfb6649864c5a844bc0e579ff.jpg', /* Image displayed in the logo. The acceptable file extension formats are .gif, .jpg, .jpeg, or .png. The width of the image cannot be more than 940 pixels. */
        'L_BUTTONVAR43' => 'logoImagePosition=', /* Position of the image in the logo. */
        'L_BUTTONVAR44' => 'logoFont=', /* Font type of the logo text. */
        'L_BUTTONVAR45' => 'logoFontSize=', /* Font size of the logo text. */
        'L_BUTTONVAR46' => 'logoFontColor=', /* Color of the logo text. */
        'L_BUTTONVAR47' => 'bodyBgImg=', /* Image of the surrounding background of the payment page. The file extension can be .gif, .jpg, .jpeg, or .png format. */
        'L_BUTTONVAR48' => 'bodyBgColor=#F3F3F3', /* Color of the surrounding background of the payment page. */
        'L_BUTTONVAR49' => 'headerHeight=', /* Height of the header banner. It can be from 50 to 140 pixels. The width cannot be changed. It is always 940 pixels. */
        'L_BUTTONVAR50' => 'headerBgColor=', /* Color of the header background. */
        'L_BUTTONVAR51' => 'PageTitleTextColor=', /* Color of the text used in the title of the page. (Text that says “Choose a way to pay.”) */
        'L_BUTTONVAR52' => 'PageCollapseBgColor=',
        'L_BUTTONVAR53' => 'PageCollapseTextColor=',
        'L_BUTTONVAR54' => 'PageButtonBgColor=', /* Background color of the Pay Now button. */
        'L_BUTTONVAR55' => 'PageButtonTextColor=', /* Color of the Pay Now button. You cannot change the text of the button. */
        'L_BUTTONVAR56' => 'orderSummaryBgColor=', /* Color of the Order Summary column on the right side of the payment page. You cannot change the color of the Order Summary box. */
        'L_BUTTONVAR57' => 'orderSummaryBgImage=', /* Background image you can put in the Order Summary Column. The acceptable file extension formats are .gif, .jpg, .jpeg, or .png. */
        'L_BUTTONVAR58' => 'footerTextColor=', /* Color of the footer text. */
        'L_BUTTONVAR59' => 'footerTextlinkColor=', /* Footer text link color. Optional */
        'L_BUTTONVAR60' => 'template=mobile', /* PayPal landing page layout. Optional. default: templateA*/
        'L_BUTTONVAR61' => 'return='.$webserver .'code/paypal/hss/api/mobile/success.php' /* The URL to which the buyer’s browser is redirected to after completing the payment. Be sure to enter the complete URL, including http:// or https://. */
        );

    /*
    subheaderText, sectionBorder, showCardInfo, PageCollapseBgColor, cpp_header_image
    */

    // Loop through $request_params array to generate the NVP string.
    $nvp_string = '';
    foreach ($request_params as $var => $val) {
        $nvp_string .= '&' . $var . '=' . urlencode($val);
    }

    // Send NVP string to PayPal and store response
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_VERBOSE, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_URL, $api_endpoint);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);
    curl_setopt($curl, CURLOPT_SSLVERSION, 6);
    curl_setopt($curl, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');

    $result = curl_exec($curl);
    curl_close($curl);

    // Parse the API response
    $result_array = NVPToArray($result);
    ?>
    <?php
    if ("SUCCESS" == strtoupper($result_array["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($result_array["ACK"])) {
        $paypal_url = urldecode($result_array["EMAILLINK"]);
        ?>
        <pre><?php var_export($result_array); ?></pre>

        <a href="<?php echo $paypal_url; ?>" target="_blank"><button type="button" class="btn btn-primary btn-lg">Pay with PayPal</button></a>
        
        <?php
    } else {
        exit('BMCreateButton failed: ' .'<pre />'. print_r($result_array, true));
    }
    ?>  
</div>
<div class="panel-footer"><?php echo $footer_text ?></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../../../../vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
