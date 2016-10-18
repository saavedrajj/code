<?php
require_once('../../../includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PayPal - Web Payments Standard</title>
	<link href="../../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div class="page-header"><h1>Web Payments Standard</h1></div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Buy Now</h3>
		</div>
		<div class="panel-body">


			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

				<!-- Identify your business so that you can collect the payments. -->
				<input type="hidden" name="business" value="<?php echo $paypal_account ; ?>">

				<!-- Specify a Buy Now button. -->
				<input type="hidden" name="cmd" value="_xclick">

				<!-- Specify details about the item that buyers will purchase. -->
				<input type="hidden" name="item_name" value="Hot Sauce">
				<input type="hidden" name="currency_code" value="EUR">

				<!-- Provide a dropdown menu option field. -->
				<input type="hidden" name="on0" value="Type">Type of sauce <br />
				<select name="os0">
					<option value="Select a type">-- Select a type --</option>
					<option value="Red">Red sauce</option>
					<option value="Green">Green sauce</option>
				</select> <br />

				<!-- Provide a dropdown menu option field with prices. -->
				<input type="hidden" name="on1" value="Size">Size <br />
				<select name="os1">
					<option value="06oz">6 oz. bottle - $5.95 USD</option>
					<option value="12oz">12 oz. bottle - $9.95 USD</option>
					<option value="36oz">3 12 oz. bottles - $19.95 USD</option>
				</select> <br />

				<!-- Specify the price that PayPal uses for each option. -->
				<input type="hidden" name="option_index" value="1">
				<input type="hidden" name="option_select0" value="06oz">
				<input type="hidden" name="option_amount0" value="5.95">
				<input type="hidden" name="option_select1" value="12oz">
				<input type="hidden" name="option_amount1" value="9.95">
				<input type="hidden" name="option_select2" value="36oz">
				<input type="hidden" name="option_amount2" value="19.95">

				<input type="hidden" name="custom" value="http://www.url1.com">
				<input type="hidden" name="invoice" value="http://www.invoice.com">
				<!-- Display the payment button. -->
				<input type="image" name="submit" border="0"
				src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
				alt="PayPal - The safer, easier way to pay online">
				<img alt="" border="0" width="1" height="1"
				src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

			</form>

		</div>
		<div class="panel-footer">&copy; <?php echo date("Y");?> <a href="http://saavedrajj.com" target="_blank">Juan Saavedra</a></div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../../../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
