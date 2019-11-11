<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

$logger = new Logger('LineBot');
$logger->pushHandler(new StreamHandler('php://stderr', Logger::DEBUG));

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV["LINEBOT_ACCESS_TOKEN"]);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_ENV["LINEBOT_CHANNEL_SECRET"]]);

$signature = $_SERVER['HTTP_' . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
try {
	$events = $bot->parseEventRequest(file_get_contents('php://input'), $signature);
} catch(\LINE\LINEBot\Exception\InvalidSignatureException $e) {
	error_log('parseEventRequest failed. InvalidSignatureException => '.var_export($e, true));
} catch(\LINE\LINEBot\Exception\UnknownEventTypeException $e) {
	error_log('parseEventRequest failed. UnknownEventTypeException => '.var_export($e, true));
} catch(\LINE\LINEBot\Exception\UnknownMessageTypeException $e) {
	error_log('parseEventRequest failed. UnknownMessageTypeException => '.var_export($e, true));
} catch(\LINE\LINEBot\Exception\InvalidEventRequestException $e) {
	error_log('parseEventRequest failed. InvalidEventRequestException => '.var_export($e, true));
}

foreach ($events as $event) {

	// Postback Event
	if (($event instanceof \LINE\LINEBot\Event\PostbackEvent)) {
		$logger->info('Postback message has come');
		continue;
	}
	// Location Event
	if  ($event instanceof LINE\LINEBot\Event\MessageEvent\LocationMessage) {
		$logger->info("location -> ".$event->getLatitude().",".$event->getLongitude());
		continue;
	}

  if($event['message']['text'] == 'เบอร์ติดต่อแต่ละสาขา' )
  {
	  $reply_message = 'สาขาปากเกร็ด 5533'."\n"."สาขาแจ้งวัฒนะ 2533"."\n"."สาขาบางกอกน้อย 4533"."\n"."สาขาหนองแขม 3533";
  }
  if($event['message']['text'] == 'ปัญหาระบบคอมพิวเตอร์')
  {
    $textReplyMessage = new BubbleContainerBuilder(
      "ltr",  // กำหนด NULL หรือ "ltr" หรือ "rtl"
      new BoxComponentBuilder(
          "vertical",
          array(
              new TextComponentBuilder("This is Header")
          )
      ),
      new ImageComponentBuilder(
          "https://www.ninenik.com/images/ninenik_page_logo.png",NULL,NULL,NULL,NULL,"full","20:13","cover"),
      new BoxComponentBuilder(
          "vertical",
          array(
              new TextComponentBuilder("This is Body")
          )
      ),
      new BoxComponentBuilder(
          "vertical",
          array(
              new TextComponentBuilder("This is Footer")
          )
      ),
      new BubbleStylesBuilder( // style ทั้งหมดของ bubble
          new BlockStyleBuilder("#FFC90E"),  // style สำหรับ header block
          new BlockStyleBuilder("#EFE4B0"), // style สำหรับ hero block
          new BlockStyleBuilder("#B5E61D"), // style สำหรับ body block
          new BlockStyleBuilder("#FFF200") // style สำหรับ footer block
      )
  );
  $replyData = new FlexMessageBuilder("Flex",$textReplyMessage);
  }

?>