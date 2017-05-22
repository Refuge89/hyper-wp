<?php

ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);
ini_set('soap.wsdl_cache',0);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

opcache_reset();


include "../../conf/conf.def.php";
include "../../conf/conf.php";

$username = SOAP_USER;
$password = SOAP_PASS;
$host = SOAP_IP;
$soapport = SOAP_PORT;
$command = "server info";

echo "trying $command on host {$host}:{$soapport} with $username<br>";

$client = new SoapClient(NULL,
array(
    "location" => "http://$host:$soapport/",
    "uri" => "urn:TC",
    "style" => SOAP_RPC,
    'login' => $username,
    'password' => $password
));

$result = $client->executeCommand(new SoapParam($command, "command"));
echo "Command succeeded! Output:<br />\n";
echo $result;

echo "\n";
