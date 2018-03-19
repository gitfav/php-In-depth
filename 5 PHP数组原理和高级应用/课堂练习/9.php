<?php

//用二进制思维解题，数组中每个元素当作一位。这样组合成一个二进制值。循环这个值（可以先转换成10进制），找到与这个值的二进制中位值是1的对应数组下的所以值，把它们相加看看是否为需要的值。

$data = array(11, 18, 12, 1, -2, 20, 8, 10, 7, 6);// 二进制是 111111111
$dataLong = count($data) - 1;
$n = 18;

$binary = '';
foreach ($data as $v) {
    $binary .= '1';
}
$decNumber = bindec($binary);
$valueArr = [];

for ($i = 1; $i <= $decNumber; $i++) {//如果到了5，二进制是 0000000101，则是 data[7] + data[9]
    $binStr = decbin($i);// 获取数字的二进制
    $trasBinStr = (string)strrev($binStr); // 由于二进制没有补全位，所以需要补全到和$binary一样的长度。此处用翻转字符串的方法。
    $value = 0;
    $valueString = '';
    $strLength = strlen($trasBinStr);
    for ($j = 0; $j < $strLength; $j++) {
        if ($trasBinStr[$j] == '1') {
            $value += $data[$dataLong - $j];
            $valueString .= $data[$dataLong - $j] . ',';
        }
    }
    if ($value == $n) {
        $valueArr[] = rtrim($valueString, ',');
    }
}

var_dump($valueArr);