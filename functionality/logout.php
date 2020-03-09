<?php
session_start();
error_reporting(E_ALL);
date_default_timezone_set('Europe/Belgrade');

// SEND HEADERS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


if(isset($_SESSION["tokenSession"][0]))
{
    unset($_SESSION["tokenSession"][0]);

    session_destroy();

    echo json_encode(array("result"=> true));

}

exit();
