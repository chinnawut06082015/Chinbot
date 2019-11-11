<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Test pare</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="">
	</head>
	<body>

		<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		
		<script src="" async defer></script>
	</body>
</html>
<?php
$path = __DIR__ . '/vendor/autoload.php';
require_once $path;
/*
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('PK22vMsinZQh0VWpwVlHnXCXiHfDoA+oGk1d0eaOaIRtPf6mEIDvRVprJ0e7o06eKjqa2B3TONZ9CkOP2og96CHl1v21hcmoB5mwZm1umzoHRy0zkyFPEC3kkwKXuO9IECWdEc0zz/3GMcoExpVy9gdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '3ac88d67a3c8f207a35717e4537f6f58']);*/

$access_token = 'PK22vMsinZQh0VWpwVlHnXCXiHfDoA+oGk1d0eaOaIRtPf6mEIDvRVprJ0e7o06eKjqa2B3TONZ9CkOP2og96CHl1v21hcmoB5mwZm1umzoHRy0zkyFPEC3kkwKXuO9IECWdEc0zz/3GMcoExpVy9gdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			$userId = $event['source']['userId'];
			$id = $event['message']['id'];
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $id,
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";

?>