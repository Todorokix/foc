<?php
error_reporting(0);
echo " •HAPPY LOOTING• \n";
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
$vvv = "Mozilla/5.0 (Linux; Android 13; SM-A515U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Mobile Safari/537.36 X/".$mnk."";

function solveCaptcha(){
	global $vvv;
a:
$sit = "0x4AAAAAAAZWGl4XNAQLb9Uf";
$login = "http://api.sctg.xyz/in.php?key=Gjd5MbFADqP0DlrurYrAmdIlQ9owqctV&method=turnstile&sitekey=".$sit."&json=1&pageurl=https://acryptominer.io/user/faucet";
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
$url = "https://xzz3-60aa567db750.herokuapp.com/?key=Gjd5MbFADqP0DlrurYrAmdIlQ9owqctV&id=".$id."";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$res = curl_exec($ch);

$rf = json_decode($res);
$hy = $rf->response;

if ($hy == 'CAPCHA_NOT_READY') {          
        sleep(6);
        goto c;
    }
if($hy=="ERROR_CAPTCHA_UNSOLVABLE"){sleep(80);goto a;}

$captcha = str_replace("OK|", "", $hy);
curl_close($ch);
return $captcha;
}

function http_request($url, $method = 'GET', $data = null, $headers = []) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    
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
       "Host: acryptominer.io",
        "origin: https://acryptominer.io",
        "content-type: application/x-www-form-urlencoded",
        "Connection: keep-alive",
        "Cookie: bitmedia_fid=eyJmaWQiOiI1ZDc5MDdjNDlhMDg0MGRhNGUxNjYxZGFhMzA4NmFjYSIsImZpZG5vdWEiOiIyZTI4Y2ZmYzIyOTljMjUzNDY2NDE4ZjM4ZDEyYWE2NyJ9; XSRF-TOKEN=eyJpdiI6IkRLMFFKeTVZOVZva2VTYnFjY0srWHc9PSIsInZhbHVlIjoiM0xHNHRHZDMzWjloOWlsU0JpQklyZDJaNnhXdms2ZmIxcHcrWlpCOVg5TlZ6NkhkMTB2OXhhTWppcm1icWZEYmZUV09uY1hXSE41K1JvQkppblNDTHhQZVYzcHArZXQyTmdTVEcyWTVkV0lXaytzcytZN1FrS29hMS9zMDJQRnQiLCJtYWMiOiIwMzIzNmI5OGRlMjgwYmE1NDUwODQwMmRhMzRjN2I5YjJiN2MxZDI5ZTczNTVjNmRkNjBjOWU1NTAyZGQ5ZGFhIiwidGFnIjoiIn0%3D; minelab_session=eyJpdiI6InRXUjJDRkRyNjA1VWNCbXROdis0K0E9PSIsInZhbHVlIjoiWTNWdXp0STZuOFVYRUwzbytYQmJ4eDhmVDk1eEd5Ym05NTVuNlhQUDdkY3pza1VnSTBnUXBmTEhzaXY3REZRckNEVDczNjEvY3FJTW9jYnh6MElweXJNSjlybjlNYVdyOHhzWk41Z1lFM2pMazBDekV0aXFYVGI3VmRHd25ENkoiLCJtYWMiOiJkOGNiMzE5NTM2ZDNlZWFlOTE5YTA3OWU3MTUzZWY3MmFiM2FiMmI5MjQ0NDJkOGU2ZTQzY2YwYjA1YTBhYTg5IiwidGFnIjoiIn0%3D",      
        "user-agent: Mozilla/5.0 (Linux; Android 10; FRD-DL00 Build/QD4A.200805.003; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/94.0.4606.80 Mobile Safari/537.36"
];
while(true):
$url = "https://acryptominer.io/user/faucet";
$str = http_request($url, 'GET', null, $headers);
$lef = explode('">',explode('<input type="hidden" name="_token" value="', $str)[1])[0];
if($lef == ""){echo "csf hilang \n";sleep(99999);}
$cap = solveCaptcha();
$url = 'https://acryptominer.io/user/faucet';
$data = "_token=".$lef."&cf-turnstile-response=".$cap."";
$response = http_request($url, 'POST', $data, $headers);
$res = explode('",',explode('message: "', $response)[1])[0];
date_default_timezone_set('Asia/Jakarta');
$timestamp = time();
$wak = date("[H:i]", $timestamp);
if (strpos($res, "successfully") !== false) {echo" ".$wak." ".$res." \n";sleep(302);}

endwhile;
?>
