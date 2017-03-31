<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Braintree_PaymentMethod::update()</title>
	<meta name="description" content="Payment Method - Update">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<h1>Payment Method</h1>
	<h2>Braintree_PaymentMethod::update()</h2>
	<form id="create" action="update.php" method="post">
		<label>Token ID</label><input type="text" name="token_id" value=""><br/>
		<label>Holder Name</label><input type="text" name="cardholdername" value="Gustavo Cerati"><br/>
		<label>Street Address</label><input type="text" name="streetaddress" value="Calle River 123"><br/>

		<input type="submit" value="Submit">
	</form>
</body>
</html>