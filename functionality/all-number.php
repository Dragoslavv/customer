<?php
session_start();
error_reporting(E_ALL);
date_default_timezone_set('Europe/Belgrade');


$url = 'http://10.245.208.5:8008/api/getpostpaid';

$headers = array(
    'Content-Type: application/json',
    'Access-Control-Allow-Origin: *',
    'Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS',

    sprintf('Authorization: Bearer %s', $_SESSION['tokenSession'][0])
);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$responseFromApi = curl_exec($curl);
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);


if (curl_errno($curl)) {
    $retVal = array("result"=>false);
} else {
    $retVal = $responseFromApi;
}

curl_close($curl);

echo $retVal;

?>
