<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Braintree_Address::update()</title>
	<meta name="description" content="Address - Update">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<h1>Address</h1>
	<h2>Braintree_Address::update()</h2>
	<form id="create" action="update.php" method="post">
		<label>Customer ID</label><input name="customer_id" value=""><br/>
		<label>Address ID</label><input name="address_id" value=""><br/>
		<label>First Name</label><input name="firstname" value="Gustavo"><br/>
		<label>Last Name</label><input name="lastname" value="Cerati"><br/>
		<label>Company</label><input name="company" value="Supersónico"><br/>		
		<label>Street Address</label><input name="streetaddress" value="Calle River 123"><br/>
		<label>Extended Address</label><input name="extendedaddress" value="4C"><br/>					
		<label>Locality</label><input name="locality" value="Buenos Aires"><br/>	
		<label>Region</label><input name="region" value="Buenos Aires"><br/>		
		<label>Postal Code</label><input name="postalcode" value="38010"><br/>	
		<label>Country Code</label><input name="countrycode" value="AR"><br/>			
		<input type="submit" id="submit" value="Submit">
	</form>
</body>
</html>