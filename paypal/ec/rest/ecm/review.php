<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Review payment</h1>
<!--	
?paymentId=PAY-3A845606C2915322GLDNHNBI&token=EC-6VX000940J951273A&PayerID=RDA3LHHQQ5GLL
$paymentId = $_GET['paymentId'];
$payment = Payment::get($paymentId, $apiContext);
$payerId = $_GET['PayerID'];
-->
<?php
$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];
$token = $_GET['token'];
echo $paymentId."<br>";
echo $payerId."<br>";
echo $token."<br>";
?>

<a href="execute-payment.php?paymentId=<?php echo $paymentId;?>&payerId=<?php echo $payerId;?>">make payment<a>
</body>
</html>