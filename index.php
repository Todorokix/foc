<?php
error_reporting(0);
echo " HAPPY LOOTING!! \n";

unlink('cookie.txt');


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



function curl($url, $method, $data = null) {
	global $vvv;
    $header = array(
        "Host: cryptovertz.com",
        "user-agent: $vvv",
        "origin: https://cryptovertz.com",
        "content-type: application/x-www-form-urlencoded",
        "X-Requested-With: XMLHttpRequest",
        "X-Forwarded-For: 211.47.25.42",
        "X-Forwarded-For: 211.47.25.46"
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIE,TRUE);     
    curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function curl_request($url, $method, $data = null) {
	global $vvv;
    $header = array(
        "Host: flukelabs.com",
        "user-agent: $vvv",
        "origin: https://flukelabs.com",
        "content-type: application/x-www-form-urlencoded",
        "X-Requested-With: XMLHttpRequest",        
        "X-Forwarded-For: 211.47.25.42",
        "X-Forwarded-For: 211.47.25.46"
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIE,TRUE);     
    curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function solveCaptcha(){
	global $vvv;
a:
$sit = "6LdpUzMnAAAAAEFrPfwSJ7FA1H31hZ4-2e-rAsx7";
$login = "http://sctg.xyz/in.php?key=Gjd5MbFADqP0DlrurYrAmdIlQ9owqctV|onlyxevil&method=userrecaptcha&googlekey=".$sit."&json=1&pageurl=https://cryptovertz.com/rewards/reward.php";
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
$url = "http://sctg.xyz/res.php?key=Gjd5MbFADqP0DlrurYrAmdIlQ9owqctV|onlyxevil&action=get&id=".$id."";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$proxy = 'socks5://gvtzeurj:0cequgcvyowo@38.154.227.167:5868';
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
curl_setopt($ch, CURLOPT_PROXY, $proxy);       
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
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
$url = "https://flukelabs.com/pullfluke?partner=freebonk&user_id=47648";
//$url = "https://flukelabs.com/pullfluke?partner=fakechicken&user_id=17867";
$response = curl_request($url, 'GET');

$url = "https://flukelabs.com/ajax/fetchGames";
$res = curl_request($url, 'GET');
$link = explode("', this" ,explode("redirectToAboutBlank('", $res)[1])[0];
if($link == ""){echo " stoped!! \n";sleep(99999);}
$gam = curl($link, 'GET');


$url = "https://cryptovertz.com/";
$data = "submit=Continue";
$response = curl($url, 'POST', $data);

p:
$url = "https://cryptovertz.com/game.php?id=boxing-stars";
$str = curl($url, 'GET');
$lef = explode(' / 50</button>',explode('<button class="btn btn-danger">Limit: ', $str)[1])[0];


	

sleep(11);
$capv = solveCaptcha();


$url = 'https://cryptovertz.com/rewards/reward.php';
$data = "rcapchta_response=".$capv."";
$response = curl($url, 'POST', $data);
$suc = explode("<a class='btn btn-primary' href='rewards/start.php?",$response);
$user = explode('&crypto',explode('user=', $response)[1])[0];
$ren = $suc[0];

date_default_timezone_set('Asia/Jakarta');
$timestamp = time();
$wak = date("[H:i]", $timestamp);
echo" ".$wak." ".$ren." \n";
$url = "https://cryptovertz.com/rewards/start.php?partner=flukegames&user=".$user."&crypto=SHIB";
$str = curl($url, 'GET');
if($lef == "49"){echo "Complete!!! \n";sleep(99999);}
goto p;
?>
