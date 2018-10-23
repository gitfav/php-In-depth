<?php
/**
 * Created by PhpStorm.
 * User: jerise
 * Date: 18-10-22
 * Time: 上午10:08
 */

$arr = [69, 29, 33, 21, 2, 34, 332, 22];


/*
|-----------------------------------------
| 冒泡排序函数
|-----------------------------------------
*/
function bubbleSort($arr)
{
//    $num = count($arr);
//    $select = 0;
//    while ($select < $num) {
//        for ($i = $select + 1; $i < $num; $i++) {
//            if ($arr[$select] > $arr[$i]) {
//                $arr[$i] ^= $arr[$select];
//                $arr[$select] ^= $arr[$i];
//                $arr[$i] ^= $arr[$select];
//            }
//            $select = $i;
//        }
//        $num--;
//        $select = 0;
//    }
//
//    return $arr;


    /*
    |-----------------------------------------
    |换一种写法
    |-----------------------------------------
    */
    $len = count($arr);
    for ($i = 0; $i < $len - 1; $i++) {
        for ($j = 0; $j < $len - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $arr[$j] ^= $arr[$j + 1];
                $arr[$j + 1] ^= $arr[$j];
                $arr[$j] ^= $arr[$j + 1];
            }
        }
    }
    return $arr;
}

var_dump(bubbleSort($arr));