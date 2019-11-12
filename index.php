<?php
// การตั้งเกี่ยวกับ bot
require_once 'bot_settings.php';
/*
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('PK22vMsinZQh0VWpwVlHnXCXiHfDoA+oGk1d0eaOaIRtPf6mEIDvRVprJ0e7o06eKjqa2B3TONZ9CkOP2og96CHl1v21hcmoB5mwZm1umzoHRy0zkyFPEC3kkwKXuO9IECWdEc0zz/3GMcoExpVy9gdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '3ac88d67a3c8f207a35717e4537f6f58']);*/
 
// include composer autoload
require_once '/vendor/autoload.php';

// กรณีมีการเชื่อมต่อกับฐานข้อมูล
//require_once("dbconnect.php");
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(LINE_MESSAGE_ACCESS_TOKEN);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => LINE_MESSAGE_CHANNEL_SECRET]);
// เชื่อมต่อกับ LINE Messaging API
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->pushMessage('<to>', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
/*
// คำสั่งรอรับการส่งค่ามาของ LINE Messaging API
$content = file_get_contents('php://input');
 
// แปลงข้อความรูปแบบ JSON  ให้อยู่ในโครงสร้างตัวแปร array
$events = json_decode($content, true);
if(!is_null($events)){
    // ถ้ามีค่า สร้างตัวแปรเก็บ replyToken ไว้ใช้งาน
    $replyToken = $events['events'][0]['replyToken'];
}
// ส่วนของคำสั่งจัดเตียมรูปแบบข้อความสำหรับส่ง
$textMessageBuilder = new TextMessageBuilder(json_encode($events));
 
//l ส่วนของคำสั่งตอบกลับข้อความ
$response = $bot->replyMessage($replyToken,$textMessageBuilder);
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}*/
?>