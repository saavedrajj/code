<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Review payment</h1>
<!--	
?paymentId=PAY-3A845606C2915322GLDNHNBI&
token=EC-6VX000940J951273A&
PayerID=RDA3LHHQQ5GLL

$paymentId = $_GET['paymentId'];
$payment = Payment::get($paymentId, $apiContext);
$payerId = $_GET['PayerID'];

http://127.0.0.1/code/paypal/ec/sdk/ecm/review.php?paymentId=PAY-9YA81584484544612LDNLUXQ&token=EC-995700802X033663L&PayerID=P7CH6JYH6T37L


paymentId=PAY-4FT44280FH483654SLDNL3SI&token=EC-84088844M1229382W&PayerID=P7CH6JYH6T37L
-->
<?php
$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];
$token = $_GET['token'];
echo "paymentId: ". $paymentId."<br>";
echo "PayerID: " . $payerId."<br>";
echo "token: " . $token."<br>";
?>

<a href="execute-payment.php?paymentId=<?php echo $paymentId;?>&PayerID=<?php echo $payerId;?>" target=_blank>Make Payment<a>
</body>
</html>