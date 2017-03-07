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

        payment: function(resolve, reject) {

            var CREATE_PAYMENT_URL = '<?= $config['domain'] ?>/v4-server/nvp-create';

            paypal.request.post(CREATE_PAYMENT_URL)
                .then(function(data) {
                  resolve(data.TOKEN);
                })
                .catch(function(err) {
                  reject(err);
                });
        },

        onAuthorize: function(data) {

            // Note: you can display a confirmation page before executing
            document.getElementById('paypal-result').insertAdjacentHTML('beforeend', '<p>Executing...</p>');

            var EXECUTE_PAYMENT_URL = '<?= $config['domain'] ?>/v4-server/nvp-execute';

            paypal.request.post(EXECUTE_PAYMENT_URL, { paymentToken: data.paymentToken, payerID: data.payerID })
                .then(function(data) {
                  document.getElementById('paypal-result').insertAdjacentHTML('beforeend', 'Ok Response: <br/>' + JSON.stringify(data, undefined, 2));
                })
                .catch(function(err) {
                  document.getElementById('paypal-result').insertAdjacentHTML('beforeend', 'Exception Response: <br/>' + JSON.stringify(data, undefined, 2));
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
