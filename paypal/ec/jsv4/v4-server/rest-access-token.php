<?php
$config = include('../config.php');

// Request Access Token
$request = curl_init();
curl_setopt($request, CURLOPT_URL, $config['rest_url'] . '/v1/oauth2/token');
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request, CURLOPT_HEADER, array(
            'Content-type: application/x-www-form-urlencoded',
            'Accept: application/json',
            'Accept-Language: en_US'));
curl_setopt($request, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
curl_setopt($request, CURLOPT_USERPWD, $config['app_client_id'] . ':' . $config['app_secret']);
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($request);
$header_size = curl_getinfo($request, CURLINFO_HEADER_SIZE);
curl_close($request);

// Response Access Token
$header = substr($result, 0, $header_size);
$body = substr($result, $header_size);
$output = json_decode($body, true);
$access_token = $output['access_token'];

if ($_GET['verb']) echo $access_token;

return $access_token;

?>
