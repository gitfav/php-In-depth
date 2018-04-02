<?php

//header('Location:http://www.baidu.com');

//void header ( string $string [, bool $replace = true [, int $http_response_code ]] )

//header("HTTP/1.0 404 Not Found");

$fp = fsockopen("www.baidu.com", 80, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET / HTTP/1.1\r\n";
    $out .= "Host: www.baidu.com\r\n";
    $out .= "Connection: Close\r\n\r\n";
    $out .= "Accept-Ranges: 20\r\n\r\n";
    fwrite($fp, $out);
    while (!feof($fp)) {
        echo fgets($fp, 128);
    }
    fclose($fp);
}

