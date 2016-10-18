<form action="https://securepayments.sandbox.paypal.com/webapps/HostedSoleSolutionApp/webflow/sparta/hostedSoleSolutionProcess" method="post">
    <input type="hidden" name="cmd" value="_hosted-payment">
    <!-- Obligatorios -->
    <input type="hidden" name="subtotal" value="10">

    <input type="hidden" name="business" value="esintegracion@paypal.com"> <!-- RDA3LHHQQ5GLL ¦ esintegracion@paypal.com -->
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="paymentaction" value="sale">
    <input type="hidden" name="return" value="http://127.0.0.1:8080/paypal/hss/html/success.html">
    <input type="hidden" name="cancel_return" value="http://127.0.0.1:8080/paypal/hss/html/cancel.html">
    <input type="hidden" name="address1" value="Calle Alcala 123">
    <input type="hidden" name="address_override" value="true">
    <input type="hidden" name="billing_address1" value="Calle Alcala 123">
    <input type="hidden" name="billing_city" value="Madrid">
    <input type="hidden" name="billing_country" value="ES">
    <input type="hidden" name="cbt" value="EasdfasdfadS">
    <input type="hidden" name="lc" value="US" />
    <input type="submit" name="method" value="Pay">
</form>