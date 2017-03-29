<?php
$config = include('../config.php');
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>

<div id="paypal-button"></div>
<pre id="paypal-result"></pre>

<script src="https://www.paypalobjects.com/api/checkout.js" data-version-4></script>

<script>
    paypal.Button.render({

        env: '<?= $config['environment'] ?>',

        client: {
            <?= $config['environment'] ?>:    '<?= $config['app_client_id'] ?>',
        },

        locale: 'es_ES',

        style: {
            size: 'small',
            color: 'silver',
            shape: 'rect'
        },

        payment: function() {

            var env    = this.props.env;
            var client = this.props.client;

            return paypal.rest.payment.create(env, client, {
                transactions: [
                    {
                        amount: { total: '34.95', currency: 'EUR' }
                    }
                ]
            });
        },

        commit: true, // Optional: show a 'Pay Now' button in the checkout flow

        onAuthorize: function(data, actions) {

            // Optional: display a confirmation page here
            document.getElementById('paypal-result').insertAdjacentHTML('beforeend', '<p>Executing...</p>');

            // Optional: get payment details
            actions.payment.get().then(function(data) {
              document.getElementById('paypal-result').insertAdjacentHTML('beforeend', '<p>Payment details: <br/>' + JSON.stringify(data, undefined, 2) + '</p>');
            });

            return actions.payment.execute().then(function() {
                // Show a success page to the buyer
                document.getElementById('paypal-result').insertAdjacentHTML('beforeend', '<p>Ok</p>');
            });
        },

        onCancel: function(data, actions) {
            // Show a cancel page or return to cart
            document.getElementById('paypal-result').insertAdjacentHTML('beforeend', '<p>Cancelled</p>');
        },

        onError: function(err) {
            // Show an error page here, when an error occurs
            document.getElementById('paypal-result').insertAdjacentHTML('beforeend', '<p>Error</p>');
        },

    }, '#paypal-button');
</script>

</body>
</html>
