<?php


$fp = fsockopen("bbs.sijiaomao.com", 80, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET / HTTP/1.1\r\n";
    $out .= "Host: bbs.sijiaomao.com\r\n";
    $out .= "Connection: close\r\n\r\n";

    $str = '';
    fwrite($fp, $out);
    while (!feof($fp)) {
        $str .= fgets($fp, 128); //取128字节
    }
    fclose($fp);
    echo $str;
}



//$pos = strpos($response, "\r\n\r\n");
//$response = substr($response, $pos+4);
//
//echo $response;


//$str = '_csrf=dnhiZTJaQTYuFRYgQBkYRRQeCxx5azR6JQ0IDUo%2FLFcVSTtRUwojQg%3D%3D&LoginForm%5Bidentity%5D=13126834813&LoginForm%5Bpassword%5D=wohenhao514925&LoginForm%5BrememberMe%5D=0&LoginForm%5BrememberMe%5D=1&login-button=&login-button='