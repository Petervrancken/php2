<?php
require_once ('restclient.php');

$url = 'http://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=e97bd757a9b4c619b67d39814366db46';

$restClient = new RESTClient( $authentication = null );

$restClient->CurlInit($url);
$response = $restClient->CurlExec();

print $response;
?>