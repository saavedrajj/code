<?php 
require_once '../includes/config.php'; 
$clientToken = Braintree_ClientToken::generate();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Hosted fields Integration</title>
    <meta name="description" content="Drop-In Integration">
    <meta name="author" content="Juan Saavedra">
    <link href="styles.css" rel="stylesheet">   
    
    
</head>
<body>
    <h1>Hosted Fields Integration</h1>
    <p><a href="https://developers.braintreepayments.com/reference/general/testing/php#no-credit-card-errors" target="_blank">Try one of these cards</a></p>


    <form id="checkout" method="post" action="checkout.php">

        <!--<div id="paypal-button"></div>-->

        <label>Name on card</label>
        <input type="input" id="name" name="name" autofocus class="hosted-field">

        <label>Card number <img src="logocards.png" style="float:right; margin-top:4px;"></label>
        <div id="number" data-braintree-name="number" class="hosted-field"></div>

        <div style="float:left; width:49%;">
            <label>Expiry date</label>
            <div id="expiration-date" data-braintree-name="expiration_date" class="hosted-field"></div>
        </div>

        <div style="float:right; width:49%;">
            <label>CVV</label>
            <div id="security-code" data-braintree-name="security_code" class="hosted-field"></div>
        </div>

        <input type="hidden" id="amount" name="amount" value="50">
        <input type="hidden" id="nonce" name="payment_method_nonce" value="">
        <input id="submit" type="submit" value="Pay Now">
    </form>    

    <span id="payinfo">Your payment info is stored securely. <a href="https://www.braintreepayments.com/developers/security" target="_blank">Learn more</a>. </span>   
    
    <script src="https://js.braintreegateway.com/js/beta/braintree-hosted-fields-beta.17.min.js"></script>
    <script>  
    var myNonce;

    var client = new braintree.api.Client({
      clientToken: "<?php echo $clientToken ?>"
  });

    braintree.setup("<?php echo $clientToken ?>", "custom", {
      id: "checkout",
            /*
              paypal: {
                container: "paypal-button",
                displayName: "*******************",
                singleUse: true
                //locale: "en_uk",
                //enableShippingAddress: "false"    
              },
              */    
              hostedFields: {
                number: { 
                    selector: "#number", 
                    placeholder: "16-digit" 
                },
                expirationDate: { 
                    selector: "#expiration-date", 
                    placeholder: "MM/YY format" 
                },
                cvv: { 
                    selector: "#security-code", 
                    placeholder: "" 
                },
                    styles: {
                        "input": {
                            "color": "#000",
                            "font-size": "12px",
                            "font-family": "Verdana"
                        },
                        ":focus": {
                          "color": "black"
                      },
                      ".valid": {
                          "color": "green"
                      },
                      ".invalid": {
                          "color": "red"
                      },

                  
              }
            }        
        });    

</script>        
</body>
</html>