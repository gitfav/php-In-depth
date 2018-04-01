<?php

$a = 2;
$b = 1;

$a ^= $b;
$b ^= $a;
$a ^= $b;

print_r($a, $b);
//A^B^B=A   这是对称加密解密原理。A文本进行通过B加密，再通过B解密 , 下面是一个对称加密例子


function StrCode($string, $action = 'ENCODE')
{
    $action != 'ENCODE' && $string = base64_decode($string);
    $code = '';
    $key = substr(md5($GLOBALS['pwServer']['HTTP_USER_AGENT'] . $GLOBALS['db_hash']), 8, 18);
    $keyLen = strlen($key);
    $strLen = strlen($string);
    for ($i = 0; $i < $strLen; $i++) {
        $k = $i % $keyLen;
        $code .= $string[$i] ^ $key[$k];
    }
    return ($action != 'DECODE' ? base64_encode($code) : $code);
}

$a = StrCode('aaaaa');
echo $a;

/*
非对称加密
公钥      {E,N}   {5,323} => 225  E,D,N由数学公式得到
私钥      {D,N}   {29,323}  =>  123
密钥对
加密      密文=(明文^E)modN  (123^5)%323 = 225
解密      明文=(密文^E)modN  (225^29)%323 = 123

*/