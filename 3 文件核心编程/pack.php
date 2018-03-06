<?php

$fh = fopen('my.db', 'w'); //默认是以二进制文件打开

$name = pack('A20', 'zsf'); // 将字符串空白以 SPACE 字符 (空格) 填满
$age = pack('S', 255); //无号短整数 (十六位，依计算机的位顺序)
$email = pack('a20', 'zhnasf@qq.com'); //a 将字符串空白以 NULL 字符填满
fwrite($fh, $name . $age . $email);

/* 简便写法

$data = pack('A20Sa20', 'zsf', 255, 'zhnasf@qq.com');
fwrite($fh,$data);

*/