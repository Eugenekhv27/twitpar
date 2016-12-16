<meta charset="utf-8">
<?php
require_once('simple_html_dom.php');
$html = new simple_html_dom();
$html = file_get_html('http://twitter.com/Eugene_khv27');
foreach ($html->find('div[class^=tweet js-stream]') as $li ) {
	
	foreach ($li->find('div[class=content]') as $content) {
		
		echo $nick = $content->find('span.username',0)->plaintext;
		
		echo $time = $content->find('span[class^=_timestamp js-short-timestamp]',0)->plaintext . "<br>";
		$text = $content->find('p.TweetTextSize',0)->plaintext . "<br><br>";	
		$str_pos = strpos($text, "pic.twitter");
		if($str_pos > 0){
			echo substr($text, 0,$str_pos) . "<br><br>";
		}else{
			echo $text;
		}
	}
}
?>