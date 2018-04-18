<?php
require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$token_uri     = 'https://gateway.api.cloud.wso2.com';
$client_id     = 'your client id';
$client_secret = 'your client secret';
$grant_type    = "client_credentials";

$client = new Client(['base_uri' => $token_uri]);

$response = $client->request('POST', 'token', [
		'form_params' => [
			'client_id'     => $client_id,
			'client_secret' => $client_secret,
			'grant_type'    => $grant_type,
		]]
);

$WSO2Response =  json_decode($response->getBody()->getContents());

echo "access_token: $WSO2Response->access_token \r\n";
echo "scope: $WSO2Response->scope \r\n";
echo "token_type: $WSO2Response->token_type \r\n";
echo "expires_in: $WSO2Response->expires_in";

