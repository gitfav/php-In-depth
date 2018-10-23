<?php
/*
|---------------------------
| 转换 1 转 a, 2 转 b … 26 转 z 之后 27 转 aa, 28 转 ab (column indexes to column references in Excel)
|
|
| 说明： 这里可以现象成 时间戳 转换成 X时X分X秒。（times函数）
|---------------------------
*/
function _26ToWord($val)
{
    $str = '';
    while ($val > 0) {
        $yu = ($val - 1) % 26;
        $str = chr(ord('a') + $yu) . $str;
        $val = (int)(($val - ($yu + 1)) / 26); //这里$yu + 1 就是原本的余数
    }
    return $str;
}

var_dump(_26ToWord(27));

function times($num)
{
    $s = $num % 60;
    $num = ($num - $s) / 60; //秒到分

    $m = $num % 60;
    $num = ($num - $m) / 60; //分到小时

    $h = $num % 24;


    var_dump($h);
    var_dump($m);
    var_dump($s);

//var_dump($m);
}

times(9463);