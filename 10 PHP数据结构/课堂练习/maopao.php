<?php

$arr = [10, 23, 32, 4, 6, 27, 38, 19];

$num = count($arr) - 1;

for ($i = 0; $i < $num; $i++) {
    for ($j = 0; $j < $num; $j++) {
        if ($arr[$j] > $arr[$j + 1]) {
            $ex = $arr[$j];
            $arr[$j] = $arr[$j + 1];
            $arr[$j + 1] = $ex;
        }
    }
    $num--;
}

var_dump($arr);