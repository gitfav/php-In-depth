<?php

//utf-8 to unicode
function utf8toUnicode($str)
{
    $firstBit = ord($str[0]);
    if (($firstBit & 0x80) == 0) {
        return $firstBit;
    }
    if(($firstBit & 0xC0) == 0xC0) {
        $bitLong = 1;
        $head = ($firstBit & 0x1F)<<6*$bitLong; //用 & 运算符 计算后几位，然后左移 6*bitLong 位。
        /*
            1101 1001
            0001 1111
        & = 0001 1001
            得到了后5位值。再向左移动6位：
            0001 1001 000000 。可以和后面做交集处理完成 位与位连接
         */
    }
    if(($firstBit & 0xE0) == 0xE0) { // 用 & 运算符 来 判断是否是  1110... 开头的
        $bitLong = 2;
        $head = ($firstBit & 0xF)<<6*$bitLong; //左移 6*bitLong 位。
    }
    $i = 1;
    while($i <= $bitLong) {
        $head |= ((ord($str[$i]) & 0x3F)<<6*($bitLong-$i)); //
        $i++;
    }
    return dechex($head);

//        $firstBit & 0xF
//        $nextBit & 0x3F 计算出后面6位的值
}

echo utf8toUnicode('你');