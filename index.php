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
require 'vendor/autoload.php';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('PK22vMsinZQh0VWpwVlHnXCXiHfDoA+oGk1d0eaOaIRtPf6mEIDvRVprJ0e7o06eKjqa2B3TONZ9CkOP2og96CHl1v21hcmoB5mwZm1umzoHRy0zkyFPEC3kkwKXuO9IECWdEc0zz/3GMcoExpVy9gdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '3ac88d67a3c8f207a35717e4537f6f58']);

foreach($data['event'] as $even){
$response = $bot->replyText('<reply token>', 'hello!');
}

?>