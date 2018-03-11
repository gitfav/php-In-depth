<?php

$file = fopen("21.bmp","r");
$a = fread($file,filesize('21.bmp'));

$size = unpack('H*',$a); //解开文件，以16进制显示
var_dump($size);
fclose($file);

$str = '424d42000000000000003e0000002800000001000000010000000100010000000000040000000000000000000000000000000000000000000000ff00ff0080000000';
$file = fopen('312.bmp', 'w');
$str = pack('H*',$str); //写入文件，表面字符串是16进制
fwrite($file, $str);
// var_dump($a);