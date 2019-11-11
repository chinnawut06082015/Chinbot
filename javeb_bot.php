<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

$logger = new Logger('LineBot');
$logger->pushHandler(new StreamHandler('php://stderr', Logger::DEBUG));

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV["PK22vMsinZQh0VWpwVlHnXCXiHfDoA+oGk1d0eaOaIRtPf6mEIDvRVprJ0e7o06eKjqa2B3TONZ9CkOP2og96CHl1v21hcmoB5mwZm1umzoHRy0zkyFPEC3kkwKXuO9IECWdEc0zz/3GMcoExpVy9gdB04t89/1O/w1cDnyilFU="]);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_ENV["3ac88d67a3c8f207a35717e4537f6f58"]]);

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

  if($event['message']['text'] == 'เบอร์ติดต่อแต่ละสาขา' )
  {
	  $reply_message = 'สาขาปากเกร็ด 5533'."\n"."สาขาแจ้งวัฒนะ 2533"."\n"."สาขาบางกอกน้อย 4533"."\n"."สาขาหนองแขม 3533";
  }
  if($event['message']['text'] == 'ปัญหาระบบคอมพิวเตอร์')
  {
    $actions = array (
      // general message action
      New \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder("button 1", "text 1"),
      // URL type action
      New \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder("Google", "http://www.google.com"),
      // The following two are interactive actions
      New \LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder("next page", "page=3"),
      New \LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder("Previous", "page=1")
    );
    $img_url = "https://cdn.shopify.com/s/files/1/0379/7669/products/sampleset2_1024x1024.JPG?v=1458740363";
    $button = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder("button text", "description", $img_url, $actions);
    $outputText = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder("this message to use the phone to look to the Oh", $button);
    /*$textReplyMessage = new BubbleContainerBuilder(
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
  $replyData = new FlexMessageBuilder("Flex",$textReplyMessage);*/
  }

?>