<?php
$config = include('../config.php');
$access = include('rest-access-token.php');

// Payment Parameters
$params = array(
  'intent' => 'sale',
  'redirect_urls' => [
    'return_url' => $config['domain'].'/v4-server/rest-execute',
    'cancel_url' => $config['domain'].'/v4-server/rest-execute'
    ],
  'payer' => [
    'payment_method' => 'paypal',
    'payer_info' => [
      'email' => 'pepe@paypal.com'
      ]
    ],
  'transactions' => [
      [
        'amount' => [
          'total' => '159.95',
          'currency' => 'EUR',
          'details' => [
            'subtotal' => '149.95',
            'shipping' => '10.00',
            'tax' => '0.00'
            ]
          ],
        'description' => 'Descripcion general de la compra',
        // 'invoice_number' => '',
        'custom' => 'Campo privado del comercio',
        'item_list' => [
          'items' => [
            [
              'quantity' => '1',
              'name' => 'Producto A',
              'price' => '99.95',
              'currency' => 'EUR',
              'description' => 'Esta es la descripcion del producto A'
              ],
            [
              'quantity' => '2',
              'name' => 'Producto B',
              'price' => '25.00',
              'currency' => 'EUR',
              'description' => 'Esta es la descripcion del producto B'
              ]
            ],
          'shipping_address' => [
            'recipient_name' => 'Pepe Arespacochaga',
            'line1' => 'Av. Europa 4',
            'line2' => '1º C',
            'city' => 'Alcobendas',
            'state' => 'Madrid',
            'postal_code' => '28108',
            'country_code' => 'ES',
            'phone' => '617334670'
            ]
          ]
        ]
      ]
);

// Request Create Payment
$request = curl_init();
curl_setopt($request, CURLOPT_URL, $config['rest_url'] . '/v1/payments/payment');
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $access));
curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($params));
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($request);
curl_close($request);

// Response Create Payment
if ($_GET['verb']) {
  echo "<pre>";
  print_r($params);
  echo "</pre>";
  echo "<pre>";
  print_r(json_decode($result));
  echo "</pre>";
}
else {
  echo $result;
}

?>
