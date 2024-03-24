<?php
//
//
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'curl/curl.h';
//echo "hello";
$ch = curl_init();

$app_id = "L5RKhynoEjfebi9eLAcodgfKM5pRhdRa";
$app_secret = "03e6b3e09f054d9459dd994ce78075b6ccd5188e6482de557b6795b188ccfaeb";
$message = "Hello World ";
$address = "9954161925";
$passphrase = "GGHLVZxid4";

curl_setopt($ch, CURLOPT_URL,"https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/5709/requests");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "message=".$message."&address=".$address."&passphrase=".$passphrase."&app_id=".$app_id."&app_secret=".$app_secret."");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);

// Further processing ...
//if ($server_output == "OK") { ... } else { ... } 
?>