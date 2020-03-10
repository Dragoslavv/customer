<?php
session_start();
error_reporting(E_ALL);
date_default_timezone_set('Europe/Belgrade');

// SEND HEADERS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$_SESSION['tokenSession'] = array();

$url = 'http://10.245.208.5:8008/api/login';

$headers = array();
$headers[] = 'Content-Type application/x-www-form-urlencoded; charset=UTF-8';

$post_data = '';

foreach ($_POST as $key => $value) {
    if ($post_data == '') {
        $post_data = $key . '=' . $value;
    } else {
        $post_data = $post_data . '&' . $key . '=' .$value;
    }
}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$responseFromApi = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);


if (curl_errno($ch)) {
    $retVal = array("result"=>false);
} else {
    $retVal = $responseFromApi;
}

curl_close($ch);
echo $retVal;

if(isset($_SESSION['tokenSession']) ){
    $token = json_decode($retVal, true);

    session_set_cookie_params ( $token['expires_in'] );
    setcookie( "customers",$token["access_token"],time() + $token['expires_in'] );

    array_push($_SESSION['tokenSession'],$token["access_token"]);

}

exit();

?>
