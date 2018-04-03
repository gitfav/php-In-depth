<?php

function strEncryp($string, $pattern, $decode = false)
{
    if ($decode) $string = base64_decode($string);
    $pattern .= $pattern;
    $key = substr(md5($pattern), 5, 20);

    $strLen = strlen($string);
    $code = '';

    for ($i = 0; $i < $strLen; $i++) {
        $k = ($strLen - $i) % $strLen;
        $code .= $string[$i] ^ $key[$k];
    }

    return  $decode ? $code :base64_encode($code);
}

$encode = strEncryp('123adddfdddsasdf', '123123');
var_dump($encode);
$decode = strEncryp($encode, '123123', true);
var_dump($decode);