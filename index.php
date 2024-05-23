<?php
error_reporting(0);
echo " HAPPY LOOTING!! \n";
unlink('cookie.txt');


$mail = array("kongoytre@embeans.com");


$gg = rand(1,100);
$xc = rand(1,100);
$ipp = "".$gg.".106.9.".$xc;

function curl_request($url, $method, $data = null) {
	global $ipp,$vvv;
    $header = array(
        "Host: megaclaimer.com",
        "X-Forwarded-For: ".$ipp."",
        "upgrade-insecure-requests: 1",
        "content-type: application/x-www-form-urlencoded",
        "X-Requested-With: XMLHttpRequest",      
        "User-Agent: ".$vvv.""
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIE, "");
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
$sit = "ec70f443-7e6a-49ad-9073-3a416198b15e";
$login = "http://sctg.xyz/in.php?key=pgaGommLr1eenOsedtdL92F3vOzCfNSA&method=hcaptcha&sitekey=".$sit."&json=1&pageurl=https://megaclaimer.com/login.php";
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
$url = "http://sctg.xyz/res.php?key=pgaGommLr1eenOsedtdL92F3vOzCfNSA&action=get&id=".$id."";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
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



$repp = $mail[0];


$url = "https://megaclaimer.com/login.php";
$response = curl_request($url, 'GET');
$capp = solveCaptcha();
$url = 'https://megaclaimer.com/login.php';
$data = "email=".$repp."&password=Nung1234&g-recaptcha-response=&h-captcha-response=".$capp."&submit=login+Now";
$response = curl_request($url, 'POST', $data);
//echo $response;exit;

$url = 'https://megaclaimer.com/member/account.php';
$res = curl_request($url, 'GET');
$id = explode('">' ,explode('<input type="hidden" name = "token" value="', $res)[1])[0];
$bal = explode(" coins" ,explode("<i class='bx bxs-coin-stack' style='color:#ced215;height:100%;'  ></i><span> ", $res)[1])[0];
$mma = explode('" >' ,explode('<input type="text" name="fpemail" value="', $res)[1])[0];
/*
if($mma == ""){

$url = 'https://megaclaimer.com/member/account.php';
$data = "fpemail=artia.zana88@gmail.com&cwemail=&payeer=&bitcoin=&token=".$id."&update=Update";
$response = curl_request($url, 'POST', $data);
$ma = explode('" >' ,explode('<input type="text" name="fpemail" value="', $response)[1])[0];

echo " ".$ma." \n";
}
*/
$url = 'https://megaclaimer.com/member/withdraw.php';
$res = curl_request($url, 'GET');

$url = 'https://megaclaimer.com/member/withdraw-verify.php';
$data = "currency=bitcoin&address=artia.zana88@gmail.com&amount=".$bal."&fp-withdrawal=Withdraw";
$response = curl_request($url, 'POST', $data);
$ball = explode(" coins" ,explode("<i class='bx bxs-coin-stack' style='color:#ced215;height:100%;'  ></i><span> ", $response)[1])[0];
echo "Balance = ".$ball." \n";
sleep(99999);





