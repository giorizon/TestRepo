<?php
//extract data from the post
//set POST variables
$app_id = 'L5RKhynoEjfebi9eLAcodgfKM5pRhdRa';
$app_secret = '03e6b3e09f054d9459dd994ce78075b6ccd5188e6482de557b6795b188ccfaeb';
$message = 'Hello World';
$address = '9954161925';
$passphrase = 'GGHLVZxid4';
$url = 'https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/5709/request';
$fields = array(
	'message' => urlencode($message),
	'address' => urlencode($address),
	'passphrase' => urlencode($passphrase),
	'app_id' => urlencode($add_id),
	'app_secret' => urlencode($app_secret)
);

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection

curl_close($ch);
echo $app_id;
?>