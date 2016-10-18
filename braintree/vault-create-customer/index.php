<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Braintree_Customer::create()</title>
	<meta name="description" content="Customer - Create">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<h1>Customer</h1>
	<h2>Braintree_Customer::create()</h2>
	<form id="create" action="create.php" method="post">
		<label>First Name<label><input name="firstname" value="John"><br/>
		<label>Last Name<label><input name="lastname" value="Doe"><br/>
		<label>Company<label><input name="company" value="Paypal"><br/>		
		<label>Email<label><input name="email" value="email@email.com"><br/>		
		<label>Phone<label><input name="phone" value="912345678"><br/>
		<label>Fax<label><input name="fax" value="812345679"><br/>	
		<label>Website<label><input name="website" value="http://www.url.com"><br/>		
		<input type="submit" id="submit" value="Submit">
	</form>
</body>
</html>