<?php
error_reporting(0);
echo " •••HAPPY LOOTING••• \n";
$ar= array("577");
$n=4;

function getName($n) {
    $characters = '0123456789';
    $randomString = ''; 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

$mnk = getName($n);
$rd = rand(0,999);
$vvv = "Mozilla/5.0 (Linux; Android 2.3.6) AppleWebKit/533.1 (KHTML, like Gecko) edge X/".$mnk."";

function generateRandomIP() {
    $octet1 = rand(1, 255);
    $octet2 = rand(0, 255);
    $octet3 = rand(0, 255);
    $octet4 = rand(1, 255);
    $randomIP = "$octet1.$octet2.$octet3.$octet4";
    return $randomIP;
}
$ipp = generateRandomIP();

function http_request($url, $method = 'GET', $data = null, $headers = []) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
    curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    if (strtoupper($method) === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        return "cURL Error: $error_msg";
    }
    curl_close($ch);
    return $response;
}

$headers = [
       "Host: excentiv.com",
        "content-type: application/x-www-form-urlencoded",
        "X-Forwarded-For: $ipp",
        "X-Forwarded-For: ".$ipp."",
        "user-agent: ".$vvv.""
];

$headers2 = [
       "Host: coins-battle.com",
        "content-type: application/x-www-form-urlencoded",
        "X-Requested-With: XMLHttpRequest",
        "X-Forwarded-For: ".$ipp."",
        "user-agent: ".$vvv.""
];

function token(){
	global $use, $headers;
mk:
$url = "https://excentiv.com/offerwall/?userid=".$use."&key=CcWgeGYjnrIqhAUZdzVf";
//$url = "https://excentiv.com/offerwall?userid=4b4b6bf41acc&key=5eaQHDSVYcwbdACp6ZB7";
$of = http_request($url, 'GET', null, $headers);

sleep(5);
//if (strpos($of, "Games") === false) {echo" Game Hilang \n";sleep(99999);}
$tokk = explode('"',explode('<button value="https://coins-battle.com?token=', $of)[1])[0];
if($tokk==""){goto mk;}
return $tokk;
}
function solveCaptcha(){
	global $vvv;
a:
$sit = "6LdQN2wkAAAAAJcsc6u8xgog6ObX0icCRAowGiW8";
$login = "http://sctg.xyz/in.php?key=LtPy3TlWHBZFzxJTJDdr3SNC1T4a9H6B&method=userrecaptcha&googlekey=".$sit."&json=1&pageurl=https://coins-battle.com/game/claimreward";
$ua[] = "User-Agent: ".$vvv."";
$ua[] = "Content-Type: application/json";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $login);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($ch);

$re = json_decode($result);
$id = $re->request;
if($id==''){goto a;}
c:
$url = "http://api.sctg.xyz/res.php?key=LtPy3TlWHBZFzxJTJDdr3SNC1T4a9H6B&action=get&id=".$id."";
$proxy = 'http://qhunsbzn:if51h5om5czo@38.154.227.167:5868';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$res = curl_exec($ch);

if ($res == 'CAPCHA_NOT_READY') {          
        sleep(6);
        goto c;
    }
if($res=="ERROR_CAPTCHA_UNSOLVABLE"){sleep(80);goto a;}

$captcha = str_replace("OK|", "", $res);

curl_close($ch);
return $captcha;
}



function run(){
	global $rac,$headers2;

$url = "https://coins-battle.com/game/play/".$rac."";
$red = http_request($url, 'GET', null, $headers2);
return $red;
}
function runn(){
	global $capv,$idd,$csf,$headers2;

$url = 'https://coins-battle.com/game/claimreward';
$data = "game_id=".$idd."&csrf_token=".$csf."&captcha=recaptchav2&g-recaptcha-response=".$capv."";
$redi = http_request($url, 'POST', $data, $headers2);
return $redi;
}


$ui = rand(1,12);
$bb = 0;

xx:


//$ar= array("a5a4fd6959a8","292e41d76d32","b386b2cf6261","c8766322c32a");

$use = $ar[$bb];
echo "userid = ".$use." \n";
if($use == ""){echo "Complete!!! \n";unlink('cookie.txt');sleep(99999);}
unlink('cookie.txt');
zz:
$rot = token();
$url = "https://coins-battle.com/?token=".$rot."";
$bat = http_request($url, 'GET', null, $headers2);

$rac = rand(1,12);
while(true):
sleep(1);
$btc = run();
$con = explode(' </b>&nbsp;',explode('<b class="gradient-text">Website: ', $btc)[1])[0];
if($con == ""){echo " not connect! \n";$bb=$bb;goto zz;}
if(isset($con)) {
    $dx="ON";
}
//$sit = explode('"',explode('<div class="g-recaptcha" data-sitekey="', $btc)[1])[0];
$idd = explode('">',explode('<input type="hidden" name="game_id" value="', $btc)[1])[0];
$csf = explode('">',explode('<input type="hidden" name="csrf_token" value="', $btc)[1])[0];
$tim = explode("';",explode("let ctimer = '", $btc)[1])[0];
$lef = explode(' today',explode('<p><b>You have already play ', $btc)[1])[0];
if($lef=="70/70"){$bb=$bb+1;unlink('cookie.txt');goto xx;}

$capv = solveCaptcha();
$las = runn();

$suc = explode(', to continue earning',explode('<div class="alert text-center alert-success"><i class="fa fa-check-circle"></i> ', $las)[1])[0];
date_default_timezone_set('Asia/Jakarta');
$timestamp = time();
$wak = date("[H:i]", $timestamp);

if (strpos($suc, "obtained") !== false) {echo"[".$dx."] ".$wak."  [".$lef."] $suc \n";}

sleep(71);

if($lef=="69/70"){$bb=$bb+1;unlink('cookie.txt');goto xx;}


endwhile;






?>
