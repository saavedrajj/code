<?php 
require_once '../../includes/config.php'; 
$clientToken = Braintree_ClientToken::generate();  
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Custom Integration</title>
	<meta name="description" content="Custom Integration">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<h1>Custom Integration<h1>
	<form id="checkout" action="checkout.php" method="post">
		<input data-braintree-name="number" value="4111111111111111"><br/>
		<input data-braintree-name="expiration_date" value="10/20"><br/>
		<input type="submit" id="submit" value="Pay">
	</form>
	<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
	<script>
		braintree.setup("<?php echo $clientToken ?>", "custom", {
			id: "checkout"
		});
	</script>
</body>
</html>