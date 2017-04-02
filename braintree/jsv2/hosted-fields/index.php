<?php require_once("../../includes/braintree_init_ie.php"); ?>
<?php $clientToken = Braintree_ClientToken::generate(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hosted Fields</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<form id="checkout" action="checkout.php" method="post">
		<label>Cardholder name</label><input type="text" name="cardholder_name" value="John Doe">
		<label>Number</label><div id="number" class="hosted-field"></div>
		<label>CVV</label><div id="cvv" class="hosted-field"></div>
		<label>Expiration Month</label><div id="expiration-month" class="hosted-field"></div>
		<label>Expiration Year</label><div id="expiration-year" class="hosted-field"></div>
		<label>Postal Code</label><div id="postal-code" class="hosted-field"></div>			
		<input type="submit" id="submit" value="Pay">
	</form>

	<script src="https://js.braintreegateway.com/js/braintree-2.31.0.min.js"></script>

	<script>
		braintree.setup("<?php echo $clientToken ?>", "custom", {
			id: "checkout",
			hostedFields: {
				styles: {
					/* Style all elements */
					'input': {
						'font-size': '16px',
						'color': '#3A3A3A'
					},
					/* Styling a specific field */
					'.number': {
						'font-family': 'monospace'
					},
					/* Styling element state */
					':focus': {
						'color': 'blue'
					},
					'.valid': {
						'color': 'green'
					},
					'.invalid': {
						'color': 'red'
					},
					/* Media queries */
					/* Note that these apply to the iframe, not the root window. */
					'@media screen and (max-width: 700px)': {
						'input': {
							'font-size': '14px'
						}
					}
				},
				number: {
					selector: "#number",
					placeholder:"Enter your credit card number"
				},
				cvv: {
					selector: "#cvv",
					placeholder:"XXX"
				},				
				expirationMonth: {
					selector: "#expiration-month",
					placeholder:"MM"
				},
				expirationYear: {
					selector: "#expiration-year",
					placeholder:"YYYY"
				},
				postalCode: {
					selector: "#postal-code",
					placeholder:"XXXXX"
				}
			}			
		});
	</script>
</body>
</html>