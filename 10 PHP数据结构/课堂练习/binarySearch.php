<?php
/**
 * Created by PhpStorm.
 * User: jerise
 * Date: 18-10-17
 * Time: 下午10:24
 */

$arr = [1,2,3,4,5,6,7,8,9,10];

function binarySearch($arr, $start, $end, $find)
{
    while ($start < $end) {
        $mid = $start + ceil(($end - $start)/2);
        if($arr[$mid] > $find) {
            $end = $mid;
        } else if($arr[$mid] < $find) {
            $start = $mid;
        } else {
            return $mid;
        }
    }

    return false;
}

$res = binarySearch($arr, 0, count($arr)-1, 10);
var_dump($res);