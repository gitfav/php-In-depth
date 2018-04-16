<?php

function myQSort($arr)
{
    if (count($arr) <= 1) {
        return $arr; //如果只有一个元素，直接返回，
    }
    $base = $arr[0];
    $left_arr = $right_arr = []; //先分左右
    foreach ($arr as $v) {
        if($v == $base){
            continue;
        }
        if ($v < $base) {
            $left_arr[] = $v;
        } else {
            $right_arr[] = $v;
        }
    }
    $right_sort = $left_sort = [];
    if (!empty($left_arr)) {
        $left_sort = myQSort($left_arr); //获取左边排列好的数据
    }
    $left_sort[] = $base;  //把基值放在中间
    if (!empty($right_arr)) {
        $right_sort = myQSort($right_arr); //获取右边排列好的数据
    }

    return array_merge($left_sort, $right_sort);
}

$arr = [3,52,21,578,23,24,34,235,235,235,34];

var_dump(myQSort($arr));