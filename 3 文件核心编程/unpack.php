<?php

//得到二进制文件规律，可以解包
$data = file_get_contents('my.db');
$items = unpack('A20Sa20', $data); //未指定数组，后面解析得到的数组会覆盖前面的。
$items = unpack('A20name/Sage/a20email', $data);
print_r($items);
exit;