<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Braintree_Subscription::create()</title>
	<meta name="description" content="Address - Create">
	<meta name="author" content="Juan Saavedra">
</head>
<body>
	<h1>Subscription</h1>
	<h2>Braintree_Subscription::create()</h2>
	<form id="create" action="create.php" method="post">
		<label>Plan ID</label><input name="plan_id" value=""><br/>
		<label>Payment Method Token</label><input name="token_id" value=""><br/>		
		<input type="submit" id="submit" value="Submit">
	</form>
</body>
</html>