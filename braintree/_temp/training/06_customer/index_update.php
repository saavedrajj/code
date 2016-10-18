<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Braintree_Customer::update()</title>
	<meta name="description" content="Customer - Update">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<h1>Customer</h1>
	<h2>Braintree_Customer::update()</h2>
	<form id="update" action="update.php" method="post">
		<label>Customer ID<label><input name="customer_id" value=""><br/>	
		<label>First Name<label><input name="firstname" value="Gustavo"><br/>
		<label>Last Name<label><input name="lastname" value="Lopez"><br/>
		<label>Company<label><input name="company" value="Paypal"><br/>		
		<label>Email<label><input name="email" value="email@email.com"><br/>		
		<label>Phone<label><input name="phone" value="912345678"><br/>
		<label>Fax<label><input name="fax" value="812345679"><br/>	
		<label>Website<label><input name="website" value="http://www.url.com"><br/>		
		<input type="submit" id="submit" value="Submit">
	</form>
</body>
</html>