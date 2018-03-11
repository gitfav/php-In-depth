<?php

// $out = pack('CCCC',65,66,67,68); //把数据打包成二进制文件
// var_dump($out);

// $item = unpack('C4','ABCD'); //把二进制数据解包
// var_dump($item);

// $binarydata = pack("nvc*", 0x1234, 0x5678, 65, 66);
// var_dump($binarydata);

$file = fopen('c','w');
$text = pack('H*','3B06');
var_dump($text);
// fwrite($file,$text);