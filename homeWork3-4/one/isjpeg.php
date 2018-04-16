<?php

//编写代码，通过文件头判断一个文件是否为标准JPEG文件；
if (!file_exists('lala.jpeg')) {
    echo '没有图片';exit;
}

$fd = fopen('lala.jpeg', 'rb');
fseek($fd, 6); //设定位置
$data = fread($fd, 4); //取4个字节

$charArr = unpack('A1a/A1b/A1c/A1d', $data); //解析二进制字符串
$str = implode('', $charArr);
if ($str == 'JFIF') {
    echo '是jpeg图片';
    exit;
}

echo '不是jpeg图片';