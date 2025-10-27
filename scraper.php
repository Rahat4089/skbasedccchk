<?php
error_reporting(0);
extract($_GET);
function get_str($string, $start, $end) {
  return explode($end, explode($start, $string)[1])[0];
}
$page1 = $page/30;
$bilang = explode(".", $page1);
$page = $bilang[0];

$gags = explode("https://t.me/", $channel);
$gagu = explode("@", $channel);
if($gagu[1]){
  $channel=$gagu[1];
}
else if($gags[1]){
  $channel=$gags[1];
}
else{
  $channel=$channel;
}


switch ($page) {
        case '0':
        $page = '1';
          break;
        }
if($page >= 50) {
        $page = 50;
}
function forward($text) {
  file_get_contents("https://api.telegram.org/bot5962559391:AAErzpu1N9QrF5uMTOYuNzoOeQYk6MHHm2k/sendMessage?chat_id=-548699498&text=$text&parse_mode=html");
}

$cc_array = [];
for ($i = 0; $i < $page; $i++) {
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://t.me/s/".$channel."?before=".$before); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
$headers = array();
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: none';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'TE: trailers"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
$result = curl_exec($ch); 
curl_close($ch);
$before = get_str($result, '<link rel="prev" href="/s/'.$channel.'?before=','">');

preg_match_all('/\d*\|\d*\|\d*\|\d*/', $result, $array);
#preg_match_all('/\d{6}*/', $result, $array);
$cc_array = array_merge($cc_array, $array[0]);
if (!$cc_array){
  echo $error="There is no telegram channel with that username.";
  exit;
}
}
forward("Someone scraped in @$channel");
echo implode("\n", array_unique($cc_array));

