<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Braintree_Address::create()</title>
	<meta name="description" content="Address - Create">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<h1>Address</h1>
	<h2>Braintree_Address::create()</h2>
	<form id="create" action="create.php" method="post">
		<label>Customer ID</label><input name="customer_id" value=""><br/>
		<label>First Name</label><input name="firstname" value="Gustavo"><br/>
		<label>Last Name</label><input name="lastname" value="López"><br/>
		<label>Company</label><input name="company" value="Amazon"><br/>		
		<label>Street Address</label><input name="streetaddress" value="Calle Alcalá 123"><br/>
		<label>Extended Address</label><input name="extendedaddress" value="4C"><br/>					
		<label>Locality</label><input name="locality" value="Madrid"><br/>	
		<label>Region</label><input name="region" value="Comunidad de Madrid"><br/>		
		<label>Postal Code</label><input name="postalcode" value="28010"><br/>	
		<label>Country Code</label><input name="countrycode" value="ES"><br/>			
		<input type="submit" id="submit" value="Submit">
	</form>
</body>
</html>