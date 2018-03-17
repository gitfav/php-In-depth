<?php

function obtainKing($monkeys, $num)
{
    while (count($monkeys) > 1) {
        $now = 1;
        while ($now <= $num) {
            $item = array_shift($monkeys); //先让 数组头元素 出列
            if ($now < $num) {
                array_push($monkeys, $item); //如果不是排除的数组，把元素放到数组最后面 （队列入列）
            }
            $now++;
        }
    }
    return $monkeys;
}

$monkeys = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$num = 6;

$items = obtainKing($monkeys,$num);
var_dump($items);