<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Braintree - DropIn</title>
	<meta name="description" content="Dropin Integration">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<h1>Vault</h1>
	<h2>Customer ID Payment</h2>
	<form id="checkout" method="post" action="checkout_customerid.php">
		<div id="payment-form"></div>
		<input type="text" name="customer_id" value="">
		<input type="submit" value="Submit">
	</form>
</body>
</html>