<!doctype html>

<?php
require_once '../lib/Braintree.php';
$clientToken = Braintree_ClientToken::generate();

?>

<html class="is-modern">
<head>
	<meta charset="utf-8">
	<title>Hello, Client!</title>
	<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
</head>
<body>

	<form > 
	<input type=button name='load' value="LOAD DROP IN" onClick="loadBT()" /> 
	</form> 

	<form id="checkout" method="post" action="checkout.php">
		<div id="dropin"></div>
			<input type="submit" value="Authorize now!">
	</form>
<script>
	function loadBT(){
	
	var client = new braintree.api.Client({
		clientToken: "<?php echo $clientToken; ?>"
	});
	
	braintree.setup("<?php echo $clientToken; ?>", "dropin", {
		container: "dropin",
		onPaymentMethodReceived: function(obj) {
			//alert(obj.nonce);
			client.verify3DS({
			  amount: 500,
			  creditCard: obj.nonce
			}, function (error, response) {
				if (!error) {
					alert(response.nonce);
				} else {
					// Handle errors
					alert("ERROR");
					var p = document.createElement("p");
					p.innerHTML = error.message;
					document.body.appendChild(p);
				}
			});
		}
	});
	}
</script>

<script>
//	loadBT();
</script>
  
</body>
</html>