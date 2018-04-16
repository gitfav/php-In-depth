<?php

$arr = [1, 2, 3, 4, 6, 7, 8, 9, 10];

function findByBinary($arr, $findNum)
{
    $height = count($arr) - 1;
    $low = 0;

    $num = null;

    while ($low <= $height) {
        $bin = ceil(($height + $low) / 2);
        if ($arr[$bin] == $findNum) {
            $num = $bin;
            break;
        }
        if ($arr[$bin] < $findNum) {
            $low = $bin+1;
        } else {
            $height = $bin-1;
        }
    }

    return $num;
}

var_dump(findByBinary($arr, 10));